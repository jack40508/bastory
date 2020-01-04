<?php

namespace App\Team\Event;

use Illuminate\Database\Eloquent\Model;

class EventUser extends Model
{
    //
    protected $table = 'event_user';
    protected $fillable = [
      'event_id',
      'user_id',
      'reply',
    ];
}
