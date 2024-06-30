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
                            <li><a href="product.html">Product</a></li>
                            <li>Product Details</li>
                        </ol>
                    </div>
                </div>
            </div> <!-- end row -->
        </div> <!-- end container -->
    </section>
    <div class="product-single-section section-padding">
        <div class="container">
            <div class="product-details">
                <form action="{{ route('cart.store') }}" method="post">
                    @csrf
                    <div class="row align-items-center">
                        <div class="col-lg-5">
                            <div class="product-single-img">
                                <div class="product-active owl-carousel">
                                    @foreach (App\Models\ProductGallery::where('product_id', $product_details->id)->get() as $gallery)
                                        <div class="item">
                                            <img src="{{ asset('uploads/product/galleryImage') }}/{{ $gallery->gallery_image }}"
                                                alt="">
                                        </div>
                                    @endforeach
                                </div>
                                <div class="product-thumbnil-active  owl-carousel">
                                    @foreach (App\Models\ProductGallery::where('product_id', $product_details->id)->get() as $gallery)
                                        <div class="item">
                                            <img src="{{ asset('uploads/product/galleryImage') }}/{{ $gallery->gallery_image }}"
                                                alt="">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="product-single-content">
                                <h2>{{ $product_details->product_name }}</h2>
                                <div class="price">
                                    <span
                                        class="present-price">&#2547;{{ number_format($product_details->after_discount) }}</span>
                                    <del class="old-price">&#2547;{{ number_format($product_details->price) }}</del>
                                </div>
                                <div class="rating-product">
                                    <i class="fi flaticon-star"></i>
                                    <i class="fi flaticon-star"></i>
                                    <i class="fi flaticon-star"></i>
                                    <i class="fi flaticon-star"></i>
                                    <i class="fi flaticon-star"></i>
                                    <span>120</span>
                                </div>
                                <p>{{ $product_details->short_description }}</p>
                                <div class="product-filter-item color">
                                    <div class="color-name">
                                        <span>Color :</span>
                                        <ul class="color_avl">
                                            @foreach ($availble_colors as $color)
                                                @if ($color->rel_to_color->color_name == 'NA')
                                                    <li class=""><input class="color_id" checked
                                                            id="color{{ $color->color_id }}" type="radio" name="color_id"
                                                            value="{{ $color->color_id }}">
                                                        <label for="color{{ $color->color_id }}"
                                                            style="background-color: transparent;font-size:10px;border:2px solid #000;text-align:center;line-height:26px">{{ $color->rel_to_color->color_name }}</label>
                                                    </li>
                                                @else
                                                    <li class=""><input class="color_id"
                                                            id="color{{ $color->color_id }}" type="radio" name="color_id"
                                                            value="{{ $color->color_id }}">
                                                        <label for="color{{ $color->color_id }}"
                                                            style="background-color: {{ $color->rel_to_color->color_code }}"></label>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                        @error('color_id')
                                            <strong class="text-danger">Please Select Your Color</strong>
                                        @enderror
                                    </div>
                                </div>
                                <div class="product-filter-item color filter-size">
                                    <div class="color-name">
                                        <span>Sizes:</span>
                                        <ul class="size_avl">
                                            @foreach ($availble_size as $size)
                                                <li class="">
                                                    <input class="size_id" id="{{ $size->size_id }}" type="radio"
                                                        name="size_id" value="{{ $size->size_id }}">
                                                    <label
                                                        for="{{ $size->size_id }}">{{ $size->rel_to_size->size_name }}</label>
                                                </li>
                                            @endforeach
                                        </ul>
                                        @error('size_id')
                                            <strong class="text-danger">Please Select Your Size</strong>
                                        @enderror
                                    </div>
                                </div>
                                <div class="pro-single-btn">
                                    <div class="quantity cart-plus-minus">
                                        <input class="text-value" type="text" value="1" name="quantity">
                                    </div>
                                    @auth('customer')
                                        <button type="submit" class="card_add theme-btn-s2">Add to cart</button>
                                    @else
                                        <a href="{{ route('customer.login') }}" class="theme-btn-s2">Add to cart</a>
                                    @endauth

                                    <a href="#" class="wl-btn"><i class="fi flaticon-heart"></i></a>
                                </div>
                                <input type="hidden" name="product_id" value="{{ $product_details->id }}">
                                <ul class="important-text">
                                    <li><span>SKU:</span>FTE569P</li>
                                    <li><span>Categories:</span>Best Seller, sale</li>
                                    <li><span>Tags:</span>Fashion, Coat, Pink</li>
                                    <li class="stock"></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="product-tab-area">
                <ul class="nav nav-mb-3 main-tab" id="tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="descripton-tab" data-bs-toggle="pill"
                            data-bs-target="#descripton" type="button" role="tab" aria-controls="descripton"
                            aria-selected="true">Description</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="Ratings-tab" data-bs-toggle="pill" data-bs-target="#Ratings"
                            type="button" role="tab" aria-controls="Ratings" aria-selected="false">Reviews
                            (3)</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="Information-tab" data-bs-toggle="pill"
                            data-bs-target="#Information" type="button" role="tab" aria-controls="Information"
                            aria-selected="false">Additional
                            info</button>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="descripton" role="tabpanel"
                        aria-labelledby="descripton-tab">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="Descriptions-item">
                                        {!! $product_details->long_description !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="Ratings" role="tabpanel" aria-labelledby="Ratings-tab">
                        <div class="container">
                            <div class="rating-section">
                                <div class="row">
                                    <div class="col-lg-12 col-12">
                                        <div class="comments-area">
                                            <div class="comments-section">
                                                <h3 class="comments-title">3 reviews for Stylish Pink Coat</h3>
                                                <ol class="comments">
                                                    <li class="comment even thread-even depth-1" id="comment-1">
                                                        <div id="div-comment-1">
                                                            <div class="comment-theme">
                                                                <div class="comment-image"><img
                                                                        src="assets/images/blog-details/comments-author/img-1.jpg"
                                                                        alt></div>
                                                            </div>
                                                            <div class="comment-main-area">
                                                                <div class="comment-wrapper">
                                                                    <div class="comments-meta">
                                                                        <h4>Lily Zener</h4>
                                                                        <span class="comments-date">December 25, 2022 at
                                                                            5:30 am</span>
                                                                        <div class="rating-product">
                                                                            <i class="fi flaticon-star"></i>
                                                                            <i class="fi flaticon-star"></i>
                                                                            <i class="fi flaticon-star"></i>
                                                                            <i class="fi flaticon-star"></i>
                                                                            <i class="fi flaticon-star"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="comment-area">
                                                                        <p>Turpis nulla proin donec a ridiculus. Mi
                                                                            suspendisse faucibus sed lacus. Vitae risus eu
                                                                            nullam sed quam.
                                                                            Eget aenean id augue pellentesque turpis magna
                                                                            egestas arcu sed.
                                                                            Aliquam non faucibus massa adipiscing nibh sit.
                                                                            Turpis integer aliquam aliquam aliquam.
                                                                            <a class="comment-reply-link"
                                                                                href="#"><span>Reply...</span></a>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <ul class="children">
                                                            <li class="comment">
                                                                <div>
                                                                    <div class="comment-theme">
                                                                        <div class="comment-image"><img
                                                                                src="assets/images/blog-details/comments-author/img-2.jpg"
                                                                                alt></div>
                                                                    </div>
                                                                    <div class="comment-main-area">
                                                                        <div class="comment-wrapper">
                                                                            <div class="comments-meta">
                                                                                <h4>Leslie Alexander</h4>
                                                                                <div class="rating-product">
                                                                                    <i class="fi flaticon-star"></i>
                                                                                    <i class="fi flaticon-star"></i>
                                                                                    <i class="fi flaticon-star"></i>
                                                                                    <i class="fi flaticon-star"></i>
                                                                                    <i class="fi flaticon-star"></i>
                                                                                </div>
                                                                                <span class="comments-date">December 26,
                                                                                    2022 at 5:30 am</span>
                                                                            </div>
                                                                            <div class="comment-area">
                                                                                <p>Turpis nulla proin donec a ridiculus. Mi
                                                                                    suspendisse faucibus sed lacus. Vitae
                                                                                    risus eu nullam sed quam.
                                                                                    Eget aenean id augue pellentesque turpis
                                                                                    magna egestas arcu sed.
                                                                                    Aliquam non faucibus massa adipiscing
                                                                                    nibh sit. Turpis integer aliquam aliquam
                                                                                    aliquam.
                                                                                    <a class="comment-reply-link"
                                                                                        href="#"><span>Reply...</span></a>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li class="comment">
                                                        <div>
                                                            <div class="comment-theme">
                                                                <div class="comment-image"><img
                                                                        src="assets/images/blog-details/comments-author/img-1.jpg"
                                                                        alt></div>
                                                            </div>
                                                            <div class="comment-main-area">
                                                                <div class="comment-wrapper">
                                                                    <div class="comments-meta">
                                                                        <h4>Jenny Wilson</h4>
                                                                        <div class="rating-product">
                                                                            <i class="fi flaticon-star"></i>
                                                                            <i class="fi flaticon-star"></i>
                                                                            <i class="fi flaticon-star"></i>
                                                                            <i class="fi flaticon-star"></i>
                                                                            <i class="fi flaticon-star"></i>
                                                                        </div>
                                                                        <span class="comments-date">December 30, 2022 at
                                                                            3:12 pm</span>
                                                                    </div>
                                                                    <div class="comment-area">
                                                                        <p>Turpis nulla proin donec a ridiculus. Mi
                                                                            suspendisse faucibus sed lacus. Vitae risus eu
                                                                            nullam sed quam.
                                                                            Eget aenean id augue pellentesque turpis magna
                                                                            egestas arcu sed.
                                                                            Aliquam non faucibus massa adipiscing nibh sit.
                                                                            Turpis integer aliquam aliquam aliquam.
                                                                            <a class="comment-reply-link"
                                                                                href="#"><span>Reply...</span></a>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ol>
                                            </div> <!-- end comments-section -->
                                            <div class="col col-lg-10 col-12 review-form-wrapper">
                                                <div class="review-form">
                                                    <h4>Add a review</h4>
                                                    <form>
                                                        <div class="give-rat-sec">
                                                            <div class="give-rating">
                                                                <label>
                                                                    <input type="radio" name="stars" value="1">
                                                                    <span class="icon">★</span>
                                                                </label>
                                                                <label>
                                                                    <input type="radio" name="stars" value="2">
                                                                    <span class="icon">★</span>
                                                                    <span class="icon">★</span>
                                                                </label>
                                                                <label>
                                                                    <input type="radio" name="stars" value="3">
                                                                    <span class="icon">★</span>
                                                                    <span class="icon">★</span>
                                                                    <span class="icon">★</span>
                                                                </label>
                                                                <label>
                                                                    <input type="radio" name="stars" value="4">
                                                                    <span class="icon">★</span>
                                                                    <span class="icon">★</span>
                                                                    <span class="icon">★</span>
                                                                    <span class="icon">★</span>
                                                                </label>
                                                                <label>
                                                                    <input type="radio" name="stars" value="5">
                                                                    <span class="icon">★</span>
                                                                    <span class="icon">★</span>
                                                                    <span class="icon">★</span>
                                                                    <span class="icon">★</span>
                                                                    <span class="icon">★</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <textarea class="form-control" placeholder="Write Comment..."></textarea>
                                                        </div>
                                                        <div class="name-input">
                                                            <input type="text" class="form-control" placeholder="Name"
                                                                required>
                                                        </div>
                                                        <div class="name-email">
                                                            <input type="email" class="form-control"
                                                                placeholder="Email" required>
                                                        </div>
                                                        <div class="rating-wrapper">
                                                            <div class="submit">
                                                                <button type="submit" class="theme-btn-s2">Post
                                                                    review</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div> <!-- end comments-area -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="Information" role="tabpanel" aria-labelledby="Information-tab">
                        <div class="container">
                            <div class="Additional-wrap">
                                <div class="row">
                                    <div class="col-12">
                                        {!! $product_details->additional_information !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="related-product">
        </div>
    </div>
    <!-- product-single-section  end-->
@endsection
@section('footer_script')
    <script>
        $('.color_id').click(function() {
            var color_id = $(this).val();
            var product_id = '{{ $product_details->id }}';

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: '/getSize',
                type: 'POST',
                data: {
                    'color_id': color_id,
                    'product_id': product_id
                },
                success: function(data) {
                    $('.size_avl').html(data);

                    //getQuantity
                    $('.size_id').click(function() {
                        var size_id = $(this).val();

                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                    'content')
                            }
                        });
                        $.ajax({
                            url: '/getQuantity',
                            type: 'POST',
                            data: {
                                'product_id': product_id,
                                'color_id': color_id,
                                'size_id': size_id
                            },
                            success: function(data) {
                                $('.stock').html(data);
                                // var q = $('.abc').val();
                                // alert(q);
                                // if (q==0) {
                                //     $('.card_add').attr('disabled','');
                                // }
                                // else{
                                //     $('.card_add').removeAttr('disabled','');
                                // }
                            }
                        })
                    });
                }
            });
        })
    </script>
    {{-- @if (session('cart_add'))
        <script>
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: '{{ session('cart_add') }}',
                showConfirmButton: false,
                timer: 1500
            });
        </script>
    @endif --}}
@endsection
