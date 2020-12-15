<?php

namespace Michaelueber\LaravelCmsPackage;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Michaelueber\LaravelCmsPackage\LaravelCmsPackage
 */
class LaravelCmsPackageFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-cms-package';
    }
}
