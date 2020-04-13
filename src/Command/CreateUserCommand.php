<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class CreateUserCommand extends Command
{
    protected function configure()
    {
        $this->setName('app:create-user')
            ->addArgument('name', InputArgument::REQUIRED, 'Who do you want to greet?')
            ->addArgument('last_name', InputArgument::OPTIONAL, 'Your last name?')
            ->addOption(
                'iterations',
                'i',
                InputOption::VALUE_REQUIRED,
                'How many times should the message be printed?',
                1
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $text = 'Hi '.$input->getArgument('name');

//        $lastName = $input->getArgument('last_name');
//        if ($lastName) {
//            $text .= ' '.$lastName;
//        }

        $output->writeln($text.'!');

        for ($i = 0; $i < $input->getOption('iterations'); $i++) {
            $output->writeln($text);
        }
    }

}
