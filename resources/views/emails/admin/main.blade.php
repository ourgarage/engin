<!DOCTYPE html>

<html lang="ru">

<head>

    <meta charset="utf-8">

</head>

<body style="padding: 1em; background: #e9eaed;">

<div style="background: #ffffff; padding: 1em;">

    <div style="background: #3870a9; border-radius: .26em .26em 0 0; padding: 2.6em 0;">

        <img src="{{ $message->embed(public_path('images/logo/logo-0001.png')) }}"
             alt="logo"
             style="max-width: 75vw; width: 13em; display: block; margin: 0 auto;">

        <p style="text-align: center; margin: .39em 0 0 0; color: #f4f4f4; text-transform: uppercase">
            High technologies
        </p>
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

</div>

</body>

</html>
