<form class="pull-right" action="{{ route('admin.users.create') }}" method="GET">
    {{ csrf_field() }}
    <button class="btn btn-success">
        <i class="fa fa-plus"></i> {{ trans('users.button.create') }}
    </button>
</form>
