<?php

namespace App\Http\Controllers;

use App\Post\Post;
use App\Post\PostRepository;
use App\Post\CommentRepository;
use App\Team\TeamRepository;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct(PostRepository $post,TeamRepository $team,CommentRepository $comment)
    {
        $this->middleware('auth');
        $this->post = $post;
        $this->team = $team;
        $this->comment = $comment;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $nowpage = "post";
        $posts =  $this->post->getAllPosts();
        $areas = $this->post->getAreaList();
        $posttypes = $this->post->getPosttypeList();

        return view('post/index',compact('nowpage','posts','areas','posttypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $nowpage = "post";
        $areas = $this->post->getAreaList();
        $types = $this->post->getPosttypeList();
        $teams = $this->team->getUserTeams();

        return view('post/create',compact('nowpage','areas','types','teams'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->post->createPost($request);
        $newpost = $this->post->getNewPost();

        return redirect('post/'.$newpost->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
        $nowpage = "post";
        $comments = $this->comment->getPostComments($post->id);

        return view('post/show',compact('nowpage','post','comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }

    public function search(Request $request)
    {
        //
        $nowpage = "post";
        $areas = $this->post->getAreaList();
        $posttypes = $this->post->getPosttypeList();
        $search_area_id = null;
        $search_posttype_id = null;

        if(is_null($request->area) && is_null($request->posttype))
        $posts =  $this->post->getAllPosts();
        else
        {
          $posts =  $this->post->searchPosts($request->area,$request->posttype);
          $search_area_id = $request->area;
          $search_posttype_id = $request->posttype;
        }

        return view('post/index',compact('nowpage','posts','areas','posttypes','search_area_id','search_posttype_id'));
    }

    public function close($post_id){

        $this->post->closePost($post_id);

        return redirect('post/'.$post_id);
    }
}
