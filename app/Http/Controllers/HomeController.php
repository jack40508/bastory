<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $nowpage = 'event';
        return view('home/myevent',compact('nowpage'));
    }

    public function team()
    {
        $nowpage = 'team';
        return view('home/myteam',compact('nowpage'));
    }

    public function profile()
    {
        $nowpage = 'profile';
        return view('home/myprofile',compact('nowpage'));
    }
}
