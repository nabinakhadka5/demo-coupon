<!DOCTYPE html>
<html>
<head>
    <title>Add Coupon</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<h1>Add Coupon</h1>
<div class="form">
    <form action="{{ route('coupon.store') }}" method="post">
    @csrf
    <div>
        <label for="">Coupon Code</label>
        <input type="text" class="form-control"  name='coupon_code' required>
    </div>

    <div>
        <label for="">Coupon Type</label>
        <select name="coupon_type" id="status" class="form-control">
            <option value="amount"> Amount</option>
            <option value="percentage"> Percentage</option>
        </select>
    </div>

    <div>
        <label for="">Discount Value</label>
        <input type="text" class="form-control" name='discount_value' required>
    </div>
    <div>
        <label for="">Expiry Date</label>
        <input type="text" class="form-control date" name='expiry_date' required>
    </div>
    <div>
        <label for="">Status</label>
        <select name="status" id="status" class="form-control">
            <option value="active"> Active</option>
            <option value="inactive"> In-Active</option>
        </select>
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
