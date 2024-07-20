@extends('layouts.admin')
@section('content')
<div class="col-lg-8">
    <div class="card">
        <div class="card-header">
            <h3>Coupon List</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>SL</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Amount</th>
                    <th>Validity</th>
                    <th>Limit</th>
                    {{-- <th>Status</th> --}}
                    <th>Action</th>
                </tr>
                @foreach ($coupons as $sl=>$coupon)
                    <tr>
                        <td>{{ $sl+1 }}</td>
                        <td>{{ $coupon->coupon_name }}</td>
                        <td>{{ $coupon->coupon_type==1?'Percentage':'Solid' }}</td>
                        <td>{{ $coupon->coupon_amount }}{{ $coupon->coupon_type==1?'%':'Taka' }}</td>
                        <td>
                            @if (Carbon\Carbon::now()>$coupon->coupon_validity)
                            <span class="badge badge-warning">Expired</span>
                            @else
                            <span class="badge badge-info">{{ Carbon\Carbon::now()->diffInDays($coupon->coupon_validity,false) }} Days Left</span>
                            @endif
                    </td>
                        <td>{{ $coupon->coupon_limit }}</td>
                        <td>
                            <a title="Delete" href="{{ route('coupon.delete', $coupon->id) }}"
                                class="btn btn-danger shadow btn-xs sharp "><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
<div class="col-lg-4">
    <div class="card">
        <div class="card-header">
            <h3>Add New Coupon</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('coupon.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="" class="form-label">Coupon Name</label>
                    <input type="text" name="coupon_name" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Coupon Type</label>
                    <select name="coupon_type" class="form-control">
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
                    <input type="text" name="coupon_limit" class="form-control ">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-success">Add Coupon</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
