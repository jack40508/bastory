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
        <div class="row justify-content-center full_page">
          <div class="col-md-10">
            <div class="card text-white card_input_profile">
              <div class="card-header"><h1>新規登録</h1></div>
                <div class="card-body">
                <form method="POST" action="{{ route('register') }}">
                  @csrf
                  <div class="form-group mt-3 row">
                    <label class="col-md-4 text-md-right" for="name">{{ __('名前：') }}</label>
                    <input id="name" type="text" class="form-control col-md-6" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                  </div>
                  <div class="form-group mt-3 row">
                    <label class="col-md-4 text-md-right" for="nickname">{{ __('ニックネーム：') }}</label>
                    <input id="nickname" type="text" class="form-control col-md-6" name="nickname" value="{{ old('nickname') }}" required autocomplete="nickname">
                  </div>
                  <div class="form-group mt-3 row">
                    <label class="col-md-4 text-md-right" for="email">{{ __('メールアドレス：') }}</label>
                    <input id="email" type="email" class="form-control col-md-6" name="email" value="{{ old('email') }}" required autocomplete="email">
                  </div>
                  <div class="form-group mt-3 row">
                    <label class="col-md-4 text-md-right" for="password">{{ __('パスワード：') }}</label>
                    <input id="password" type="password" class="form-control col-md-6" name="password" required autocomplete="new-password">
                  </div>
                  <div class="form-group mt-3 row">
                    <label class="col-md-4 text-md-right" for="password-confirm">{{ __('パスワード確認：') }}</label>
                    <input id="password-confirm" type="password" class="form-control col-md-6" name="password_confirmation" required autocomplete="new-password">
                  </div>
                  <div class="form-group mt-3 row">
                    <label class="col-md-4 text-md-right" for="password-confirm">{{ __('性別：') }}</label>
                    <input id="gender_male" type="radio" class="form-control col-md-2" name="gender" value="1" required autocomplete="new-password" checked>{{ __('男') }}
                    <input id="gender_female" type="radio" class="form-control col-md-2" name="gender" value="0" required autocomplete="new-password">{{ __('女') }}
                  </div>
                  <div class="form-group mt-3 row">
                    <label class="col-md-4 text-md-right" for="name">{{ __('誕生日：') }}</label>
                    <div class="col-md-7">
                      <div class="row">
                        <select id="birthday_year" class="form-control col-md-2" name="year" required autocomplete="year">
                          @for($i = 2019; $i > 1899; $i--)
                          <option value={{ $i }}>{{ $i }}</option>
                          @endfor
                        </select>{{ __('　年　') }}
                        <select id="birthday_month" class="form-control col-md-2" name="mounth" required autocomplete="mounth">
                          @for($i = 1; $i < 13; $i++)
                          <option value={{ $i }}>{{ $i }}</option>
                          @endfor
                        </select>{{ __('　月　') }}
                        <select id="birthday_day" class="form-control col-md-2" name="day" required autocomplete="day">
                          @for($i = 1; $i < 31; $i++)
                          <option value={{ $i }}>{{ $i }}</option>
                          @endfor
                        </select>{{ __('　日　') }}
                      </div>
                    </div>
                  </div>
                </div><!--card body-->
                <div class="card-footer">
                  <div class="form-group">
                    <button type="submit" class="btn btn-secondary form-control">
                        {{ __('アカウント作成') }}
                    </button>
                  </div>
                </form>
                <form method="GET" action="{{ route('login') }}">
                  <button type="submit" class="btn btn-primary btn-block">{{ __('アカウントを持っています') }}</button>
                </form>
                </div><!--card footer-->
            </div><!--card-->
          </div>
        </div>
      </div>
    </body>
</html>
