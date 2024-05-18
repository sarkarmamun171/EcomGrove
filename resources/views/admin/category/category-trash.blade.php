@extends('layouts.admin')

@section('content')
<div class="col-lg-8">
    <form action="{{ route('category.trash.restore') }}" method="post">
        @csrf
    <div class="card">
        <div class="card-header">
            <h3>Trash Category List</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>
                        <div class="custom-control custom-checkbox mb-3">
                            <input type="checkbox" class="custom-control-input" id="checkAll">
                            <label for="checkAll" class="custom-control-label">CheckAll</label>
                        </div>
                    </th>
                    <th>SL</th>
                    <th>Category Name</th>
                    <th>Category Image</th>
                    <th>Action</th>
                </tr>
                @forelse ($categories_trash as $sl=>$category)
                    <tr>
                        <td>
                            <div class="custom-control custom-checkbox mb-3">
                                <input type="checkbox" class="custom-control-input" name="category_id[]" id="cate{{ $category->id }}" value="{{ $category->id }}">
                                <label for="cate{{ $category->id }}" class="custom-control-label"></label>
                            </div>
                        </td>
                        <td>{{ $sl+1 }}</td>
                        <td>{{ $category->category_name }}</td>
                        <td>
                            <img src="{{ asset('uploads/category')}}/{{ $category->category_image }}" width="50" alt="">
                        </td>
                        <td>
                            <div class="d-flex">
                                <a href="{{ route('category.restort',$category->id) }}" class="btn btn-info shadow btn-xs sharp" title="Restore"><i class="fa fa-reply"></i></a>
                                &nbsp;
                                <a href="{{ route('category.hard.delete',$category->id) }}" class="btn btn-danger shadow btn-xs sharp" title="Delete"><i class="fa fa-trash"></i></a>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center">No Data Found</td>
                    </tr>
                @endforelse
            </table>
            <button type="submit" class="btn btn-info">Trash Restore</button>
        </div>
    </div>
</form>
</div>
@endsection
@section('footer_script')
<script>
    $("#checkAll").function() {
        $('input:checkbox').not(this).prop('checked',this.checked);
    }
</script>
@endsection
