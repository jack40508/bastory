@extends('layouts.header')

@section('content')
<div class="row">
  <div class="sidenav bg-dark d-none d-md-block col-md-2">
    @include('layouts.leftarea_user')
  </div>
  <div class="main col-xs-11 col-md-11 mt-3">
    <div class="card text-white bg-dark">
      <div class="card-header"><h2>新規チーム</h2></div>
        <div class="card-body">
          {!! Form::open(['url'=>'/post','method'=>'POST']) !!}
          <div class="form-group row">
            {!! Form::label('タイトル：',"",['class'=>'col-md-4 text-md-right']) !!}
            {!! Form::text('title',"",['class'=>'form-control col-md-6','required']) !!}
          </div>
          <div class="form-group row">
            {!! Form::label('チーム：',"",['class'=>'col-md-4 text-md-right']) !!}
            {!! Form::select('team',$teams,"",['class'=>'form-control col-md-6','required']) !!}
          </div>
          <div class="form-group row">
            {!! Form::label('エリア：',"",['class'=>'col-md-4 text-md-right']) !!}
            {!! Form::select('area', $areas, null, ['class'=>'form-control col-md-6'] ) !!}
          </div>
          <div class="form-group row">
            {!! Form::label('募集対象：',"",['class'=>'col-md-4 text-md-right']) !!}
            {!! Form::select('type', $types, null, ['class'=>'form-control col-md-6'] ) !!}
          </div>
          <div class="form-group row">
            {!! Form::label('コメント：',"",['class'=>'col-md-4 text-md-right']) !!}
            {!! Form::textarea('content', null, ['class'=>'form-control col-md-6']) !!}
          </div>
        </div><!--card body-->
        <div class="card-footer row justify-content-center">
          {!! Form::submit('送信',['class'=>'btn btn-secondary form-control col-md-4']) !!}
          {!! Form::close() !!}
        </div><!--card footer-->
    </div><!--card-->
  </div>
</div>
@endsection
