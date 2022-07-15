<?php

namespace App\Listeners;

use App\Events\PostCreated;
use App\Events\PostStatusChanged;

class TelegramSubscriber
{

    /**
     * listeners for post created
     *
     * @param PostCreated $event
     */

    public function postCreated($event)
    {
        $reply_markup = [
            'inline_keyboard' => [
                [
                    [
                        'text' => "Сделать активным",
                        'callback_data' => '1|' . $event->order->secret_key
                    ],
                    [
                        'text' => "Отменить создание поста",
                        'callback_data' => '0|' . $event->order->secret_key
                    ]
                ]
            ]
        ];
        $this->telegram->sendButtons(1809138319, (string)view('telegram.posts.created', $event->post), $reply_markup);
    }

    /**
     * listeners for post changed
     *
     * @param PostStatusChanged $event
     */
    public function postChanged($event)
    {

        $data = [
            'post_name' => $event->post->name,
            'post_id' => $event->post->id,
        ];
        $buttons = [
            'inline_keyboard' => [
                [
                    [
                        'text'=>'Тыкни на меня',
                        'callback_data'=>'1',
                    ],
                    [
                        'text'=>'Тыкни на того что слева',
                        'callback_data'=>'2',
                    ],
                ],
                [

                    [
                        'text'=>'Тыкни на МЕНЯЯЯ',
                        'callback_data'=>'3',
                    ],
                ]
            ]
        ];
        $message = $this->telegram->sendButtons(1809138319, (string) view('telegram.choose', $data), $buttons);
    }

    public function subscribe($events)
    {
        $events->listen(
            PostCreated::class, [
                TelegramSubscriber::class, 'postCreated'
            ],
            PostStatusChanged::class, [
                TelegramSubscriber::class, 'postChanged'
            ]
        );
    }

}
