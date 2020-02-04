<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Bastory</title>

        <!-- Styles -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link href="/css/home/login.css" rel="stylesheet">

        <!-- Javascrip -->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    </head>
    <body>
      <div class="container-fluid">
        <div class="row justify-content-end full_page">
          <div class="col-md-6">
            <div class="card text-white card_login">
              <div class="card-header">
                <h1><img src="/img/home/icon_bastory.png" width="50" height="50" class="d-inline-block align-top" alt="logo icon"> Bastory</h1>
                <!--<h1><img src="/img/home/logo.png" width="250" height="100" class="d-inline-block align-top" alt="logo icon"></h1>-->
              </div>
                <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                  @csrf
                  <div class="form-group mt-3">
                    <label for="email">{{ __('アカウント：') }}</label>
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                  </div>
                  <div class="form-group mt-3">
                    <label for="password">{{ __('パスワード：') }}</label>
                    <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password">
                  </div>
                </div><!--card body-->
                <div class="card-footer">
                  <div class="form-group">
                    <button type="submit" class="btn btn-secondary form-control">
                        {{ __('ログイン') }}
                    </button>
                  </div>
                </form>
                <form method="GET" action="{{ route('register') }}">
                  <button type="submit" class="btn btn-info btn-block">{{ __('新規登録') }}</button>
                </form>
                </div><!--card footer-->
            </div><!--card-->
          </div>
        </div>
      </div>
    </body>
</html>
