@extends('layouts.header')

@section('content')
<div class="row">
  <div class="sidenav bg-dark d-none d-md-block col-md-2">
    @include('layouts.leftarea_user')
  </div>
  <div class="main col-xs-11 col-md-11 mt-3">
    <div class="row justify-content-end">
      <a class="btn btn-primary mr-3" href="/post/create">投稿する</a>
    </div>
    {!! Form::open(['url'=>'/post/search','method'=>'GET','class'=>'mt-3']) !!}
      <div class="form-group row">
        {!! Form::label('エリア：',"",['class'=>'col-md-4 text-md-right']) !!}
        @if(isset($search_area_id))
        {!! Form::select('area', $areas, $search_area_id, ['class'=>'form-control col-md-4 col-xs-6', 'placeholder' => '地域を選んでください'] ) !!}
        @else
        {!! Form::select('area', $areas, null, ['class'=>'form-control col-md-4 col-xs-6', 'placeholder' => '地域を選んでください'] ) !!}
        @endif
        {!! Form::submit('検索',['class'=>'btn btn-secondary form-control col-md-2 col-xs-6 ml-3']) !!}
      </div>
    {!! Form::close() !!}
    <ul class="list-group">
      @foreach($posts as $post)
        <li class="list-group-item list-group-item-action list-post">
          @include('layouts.card-post')
        </li>
      @endforeach
    </ul>

  </div>
</div>
@endsection
