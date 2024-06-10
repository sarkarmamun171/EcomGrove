@extends('frontend.master')
@section('content')
<section class="wpo-page-title">
    <h2 class="d-none">Hide</h2>
    <div class="container">
        <div class="row">
            <div class="col col-xs-12">
                <div class="wpo-breadcumb-wrap">
                    <ol class="wpo-breadcumb-wrap">
                        <li><a href="index.html">Home</a></li>
                        <li>Customer Profile/Details</li>
                    </ol>
                </div>
            </div>
        </div> <!-- end row -->
    </div> <!-- end container -->
</section>
<div class="container">
    <div class="row">
        <div class="col-lg-3">
            <div class="card text-center" style="width: 18rem;">
                @if (Auth::guard('customer')->user()->photo == null)
                <img src="{{ Avatar::create(Auth::guard('customer')->user()->fname)->toBase64() }}" width="50" class="m-auto"/>
            @else
                <img src="{{ asset('uploads/customer') }}/{{ Auth::guard('customer')->user()->photo }}" width="50" alt="" />
            @endif

                <div class="card-body">
                  <h5 class="card-title">{{ Auth::guard('customer')->user()->fname.' '.Auth::guard('customer')->user()->lname }}</h5>
                </div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">Update Profile</li>
                  <li class="list-group-item">My Order</li>
                  <li class="list-group-item">Wishlist</li>
                  <li class="list-group-item">Logout</li>
                </ul>
              </div>
        </div>
        <div class="col-lg-9"></div>
    </div>
</div>
@endsection
