<?php

namespace Application\Commands;

use GreatWebsiteStudio\Console\Command;
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
            ->setHelp('This command helps you to create a new migration.');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * 
     * @return int
     */
    public function execute(InputInterface $input, OutputInterface $output)
    {
        //
    }
}
