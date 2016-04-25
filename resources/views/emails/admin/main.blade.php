<!DOCTYPE html>

<html lang="ru">

<head>

    <meta charset="utf-8">

</head>

<body>

<div style="
    background: #3870a9;
    border-radius: .26em .26em 0 0;
    padding: 2.6em 0;">

    <img
        src="/images/logo/logo-0001.png"
        {{--src="{{ $message->embed(public_path('images/logo/logo-0001.png')) }}"--}}
        alt="logo"
        style="
     max-width:75vw;
     width:13em;
     display:block;
     margin: 0 auto;
     ">
    <p style="text-align: center;margin-top: .39em">High technologies</p>
</div>

<div>
    @yield('title')
</div>

<div>
    @yield('body')
</div>

<div>
    @yield('footer')
</div>

</body>

</html>
