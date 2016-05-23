<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ config('project-values.admin_avatar') }}" class="img-circle" alt="User Image">
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
            @foreach($items as $item)
                <li class="{{ isset($left_menu_item) && $left_menu_item == $item['active'] ? 'active' : '' }}">
                    <a href="{{ $item['url'] }}">
                        <i class="{{ $item['icon'] }}"></i> <span>{{ $item['caption'] }}</span>
                    </a>
                </li>
            @endforeach
            <li class="treeview">
                <a href="{{ route('admin-users-index') }}">
                    <i class="fa fa-users fa-fw"></i>
                    <span>{{ trans('dashboard.left-menu.administrators') }}</span>
                </a>
            </li>
        </ul>
    </section>
</aside>
