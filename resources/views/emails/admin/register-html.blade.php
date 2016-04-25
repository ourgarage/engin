@extends('emails.admin.main')

@section('title')
    <p style="padding: 1em 0 0 0; font-weight: 600; font-size: 1.3em">Register complete</p>
@endsection

@section('body')

    <p>Link for Register Complete (confirm email)</p>

    <p>Name: {{ $user->name }}</p>

    <p>Token: {{ $user->hash }}</p>

    <a href="{{ route('index-admin', $user->hash) }}">
        confirm email
    </a>

@endsection

@section('footer')
    Something info about what all of this is not our fail =)
@endsection
