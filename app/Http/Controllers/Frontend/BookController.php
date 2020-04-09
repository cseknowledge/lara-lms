<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\BookRepository;
use App\Http\Requests\BookPostRequest;
use Illuminate\Support\Facades\DB;

use App\Book;

class BookController extends Controller
{
    protected $bookRepository;
   
    public function __construct(Book $book)
    {
        $this->middleware('auth');
        $this->bookRepository = new BookRepository($book);
    }
    
    public function index()
    {
        $books = $this->bookRepository->all();
        return view('frontend.book.index', compact('books'));
    }
    
    public function create()
    {
        $authors = $this->bookRepository->getAuthors();
        $publishers = $this->bookRepository->getPublishers();
        return view('frontend.book.create', compact('authors', 'publishers'));
    }
    
    public function store(BookPostRequest $request)
    {      
        $this->bookRepository->create($request->only($this->bookRepository->getModel()->fillable));        
        return redirect('/book/')->with('flash_message', 'New book created successfully');
    }
    
    public function show($id)
    {
        $book = $this->bookRepository->show($id);
        $previousBookId = $this->bookRepository->getPreviousBookId($id);
        $nextBookId = $this->bookRepository->getNextBookId($id);
        return view('frontend.book.show', compact('book', 'previousBookId', 'nextBookId'));
    }

    public function edit($id)
    {
        $book = $this->bookRepository->show($id);
        $previousBookId = $this->bookRepository->getPreviousBookId($id);
        $nextBookId = $this->bookRepository->getNextBookId($id);
        $authors = $this->bookRepository->getAuthors();
        $publishers = $this->bookRepository->getPublishers();
        return view('frontend.book.edit', compact('book', 'previousBookId', 'nextBookId', 'authors', 'publishers'));
    }
    
    public function update(BookPostRequest $request, $id)
    {
        $this->bookRepository->update($request->only($this->bookRepository->getModel()->fillable), $id);
        return redirect('/book/')->with('flash_message', 'Book updated successfully');
    }
    
    public function destroy($id)
    {
        $this->bookRepository->delete($id);
        return redirect('/book/')->with('flash_message', 'Book information deleted successfully');
    }
}
