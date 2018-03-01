<?php

namespace App\Repository;


use App\Fact;

class FactRepository
{
    public static function getFact()
    {
        $fact = Fact::orderBy('count');
        $fact->increment('count');

        return $fact;
    }
}