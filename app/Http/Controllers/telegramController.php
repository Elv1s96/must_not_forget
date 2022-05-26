<?php

namespace App\Http\Controllers;

use App\Events\TelegramProcessed;
use App\Services\Telegram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Telegram\Bot\Api;

class telegramController extends Controller
{
    public function index()
    {
        Http::post('https://api.telegram.org/bot5247237592:AAH91ArX5mhdQ0jG_OQddRk5tp49JFsvwjk/sendMessage', [
            'chat_id' => 340287477,
            'text' => 'Привет'
        ]);
//        $telegram = new Api('5247237592:AAH91ArX5mhdQ0jG_OQddRk5tp49JFsvwjk');
//        $response = $telegram->sendMessage([
//            'chat_id' => '340287477',
//            'text' => 'Hello World'
//        ]);
//        $messageId = $response->getMessageId();
//dd($messageId);

    }

    public function sendFile(Telegram $telegram)
    {
        //return $telegram->sendDocument(340287477, 'img.png',13);
//        $buttons = [ //на однй строке
//            'inline_keyboard' => [
//                [
//                    [
//                        'text' => 'btn-1',
//                        'callback_data' => '1'
//                    ],
//                    [
//                        'text' => 'btn-2',
//                        'callback_data' => '2'
//                    ]
//                ]
//            ]
//        ];

        $buttons = [ // на разных строках
            'inline_keyboard' => [
                [
                    [
                        'text' => 'btn-1',
                        'callback_data' => '1'
                    ]
                ],
                [
                    [
                        'text' => 'btn-2',
                        'callback_data' => '2'
                    ]
                ]
            ]
        ];
        return $telegram->sendButtons(340287477, 'test buttons',json_encode($buttons));

    }

    public function testEvent()
    {
        ;
        event(new TelegramProcessed('сообщение для ивента'));
    }
}
