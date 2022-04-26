<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DailyLog extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'log',
        'day'
    ];

    /**
     * Create relationships between DailyLogs and User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * Scope a query to only include today's logs.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFromToday(\Illuminate\Database\Eloquent\Builder $query): \Illuminate\Database\Eloquent\Builder
    {
        return $query->where('day', '=', Carbon::now()->format('Y-m-d'));
    }

    /**
     * Mutate the Day attribute to a string format of Y-m-d
     *
     * @param mixed $value
     * @return void
     */
    public function setDayAttribute($value): void
    {
        $this->attributes['day'] = Carbon::parse($value)->format('Y-m-d');
    }

    /**
     * Mutate the Day attribute to a Carbon instance
     *
     * @return \Illuminate\Support\Carbon
     */
    public function getDayAttribute(): \Illuminate\Support\Carbon
    {
        return Carbon::createFromFormat('Y-m-d', $this->attributes['day']);
    }
}
