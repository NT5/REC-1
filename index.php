<?php

require_once __DIR__ . '/vendor/autoload.php';

Twig_Autoloader::register();

$REC1 = \REC1\REC1::getInstance();

$REC1->runHTML(INPUT_GET, "p");
