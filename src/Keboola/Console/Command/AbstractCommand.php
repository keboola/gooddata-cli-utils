<?php
namespace Keboola\Console\Command;

use Keboola\GoodData\Client;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;

abstract class AbstractCommand extends Command
{
    protected function configure()
    {
        $this
            ->addArgument('username', InputArgument::REQUIRED, 'GoodData username')
            ->addArgument('password', InputArgument::REQUIRED, 'GoodData password')
            ->addArgument('pid', InputArgument::REQUIRED, 'Project pid')
            ->addOption('backend', null, InputOption::VALUE_REQUIRED, 'Custom backend url')
        ;
    }

    protected function initClient(InputInterface $input)
    {
        $cliName = 'keboola/gooddata-cli-utils';
        $cliVersion = file_exists('./REVISION') ? file_get_contents('./REVISION') : 'v1';

        $client = new Client();
        $client->setLogger(new Logger('gooddata-cli-utils', [new StreamHandler('php://stdout')]));
        $client->setUserAgent($cliName, $cliVersion);
        if ($input->getOption('backend')) {
            $client->setApiUrl($input->getOption('backend'));
            $client->disableCheckDomain();
        }
        $client->login($input->getArgument('username'), $input->getArgument('password'));
        return $client;
    }
}
