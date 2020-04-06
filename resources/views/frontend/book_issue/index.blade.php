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
                        <th>Author Name</th>
                        <th>Short Description</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Author Name</th>
                        <th>Short Description</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @isset($authors)
                    @foreach($authors as $author)
                        <tr>
                            <td>{{ $author->author_name }}</td>
                            <td>{{ $author->short_description }}</td>
                            <td>
                                <a class="btn btn-sm btn-success" href="{{ url('/author/show/'.$author->id) }}">View</a> | 
                                <a class="btn btn-sm btn-warning" href="{{ url('/author/edit/'.$author->id) }}">Edit</a> | 
                                <a class="btn btn-sm btn-danger" href="{{ url('/author/destroy/'.$author->id) }}">Delete</a>
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
