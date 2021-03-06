<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Auth;
use App\Team\Team;
use App\Team\Event\Event;
use App\Post\Post;
use App\Post\Comment;
use App\Player\Position;
use App\Player\Hittype;
use App\Player\Pitchtype;
use App\Message\Message;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','nickname','birthday','gender','hittype_id','pitchtype_id'
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

    public function teams(){
        return $this->belongsToMany(Team::class)->withPivot('id','check');;
    }

    public function events(){
        return $this->belongsToMany(Event::class)->withPivot('id','reply');
    }

    public function posts(){
        return $this->hasMany(Post::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function positions(){
        return $this->belongsToMany(Position::class);
    }

    public function hittype(){
        return $this->belongsTo(Hittype::class);
    }

    public function pitchtype(){
        return $this->belongsTo(Pitchtype::class);
    }

    /*------------------------------------------------------------------------**
    **Message Relation Function定義                                           **
    **------------------------------------------------------------------------*/

    public function messages(){
        return Message::where(function ($query) {
                $query->where('from',$this->id)
                      ->orwhere('to',$this->id);
                    })->get();
    }

    public function unreadMessages($sent_id){
        return Message::where(function ($query) {
                $query->where('from',$this->id)
                      ->orwhere('to',$this->id);
                    })->where('from',$sent_id)->where('is_read',0)->count();
    }

    public function allUnreadMessages(){
      return Message::where('to',$this->id)->where('is_read',0)->count();
    }

    public function countMessage(){
        return Message::where(function ($query){
                $query->where('from',$this->id)
                      ->where('to',Auth::id());
                    })->orwhere(function ($query){
                $query->where('to',$this->id)
                      ->where('from',Auth::id());
                    })->count();
    }

}
