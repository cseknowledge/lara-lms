@extends('layouts.master-layout')

@section('main-content')
    <div class="card">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ isset($book) ? $book->book_name : '' }} Details</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div class="col-md-8 offset-4">
                    <div class="row">
                        <div class="col-md-4">Book Name</div>
                        <div class="col-md-4">{{ isset($book) ? $book->book_name : '' }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">Author Name</div>
                        <div class="col-md-4">{{ isset($book) ? $book->author->author_name : '' }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">Publisher Name</div>
                        <div class="col-md-4">{{ isset($book) ? $book->publisher->publisher_name : '' }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">Quantity</div>
                        <div class="col-md-4">{{ isset($book) ? $book->quantity : '' }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">Price</div>
                        <div class="col-md-4">{{ isset($book) ? $book->price : '' }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">Availability</div>
                        <div class="col-md-4">{{ isset($book) ? $book->is_available : '' }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">Short Description</div>
                        <div class="col-md-4">{{ isset($book) ? $book->short_description : '' }}</div>
                    </div>
                </div> 
                <div class="clearfix"></div>                
            </div>
        </div>
        <div class="card-footer py-1">
            <div class="col-md-8 offset-4 custom-margin">               
                <div class="row">
                    <div class="col-md-4"><a class="btn btn-sm btn-primary" href="{{ url('book/show/'.($previousBookId == '' ? $book->id : $previousBookId)) }}">Previous</a></div>
                    <div class="col-md-4"><a class="btn btn-sm btn-primary" href="{{ url('book/show/'.($nextBookId == '' ? $book->id : $nextBookId)) }}">Next</a></div>
                </div>
            </div>
        </div>
    </div>
@endsection
