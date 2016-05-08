@extends('admin.dashboard.main')

@section('body-title')

    {{ trans('users.index.title') }}

    @include('admin.dashboard.users.create-button')

@endsection

@section('body')

    @include('admin.dashboard.users.search-form')

    <div class="users-index">
        @include('admin.dashboard.users.table', ['admins', $admins])
    </div>

@endsection
