<?php

namespace App\Post;

use Illuminate\Http\Request;
use Auth;
use App\Post\Comment;

class CommentRepository
{
	public function __construct(Comment $comment){
    $this->comment = $comment;
  }

  public function getPostComments($post_id){
    $comments = $this->comment->where('post_id',$post_id)->get();

    return $comments;
  }

	public function createComment($content,$post_id){
		$comment = new Comment;
		$comment->user_id = Auth::user()->id;
		$comment->content = $content;
		$comment->post_id = $post_id;
		$comment->save();
	}

}
