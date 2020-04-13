@extends('layouts.master-layout')

@section('main-content')
    <div class="card">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Book Issue</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form class="well form-horizontal" action="{{ route('bookIssued.store') }}" method="post"  id="contact_form">
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
                                        <option value="{{ $book->id }}" {{ $book->id == old('book_id') ? 'Selected' : '' }}>{{ $book->book_name }}</option>
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
                            <label class="col-md-6 offset-3 control-label">Issue Date</label>  
                            <div class="col-md-6 offset-3">
                                <div class="input-group date form_date" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input1" data-link-format="yyyy-mm-dd">
                                    <input class="form-control" size="16" type="text" value="{{ Carbon\Carbon::parse(old('issue_date'))->format('Y-m-d') }}">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                </div>
                                <input name="issue_date" type="hidden" id="dtp_input1" value="{{ Carbon\Carbon::parse(old('issue_date'))->format('Y-m-d') }}" />
                            </div>
                            @error('issue_date')
                                <p class="alert alert-danger">{{ $message }}</p>
                            @enderror
                        </div>    

                        <div class="form-group">
                            <label class="col-md-6 offset-3 control-label">Return Date</label>  
                            <div class="col-md-6 offset-3">
                                <div class="input-group date form_date" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                                    <input class="form-control" size="16" type="text" value="{{ Carbon\Carbon::parse(old('return_date'))->format('Y-m-d') }}">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                </div>
                                <input name="return_date" type="hidden" id="dtp_input2" value="{{ Carbon\Carbon::parse(old('return_date'))->format('Y-m-d') }}" />
                            </div>
                            @error('return_date')
                                <p class="alert alert-danger">{{ $message }}</p>
                            @enderror
                        </div> 
                    </fieldset>
                    <div class="clearfix"></div> 
                    <div class="col-md-7 offset-5 custom-margin">  
                        <div class="col-md-4">
                            <input type="hidden" name="issued_by" value="{{ Auth::user()->id }}" />
                            <input type="hidden" name="is_apparoved" value="1" />
                        <button type="submit" class="btn btn-warning" >Issue a book <span class="glyphicon glyphicon-send"></span></button>
                        </div>
                    </div>
                  </form>                               
            </div>
        </div>
        <div class="card-footer py-3">
            
        </div>
    </div>
@endsection
