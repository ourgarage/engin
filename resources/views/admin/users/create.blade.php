@extends('admin.main')

@section('body-title')

    {{ trans('users.create.title') }}

@endsection

@section('body')

    <div class="users-create">
        <div class="register-box">

            @include('admin.basis.notifications-page')

            <div class="login-box-body">
                <form action="{{ route('admin-users-store') }}" method="POST">
                    {!! csrf_field() !!}
                    <div class="form-group has-feedback">
                        <input type="text" name="name" class="form-control"
                               placeholder="{{ trans('users.create.form.name') }}"
                               value="{{ old('name') }}">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="email" name="email" class="form-control"
                               placeholder="{{ trans('users.create.form.email') }}"
                               value="{{ old('email') }}">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="text" name="password" class="form-control"
                               placeholder="{{ trans('users.create.form.password') }}">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 pull-right">
                            <button type="submit"
                                    class="btn btn-primary btn-block btn-flat">{{ trans('users.create.form.submit') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
