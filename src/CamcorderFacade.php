<?php

namespace Eyuva\Camcorder;


use Illuminate\Support\Facades\Facade;

class CamcorderFacade extends Facade
{
    protected static function getFacadeAccessor() {
        return 'camcorder';
    }
}