<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\BookReviewRepository;
use App\Http\Requests\BookReviewPostRequest;

use App\Models\BookReview;

class BookReviewController extends Controller
{
    protected $bookReviewRepository;
   
    public function __construct(BookReview $bookReview)
    {
        $this->middleware('auth');
        $this->bookReviewRepository = new BookReviewRepository($bookReview);
    }
    
    public function index()
    {
        $bookReviews = $this->bookReviewRepository->all();
        return view('frontend.book_review.index', compact('bookReviews'));
    }
    
    public function create()
    {
        $books = $this->bookReviewRepository->getBooks();
        $users = $this->bookReviewRepository->getUsers();
        return view('frontend.book_review.create', compact('books', 'users'));
    }
    
    public function store(BookReviewPostRequest $request)
    {        
        $this->bookReviewRepository->create($request->only($this->bookReviewRepository->getModel()->fillable));  
        return redirect('/bookReview/')->with('flash_message', 'Book review added successfully');
    }
    
    public function show($id)
    {
        $bookReview = $this->bookReviewRepository->show($id);
        $previousBookReviewId = $this->bookReviewRepository->getPreviousBookReviewId($id);
        $nextBookReviewId = $this->bookReviewRepository->getNextBookReviewId($id);
        return view('frontend.book_review.show', compact('bookReview', 'previousBookReviewId', 'nextBookReviewId'));
    }

    public function edit($id)
    {
        $bookReview = $this->bookReviewRepository->show($id);
        $previousBookReviewId = $this->bookReviewRepository->getPreviousBookReviewId($id, 'edit');
        $nextBookReviewId = $this->bookReviewRepository->getNextBookReviewId($id, 'edit');
        $books = $this->bookReviewRepository->getBooks($bookReview->book_id);
        return view('frontend.book_review.edit', compact('bookReview', 'previousBookReviewId', 'nextBookReviewId', 'books'));
    }
    
    public function update(BookReviewPostRequest $request, $id)
    {
        $this->bookReviewRepository->update($request->only($this->bookReviewRepository->getModel()->fillable), $id);

        return redirect('/bookReview/')->with('flash_message', 'Book review updated successfully');
    }
    
    public function destroy($id)
    {
        $this->bookReviewRepository->delete($id);

        return redirect('/bookReview/')->with('flash_message', 'BookReview information deleted successfully');
    }
}
