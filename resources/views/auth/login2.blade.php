@extends('layouts.app')

@section('content')
<div class="container">
    <div id="login">
        <img src="/dist/img/logo.png" width="100" height="100">
        <p> <h1><strong>Rumah Sakit Umum Bakti Mulia</strong></h1></p>
        <h1><strong>Selamat Datang di Sistem Informasi</strong><br> Rumah Sakit Terpadu</h1>
    </div>

    <div class="z-depth-3 y-depth-5 x-depth-3 grey green-text lighten-5 row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel" style="background-color:;">
                <div class="panel-heading"></div>
                <div class="panel-body">
                    <form class="form" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="username" class="col-md-4 control-label">Username</label>

                            <div class="col-md-6">
                                <input id="username" type="username" class="form-control" name="username" value="{{ old('username') }}">

                                @if ($errors->has('username'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('username') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Ingat Saya
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn white black-text  waves-effect z-depth-1 y-depth-1">
                                    <i class="fa fa-btn fa-sign-in"> Login</i>
                                </button>

                                <a class="btn btn-link" href="{{ url('/password/reset') }}">Lupa Password?</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
