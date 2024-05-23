@extends('layouts.admin')
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h3>Product Details</h3>
            <a href="{{ route('product.list') }}" class="btn btn-primary"><i class="fa-solid fa-list"></i>Product List</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered">

                <tr>
                    <td>Product Name</td>
                    <td>{{ $products->product_name }}</td>
                </tr>
                <tr>
                    <td>Price</td>
                    <td>{{ $products->price }}</td>
                </tr>
                <tr>
                    <td>Short Description</td>
                    <td>{{ $products->short_description }}</td>
                </tr>
                <tr>
                    <td>Long Description</td>
                    <td>{!! $products->long_description !!}</td>
                </tr>
                <tr>
                    <td>Additional Information</td>
                    <td>{!! $products->additional_information !!}</td>
                </tr>
                <tr>
                    <td>Preview Image</td>
                    <td>
                        <img src="{{ asset('uploads/product/previewImage/') }}/{{ $products->preview_image }}" alt="" width="200">
                    </td>
                </tr>
                <tr>
                    <td>Gallery Image</td>
                    <td>
                        @foreach ($product_galleries as $gallery)
                            <img src="{{ asset('uploads/product/galleryImage') }}/{{ $gallery->gallery_image }}" alt="" width="200">
                        @endforeach
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection
