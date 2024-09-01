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
                        <li><a href="product.html">Product Page</a></li>
                        <li>Wishlist</li>
                    </ol>
                </div>
            </div>
        </div> <!-- end row -->
    </div> <!-- end container -->
</section>
<!-- end page-title -->

<!-- cart-area start -->
<div class="cart-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="single-page-title">
                    <h2>Your Wishlist</h2>
                    <p>There are 4 products in this list</p>
                </div>
            </div>
        </div>
        <div class="form">
            <div class="cart-wrapper">
                <div class="row">
                    <div class="col-12">
                        <form action="https://wpocean.com/html/tf/themart/cart">
                            <table class="table-responsive cart-wrap">
                                <thead>
                                    <tr>
                                        <th class="images images-b">Product</th>
                                        <th class="ptice">Price</th>
                                        <th class="stock">Stock Status</th>
                                        <th class="remove remove-b">Action</th>
                                        <th class="remove remove-b">Remove</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr class="wishlist-item">
                                        <td class="product-item-wish">
                                            <div class="check-box"><input type="checkbox"
                                                    class="myproject-checkbox">
                                            </div>
                                            <div class="images">
                                                <span>
                                                    <img src="assets/images/cart/img-1.jpg" alt="">
                                                </span>
                                            </div>
                                            <div class="product">
                                                <ul>
                                                    <li class="first-cart">Stylish Pink Coat</li>
                                                    <li>
                                                        <div class="rating-product">
                                                            <i class="fi flaticon-star"></i>
                                                            <i class="fi flaticon-star"></i>
                                                            <i class="fi flaticon-star"></i>
                                                            <i class="fi flaticon-star"></i>
                                                            <i class="fi flaticon-star"></i>
                                                            <span>130</span>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td class="ptice">$ 250</td>
                                        <td class="stock"><span class="in-stock">In Stock</span></td>
                                        <td class="add-wish">
                                            <a class="theme-btn-s2" href="cart.html">Shop Now</a>
                                        </td>
                                        <td class="action">
                                            <ul>
                                                <li class="w-btn"><a data-bs-toggle="tooltip"
                                                        data-bs-html="true" title="" href="#"
                                                        data-bs-original-title="Remove"
                                                        aria-label="Remove"><i
                                                            class="fi flaticon-remove"></i></a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr class="wishlist-item">
                                        <td class="product-item-wish">
                                            <div class="check-box"><input type="checkbox"
                                                    class="myproject-checkbox">
                                            </div>
                                            <div class="images">
                                                <span>
                                                    <img src="assets/images/cart/img-2.jpg" alt="">
                                                </span>
                                            </div>
                                            <div class="product">
                                                <ul>
                                                    <li class="first-cart">Blue Bag</li>
                                                    <li>
                                                        <div class="rating-product">
                                                            <i class="fi flaticon-star"></i>
                                                            <i class="fi flaticon-star"></i>
                                                            <i class="fi flaticon-star"></i>
                                                            <i class="fi flaticon-star"></i>
                                                            <i class="fi flaticon-star"></i>
                                                            <span>30</span>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td class="ptice">$200</td>
                                        <td class="stock"><span class="in-stock">In Stock</span></td>
                                        <td class="add-wish">
                                            <a class="theme-btn-s2" href="cart.html">Shop Now</a>
                                        </td>
                                        <td class="action">
                                            <ul>
                                                <li class="w-btn"><a data-bs-toggle="tooltip"
                                                        data-bs-html="true" title="" href="#"
                                                        data-bs-original-title="Remove"
                                                        aria-label="Remove"><i
                                                            class="fi flaticon-remove"></i></a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr class="wishlist-item">
                                        <td class="product-item-wish">
                                            <div class="check-box"><input type="checkbox"
                                                    class="myproject-checkbox">
                                            </div>
                                            <div class="images">
                                                <span>
                                                    <img src="assets/images/cart/img-3.jpg" alt="">
                                                </span>
                                            </div>
                                            <div class="product">
                                                <ul>
                                                    <li class="first-cart">Kids Blue Shoes</li>
                                                    <li>
                                                        <div class="rating-product">
                                                            <i class="fi flaticon-star"></i>
                                                            <i class="fi flaticon-star"></i>
                                                            <i class="fi flaticon-star"></i>
                                                            <i class="fi flaticon-star"></i>
                                                            <i class="fi flaticon-star"></i>
                                                            <span>50</span>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td class="ptice">$270</td>
                                        <td class="stock"><span class="in-stock out-stock">Out Stock</span></td>
                                        <td class="add-wish">
                                            <a class="theme-btn-s2" href="cart.html">Shop Now</a>
                                        </td>
                                        <td class="action">
                                            <ul>
                                                <li class="w-btn"><a data-bs-toggle="tooltip"
                                                        data-bs-html="true" title="" href="#"
                                                        data-bs-original-title="Remove"
                                                        aria-label="Remove"><i
                                                            class="fi flaticon-remove"></i></a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr class="wishlist-item">
                                        <td class="product-item-wish">
                                            <div class="check-box"><input type="checkbox"
                                                    class="myproject-checkbox">
                                            </div>
                                            <div class="images">
                                                <span>
                                                    <img src="assets/images/cart/img-4.jpg" alt="">
                                                </span>
                                            </div>
                                            <div class="product">
                                                <ul>
                                                    <li class="first-cart">Hand Made Hat</li>
                                                    <li>
                                                        <div class="rating-product">
                                                            <i class="fi flaticon-star"></i>
                                                            <i class="fi flaticon-star"></i>
                                                            <i class="fi flaticon-star"></i>
                                                            <i class="fi flaticon-star"></i>
                                                            <i class="fi flaticon-star"></i>
                                                            <span>15</span>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td class="ptice">$ 100</td>
                                        <td class="stock"><span class="in-stock">In Stock</span></td>
                                        <td class="add-wish">
                                            <a class="theme-btn-s2" href="cart.html">Shop Now</a>
                                        </td>
                                        <td class="action">
                                            <ul>
                                                <li class="w-btn"><a data-bs-toggle="tooltip"
                                                        data-bs-html="true" title="" href="#"
                                                        data-bs-original-title="Remove"
                                                        aria-label="Remove"><i
                                                            class="fi flaticon-remove"></i></a></li>
                                            </ul>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- cart-area end -->
@endsection
