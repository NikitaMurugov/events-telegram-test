<?php

namespace App\Listeners;

use App\Helpers\Telegram;
use App\Events\PostStatusChanged;
use Illuminate\Container\Container;

use Illuminate\Support\Facades\Http;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;

class SendTelegramMessageByBotAboutChangedPost implements ShouldQueue
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
     * @param  \App\Events\PostStatusChanged  $event
     * @return void
     */
    public function handle(PostStatusChanged $event)
    {
        // Notification::route('telegram', '1809138319')
        //     ->notify(new Telegram);
        // dd($event->post);

    }
}
