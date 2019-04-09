<?php

declare(strict_types=1);

namespace App;

use Nette\Configurator;


class Booting
{
	public static function boot(): Configurator
	{
		$configurator = new Configurator;

		//$configurator->setDebugMode('23.75.345.200'); // enable for your remote IP
		$configurator->enableTracy(__DIR__ . '/../log');

		$configurator->setTimeZone('Europe/Prague');
		$configurator->setTempDirectory(__DIR__ . '/../temp');

		$configurator->createRobotLoader()
			->addDirectory(__DIR__)
			->register();

		$configurator->addConfig(__DIR__ . '/config/config.neon');

		if (is_file(__DIR__ . '/config/local.neon')) {
			$configurator->addConfig(__DIR__ . '/config/local.neon');
		}

		return $configurator;
	}
}