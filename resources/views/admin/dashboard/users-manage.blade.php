@extends('admin.dashboard.main')

@section('body-title')

    {{ trans('dashboard.users.title') }}

@endsection

@section('body')



    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Username</th>
            </tr>
            </thead>
            <tbody>
            @foreach($admins as $admin)
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>



@endsection
