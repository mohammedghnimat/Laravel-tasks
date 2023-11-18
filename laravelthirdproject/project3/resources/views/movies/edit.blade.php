<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
          <h1>Edit Movie</h1>
          <form method="post" enctype="multipart/form-data" action="{{ route('movie.update',['movie'=>$movie]) }}">
            @csrf
            @method('put')
        <div>
            <label for="">Name</label>
            <input type="text" name="name" placeholder="name" value="{{ $movie->name }}">
        </div>
        <div>
            <label for="">Description</label>
            <input type="text" name="Description" placeholder="Description" value="{{ $movie->Description }}">
        </div>
         <div>
            <label for="">gener</label>
            <input type="text" name="gener" placeholder="Gener" value="{{ $movie->gener }}">
        </div>
        <div>
            <label for="">image</label>
            <input type="file" name="image" placeholder="image" value="{{ $movie->image }}">
        </div>
        <div>
            <input type="submit" value="Update">
        </div>
          </form>
</body>
</html>
