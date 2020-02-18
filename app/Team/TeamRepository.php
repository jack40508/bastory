<?php

namespace App\Team;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Auth;
use App\Team\Team;
use App\Team\TeamUser;
use App\Team\Event\Event;
use App\Team\Event\EventUser;
use App\Area;

class TeamRepository
{
	public function __construct(Team $team,Area $area,Event $event,TeamUser $teamuser,EventUser $eventuser){
        $this->team = $team;
        $this->event = $event;
        $this->area = $area;
				$this->teamuser = $teamuser;
				$this->eventuser = $eventuser;
    }

    public function getAllTeams(){
    	$teams = $this->team->get();

    	return $teams;
    }

		public function getUserTeams(){
			$teams = Auth::user()->teams->where('pivot.check',1)->pluck('name', 'id');

			return $teams;
		}

		public function getTeam($team_id){
			$team = $this->team->where('id',$team_id)->first();

			return $team;
		}

		public function getUserEvents($team){
			$events = Auth::user()->events->where('team_id',$team->id);

			return $events;
    }

		public function getNewTeam(){
			$team = $this->team->orderby('id','desc')->first();

			return $team;
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
			$newrelation->check = true;
      $newrelation->save();

      //Logo Save
      $logo_file = $request->logo;
      $logo_path = $request->logo->path();
      $logo_extension = $request->logo->extension();
      $logo_filename = 'logo_'.$team->id.'.jpg';
      $logo_upload_success = $logo_file->move('img/team/logo', $logo_filename, $logo_extension);
    }

		public function updateTeam($request,$team){
			$team->name = $request->name;
			$team->area_id = $request->area;
			$team->about = $request->about;
			$team->save();

			//Logo Save
      $logo_file = $request->logo;
      $logo_path = $request->logo->path();
      $logo_extension = $request->logo->extension();
      $logo_filename = 'logo_'.$team->id.'.jpg';
      $logo_upload_success = $logo_file->move('img/team/logo', $logo_filename, $logo_extension);
		}

		public function searchTeam($request){

			$teams = $this->team->where('name','like','%'.$request->condition.'%')->orwhere('id',$request->condition)->get();

			return $teams;
		}

		public function apply($team_id){

			//user is belongs to new team
      $newrelation = New TeamUser;
      $newrelation->team_id = $team_id;
      $newrelation->user_id = Auth::user()->id;
			$newrelation->check = false;
      $newrelation->save();
		}

		public function cancelApply($team_id){
			//destroy Relation
			$team = $this->getTeam($team_id);

			if(Auth::user()->id == $team->leader_id){
				$team->leader_id = $team->players->where('id','!=',$team->leader_id)->first()->id;
				$team->save();
			}

			foreach ($team->events as $event) {
				$this->eventuser->where('event_id',$event->id)->where('user_id',Auth::user()->id)->delete();
			}

			$this->teamuser->where('user_id',Auth::user()->id)->where('team_id',$team_id)->delete();
		}

		public function checkApply($team_id,$user_id){
			$teamuser = $this->teamuser->where('team_id',$team_id)->where('user_id',$user_id)->first();
			$teamuser->check = true;
			$teamuser->save();

			$team = $this->getTeam($team_id);

			foreach ($team->events as $event) {
				$eventuser = new EventUser;
				$eventuser->event_id = $event->id;
				$eventuser->user_id = $user_id;
				$eventuser->reply = -1;
				$eventuser->save();
			}
		}

		public function checkMember($team){

			return $team->checkMember();
		}
}
