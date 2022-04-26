<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreDailyLogRequest;
use App\Http\Requests\User\UpdateDailyLogRequest;
use App\Models\DailyLog;
use Illuminate\Http\Request;

class DailyLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $logs = $request->user()->dailyLogs()->latest()->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDailyLogRequest $request)
    {
        $data = $request->validated();

        DailyLog::create($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DailyLog  $dailyLog
     * @return \Illuminate\Http\Response
     */
    public function show(DailyLog $dailyLog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DailyLog  $dailyLog
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDailyLogRequest $request, DailyLog $dailyLog)
    {
        $data = $request->validated();

        $dailyLog->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DailyLog  $dailyLog
     * @return \Illuminate\Http\Response
     */
    public function destroy(DailyLog $dailyLog)
    {
        //
    }
}
