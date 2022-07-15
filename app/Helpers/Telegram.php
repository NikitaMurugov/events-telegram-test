<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class Telegram
{
    const url =  'https://api.tlgr.org/bot';

    protected $http;
    protected $bot;

    public function __construct(Http $http, $bot)
    {
        $this->http = $http;
        $this->bot = $bot;
    }

    public function sendMessage($chat_id, $message)
    {
        return $this->http::post(self::url . $this->bot .'/sendMessage', [
            'chat_id' => $chat_id,
            'text' => $message,
            'parse_mode' => 'html'
        ]);
    }
    public function editMessage($chat_id, $message, $message_id)
    {
        return $this->http::post(self::url . $this->bot .'/editMessageText', [
            'chat_id' => $chat_id,
            'text' => $message,
            'parse_mode' => 'html',
            'message_id' => $message_id
        ]);
    }

    public function sendDocument($chat_id, $file, $reply_id = null)
    {
        return $this->http::attach('document', Storage::get('/public/1.png'), 'document.png')
        ->post(self::url . $this->bot .'/sendDocument', [
            'chat_id' => $chat_id,
            'reply_to_message_id' => $reply_id
        ]);
    }

    public function sendButtons($chat_id, $message, $buttons)
    {
        return $this->http::post(self::url . $this->bot .'/sendMessage', [
            'chat_id' => $chat_id,
            'text' => $message,
            'parse_mode' => 'html',
            'reply_markup' => $buttons
        ]);
    }

    public function editButtons($chat_id, $message, $buttons, $message_id)
    {
        return $this->http::post(self::url . $this->bot .'/editMessageText', [
            'chat_id' => $chat_id,
            'text' => $message,
            'parse_mode' => 'html',
            'reply_markup' => $button,
            'message_id' => $message_id
        ]);
    }
}
