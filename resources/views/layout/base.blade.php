<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        @yield('meta')
        <title>Title-@yield('title','TOp')</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        @yield('css')

    </head>
    <body>
        @section('header')
        <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <a class="navbar-brand text-white" href="#">BRAND</a>
        </nav>
        @show

        @yield('container')

        @section('footer')
        
        @show
    </body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
@yield('js')
</html>
