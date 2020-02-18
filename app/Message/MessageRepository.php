<?php

namespace App\Message;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Message\Message;
use Pusher\Pusher;

class MessageRepository
{
	public function __construct(Message $message,User $user){
    $this->message = $message;
		$this->user = $user;
  }

	public function getMessageUsers(){
		$m_users = $this->user->where('id','!=',Auth::id())->get();

		return $m_users;
  }

	public function getMessages($user_id){
    //get all messages of select user
    //get all messages of now user
    $my_id = Auth::id();

    // Make read all unread message
    $this->message->where(['from' => $user_id, 'to' => $my_id])->update(['is_read' => 1]);

    $messages = $this->message->where(function($query) use ($user_id,$my_id){
      $query->where('from',$my_id)->where('to',$user_id);
    })->orwhere(function($query) use ($user_id,$my_id){
      $query->where('from',$user_id)->where('to',$my_id);
    })->get();

    return $messages;
  }

	public function sendMessage($request){
    $from = Auth::id();
    $to = $request->receiver_id;
    $message = $request->message;

    $data = new Message();
    $data->from = $from;
    $data->to = $to;
    $data->message = $message;
    $data->is_read = 0;
    $data->save();

    // pusher
    $options = array(
      'cluster' => 'ap3',
      'useTLS' => true
    );

    $pusher = new Pusher(
			'b75318841c86d558d960',
	    '69175f918d8850251d41',
	    '948530',
	    $options
    );

    $data = ['from' => $from, 'to' => $to]; // sending from and to user id when pressed enter
    $pusher->trigger('my-channel', 'my-event', $data);
  }

	public function sendMessageByID($to,$message){
		$from = Auth::id();

		$data = new Message();
    $data->from = $from;
    $data->to = $to;
    $data->message = $message;
    $data->is_read = 0;
    $data->save();

		// pusher
    $options = array(
      'cluster' => 'ap3',
      'useTLS' => true
    );

    $pusher = new Pusher(
			'b75318841c86d558d960',
	    '69175f918d8850251d41',
	    '948530',
	    $options
    );

    $data = ['from' => $from, 'to' => $to]; // sending from and to user id when pressed enter
    $pusher->trigger('my-channel', 'my-event', $data);
	}

}
