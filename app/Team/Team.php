<?php

namespace App\Team;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Auth;
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
        return $this->belongsToMany(User::class)->withPivot('id','check');;
    }

    public function events(){
        return $this->hasMany(Event::class);
    }

    public function leader(){
        return $this->belongsTo(User::class)->where('id', $this->leader_id);
    }

    /*------------------------------------------------------------------------**
    ** Function 定義                                                          **
    **------------------------------------------------------------------------*/

    public function checkApply(){
      if($this->players->where('id',Auth::user()->id)->count() >= 1)
				return true;
			else
				return false;
    }

    public function checkMember(){

      if($this->checkApply() == true){
        if($this->players->where('id',Auth::user()->id)->first()->pivot->check == true)
  				return true;
      }
  		else
  			return false;
    }
}
