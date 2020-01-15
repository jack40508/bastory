<?php

namespace App\Team;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Auth;
use App\Team\Team;
use App\Team\TeamUser;
use App\Team\Event\Event;
use App\Area;

class TeamRepository
{
	public function __construct(Team $team,Area $area,Event $event){
        $this->team = $team;
        $this->event = $event;
        $this->area = $area;
    }

    public function getAllTeams(){
    	$teams = $this->team->get();

    	return $teams;
    }

		public function getUserEvents($team){
			$events = Auth::user()->events->where('team_id',$team->id);
			//dd($events);

			return $events;
    }

    public function getAreaList(){
      $areas = $this->area->pluck('name', 'id');

      return $areas;
    }

    public function createFromUser($request){
      $newteam = New Team;
      $newteam->name = $request->get('name');
      $newteam->area_id = $request->get('area');
      $newteam->leader_id = Auth::user()->id;
      $newteam->about = $request->get('about');
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
      $logo_filename = 'logo_'.$team->id.'.jpg';
      $logo_upload_success = $logo_file->move('img/team/logo', $logo_filename, $logo_extension);
    }
}
