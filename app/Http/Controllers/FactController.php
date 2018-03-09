<?php

namespace App\Http\Controllers;

use App\Fact;
use App\Repository\FactRepository;
use Illuminate\Filesystem\Cache;
use Illuminate\Http\Request;
use Telegram\Bot\Laravel\Facades\Telegram;

class FactController extends Controller
{
    public function test()
    {
        return Cache::get('tele');
    }

    public function import()
    {
        $url = 'https://catfact.ninja/facts?limit=500';
        $json = json_decode(file_get_contents($url));

        foreach ($json->data as $item) {
            Fact::updateOrCreate(['fact' => $item->fact]);
        }
    }

    public function facts()
    {
        return FactRepository::getFact();
    }

    public function fact()
    {
        return FactRepository::getFact();
    }

    public function webhook()
    {
        $update = Telegram::commandsHandler(true);

        return $update;
    }

    public function setWebhook()
    {
        $response = Telegram::setWebhook(['url' => route('webhook')]);

        return $response;
    }
}
