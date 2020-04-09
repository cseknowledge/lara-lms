@extends('layouts.master-layout')

@section('main-content')
    <div class="card">
        <div class="card-header py-3">List of all book</div>
        <div class="card-body">
            @if(Session::has('flash_message'))
                <div class="alert alert-success" role="alert" id="success_message">{{ Session::get('flash_message') }}.</div>
            @endif 

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>User Type</th>
                        <th>Address</th>
                        <th>Expiry Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>User Type</th>
                        <th>Address</th>
                        <th>Expiry Date</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @isset($users)
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->member_id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->member_type }}</td>
                            <td>{{ $user->address }}</td>
                            <td>{{ $user->expiry_date }}</td>
                            <td>
                                <a class="btn btn-sm btn-success" href="{{ url('/user/show/'.$user->id) }}">View</a> | 
                                <a class="btn btn-sm btn-warning {{ (Auth::user()->id == $user->id) ? 'disabled' : '' }}" href="{{ url('/user/edit/'.$user->id) }}">Edit</a> | 
                                <a class="btn btn-sm btn-danger {{ (Auth::user()->id == $user->id) ? 'disabled' : '' }}" href="{{ (Auth::user()->member_type == 'Super Admin') ? 'javascript:;' : url('/user/destroy/'.$user->id) }}">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    @endisset
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
