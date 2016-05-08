<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ config('project-constants.admin_avatar') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ $user->name }}</p>
                <span><i class="fa fa-hashtag text-success"></i> {{ $user->id }}</span>
            </div>
        </div>
        <ul class="sidebar-menu">
            <li class="header text-uppercase">
                {{ trans('dashboard.left-menu.title') }}
            </li>
            <li class="treeview">
                <a href="{{ route('admin.users.index') }}">
                    <i class="fa fa-users fa-fw"></i>
                    <span>{{ trans('dashboard.left-menu.administrators') }}</span>
                </a>
            </li>
        </ul>
    </section>
</aside>
