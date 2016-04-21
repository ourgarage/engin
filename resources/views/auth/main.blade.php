<!DOCTYPE html>

<html lang="ru">

<head>

    @include('basis.meta')

    {{--Laravel-Title Package--}}

    @include('basis.css')

    @yield('local-css')

</head>

<body style="background: #eeeeee;">

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