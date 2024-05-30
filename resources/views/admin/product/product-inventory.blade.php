@extends('layouts.admin')
@section('content')
<div class="col-lg-8">
    <div class="card">
        <div class="card-header">
            <h3>Inventory of <strong>{{ $products->product_name }}</strong></h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Color Name</th>
                    <th>Size Name</th>
                    <th>Quantity</th>
                    <th>Action</th>
                </tr>
                @foreach ($inventories as $inventory)
                    <tr>
                        <td>{{ $inventory->rel_to_color->color_name }}</td>
                        <td>{{ $inventory->rel_to_size->size_name }}</td>
                        <td>{{ $inventory->quantity }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
<div class="col-lg-4">
    <div class="card">
        <div class="card-header">
            <h3>Add Inventory</h3>
        </div>
        @if (session('inventory'))
            <strong class="text-info">{{ session('inventory') }}</strong>
        @endif
        <div class="card-body">
            <form action="{{ route('inventory.store',$products->id) }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="" class="form-label">Product</label>
                    <input type="text" class="form-control" disabled value="{{ $products->product_name }}">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Color</label>
                    <select name="color_id" class="form-control">
                        <option value="">Select Color</option>
                    @foreach ($colors as $color)
                        <option value="{{ $color->id }}">{{ $color->color_name }}</option>
                    @endforeach
                </select>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Size</label>
                    <select name="size_id" class="form-control">
                        <option value="">Select Size</option>
                    @foreach (App\Models\Size::where('category_id',$products->category_id)->get() as $size)
                        <option value="{{ $size->id }}">{{ $size->size_name }}</option>
                    @endforeach
                </select>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Quantity</label>
                    <input type="text" name="quantity" class="form-control">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Add Inventory</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
