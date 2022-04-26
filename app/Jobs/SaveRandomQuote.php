<?php

namespace App\Jobs;

use App\Models\User;
use App\Models\DailyLog;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class SaveRandomQuote implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected User $user;

    protected Carbon $date;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user, Carbon $date)
    {
        $this->user = $user;
        $this->date = $date;
    }

    public function handle()
    {
        $quote = Http::get('https://api.quotable.io/random')->json();

        $log = DailyLog::create([
            'user_id' => $this->user->id,
            'day' => $this->date,
            'log' => $quote['content'],
        ]);

        Log::info('SaveRandomQuote job is running!!! 🧨');
    }
}
