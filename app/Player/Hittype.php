<?php

namespace App\Player;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Hittype extends Model
{
    //
    protected $table = 'hittypes';
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
