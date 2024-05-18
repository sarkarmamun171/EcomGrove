@extends('layouts.admin')
@section('content')
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h3>Sub Category List</h3>
            </div>
            @if (session('delete'))
                <div class="alert alert-danger">{{ session('delete') }}</div>
            @endif
            <div class="card-body">
                <div class="row">
                    @foreach ($categories as $category)
                        <div class="col-lg-6">
                            <div class="card bg-light">
                                <div class="card-header">
                                    <h3>{{ $category->category_name }}</h3>
                                </div>

                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>Subcategory Name</th>
                                            <th>Action</th>
                                        </tr>
                                        {{-- @foreach ($subcategories::where('category_id', $category->id)->get() as $subcategory) --}}
                                        @foreach (App\Models\Subcategory::where('category_id', $category->id)->get() as $subcategory)
                                            <tr>
                                                <td>{{ $subcategory->subcategory_name }}</td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a href="{{ route('subcategory.edit', $subcategory->id) }}"
                                                            class="btn btn-info shadow btn-xs sharp "><i
                                                                class="fa fa-pencil"></i></a>
                                                        &nbsp;
                                                        <a href="{{ route('subcategory.delete', $subcategory->id) }}"
                                                            class="btn btn-danger shadow btn-xs sharp "><i
                                                                class="fa fa-trash"></i></a>
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
        <div class="card-header">
            <h3>Add Sub Category</h3>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-info">{{ session('success') }}</div>
            @endif
            @if (session('exits'))
                <div class="alert alert-info">{{ session('exits') }}</div>
            @endif
            <form action="{{ route('subcategory.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <select name="category" id="" class="form-control">
                        <option value="">Select Option</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                    @error('category')
                        <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="">Sub Category Name</label>
                    <input type="text" class="form-control" name="subcategory_name">
                    @error('subcategory_name')
                        <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-info">Add Subcategory</button>
                </div>
            </form>
        </div>
    </div>
@endsection
