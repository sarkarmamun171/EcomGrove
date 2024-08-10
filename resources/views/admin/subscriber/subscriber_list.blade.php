@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="col-lg-10 m-auto">
        <div class="card">
            <div class="card-header">
                <h3>Subscriber List</h3>
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <table class="table table-bordered">
                    <tr>
                        <th>SL</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($subscribers as $sl=>$subscriber)
                    <tr>
                        <td>{{ $sl+1 }}</td>
                        <td>{{ $subscriber->email }}</td>
                        <td>
                            <a href="{{ route('send.newsletter',$subscriber->id) }}" class="btn btn-success">Send Newsletter</a>
                            <a href="" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
