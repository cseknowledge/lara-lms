<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookReturnController extends Controller
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
     * @param  \App\BookReturn  $bookReturn
     * @return \Illuminate\Http\Response
     */
    public function show(BookReturn $bookReturn)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BookReturn  $bookReturn
     * @return \Illuminate\Http\Response
     */
    public function edit(BookReturn $bookReturn)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BookReturn  $bookReturn
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BookReturn $bookReturn)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BookReturn  $bookReturn
     * @return \Illuminate\Http\Response
     */
    public function destroy(BookReturn $bookReturn)
    {
        //
    }
}
