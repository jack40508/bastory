<div class="row">
  <div class="col-md-2">
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
  </div>
  <div class="col-md-6">
    {{ $post->title }}
  </div>
  <div class="col-md-2">
    {{ $post->area->name }}
  </div>
  <div class="col-md-2">
    {!! Form::open(['url'=>'/post/'.$post->id,'method'=>'GET']) !!}
      {!! Form::submit('詳しく',['class'=>'btn btn-info form-control col-md-12']) !!}
    {!! Form::close() !!}
  </div>
</div>
