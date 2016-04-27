@extends('emails.admin.main')

@section('title')
    <p style="padding: 1em 0 0 0;
    font-weight: 600;
    font-size: 1.3em">
        Password reset
    </p>
@endsection

@section('body')

    <p>Click here to reset your password</p>

    <a href="{{ route('password-reset', $token) }}"
       style="display:block;text-align:center; margin: 2.3em; text-decoration: none;">
        <span style="background: #0087ff; padding: 1em 1.8em; border-radius: .26em; font-size: 1.1em;color: #FFFFFF; text-transform: uppercase; font-weight: 600;">
            Reset
        </span>
    </a>

@endsection

@section('footer')
    <p style="border-top: .1em solid #676870;
        padding-top: .52em;
        color: #676870;
        font-size: .85em;
        ">
        Unless you were the initiator of password reset on the site <a href="{{ route('index') }}">ВСТАВИТЬ НАЗВАНИЕ</a>, then no response from you is not
        required
    </p>
@endsection
