@extends('layouts.login')

@section('content')
<!-- <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
<form class="form-signin" role="form" method="POST" action="{{ url('/register') }}">
        {{ csrf_field() }}
        <div class="form-signin-heading text-center">
            <h1 class="sign-title">Регистрация</h1>
            <img src="images/login-logo.png" alt=""/>
        </div>


        <div class="login-wrap">
            <p>Введите свои личные данные ниже</p>
            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required  placeholder="ФИО">
            <input id="email" type="text" class="form-control" placeholder="Email адрес" name="email" value="{{ old('email') }}" required>
            <input type="text" id='city' name='city' placeholder="Город" class="form-control">
            <input type="text" id='filial' name='filial' placeholder="Филиал" class="form-control">
            <input id="password" type="password" class="form-control" name="password" required placeholder="Пароль">
            <input  id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Повторите пароль">
            <button type="submit" class="btn btn-lg btn-login btn-block">
                <i class="fa fa-check"></i>
            </button>

            <div class="registration">
                Отменить регистрацию и перейти на страницу.
                <a href="{{ url('/login') }}" class="">
                    Вход
                </a>
            </div>

        </div>

    </form>
@endsection
