@extends('layouts.header')

@section('content')
<div class="row">
  <div class="sidenav bg-dark d-none d-md-block col-md-2">
    @include('layouts.leftarea_user')
  </div>
  <div class="main col-xs-11 col-md-11 mt-3">
    <div class="card">
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
