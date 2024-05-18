@extends('layouts.admin')
@section('content')
<div class="col-lg-8">
    <form action="" method="post">
        @csrf
    <div class="card">
        <div class="card-header">
            <h3>Brand List</h3>
        </div>
        @if (session('delete'))
            <div class="alert alert-danger">{{ session('delete') }}</div>
        @endif
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    {{-- <th>
                        <div class="custom-control custom-checkbox mb-3">
                            <input type="checkbox" class="custom-control-input" id="checkAll">
                            <label for="checkAll" class="custom-control-label">CheckAll</label>
                        </div>
                    </th> --}}
                    <th>SL</th>
                    <th>Brand Name</th>
                    <th>Brnad Logo</th>
                    <th>Action</th>
                </tr>
                @foreach ($brands as $sl=>$brand)
                    <tr>
                        {{-- <td>
                            <div class="custom-control custom-checkbox mb-3">
                                <input type="checkbox" class="custom-control-input" name="category_id[]" id="cate{{ $category->id }}" value="{{ $category->id }}">
                                <label for="cate{{ $category->id }}" class="custom-control-label"></label>
                            </div>
                        </td> --}}
                        <td>{{$brands->firstitem()+$sl}}</td>
                        <td>{{ $brand->brand_name }}</td>
                        <td>
                            <img src="{{ asset('uploads/brand')}}/{{ $brand->brand_logo }}" width="50" alt="">
                        </td>
                        <td>
                            <div class="d-flex">
                                <a href="{{ route('brand.edit',$brand->id) }}" class="btn btn-info shadow btn-xs sharp "><i class="fa fa-pencil"></i></a>
                                &nbsp;
                                <a href="{{ route('brand.delete',$brand->id) }}" class="btn btn-danger shadow btn-xs sharp "><i class="fa fa-trash"></i></a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
            {{ $brands->links() }}
            {{-- <button type="submit" class="btn btn-danger">Delete All</button> --}}
        </div>
    </div>
</form>
</div>
<div class="col-lg-4">
    <div class="card">
        <div class="card-header">
            <h3>Add New Brand</h3>
        </div>
        @if (session('success'))
            <div class="alert alert-info">{{ session('success') }}</div>
        @endif
        <div class="card-body">
           <form action="{{ route('brand.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Brand Name</label>
                <input type="text" name="brand_name" class="form-control">
                    @error('brand_name')
                        <strong class="text-danger">{{ $message }}</strong>
                    @enderror
            </div>

            <div class="mb-3">
                <label for=""  class="form-label">Brand Logo</label>
                <input type="file" name="brand_logo" class="form-control">
                    @error('brand_logo')
                    <strong class="text-danger">{{ $message }}</strong>
                    @enderror
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Add Barand</button>
            </div>
           </form>
        </div>
    </div>
</div>

@endsection
