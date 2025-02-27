<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class CustomLog extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'App\Services\CustomLogger';
    }
}
