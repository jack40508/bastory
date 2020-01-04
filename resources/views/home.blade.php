@extends('layouts.header')

@section('content')

  <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" id="event_all_tab" data-toggle="tab" href="#event_all" role="tab" aria-controls="event_all" aria-selected="true">一覽</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="event_join_tab" data-toggle="tab" href="#event_join" role="tab" aria-controls="event_join" aria-selected="false">参加</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="event_nojoin_tab" data-toggle="tab" href="#event_nojoin" role="tab" aria-controls="event_nojoin" aria-selected="false">未参加</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="event_reply_tab" data-toggle="tab" href="#event_reply" role="tab" aria-controls="event_reply" aria-selected="false">未回答</a>
    </li>
  </ul>
  <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="event_all" role="tabpanel" aria-labelledby="event_all_tab">
      @foreach(Auth::user()->events as $event)
      <div class="card mt-3">
        <div class="card-body">
          <div class="row">
            <div class="col-md-3">
              <div class="event_teamlogo">
              <img class="card-img-top" src="/img/team/logo/logo_{{ $event->team_id }}.jpg" alt="user_profile">
              </div>
            </div>
            <div class="col-md-9">
              <h4 class="card-title">{{ $event->name }}</h4>
              <ul class="list-group list-group-flush">
                <li class="list-group-item">相手：{{ $event->rival }}</li>
                <li class="list-group-item">場所：{{ $event->location }}</li>
                <li class="list-group-item">試合時間：{{ $event->datetime }}</li>
                <li class="list-group-item">集合時間：{{ $event->gathertime }}</li>
                <div class="collapse" id="collapsegooglemap_all{{ $event->id }}">
                  <iframe
                    width="100%"
                    height="450"
                    frameborder="0"
                    src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAZVWm0JDiD4kczQgKQjv9i2ej7byvGuwI&q={{ $event->address }}"
                    allowfullscreen>
                  </iframe>
                </div>
                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapsegooglemap_all{{ $event->id }}" aria-expanded="false" aria-controls="collapseExample">
                  Map
                </button>
                <button class="btn btn-info" type="button" data-toggle="collapse" data-target="#collapsegoogle_all{{ $event->id }}" aria-expanded="false" aria-controls="collapseExample">
                  詳しく
                </button>
              </ul>
            </div>
          </div>


          </div>
        </div>
      </div>

      @endforeach



    </div>
    <div class="tab-pane fade" id="event_join" role="tabpanel" aria-labelledby="event_join_tab">
      @foreach(Auth::user()->join_events as $event)
        {{$event->id}}
      @endforeach
    </div>
    <div class="tab-pane fade" id="event_nojoin" role="tabpanel" aria-labelledby="event_nojoin_tab">
      @foreach(Auth::user()->nojoin_events as $event)
        {{$event->id}}
      @endforeach
    </div>
    <div class="tab-pane fade" id="event_reply" role="tabpanel" aria-labelledby="event_reply_tab">
      @foreach(Auth::user()->noreply_events as $event)
        {{$event->id}}
      @endforeach
    </div>
  </div>
@endsection
