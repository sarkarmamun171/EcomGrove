@extends('layouts.admin')
@section('content')
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h3>Color List</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>SL</th>
                        <th>Color Name</th>
                        <th>Color Code</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($colors as $sl => $color)
                        <tr>
                            <td>{{ $sl + 1 }}</td>
                            <td>{{ $color->color_name }}</td>
                            <td>
                                <i style="width: 50px; height:50px;background-color:{{ $color->color_code }};">
                                    @if ($color->color_code == null)
                                        <span class="text-danger">{{ $color->color_name }}</span>
                                    @else
                                        <span style="color:transparent">{{ $color->color_name }}</span>
                                    @endif
                                </i>
                            </td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{ route('color.remove',$color->id) }}" class="btn btn-danger shadow btn-xs sharp "><i class="fa fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h3>Add Color</h3>
            </div>
            @if (session('success'))
                <div class="alert alert-info">{{ session('success') }}</div>
            @endif
            <div class="card-body">
                <form action="{{ route('color.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Color Name</label>
                        <input type="text" name="color_name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Color Code</label>
                        <input type="text" name="color_code" class="form-control">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Add Color</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h3>Size List</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    @foreach ($categories as $category)
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <h3>{{ $category->category_name }}</h3>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>Size</th>
                                            <th>Action</th>
                                        </tr>
                                        @foreach (App\Models\Size::where('category_id',$category->id)->get() as $size)
                                            <tr>
                                                <td>{{ $size->size_name }}</td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a href="{{ route('size.remove',$size->id) }}" class="btn btn-danger shadow btn-xs sharp "><i class="fa fa-trash"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h3>Add Size</h3>
            </div>
            @if (session('size'))
                <div class="alert alert-info">{{ session('size') }}</div>
            @endif
            <div class="card-body">
                <form action="{{ route('size.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Categoty Name</label>
                        <select name="category_id" class="form-control">
                        <option value="">Select Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Size Name</label>
                        <input type="text" name="size_name" id="" class="form-control">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-info">Add Size</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
