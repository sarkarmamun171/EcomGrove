@extends('layouts.admin')
@section('content')
<div class="col-lg-6 m-auto ">
    <div class="card-header">
        <h3>Edit Sub Category</h3>
    </div>
    <div class="card-body">
        @if (session('success'))
            <div class="alert alert-info">{{ session('success') }}</div>
        @endif
        @if (session('exits'))
        <div class="alert alert-info">{{ session('exits') }}</div>
    @endif

        <form action="{{ route('subcategory.update',$subcategories->id) }}" method="post">
            @csrf
        <div class="mb-3">
            <select name="category" id="" class="form-control">
                <option value="">Select Option</option>
                @foreach ($categories as $category )
                <option value="{{ $category->id }}" {{ $category->id==$subcategories->category_id?'selected':'' }}>{{ $category->category_name }}</option>
                @endforeach
            </select>
            @error('category')
                <strong class="text-danger">{{ $message }}</strong>
            @enderror
        </div>
        <div class="mb-3">
            <label for="">Sub Category Name</label>
            <input type="text" class="form-control" name="subcategory_name" value="{{ $subcategories->subcategory_name }}">
            @error('subcategory_name')
            <strong class="text-danger">{{ $message }}</strong>
        @enderror
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-info">Update Subcategory</button>
        </div>
    </form>
    </div>
</div>
@endsection
