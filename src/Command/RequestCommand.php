<?php

namespace Claroline\API\Command;

use Claroline\Handler\ParametersHandler;
use Claroline\Manager\PackageManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Claroline\API\API;

class RequestCommand extends Command
{
    protected function configure()
    {
        $this->setName('claroline:api:request');
        $this->setDefinition(
          [
              new InputArgument('host', InputArgument::REQUIRED, 'the host'),
              new InputArgument('name', InputArgument::REQUIRED, 'the object name'),
              new InputArgument('action', InputArgument::REQUIRED, 'the action'),
              new InputArgument('data', InputArgument::IS_ARRAY, 'the data to pass'),
          ]
      );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $host   = $input->getArgument('host');
        $name   = $input->getArgument('name');
        $action = $input->getArgument('action');
        $data   = $input->getArgument('data');

        $api = new API($host);
        $manager = $api->getManager($name);

        $response = call_user_func_array([$manager, $action], $data);
        $this->displayResponse($output, $response);
    }

    protected function displayResponse(OutputInterface $output, $response)
    {
        echo $response;
    }
}
