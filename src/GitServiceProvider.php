<?php

namespace Ajthinking\Git;

use Illuminate\Support\ServiceProvider;

class GitServiceProvider extends ServiceProvider
{
    public function boot()
    {
    }

    public function register()
    {
		$this->app->bind('git', function($app) {
			return new Git();
		});
    }
}
