@extends('layouts.header')

@section('content')
<div class="row">
  <div class="sidenav bg-dark d-none d-md-block col-md-2">
    @include('layouts.leftarea_team')
  </div>
  <div class="main col-xs-11 col-md-11 mt-3">
    @include('layouts.list-member')
  </div>
</div>
@endsection
