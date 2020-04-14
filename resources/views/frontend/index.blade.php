@extends('layouts.master-layout')

@section('main-content')  
    <div class="col-md-12">
        <nav>
            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-issued-book" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Book Review</a>
                @if(Auth::user()->member_type != "Student")
                    <a class="nav-item nav-link" id="nav-return-book" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Book Request</a>
                @endif
                @if(Auth::user()->member_type == "Student")
                    <a class="nav-item nav-link" id="nav-messages" data-toggle="tab" href="#nav-message" role="tab" aria-controls="nav-message" aria-selected="false">Message</a>
                @endif
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-issued-book">
                <br/>
                <div class="table-responsive">
                    <table class="table table-bordered dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Book Review</th>
                            </tr>
                        </thead>
                        <tbody>
                        @isset($bookReviews)
                        @foreach($bookReviews as $bookReview)
                            <tr>
                                <td>
                                    <h4>{{ $bookReview->book->book_name }}</h4> <h5>{{ $bookReview->user->name }}</h5><br/>
                                    {{ $bookReview->book_review }}
                                </td>
                            </tr>
                        @endforeach
                        @endisset
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                <br/>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Book Name</th>
                        <th>Member Name</th>
                        <th>Issue Date</th>
                        <th>Return Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Book Name</th>
                        <th>Member Name</th>
                        <th>Issue Date</th>
                        <th>Return Date</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @isset($bookIssueds)
                    @foreach($bookIssueds as $bookIssued)
                        <tr>
                            <td>{{ $bookIssued->book->book_name }}</td>
                            <td>{{ $bookIssued->user->name }}</td>
                            <td>{{ Carbon\Carbon::parse($bookIssued->issue_date)->format('d-m-Y') }}</td>
                            <td>{{ Carbon\Carbon::parse($bookIssued->return_date)->format('d-m-Y') }}</td>
                            <td> 
                                <a class="btn btn-sm btn-warning" href="{{ url('/bookIssued/updateStudentRequest/1/'.$bookIssued->id) }}">Approve</a> | 
                                <a class="btn btn-sm btn-danger" href="{{ url('/bookIssued/updateStudentRequest/0/'.$bookIssued->id) }}">Reject</a>
                            </td>
                        </tr>
                    @endforeach
                    @endisset
                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade" id="nav-message" role="tabpanel" aria-labelledby="nav-message-tab">
                <br/>
                <div class="table-responsive">
                    <table class="table table-bordered dataTable" width="100%" cellspacing="0">
                        <thead>
                            <th>Book Name</th>
                            <th>Message</th>
                            <th>Department</th>
                            <th>From</th>
                            <th>Date</th>
                        </thead>
                        <tfoot>
                            <th>Book Name</th>
                            <th>Message</th>
                            <th>Department</th>
                            <th>From</th>
                            <th>Date</th>
                        </tfoot>
                        <tbody>
                        @isset($wishlists)
                            @foreach($wishlists as $wishlist)
                                @isset($wishlist->message->message)
                                    <tr>
                                        <td>{{ $wishlist->book->book_name }}</td>
                                        <td>@isset($wishlist->message->message) {{ $wishlist->message->message }} @endisset</td>
                                        <td>@isset($wishlist->message->department) {{ $wishlist->message->department }} @endisset</td>
                                        <td>{{ $wishlist->user->name }}</td>
                                        <td>@isset($wishlist->message->created_at) {{ $wishlist->message->created_at }} @endisset</td>
                                    </tr>
                                @endisset
                            @endforeach
                        @endisset
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

