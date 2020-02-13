<div class="row">
  <div class="col-md-4 align-items-center">
    <img class="card-img-top" src="/img/team/logo/logo_{{ $event->team_id }}.jpg" alt="team_logo" style="width:20vh; height:20vh;">
  </div>
  <div class="col-md-8">
    <h3>
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
    </h3>
    <ul class="list-group list-group-flush">
      @if($event->rival != "")
      <li class="list-group-item">相手：{{ $event->rival }}</li>
      @endif
      <li class="list-group-item">試合時間：{{ $event->datetime }}</li>
      <li class="list-group-item">集合時間：{{ $event->gathertime }}</li>
      <li class="list-group-item">場所：{{ $event->location }}</li>
    </ul>
  </div>
  <div class="col-md-12">
    <iframe
      width="100%"
      height="300vw"
      frameborder="0"
      class="mt-1"
      src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAZVWm0JDiD4kczQgKQjv9i2ej7byvGuwI&q={{ $event->address }}"
      allowfullscreen>
    </iframe>
  </div>
  <div class="col-md-12 mt-3">
    <h4>説明</h4>
    {{ $event->contant }}
  </div>
  <div class="col-md-12 mt-3">
    <h4>参加メンバー</h4>
    <nav>
      <div class="nav nav-tabs" id="nav-tab-{{ $tab }}-{{ $event->id }}" role="tablist">
        <a class="nav-item nav-link active" id="nav-join-tab-{{ $tab }}-{{ $event->id }}" data-toggle="tab" href="#nav-join-{{ $tab }}-{{ $event->id }}" role="tab" aria-controls="nav-join" aria-selected="true">参加</a>
        <a class="nav-item nav-link" id="nav-nojoin-tab-{{ $tab }}-{{ $event->id }}" data-toggle="tab" href="#nav-nojoin-{{ $tab }}-{{ $event->id }}" role="tab" aria-controls="nav-nojoin" aria-selected="false">不参加</a>
        <a class="nav-item nav-link" id="nav-noreply-tab-{{ $tab }}-{{ $event->id }}" data-toggle="tab" href="#nav-noreply-{{ $tab }}-{{ $event->id }}" role="tab" aria-controls="nav-noreply" aria-selected="false">未回答</a>
      </div>
    </nav>
    <div class="tab-content" id="nav-tabContent-{{ $tab }}-{{ $event->id }}">
      <div class="tab-pane fade show active" id="nav-join-{{ $tab }}-{{ $event->id }}" role="tabpanel" aria-labelledby="nav-join-tab">
        <div class="row">
          @foreach($event->players as $player)
            @if($player->pivot->reply == 1)
            <div class="col-3">
              <div class="card card-member align-items-center">
                <div class="card-body">
                  <img class="profile-img-top" src="/img/user_profile/user_profile_{{ $player->id }}.jpg" alt="user_profile" style="width:12vh; height:12vh;">
                  <h4>{{ $player->name }}</h4>
                  <h5>
                    @foreach( $player->positions as $position)
                      {{ $position->name }}
                    @endforeach
                  </h5>
                </div>
              </div>
            </div>
            @endif
          @endforeach
        </div>
      </div>
      <div class="tab-pane fade" id="nav-nojoin-{{ $tab }}-{{ $event->id }}" role="tabpanel" aria-labelledby="nav-nojoin-tab">
        <div class="row">
          @foreach($event->players as $player)
            @if($player->pivot->reply == 0)
            <div class="col-3">
              <div class="card card-member align-items-center">
                <div class="card-body">
                  <img class="profile-img-top" src="/img/user_profile/user_profile_{{ $player->id }}.jpg" alt="user_profile" style="width:12vh; height:12vh;">
                  <h4>{{ $player->name }}</h4>
                  <h5>
                    @foreach( $player->positions as $position)
                      {{ $position->name }}
                    @endforeach
                  </h5>
                </div>
              </div>
            </div>
            @endif
          @endforeach
        </div>
      </div>
      <div class="tab-pane fade" id="nav-noreply-{{ $tab }}-{{ $event->id }}" role="tabpanel" aria-labelledby="nav-noreply-tab">
        <div class="row">
          @foreach($event->players as $player)
            @if($player->pivot->reply == -1)
            <div class="col-3">
              <div class="card card-member align-items-center">
                <div class="card-body">
                  <img class="profile-img-top" src="/img/user_profile/user_profile_{{ $player->id }}.jpg" alt="user_profile" style="width:12vh; height:12vh;">
                  <h4>{{ $player->name }}</h4>
                  <h5>
                  @foreach( $player->positions as $position)
                    {{ $position->name }}
                  @endforeach
                  </h5>
                </div>
              </div>
            </div>
            @endif
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>
