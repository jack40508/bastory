<div class="row">
  <h3>リーダー</h3>
</div>
<div class="row">
  <div class="col-md-4">
    <div class="card card-member align-items-center">
      <div class="card-body">
        <img class="profile-img-top" src="/img/user_profile/user_profile_{{ $team->leader->id }}.jpg" alt="user_profile" style="width:15vh; height:15vh;" data-toggle="modal" data-target="#sendMessage{{$team->leader->id}}ModalCenter">
        <h4>{{ $team->leader->name }}</h4>
      </div>
    </div>
  </div>
</div>
<hr width="100%" SIZE=7>

<div class="row">
  <h3>メンバー</h3>
</div>
<div class="row">
  @foreach($team->players as $player)
    @if($player->id != $team->leader->id)
      @if($player->pivot->check == true)
        <div class="col-md-4">
          <div class="card card-member align-items-center">
            <div class="card-body">
              <img class="profile-img-top" src="/img/user_profile/user_profile_{{ $player->id }}.jpg" alt="user_profile" style="width:12vh; height:12vh;" data-toggle="modal" data-target="#sendMessage{{$player->id}}ModalCenter">
              <h5>{{ $player->name }}</h5>
            </div>
          </div>
        </div>
      @endif
    @endif
  @endforeach
</div>
<hr width="100%" SIZE=7>
<div class="row">
  <h3>申込中</h3>
</div>
<div class="row">
  @foreach($team->players as $player)
    @if($player->id != $team->leader->id)
      @if($player->pivot->check == false)
        <div class="col-md-4">
          <div class="card card-member align-items-center">
            <div class="card-body">
              <img class="profile-img-top" src="/img/user_profile/user_profile_{{ $player->id }}.jpg" alt="user_profile" style="width:12vh; height:12vh;" data-toggle="modal" data-target="#sendMessage{{$player->id}}ModalCenter">
              <h5>{{ $player->name }}</h5>
              @if($team->leader_id == Auth::user()->id)
              {!! Form::open(['url'=>'/teamuser/'.$team->id.'/'.$player->id.'/check','method'=>'PUT']) !!}
                {!! Form::submit('申込確認',['class'=>'btn btn-info form-control col-md-12']) !!}
              {!! Form::close() !!}
              @endif
            </div>
          </div>
        </div>
      @endif
    @endif
  @endforeach
</div>

@foreach($team->players as $player)
<!-- sendMessageModal -->
<div class="modal fade" id="sendMessage{{ $player->id }}ModalCenter" tabindex="-1" role="dialog" aria-labelledby="sendMessageModal{{ $player->id }}CenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="sendMessage{{ $player->id }}ModalLongTitle">送るメッセージ</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {!! Form::open(['url'=>'/message/sendbyid/'.$player->id,'method'=>'POST']) !!}
          {!! Form::label('To '.$player->name.'：',"") !!}
          {!! Form::text('message',"",['class'=>'form-control','required']) !!}
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
@endforeach
