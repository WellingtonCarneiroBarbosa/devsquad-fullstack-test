<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'tailwind');

Route::prefix('/daily-logs')->name('daily-logs.')->namespace('User')->group(function () {
    Route::post('/', 'DailyLogController@store')->name('store');
    Route::put('/{dailyLog}', 'DailyLogController@update')->name('update');
    Route::delete('/{dailyLog}', 'DailyLogController@destroy')->name('delete');
});
