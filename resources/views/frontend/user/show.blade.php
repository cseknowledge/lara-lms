@extends('layouts.master-layout')

@section('main-content')
    <div class="card">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ isset($user) ? $user->user_name : '' }} Details</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div class="col-md-8 offset-4">
                    <div class="row">
                        <div class="col-md-4">User Id</div>
                        <div class="col-md-4">{{ isset($user) ? $user->member_id : '' }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">User Name</div>
                        <div class="col-md-4">{{ isset($user) ? $user->name : '' }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">Email</div>
                        <div class="col-md-4">{{ isset($user) ? $user->email : '' }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">Member Type</div>
                        <div class="col-md-4">{{ isset($user) ? $user->member_type : '' }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">Address</div>
                        <div class="col-md-4">{{ isset($user) ? $user->address : '' }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">Expiry Date</div>
                        <div class="col-md-4">{{ isset($user) ? $user->expiry_date : '' }}</div>
                    </div>
                </div> 
                <div class="clearfix"></div>                
            </div>
        </div>
        <div class="card-footer py-1">
            <div class="col-md-8 offset-4 custom-margin">               
                <div class="row">
                    <div class="col-md-4"><a class="btn btn-sm btn-primary" href="{{ url('user/show/'.($previousUserId == '' ? $user->id : $previousUserId)) }}">Previous</a></div>
                    <div class="col-md-4"><a class="btn btn-sm btn-primary" href="{{ url('user/show/'.($nextUserId == '' ? $book->id : $nextUserId)) }}">Next</a></div>
                </div>
            </div>
        </div>
    </div>
@endsection
