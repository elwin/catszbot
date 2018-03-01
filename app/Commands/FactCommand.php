<?php

namespace App\Commands;

use App\Repository\FactRepository;
use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;

class FactCommand extends Command
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

        $fact = FactRepository::getFact();

        $this->replyWithMessage(['text' => $fact->fact]);
    }
}