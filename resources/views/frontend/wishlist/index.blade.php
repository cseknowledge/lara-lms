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
                        <th>Response</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Book Name</th>
                        <th>Member Name</th>
                        <th>Response</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @isset($wishlists)
                    @foreach($wishlists as $wishlist)
                        <tr>
                            <td>{{ $wishlist->book->book_name }}</td>
                            <td>{{ $wishlist->user->name }}</td>
                            <td>@isset($wishlist->message->message) {{ $wishlist->message->message }} @endisset</td>
                            <td>
                                <a class="btn btn-sm btn-success" href="{{ url('/wishlist/show/'.$wishlist->id) }}">View</a> | 
                                <a class="btn btn-sm btn-warning {{ Auth::user()->id != $wishlist->user_id ? 'disabled' : '' }}" href="{{ Auth::user()->id == $wishlist->user_id ? url('/wishlist/edit/'.$wishlist->id) :  'javascript:;' }}">Edit</a> | 
                                <a class="btn btn-sm btn-danger {{ Auth::user()->id != $wishlist->user_id ? 'disabled' : '' }}" href="{{ Auth::user()->id == $wishlist->user_id ? url('/wishlist/destroy/'.$wishlist->id) :  'javascript:;' }}">Delete</a>
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
