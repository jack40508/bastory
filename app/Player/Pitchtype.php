<?php

namespace App\Player;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Pitchtype extends Model
{
    //
    protected $table = 'pitchtypes';
    protected $fillable = [
      'name',
    ];

    /*------------------------------------------------------------------------**
    ** Relation 定義                                                          **
    **------------------------------------------------------------------------*/

    public function players(){
        return $this->belongsToMany(User::class);
    }
}
