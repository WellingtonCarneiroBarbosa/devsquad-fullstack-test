<?php

namespace App\Events;

use App\Models\DailyLog;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class DailyLogCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * The DailyLog
     *
     * @var \App\Models\DailyLog
     */
    public DailyLog $dailyLog;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(DailyLog $dailyLog)
    {
        $this->dailyLog = $dailyLog;
    }
}
