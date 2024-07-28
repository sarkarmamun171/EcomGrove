@extends('frontend.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-3">
            <div class="card text-center pt-3" style="width: 18rem;">
                @if (Auth::guard('customer')->user()->photo == null)
                <img src="{{ Avatar::create(Auth::guard('customer')->user()->fname)->toBase64() }}" width="50" class="m-auto"/>
            @else
                <img src="{{ asset('uploads/customer') }}/{{ Auth::guard('customer')->user()->photo }}" width="50" alt="" class="m-auto" />
            @endif

                <div class="card-body">
                  <h5 class="card-title">{{ Auth::guard('customer')->user()->fname.' '.Auth::guard('customer')->user()->lname }}</h5>
                </div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">Update Profile</li>
                  <li class="list-group-item">My Order</li>
                  <li class="list-group-item">Wishlist</li>
                  <li class="list-group-item"><a href="{{ route('customer.logout') }}" class="text-dark">Logout</a></li>
                </ul>
              </div>
        </div>
        <div class="col-lg-9 my-10" >
            <div class="card">
                <div class="card-header">
                    <h3>My Order Information</h3>
                </div>

                <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                            <th>SL</th>
                            <th>Order ID</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Acton </th>
                        </tr>
                        @foreach ($myorders as $sl=>$myorder)
                        <tr>
                            <td>{{ $sl+1 }}</td>
                            <td>{{ $myorder->order_id }}</td>
                            <td>{{ $myorder->total }}</td>
                            <td>
                                @if ($myorder->status == 0)
                                    <span class="badge bg-secondary">Placed</span>
                                @elseif ($myorder->status == 1)
                                    <span class="badge bg-info text-dark">Processing</span>
                                @elseif ($myorder->status == 2)
                                    <span class="badge bg-primary">Shipped</span>
                                @elseif ($myorder->status == 3)
                                    <span class="badge bg-primary text-dark">Out for Delivery</span>
                                @elseif ($myorder->status == 4)
                                    <span class="badge bg-success">Received</span>
                                @elseif ($myorder->status == 5)
                                    <span class="badge bg-danger">Canceled</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('order.invoice.download',$myorder->id) }}" class="btn btn-success">Download Invoice</a>
                                <a href="{{ route('cancel.myorder',$myorder->id) }}" class="btn btn-warning">Cancel Order</a>
                            </td>
                        </tr>
                    @endforeach
                    </table>
                    {{ $myorders->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
