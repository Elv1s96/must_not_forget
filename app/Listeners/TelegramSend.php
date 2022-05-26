<?php

namespace App\Listeners;

use App\Events\TelegramProcessed;
use App\Services\Telegram;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class TelegramSend
{

    protected $telegram;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Telegram $telegram)
    {
        $this->telegram = $telegram;
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\TelegramProcessed  $event
     * @return void
     */
    public function handle(TelegramProcessed $event)
    {
        //$this->telegram->sendMessage(env('TELEGRAM_ID'), 'привет');
    }

    /**
     * @param TelegramProcessed $event
     * @return void
     */
    public function orderStore($event)
    {
        $this->telegram->sendMessage(env('TELEGRAM_ID'), $event->data);
    }

    public function subscribe($events)
    {
        $events->listen(
            TelegramProcessed::class, [
                TelegramSend::class, 'orderStore'
            ]
        );
    }
}
