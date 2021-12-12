<?php

use Ajthinking\Git\Facades\Git;

use Ajthinking\Git\Tests\TestCase;

class GitTest extends TestCase
{
    public function test_resolving_with_app()
    {
        $this->assertInstanceOf(
			\Ajthinking\Git\Git::class,
			app('Git')
		);
    }

    public function test_version()
    {
		$this->assertMatchesRegularExpression(
			'/git version/',
			Git::version()
		);
    }
}