@extends('layouts.admin')
@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3>Order List</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>SL</th>
                        <th>Order ID</th>
                        <th>Customer</th>
                        <th>Total</th>
                        <th>Discount</th>
                        <th>Charge</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($orders as $sl => $order)
                        <tr>
                            <td>{{ $sl + 1 }}</td>
                            <td>{{ $order->order_id }}</td>
                            <td>{{ $order->rel_to_customer->fname }}</td>
                            <td>{{ $order->total }}</td>
                            <td>{{ $order->discount }}</td>
                            <td>{{ $order->charge }}</td>
                            <td>
                                @if ($order->status == 0)
                                    <span class="badge badge-light">Placed</span>
                                @elseif ($order->status == 1)
                                    <span class="badge badge-primary">Processing</span>
                                @elseif ($order->status == 2)
                                    <span class="badge badge-secondary">Shipped</span>
                                @elseif ($order->status == 3)
                                    <span class="badge badge-info">Out for Delivery</span>
                                @elseif ($order->status == 4)
                                    <span class="badge badge-success">Delivered</span>
                                @elseif ($order->status == 5)
                                    <span class="badge badge-danger">Canceled</span>
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('order.status.update',$order->order_id) }}" method="post">
                                    @csrf
                                <select class="form-select" name="status" aria-label="Default select example">
                                    <option value="">Change Status</option>
                                    <option  {{ $order->status == 0?'selected':'' }} value="0">Placed</option>
                                    <option  {{ $order->status == 1?'selected':'' }} value="1">Processing</option>
                                    <option   {{ $order->status == 2?'selected':'' }} value="2">Shipped</option>
                                    <option  {{ $order->status == 3?'selected':'' }} value="3">Out for Delivery</option>
                                    <option  {{ $order->status == 4?'selected':'' }} value="4">Delivered</option>
                                    <option  {{ $order->status == 5?'selected':'' }} value="5">Canceled</option>
                                  </select>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
