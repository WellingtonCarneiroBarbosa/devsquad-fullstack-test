<?php

namespace App\Mail;

use App\Models\DailyLog;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DailyLogCopy extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The DailyLog
     *
     * @var \App\Models\DailyLog
     */
    public DailyLog $dailyLog;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(DailyLog $dailyLog)
    {
        $this->dailyLog = $dailyLog;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mails.daily-logs.copy-of-daily-log')
                    ->subject('Copy of Daily Log for ' . now()->format('d-m-Y'))
                    ->with([
                        'log' => $this->dailyLog->log,
                    ]);
    }
}
