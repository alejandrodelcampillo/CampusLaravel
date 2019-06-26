<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>
<body>
@include('layouts.navgrande')
<div class="container text-center">
    <table class="table table-bordered" style="border-radius: 20px; background-color: white; margin-top: 20px; margin-bottom: 20px">
        <thead class="thead-light">
        <tr>
            <th scope="col">Ver materia</th>
            <th scope="col">Materia</th>
            @if(Auth::user()->type!=1)
            <th scope="col">Profesor</th>
            @endif
            @if(Auth::user()->type==3)
            <th scope="col">Editar</th>
            @endif
        </tr>
        </thead>
        <tbody>
        @foreach($datos as $dato)
        <tr>
            <th scope="row"><a href="{{action('MateriaController@verificarpass',['dato'=>$dato->subject_id])}}">Ingresar</a></th>
            <td>{{$dato->name_m}} </td>
            @if(Auth::user()->type!=1)
            <td>{{$dato->name}}</td>
            @endif
            @if(Auth::user()->type==3)
            <td><a class="btn-group-sm text-dark" href={{Route('modify_materia', ['id'=>$dato->id])}}><i class="fas fa-user-edit"></i></a></td>
            @endif
        </tr>
        @endforeach

        </tbody>
    </table>
</div>
@include('layouts.footer')
</body>
</html>
