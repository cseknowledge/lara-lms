@extends('layouts.master-layout')

@section('main-content')
    <div class="card">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit User</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form class="well form-horizontal" action="{{ url('/user/update/'.$user->id) }}" method="post"  id="contact_form">
                    <fieldset>
                        @CSRF
                        <!-- Success message -->
                        @if(Session::has('flash_message'))
                        <div class="alert alert-success" role="alert" id="success_message">{{ Session::get('flash_message') }}.</div>
                        @endif       
                        
                        <div class="form-group">
                            <label class="col-md-6 offset-3 control-label">Full Name</label>  
                            <div class="col-md-6 offset-3">
                                <input  name="name" placeholder="Full Name" class="form-control" value="{{ isset($user) ? $user->name : old('name') }}" type="text">
                            </div>
                            @error('name')
                                <p class="alert alert-danger">{{ $message }}</p>
                            @enderror
                        </div>         
                        
                        <div class="form-group">
                            <label class="col-md-6 offset-3 control-label">Email</label>  
                            <div class="col-md-6 offset-3">
                                <input  name="email" placeholder="Email" class="form-control" value="{{ isset($user) ? $user->email : old('email') }}" type="email">
                            </div>
                            @error('email')
                                <p class="alert alert-danger">{{ $message }}</p>
                            @enderror
                        </div>     
                        
                        <div class="form-group">
                            <label class="col-md-6 offset-3 control-label">Address</label>  
                            <div class="col-md-6 offset-3">
                                <input  name="address" placeholder="Address" class="form-control" value="{{ isset($user) ? $user->address : old('address') }}" type="text">
                            </div>
                            @error('address')
                                <p class="alert alert-danger">{{ $message }}</p>
                            @enderror
                        </div>    
                        
                        <div class="form-group">
                            <label class="col-md-6 offset-3 control-label">Member Type</label>  
                            <div class="col-md-6 offset-3">
                                <select class="form-control" id="member_type_list" name="member_type">
                                    <option value="">Select an member type</option>
                                    <option value="Staff" {{ "Staff" == $user->member_type ? 'Selected' : '' }}>Staff</option>
                                    <option value="Member" {{ "Member" == $user->member_type ? 'Selected' : '' }}>Member</option>
                                </select>
                            </div>
                            @error('member_type')
                                <p class="alert alert-danger">{{ $message }}</p>
                            @enderror
                        </div>    

                        <div class="form-group">
                            <label class="col-md-6 offset-3 control-label">Expiry Date</label>  
                            <div class="col-md-6 offset-3">
                                <div class="input-group date form_date" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                                    <input class="form-control" size="16" type="text" value="{{ isset($user) ? Carbon\Carbon::parse($user->expiry_date)->format('Y-m-d') : Carbon\Carbon::parse(old('expiry_date'))->format('Y-m-d') }}">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                </div>
                                <input name="expiry_date" type="hidden" id="dtp_input2" value="{{ isset($user) ? Carbon\Carbon::parse($user->expiry_date)->format('Y-m-d') : Carbon\Carbon::parse(old('expiry_date'))->format('Y-m-d') }}" />
                            </div>
                            @error('expiry_date')
                                <p class="alert alert-danger">{{ $message }}</p>
                            @enderror
                        </div>     
                        
                        <div class="form-group">
                            <label class="col-md-6 offset-3 control-label">Password</label>  
                            <div class="col-md-6 offset-3">
                                <input  name="password" placeholder="Password" class="form-control" value="" type="password">
                            </div>
                            @error('password')
                                <p class="alert alert-danger">{{ $message }}</p>
                            @enderror
                        </div> 
                    </fieldset>
                    <div class="clearfix"></div> 
                    <div class="col-md-7 offset-5 custom-margin">  
                        <div class="col-md-4">
                        <button type="submit" class="btn btn-warning" >Update User <span class="glyphicon glyphicon-send"></span></button>
                        </div>
                    </div>
                  </form>                               
            </div>
        </div>
        <div class="card-footer py-1">
            <div class="col-md-8 offset-4 custom-margin">               
                <div class="row">
                    <div class="col-md-4"><a class="btn btn-sm btn-primary" href="{{ url('user/edit/'.($previousUserId == '' ? $user->id : $previousUserId)) }}">Previous</a></div>
                    <div class="col-md-4"><a class="btn btn-sm btn-primary" href="{{ url('user/edit/'.($nextUserId == '' ? $user->id : $nextUserId)) }}">Next</a></div>
                </div>
            </div>
        </div>
    </div>
@endsection
