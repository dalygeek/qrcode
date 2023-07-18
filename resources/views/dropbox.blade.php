<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @if ($errors->any())
        <h4>{{$errors->first()}}</h4>
    @endif
    
    <div class="" style="height: 50px"></div>

    <form action="{{ url('/updropbox') }}" method="post"  enctype="multipart/form-data">
    {{ csrf_field() }}

    <input type="file" name="myfile" id="myfile">
    <input type="submit" value="Upload to dropbox">
</form>
</body>
</html>