<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body>
<div class="container">
    <div>
        @if(session('add'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Success!</strong>{{session('add')}}
            </div>
        @endif
        @if(session('update'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Success!</strong>{{session('update')}}
            </div>
        @endif
        @if(session('remove'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Success!</strong>{{session('remove')}}
            </div>
        @endif
        @if(session('destroy'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Success!</strong>{{session('destroy')}}
            </div>
        @endif
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Name</th>
                <th>Image</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach(\Gloudemans\Shoppingcart\Facades\Cart::content() as $obj)
                <form action="/update" method="get">
                    <tr>
                        <input type="hidden" name="rowId" value="{{$obj->rowId}}">
                        <td>{{$obj->name}}</td>
                        <td><img src="{{$obj->options->thumbnail}}" alt="" width="100px" style="object-fit: cover"></td>
                        <td><input type="number" min="1" name="quantity" value="{{$obj->qty}}"></td>
                        <td>{{$obj->subtotal()}}</td>
                        <td>
                            <button class="btn btn-primary">Update</button>
                            <a onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này khỏi giỏ hàng')"
                               class="btn btn-danger" href="/remove/{{$obj->rowId}}">Remove</a>
                        </td>
                    </tr>
                </form>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="row justify-content-end">
        <ul style="list-style-type: none">
            <li><a onclick="return confirm('Bạn có chắc muốn xóa hết giỏ hàng ?')" class="btn btn-danger"
                   href="/destroy">Remove All</a></li>
            <li>Tax : {{\Gloudemans\Shoppingcart\Facades\Cart::tax()}}</li>
            <li>Total : {{\Gloudemans\Shoppingcart\Facades\Cart::initial()}}</li>
        </ul>
    </div>
    <div class="row justify-content-end">
        <div class="col-6">
            <h2 class="text-center">Ship information</h2>
            <form action="/save" method="post">
                @csrf
                <div class="row form-group">
                    <input type="text" name="shipName" class="form-control" placeholder="Enter name">
                </div>
                <div class="row form-group">
                    <input type="text" name="shipPhone" class="form-control" placeholder="Enter phone">
                </div>
                <div class="row form-group">
                    <input type="text" name="shipAddress" class="form-control" placeholder="Enter address">
                </div>
                <div class="row form-group">
                    <input type="text" name="note" class="form-control" placeholder="Enter note">
                </div>
                <div class="row form-group">
                    <button class="form-control btn btn-success">Gửi</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
