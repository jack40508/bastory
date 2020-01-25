@extends('layouts.header')

@section('content')
<div class="row">
  <div class="sidenav bg-dark d-none d-md-block col-md-2">
    @include('layouts.leftarea_user')
  </div>
  <div class="main col-xs-11 col-md-11 mt-3">
    <div class="row">
      <div class="col-md-12">
        {!! Form::open(['url'=>'/search/searchresult','method'=>'GET']) !!}
          <div class="form-group row">
            {!! Form::text('condition',"",['class'=>'form-control col-md-6','placeholder'=>'チーム番号/チーム名','required']) !!}
            {!! Form::submit('検索',['class'=>'btn btn-secondary form-control col-md-2 ml-3']) !!}
          </div>
        {!! Form::close() !!}
      </div>
    </div>
    @if (isset($condition))
      <div class="row">
        <h1>{{ $condition }}で検索したら...</h1>
      </div>
      @if($teams->count() > 0)
        <div class="row">
          <h3>結果が{{ $teams->count() }} 件</h3>
        </div>
        <div class="row">
          @foreach($teams as $team)
            <div class="col-md-3 col-sm-3 col-xs-6 mt-3">
              @if($team->checkApply() == true)
                @if($team->checkMember() == true)
                <h4><span class="badge badge-success">参加中</span></h4>
                @else
                {!! Form::open(['url'=>'/teamuser/'.$team->id.'/destroy','method'=>'PUT']) !!}
                  {!! Form::submit('キャンセル',['class'=>'btn btn-danger form-control col-md-12']) !!}
                {!! Form::close() !!}
                @endif
              @else
                {!! Form::open(['url'=>'/teamuser/'.$team->id,'method'=>'PUT']) !!}
                  {!! Form::submit('申込',['class'=>'btn btn-info form-control col-md-12']) !!}
                {!! Form::close() !!}
              @endif
              <div class="mt-1">
                @include('layouts.card-team')
              </div>
            </div>
          @endforeach
        </div>
        @else
      <div class="row">
        <h3>結果がない</h3>
        @endif
      </div>
    @endif
  </div>
</div>
@endsection
