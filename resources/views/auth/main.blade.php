<!DOCTYPE html>

<html lang="ru">

<head>

    @include('basis.meta')

    @php(\Title::prepend('Admin'))

    <title>{{ \Title::render() }}</title>

    @include('basis.css')

    @yield('local-css')

    <link href='/css/auth.css' rel='stylesheet' type='text/css'>

</head>

<body>

<div class="container-fluid">

    <div class="row">
        <div class="col-md-12">
            {{--@include('header')--}}
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            @yield('body')
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            {{--@include('footer')--}}
        </div>
    </div>

</div>

@include('basis.js')

@yield('local-js')

</body>

</html>