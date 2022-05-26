<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class Telegram
{
    protected Http $http;
    protected string $bot;
    const URL = 'https://api.telegram.org/bot';

    public function __construct(Http $http)
    {
        $this->http = $http;
        $this->bot = config('bots.bot');
    }

    public function sendMessage($chatId, $message): \Illuminate\Http\Client\Response
    {
        return $this->http::post(self::URL . $this->bot . '/sendMessage', [
            'chat_id' => $chatId,
            'text' => $message,
            'parse_mode' => 'html'
        ]);
    }

    public function editMessage($chatId, $message, $messageId)
    {
        return $this->http::post(self::URL . $this->bot . '/editMessageText', [
            'chat_id' => $chatId,
            'text' => $message,
            'parse_mode' => 'html',
            'message_id' => $messageId
        ]);
    }
    public function sendDocument($chatId, $file, $replyId = null): \GuzzleHttp\Promise\PromiseInterface|\Illuminate\Http\Client\Response
    {
        return $this->http::attach('document', Storage::get('/public/' . $file), 'document.png')->post(self::URL . $this->bot . '/sendDocument', [
            'chat_id' => $chatId,
            'reply_to_message_id' => $replyId
        ]);
    }

    public function sendButtons($chatId, $message, $button)
    {
        return $this->http::post(self::URL . $this->bot . '/sendMessage', [
            'chat_id' => $chatId,
            'text' => $message,
            'parse_mode' => 'html',
            'reply_markup' => $button
        ]);
    }

    public function editButtons($chatId, $message, $button, $messageId)
    {
        return $this->http::post(self::URL . $this->bot . '/editMessageText', [
            'chat_id' => $chatId,
            'text' => $message,
            'parse_mode' => 'html',
            'reply_markup' => $button,
            'message_id' => $messageId
        ]);
    }
}
