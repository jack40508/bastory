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
      <div class="container-fluid">
        <div class="row justify-content-end full_page">
          <div class="col-md-6">
            <div class="card text-white card_input_profile">
              <div class="card-header"><h1>Bastory</h1></div>
              <div class="card-body">
              <form method="POST" action="{{ route('login') }}">
                  <div class="form-group mt-3">
                    {!! Form::label('login_account','アカウント：') !!}
                    {!! Form::text('account',null,['class'=>'form-control']) !!}
                  </div>
                  <div class="form-group mt-3">
                    {!! Form::label('password','パスワード：') !!}
                    {!! Form::password('password',['class'=>'form-control']) !!}
                  </div>
              </div><!--card body-->
              <div class="card-footer">
                <div class="form-group">
                  {!! Form::submit('ログイン',['class'=>'btn btn-secondary form-control']) !!}
                </div>
                {{ Form::close() }}
                <button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#inputInfoModal">新規登録</button>
              </div><!--card footer-->
            </div><!--card-->
          </div>
        </div>
      </div>

      <!--Input Info Modal-->
      <div class="modal fade" id="inputInfoModal" tabindex="-1" role="dialog" aria-labelledby="inputInfoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content text-white bg-dark">
            <div class="modal-header">
              <h5 class="modal-title" id="inputInfoModalLabel">新規登録</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              {{ Form::open(array('url' => 'foo/bar')) }}
                <div class="form-group mt-3">
                  <div class="row">
                    <div class="col-md-3 col-xs-12">
                      {!! Form::label('email','メールアドレス：') !!}
                    </div>
                    <div class="col-md-6 col-xs-12">
                      {!! Form::email('email',null,['class'=>'form-control', 'placeholder' => 'メールアドレスを入力してください']) !!}
                    </div>
                  </div>
                </div>
                <div class="form-group mt-3">
                  <div class="row">
                    <div class="col-md-3 col-xs-12">
                      {!! Form::label('new_password','パスワード：') !!}
                    </div>
                    <div class="col-md-6 col-xs-12">
                      {!! Form::password('password',['class'=>'form-control', 'placeholder' => 'パスワードを入力してください']) !!}
                    </div>
                  </div>
                </div>
                <div class="form-group mt-3">
                  <div class="row">
                    <div class="col-md-3 col-xs-12">
                      {!! Form::label('password_check','パスワード再確認：') !!}
                    </div>
                    <div class="col-md-6 col-xs-12">
                      {!! Form::password('password_check',['class'=>'form-control', 'placeholder' => 'も一度パスワードを入力してください']) !!}
                    </div>
                  </div>
                </div>
                <div class="form-group mt-3">
                  <div class="row">
                    <div class="col-md-3 col-xs-12">
                      {!! Form::label('name','名前：') !!}
                    </div>
                    <div class="col-md-6 col-xs-12">
                      {!! Form::text('name',null,['class'=>'form-control', 'placeholder' => '名前を入力してください']) !!}
                    </div>
                  </div>
                </div>
                <div class="form-group mt-3">
                  <div class="row">
                    <div class="col-md-3 col-xs-12">
                      {!! Form::label('nickname','ニックネーム：') !!}
                    </div>
                    <div class="col-md-6 col-xs-12">
                      {!! Form::text('nickname',null,['class'=>'form-control', 'placeholder' => 'ニックネームを入力してください']) !!}
                    </div>
                  </div>
                </div>
                <div class="form-group mt-3">
                  <div class="row">
                    <div class="col-md-3 col-xs-12">
                      {!! Form::label('gender','性別：') !!}
                    </div>
                    <div class="col-md-6 col-xs-12">
                      {!! Form::radio('gender', '男', true); !!}男　
                      {!! Form::radio('gender', '女'); !!}女
                    </div>
                  </div>
                </div>
                <div class="form-group mt-3">
                  <div class="row">
                    <div class="col-md-3 col-xs-12">
                      {!! Form::label('birthday','誕生日：') !!}
                    </div>
                    <div class="col-md-6 col-xs-12">
                      {!! Form::selectRange('year', 2019, 1900); !!}　年　{!! Form::selectRange('month', 1, 12); !!}　月　{!! Form::selectRange('day', 1, 31); !!}　日
                    </div>
                  </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button>
              {!! Form::submit('アカウント登録',['class'=>'btn btn-primary']) !!}
            </form>
            </div>
          </div>
        </div>
      </div>
    </body>
</html>
