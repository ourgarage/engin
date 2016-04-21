@extends('auth.main')

@section('local-css')

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

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form role="form" method="POST" action="{{ route('password-email.post') }}">

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

                        <div class="row">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary btn-block btn-flat fa-envelope">
                                    Send Password Reset Link
                                </button>
                            </div>
                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

@endsection

@section('local-js')
@endsection
