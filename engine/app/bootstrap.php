<?php

require_once LIBS_DIR . '/autoload.php';

$configurator = new Nette\Configurator;
$configurator->setTimeZone('Europe/Bratislava');
$configurator->setTempDirectory(TEMP_DIR);
$configurator->setDebugMode($configurator::AUTO);
$configurator->enableTracy(LOG_DIR);

$configurator->createRobotLoader()
    ->addDirectory(APP_DIR)
    ->register();

$configurator->addConfig(APP_DIR . '/config/config.neon');

$container = $configurator->createContainer();

$container->getByType(Nette\Application\Application::class)
    ->run();
