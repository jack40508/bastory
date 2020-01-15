@extends('layouts.header')

@section('content')
<div class="row">
  <div class="d-none d-md-block col-md-3 mt-5">
    @include('layouts.leftarea_team')
  </div>
  <div class="col-xs-12 col-md-9 mt-3">
    <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active" id="list-event" role="tabpanel" aria-labelledby="list-event-list">

        <div class="row justify-content-end" sytle="background-color: red;" width=1000px>
          <a class="btn btn-primary mr-3" href="/event/create" style="float: right;">新イベントを作る</a>
        </div>

        <ul class="nav nav-tabs" id="teamEventTab" role="tablist">
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
        <div class="tab-content list_event" id="teamEventTabContent">
          <div class="tab-pane fade show active" id="event" role="tabpanel" aria-labelledby="event_reply_tab">
            @foreach($events as $event)
              @include('layouts.card-event')
            @endforeach
          </div>
          <div class="tab-pane fade show" id="event_reply" role="tabpanel" aria-labelledby="event_reply_tab">
            @foreach($events as $event)
              @if($event->pivot->reply == -1)
                @include('layouts.card-event')
              @endif
            @endforeach
          </div>
          <div class="tab-pane fade" id="event_join" role="tabpanel" aria-labelledby="event_join_tab">
            @foreach($events as $event)
              @if($event->pivot->reply == 1)
                @include('layouts.card-event')
              @endif
            @endforeach
          </div>
          <div class="tab-pane fade" id="event_nojoin" role="tabpanel" aria-labelledby="event_nojoin_tab">
            @foreach($events as $event)
              @if($event->pivot->reply == 0)
                @include('layouts.card-event')
              @endif
            @endforeach
          </div>
        </div>
      </div>

      <div class="tab-pane fade" id="list-member" role="tabpanel" aria-labelledby="list-member-list">
        123
      </div>
      <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
        プロフィール
      </div>

    </div>
  </div>
</div>
@endsection
