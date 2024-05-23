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
                @foreach ($colors as $sl=>$color)
                <tr>
                    <td>{{ $sl+1 }}</td>
                    <td>{{ $color->color_name }}</td>
                    <td><i style="width:50px; height:50px; background_color:{{ $color->color_code }};color:transparent">color</i></td>
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
@endsection
