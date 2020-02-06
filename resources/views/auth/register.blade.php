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
                  @if ($errors->any())
                      <div class="alert alert-danger">
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                  @endif
                  {!! Form::open(['route' => 'register', 'method'=>'POST','files' => true]) !!}
                  <div class="form-group row">
                    {!! Form::label('名前：',"",['class'=>'col-md-4 text-md-right']) !!}
                    {!! Form::text('name',"",['class'=>'form-control col-md-6', 'required', 'autocomplete'=>'name']) !!}
                  </div>
                  <div class="form-group row">
                    {!! Form::label('ニックネーム：',"",['class'=>'col-md-4 text-md-right']) !!}
                    {!! Form::text('nickname',"",['class'=>'form-control col-md-6', 'required', 'autocomplete'=>'nickname']) !!}
                  </div>
                  <div class="form-group row">
                    {!! Form::label('メールアドレス：',"",['class'=>'col-md-4 text-md-right']) !!}
                    {!! Form::email('email',"",['class'=>'form-control col-md-6', 'required', 'autocomplete'=>'email']) !!}
                  </div>
                  <div class="form-group row">
                    {!! Form::label('パスワード：',"",['class'=>'col-md-4 text-md-right']) !!}
                    {!! Form::password('password',['class'=>'form-control col-md-6', 'required', 'autocomplete'=>'new-password']) !!}
                  </div>
                  <div class="form-group row">
                    {!! Form::label('パスワード確認：',"",['class'=>'col-md-4 text-md-right']) !!}
                    {!! Form::password('password_confirmation',['class'=>'form-control col-md-6', 'required', 'autocomplete'=>'new-password']) !!}
                  </div>
                  <div class="form-group row">
                    {!! Form::label('性別：',"",['class'=>'col-md-4 text-md-right']) !!}
                    {!! Form::radio('gender',"1",true,['class'=>'form-control col-md-2', 'autocomplete'=>'gender']) !!}男
                    {!! Form::radio('gender',"0",false,['class'=>'form-control col-md-2', 'autocomplete'=>'gender']) !!}女
                  </div>
                  <div class="form-group row">
                    {!! Form::label('誕生日：',"",['class'=>'col-md-4 text-md-right']) !!}
                    {!! Form::date('birthday',"",['class'=>'form-control col-md-6', 'required', 'autocomplete'=>'birthday']) !!}
                  </div>
                  <div class="form-group row">
                    {!! Form::label('投／打：',"",['class'=>'col-md-4 text-md-right']) !!}
                    {!! Form::select('pitchtype', ['1' => '右投', '2' => '左投', '3' => '両投'],"1",['class'=>'form-control col-md-2 text-md-right', 'autocomplete'=>'pitchtype']) !!}
                    {!! Form::select('hittype', ['1' => '右打', '2' => '左打', '3' => '両打'],"1",['class'=>'form-control col-md-2 text-md-right', 'autocomplete'=>'hittype']) !!}
                  </div>
                  <div class="form-group row">
                    {!! Form::label('ポジション：',"",['class'=>'col-md-4 text-md-right']) !!}
                    <div class="col-md-8">
                      <div class="row">
                        <div class="col-md-1">
                          {!! Form::checkbox('positions[]', '1', false, ['class'=>'form-control', 'autocomplete'=>'gender']) !!}投手
                        </div>
                        <div class="col-md-1">
                          {!! Form::checkbox('positions[]', '2', false, ['class'=>'form-control', 'autocomplete'=>'gender']) !!}捕手
                        </div>
                        <div class="col-md-1">
                          {!! Form::checkbox('positions[]', '3', false, ['class'=>'form-control', 'autocomplete'=>'gender']) !!}一塁手
                        </div>
                        <div class="col-md-1">
                          {!! Form::checkbox('positions[]', '4', false, ['class'=>'form-control', 'autocomplete'=>'gender']) !!}二塁手
                        </div>
                        <div class="col-md-1">
                          {!! Form::checkbox('positions[]', '5', false, ['class'=>'form-control', 'autocomplete'=>'gender']) !!}三塁手
                        </div>
                        <div class="col-md-1">
                          {!! Form::checkbox('positions[]', '6', false, ['class'=>'form-control', 'autocomplete'=>'gender']) !!}遊撃手
                        </div>
                        <div class="col-md-1">
                          {!! Form::checkbox('positions[]', '7', false, ['class'=>'form-control', 'autocomplete'=>'gender']) !!}左翼手
                        </div>
                        <div class="col-md-1">
                          {!! Form::checkbox('positions[]', '8', false, ['class'=>'form-control', 'autocomplete'=>'gender']) !!}中堅手
                        </div>
                        <div class="col-md-1">
                          {!! Form::checkbox('positions[]', '9', false, ['class'=>'form-control', 'autocomplete'=>'gender']) !!}右翼手
                        </div>
                        <div class="col-md-1">
                          {!! Form::checkbox('positions[]', '10', false, ['class'=>'form-control', 'autocomplete'=>'gender']) !!}指名打者
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
        		        {!! Form::label('写真：',"",['class'=>'col-md-4 text-md-right']) !!}
                    {!! Form::file('photo',['required']) !!}
        		      </div>
                </div><!--card body-->
                <div class="card-footer">
                  <div class="form-group">
                    {!! Form::submit('アカウント作成',['class'=>'btn btn-success form-control']) !!}
                    {!! Form::close() !!}
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
