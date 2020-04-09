@extends('layouts.master-layout')

@section('main-content')
    <div class="card">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Book Return</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form class="well form-horizontal" action="{{ route('bookReturn.store') }}" method="post"  id="contact_form">
                    <fieldset>
                        @CSRF
                        <!-- Success message -->
                        @if(Session::has('flash_message'))
                        <div class="alert alert-success" role="alert" id="success_message">{{ Session::get('flash_message') }}.</div>
                        @endif       
                                                   
                        <div class="form-group">
                            <label class="col-md-6 offset-3 control-label">Book's Name</label>  
                            <div class="col-md-6 offset-3">
                                <select class="form-control" id="book_list" name="book_id">
                                    <option value="">Select an book</option>
                                    @isset($books)
                                    @foreach($books as $book)
                                        <option value="{{ $book->id }}" {{ $book->id == old('book_id') ? 'Selected' : '' }}>{{ $book->book_name." ".$book->user_id }}</option>
                                    @endforeach
                                    @endisset
                                </select>
                            </div>
                            @error('book_id')
                                <p class="alert alert-danger">{{ $message }}</p>
                            @enderror
                        </div>      
                                                   
                        <div class="form-group">
                            <label class="col-md-6 offset-3 control-label">Member's Name</label>  
                            <div class="col-md-6 offset-3">
                                <select class="form-control" id="user_list" name="user_id">
                                    <option value="">Select a member</option>
                                    @isset($users)
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}" {{ $user->id == old('user_id') ? 'Selected' : '' }}>{{ $user->name }}</option>
                                    @endforeach
                                    @endisset
                                </select>
                            </div>
                            @error('user_id')
                                <p class="alert alert-danger">{{ $message }}</p>
                            @enderror
                        </div>  
                                                   
                        <div class="form-group">
                            <label class="col-md-6 offset-3 control-label">Return Issue</label>  
                            <div class="col-md-6 offset-3">
                                <select class="form-control" id="user_list" name="return_problem">
                                    <option value="">Select a issue if exists</option>
                                    <option value="Damage" {{ "Damage" == old('return_problem') ? 'Selected' : '' }}>Damage</option>
                                    <option value="Lost" {{ "Lost" == old('return_problem') ? 'Selected' : '' }}>Lost</option>
                                    <option value="Date Expired" {{ "Date Expired" == old('return_problem') ? 'Selected' : '' }}>Date Expired</option>
                                </select>
                            </div>
                            @error('return_problem')
                                <p class="alert alert-danger">{{ $message }}</p>
                            @enderror
                        </div> 
                        
                        <div class="form-group">
                            <label class="col-md-6 offset-3 control-label">Short Description</label>  
                            <div class="col-md-6 offset-3">
                                <textarea  name="short_description" placeholder="Short Description" class="form-control" value="{{ old('short_description') }}" type="text"></textarea>
                            </div>
                            @error('short_description')
                                <p class="alert alert-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </fieldset>
                    <div class="clearfix"></div> 
                    <div class="col-md-7 offset-5 custom-margin">  
                        <div class="col-md-4">
                        <input name="return_date" type="hidden" id="return_date" value="{{ Carbon\Carbon::now()->format('Y-m-d') }}" />
                        <button type="submit" class="btn btn-warning" >Return a book <span class="glyphicon glyphicon-send"></span></button>
                        </div>
                    </div>
                  </form>                               
            </div>
        </div>
        <div class="card-footer py-3">
            
        </div>
    </div>
@endsection
