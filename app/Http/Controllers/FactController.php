<?php

namespace App\Http\Controllers;

use App\Fact;
use App\Repository\FactRepository;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
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

    public function webhook(Request $request)
    {
        Log::info('Received message');

/*
        $user = User::firstOrCreate([
            'id' => $request->message['from']['id'],
            'name' => $request->message['from']['first_name'],
            'username' => $request->message['from']['username']
        ]);*/

        User::first()->messages()->create([
            'message' => json_encode($request->message)
        ]);

        $update = Telegram::commandsHandler(true);

        return $update;
    }

    public function setWebhook()
    {
        $response = Telegram::setWebhook(['url' => route('webhook')]);

        return $response;
    }
}
