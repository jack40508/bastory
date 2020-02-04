<?php

namespace App\Post;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Post\Post;

class Comment extends Model
{
    //
    protected $table = 'comments';
    protected $fillable = [
      'user_id',
      'post_id',
      'content',
    ];

    /*------------------------------------------------------------------------**
    ** Relation 定義                                                          **
    **------------------------------------------------------------------------*/

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function posts(){
        return $this->belongsTo(Post::class);
    }
}
