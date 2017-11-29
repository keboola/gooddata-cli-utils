<?php
namespace Keboola\Console\Command;

use Keboola\GoodData\Client;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class OptimizeSliHash extends Command
{
    protected function configure()
    {
        $this
            ->setName('optimize-sli-hash')
            ->setDescription('Optimizes project SLI Hash')
            ->addArgument('username', InputArgument::REQUIRED, 'GoodData username')
            ->addArgument('password', InputArgument::REQUIRED, 'GoodData password')
            ->addArgument('pid', InputArgument::REQUIRED, 'Project pid')
            ->addArgument('backend', InputArgument::OPTIONAL, 'Custom backend url')
        ;
    }
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $client = new Client();
        $client->setLogger(new Logger('gooddata-cli-utils', [new StreamHandler('php://stdout')]));
        $client->setUserAgent('gooddata-cli-utils', ''); //@TODO version
        if ($input->getArgument('backend')) {
            $client->setApiUrl($input->getArgument('backend'));
            $client->disableCheckDomain();
        }
        $client->login($input->getArgument('username'), $input->getArgument('password'));
        $client->getDatasets()->optimizeSliHash($input->getArgument('pid'));
    }
}
