<ul class="list-group list-group-flush">
  @foreach($comments as $comment)
    <li class="list-group-item">
      <img class="profile-img-top" src="/img/user_profile/user_profile_{{ $comment->user_id }}.jpg" alt="user_profile" style="width:6vh; height:6vh;">{{ $comment->user->name }}：<br>
      {{ $comment->content }}
    </li>
  @endforeach
  <li class="list-group-item">
    {!! Form::open(['url'=>'/post/'.$post->id.'/comment','method'=>'POST']) !!}
    <div class="form-group row">
      {!! Form::textarea('content', null, ['class'=>'form-control col-md-9','required','placeholder' => 'コメントを追加','rows' => 1]) !!}
      {!! Form::submit('投稿する',['class'=>'btn btn-primary form-control col-md-2 col-xs-6 ml-3']) !!}
    </div>
    {!! Form::close() !!}
  </li>
</ul>
