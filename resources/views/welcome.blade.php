<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{mix('css/app.css')}}">
        <title>PizzaJust</title>

    </head>
    <body  class="bg__darkpizza">
    <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 text-center p-5">
                    <img src="img/logo.png" alt="">
                </div>
                <div class="col-md-12 text-center">
                    <h1>Bienvenido a PizzaJust!</h1>
                    <p>Esta area pertenece solo a personal administrativo.</p>
                    <a href="{{ route('login') }}" class="btn btn-sm btn-success">Iniciar Sesión</a>
                </div>
            </div>
        </div>
        <script src="{{mix('js/app.js')}}"></script>
    </body>
    </body>
</html>
