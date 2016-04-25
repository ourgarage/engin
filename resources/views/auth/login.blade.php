@extends('auth.main')

@section('css')

    <link href="/packages/adminLTE/dist/css/AdminLTE.min.css" rel="stylesheet" type='text/css'>

    <link href="/packages/adminLTE/plugins/iCheck/square/blue.css" rel="stylesheet" type='text/css'>

@endsection

@section('body')

    <div class="container">

        <div class="row">

            <div class="login-box">

                <div class="login-logo">
                    <a href="/packages/adminLTE/index2.html"><b>Admin</b>LTE</a>
                </div>

                <div class="login-box-body">

                    <p class="login-box-msg">{{ trans('auth.login_form_head') }}</p>

                    <form role="form" method="POST" action="{{ route('login.post') }}">

                        {!! csrf_field() !!}

                        <div class="form-group has-feedback">
                            <input type="email" name="email" class="form-control" placeholder="Email"
                                   value="{{ old('email') }}">
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group has-feedback">
                            <input type="password" name="password" class="form-control" placeholder="{{ trans('auth.password') }}">
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="row">
                            <div class="col-xs-8">
                                <div class="checkbox icheck">
                                    <label>
                                        <input type="checkbox" name="remember"> {{ trans('auth.remember') }}
                                    </label>
                                </div>
                            </div>

                            <div class="col-xs-4">
                                <button type="submit" class="btn btn-primary btn-block btn-flat">{{ trans('auth.sign_in') }}</button>
                            </div>
                        </div>

                    </form>

                    <a href="{{ url('/password/reset') }}">{{ trans('auth.forgot') }}</a><br>
                    <a href="{{ route('register') }}" class="text-center">{{ trans('auth.new_register') }}</a>

                </div>

            </div>

        </div>

    </div>

@endsection

@section('js')

    <script src="/packages/adminLTE/plugins/iCheck/icheck.min.js"></script>

    <script src="/js/icheck-square-blue.js"></script>

@endsection
