<?php

namespace Application\Commands;

use GreatWebsiteStudio\Console\Command;
use GreatWebsiteStudio\Database\Migration;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class RunMigration extends Command
{
    /**
     * Configure command.
     * 
     * @return void
     */
    public function configure()
    {
        $this->setName('migrate')
            ->setDescription('Run database migrations.')
            ->setHelp('This command helps you to run database migrations.');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * 
     * @return int
     */
    public function execute(InputInterface $input, OutputInterface $output)
    {

        Migration::migrate();

        return 0;
    }
}
