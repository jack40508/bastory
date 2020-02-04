<?php

namespace App\Post;

use Illuminate\Database\Eloquent\Model;
use App\Post\Post;

class Posttype extends Model
{
    //
    protected $table = 'posttypes';
    protected $fillable = [
      'name',
    ];

    public function posts(){
        return $this->hasMany(Post::class);
    }
}
