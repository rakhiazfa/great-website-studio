<?php

namespace Application\Commands;

use GreatWebsiteStudio\Console\Command;
use GreatWebsiteStudio\Database\Migration;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class RestoreMigration extends Command
{
    /**
     * Configure command.
     * 
     * @return void
     */
    public function configure()
    {
        $this->setName('migrate:restore')
            ->setDescription('Restore migration.')
            ->setHelp('This command helps you to restore migration.');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * 
     * @return int
     */
    public function execute(InputInterface $input, OutputInterface $output)
    {
        Migration::restore();

        return 0;
    }
}
