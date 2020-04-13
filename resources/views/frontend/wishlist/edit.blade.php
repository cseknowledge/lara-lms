@extends('layouts.master-layout')

@section('main-content')
    <div class="card">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Update Suggest Book</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form class="well form-horizontal" action="{{ url('/wishlist/update/'.$wishlist->id) }}" method="post"  id="contact_form">
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
                                        <option value="{{ $book->id }}" {{ $book->id == $wishlist->book_id ? 'Selected' : '' }}>{{ $book->book_name }}</option>
                                    @endforeach
                                    @endisset
                                </select>
                            </div>
                            @error('book_id')
                                <p class="alert alert-danger">{{ $message }}</p>
                            @enderror
                        </div> 
                        
                        <div class="form-group">
                            <label class="col-md-6 offset-3 control-label">Short Description</label>  
                            <div class="col-md-6 offset-3">
                                <textarea  name="short_description" placeholder="Short Description" class="form-control" value="{{ old('short_description') }}" type="text">{{ isset($wishlist) ? $wishlist->short_description : old('short_description') }}</textarea>
                            </div>
                            @error('short_description')
                                <p class="alert alert-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </fieldset>
                    <div class="clearfix"></div> 
                    <div class="col-md-7 offset-5 custom-margin">  
                        <div class="col-md-4">
                        <button type="submit" class="btn btn-warning" >Update Suggest Book <span class="glyphicon glyphicon-send"></span></button>
                        </div>
                    </div>
                  </form>                               
            </div>
        </div>
        <div class="card-footer py-3">
            <div class="col-md-8 offset-4 custom-margin">               
                <div class="row">
                    <div class="col-md-4"><a class="btn btn-sm btn-primary" href="{{ url('wishlist/edit/'.($previousWishlistId == '' ? $wishlist->id : $previousWishlistId)) }}">Previous</a></div>
                    <div class="col-md-4"><a class="btn btn-sm btn-primary" href="{{ url('wishlist/edit/'.($nextWishlistId == '' ? $wishlist->id : $nextWishlistId)) }}">Next</a></div>
                </div>
            </div>
        </div>
    </div>
@endsection
