@extends('auth.main')

@section('css')

    <link href="/packages/adminLTE/plugins/iCheck/square/blue.css" rel="stylesheet" type='text/css'>

@endsection

@section('body')

    <div class="container">
        <div class="row">
            <div class="register-box">
                <div class="register-logo">
                    <a href="/packages/adminLTE/index2.html"><b>Admin</b>LTE</a>
                </div>

                @include('basis.notifications-page')

                <div class="register-box-body">
                    <p class="login-box-msg">Register a new membership</p>
                    <form role="form" method="POST" action="{{ route('register.post') }}">
                        {!! csrf_field() !!}
                        <div class="form-group has-feedback">
                            <input type="text" class="form-control" placeholder="Name" name="name" value="{{ old('name') }}">
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}">
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <input type="password" class="form-control" placeholder="Password" name="password">
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <input type="password" class="form-control" placeholder="Retype password" name="password_confirmation">
                            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                        </div>
                        <div class="row">
                            <div class="col-xs-8">
                                <div class="checkbox icheck">
                                    <label>
                                        <input type="checkbox" name="rules"> I agree to the <a href="#">rules</a>
                                    </label>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
                            </div>
                        </div>
                    </form>
                    <a href="{{ route('login') }}">I already have a membership</a><br>
                    <a href="#" class="text-center">Support</a>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')

    <script src="/packages/adminLTE/plugins/iCheck/icheck.min.js"></script>

    <script src="/js/icheck-square-blue.js"></script>

@endsection
