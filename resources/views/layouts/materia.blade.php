
<!DOCTYPE html>
<html xmlns:padding-right="http://www.w3.org/1999/xhtml">
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
<div class="container text-center" style="background-color: white; margin-top: 15px; margin-bottom: 15px; border-radius: 20px; padding-bottom: 15px">
    <div class="card-body">
        <div class="card" style="padding: 15px;margin: 10px;">
            <h1 class="text-lg-left text-warning">{{$arrai['dato'][0]->name_m}}</h1>
        </div>
        <div class="card" style="padding-left: 30px; padding-right: 30px">
            <h3 class="text-lg-left">Archivos</h3>
            <table>
                @foreach ($arrai['file'] as $file)
                    <tr class="text-lg-left">
                        <th>{{$file->file_title}}</th>
                        <th>{{$file->created_at}}</th>
                        <th>
                            <a href="/storage/public/{{$file->file_name}}" download="{{$file->file_name}}">
                                <button type="button" class="btn btn-warning btn-outline-dark">
                                    <i class="glyphicon glyphicon-download">
                                        Descargar
                                    </i>
                                </button>
                            </a>
                        </th>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
    @if(auth::user()->type==2)
    <div class="card text-lg-left" style="margin-bottom: 15px; padding-bottom: 10px; padding-top: 10px; padding-left: 30px; padding-right: 30px">
        <h3>Subir Archivos</h3>
        <form action="{{action('FileController@store')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            Seleccionar archivo
            <input class="btn btn-warning btn-outline-dark" type="file" name="fileToUpload" id="fileToUpload">
            <input type="text" name="file_title" id="file_title">
            <input type="hidden" name="subject_id" value="{{$arrai['dato'][0]->subject_id}}">
            <input class="btn btn-warning btn-outline-dark" type="submit" value="Subir archivo" name="submit">
        </form>
    </div>
    @endif

</div>
@include('layouts.footer')
</body>
</html>