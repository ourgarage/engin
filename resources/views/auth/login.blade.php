@extends('auth.main')

@section('css')

    <link href="/packages/adminLTE/plugins/iCheck/square/blue.css" rel="stylesheet" type='text/css'>

@endsection

@section('body')

    <div class="container">
        <div class="row">
            <div class="login-box">
                <div class="page-logo">
                    <img src="{{ env('VARIABLE_LOGO_FULL') }}" alt="logo">
                </div>

                @include('basis.notifications-page')

                <div class="login-box-body">
                    <p class="login-box-msg">{{ trans('auth.form.login-title') }}</p>
                    <form role="form" method="POST" action="{{ route('login.post') }}">
                        {!! csrf_field() !!}
                        <div class="form-group has-feedback">
                            <input type="email" name="email" class="form-control" placeholder="{{ trans('auth.form.login-email-placeholder') }}"
                                   value="{{ old('email') }}">
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <input type="password" name="password" class="form-control" placeholder="{{ trans('auth.form.login-password-placeholder') }}">
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        </div>
                        <div class="row">
                            <div class="col-xs-8">
                                <div class="checkbox icheck">
                                    <label>
                                        <input type="checkbox" name="remember"> {{ trans('auth.form.login-remember') }}
                                    </label>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <button type="submit" class="btn btn-primary btn-block btn-flat">{{ trans('auth.button.login-submit') }}</button>
                            </div>
                        </div>
                    </form>
                    <a href="{{ url('/password/reset') }}">{{ trans('auth.button.login-forgot-password') }}</a>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script src="/packages/adminLTE/plugins/iCheck/icheck.min.js"></script>
    <script src="/js/icheck-square-blue.js"></script>
@endsection
