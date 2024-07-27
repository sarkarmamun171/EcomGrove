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
                  <li class="list-group-item"><a href="{{ route('customer.order') }}"class="text-dark">My Order</a></li>
                  <li class="list-group-item">Wishlist</li>
                  <li class="list-group-item"><a href="{{ route('customer.logout') }}" class="text-dark">Logout</a></li>
                </ul>
              </div>
        </div>
        <div class="col-lg-9 my-10" >
            <div class="card">
                <div class="card-header">
                    <h3>Update Profile Information</h3>
                </div>
                @if (session('success'))
                    <div class="alert alert-info">{{ session('success') }}</div>
                @endif
                <div class="card-body">
                    <form action="{{ route('customer.profile.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">First Name</label>
                                    <input type="text" class="form-control" name="fname" value="{{ Auth::guard('customer')->user()->fname }}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" name="lname" value="{{ Auth::guard('customer')->user()->lname }}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Eamil</label>
                                    <input type="email" class="form-control" name="email" value="{{ Auth::guard('customer')->user()->email }}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Password</label>
                                    <input type="password" class="form-control" name="password">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Address</label>
                                    <input type="text" class="form-control" name="address" value="{{ Auth::guard('customer')->user()->address }}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Phone</label>
                                    <input type="number" class="form-control" name="phone" value="{{ Auth::guard('customer')->user()->phone }}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Country</label>
                                    <input type="text" class="form-control" name="country" value="{{ Auth::guard('customer')->user()->country }}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Zip</label>
                                    <input type="text" class="form-control" name="zip" value="{{ Auth::guard('customer')->user()->zip }}">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="" class="form-label">Photo</label>
                                    <input type="file" class="form-control" name="photo">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3 my-3">
                                   <button type="submit" class="btn btn-info">Update Profile</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
