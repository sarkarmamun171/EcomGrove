@extends('layouts.admin')
@section('content')
<div class="col-lg-8"></div>
<div class="col-lg-4">
    <div class="card">
        <div class="card-header">
            <h3>Add New Coupon</h3>
        </div>
        <div class="card-body">
            <form action="" method="post">
                @csrf
                <div class="mb-3">
                    <label for="" class="form-label">Coupon Name</label>
                    <input type="text" name="coupon_name" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Coupon Type</label>
                    <select name="type" class="form-control">
                        <option value="">Select Coupon Type</option>
                        <option value="1">Percentage(%)</option>
                        <option value="2">Solid Amount</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Coupon Amount</label>
                    <input type="number" name="coupon_amount" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Coupon Validity</label>
                    <input type="date" name="coupon_validity" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Coupon Limit</label>
                    <input type="text" name="coupon_limit" class="form-control">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-success">Add Coupon</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
