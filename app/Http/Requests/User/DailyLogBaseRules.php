<?php

namespace App\Http\Requests\User;

trait DailyLogBaseRules
{
    protected $base_rules = [
        'user_id' => ['nullable'],
        'log'     => ['required'],
        'day'     => ['required', 'date'],
    ];
}
