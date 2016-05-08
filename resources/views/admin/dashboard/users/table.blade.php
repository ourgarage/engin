<div class="table-responsive">
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Id</th>
            <th>{{ trans('users.index.table.name') }}</th>
            <th>{{ trans('users.index.table.email') }}</th>
            <th>{{ trans('users.index.table.role') }}</th>
            <th>{{ trans('users.index.table.created') }}</th>
            <th>{{ trans('users.index.table.options') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($admins as $admin)
            <tr>
                <th>{{ $admin->id }}</th>
                <td>{{ $admin->name }}</td>
                <td>{{ $admin->email }}</td>
                <td class="text-capitalize">{{ $admin->roles }}</td>
                <td>{{ dateFormat_dMY($admin->created_at) }}</td>
                <td class="for-form-inline">
                    <form action="{{ route('status-update-admin', ['id' => $admin->id]) }}"
                          method="POST">
                        {{ csrf_field() }}
                        @if($admin->status == \App\Models\User::STATUS_ACTIVE)
                            <button type="submit" onclick="return buttonConfirmation(event, 'Deactivate?')"
                                    class="btn btn-xs btn-success"><i class="fa fa-check"></i></button>
                        @else
                            <button type="submit" onclick="return buttonConfirmation(event, 'Activate?')"
                                    class="btn btn-xs btn-danger"><i class="fa fa-power-off"></i></button>
                        @endif
                    </form>
                    <form action="{{ route('admin.users.edit', ['id' => $admin->id]) }}" method="GET">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i>
                        </button>
                    </form>
                    <form action="{{ route('admin.users.destroy', ['id' => $admin->id]) }}"
                          method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" onclick="return buttonConfirmation(event, 'Delete?')"
                                class="btn btn-xs btn-danger"><i class="fa fa-remove"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

{!! $admins->render() !!}