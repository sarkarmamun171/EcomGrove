@extends('layouts.admin')
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h3>Product List</h3>
            <a href="{{ route('add.product') }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i></i>Product Add</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>SL</th>
                    <th>Category</th>
                    <th>Subcategory</th>
                    <th>Brand</th>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Discount</th>
                    <th>After Discount</th>
                    <th>Preview Image</th>
                    <th>Action</th>
                </tr>
                @foreach ($products as $sl=>$product)
                <tr>
                    <td>{{ $products->firstitem()+$sl }}</td>
                    <td>{{ $product->rel_to_category->category_name }}</td>
                    <td>{{ $product->rel_to_subcategory->subcategory_name }}</td>
                    <td>{{ $product->rel_to_brand->brand_name }}</td>
                    <td>{{ $product->product_name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->discount }}</td>
                    <td>{{ $product->after_discount }}</td>
                    <td>
                        <img src="{{ asset('uploads/product/previewImage') }}/{{ $product->preview_image }}" alt="" width="70">
                    </td>
                    <td>
                        <div class="d-flex">
                            <a title="Inventory" href="{{ route('product.inventory',$product->id) }}" class="btn btn-success shadow btn-xs sharp "><i class="fa-solid fa-store"></i></a>
                            &nbsp;
                            <a title="Show" href="{{ route('product.show',$product->id) }}" class="btn btn-info shadow btn-xs sharp "><i class="fa fa-eye"></i></a>
                            &nbsp;
                            <a title="Delete" href="{{ route('product.delete',$product->id) }}" class="btn btn-danger shadow btn-xs sharp "><i class="fa fa-trash"></i></a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </table>
            {{   $products->links() }}
        </div>
    </div>
</div>
@endsection
