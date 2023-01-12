<?php

namespace Application\Commands;

use GreatWebsiteStudio\Console\Command;
use GreatWebsiteStudio\Helpers\FileGenerator;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateModel extends Command
{
    /**
     * Configure command.
     * 
     * @return void
     */
    public function configure()
    {
        $this->setName('create:model')
            ->setDescription('Create a new model.')
            ->setHelp('This command helps you to create a new model.')
            ->addArgument('name', InputArgument::REQUIRED, 'The name of the model class.');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * 
     * @return int
     */
    public function execute(InputInterface $input, OutputInterface $output)
    {
        $className = $input->getArgument('name');

        $namespace = null;
        $className = explode('/', $className);

        /**
         * Check if namespace exists or not.
         * 
         */

        if (count($className) <= 1) {

            $className = $className[0];
        } else {

            $namespace = '\\' . implode('\\', array_slice($className, 0, count($className) - 1));
            $className = implode('/', $className);
        }

        /**
         * Check if model already exist.
         * 
         */

        if (file_exists(GWS_ROOT_DIRECTORY . '/app/Models/' . $className . '.php')) {

            die("\n\033[31m [ERROR] Model already exists.\n");
        }

        /**
         * Generate a new command.
         * 
         */

        $replaced = [
            '{{ModelName}}' => array_slice(explode('/', $className), -1)[0],
            '{{Namespace}}' => $namespace,
        ];

        FileGenerator::generate(
            GWS_ROOT_DIRECTORY . '/samples/Model.sample',
            GWS_ROOT_DIRECTORY . '/app/Models',
            $className . '.php',
            $replaced,
        );

        return 0;

        return 0;
    }
}
