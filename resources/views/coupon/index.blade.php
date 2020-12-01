<!DOCTYPE html>
<html>
<head>
    <title>Coupon</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">
<a href="{{ route('coupon.create') }}" class="btn btn-success">Add Coupon</a>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>Coupon Code</td>
            <td>Discount offer</td>
            <td>Expiry Date</td>
            <td>Coupon Type</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($data_coupon as $data)
        <tr>
            <td>{{ $data->coupon_code }}</td>
            <td>{{ $data->discount_value }}</td>
            <td>{{ $data->expiry_date }}</td>
            <td>{{ $data->coupon_type }}</td>
            <td>{{ $data->status }}</td>
        </td>
    </tr>
    @endforeach
</tbody>
</table>

</div>
</body>
</html>
