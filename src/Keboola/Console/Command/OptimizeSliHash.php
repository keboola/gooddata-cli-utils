<?php
namespace Keboola\Console\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class OptimizeSliHash extends AbstractCommand
{
    protected function configure()
    {
        parent::configure();
        $this
            ->setName('optimize-sli-hash')
            ->setDescription('Optimizes project SLI Hash')
        ;
    }
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $client = $this->initClient($input);
        $client->getDatasets()->optimizeSliHash($input->getArgument('pid'));
    }
}
