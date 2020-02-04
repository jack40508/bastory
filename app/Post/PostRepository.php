<?php

namespace App\Post;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Auth;
use App\Post\Post;
use App\Post\Posttype;
use App\Area;

class PostRepository
{
	public function __construct(Post $post,Area $area,Posttype $posttype){
        $this->post = $post;
				$this->area = $area;
				$this->posttype = $posttype;
    }

    public function getAllPosts(){
      $posts = $this->post->orderby('created_at','DESC')->get();

      return $posts;
    }

		public function getNewPost(){
			$post = $this->post->orderby('id','desc')->first();

			return $post;
		}

		public function searchPosts($area_id){
			$posts = $this->post->where('area_id',$area_id)->get();

      return $posts;
    }

		public function getAreaList(){
      $areas = $this->area->pluck('name', 'id');

      return $areas;
    }

		public function getPosttypeList(){
      $posttypes = $this->posttype->pluck('name', 'id');

      return $posttypes;
    }

		public function createPost($request){
			$content = str_replace("\r\n",'<br/>', $request->content);

			$post = new Post;
			$post->user_id = Auth::user()->id;
			$post->title = $request->title;
			$post->posttype_id = $request->type;
			$post->team_id = $request->team;
			$post->area_id = $request->area;
			$post->content = $content;
			$post->status = true;
			$post->save();

		}
}
