<?php
namespace Keboola\Console\Command;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class Synchronize extends AbstractCommand
{
    protected function configure()
    {
        parent::configure();
        $this
            ->setName('synchronize')
            ->setDescription('Synchronizes dataset')
            ->addArgument('dataset', InputArgument::REQUIRED, 'Dataset')
            ->addOption('hard', null, InputOption::VALUE_NONE, 'Hard sync without data preservation')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $client = $this->initClient($input);
        $client->getDatasets()->synchronize($input->getArgument('pid'), $input->getArgument('dataset'), !$input->getOption('hard'));
    }
}
