<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookIssuedController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BookIssued  $bookIssued
     * @return \Illuminate\Http\Response
     */
    public function show(BookIssued $bookIssued)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BookIssued  $bookIssued
     * @return \Illuminate\Http\Response
     */
    public function edit(BookIssued $bookIssued)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BookIssued  $bookIssued
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BookIssued $bookIssued)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BookIssued  $bookIssued
     * @return \Illuminate\Http\Response
     */
    public function destroy(BookIssued $bookIssued)
    {
        //
    }
}
