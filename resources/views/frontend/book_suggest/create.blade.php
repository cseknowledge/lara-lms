@extends('layouts.master-layout')

@section('main-content')
    <div class="card">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Book Suggest</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form class="well form-horizontal" action="{{ route('bookSuggest.store') }}" method="post"  id="contact_form">
                    <fieldset>
                        @CSRF
                        <!-- Success message -->
                        @if(Session::has('flash_message'))
                        <div class="alert alert-success" role="alert" id="success_message">{{ Session::get('flash_message') }}.</div>
                        @endif   
                        
                        <div class="form-group">
                            <label class="col-md-6 offset-3 control-label">Book Name</label>  
                            <div class="col-md-6 offset-3">
                                <input  name="book_name" placeholder="Book Name" class="form-control" value="{{ old('book_name') }}" type="text">
                            </div>
                            @error('book_name')
                                <p class="alert alert-danger">{{ $message }}</p>
                            @enderror
                        </div> 
                        
                        <div class="form-group">
                            <label class="col-md-6 offset-3 control-label">Author Name</label>  
                            <div class="col-md-6 offset-3">
                                <input  name="author_name" placeholder="Author Name" class="form-control" value="{{ old('author_name') }}" type="text">
                            </div>
                            @error('author_name')
                                <p class="alert alert-danger">{{ $message }}</p>
                            @enderror
                        </div> 
                        
                        <div class="form-group">
                            <label class="col-md-6 offset-3 control-label">Publisher Name</label>  
                            <div class="col-md-6 offset-3">
                                <input  name="publisher_name" placeholder="Publisher Name" class="form-control" value="{{ old('publisher_name') }}" type="text">
                            </div>
                            @error('publisher_name')
                                <p class="alert alert-danger">{{ $message }}</p>
                            @enderror
                        </div>   
                        
                        <div class="form-group">
                            <label class="col-md-6 offset-3 control-label">Short Description</label>  
                            <div class="col-md-6 offset-3">
                                <textarea  name="short_description" placeholder="Short Description" class="form-control" value="{{ old('short_description') }}" type="text">{{ old('short_description') }}</textarea>
                            </div>
                            @error('short_description')
                                <p class="alert alert-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </fieldset>
                    <div class="clearfix"></div> 
                    <div class="col-md-7 offset-5 custom-margin">  
                        <div class="col-md-4">
                        <input name="user_id" type="hidden" id="user_id" value="{{ Auth::user()->id }}" />
                        <button type="submit" class="btn btn-warning" >Suggest a book <span class="glyphicon glyphicon-send"></span></button>
                        </div>
                    </div>
                  </form>                               
            </div>
        </div>
        <div class="card-footer py-3">
            
        </div>
    </div>
@endsection
