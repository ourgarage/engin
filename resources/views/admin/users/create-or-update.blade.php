@extends('admin.main')

@section('css')
    @if(isset($admin))
        <link href="/packages/adminLTE/plugins/iCheck/square/blue.css" rel="stylesheet" type='text/css'>
    @endif
@endsection

@section('body-title')

    {{ isset($admin) ? trans('users.edit.title') : trans('users.create.title') }}

@endsection

@section('body')

    <div class="users-create">
        <div class="register-box">

            @include('admin.basis.notifications-page')

            <div class="login-box-body">

                <form action="{{ route('admin-users-store', ['id' => isset($admin) ? $admin->id : null]) }}"
                      method="POST">
                    {!! csrf_field() !!}
                    <div class="form-group has-feedback">
                        <input type="text" name="name" class="form-control"
                               placeholder="{{ trans('users.create.form.name') }}"
                               @if(isset($admin)) value="{{ old('name', $admin->name) }}" @endif>
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="email" name="email" class="form-control"
                               placeholder="{{ trans('users.create.form.email') }}"
                               @if(isset($admin)) value="{{ old('email', $admin->email) }}" @endif>
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="text" name="password" class="form-control"
                               placeholder="{{ trans('users.create.form.password') }}">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">
                        @if(isset($admin))
                            <div class="col-xs-8">
                                <div class="checkbox icheck">
                                    <label>
                                        <input type="checkbox"
                                               name="change_password"> {{ trans('users.edit.form.change_password') }}
                                    </label>
                                </div>
                            </div>
                        @endif
                        <div class="col-xs-4 pull-right">
                            <button type="submit"
                                    class="btn btn-primary btn-block btn-flat">{{ isset($admin) ? trans('users.edit.form.submit') : trans('users.create.form.submit') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('js')
    @if(isset($admin))
        <script src="/packages/adminLTE/plugins/iCheck/icheck.min.js"></script>
        <script src="/js/icheck-square-blue.js"></script>
    @endif
@endsection
