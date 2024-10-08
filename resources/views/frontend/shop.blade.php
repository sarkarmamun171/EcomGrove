@extends('frontend.master')
@section('content')
        <!-- start wpo-page-title -->
        <section class="wpo-page-title">
            <h2 class="d-none">Hide</h2>
            <div class="container">
                <div class="row">
                    <div class="col col-xs-12">
                        <div class="wpo-breadcumb-wrap">
                            <ol class="wpo-breadcumb-wrap">
                                <li><a href="{{ route('index') }}">Home</a></li>
                                <li>Shop</li>
                            </ol>
                        </div>
                    </div>
                </div> <!-- end row -->
            </div> <!-- end container -->
        </section>
        <!-- end page-title -->

        <!-- product-area-start -->
        <div class="shop-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="shop-filter-wrap">
                            <div class="filter-item">
                                <div class="shop-filter-item">
                                    <div class="shop-filter-search">
                                        <form>
                                            <div>
                                                <input type="text" id="search_input2" class="form-control" placeholder="Search..">
                                                <button type="button" name="search-btn2" class="search-btn2"><i class="ti-search"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="filter-item">
                                <div class="shop-filter-item">
                                    <h2>Shop By Category</h2>
                                    <ul>
                                        @foreach ($categories as $category)
                                            <li>
                                                <label class="topcoat-radio-button__label">
                                                    {{ $category->category_name }} <span>{{ App\Models\Product::where('category_id', $category->id)->count() }}</span>
                                                    <input {{ $category->id== @$_GET['category_id']?'checked':'' }} name="category_id" class="category_id" type="radio" value="{{ $category->id }}">
                                                    <span class="topcoat-radio-button"></span>
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="filter-item">
                                <div class="shop-filter-item">
                                    <h2>Filter by price</h2>
                                    <div class="shopWidgetWraper">
                                        <div class="priceFilterSlider">

                                                <div class="d-flex">
                                                    <div class="col-lg-6 pe-2">
                                                        <label for="" class="form-label">Min</label>
                                                        <input id="min" type="text" class="form-control" placeholder="Min Amount" >
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label for="" class="form-label">Max</label>
                                                        <input id="max" type="text" class="form-control" placeholder="Max Amount" >
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 mt-4">
                                                    <button id="price_range" class="form-control bg-light">Submit</button>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="filter-item">
                                <div class="shop-filter-item">
                                    <h2>Color</h2>
                                    <ul>
                                        @foreach ($colors as $color)
                                            <li>
                                                <label class="topcoat-radio-button__label">
                                                    {{ $color->color_name }} <span>({{ App\Models\Inventory::where('color_id', $color->id)->count() }})</span>
                                                    <input {{ $color->id== @$_GET['color_id']?'checked':'' }} class="color_id" type="radio" name="color_id" value="{{ $color->id }}">
                                                    <span class="topcoat-radio-button"></span>
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="filter-item">
                                <div class="shop-filter-item">
                                    <h2>Shop by Size</h2>
                                    <ul>
                                        @foreach ($sizes as $size)
                                            <li>
                                                <label class="topcoat-radio-button__label">
                                                    {{ $size->size_name }} <span>({{ App\Models\Inventory::where('size_id', $size->id)->count() }})</span>
                                                    <input {{ $size->id== @$_GET['size_id']?'checked':'' }} class="size_id" type="radio" name="size_id" value="{{ $size->id }}">
                                                    <span class="topcoat-radio-button"></span>
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="filter-item">
                                <div class="shop-filter-item new-product">
                                    <h2>New Products</h2>
                                    <ul>
                                        <li>
                                            <div class="product-card">
                                                <div class="card-image">
                                                    <div class="image">
                                                        <img src="{{asset('frontend')}}/images/new-product/1.png" alt="">
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <h3><a href="product.html">Stylish Pink Coat</a></h3>
                                                    <div class="rating-product">
                                                        <i class="fi flaticon-star"></i>
                                                        <i class="fi flaticon-star"></i>
                                                        <i class="fi flaticon-star"></i>
                                                        <i class="fi flaticon-star"></i>
                                                        <i class="fi flaticon-star"></i>
                                                        <span>30</span>
                                                    </div>
                                                    <div class="price">
                                                        <span class="present-price">$120.00</span>
                                                        <del class="old-price">$200.00</del>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="product-card">
                                                <div class="card-image">
                                                    <div class="image">
                                                        <img src="{{asset('frontend')}}/images/new-product/2.png" alt="">
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <h3><a href="product.html">Blue Bag</a></h3>
                                                    <div class="rating-product">
                                                        <i class="fi flaticon-star"></i>
                                                        <i class="fi flaticon-star"></i>
                                                        <i class="fi flaticon-star"></i>
                                                        <i class="fi flaticon-star"></i>
                                                        <i class="fi flaticon-star"></i>
                                                        <span>30</span>
                                                    </div>
                                                    <div class="price">
                                                        <span class="present-price">$120.00</span>
                                                        <del class="old-price">$200.00</del>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="product-card">
                                                <div class="card-image">
                                                    <div class="image">
                                                        <img src="{{asset('frontend')}}/images/new-product/3.png" alt="">
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <h3><a href="product.html">Kids Blue Shoes</a></h3>
                                                    <div class="rating-product">
                                                        <i class="fi flaticon-star"></i>
                                                        <i class="fi flaticon-star"></i>
                                                        <i class="fi flaticon-star"></i>
                                                        <i class="fi flaticon-star"></i>
                                                        <i class="fi flaticon-star"></i>
                                                        <span>30</span>
                                                    </div>
                                                    <div class="price">
                                                        <span class="present-price">$120.00</span>
                                                        <del class="old-price">$200.00</del>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="filter-item">
                                <div class="shop-filter-item tag-widget">
                                    <h2>Popular Tags</h2>
                                    <ul>
                                        @foreach ($tags as $tag)
                                            <li>
                                                <label class="topcoat-radio-button_label" style="margin-left:25px">
                                                    {{ $tag->tag }}
                                                    <input {{ $tag->id== @$_GET['tag_id']?'checked':'' }} type="radio" name="tag_id" class="tag_id"  value="{{ $tag->id }}">
                                                    <span class="topcoat-radio-button"></span>
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                    {{-- <ul>
                                        @foreach ($tags as $tags )
                                            <li><a class="tag_id" data-tag="{{ $tags->id }}">{{ $tags->tag }}</a></li>
                                        @endforeach
                                    </ul> --}}
                                    {{-- <select name="tags[]" id="select_gear" class="demo-default" multiple placeholder="Select Tag...">
                                        <optgroup>
                                            @foreach ($tags as $tag)
                                                <option value="{{ $tag->id }}">{{ $tag->tag }}</option>
                                            @endforeach
                                        </optgroup>
                                    </select> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="shop-section-top-inner">
                            <div class="shoping-product">
                                <p>We found <span>{{ $products->count() }} items</span> for you!</p>
                            </div>
                            <div class="short-by">
                                <ul>
                                    <li>
                                        Sort by:
                                    </li>
                                    <li>
                                        <select name="show" class="sorting">
                                            <option value="">Default Sorting</option>
                                            <option value="1">Price Low To High</option>
                                            <option value="2">Price High To Low</option>
                                            <option value="3">Name (A-Z)</option>
                                            <option value="4">Name (Z-A)</option>
                                        </select>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-wrap">
                            <div class="row align-items-center">
                                @forelse ($products as $product)
                                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="product-item">
                                            <div class="image">
                                                <img height="200" src="{{asset('uploads/product/previewImage')}}/{{ $product->preview_image }}" alt="product">
                                                <div class="tag new">New</div>
                                            </div>
                                            <div class="text">
                                                <h2>
                                                    <a href="{{ route('product.details', $product->slug) }}" title="{{ $product->product_name }}">
                                                        @if (strlen($product->product_name) > 20)
                                                            {{Str::substr($product->product_name, 0, 10).'...'}}
                                                        @else
                                                            {{$product->product_name}}
                                                        @endif
                                                    </a>
                                                </h2>
                                                <div class="rating-product">
                                                    <i class="fi flaticon-star"></i>
                                                    <i class="fi flaticon-star"></i>
                                                    <i class="fi flaticon-star"></i>
                                                    <i class="fi flaticon-star"></i>
                                                    <i class="fi flaticon-star"></i>
                                                    <span>130</span>
                                                </div>
                                                <div class="price">
                                                    <span class="present-price">&#2547;{{ number_format($product->after_discount )}}</span>
                                                    <del class="old-price">&#2547;{{ number_format($product->price )}}</del>
                                                </div>
                                                <div class="shop-btn">
                                                    <a class="theme-btn-s2" href="{{ route('product.details', $product->slug) }}">Shop Now</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                    <H3>No Product Found</H3>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- product-area-end -->



@endsection
@section('footer_script')
    <script>
        $('.search-btn').click(function(){
            var top_catid = $('#top_cat').val();
            var search_input = $('#search_input').val();
            var category_id = $("input[type='radio'][name='category_id']:checked").val();
            var color_id = $("input[type='radio'][name='color_id']:checked").val();
            var size_id = $("input[type='radio'][name='size_id']:checked").val();
            var tag_id = $("input[type='radio'][name='tag_id']:checked").val();
            var min = $('#min').val();
            var max = $('#max').val();
            var sorting = $('.sorting').val();
            var link = "{{ route('shop') }}"+"?search_input="+search_input+"&category_id="+category_id+"&min="+min+"&max="+max+"&sorting="+sorting+"&top_catid="+top_catid+"&color_id="+color_id+"&size_id="+size_id+"&tag_id="+tag_id;
            window.location.href = link;
        })
        $('.category_id').click(function(){
            var top_catid = $('#top_cat').val();
            var search_input = $('#search_input').val();
            var category_id = $("input[type='radio'][name='category_id']:checked").val();
            var color_id = $("input[type='radio'][name='color_id']:checked").val();
            var size_id = $("input[type='radio'][name='size_id']:checked").val();
            var tag_id = $("input[type='radio'][name='tag_id']:checked").val();
            var min = $('#min').val();
            var max = $('#max').val();
            var sorting = $('.sorting').val();
            var link = "{{ route('shop') }}"+"?search_input="+search_input+"&category_id="+category_id+"&min="+min+"&max="+max+"&sorting="+sorting+"&top_catid="+top_catid+"&color_id="+color_id+"&size_id="+size_id+"&tag_id="+tag_id;
            window.location.href = link;
        })
        $('#price_range').click(function(){
            var top_catid = $('#top_cat').val();
            var search_input = $('#search_input').val();
            var category_id = $("input[type='radio'][name='category_id']:checked").val();
            var color_id = $("input[type='radio'][name='color_id']:checked").val();
            var size_id = $("input[type='radio'][name='size_id']:checked").val();
            var tag_id = $("input[type='radio'][name='tag_id']:checked").val();
            var min = $('#min').val();
            var max = $('#max').val();
            var sorting = $('.sorting').val();
            var link = "{{ route('shop') }}"+"?search_input="+search_input+"&category_id="+category_id+"&min="+min+"&max="+max+"&sorting="+sorting+"&top_catid="+top_catid+"&color_id="+color_id+"&size_id="+size_id+"&tag_id="+tag_id;
            window.location.href = link;
        })
        $('#color_id').click(function(){
            var top_catid = $('#top_cat').val();
            var search_input = $('#search_input').val();
            var category_id = $("input[type='radio'][name='category_id']:checked").val();
            var color_id = $("input[type='radio'][name='color_id']:checked").val();
            var size_id = $("input[type='radio'][name='size_id']:checked").val();
            var tag_id = $("input[type='radio'][name='tag_id']:checked").val();
            var min = $('#min').val();
            var max = $('#max').val();
            var sorting = $('.sorting').val();
            var link = "{{ route('shop') }}"+"?search_input="+search_input+"&category_id="+category_id+"&min="+min+"&max="+max+"&sorting="+sorting+"&top_catid="+top_catid+"&color_id="+color_id+"&size_id="+size_id+"&tag_id="+tag_id;
            window.location.href = link;
        })
        $('#size_id').click(function(){
            var top_catid = $('#top_cat').val();
            var search_input = $('#search_input').val();
            var category_id = $("input[type='radio'][name='category_id']:checked").val();
            var color_id = $("input[type='radio'][name='color_id']:checked").val();
            var size_id = $("input[type='radio'][name='size_id']:checked").val();
            var tag_id = $("input[type='radio'][name='tag_id']:checked").val();
            var min = $('#min').val();
            var max = $('#max').val();
            var sorting = $('.sorting').val();
            var link = "{{ route('shop') }}"+"?search_input="+search_input+"&category_id="+category_id+"&min="+min+"&max="+max+"&sorting="+sorting+"&top_catid="+top_catid+"&color_id="+color_id+"&size_id="+size_id+"&tag_id="+tag_id;
            window.location.href = link;
        })
        $('.sorting').change(function(){
            var top_catid = $('#top_cat').val();
            var search_input = $('#search_input').val();
            var category_id = $("input[type='radio'][name='category_id']:checked").val();
            var color_id = $("input[type='radio'][name='color_id']:checked").val();
            var size_id = $("input[type='radio'][name='size_id']:checked").val();
            var tag_id = $("input[type='radio'][name='tag_id']:checked").val();
            var min = $('#min').val();
            var max = $('#max').val();
            var sorting = $('.sorting').val();
            var link = "{{ route('shop') }}"+"?search_input="+search_input+"&category_id="+category_id+"&min="+min+"&max="+max+"&sorting="+sorting+"&top_catid="+top_catid+"&color_id="+color_id+"&size_id="+size_id+"&tag_id="+tag_id;
            window.location.href = link;
        })
        $('.tag_id').change(function(){
            var top_catid = $('#top_cat').val();
            var search_input = $('#search_input').val();
            var category_id = $("input[type='radio'][name='category_id']:checked").val();
            var color_id = $("input[type='radio'][name='color_id']:checked").val();
            var size_id = $("input[type='radio'][name='size_id']:checked").val();
            var tag_id = $("input[type='radio'][name='tag_id']:checked").val();
            var min = $('#min').val();
            var max = $('#max').val();
            var sorting = $('.sorting').val();
            var link = "{{ route('shop') }}"+"?search_input="+search_input+"&category_id="+category_id+"&min="+min+"&max="+max+"&sorting="+sorting+"&top_catid="+top_catid+"&color_id="+color_id+"&size_id="+size_id+"&tag_id="+tag_id;
            window.location.href = link;
        })

        $('.search-btn2').click(function(){
            var search_input2 = $('#search_input2').val();
            var link = "{{ route('shop') }}"+"?search_input="+search_input2;
            window.location.href = link;
        })
    </script>
@endsection
