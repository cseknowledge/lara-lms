@extends('layouts.master-layout')

@section('main-content')
    <div class="card">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ isset($publisher) ? $publisher->publisher_name : '' }} Details</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div class="col-md-8 offset-4">
                    <div class="row">
                        <div class="col-md-4">Publisher Name</div>
                        <div class="col-md-4">{{ isset($publisher) ? $publisher->publisher_name : '' }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">Owner Name</div>
                        <div class="col-md-4">{{ isset($publisher) ? $publisher->publisher_owner_name : '' }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">Address</div>
                        <div class="col-md-4">{{ isset($publisher) ? $publisher->address : '' }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">Short Description</div>
                        <div class="col-md-4">{{ isset($publisher) ? $publisher->short_description : '' }}</div>
                    </div>
                </div> 
                <div class="clearfix"></div>                
            </div>
        </div>
        <div class="card-footer py-1">
            <div class="col-md-8 offset-4 custom-margin">               
                <div class="row">
                    <div class="col-md-4"><a class="btn btn-sm btn-primary" href="{{ url('publisher/show/'.($previousPublisherId == '' ? $publisher->id : $previousPublisherId)) }}">Previous</a></div>
                    <div class="col-md-4"><a class="btn btn-sm btn-primary" href="{{ url('publisher/show/'.($nextPublisherId == '' ? $publisher->id : $nextPublisherId)) }}">Next</a></div>
                </div>
            </div>
        </div>
    </div>
@endsection
