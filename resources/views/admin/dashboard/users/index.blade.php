@extends('admin.dashboard.main')

@section('body-title')

    {{ trans('users.index.title') }}
    <form class="pull-right" action="{{ route('admin.users.create') }}" method="GET">
        {{ csrf_field() }}
        <button class="btn btn-success">
            <i class="fa fa-plus"></i> {{ trans('users.button.create') }}
        </button>
    </form>


@endsection

@section('body')

    <div class="users-index">
        @include('admin.dashboard.users.table', ['admins', $admins])
    </div>

@endsection
