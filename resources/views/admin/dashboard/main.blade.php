<!DOCTYPE html>

<html lang="ru">

<head>

    @include('admin.basis.meta')

    <title>{{ \Title::render() }}</title>

    @include('admin.basis.css')

    @yield('css')

    <link href='/css/dashboard.css' rel='stylesheet' type='text/css'>

</head>

<body class="hold-transition skin-blue sidebar-mini admin-dashboard">

@include('admin.basis.notifications-top')

<div class="wrapper">

    @include('admin.dashboard.partials.header')

    @include('admin.dashboard.partials.left-menu')


    <div class="content-wrapper">
        @yield('body')
    </div>

    @include('admin.dashboard.partials.footer')

</div>

@include('admin.basis.js')

@yield('js')

</body>

</html>
