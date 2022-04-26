<?php

namespace App\Models;

use OwenIt\Auditing\Auditable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class User extends Authenticatable implements AuditableContract
{
    use HasApiTokens,
        HasFactory,
        Notifiable,
        Auditable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Create relationships between User and DailyLogs
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function dailyLogs(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany('App\Models\DailyLog');
    }

    /**
     * Mutate the Name attribute
     *
     * @param mixed $value
     * @return void
     */
    public function setNameAttribute($value): void
    {
        $this->attributes['name'] = ucwords($value);
    }

    /**
     * Hash the password
     *
     * @param mixed $value
     * @return void
     */
    public function setPasswordAttribute($value): void
    {
        $this->attributes['password'] = Hash::make($value);
    }
}
