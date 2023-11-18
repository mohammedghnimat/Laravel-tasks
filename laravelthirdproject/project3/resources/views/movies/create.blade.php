<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
          <h1>Create Movie</h1>
          <form method="POST" enctype="multipart/form-data" action="{{ route('movie.store') }}">
            @csrf
        <div>
            <label for="">Name</label>
            <input type="text" name="name" placeholder="name" required>
        </div>
        <div>
            <label for="">Description</label>
            <input type="text" name="Description" placeholder="Description" required>
        </div>
         <div>
            <label for="">gener</label>
            <input type="text" name="gener" placeholder="Gener" required>
        </div>
        <div>
            <label for="">image</label>
            <input type="file" name="image" placeholder="image" required>
        </div>
        <div>
            <input type="submit" value="save a new movie">
        </div>
          </form>
</body>
</html>
