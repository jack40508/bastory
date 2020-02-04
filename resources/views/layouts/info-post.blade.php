<div class="row">
  <div class="col-md-4 card-member align-items-center">
    <img class="profile-img-top" src="/img/user_profile/user_profile_{{ $post->user_id }}.jpg" alt="user_profile" style="width:12vh; height:12vh;">
    <h4 class="mt-3">{{ $post->user->name }}</h4>
  </div>
  <div class="col-md-8">
    <ul class="list-group list-group-flush">
      <li class="list-group-item">
        <h3>
          @if($post->status == true)
            @switch($post->posttype_id)
              @case(1)
                <span class="badge badge-danger">{{ $post->posttype->name }}</span>
                @break
              @case(2)
                <span class="badge badge-warning">{{ $post->posttype->name }}</span>
                @break
            @endswitch
          @else
            <span class="badge badge-secondary">応募終了</span>
          @endif
        </h3>
      </li>
      <li class="list-group-item"><a href="/team/{{ $post->team->id }}">{{ $post->team->name }}</a></li>
      <li class="list-group-item">{{ $post->area->name }}</li>
    </ul>
  </div>
</div>
<div class="row justify-content-center mt-3">
  <div class="col-md-10">
    {!! $post->content !!}
  </div>
</div>
