<?php

namespace App\Team\Event;

use Illuminate\Database\Eloquent\Model;
use App\Team\Team;
use App\User;
use App\Team\Event\Eventtype;

class Event extends Model
{
    //
    protected $table = 'events';
    protected $fillable = [
      'name',
      'team_id',
      'rival',
      'eventtype_id',
      'location',
      'address',
      'datetime',
      'gathertime',
      'contant',
    ];

    /*------------------------------------------------------------------------**
    ** Relation 定義                                                          **
    **------------------------------------------------------------------------*/

    public function team(){
        return $this->belongsTo(Team::class);
    }

    public function players(){
        return $this->belongsToMany(User::class)->withPivot('id','reply');
    }

    public function eventtype(){
        return $this->belongsTo(Eventtype::class);
    }
}
