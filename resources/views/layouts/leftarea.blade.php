<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card card_profile">
        <img class="card-img-top" src="/img/user_profile/user_profile_{{ Auth::user()->id }}.jpg" alt="user_profile" style="padding:10px;">
        <div class="card-body">
          <h5 class="card-title">{{ Auth::user()->name }}</h5>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">私のチーム
              <ul class="list-group list-group-flush">
                <li><a href="/{{ Auth::user()->id }}/team">一覽</a></li>
                @foreach(Auth::user()->teams as $team)
                  <li><a href="/team/{{ $team->id }}">{{$team->name}}</a></li>
                @endforeach
              </ul>
            </li>
            <li class="list-group-item">私のイベント
              <ul class="list-group list-group-flush">
                <li><a href="/">一覽</a></li>
                @foreach(Auth::user()->teams as $team)
                  <li><a href="/{{ $team->id }}">{{$team->name}}</a></li>
                @endforeach
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
