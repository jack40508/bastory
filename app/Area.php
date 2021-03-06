<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Team\Team;
use App\Post\Post;

class Area extends Model
{
    //
    protected $table = 'areas';
    protected $fillable = [
      'name',
    ];

    /*------------------------------------------------------------------------**
    ** Relation 定義                                                          **
    **------------------------------------------------------------------------*/

    public function teams(){
      return $this->hasMany(Team::class);
    }

    public function posts(){
      return $this->hasMany(Post::class);
    }
}
