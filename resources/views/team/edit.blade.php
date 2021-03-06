@extends('layouts.header')

@section('content')
  <div class="row justify-content-center mt-3">
    <div class="col-md-10">
      <div class="card text-white bg-dark">
        <div class="card-header"><h2></h2></div>
          <div class="card-body">
            {!! Form::open(['url'=>'/team/'.$team->id,'method'=>'PUT','files' => true]) !!}
            <div class="form-group row">
		          {!! Form::label('チーム名：',"",['class'=>'col-md-4 text-md-right']) !!}
              {!! Form::text('name',$team->name,['class'=>'form-control col-md-6','required']) !!}
		        </div>
            <div class="form-group row">
		          {!! Form::label('エリア：',"",['class'=>'col-md-4 text-md-right']) !!}
              {!! Form::select('area', $areas, $team->area_id, ['class'=>'form-control col-md-6'] ) !!}
		        </div>
            <div class="form-group row">
		          {!! Form::label('チームロゴ：',"",['class'=>'col-md-4 text-md-right']) !!}
              {!! Form::file('logo') !!}
		        </div>
            <div class="form-group row">
		          {!! Form::label('紹介：',"",['class'=>'col-md-4 text-md-right']) !!}
              {!! Form::textarea('about', $team->about, ['class'=>'form-control col-md-6', 'maxlength'=>'40']) !!}
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
