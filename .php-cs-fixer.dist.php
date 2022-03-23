<?php

use KennedyOsaze\PhpCsFixerConfig\Config;
use PhpCsFixer\Finder;

$finder = (new Finder())->in(__DIR__.'/src');

return Config::create($finder);
