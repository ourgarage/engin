@extends('emails.admin.main')

@section('title')
    <p style="padding: 1em 0 0 0;
    font-weight: 600;
    font-size: 1.3em">
        {{ trans('email.password-reset.title') }}
    </p>
@endsection

@section('body')

    <p>{{ trans('email.password-reset.description') }}</p>

    <a href="{{ route('password-reset', [$email, $token]) }}"
       style="display:block;text-align:center; margin: 2.3em; text-decoration: none;">
        <span style="background: #0087ff; padding: 1em 1.8em; border-radius: .26em; font-size: 1.1em;color: #FFFFFF; text-transform: uppercase; font-weight: 600;">
            {{ trans('email.password-reset.link-for-reset') }}
        </span>
    </a>

@endsection

@section('footer')
    <p style="border-top: .1em solid #676870;
        padding-top: .52em;
        color: #676870;
        font-size: .85em;
        ">
        {!! trans('email.password-reset.footer', ['link' => route('index'), 'site' => config('site.name_full')]) !!}
    </p>
@endsection
