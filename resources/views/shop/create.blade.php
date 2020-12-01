
<!DOCTYPE html>
<html>
<head>
    <title>Product</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

    <div class="btn btn-warning"><a href="{{ route('coupon.index') }}">Back to Index</a></div>
<h1>Add Coupon</h1>
<div class="form">
    <form action="{{ route('coupon.store') }}" method="post">
    @csrf
    <div>
        <label for="">Coupon Code</label>
        <input type="text" class="form-control"  name='coupon_code' required>
        @error('coupon_code')
        <span class="alert-danger">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="">Coupon Type</label>
        <select name="coupon_type" id="status" class="form-control">
            <option value="amount"> Amount</option>
            <option value="percentage"> Percentage</option>
        </select>
        @error('coupon_type')
        <span class="alert-danger">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="">Discount Value</label>
        <input type="text" class="form-control" name='discount_value' required>
        @error('discount_value')
        <span class="alert-danger">{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label for="">Expiry Date</label>
        <input type="text" class="form-control date" name='expiry_date' required>
        @error('expiry_date')
        <span class="alert-danger">{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label for="">Status</label>
        <select name="status" id="status" class="form-control">
            <option value="active"> Active</option>
            <option value="inactive"> In-Active</option>
        </select>
        @error('status')
        <span class="alert-danger">{{ $message }}</span>
        @enderror
    </div>
    <div>
        <button type='submit' class="btn btn-warning">Submit</button>
    </div>
    </form>
</div>
</div>
<script type="text/javascript">
    $('.date').datepicker({
       format: 'yyyy-mm-dd',
    //    startDate: new Date()
          });
</script>
</body>
</html>
