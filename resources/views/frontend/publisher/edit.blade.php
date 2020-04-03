@extends('layouts.master-layout')

@section('main-content')
    <div class="card">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Publisher</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form class="well form-horizontal" action="{{ url('/publisher/update/'.$publisher->id) }}" method="post"  id="contact_form">
                    <fieldset>
                        @CSRF
                        <!-- Success message -->
                        @if(Session::has('flash_message'))
                        <div class="alert alert-success" role="alert" id="success_message">{{ Session::get('flash_message') }}.</div>
                        @endif          
                        
                        <div class="form-group">
                            <label class="col-md-6 offset-3 control-label">Publisher Name</label>  
                            <div class="col-md-6 offset-3">
                                <input  name="publisher_name" placeholder="Publisher Name" class="form-control" value="{{ isset($publisher) ? $publisher->publisher_name : old('publisher_name') }}" type="text">
                            </div>
                            @error('publisher_name')
                                <p class="alert alert-danger">{{ $message }}</p>
                            @enderror
                        </div>        
                        
                        <div class="form-group">
                            <label class="col-md-6 offset-3 control-label">Owner Name</label>  
                            <div class="col-md-6 offset-3">
                                <input  name="publisher_owner_name" placeholder="Owner Name" class="form-control" value="{{ isset($publisher) ? $publisher->publisher_owner_name : old('publisher_owner_name') }}" type="text">
                            </div>
                            @error('publisher_owner_name')
                                <p class="alert alert-danger">{{ $message }}</p>
                            @enderror
                        </div>        
                        
                        <div class="form-group">
                            <label class="col-md-6 offset-3 control-label">Publisher Address</label>  
                            <div class="col-md-6 offset-3">
                                <textarea  name="address" placeholder="Publisher Address" class="form-control" value="" type="text">{{ isset($publisher) ? $publisher->address : old('address') }}</textarea>
                            </div>
                            @error('address')
                                <p class="alert alert-danger">{{ $message }}</p>
                            @enderror
                        </div>        
                        
                        <div class="form-group">
                            <label class="col-md-6 offset-3 control-label">Short Description</label>  
                            <div class="col-md-6 offset-3">
                                <textarea  name="short_description" placeholder="Short Description" class="form-control" value="" type="text">{{ isset($publisher) ? $publisher->short_description : old('short_description') }}</textarea>
                            </div>
                            @error('short_description')
                                <p class="alert alert-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </fieldset>
                    <div class="clearfix"></div> 
                    <div class="col-md-7 offset-5 custom-margin">  
                        <div class="col-md-4">
                        <button type="submit" class="btn btn-warning" >Update Publisher <span class="glyphicon glyphicon-send"></span></button>
                        </div>
                    </div>
                  </form>                               
            </div>
        </div>
        <div class="card-footer py-1">
            <div class="col-md-8 offset-4 custom-margin">               
                <div class="row">
                    <div class="col-md-4"><a class="btn btn-sm btn-primary" href="{{ url('publisher/edit/'.($previousPublisherId == '' ? $publisher->id : $previousPublisherId)) }}">Previous</a></div>
                    <div class="col-md-4"><a class="btn btn-sm btn-primary" href="{{ url('publisher/edit/'.($nextPublisherId == '' ? $publisher->id : $nextPublisherId)) }}">Next</a></div>
                </div>
            </div>
        </div>
    </div>
@endsection
