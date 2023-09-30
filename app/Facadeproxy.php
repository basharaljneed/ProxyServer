<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Facade;

class Facadeproxy extends Facade {

    protected static function getFacadeAccessor(){
        return "ProxyHelper";
    }
}