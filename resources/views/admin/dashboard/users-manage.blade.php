@extends('admin.dashboard.main')

@section('body-title')

    {{ trans('dashboard.users.title') }}

@endsection

@section('body')



    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Id</th>
                <th>{{ trans('dashboard.management.table.name') }}</th>
                <th>{{ trans('dashboard.management.table.email') }}</th>
                <th>{{ trans('dashboard.management.table.status') }}</th>
                <th>{{ trans('dashboard.management.table.role') }}</th>
                <th>{{ trans('dashboard.management.table.created') }}</th>
                <th>{{ trans('dashboard.management.table.options') }}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($admins as $admin)
                <tr>
                    <th>{{ $admin->id }}</th>
                    <td>{{ $admin->name }}</td>
                    <td>{{ $admin->email }}</td>
                    <td>
                        @if($admin->status == \App\Models\User::STATUS_ACTIVE)
                            <button class="btn btn-xs btn-success"><i class="fa fa-check"></i></button>
                        @elseif($admin->status == \App\Models\User::STATUS_INACTIVE)
                            <button class="btn btn-xs btn-danger"><i class="fa fa-power-off"></i></button>
                        @endif
                    </td>
                    <td class="text-capitalize">{{ $admin->roles }}</td>
                    <td>{{ dateFormat_dMY($admin->created_at) }}</td>
                    <th>
                        <button class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i></button>
                        <button class="btn btn-xs btn-danger"><i class="fa fa-remove"></i></button>
                    </th>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>



@endsection
