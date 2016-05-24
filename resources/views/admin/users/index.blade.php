@extends('admin.main')

@section('body-title')

    {{ trans('users.index.title') }}

    @include('admin.users.create-button')

@endsection

@section('body')

    @include('admin.users.search-form')

    <div class="users-index">
        @include('admin.users._users-table', ['admins', $admins])
    </div>

@endsection
