<?php

namespace Application\Commands;

use GreatWebsiteStudio\Console\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ServeApplication extends Command
{
    /**
     * Configure command.
     * 
     * @return void
     */
    public function configure()
    {
        $this->setName('serve')
            ->setDescription('Serve the application.')
            ->setHelp('This command helps you to serve the application.');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * 
     * @return int
     */
    public function execute(InputInterface $input, OutputInterface $output)
    {
        exec('php -S 127.0.0.1:8080 -t ./public');

        return 0;
    }
}
