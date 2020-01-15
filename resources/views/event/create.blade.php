@extends('layouts.header')

@section('content')
  <div class="row justify-content-center mt-3">
    <div class="col-md-10">
      <div class="card text-white bg-dark">
        <div class="card-header"><h2>新イベント</h2></div>
          <div class="card-body">
            {!! Form::open(['url'=>'/event','method'=>'POST']) !!}
            <div class="form-group row">
		          {!! Form::label('イベント名：',"",['class'=>'col-md-4 text-md-right']) !!}
              {!! Form::text('name',"",['class'=>'form-control col-md-6','required']) !!}
		        </div>
            <div class="form-group row">
		          {!! Form::label('チーム：',"",['class'=>'col-md-4 text-md-right']) !!}
              {!! Form::select('team',$teams,"",['class'=>'form-control col-md-6','required']) !!}
		        </div>
            <div class="form-group row">
              {!! Form::label('相手名：',"",['class'=>'col-md-4 text-md-right']) !!}
              {!! Form::text('rival',"",['class'=>'form-control col-md-6']) !!}
		        </div>
            <div class="form-group row">
		          {!! Form::label('試合類別：',"",['class'=>'col-md-4 text-md-right']) !!}
              {!! Form::select('eventtype', $eventtypes, null,['class'=>'form-control col-md-6'] ) !!}
		        </div>
            <div class="form-group row">
		          {!! Form::label('場所：',"",['class'=>'col-md-4 text-md-right']) !!}
              {!! Form::text('location',"",['class'=>'form-control col-md-6','required']) !!}
		        </div>
            <div class="form-group row">
		          {!! Form::label('住所：',"",['class'=>'col-md-4 text-md-right']) !!}
              {!! Form::text('address',"",['class'=>'form-control col-md-6','required']) !!}
		        </div>
            <div class="form-group row">
		          {!! Form::label('日期：',"",['class'=>'col-md-4 text-md-right']) !!}
              {!! Form::date('date',"",['class'=>'form-control col-md-3','required']) !!}
              {!! Form::time('time',"",['class'=>'form-control col-md-3','required']) !!}
		        </div>
            <div class="form-group row">
		          {!! Form::label('集合時間：',"",['class'=>'col-md-4 text-md-right']) !!}
              {!! Form::time('gathertime',"",['class'=>'form-control col-md-6','required']) !!}
		        </div>
            <div class="form-group row">
		          {!! Form::label('紹介：',"",['class'=>'col-md-4 text-md-right']) !!}
              {!! Form::textarea('contant', null, ['class'=>'form-control col-md-6','maxlength'=>'40']) !!}
		        </div>
            <div class="row justify-content-center">
            {!! Form::submit('送信',['class'=>'btn btn-secondary form-control col-md-4']) !!}
            </div>
            {!! Form::close() !!}
          </div><!--card body-->
          <div class="card-footer">

          </div><!--card footer-->
      </div><!--card-->
    </div>
  </div>
@endsection
