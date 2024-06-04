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
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <div class="product-single-img">
                        <div class="product-active owl-carousel">
                            <div class="item">
                                <img src="assets/images/product-details/1.jpg" alt="">
                            </div>
                            <div class="item">
                                <img src="assets/images/product-details/2.jpg" alt="">
                            </div>
                            <div class="item">
                                <img src="assets/images/product-details/3.jpg" alt="">
                            </div>
                            <div class="item">
                                <img src="assets/images/product-details/1.jpg" alt="">
                            </div>
                            <div class="item">
                                <img src="assets/images/product-details/2.jpg" alt="">
                            </div>
                        </div>
                        <div class="product-thumbnil-active  owl-carousel">
                            <div class="item">
                                <img src="assets/images/product-details/1.jpg" alt="">
                            </div>
                            <div class="item">
                                <img src="assets/images/product-details/2.jpg" alt="">
                            </div>
                            <div class="item">
                                <img src="assets/images/product-details/3.jpg" alt="">
                            </div>
                            <div class="item">
                                <img src="assets/images/product-details/1.jpg" alt="">
                            </div>
                            <div class="item">
                                <img src="assets/images/product-details/2.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="product-single-content">
                        <h2>Stylish Pink Coat</h2>
                        <div class="price">
                            <span class="present-price">$150.00</span>
                            <del class="old-price">$200.00</del>
                        </div>
                        <div class="rating-product">
                            <i class="fi flaticon-star"></i>
                            <i class="fi flaticon-star"></i>
                            <i class="fi flaticon-star"></i>
                            <i class="fi flaticon-star"></i>
                            <i class="fi flaticon-star"></i>
                            <span>120</span>
                        </div>
                        <p>Aliquam proin at turpis sollicitudin faucibus.
                            Non nunc molestie interdum nec sit duis vitae vestibulum id.
                            Ipsum non donec egestas quis. A habitant tellus nibh blandit.
                            Faucibus dictumst nibh et aliquet in auctor. Amet ultrices urna ullamcorper
                            sagittis.
                            Hendrerit orci ac fusce pulvinar. Diam tincidunt integer eget morbi diam scelerisque
                            mattis.
                        </p>
                        <div class="product-filter-item color">
                            <div class="color-name">
                                <span>Color :</span>
                                <ul>
                                    <li class="color1"><input id="a1" type="radio" name="color" value="30">
                                        <label for="a1"></label>
                                    </li>
                                    <li class="color2"><input id="a2" type="radio" name="color" value="30">
                                        <label for="a2"></label>
                                    </li>
                                    <li class="color3"><input id="a3" type="radio" name="color" value="30">
                                        <label for="a3"></label>
                                    </li>
                                    <li class="color4"><input id="a4" type="radio" name="color" value="30">
                                        <label for="a4"></label>
                                    </li>
                                    <li class="color5"><input id="a5" type="radio" name="color" value="30">
                                        <label for="a5"></label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-filter-item color filter-size">
                            <div class="color-name">
                                <span>Sizes:</span>
                                <ul>
                                    <li class="color"><input id="sz1" type="radio" name="size" value="30">
                                        <label for="sz1">S</label>
                                    </li>
                                    <li class="color"><input id="sz2" type="radio" name="size" value="30">
                                        <label for="sz2">M</label>
                                    </li>
                                    <li class="color"><input id="sz3" type="radio" name="size" value="30">
                                        <label for="sz3">L</label>
                                    </li>
                                    <li class="color"><input id="sz4" type="radio" name="size" value="30">
                                        <label for="sz4">X</label>
                                    </li>
                                    <li class="color"><input id="sz5" type="radio" name="size" value="30">
                                        <label for="sz5">XL</label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="pro-single-btn">
                            <div class="quantity cart-plus-minus">
                                <input class="text-value" type="text" value="1">
                            </div>
                            <a href="#" class="theme-btn-s2">Add to cart</a>
                            <a href="#" class="wl-btn"><i class="fi flaticon-heart"></i></a>
                        </div>
                        <ul class="important-text">
                            <li><span>SKU:</span>FTE569P</li>
                            <li><span>Categories:</span>Best Seller, sale</li>
                            <li><span>Tags:</span>Fashion, Coat, Pink</li>
                        </ul>
                    </div>
                </div>
            </div>
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
                        aria-selected="false">Additional info</button>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="descripton" role="tabpanel"
                    aria-labelledby="descripton-tab">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="Descriptions-item">
                                    <p>Amet consectetur proin diam cras egestas augue habitant integer turpis
                                        egestas egestas. A lectus proin suscipit viverra venenatis eget eget
                                        libero scelerisque. Lacinia parturient id eu vel justo cursus eu. Libero
                                        cursus nisl sollicitudin commodo magnis quam ultrices morbi. Et vitae
                                        eget bibendum quam sed velit. Eget ornare urna nibh ullamcorper sed.
                                        Habitant adipiscing dignissim aliquet laoreet ultrices etiam nulla sed
                                        ut. Lectus ut vitae dignissim in cum id id velit egestas. Magna vel leo
                                        hac massa at.

                                        <br> <br> Urna fermentum id eget turpis eleifend id vitae. Mauris
                                        malesuada ac arcu adipiscing etiam velit at tortor cras. Lacus eget
                                        mollis gravida vulputate sed habitasse enim tempor ullamcorper. Dictum
                                        enim quis morbi tincidunt. Nibh congue massa et arcu viverra lobortis.
                                        Lectus ullamcorper id ut dictumst odio elit. Tristique dapibus diam
                                        velit pharetra quisque odio. </p>
                                    <div class="Description-table">
                                        <ul>
                                            <li>While thus cackled sheepishly rigid after due one assenting</li>
                                            <li>Et vitae eget bibendum quam sed velit. Eget ornare urna nibh ullamcorper sed.</li>
                                            <li>Habitant adipiscing dignissim aliquet laoreet ultrices etiam nulla sed ut.</li>
                                            <li>Lacinia parturient id eu vel justo cursus eu.</li>
                                            <li>Mauris malesuada ac arcu adipiscing etiam velit at tortor cras.</li>

                                        </ul>
                                    </div>
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
                                                                    <span class="comments-date">December 25, 2022 at 5:30 am</span>
                                                                    <div class="rating-product">
                                                                        <i class="fi flaticon-star"></i>
                                                                        <i class="fi flaticon-star"></i>
                                                                        <i class="fi flaticon-star"></i>
                                                                        <i class="fi flaticon-star"></i>
                                                                        <i class="fi flaticon-star"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="comment-area">
                                                                    <p>Turpis nulla proin donec a ridiculus. Mi suspendisse faucibus sed lacus. Vitae risus eu nullam sed quam.
                                                                         Eget aenean id augue pellentesque turpis magna egestas arcu sed.
                                                                        Aliquam non faucibus massa adipiscing nibh sit. Turpis integer aliquam aliquam aliquam.
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
                                                                            <span class="comments-date">December 26, 2022 at 5:30 am</span>
                                                                        </div>
                                                                        <div class="comment-area">
                                                                            <p>Turpis nulla proin donec a ridiculus. Mi suspendisse faucibus sed lacus. Vitae risus eu nullam sed quam.
                                                                                Eget aenean id augue pellentesque turpis magna egestas arcu sed.
                                                                               Aliquam non faucibus massa adipiscing nibh sit. Turpis integer aliquam aliquam aliquam.
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
                                                                    <span class="comments-date">December 30, 2022 at 3:12 pm</span>
                                                                </div>
                                                                <div class="comment-area">
                                                                    <p>Turpis nulla proin donec a ridiculus. Mi suspendisse faucibus sed lacus. Vitae risus eu nullam sed quam.
                                                                        Eget aenean id augue pellentesque turpis magna egestas arcu sed.
                                                                       Aliquam non faucibus massa adipiscing nibh sit. Turpis integer aliquam aliquam aliquam.
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
                                                        <textarea class="form-control"
                                                            placeholder="Write Comment..."></textarea>
                                                    </div>
                                                    <div class="name-input">
                                                        <input type="text" class="form-control" placeholder="Name"
                                                            required>
                                                    </div>
                                                    <div class="name-email">
                                                        <input type="email" class="form-control" placeholder="Email"
                                                            required>
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
                                    <table class="table-responsive">
                                        <tbody>
                                            <tr>
                                                <td>Weight (w/o wheels)</td>
                                                <td>2 LBS</td>
                                            </tr>
                                            <tr>
                                                <td>Weight Capacity</td>
                                                <td>60 LBS</td>
                                            </tr>
                                            <tr>
                                                <td>Width</td>
                                                <td>50″</td>
                                            </tr>
                                            <tr>
                                                <td>Seat back height</td>
                                                <td>30.4″</td>
                                            </tr>
                                            <tr>
                                                <td>Color</td>
                                                <td>Black, Blue, Red, White</td>
                                            </tr>
                                            <tr>
                                                <td>Size</td>
                                                <td>S, M, L, X, XL</td>
                                            </tr>
                                        </tbody>
                                    </table>
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
