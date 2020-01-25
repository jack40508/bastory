@extends('layouts.header')

@section('content')
<div class="row">
  <div class="sidenav bg-dark d-none d-md-block col-md-2">
    @include('layouts.leftarea_user')
  </div>
  <div class="main col-xs-11 col-md-11 mt-3">
    <div class="row justify-content-end">
      <a class="btn btn-primary mr-3" href="/team/create">新チームを作る</a>
    </div>
    <div class="row">
      <h1>参加中</h1>
    </div>
    <div class="row">
      @foreach(Auth::user()->teams as $team)
        @if($team->pivot->check == true)
        <div class="col-md-3 col-sm-3 col-xs-6 mt-3">
          @include('layouts.card-team')
        </div>
        @endif
      @endforeach
    </div>
    <div class="row mt-3">
      <h1>申込中</h1>
    </div>
    <div class="row">
      @foreach(Auth::user()->teams as $team)
        @if($team->pivot->check == false)
        <div class="col-md-3 col-sm-3 col-xs-6 mt-3">
          {!! Form::open(['url'=>'/teamuser/'.$team->id.'/destroy','method'=>'PUT']) !!}
            {!! Form::submit('キャンセル',['class'=>'btn btn-danger form-control col-md-12']) !!}
          {!! Form::close() !!}
          <div class="mt-1">
            @include('layouts.card-team')
          </div>
        </div>
        @endif
      @endforeach
    </div>
  </div>
</div>
@endsection
