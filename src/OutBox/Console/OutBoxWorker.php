<?php

namespace App\OutBox\Console;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use _PHPStan_5c71ab23c\Symfony\Component\Console\Attribute\AsCommand;

#[AsCommand(name: 'outbox_worker')]
class OutBoxWorker extends Command
{
    protected function execute(InputInterface $input, OutputInterface $output):int
    {
        return Command::SUCCESS;
    }
}