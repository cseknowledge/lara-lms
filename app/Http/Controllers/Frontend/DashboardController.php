<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\BookReview;
use App\Models\BookIssued;
use App\Models\Wishlist;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $bookReviews = BookReview::all();
        $bookIssueds = BookIssued::where('is_request_from_student', '=', true)->where('issued_by', '=', null)->where('is_approved', '=', false)->get();
        $wishlists = Wishlist::all();
        return view('frontend.index', compact('bookReviews', 'bookIssueds', 'wishlists'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
