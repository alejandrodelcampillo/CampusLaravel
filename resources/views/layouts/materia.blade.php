
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
</head>
<body>
@include('layouts.navgrande')
<div class="container text-center">
    <div class="card-body">
        <div class="card" style="padding: 25px;margin: 20px;">
            <h1 class="text-lg-left text-warning">{{$arrai['dato'][0]->name_m}}</h1>
        </div>
        @foreach ($arrai['file'] as $file)
        <tr>
            <td>{{$file->file_title}}</td>
            <td>{{$file->created_at}}</td>
            <td>
                <a href="../public/storage/public/{{$file->file_name}}" download="{{$file->file_name}}">
                    <button type="button" class="btn btn-primary">
                    <i class="glyphicon glyphicon-download">
                        Descargar
                    </i>
                    </button>
                </a>
            </td>
        </tr>
        @endforeach
    </div>
<form action="{{action('FileController@store')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                Seleccionar archivo
<input type="file" name="fileToUpload" id="fileToUpload">
<input type="text" name="file_title" id="file_title">
<input type="hidden" name="subject_id" value="{{$arrai['dato'][0]->subject_id}}">
<input type="submit" value="Subir archivo" name="submit">
</form>
</div>
@include('layouts.footer')
</body>
</html>