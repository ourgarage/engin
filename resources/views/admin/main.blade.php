<!DOCTYPE html>

<html lang="ru">

<head>

    @include('basis.meta')

    <title>{{ \Title::render() }}</title>

    @include('basis.css')

    @yield('css')

    <link href="/packages/adminLTE/dist/css/AdminLTE.min.css" rel="stylesheet" type='text/css'>

    <link rel="stylesheet" href="/packages/adminLTE/dist/css/AdminLTE.min.css">

    <link rel="stylesheet" href="/packages/adminLTE/dist/css/skins/_all-skins.min.css">

</head>

<body>

<div class="container-fluid">

    <div class="row">

        <div class="hold-transition skin-blue sidebar-mini">

            <div class="wrapper">

                @include('admin.partials.header')

                @include('admin.partials.left-menu')

                <div class="content-wrapper">

                    <section class="content-header">
                        <h1>
                            Blank page
                        </h1>
                        <ol class="breadcrumb">
                            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                            <li><a href="#">Examples</a></li>
                            <li class="active">Blank page</li>
                        </ol>
                    </section>

                    <section class="content">
                        @yield('body')
                    </section>

                </div>

                @include('admin.partials.footer')

            </div>

        </div>

    </div>

</div>

@include('basis.js')

<script src="/packages/adminLTE/plugins/slimScroll/jquery.slimscroll.min.js"></script>

<script src="/packages/adminLTE/plugins/fastclick/fastclick.min.js"></script>

<script src="/packages/adminLTE/dist/js/app.min.js"></script>

@yield('js')

</body>

</html>

