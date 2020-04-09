@extends('layouts.master-layout')

@section('main-content')
    <div class="card">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Book Review</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form class="well form-horizontal" action="{{ route('bookReview.store') }}" method="post"  id="contact_form">
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
                            <label class="col-md-6 offset-3 control-label">Book Review</label>  
                            <div class="col-md-6 offset-3">
                                <textarea  name="book_review" placeholder="Book Review" class="form-control" value="{{ old('book_review') }}" type="text"></textarea>
                            </div>
                            @error('book_review')
                                <p class="alert alert-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </fieldset>
                    <div class="clearfix"></div> 
                    <div class="col-md-7 offset-5 custom-margin">  
                        <div class="col-md-4">
                        <input name="user_id" type="hidden" id="user_id" value="{{ Auth::user()->id }}" />
                        <button type="submit" class="btn btn-warning" >Review a book <span class="glyphicon glyphicon-send"></span></button>
                        </div>
                    </div>
                  </form>                               
            </div>
        </div>
        <div class="card-footer py-3">
            
        </div>
    </div>
@endsection
