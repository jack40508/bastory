@extends('layouts.header')

@section('content')
<div class="row">
  <div class="sidenav bg-dark d-none d-md-block col-md-2">
    @include('layouts.leftarea_user')
  </div>
  <div class="main col-xs-12 col-md-11 mt-3">
    <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active" id="list-event" role="tabpanel" aria-labelledby="list-event-list">
        <div class="row justify-content-end" sytle="background-color: red;" width=1000px>
          <a class="btn btn-primary mr-3" href="/event/create" style="float: right;">新イベントを作る</a>
        </div>

        <ul class="nav nav-tabs" id="myEventTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="event_tab" data-toggle="tab" href="#event" role="tab" aria-controls="event" aria-selected="true">一覽</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="event_reply_tab" data-toggle="tab" href="#event_reply" role="tab" aria-controls="event_reply" aria-selected="true">未回答</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="event_join_tab" data-toggle="tab" href="#event_join" role="tab" aria-controls="event_join" aria-selected="false">参加</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="event_nojoin_tab" data-toggle="tab" href="#event_nojoin" role="tab" aria-controls="event_nojoin" aria-selected="false">未参加</a>
          </li>
        </ul>
        <div class="tab-content list_event" id="myEventTabContent">
          <div class="tab-pane fade show active" id="event" role="tabpanel" aria-labelledby="event_reply_tab">
            @foreach(Auth::user()->events as $event)
              @include('layouts.card-event')
            @endforeach
          </div>
          <div class="tab-pane fade show" id="event_reply" role="tabpanel" aria-labelledby="event_reply_tab">
            @foreach(Auth::user()->events as $event)
              @if($event->pivot->reply == -1)
                @include('layouts.card-event')
              @endif
            @endforeach
          </div>
          <div class="tab-pane fade" id="event_join" role="tabpanel" aria-labelledby="event_join_tab">
            @foreach(Auth::user()->events as $event)
              @if($event->pivot->reply == 1)
                @include('layouts.card-event')
              @endif
            @endforeach
          </div>
          <div class="tab-pane fade" id="event_nojoin" role="tabpanel" aria-labelledby="event_nojoin_tab">
            @foreach(Auth::user()->events as $event)
              @if($event->pivot->reply == 0)
                @include('layouts.card-event')
              @endif
            @endforeach
          </div>
        </div>
      </div>

      <div class="tab-pane fade" id="list-team" role="tabpanel" aria-labelledby="list-team-list">
        <div class="row justify-content-end">
          <a class="btn btn-primary mr-3" href="/team/create">新チームを作る</a>
        </div>
        <div class="row">
          @foreach(Auth::user()->teams as $team)
            <div class="col-md-3 col-sm-3 col-xs-6 mt-3">
              @include('layouts.card-team')
            </div>
          @endforeach
        </div>
      </div>
      <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
        プロフィール
      </div>
    </div>
  </div>
</div>

@endsection
