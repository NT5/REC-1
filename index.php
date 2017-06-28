<?php

require_once __DIR__ . '/vendor/autoload.php';
/*
  Twig_Autoloader::register();

  $REC1 = \REC1\REC1::getInstance();

  $REC1->runHTML(INPUT_GET, "p");
 */

$baseComponents = new \REC1\Components\BaseComponents();

$Logger = $baseComponents->getLogger();
$Logger->setLog(\REC1\Components\Logger\Areas::UNKNOWN, "ravioli ravioli");

$Warnings = $baseComponents->getWarningSet();
$Warnings->addWarning(new \REC1\Components\Warning(\REC1\Components\Warning\Warnings::UNKNOWN));

$Errors = $baseComponents->getErrorSet();
$Errors->addError(new \REC1\Components\Error(\REC1\Components\Error\Errors::UNKNOWN));

$db = new \REC1\Components\Database(
        new \REC1\Components\Database\Connection(
        \REC1\Components\Database\Config::fromIniFile(NULL, $baseComponents), $baseComponents
        ), $baseComponents
);

$PageConfig = \REC1\Components\PageConfig::fromIniFile(NULL, $baseComponents);

$Cookies = new \REC1\Components\Cookies(NULL, $baseComponents);

$extendedComponents = new \REC1\Components\ExtendedComponents($db, $PageConfig, $Cookies, $baseComponents);

$REC1Components = new \REC1\Components\REC1Components(NULL, $extendedComponents);

$Users = $REC1Components->getUsers();

// $Users->insertUser('TEST_USER', 'test@test.info', 1, 1);

echo "<pre>";
print_r($Logger->getLogs());
print_r($Warnings->getWarnings());
print_r($Errors->getErrors());
print_r($Users->getCountUsers());
print_r($Users->getUsers());
echo "</pre>";
