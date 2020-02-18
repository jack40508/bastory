@extends('layouts.header')

@section('content')
<div class="row">
  <div class="sidenav bg-dark d-none d-md-block col-md-2">
    @include('layouts.leftarea_team')
  </div>
  <div class="main col-xs-11 col-md-11 mt-3 item-middle-center">
    <div class="card">
      <div class="card-header">
        <div class="row justify-content-between">
        <h1>{{ $team->name }}</h1>
        @if(Auth::id() == $team->leader_id)
        <h2><a class="btn btn-info mr-3" href="/team/{{ $team->id }}/edit" role="button">編集</a></h2>
        @endif
        </div>
      </div>
      <div class="card-body">
        @include('layouts.card-profile-team')
      </div>
    </div>
  </div>
</div>

<div class="row justify-content-end mt-3 mr-3" sytle="background-color: red;" width=1000px>
  @if($team->checkApply() == true)
    @if($team->checkMember() == true)
    {!! Form::open(['url'=>'/teamuser/'.$team->id.'/destroy','method'=>'PUT']) !!}
      {!! Form::submit('脱退する',['class'=>'btn btn-danger form-control col-md-12']) !!}
    {!! Form::close() !!}
    @else
    {!! Form::open(['url'=>'/teamuser/'.$team->id.'/destroy','method'=>'PUT']) !!}
      {!! Form::submit('申込キャンセル',['class'=>'btn btn-danger form-control col-md-12']) !!}
    {!! Form::close() !!}
    @endif
  @else
    {!! Form::open(['url'=>'/teamuser/'.$team->id,'method'=>'PUT']) !!}
      {!! Form::submit('申込',['class'=>'btn btn-info form-control col-md-12']) !!}
    {!! Form::close() !!}
  @endif
</div>
@endsection
