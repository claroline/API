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

class HelpCommand extends Command
{
    protected function configure()
    {
        $this->setName('claroline:api:help');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        //explain the help request here
    }
}
