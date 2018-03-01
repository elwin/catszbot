<?php

namespace App\Http\Controllers;

use App\Fact;
use Illuminate\Http\Request;
use Telegram\Bot\Laravel\Facades\Telegram;

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

    public function me()
    {
        return Telegram::getMe();
    }

    public function webhook()
    {
        $updates = Telegram::getWebhookUpdates();

        return $updates;
    }

    public function setWebhook()
    {
        $response = Telegram::setWebhook(['url' => route('webhook')]);

        return $response;
    }
}
