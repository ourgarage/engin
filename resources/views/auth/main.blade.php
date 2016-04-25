<!DOCTYPE html>

<html lang="ru">

<head>

    @include('basis.meta')

    <title>{{ \Title::render() }}</title>

    @include('basis.css')

    @yield('css')

    <link href='/css/auth.css' rel='stylesheet' type='text/css'>

</head>

<body>

<div class="container-fluid">

    @include('basis.notification-on-page')

    <div class="row">
        <div class="col-md-12">
            @yield('body')
        </div>
    </div>

</div>

@include('basis.js')

@yield('js')

</body>

</html>
