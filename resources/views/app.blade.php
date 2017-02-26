<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ isset($title) ? $title . ' - ' : '' }}Summaryze</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <script>
            window.Laravel = { csrfToken: '{!! csrf_token()  !!}' }
        </script>
    </head>
    <body>
    <div id="app">
        @yield('content')
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
