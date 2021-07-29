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
    <h2>List Products</h2>
    <table class="table table-dark table-hover">
        <thead>
        <tr class="text-center">
            <th>Name</th>
            <th>Price</th>
            <th class="col-2">Thumbnail</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($list as $obj)
            <tr class="text-center">
                <td>{{$obj->name}}</td>
                <td>{{$obj->price}}</td>
                <td><img src="{{$obj->thumbnail}}" width="30%"  ></td>
                <td>
                    <a href="/add?productId={{$obj->id}}&productQuantity=1">
                        <button class="btn btn-primary">Add to cart</button>
                    </a>
                </td>
            </tr>
        @endforeach
{{--        </tbody>--}}
{{--        <div>--}}
{{--            {!! $list->links() !!}--}}
{{--        </div>--}}
    </table>
</div>
</body>
</html>
