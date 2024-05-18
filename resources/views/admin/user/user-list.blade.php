@extends('layouts.admin')
@section('content')
    <div class="col-lg-8 m-auto">
        <div class="card">
            <div class="card-header">
                <h3>User List</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>SL</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>
                                @if ($user->photo == null)
                                    <img src="{{ Avatar::create($user->name)->toBase64() }}" width="50" />
                                @else
                                    <img src="{{ asset('uploads/user') }}/{{ $user->photo }}" width="50" alt="" />
                                @endif
                            </td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <div class="d-flex">
                                    <button class="btn btn-danger shadow btn-xs sharp del_btn"
                                        data-link={{ route('user.remove', $user->id) }}><i class="fa fa-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                </table>
            </div>
        </div>
    </div>
@endsection

@section('footer_script')
    <script>
        $('.del_btn').click(function() {
            var link = $(this).attr('data-link');

            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = link
                }
            });
        })
    </script>
    @if (session('delete'))
        <script>
            Swal.fire({
                title: "Deleted!",
                text: "{{ session('delete') }}",
                icon: "success"
            });
        </script>
    @endif
@endsection
