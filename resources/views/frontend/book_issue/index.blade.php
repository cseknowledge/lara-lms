@extends('layouts.master-layout')

@section('main-content')
    <div class="card">
        <div class="card-header py-3">List of all author</div>
        <div class="card-body">
            @if(Session::has('flash_message'))
                <div class="alert alert-success" role="alert" id="success_message">{{ Session::get('flash_message') }}.</div>
            @endif 

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Book Name</th>
                        <th>Member Name</th>
                        <th>Issue Date</th>
                        <th>Return Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Book Name</th>
                        <th>Member Name</th>
                        <th>Issue Date</th>
                        <th>Return Date</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @isset($bookIssueds)
                    @foreach($bookIssueds as $bookIssued)
                        <tr>
                            <td>{{ $bookIssued->book->book_name }}</td>
                            <td>{{ $bookIssued->user->name }}</td>
                            <td>{{ Carbon\Carbon::parse($bookIssued->issue_date)->format('d-m-Y') }}</td>
                            <td>{{ Carbon\Carbon::parse($bookIssued->return_date)->format('d-m-Y') }}</td>
                            <td>
                                <a class="btn btn-sm btn-success" href="{{ url('/bookIssued/show/'.$bookIssued->id) }}">View</a> | 
                                <a class="btn btn-sm btn-warning" href="{{ url('/bookIssued/edit/'.$bookIssued->id) }}">Edit</a> | 
                                <a class="btn btn-sm btn-danger" href="{{ url('/bookIssued/destroy/'.$bookIssued->id) }}">Delete</a>
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
