<?php

namespace App\Providers;

use App\Events\DailyLogCreated;
use App\Listeners\DailyLogCreatedListener;
use App\Models\User;
use App\Models\DailyLog;
use App\Observers\User\UserObserver;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use App\Observers\User\DailyLogObserver;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        DailyLogCreated::class => [
            DailyLogCreatedListener::class,
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        User::observe(UserObserver::class);
        DailyLog::observe(DailyLogObserver::class);
    }
}
