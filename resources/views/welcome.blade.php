<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">


    </head>
    <body>
    @include('layouts.notlogued')
    <div class="container-materias">
        <div class="card-materias border" style="width: 18rem;">
            <img class="card-img-top" src="http://www.comunicacionesua.cl/wp-content/uploads/2018/11/coloquio-matematica.jpeg" alt="Card image cap">
            <div class="card-body text-center">
                <h5 class="card-title">Matemática II</h5>
                <p class="card-text">Aqui su descripción</p>
                <a href="#" class="btn btn-primary"> <i class="fas fa-info-circle"></i>  Mas información</a>
            </div>
        </div>
        <div class="card-materias border" style="width: 18rem;";>
            <img class="card-img-top" src="https://i.blogs.es/389033/programming/450_1000.jpg" alt="Card image cap">
            <div class="card-body text-center">
                <h5 class="card-title">Laboratorio V</h5>
                <p class="card-text">Aqui su descripción</p>
                <a href="#" class="btn btn-primary"> <i class="fas fa-info-circle"></i>  Mas información</a>
            </div>
        </div>
        <div class="card-materias border" style="width: 18rem;";>
            <img class="card-img-top" src="https://www.ipc3.com/wp-content/uploads/programming-java.jpg" alt="Card image cap">
            <div class="card-body text-center">
                <h5 class="card-title">Programación Avanzada I</h5>
                <p class="card-text">Aqui su descripción</p>
                <a href="#" class="btn btn-primary"> <i class="fas fa-info-circle"></i>  Mas información</a>
            </div>
        </div>
        <div class="card-materias border" style="width: 18rem;";>
            <img class="card-img-top" src="https://i.pinimg.com/originals/8e/e7/3b/8ee73b4b283b0dda5b415e2f2da7a254.jpg" alt="Card image cap">
            <div class="card-body text-center">
                <h5 class="card-title">Redes</h5>
                <p class="card-text">Aqui su descripción</p>
                <a href="#" class="btn btn-primary"> <i class="fas fa-info-circle"></i>  Mas información</a>
            </div>
        </div>
        <div class="card-materias border" style="width: 18rem;">
            <img class="card-img-top" src="https://www.britanico.edu.pe/blog/wp-content/uploads/2016/11/8-maneras-de-practicar-ingl%C3%A9s-en-clases-y-fuera-800x400.jpg" alt="Card image cap">
            <div class="card-body text-center">
                <h5 class="card-title">Ingles Técnico Avanzado I</h5>
                <p class="card-text">Aqui su descripción</p>
                <a href="#" class="btn btn-primary"> <i class="fas fa-info-circle"></i>  Mas información</a>
            </div>
        </div>
        <div class="card-materias border" style="width: 18rem;">
            <img class="card-img-top" src="https://www.dior.nl/wp-content/uploads/2015/09/scrum-board-1024x768.jpg" alt="Card image cap">
            <div class="card-body text-center">
                <h5 class="card-title">Metodología de Sistemas II</h5>
                <p class="card-text">Aqui su descripción</p>
                <a href="#" class="btn btn-primary"> <i class="fas fa-info-circle"></i>  Mas información</a>
            </div>
        </div>
        <div class="card-materias border" style="width: 18rem;">
            <img class="card-img-top" src="https://konclass.com/wp-content/uploads/2018/11/bases-de-datos.jpg" alt="Card image cap">
            <div class="card-body text-center">
                <h5 class="card-title">Base de datos II</h5>
                <p class="card-text">Aqui su descripción</p>
                <a href="#" class="btn btn-primary"> <i class="fas fa-info-circle"></i>  Mas información</a>
            </div>
        </div>
    </div>
    @include('layouts.footer')
    </body>
</html>
