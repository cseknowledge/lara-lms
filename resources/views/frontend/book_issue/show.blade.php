@extends('layouts.master-layout')

@section('main-content')
    <div class="card">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ isset($bookIssued) ? $bookIssued->book->book_name : '' }} Details</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div class="col-md-8 offset-4">
                    <div class="row">
                        <div class="col-md-4">Book Name</div>
                        <div class="col-md-4">{{ isset($bookIssued) ? $bookIssued->book->book_name : '' }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">Member Name</div>
                        <div class="col-md-4">{{ isset($bookIssued) ? $bookIssued->user->name : '' }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">Issue Date</div>
                        <div class="col-md-4">{{ isset($bookIssued) ? $bookIssued->issue_date : '' }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">Return Date</div>
                        <div class="col-md-4">{{ isset($bookIssued) ? $bookIssued->return_date : '' }}</div>
                    </div>
                </div> 
                <div class="clearfix"></div>                
            </div>
        </div>
        <div class="card-footer py-1">
            <div class="col-md-8 offset-4 custom-margin">               
                <div class="row">
                    <div class="col-md-4"><a class="btn btn-sm btn-primary" href="{{ url('bookIssued/show/'.($previousBookIssuedId == '' ? $bookIssued->id : $previousBookIssuedId)) }}">Previous</a></div>
                    <div class="col-md-4"><a class="btn btn-sm btn-primary" href="{{ url('bookIssued/show/'.($nextBookIssuedId == '' ? $bookIssued->id : $nextBookIssuedId)) }}">Next</a></div>
                </div>
            </div>
        </div>
    </div>
@endsection
