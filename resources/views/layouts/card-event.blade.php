<div class="card mt-3">
  <div class="card-body">
    <div class="row">
      <div class="col-md-3 align-items-center" style="text-align:center;">
        <img class="card-img-top" src="/img/team/logo/logo_{{ $event->team_id }}.jpg" alt="team_logo" style="width:25vh; height:25vh;">
        <button type="button" class="btn btn-info mt-3" data-toggle="modal" data-target=".bd-modal-lg-{{ $tab }}-{{ $event->id }}">詳しく</button>
      </div>
      <div class="modal fade bd-modal-lg-{{ $tab }}-{{ $event->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h2>{{ $event->name }}</h2>
              <div style="float:right;">
                <h2>
                  <div class="dropleft">
                    @switch($event->pivot->reply)
                      @case(-1)
                        <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenu{{$event->pivot->id}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          未回答
                        </button>
                        @break
                      @case(1)
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu{{$event->pivot->id}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          参加
                        </button>
                        @break
                      @case(0)
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu{{$event->pivot->id}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          不参加
                        </button>
                        @break
                    @endswitch
                    <div class="dropdown-menu" aria-labelledby="dropdownMenu{{$event->pivot->id}}">
                      {{ Form::open(['url'=>'/replyevent/'.$event->pivot->id.'/1', 'method'=>'put']) }}
                      {!! Form::submit('参加',['class'=>'btn dropdown-item form-control']) !!}
                      {{Form::close()}}
                      {{ Form::open(['url'=>'/replyevent/'.$event->pivot->id.'/0', 'method'=>'put']) }}
                      {!! Form::submit('不参加',['class'=>'btn dropdown-item form-control']) !!}
                      {{Form::close()}}
                    </div>
                  </div>
                </h2>
              </div>
            </div>
            <div class="modal-body">
              @include('layouts.info-event')
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-9">
          <div style="float:right;">
            <h2>
              <div class="dropleft">
                @switch($event->pivot->reply)
                  @case(-1)
                    <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenu{{$event->pivot->id}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      未回答
                    </button>
                    @break
                  @case(1)
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu{{$event->pivot->id}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      参加
                    </button>
                    @break
                  @case(0)
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu{{$event->pivot->id}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      不参加
                    </button>
                    @break
                @endswitch
                <div class="dropdown-menu" aria-labelledby="dropdownMenu{{$event->pivot->id}}">
                  {{ Form::open(['url'=>'/replyevent/'.$event->pivot->id.'/1', 'method'=>'put']) }}
                  {!! Form::submit('参加',['class'=>'btn dropdown-item form-control']) !!}
                  {{Form::close()}}
                  {{ Form::open(['url'=>'/replyevent/'.$event->pivot->id.'/0', 'method'=>'put']) }}
                  {!! Form::submit('不参加',['class'=>'btn dropdown-item form-control']) !!}
                  {{Form::close()}}
                </div>
              </div>
            </h2>
          </div>
          <h2>
            @switch($event->eventtype->id)
              @case(1)
                <span class="badge badge-danger">{{ $event->eventtype->name }}</span>
                @break
              @case(2)
                <span class="badge badge-success">{{ $event->eventtype->name }}</span>
                @break
              @case(3)
                <span class="badge badge-dark">{{ $event->eventtype->name }}</span>
                @break
            @endswitch
          </h2>

        <h2>{{ $event->name }}</h2>

        <ul class="list-group list-group-flush">
          @if($event->rival != "")
          <li class="list-group-item">相手：{{ $event->rival }}</li>
          @endif
          <li class="list-group-item">試合時間：{{ $event->datetime }}</li>
          <li class="list-group-item">集合時間：{{ $event->gathertime }}</li>
          <li class="list-group-item">場所：{{ $event->location }}
            <button class="btn" type="button" data-toggle="collapse" data-target="#collapsegooglemap{{ $event->id }}" aria-expanded="false" aria-controls="collapseExample">
              <img src="/img/event/map.png" height="24em" alt="map">
            </button>
            <div class="collapse" id="collapsegooglemap{{ $event->id }}">
              <iframe
                width="100%"
                height="300vw"
                frameborder="0"
                class="mt-1"
                src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAZVWm0JDiD4kczQgKQjv9i2ej7byvGuwI&q={{ $event->address }}"
                allowfullscreen>
              </iframe>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>
