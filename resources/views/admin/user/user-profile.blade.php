@extends('layouts.admin')
@section('content')
<div class="col-lg-4">
    <div class="card">
        <div class="card-header">
            <h3>Update Profile Information</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('user.profile.update') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="">Name</label>
                <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}">
                @error('name')
                    {{ $message }}
                @enderror
                </div>
                <div class="mb-3">
                <label for="">Email</label>
                <input type="email" name="email" class="form-control" value="{{ Auth::user()->email }}">
                @error('email')
                {{ $message }}
            @enderror
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>

            </form>
        </div>
    </div>
</div>

{{-- Password Updated --}}

<div class="col-lg-4">
    <div class="card">
        <div class="card-header">
            <h3>Update Password</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('user.password.update') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="">Current Password</label>
                <input type="password" name="current_password" class="form-control">
                @error('current_password')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
                @if (session('update_password'))
                    <strong class="text-danger">{{ session('update_password') }}</strong>
                @endif
                </div>
                <div class="mb-3">
                    <label for="">New Password</label>
                <input type="password" name="password" class="form-control">
                @error('password')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
                </div>
                <div class="mb-3">
                    <label for="">Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control">
                @error('password_confirmation')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
                </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>

            </form>
        </div>
    </div>
</div>

{{-- Profile Photo Update --}}
<div class="col-lg-4">
    <div class="card">
        <div class="card-header">
            <h3>Update Profile Photo</h3>
        </div>
         @if (session('profile_update'))
            <div class="alert alert-success">{{ session('profile_update') }}</div>
         @endif
        <div class="card-body">
            <form action="{{ route('user.profile.photo') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="">Photo</label>
                   <input type="file" name="photo" class="form-control" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                </div>
                <div class="m-3">
                    <img src="" id="blah" alt="" width="50">
                </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>

            </form>
        </div>
    </div>
</div>
@endsection
