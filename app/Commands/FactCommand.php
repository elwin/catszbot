<?php

namespace App\Commands;

use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;
use Telegram\Bot\Laravel\Facades\Telegram;

class StartCommand extends Command
{
    /**
     * @var string Command Name
     */
    protected $name = "catfact";

    /**
     * @var string Command Description
     */
    protected $description = "Stay updated with the latest & greatest Catfacts!";

    /**
     * @inheritdoc
     */
    public function handle($arguments)
    {
        $this->replyWithChatAction(['action' => Actions::TYPING]);

        $keyboard = ['catfact'];

        $reply_markup = Telegram::replyKeyboardMarkup([
            'keyboard' => $keyboard,
            'resize_keyboard' => true,
            'one_time_keyboard' => false
        ]);

        $this->replyWithMessage([
            'text' => 'Welcome to Catfacts! Request your daily facts by typing /catfact',
            'reply_markup' => $reply_markup
        ]);
    }
}