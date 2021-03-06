<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"
          integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
            text-align: center;
            overflow-x: hidden;
        }

        button {
            cursor: pointer;
        }

        .col-centered{
            margin: 0 auto;
        }

        .completed {
            text-decoration: line-through;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    @yield('content')
</div>
<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('js/notify.min.js') }}"></script>
<script>
    @if(Session::has('success'))
        $.notify('{{ Session::get('success') }}', 'success')
    @endif
    @if(Session::has('error'))
        $.notify('{{ Session::get('error') }}', 'error')
    @endif
</script>
</body>
</html>
