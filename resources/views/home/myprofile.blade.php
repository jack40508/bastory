@extends('layouts.header')

@section('content')
<div class="row">
  <div class="sidenav bg-dark d-none d-md-block col-md-2">
    @include('layouts.leftarea_user')
  </div>
  <div class="main col-xs-11 col-md-11 mt-3 item-middle-center">
    <div class="card">
      <div class="card-header">
        <h1>{{ Auth::user()->name }}</h1>
      </div>
      <div class="card-body">
        @include('layouts.card-profile-player')
      </div>
    </div>
  </div>
</div>
@endsection
