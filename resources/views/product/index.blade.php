<!DOCTYPE html>
<html>
<head>
    <title>Add Coupon</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">
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
