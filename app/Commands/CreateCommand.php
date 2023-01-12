<?php

namespace Application\Commands;

use GreatWebsiteStudio\Console\Command;
use GreatWebsiteStudio\Helpers\FileGenerator;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class CreateCommand extends Command
{
    /**
     * Configure command.
     * 
     * @return void
     */
    public function configure()
    {
        $this->setName('create:command')
            ->setDescription('Create a new studio command.')
            ->setHelp('This command helps you to create a new studio command.')
            ->addArgument('name', InputArgument::REQUIRED, 'The name of the command class.')
            ->addOption('name', null, InputOption::VALUE_OPTIONAL, 'The name of the command to be created.');
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
        $commandName = $input->getOption('name') ?? null;

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
         * Check if command already exist.
         * 
         */

        if (file_exists(GWS_ROOT_DIRECTORY . '/app/Commands/' . $className . '.php')) {

            die("\n\033[31m [ERROR] Command already exists.\n");
        }

        if (!$commandName) {

            $commandName = preg_split('/(?=[A-Z])/', $className);

            unset($commandName[0]);

            $commandName = implode(':', array_map(fn ($item) => strtolower($item), $commandName));
        }

        /**
         * Generate a new command.
         * 
         */

        $replaced = [
            '{{CommandName}}' => array_slice(explode('/', $className), -1)[0],
            '{{Namespace}}' => $namespace,
            '{{StudioCommandName}}' => $commandName,
        ];

        FileGenerator::generate(
            GWS_ROOT_DIRECTORY . '/samples/Command.sample',
            GWS_ROOT_DIRECTORY . '/app/Commands',
            $className . '.php',
            $replaced,
        );

        return 0;
    }
}
