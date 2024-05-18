@extends('layouts.admin')
@section('content')
<div class="col-lg-8 m-auto">
    <div class="card">
        <div class="card-header">
            <h3>Admin Panel</h3>
        </div>
        <div class="card-body">
            <h5>Welcom to admin <strong>{{ Auth::user()->name }}</strong> </h5>
        </div>
    </div>
</div>
@endsection
