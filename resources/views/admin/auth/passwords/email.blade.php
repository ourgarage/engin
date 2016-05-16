@extends('admin.auth.main')

@section('body')

    <div class="container">
        <div class="row">
            <div class="login-box">
                <div class="page-logo">
                    <img src="{{ config('project-values.logo_full') }}" alt="logo">
                </div>

                @include('admin.basis.notifications-page')

                <div class="login-box-body">
                    <p class="login-box-msg">{{ trans('password.form.password-email-title') }}</p>
                    <form role="form" method="POST" action="{{ route('password-email.post') }}">
                        {!! csrf_field() !!}
                        <div class="form-group has-feedback">
                            <input type="email" name="email" class="form-control" placeholder="{{ trans('password.form.password-email-placeholder') }}"
                                   value="{{ old('email') }}">
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        </div>
                        <div class="row">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary btn-block btn-flat">
                                    {{ trans('password.button.password-email-submit') }}
                                </button>
                            </div>
                        </div>
                        <div class="form-description">
                            {{ trans('password.form.password-email-description') }}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
