<?php

namespace Application\Commands;

use GreatWebsiteStudio\Console\Command;
use GreatWebsiteStudio\Helpers\FileGenerator;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateMigration extends Command
{
    /**
     * Configure command.
     * 
     * @return void
     */
    public function configure()
    {
        $this->setName('create:migration')
            ->setDescription('Create a new migration.')
            ->setHelp('This command helps you to create a new migration.')
            ->addArgument('name', InputArgument::REQUIRED, 'The name of the migration name.');
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

        /**
         * Check if migration already exist.
         * 
         */

        if (file_exists(GWS_ROOT_DIRECTORY . '/migrations/' . $className . '.php')) {

            die("\n\033[31m [ERROR] Migration already exists.\n");
        }

        /**
         * Generate a new command.
         * 
         */

        $replaced = [
            '{{MigrationName}}' => $className,
        ];

        FileGenerator::generate(
            GWS_ROOT_DIRECTORY . '/samples/migration.sample',
            GWS_ROOT_DIRECTORY . '/migrations',
            $className . '.php',
            $replaced,
        );

        return 0;
    }
}
