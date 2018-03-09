<?php

namespace App\Repository;


use App\Fact;

class FactRepository
{
    public static function getFact()
    {
        $fact = Fact::inRandomOrder()->orderBy('count')->first();
        $fact->increment('count');

        return $fact;
    }

    public static function getFacts()
    {
        return Fact::all();
    }
}