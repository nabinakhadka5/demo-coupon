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
             @if(session('cart'))
                @foreach (session('cart') as $id => $data)
                <tr>
                        <td>{{ $data['title'] }}</td>
                        <td>{{ $data['price'] }}</td>
                        <td>{{ $data['product_code'] }}</td>
            </tr>
            @endforeach
 @endif
        </tbody>
    </table>

    </div>
</div>
</div>
</body>
</html>
