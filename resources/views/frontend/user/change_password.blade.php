@extends('layouts.master-layout')

@section('main-content')
    <div class="card">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Change Password</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form class="well form-horizontal" action="{{ url('/user/updatePassword/'.$location) }}" method="post"  id="contact_form">
                    <fieldset>
                        @CSRF
                        <!-- Success message -->
                        @if(Session::has('flash_message'))
                        <div class="alert alert-success" role="alert" id="success_message">{{ Session::get('flash_message') }}.</div>
                        @endif      
                        
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
                        <input name="return_date" type="hidden" id="return_date" value="{{ Carbon\Carbon::now()->format('Y-m-d') }}" />
                        <button type="submit" class="btn btn-warning" >Update Password <span class="glyphicon glyphicon-send"></span></button>
                        </div>
                    </div>
                  </form>                               
            </div>
        </div>
        <div class="card-footer py-3">
            
        </div>
    </div>
@endsection
