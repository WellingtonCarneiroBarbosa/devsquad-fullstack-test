<?php

namespace App\Listeners;

use App\Mail\DailyLogCopy;
use App\Events\DailyLogCreated;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class DailyLogCreatedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  DailyLogCreated  $event
     * @return void
     */
    public function handle(DailyLogCreated $event)
    {
        $dailyLog = $event->dailyLog;

        // dispatch a copy of daily log to user mail
        Mail::to($dailyLog->user)->send(new DailyLogCopy($dailyLog));
    }
}
