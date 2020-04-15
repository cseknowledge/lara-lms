<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Events\NotifyToWishlistUserEvent;
use Illuminate\Http\Request;
use App\Repositories\BookReturnRepository;
use App\Http\Requests\BookReturnPostRequest;

use App\Models\BookReturn;
use App\Models\Wishlist;

class BookReturnController extends Controller
{
    protected $bookReturnRepository;
   
    public function __construct(BookReturn $bookReturn)
    {
        $this->middleware('auth');
        $this->bookReturnRepository = new BookReturnRepository($bookReturn);
    }
    
    public function index()
    {
        $bookReturns = $this->bookReturnRepository->all();
        return view('frontend.book_return.index', compact('bookReturns'));
    }
    
    public function create()
    {
        $books = $this->bookReturnRepository->getBooks();
        $users = $this->bookReturnRepository->getUsers();
        return view('frontend.book_return.create', compact('books', 'users'));
    }
    
    public function store(BookReturnPostRequest $request)
    {   //Calculate lost & quantity based availability     
        $this->bookReturnRepository->create($request->only($this->bookReturnRepository->getModel()->fillable));         
        $this->bookReturnRepository->updateBookAvailability($request->input('book_id'), '1', $request->input('return_problem'));
        // $this->bookReturnRepository->notifyToWishlistUser($request->input('book_id'));     
        event(new NotifyToWishlistUserEvent($request->input('book_id'))) ;
        return redirect('/bookReturn/create')->with('flash_message', 'Book return successfully');
    }
    
    public function show($id)
    {
        $bookReturn = $this->bookReturnRepository->show($id);
        $previousBookReturnId = $this->bookReturnRepository->getPreviousBookReturnId($id);
        $nextBookReturnId = $this->bookReturnRepository->getNextBookReturnId($id);
        return view('frontend.book_return.show', compact('bookReturn', 'previousBookReturnId', 'nextBookReturnId'));
    }

    public function edit($id)
    {
        $bookReturn = $this->bookReturnRepository->show($id);
        $previousBookReturnId = $this->bookReturnRepository->getPreviousBookReturnId($id);
        $nextBookReturnId = $this->bookReturnRepository->getNextBookReturnId($id);
        return view('frontend.book_return.edit', compact('bookReturn', 'previousBookReturnId', 'nextBookReturnId'));
    }
    
    public function update(BookReturnPostRequest $request, $id)
    {
        $this->bookReturnRepository->update($request->only($this->bookReturnRepository->getModel()->fillable), $id);

        return redirect('/bookReturn/')->with('flash_message', 'BookReturn updated successfully');
    }
    
    public function destroy($id)
    {
        $this->bookReturnRepository->delete($id);

        return redirect('/bookReturn/')->with('flash_message', 'BookReturn information deleted successfully');
    }
}
