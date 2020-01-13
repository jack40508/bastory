<?php

namespace App\Team\Event;

use Illuminate\Database\Eloquent\Model;
use App\Team\Event\Event;

class Eventtype extends Model
{
    //
    protected $table = 'eventtypes';
    protected $fillable = [
      'name',
    ];

    public function events()
    {
      return $this->hasMany(Event::class);
    }
}
