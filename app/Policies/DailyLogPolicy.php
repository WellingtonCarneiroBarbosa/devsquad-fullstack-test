<?php

namespace App\Policies;

use App\Models\User;
use App\Models\DailyLog;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

class DailyLogPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\DailyLog  $dailyLog
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, DailyLog $dailyLog)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\DailyLog  $dailyLog
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, DailyLog $dailyLog)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\DailyLog  $dailyLog
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, DailyLog $dailyLog)
    {
        return $user->id === $dailyLog->user_id ? Response::allow()
        : Response::deny('You do not own this daily log.');;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\DailyLog  $dailyLog
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, DailyLog $dailyLog)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\DailyLog  $dailyLog
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, DailyLog $dailyLog)
    {
        //
    }
}
