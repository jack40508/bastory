@extends('layouts.header')

@section('content')
  <div class="row justify-content-center mt-3">
    <div class="col-md-10">
      <div class="card text-white bg-dark">
        <div class="card-header"><h2>新規チーム</h2></div>
          <div class="card-body">
            {!! Form::open(['url'=>'/team','method'=>'POST','files' => true]) !!}
            <div class="form-group row">
		          {!! Form::label('チーム名：',"",['class'=>'col-md-4 text-md-right']) !!}
              {!! Form::text('name',"",['class'=>'form-control col-md-6','required']) !!}
		        </div>
            <div class="form-group row">
		          {!! Form::label('エリア：',"",['class'=>'col-md-4 text-md-right']) !!}
              {!! Form::select('area', $areas, null ) !!}
		        </div>
            <div class="form-group row">
		          {!! Form::label('チームロゴ：',"",['class'=>'col-md-4 text-md-right']) !!}
              {!! Form::file('logo',['required']) !!}
		        </div>
            <div class="form-group row">
		          {!! Form::label('紹介：',"",['class'=>'col-md-4 text-md-right']) !!}
              {!! Form::textarea('about', null, ['maxlength'=>'40','width' => '100%']) !!}
		        </div>
            {!! Form::submit('送信',['class'=>'btn btn-secondary form-control']) !!}
            {!! Form::close() !!}
          </div><!--card body-->
          <div class="card-footer">

          </div><!--card footer-->
      </div><!--card-->
    </div>
  </div>
@endsection
