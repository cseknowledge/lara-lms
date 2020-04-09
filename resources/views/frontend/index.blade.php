@extends('layouts.master-layout')

@section('main-content')  
@if(Auth::user()->member_type == "Staff" || Auth::user()->member_type == "Admin") 
    <div class="col-md-12">
        <nav>
            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-issued-book" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Booke Issued</a>
                <a class="nav-item nav-link" id="nav-return-book" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Book Return</a>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-issued-book">
                <br/><h2>This section not developed yet (Admin End).</h2>
            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                <br/><h2>This section not developed yet  (Admin End).</h2>
            </div>
        </div>
    </div>
@else 
    <div class="col-md-12">
        <nav>
            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-issued-book" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Booke Issued</a>
                <a class="nav-item nav-link" id="nav-return-book" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Book Return</a>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-issued-book">
                <br/><h2>This section not developed yet (Member End).</h2>
            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                <br/><h2>This section not developed yet  (Member End).</h2>
            </div>
        </div>
    </div>
@endif
@endsection

