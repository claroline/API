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
        $object = new \stdClass();

        if (in_array($action, ['create', 'update', 'delete'])) {
            foreach ($data as $property) {
                $parts = explode('=', $property);
                $this->set($object, $parts[0], $parts[1]);
            }
        }

        $response = call_user_func_array([$manager, $action], ['data' => $object]);
        $this->displayResponse($output, $response);
    }


    /**
     * This is more or less the equivalent of lodash set for objects.
     *
     * @param &$object - the object
     * @param $keys    - the property path
     * @param value    - the property value
     */
    public function set(&$object, $keys, $value)
    {
        $keys = explode('.', $keys);
        $depth = count($keys);
        $key = array_shift($keys);

        if ($depth === 1) {
            $object->$key = $value;
        } else {
            if (!isset($object->$key)) {
                $object->$key = new \stdClass();
            } elseif (!is_array($object->$key)) {
                throw new \Exception('Cannot set property because it already exists as a non \stdClass');
            }

            $this->set($object->$key, implode('.', $keys), $value);
        }
    }


    protected function displayResponse(OutputInterface $output, $response)
    {
        echo $response->getHttpCode();
        echo $response->getBody();
    }
}
