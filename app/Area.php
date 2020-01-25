<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Team\Team;

class Area extends Model
{
    //
    protected $table = 'areas';
    protected $fillable = [
      'name',
    ];

    public function teams(){
      return $this->hasMany(Team::class);
    }
}
