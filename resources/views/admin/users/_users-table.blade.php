@if(!$admins->isEmpty())
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Id</th>
                <th>{{ trans('users.search.table.name') }}</th>
                <th>{{ trans('users.search.table.email') }}</th>
                <th>{{ trans('users.search.table.role') }}</th>
                <th>{{ trans('users.search.table.created') }}</th>
                <th>{{ trans('users.search.table.options') }}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($admins as $admin)
                <tr>
                    <th>{{ $admin->id }}</th>
                    <td>{{ $admin->name }}</td>
                    <td>{{ $admin->email }}</td>
                    <td class="text-capitalize">{{ $admin->roles }}</td>
                    <td>{{ df($admin->created_at) }}</td>
                    <td class="for-form-inline">
                        <form action="{{ route('admin-users-status-update', ['id' => $admin->id]) }}"
                              method="POST">
                            {{ csrf_field() }}
                            @if($admin->status == \App\Models\User::STATUS_ACTIVE)
                                <button type="submit" onclick="return buttonConfirmation(event, 'Deactivate?')"
                                        class="btn btn-xs btn-success" data-toggle="tooltip" data-placement="top"
                                        title="{{ trans('users.tooltip.status') }}"><i class="fa fa-check"></i></button>
                            @else
                                <button type="submit" onclick="return buttonConfirmation(event, 'Activate?')"
                                        class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="top"
                                        title="{{ trans('users.tooltip.status') }}"><i class="fa fa-power-off"></i></button>
                            @endif
                        </form>
                        <form action="{{ route('admin-users-edit', ['id' => $admin->id]) }}" method="GET">
                            <button type="submit" class="btn btn-xs btn-warning" data-toggle="tooltip" data-placement="top"
                                    title="{{ trans('users.tooltip.edit') }}"><i class="fa fa-pencil"></i>
                            </button>
                        </form>
                        <form action="{{ route('admin-users-destroy', ['id' => $admin->id]) }}"
                              method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" onclick="return buttonConfirmation(event, 'Delete?')"
                                    class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="top" title="{{ trans('users.tooltip.delete') }}"><i class="fa fa-remove"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {!! $admins->render() !!}
    </div>
@else
    <div class="no-results text-center">
        <i class="fa fa-filter fa-3x"></i>
        <p>{{ trans('users.search.no-results') }}</p>
    </div>
@endif
