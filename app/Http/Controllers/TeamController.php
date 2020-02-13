<?php

namespace App\Http\Controllers;

use App\Team\Team;
use Illuminate\Http\Request;
use App\Team\TeamRepository;

class TeamController extends Controller
{
    public function __construct(TeamRepository $team)
    {
        $this->middleware('auth');
        $this->team = $team;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $teams = $this->team->get();
        return view('/team/index',compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $areas = $this->team->getAreaList();
        return view("/team/create",compact('areas'));
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
        $this->team->createFromUser($request);
        $newteam = $this->team->getNewTeam();

        return redirect('team/'.$newteam->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        //
        if($this->team->checkMember($team) == true){
          $nowpage = "event";
          $events = $this->team->getUserEvents($team);
          return view('team/show',compact('team','events','nowpage'));
        }
        else{
          return redirect('team/'.$team->id.'/profile');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        //
        $areas = $this->team->getAreaList();

        return view('/team/edit',compact('team','areas'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        //
        $team->name = $request->name;
        $team->area_id = $request->area;
        $team->about = $request->about;
        $team->save();

        return redirect();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        //
        dd($team->id);
    }

    public function member($team_id)
    {
        $team = $this->team->getTeam($team_id);

        if($this->team->checkMember($team) == true){
          $nowpage = 'member';
          return view('team/member',compact('team','nowpage'));
        }
        else{
          return redirect('team/'.$team->id.'/profile');
        }
    }

    public function profile($team_id)
    {
        $nowpage = 'profile';
        $team = $this->team->getTeam($team_id);
        return view('team/profile',compact('team','nowpage'));
    }

    public function search()
    {
        $nowpage = 'search';
        return view('home/search',compact('nowpage'));
    }

    public function searchresult(Request $request)
    {

        $nowpage = 'search';
        $teams = $this->team->searchTeam($request);
        $condition = $request->condition;

        return view('home/search',compact('nowpage','teams','condition'));
    }

    public function apply($team_id)
    {
        $this->team->apply($team_id);
        $nowpage = "profile";
        $team = $this->team->getTeam($team_id);

        return redirect('team/'.$team->id.'/profile');
    }

    public function cancel_apply($team_id)
    {
      $this->team->cancelApply($team_id);
      $team = $this->team->getTeam($team_id);

      return redirect('/myteam');
    }

    public function check_apply($team_id,$user_id)
    {
      $this->team->checkApply($team_id,$user_id);
      $team = $this->team->getTeam($team_id);

      return redirect('team/'.$team->id.'/member');
    }
}
