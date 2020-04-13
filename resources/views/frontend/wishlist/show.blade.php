@extends('layouts.master-layout')

@section('main-content')
    <div class="card">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ isset($wishlist) ? $wishlist->book->book_name : '' }} Details</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div class="col-md-8 offset-4">
                    <div class="row">
                        <div class="col-md-4">Book Name</div>
                        <div class="col-md-4">{{ isset($wishlist) ? $wishlist->book->book_name : '' }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">Message</div>
                        <div class="col-md-4">@isset($wishlist->message->message) {{ $wishlist->message->message }} @endisset</div>
                    </div>
                </div> 
                <div class="clearfix"></div>                
            </div>
        </div>
        <div class="card-footer py-1">
            <div class="col-md-8 offset-4 custom-margin">               
                <div class="row">
                    <div class="col-md-4"><a class="btn btn-sm btn-primary" href="{{ url('wishlist/show/'.($previousWishlistId == '' ? $wishlist->id : $previousWishlistId)) }}">Previous</a></div>
                    <div class="col-md-4"><a class="btn btn-sm btn-primary" href="{{ url('wishlist/show/'.($nextWishlistId == '' ? $wishlist->id : $nextWishlistId)) }}">Next</a></div>
                </div>
            </div>
        </div>
    </div>
@endsection
