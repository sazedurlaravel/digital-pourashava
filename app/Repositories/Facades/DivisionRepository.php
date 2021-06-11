<?php
namespace App\Repositories\Facades;

use Illuminate\Support\Facades\Facade;

class DivisionRepository extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'DivisionRepository';
    }
}