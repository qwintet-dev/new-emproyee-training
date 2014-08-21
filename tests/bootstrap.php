<?php

define('ROOT_PATH', realpath(__DIR__ . '/..'));

$loader = include ROOT_PATH . '/vendor/autoload.php';
$loader->add('', ROOT_PATH . '/themes/01');
