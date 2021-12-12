<?php

namespace Ajthinking\Git\Tests;

class TestCase extends \Orchestra\Testbench\TestCase
{
	protected function getPackageAliases($app)
	{
		return [
			'Git' => 'Ajthinking\Git\Git',
		];
	}
}

