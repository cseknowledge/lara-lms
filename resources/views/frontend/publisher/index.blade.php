@extends('layouts.master-layout')

@section('main-content')
    <div class="card">
        <div class="card-header py-3">List of all publisher</div>
        <div class="card-body">
            @if(Session::has('flash_message'))
                <div class="alert alert-success" role="alert" id="success_message">{{ Session::get('flash_message') }}.</div>
            @endif 

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Publisher Name</th>
                        <th>Owner Name</th>
                        <th>Address</th>
                        <th>Short Description</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Publisher Name</th>
                        <th>Owner Name</th>
                        <th>Address</th>
                        <th>Short Description</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @isset($publishers)
                    @foreach($publishers as $publisher)
                        <tr>
                            <td>{{ $publisher->publisher_name }}</td>
                            <td>{{ $publisher->publisher_owner_name }}</td>
                            <td>{{ $publisher->address }}</td>
                            <td>{{ $publisher->short_description }}</td>
                            <td>
                                <a class="btn btn-sm btn-success" href="{{ url('/publisher/show/'.$publisher->id) }}">View</a> | 
                                <a class="btn btn-sm btn-warning" href="{{ url('/publisher/edit/'.$publisher->id) }}">Edit</a> | 
                                <a class="btn btn-sm btn-danger" href="{{ url('/publisher/destroy/'.$publisher->id) }}">Delete</a>
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
