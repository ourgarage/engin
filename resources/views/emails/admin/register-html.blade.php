@extends('emails.admin.main')

@section('title')
    Register complete
@endsection

@section('body')

    <p>Link for Register Complete (confirm email)</p>

    <p>{{ $token }}</p>

    <a href="{{ route('index-admin', $token) }}">
        confirm email
    </a>

@endsection

@section('footer')
    Something info about what all of this is not our fail =)
@endsection
