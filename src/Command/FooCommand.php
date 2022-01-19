<?php

namespace App\Command;

use App\Service\Fooverse;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'foo',
    description: 'short description',
)]
class FooCommand extends Command
{

    public function __construct(private Fooverse $fooverse)
    {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addArgument('rev', InputArgument::OPTIONAL, 'Argument description');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io  = new SymfonyStyle($input, $output);
        $rev = $input->getArgument('rev');

        $revOne = $rev === '1' || $rev === 'true' || $rev === 't';

        $io->success($this->fooverse->rev($revOne));

        return Command::SUCCESS;
    }
}
