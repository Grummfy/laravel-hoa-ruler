<?php

namespace HoaThis\LaravelHoaRuler\Laravel\Facades;

use Illuminate\Support\Facades\Facade;

class Ruler extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'ruler';
    }
}

