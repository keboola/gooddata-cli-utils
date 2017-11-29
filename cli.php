#!/usr/bin/env php
<?php
// application.php
require __DIR__.'/vendor/autoload.php';

use Keboola\Console\Command\OptimizeSliHash;
use Symfony\Component\Console\Application;

$application = new Application();
$application->add(new OptimizeSliHash());
$application->run();
