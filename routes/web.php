<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'tailwind');

Route::resource('daily-logs', 'User\DailyLogController');
