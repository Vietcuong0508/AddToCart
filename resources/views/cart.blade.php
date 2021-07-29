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
    @if(session('success-msg'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Success!</strong>{{session('success-msg')}}
        </div>
    @endif
    @if(session('message-delete'))
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Success!</strong>{{session('message-delete')}}
        </div>
    @endif
    <table class="table table-dark table-hover">
        <thead>
        <tr class="text-center">
            <th>Name</th>
            <th>Price</th>
            <th class="col-2">Thumbnail</th>
            <th>Quantity</th>
            <th>Subtotal</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $totalPrice = 0
        ?>
        @foreach($shoppingCart as $obj)
            <?php
            if (!empty($obj)) {
                $totalPrice += $obj->unitPrice * $obj->quantity;
            }
            ?>
            <form action="/add" method="get">
                <input type="hidden" name="cartAction" value="update">
                <input type="hidden" name="productId" value="{{$obj->id}}">
                <tr class="text-center">
                    <td>{{$obj->name}}</td>
                    <td>{{$obj->unitPrice}}</td>
                    <td><img src="{{$obj->images}}" width="30%"></td>
                    <td><input type="number" min="1" name="productQuantity" value="{{$obj->quantity}}"></td>
                    <td>{{$obj->quantity*$obj->unitPrice}}</td>
                    <td>
                        <a href="edit/{{$obj->id}}">
                            <button class="btn btn-primary">Edit</button>
                        </a>
                        <a class="btn btn-danger" href="/remove?productId={{$obj->id}}">Delete</a>
                    </td>
                </tr>
            </form>
        @endforeach
        {{--        </tbody>--}}
        {{--        <div>--}}
        {{--            {!! $list->links() !!}--}}
        {{--        </div>--}}
    </table>
    <div>Total Price:{{$totalPrice}}</div>
</div>
</body>
</html>
