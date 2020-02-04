<?php

namespace App\Post;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Team\Team;
use App\Post\Comment;
use App\Post\Posttype;
use App\Area;

class Post extends Model
{
    //
    protected $table = 'posts';
    protected $fillable = [
      'title',
      'user_id',
      'posttype_id',
      'area_id',
      'team_id',
      'content',
      'end',
    ];

    /*------------------------------------------------------------------------**
    ** Relation 定義                                                          **
    **------------------------------------------------------------------------*/

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function team(){
        return $this->belongsTo(Team::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function posttype(){
        return $this->belongsTo(Posttype::class);
    }

    public function area(){
        return $this->belongsTo(Area::class);
    }
}
