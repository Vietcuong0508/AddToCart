<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <div class="text-center m-5">
        <h1>Create Products</h1>
        <form action="" method="post">
            @csrf
            <div class="row">
                <div class="col-6">
                    <input class="form-control" type="text" name="name" placeholder="Name" value="{{$edit->name}}">
                </div>
                <div class="col-6 form-group">
                    <input class="form-control" type="text" name="price" placeholder="Price" value="{{$edit->price}}">
                </div>
            </div>
            <div class="row">
                <div class="col-12 form-group">
                    <input class="form-control" type="text" name="thumbnail" placeholder="Thumbnail" value="{{$edit->thumbnail}}">
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Submit</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>
