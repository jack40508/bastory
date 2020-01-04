<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Team\Team;
use App\Team\Event\Event;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','nickname','birthday','gender',
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
        //'email_verified_at' => 'datetime',
    ];

    /*------------------------------------------------------------------------**
    ** Relation 定義                                                          **
    **------------------------------------------------------------------------*/

    public function teams()
    {
        return $this->belongsToMany(Team::class);
    }

    public function events()
    {
        return $this->belongsToMany(Event::class);
    }

    public function join_events()
    {
        return $this->belongsToMany(Event::class)->where('reply','1');
    }

    public function nojoin_events()
    {
        return $this->belongsToMany(Event::class)->where('reply','0');
    }

    public function noreply_events()
    {
        return $this->belongsToMany(Event::class)->where('reply','-1');
    }
}
