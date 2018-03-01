<?php

namespace App\Http\Controllers;

use App\Fact;
use Illuminate\Http\Request;

class FactController extends Controller
{
    public function import()
    {
        $url = 'https://catfact.ninja/facts?limit=500';
        $json = json_decode(file_get_contents($url));

        foreach ($json->data as $item) {
            Fact::updateOrCreate(['fact' => $item->fact]);
        }
    }
}
