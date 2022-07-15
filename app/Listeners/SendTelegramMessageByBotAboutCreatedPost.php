<?php

namespace App\Listeners;

use App\Helpers\Telegram;
use App\Events\PostCreated;
use Illuminate\Container\Container;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendTelegramMessageByBotAboutCreatedPost
{
    protected $telegram;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Container $container,Telegram $telegram)
    {
        $this->telegram = $telegram;
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\PostCreated  $event
     * @return void
     */
    public function handle(PostCreated $event)
    {
        $reply_markup = [
            'inline_keyboard' => [
                [
                    [
                        'text' => "Сделать активным",
                        'callback_data' => '1|' . $event->secret_key
                    ],
                    [
                        'text' => "Отменить создание поста",
                        'callback_data' => '0|' . $event->secret_key
                    ]
                ]
            ]
        ];
        $this->telegram->sendButtons(1809138319, (string)view('telegram.posts.created', $event->post), $reply_markup);
    }
}
