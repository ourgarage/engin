@extends('admin.auth.main')

@section('body')

    <div class="container">
        <div class="row">
            <div class="login-box">
                <div class="page-logo">
                    <img src="{{ config('project.logo_full') }}" alt="logo">
                </div>

                @include('admin.basis.notifications-page')

                <div class="login-box-body">
                    <p class="login-box-msg">{{ trans('password.form.password-form-title') }}</p>
                    <form role="form" method="POST" action="{{ route('password-reset.post') }}">
                        {!! csrf_field() !!}
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="form-group has-feedback">
                            <input type="email" class="form-control" placeholder="{{ trans('password.form.password-email-placeholder') }}" name="email" value="{{ old('email') }}">
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <input type="password" class="form-control" placeholder="{{ trans('password.form.password-password-placeholder') }}" name="password">
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <input type="password" class="form-control" placeholder="{{ trans('password.form.password-confirmation-placeholder') }}" name="password_confirmation">
                            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                        </div>
                        <div class="row">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary btn-block btn-flat">
                                    {{ trans('password.button.password-form-submit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

