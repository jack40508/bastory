<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bastory</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="/css/home/home.css" rel="stylesheet">

    <!-- Javascrip -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top navbar-expand-md shadow-sm">
      <a class="navbar-brand" href="/">
        <img src="/img/home/icon_bastory.png" width="35" height="35" class="d-inline-block align-top" alt="logo icon">
        Bastory
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo" aria-controls="navbarTogglerDemo" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarTogglerDemo">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          @if(isset($team))
            <li class="nav-item d-md-none">
              <a class="nav-link" href="/team/{{ $team->id }}">{{ $team->name }}<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item d-md-none">
              <a class="nav-link" href="/team/{{ $team->id }}">イベント<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item d-md-none">
              <a class="nav-link" href="/team/{{ $team->id }}/member">メンバー<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item d-md-none">
              <a class="nav-link" href="team/{{ $team->id }}/profile">プロフィール<span class="sr-only">(current)</span></a>
            </li>
          @else
            <li class="nav-item d-md-none">
              <a class="nav-link" href="/">{{ Auth::user()->name }}<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item d-md-none">
              <a class="nav-link" href="/">イベント<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item d-md-none">
              <a class="nav-link" href="/myteam">チーム<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item d-md-none">
              <a class="nav-link" href="/myprofile">プロフィール<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item d-md-none">
              <a class="nav-link" href="/post">サインボード<span class="sr-only">(current)</span></a>
            </li>
          @endif
          {!! Form::open(['url'=>'/search/searchresult','method'=>'GET','class'=>'form-inline ml-3']) !!}
            <div class="form-group row">
              {!! Form::text('condition',"",['class'=>'form-control mr-sm-2','placeholder'=>'チーム番号/チーム名','required']) !!}
              {!! Form::submit('検索',['class'=>'btn btn-secondary form-control my-2 my-sm-0']) !!}
            </div>
          {!! Form::close() !!}
        </ul>
      </div>

      <!-- Right Side Of Navbar -->
      <ul class="navbar-nav ml-auto d-none d-md-block">
        <li class="nav-item dropdown">
          <a id="navbarRightDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->name }} <span class="caret"></span>
          </a>

          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarRightDropdown">
            <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                {{ __('ログアウト') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          </div>
        </li>
      </ul>
    </nav>
    <div class="container-fluid">
      @yield('content')
    </div>

  </body>
</html>
