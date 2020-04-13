@extends('layouts.master-layout')

@section('main-content')
    <div class="card">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ isset($bookSuggest) ? $bookSuggest->book_name : '' }} Details</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div class="col-md-8 offset-4">
                    <div class="row">
                        <div class="col-md-4">Book Name</div>
                        <div class="col-md-4">{{ isset($bookSuggest) ? $bookSuggest->book_name : '' }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">Author Name</div>
                        <div class="col-md-4">{{ isset($bookSuggest) ? $bookSuggest->author_name : '' }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">Punlisher Name</div>
                        <div class="col-md-4">{{ isset($bookSuggest) ? $bookSuggest->publisher_name : '' }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">Member Name</div>
                        <div class="col-md-4">{{ isset($bookSuggest) ? $bookSuggest->user->name : '' }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">Book Request No.</div>
                        <div class="col-md-4"></div>
                    </div>
                </div> 
                <div class="clearfix"></div>                
            </div>
        </div>
        <div class="card-footer py-1">
            <div class="col-md-8 offset-4 custom-margin">               
                <div class="row">
                    <div class="col-md-4"><a class="btn btn-sm btn-primary" href="{{ url('bookSuggest/show/'.($previousBookSuggestId == '' ? $bookSuggest->id : $previousBookSuggestId)) }}">Previous</a></div>
                    <div class="col-md-4"><a class="btn btn-sm btn-primary" href="{{ url('bookSuggest/show/'.($nextBookSuggestId == '' ? $bookSuggest->id : $nextBookSuggestId)) }}">Next</a></div>
                </div>
            </div>
        </div>
    </div>
@endsection
