<?php

namespace App\Observers\User;

use App\Models\DailyLog;
use App\Events\DailyLogCreated;

class DailyLogObserver
{
    /**
     * Handle the DailyLog "creating" event.
     *
     * @param  \App\Models\DailyLog  $dailyLog
     * @return void
     */
    public function creating(DailyLog $dailyLog)
    {
        $dailyLog->user_id = auth()->id() ?: $dailyLog->user_id;
    }

    /**
     * Handle the DailyLog "created" event.
     *
     * @param  \App\Models\DailyLog  $dailyLog
     * @return void
     */
    public function created(DailyLog $dailyLog)
    {
        event(new DailyLogCreated($dailyLog));
    }

    /**
     * Handle the DailyLog "updated" event.
     *
     * @param  \App\Models\DailyLog  $dailyLog
     * @return void
     */
    public function updated(DailyLog $dailyLog)
    {
        //
    }

    /**
     * Handle the DailyLog "deleted" event.
     *
     * @param  \App\Models\DailyLog  $dailyLog
     * @return void
     */
    public function deleted(DailyLog $dailyLog)
    {
        //
    }

    /**
     * Handle the DailyLog "restored" event.
     *
     * @param  \App\Models\DailyLog  $dailyLog
     * @return void
     */
    public function restored(DailyLog $dailyLog)
    {
        //
    }

    /**
     * Handle the DailyLog "force deleted" event.
     *
     * @param  \App\Models\DailyLog  $dailyLog
     * @return void
     */
    public function forceDeleted(DailyLog $dailyLog)
    {
        //
    }
}
