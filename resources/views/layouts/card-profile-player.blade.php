<div class="row">
  <div class="col-md-4 align-items-center">
    <img class="card-img-top" src="/img/user_profile/user_profile_{{ Auth::user()->id }}.jpg" alt="user_profile" style="max-width: 100%;">
  </div>
  <div class="col-md-8">
    <ul class="list-group list-group-flush">
      <li class="list-group-item">{{ Auth::user()->nickname }}</li>
      <li class="list-group-item">{{ Auth::user()->email }}</li>
      <li class="list-group-item">{{ Auth::user()->birthday }}</li>
      <li class="list-group-item">
        @switch(Auth::user()->gender)
          @case(0)
            女
            @break

          @case(1)
            男
            @break
        @endswitch
      </li>
      <li class="list-group-item">
        @foreach(Auth::user()->positions as $postion)
          {{$postion->name}}
        @endforeach
      </li>
      <li class="list-group-item">{{ Auth::user()->pitchtype->name }} {{ Auth::user()->hittype->name }}</li>
    </ul>
  </div>
</div>
