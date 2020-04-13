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
                        <th>Author Name</th>
                        <th>Publisher Name</th>
                        <th>Member Name</th>
                        <th>No. of request</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Book Name</th>
                        <th>Author Name</th>
                        <th>Publisher Name</th>
                        <th>Member Name</th>
                        <th>No. of request</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @isset($bookSuggests)
                    @foreach($bookSuggests as $bookSuggest)
                        <tr>
                            <td>{{ $bookSuggest->book_name }}</td>
                            <td>{{ $bookSuggest->author_name }}</td>
                            <td>{{ $bookSuggest->publisher_name }}</td>
                            <td>{{ $bookSuggest->user->name }}</td>
                            <td>{{$bookSuggest->user()->count()}}</td>
                            <td>
                                <a class="btn btn-sm btn-success" href="{{ url('/bookSuggest/show/'.$bookSuggest->id) }}">View</a> | 
                                <a class="btn btn-sm btn-warning {{ Auth::user()->id != $bookSuggest->user_id ? 'disabled' : '' }}" href="{{ Auth::user()->id == $bookSuggest->user_id ? url('/bookSuggest/edit/'.$bookSuggest->id) :  'javascript:;' }}">Edit</a> | 
                                <a class="btn btn-sm btn-danger {{ Auth::user()->id != $bookSuggest->user_id ? 'disabled' : '' }}" href="{{ Auth::user()->id == $bookSuggest->user_id ? url('/bookSuggest/destroy/'.$bookSuggest->id) :  'javascript:;' }}">Delete</a>
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
