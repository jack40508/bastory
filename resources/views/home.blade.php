@extends('layouts.header')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      @for ($i = 1; $i <= 10; $i++)
      <div class="col-md-10 mb-5">
          <div class="card">
              <div class="card-header">My event</div>

              <div class="card-body">

              </div>
          </div>
      </div>
      @endfor
    </div>
</div>
@endsection
