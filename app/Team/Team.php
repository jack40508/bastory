<?php

namespace App\Team;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Area;
use App\Team\Event\Event;

class Team extends Model
{
    //
    protected $table = 'teams';
    protected $fillable = [
      'name',
      'area_id',
      'leader_id',
      'about',
    ];

    /*------------------------------------------------------------------------**
    ** Relation 定義                                                          **
    **------------------------------------------------------------------------*/

    public function area(){
        return $this->belongsTo(Area::class);
    }

    public function players(){
        return $this->belongsToMany(User::class);
    }

    public function events(){
        return $this->hasMany(Event::class);
    }

    public function leader(){
        return $this->belongsTo(User::class)->where('id', $this->leader_id);
    }
}
