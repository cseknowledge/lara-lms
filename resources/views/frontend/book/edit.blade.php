@extends('layouts.master-layout')

@section('main-content')
    <div class="card">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Book</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form class="well form-horizontal" action="{{ url('/book/update/'.$book->id) }}" method="post"  id="contact_form">
                    <fieldset>
                        @CSRF
                        <!-- Success message -->
                        @if(Session::has('flash_message'))
                        <div class="alert alert-success" role="alert" id="success_message">{{ Session::get('flash_message') }}.</div>
                        @endif          
                        
                        <div class="form-group">
                            <label class="col-md-6 offset-3 control-label">Book Name</label>  
                            <div class="col-md-6 offset-3">
                                <input  name="book_name" placeholder="Book Name" class="form-control" value="{{ isset($book) ? $book->book_name : old('book_name') }}" type="text">
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
                                        <option value="{{ $author->id }}" {{ $author->id == $book->author_id ? 'Selected' : '' }}>{{ $author->author_name }}</option>
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
                                        <option value="{{ $publisher->id }}" {{ $publisher->id == $book->publisher_id ? 'Selected' : '' }}>{{ $publisher->publisher_name }}</option>
                                    @endforeach
                                    @endisset
                                </select>
                            </div>
                            @error('$publisher->id')
                                <p class="alert alert-danger">{{ $message }}</p>
                            @enderror
                        </div> 

                        <div class="form-group">
                            <label class="col-md-6 offset-3 control-label">Book Price</label>  
                            <div class="col-md-6 offset-3">
                                <input  name="price" placeholder="Book Price" class="form-control" value="{{ isset($book) ? $book->price : old('price') }}" type="text">
                            </div>
                            @error('price')
                                <p class="alert alert-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 offset-3">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="is_available" id="book_availability_avaiilable" value="1" {{ $book->is_available == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="book_availability_avaiilable">
                                    Available
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="is_available" id="book_availability_not_abailable" value="0" {{ $book->is_available == 0 ? 'checked' : '' }}>
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
                                <textarea  name="short_description" placeholder="Short Description" class="form-control" value="" type="text">{{ isset($book) ? $book->short_description : old('short_description') }}</textarea>
                            </div>
                            @error('short_description')
                                <p class="alert alert-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </fieldset>
                    <div class="clearfix"></div> 
                    <div class="col-md-7 offset-5 custom-margin">  
                        <div class="col-md-4">
                        <button type="submit" class="btn btn-warning" >Update Book <span class="glyphicon glyphicon-send"></span></button>
                        </div>
                    </div>
                  </form>                               
            </div>
        </div>
        <div class="card-footer py-1">
            <div class="col-md-8 offset-4 custom-margin">               
                <div class="row">
                    <div class="col-md-4"><a class="btn btn-sm btn-primary" href="{{ url('book/edit/'.($previousBookId == '' ? $book->id : $previousBookId)) }}">Previous</a></div>
                    <div class="col-md-4"><a class="btn btn-sm btn-primary" href="{{ url('book/edit/'.($nextBookId == '' ? $book->id : $nextBookId)) }}">Next</a></div>
                </div>
            </div>
        </div>
    </div>
@endsection
