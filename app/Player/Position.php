<?php

namespace App\Player;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Position extends Model
{
    //
    protected $table = 'positions';
    protected $fillable = [
      'name',
      'en_name',
    ];

    /*------------------------------------------------------------------------**
    ** Relation 定義                                                          **
    **------------------------------------------------------------------------*/

    public function players(){
        return $this->belongsToMany(User::class);
    }
}
