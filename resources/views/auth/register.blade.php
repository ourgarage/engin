@extends('auth.main')

@section('css')

    <link href="/packages/adminLTE/dist/css/AdminLTE.min.css" rel="stylesheet" type='text/css'>

    <link href="/packages/adminLTE/plugins/iCheck/square/blue.css" rel="stylesheet" type='text/css'>

@endsection

@section('body')

    <div class="container">

        <div class="row">

            <div class="register-box">

                <div class="register-logo">
                    <a href="/packages/adminLTE/index2.html"><b>Admin</b>LTE</a>
                </div>

                <div class="register-box-body">

                    <p class="login-box-msg">{{ trans('auth.new_register') }}</p>

                    <form role="form" method="POST" action="{{ route('register.post') }}">

                        {!! csrf_field() !!}

                        <div class="form-group has-feedback">
                            <input type="text" class="form-control" placeholder="{{ trans('auth.name') }}" name="name" value="{{ old('name') }}">
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>

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
                            <input type="password" class="form-control" placeholder="{{ trans('auth.password') }}" name="password">
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group has-feedback">
                            <input type="password" class="form-control" placeholder="{{ trans('auth.r_password') }}" name="password_confirmation">
                            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                            @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="row">
                            <div class="col-xs-8">
                                <div class="checkbox icheck">
                                    <label>
                                        <input type="checkbox"> {{ trans('auth.i_agree') }} <a href="#">{{ trans('auth.rules') }}</a>
                                    </label>
                                </div>
                            </div>

                            <div class="col-xs-4">
                                <button type="submit" class="btn btn-primary btn-block btn-flat">{{ trans('auth.register') }}</button>
                            </div>
                        </div>

                    </form>

                    <a href="{{ route('login') }}">{{ trans('auth.i_membership') }}</a><br>
                    <a href="#" class="text-center">{{ trans('auth.support') }}</a>

                </div>

            </div>

        </div>

    </div>

@endsection

@section('js')

    <script src="/packages/adminLTE/plugins/iCheck/icheck.min.js"></script>

    <script src="/js/icheck-square-blue.js"></script>

@endsection
