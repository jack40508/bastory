@extends('layouts.header')

@section('content')
<div class="row">
  <div class="sidenav bg-dark d-none d-md-block col-md-2">
    @include('layouts.leftarea_user')
  </div>
  <div class="main col-xs-11 col-md-11 mt-3">
    @if(Auth::user()->id == $post->user_id && $post->status == true)
    <div class="row justify-content-end mt-3">
      {{ Form::open(['url'=>'/post/close/'.$post->id, 'method'=>'put']) }}
      {!! Form::submit('募集終了',['class'=>'btn btn-danger mr-3']) !!}
      {{Form::close()}}
    </div>
    @endif
    <div class="card mt-3">
      <div class="card-header">
        <h1>{{ $post->title }}</h1>
      </div>
      <div class="card-body">
        @include('layouts.info-post')
      <hr/>
        <h4>コメント</h4>
        @include('layouts.list-comment')
      </div>
    </div>
  </div>
</div>
@endsection
