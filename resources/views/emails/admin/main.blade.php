<!DOCTYPE html>

<html lang="ru">

<head>

    <meta charset="utf-8">

</head>

<body>

    <table style="width:100%;">

        <tbody>

            <tr>
                <td>
                    {{--For Example--}}
                    {{--<img src="{{ $message->embed(public_path(config('image.admin-email-logo'))) }}"--}}
                    {{--alt="logo" style="width: 4em;>--}}
                </td>
            </tr>

            <tr>
                <td>
                    @yield('title')
                </td>
            </tr>

            @yield(body)

            <tr>
                <td>
                    @yield('footer')
                </td>
            </tr>

        </tbody>

    </table>

</body>

</html>
