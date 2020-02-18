<div class="row">
  <div class="col-md-4 card-member align-items-center">
    <img class="profile-img-top" src="/img/user_profile/user_profile_{{ $post->user_id }}.jpg" alt="user_profile" style="width:12vh; height:12vh;" data-toggle="modal" data-target="#sendMessageModalCenter">
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

<!-- sendMessageModal -->
<div class="modal fade" id="sendMessageModalCenter" tabindex="-1" role="dialog" aria-labelledby="sendMessageModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="sendMessageModalLongTitle">送るメッセージ</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {!! Form::open(['url'=>'/message/sendbyid/'.$post->user->id,'method'=>'POST']) !!}
          {!! Form::label('To'.$post->user->name.'：',"") !!}
          {!! Form::text('message',"",['class'=>'form-control','required']) !!}
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
