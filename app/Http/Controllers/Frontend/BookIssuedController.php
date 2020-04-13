<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\BookIssuedRepository;
use App\Http\Requests\BookIssuedPostRequest;

use App\Models\BookIssued;

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
        $books = $this->bookIssuedRepository->getBooks();
        $users = $this->bookIssuedRepository->getUsers();
        return view('frontend.book_issue.create', compact('books', 'users'));
    }
    
    public function store(BookIssuedPostRequest $request)
    {   
        $this->bookIssuedRepository->create($request->only($this->bookIssuedRepository->getModel()->fillable));       
        $this->bookIssuedRepository->updateBookAvailability($request->input('book_id'), '0');
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
        $books = $this->bookIssuedRepository->getBooks($bookIssued->book_id);
        $users = $this->bookIssuedRepository->getUsers('edit');
        return view('frontend.book_issue.edit', compact('bookIssued', 'previousBookIssuedId', 'nextBookIssuedId', 'books', 'users'));
    }
    
    public function update(BookIssuedPostRequest $request, $id)
    {   
        $bookIssued = $this->bookIssuedRepository->show($id);
        $this->bookIssuedRepository->update($request->only($this->bookIssuedRepository->getModel()->fillable), $id);
        if($bookIssued->book_id != $request->input('book_id')) {
            $this->bookIssuedRepository->updateBookAvailability($bookIssued->book_id, '1');
            $this->bookIssuedRepository->updateBookAvailability($request->input('book_id'), '0');
        }
        return redirect('/bookIssued/')->with('flash_message', 'BookIssued updated successfully');
    }
    
    public function destroy($id)
    {
        $this->bookIssuedRepository->delete($id);
        return redirect('/bookIssued/')->with('flash_message', 'BookIssued information deleted successfully');
    }
}
