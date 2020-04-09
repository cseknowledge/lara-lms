@extends('layouts.master-layout')

@section('main-content')
    <div class="card">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add New Book</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form class="well form-horizontal" action="{{ route('book.store') }}" method="post"  id="contact_form">
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
                            <label class="col-md-6 offset-3 control-label">Author's Name</label>  
                            <div class="col-md-6 offset-3">
                                <select class="form-control" id="author_list" name="author_id">
                                    <option value="">Select an author</option>
                                    @isset($authors)
                                    @foreach($authors as $author)
                                        <option value="{{ $author->id }}">{{ $author->author_name }}</option>
                                    @endforeach
                                    @endisset
                                </select>
                            </div>
                            @error('author_id')
                                <p class="alert alert-danger">{{ $message }}</p>
                            @enderror
                        </div>        
                        
                        <div class="form-group">
                            <label class="col-md-6 offset-3 control-label">Publisher's Name</label>  
                            <div class="col-md-6 offset-3">
                                <select class="form-control" id="publisher_list" name="publisher_id">
                                    <option value="">Select an publisher</option>
                                    @isset($publishers)
                                    @foreach($publishers as $publisher)
                                        <option value="{{ $publisher->id }}">{{ $publisher->publisher_name }}</option>
                                    @endforeach
                                    @endisset
                                </select>
                            </div>
                            @error('publisher_id')
                                <p class="alert alert-danger">{{ $message }}</p>
                            @enderror
                        </div> 

                        <div class="form-group">
                            <label class="col-md-6 offset-3 control-label">Book Quantity</label>  
                            <div class="col-md-6 offset-3">
                                <input  name="quantity" placeholder="Book Quantity" class="form-control" value="{{ old('quantity') }}" type="text">
                            </div>
                            @error('quantity')
                                <p class="alert alert-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="col-md-6 offset-3 control-label">Book Price</label>  
                            <div class="col-md-6 offset-3">
                                <input  name="price" placeholder="Book Price" class="form-control" value="{{ old('price') }}" type="text">
                            </div>
                            @error('price')
                                <p class="alert alert-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 offset-3">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="is_available" id="book_availability_avaiilable" value="1" checked>
                                    <label class="form-check-label" for="book_availability_avaiilable">
                                    Available
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="is_available" id="book_availability_not_abailable" value="0">
                                    <label class="form-check-label" for="book_availability_not_abailable">
                                    Not Available
                                    </label>
                                </div>
                            </div>
                            @error('price')
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
                        <button type="submit" class="btn btn-warning" >Add New Book <span class="glyphicon glyphicon-send"></span></button>
                        </div>
                    </div>
                  </form>                               
            </div>
        </div>
        <div class="card-footer py-3">
            
        </div>
    </div>
@endsection
