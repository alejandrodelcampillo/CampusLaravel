<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
</head>
<body>
@include('layouts.navgrande')

<div class="container text-center" style="margin-top: 15px">
    <form class="text-center border p-2" role="form" method="post" style="margin: 10px" action="{{ route('save') }}">
        {{csrf_field()}}
    <table class="table table-bordered">
        <thead class="thead-light">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Usuario</th>
            <th scope="col">Email</th>
            <th scope="col">Tipo</th>
            <th scope="col">Editar / Eliminar</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $dato)
                <th scope="row">{{ $dato->id }}</th>
                <td>{{ $dato->name }}</td>
                <td>{{ $dato->email }}</td>
                @if($id == $dato->id)
                    <td>
                        <select name="type">
                            <option value="1">Alumno</option>
                            <option value="2">Profesor</option>
                            <option value="3">Administrador</option>
                        </select>
                    </td>
                    @else
                        @if( $dato->type == 1 )
                            <td>Usuario</td>
                            @elseif( $dato->type == 2 )
                                <td>Profesor</td>
                                @else
                                    <td>Administrador</td>
                        @endif
                @endif
                <td>
                    <a class="btn-group-sm text-dark" style="margin-right: 10px" href={{Route('modify_user', ['id'=>$dato->id])}}><i class="fas fa-user-edit"></i></a>
                    <a class="btn-group-sm text-dark" style="margin-left: 10px" href={{Route('delete_user', ['id'=>$dato->id])}}><i class="fa fa-trash"></i></a>
                </td>
            </tr>
            <input hidden type="text" value="{{ $dato->id }}" name="id">
        @endforeach
        </tbody>

    </table>
    <button type="submit" class="btn-success btn-group-toggle btn-lg"><i class="fas fa-check"></i> Aplicar Cambios</button>
    </form>
</div>
@include('layouts.footer')
</body>
</html>