@extends('layouts.admin')
@section('content')
<div class="col-lg-8 m-auto">
    <div class="card">
        <div class="card-header">
            <h3>Edit brand</h3>
        </div>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="card-body">
            <form action="{{ route('brand.update',$brands->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="" class="form-label">Brand Name</label>
                    <input type="text" name="brand_name" id="" class="form-control" value="{{ $brands->brand_name }}">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Brand Logo</label>
                    <input type="file" name="brand_logo" class="form-control"  onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                    <div class="my-2">
                        <img src="{{ asset('uploads/brand') }}/{{ $brands->brand_logo }}" alt="" srcset="" id="blah" width="70">
                    </div>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Update Brand</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
