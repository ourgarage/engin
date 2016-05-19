@extends('admin.main')

@section('css')

    <link href="/packages/adminLTE/plugins/iCheck/square/blue.css" rel="stylesheet" type='text/css'>

@endsection

@section('body-title')

    {{ trans('users.edit.title') }}

@endsection

@section('body')

    <div class="users-create">
        <div class="register-box">

            @include('admin.basis.notifications-page')

            <div class="login-box-body">
                <form action="{{ route('admin-users-update', ['id' => $admin->id]) }}" method="POST">
                    {!! csrf_field() !!}
                    {{ method_field('PUT') }}
                    <div class="form-group has-feedback">
                        <input type="text" name="name" class="form-control"
                               placeholder="{{ trans('users.create.form.name') }}"
                               value="{{ old('name', $admin->name) }}">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="email" name="email" class="form-control"
                               placeholder="{{ trans('users.create.form.email') }}"
                               value="{{ old('email', $admin->email) }}">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="text" name="password" class="form-control"
                               placeholder="{{ trans('users.create.form.password') }}">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <div class="col-xs-8">
                            <div class="checkbox icheck">
                                <label>
                                    <input type="checkbox" name="change_password"> {{ trans('users.edit.form.change_password') }}
                                </label>
                            </div>
                        </div>
                        <div class="col-xs-4 pull-right">
                            <button type="submit"
                                    class="btn btn-primary btn-block btn-flat">{{ trans('users.edit.form.submit') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script src="/packages/adminLTE/plugins/iCheck/icheck.min.js"></script>
    <script src="/js/icheck-square-blue.js"></script>
@endsection
