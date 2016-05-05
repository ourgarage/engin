<!DOCTYPE html>

<html lang="ru">

<head>

    @include('admin.basis.meta')

    <title>{{ \Title::render() }}</title>

    @include('admin.basis.css')

    @yield('css')

</head>

<body>

@include('admin.basis.notifications-top')

<div class="container-fluid">
    <div class="row">
        <div class="hold-transition skin-blue sidebar-mini">
            <div class="wrapper">

                @include('admin.partials.header')

                @include('admin.partials.left-menu')

                <div class="content-wrapper">
                    <section class="content-header">
                        <h1></h1>
                    </section>
                    <section class="content">

                        @yield('body')

                    </section
                </div>

                @include('admin.partials.footer')

            </div>
        </div>
    </div>
</div>

@include('admin.basis.js')

@yield('js')

</body>

</html>
