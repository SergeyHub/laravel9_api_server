<?php
namespace App\Models\SecretSanta;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Stuff extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'avatar', 'ip', 'discord_id', 'password', 'token'
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
        //
    ];

    public function profile()
    {
        return $this->hasMany('App\Models\SecretSanta\Profile');
    }

    public function receiver()
    {
        return $this->hasOne('App\Models\SecretSanta\Profile', 'santa_id', 'id');
    }

    public function santa()
    {
        return $this->hasOne('App\Models\SecretSanta\Profile', 'santa_id', 'id');
    }

    public function groups()
    {
        return $this->belongsToMany('App\Models\SecretSanta\Group', 'user_groups', 'user_id',
                                'group_id')->withTimestamps();
    }

    public function findByUsernameOrCreate($stuffData)
    {
        return User::updateOrCreate(
            [
                'email' => $stuffData->email,
                'discord_id' => $stuffData->id
            ],

            [
                'username' => $stuffData->nickname,
                'avatar' => ($stuffData->avatar)? $stuffData->avatar : 'https://antidote.group/assets/img/avatar.svg',
                'discord_id' => $stuffData->id,
                'token' => $stuffData->token,
                'ip' => request()->ip()
            ]
        );
    }
}
