<!DOCTYPE html>

<html lang="ru">

<head>

    @include('admin.basis.meta')

    <title>{{ \Title::render() }}</title>

    @include('admin.basis.css')

    @yield('css')

    <link href='/css/auth.css' rel='stylesheet' type='text/css'>

</head>

<body>

@include('admin.basis.notifications-top')

<div class="container-fluid">

    <div class="row">
        <div class="col-md-12">
            @yield('body')
        </div>
    </div>

</div>

@include('admin.basis.js')

@yield('js')

</body>

</html>
