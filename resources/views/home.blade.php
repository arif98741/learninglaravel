<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<div class="max-w-sm mx-auto py-8">
    <form action="{{ url('upload') }}" method="post" enctype="multipart/form-data" >
        @csrf
        @method('post')
        <input type="file" name="image" id="image">
        <button type="submit">Upload</button>
    </form>
</div>
</body>
</html>
