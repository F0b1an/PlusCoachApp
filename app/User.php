<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    public function tasks()
    {
        return $this->belongsToMany('App\Task')
            ->withPivot('status', 'comment')
            ->withTimeStamps();
    }

    public function pluscoach()
    {
        return $this->belongsTo('App\Pluscoach');
    }

    protected $fillable = [

        'name', 'phone', 'education' ,'class' ,'mentor', 'email', 'password', 'pluscoach_id', 'is_pluscoach'

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
