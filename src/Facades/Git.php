<?php

namespace Ajthinking\Git\Facades;

use Illuminate\Support\Facades\Facade;

class Git extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'git';
    }
}