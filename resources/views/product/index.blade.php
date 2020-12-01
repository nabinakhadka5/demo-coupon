<!DOCTYPE html>
<html>
<head>
    <title>Add Coupon</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
        <div class="container">
        <h1>Products we have</h1>

        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <td>Title</td>
                    <td>Price</td>
                    <td>Product Code</td>
                    <td>Buy Now</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($product as $data)
                <tr>
                        <td>{{ $data->title }}</td>
                        <td>{{ $data->price }}</td>
                        <td>{{ $data->product_code }}</td>
                        <td><a href="{{ route('product.cartAdd',$data->id) }}">Add To cart</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>

    </div>

    @if($final_price ?? false)

    <h1>Total Amount = {{ $total }}</h1>
    @endif

    @if($final_price ?? false)
    <h1>Price After Discount = {{ $final_price }} <br>
    for coupon stored in session = {{ session()->get('coupon')['code']}}</h1>
    @endif
        <h1>Add Coupon</h1>
        <div class="form">
            <form action="{{ route('product.create') }}" method="post">
            @csrf
            <div>
                <label for="">Coupon Code</label>
                <input type="text" class="form-control"  name='coupon_code' required>
            </div>
            <div>
                <button type='submit' class="btn btn-warning">Apply</button>
            </div>
    </form>
</div>
</div>
</body>
</html>
