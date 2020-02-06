<?php

namespace App\Player;

use Illuminate\Database\Eloquent\Model;

class PositionUser extends Model
{
    //
    protected $table = 'position_user';
    protected $fillable = [
      'user_id',
      'position_id',
    ];
}
