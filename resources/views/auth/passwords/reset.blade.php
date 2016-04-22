@extends('auth.main')

@section('css')

    <link href="/packages/adminLTE/dist/css/AdminLTE.min.css" rel="stylesheet" type='text/css'>

@endsection

@section('body')

    <div class="container">

        <div class="row">

            <div class="login-box">

                <div class="login-logo">
                    <a href="/packages/adminLTE/index2.html"><b>Admin</b>LTE</a>
                </div>

                <div class="login-box-body">

                    <p class="login-box-msg">Reset Password</p>

                    <form role="form" method="POST" action="{{ route('password-reset.post') }}">

                        {!! csrf_field() !!}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group has-feedback">
                            <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}">
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group has-feedback">
                            <input type="password" class="form-control" placeholder="Password" name="password">
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group has-feedback">
                            <input type="password" class="form-control" placeholder="Retype password" name="password_confirmation">
                            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                            @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="row">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary btn-block btn-flat">
                                    Reset Password
                                </button>
                            </div>
                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

@endsection

