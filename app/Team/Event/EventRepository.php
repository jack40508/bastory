<?php

namespace App\Team\Event;

use Illuminate\Http\Request;
use Auth;
use App\Team\Team;
use App\Team\Event\Event;
use App\Team\Event\EventUser;

class EventRepository
{
	public function __construct(Team $team,Event $event,Eventtype $eventtype){
        $this->team = $team;
        $this->event = $event;
        $this->eventtype = $eventtype;
    }


		public function getUserEvents($team){
			$events = Auth::user()->events->where('team_id',$team->id);
			//dd($events);

			return $events;
    }

    public function getEventtypeList(){
      $eventtypes = $this->eventtype->pluck('name', 'id');

      return $eventtypes;
    }

    public function createEvent($request){
      $newevent = new Event;
      $newevent->name = $request->name;
      $newevent->team_id = $request->team;
      $newevent->rival = $request->rival;
      $newevent->eventtype_id = $request->eventtype;
      $newevent->location = $request->location;
      $newevent->address = $request->address;
      $newevent->datetime = $request->date." ".$request->time;
      $newevent->gathertime = $request->gathertime;
      $newevent->contant = $request->contant;
      $newevent->save();

      $event = $this->event->orderby('id','desc')->first();

      //Relation
      $players = $this->team->where('id',$request->team)->first()->players;
      foreach ($players as $player){
        $neweventuser = new EventUser;
        $neweventuser->user_id = $player->id;
        $neweventuser->event_id = $event->id;
        $neweventuser->reply = -1;
        $neweventuser->save();
      }


    }

    public function update_reply(int $user_id,int $reply)    {
        //
        $eventuser = EventUser::where('id',$user_id)->first();
        $eventuser->reply = $reply;
        $eventuser->save();
    }
}
