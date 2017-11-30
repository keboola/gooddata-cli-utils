#!/usr/bin/env php
<?php
// application.php
require __DIR__.'/vendor/autoload.php';

use Symfony\Component\Console\Application;

$application = new Application();
$application->add(new \Keboola\Console\Command\OptimizeSliHash());
$application->add(new \Keboola\Console\Command\Synchronize());
$application->run();
