<!DOCTYPE html>
<html>
<head>
    <title>Add Coupon</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
        <div class="container">

            {{-- @if($final_price ?? false)

                <h1>Total Amount = {{ $total }}</h1>
                @endif

                @if($final_price ?? false)
                <h1>Price After Discount = {{ $final_price }} <br> --}}
                    {{-- for coupon stored in session = {{ session()->get('coupon')['code']}}</h1>
                    @endif --}}
                    <h1>Add Coupon</h1>
                    <div class="form">
                <form action="{{ route('product.create') }}" method="post">
                    @csrf
                <div>
                    <label for="">Coupon Code</label>
                    <input type="text" class="form-control"  name='coupon_code' required>
                </div>
                <br>
                <div>
                    <button type='submit' class="btn btn-warning">Apply</button>
                </div>
            </form>



            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
            @endif

            @if ($message = Session::get('error'))
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
            @endif

            <h1>Products we have</h1>
            @if(session('cart'))
            <table class="table table-striped table-bordered">
                <thead>

                    <tr>
                        <td>Title</td>
                        <td>Price</td>
                        <td>Product Code</td>
                        <td>Price After discount</td>
                    </tr>
                </thead>
            <tbody>
                @foreach (session('cart') as $id => $data)
                <tr>
                    <td>{{ $data['title'] }}</td>
                    <td>{{ $data['price'] }}</td>
                    <td>{{ $data['product_code'] }}</td>
                        <td>Coupon code:{{ session()->get('coupon')['code'] }}, Discount Price is  : </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
            {{ dd(session('coupon')['code']) }}
</div>
</div>
</div>
</body>
</html>
