@extends('layouts.admin')
@section('content')
<div class="col-lg-6 m-auto">
<div class="card-header">
    <h3>Category Edit</h3>
</div>
<div class="card-body">
    <form action="{{ route('category.update') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <input type="hidden" name="category_id" value="{{ $category_edit->id }}">
            <label for="">Category Name</label>
            <input type="text" name="category_name" class="form-control" value="{{ $category_edit->category_name }}">
            @error('category_name')
            <strong class="text-danger">{{ message }}</strong>
            @enderror
        </div>
        <div class="mb-3">
            <label for="">Category Image</label>
            <input type="file" name="category_image" class="form-control"  onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
            @error('category_image')
            <strong class="text-danger">{{ message }}</strong>
            @enderror
        </div>
        <div class="mb-2">
            <img id="blah" src="{{ asset('uploads/category') }}/{{ $category_edit->category_image }}" alt="" width="100">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-info">Update Category</button>
        </div>
    </form>
</div>
</div>
@endsection
