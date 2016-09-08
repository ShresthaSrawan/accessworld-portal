<?php
namespace App\Facades;
use Illuminate\Support\Facades\Facade;

class Asa extends Facade{
    protected static function getFacadeAccessor() { return 'asaservice'; }
}