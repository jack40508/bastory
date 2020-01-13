<?php

namespace App\Http\Controllers;

use Auth;
use App\Team\Team;
use App\Team\TeamUser;
use App\Area;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class TeamController extends Controller
{
    public function __construct(Team $team,Area $area)
    {
        $this->team = $team;
        $this->area = $area;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $areas = $this->area->pluck('name', 'id');;
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
        $newteam = New Team;
        $newteam->name = $request->get('name');
        $newteam->area_id = $request->get('area');
        $newteam->leader_id = Auth::user()->id;
        $newteam->about = "";
        $newteam->save();

        //Get New Team id
        $team = $this->team->orderby('id','desc')->first();

        //user is belongs to new team
        $newrelation = New TeamUser;
        $newrelation->team_id = $team->id;
        $newrelation->user_id = Auth::user()->id;
        $newrelation->save();

        //Logo Save
        $logo_file = $request->logo;
        $logo_path = $request->logo->path();
        $logo_extension = $request->logo->extension();
        $logo_filename = 'logo_'.$team->id;
        $logo_upload_success = $logo_file->move('img/team/logo', $logo_filename, $logo_extension);

        return view('home');
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
        dd($team->id);
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
        dd($team->id);

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
        dd($team->id);
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
}
