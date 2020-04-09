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
                        <th>Book Name</th>
                        <th>Author Name</th>
                        <th>Publisher Name</th>
                        <th>price</th>
                        <th>Quantity</th>
                        <th>Short Description</th>
                        <th>Availability</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Book Name</th>
                        <th>Author Name</th>
                        <th>Publisher Name</th>
                        <th>price</th>
                        <th>Quantity</th>
                        <th>Short Description</th>
                        <th>Availability</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @isset($books)
                    @foreach($books as $book)
                        <tr>
                            <td>{{ $book->book_name }}</td>
                            <td>{{ $book->author->author_name }}</td>
                            <td>{{ $book->publisher->publisher_name }}</td>
                            <td>{{ $book->price }}</td>
                            <td>{{ $book->quantity }}</td>
                            <td>{{ $book->short_description }}</td>
                            <td>{{ $book->is_available == 1 ? "Available" : "Not Available" }}</td>
                            <td>
                                <a class="btn btn-sm btn-success" href="{{ url('/book/show/'.$book->id) }}">View</a> | 
                                <a class="btn btn-sm btn-warning" href="{{ url('/book/edit/'.$book->id) }}">Edit</a> | 
                                <a class="btn btn-sm btn-danger" href="{{ url('/book/destroy/'.$book->id) }}">Delete</a>
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
