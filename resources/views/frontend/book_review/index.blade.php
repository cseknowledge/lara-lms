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
                        <th>Member Name</th>
                        <th>Book Name</th>
                        <th>Book Review</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Member Name</th>
                        <th>Book Name</th>
                        <th>Book Review</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @isset($bookReviews)
                    @foreach($bookReviews as $bookReview)
                        <tr>
                            <td>{{ $bookReview->user->name }}</td>
                            <td>{{ $bookReview->book->book_name }}</td>
                            <td>{{ $bookReview->book_review }}</td>
                            <td>
                                <a class="btn btn-sm btn-success" href="{{ url('/bookReview/show/'.$bookReview->id) }}">View</a> | 
                                <a class="btn btn-sm btn-warning {{ Auth::user()->id != $bookReview->user_id ? 'disabled' : '' }}" href="{{ Auth::user()->id == $bookReview->user_id ? url('/bookReview/edit/'.$bookReview->id) :  'javascript:;' }}">Edit</a> | 
                                <a class="btn btn-sm btn-danger {{ Auth::user()->id != $bookReview->user_id ? 'disabled' : '' }}" href="{{ Auth::user()->id == $bookReview->user_id ? url('/bookReview/destroy/'.$bookReview->id) :  'javascript:;' }}">Delete</a>
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
