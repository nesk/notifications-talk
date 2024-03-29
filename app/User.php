<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $attributes = [
        'firstname' => 'John',
        'lastname' => 'Doe',
        'email' => 'john@example.com',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function routeNotificationForSlack($notification)
    {
        return env('SLACK_HOOK');
    }

    public function getBatchRestApiKeyAttribute()
    {
        return env('BATCH_REST_API_KEY');
    }

    public function getBatchApiKeyAttribute()
    {
        return env('BATCH_API_KEY');
    }

    public function getBatchPushTokenAttribute()
    {
        return env('BATCH_PUSH_TOKEN');
    }
}
