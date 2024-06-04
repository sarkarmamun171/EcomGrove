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
                            <li>{{ $category->category_name }}</li>
                        </ol>
                    </div>
                </div>
            </div> <!-- end row -->
        </div> <!-- end container -->
    </section>
    <section class="themart-interestproduct-section section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="wpo-section-title">
                        <h2>{{ $category->category_name }}</h2>
                    </div>
                </div>
            </div>
            <div class="product-wrap">
                <div class="row">
                    @foreach ($categories as $product_cate)
                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                            <div class="product-item">
                                <div class="image">
                                    <img src="{{ asset('uploads/product/PreviewImage') }}/{{ $product_cate->preview_image }}"
                                        alt="">
                                    @if ($product_cate->discount)
                                        <div class="tag sale">-{{ $product_cate->discount }}%</div>
                                    @else
                                        <div class="tag new">New</div>
                                    @endif
                                </div>
                                <div class="text">
                                    <h2><a href="product-single.html">{{ $product_cate->product_name }}</a></h2>
                                    <div class="rating-product">
                                        <i class="fi flaticon-star"></i>
                                        <i class="fi flaticon-star"></i>
                                        <i class="fi flaticon-star"></i>
                                        <i class="fi flaticon-star"></i>
                                        <i class="fi flaticon-star"></i>
                                        <span>130</span>
                                    </div>
                                    <div class="price">
                                        <span class="present-price">&#2547;{{ number_format($product_cate->after_discount) }}</span>
                                        <del class="old-price">&#2547;{{ number_format($product_cate->price) }}</del>
                                    </div>
                                    <div class="shop-btn">
                                        <a class="theme-btn-s2" href="product.html">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="more-btn">
                        <a class="theme-btn-s2" href="product.html">Load More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end of themart-interestproduct-section -->
@endsection
