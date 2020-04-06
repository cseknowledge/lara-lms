<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\BookIssuedRepository;
use App\Http\Requests\BookIssuedPostRequest;

use App\BookIssued;

class BookIssuedController extends Controller
{
    protected $bookIssuedRepository;
   
    public function __construct(BookIssued $bookIssued)
    {
        $this->middleware('auth');
        $this->bookIssuedRepository = new BookIssuedRepository($bookIssued);
    }
    
    public function index()
    {
        $bookIssueds = $this->bookIssuedRepository->all();
        return view('frontend.book_issue.index', compact('bookIssueds'));
    }
    
    public function create()
    {
        return view('frontend.book_issue.create');
    }
    
    public function store(BookIssuedPostRequest $request)
    {        
        $this->bookIssuedRepository->create($request->only($this->bookIssuedRepository->getModel()->fillable));        
        return redirect('/bookIssued/')->with('flash_message', 'New bookIssued created successfully');
    }
    
    public function show($id)
    {
        $bookIssued = $this->bookIssuedRepository->show($id);
        $previousBookIssuedId = $this->bookIssuedRepository->getPreviousBookIssuedId($id);
        $nextBookIssuedId = $this->bookIssuedRepository->getNextBookIssuedId($id);
        return view('frontend.book_issue.show', compact('bookIssued', 'previousBookIssuedId', 'nextBookIssuedId'));
    }

    public function edit($id)
    {
        $bookIssued = $this->bookIssuedRepository->show($id);
        $previousBookIssuedId = $this->bookIssuedRepository->getPreviousBookIssuedId($id);
        $nextBookIssuedId = $this->bookIssuedRepository->getNextBookIssuedId($id);
        return view('frontend.book_issue.edit', compact('bookIssued', 'previousBookIssuedId', 'nextBookIssuedId'));
    }
    
    public function update(BookIssuedPostRequest $request, $id)
    {
        $this->bookIssuedRepository->update($request->only($this->bookIssuedRepository->getModel()->fillable), $id);
        return redirect('/bookIssued/')->with('flash_message', 'BookIssued updated successfully');
    }
    
    public function destroy($id)
    {
        $this->bookIssuedRepository->delete($id);
        return redirect('/bookIssued/')->with('flash_message', 'BookIssued information deleted successfully');
    }
}
