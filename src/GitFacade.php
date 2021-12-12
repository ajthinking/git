<?php

namespace Ajthinking\Git;

use Illuminate\Support\Facades\Facade;

class GitFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return '\Ajthinking\Git\Git';
    }
}
