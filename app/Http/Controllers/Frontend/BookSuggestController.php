<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\BookSuggestRepository;
use App\Http\Requests\BookSuggestPostRequest;

use App\BookSuggest;

class BookSuggestController extends Controller
{
    protected $bookSuggestRepository;
   
    public function __construct(BookSuggest $bookSuggest)
    {
        $this->middleware('auth');
        $this->bookSuggestRepository = new BookSuggestRepository($bookSuggest);
    }
    
    public function index()
    {
        $bookSuggests = $this->bookSuggestRepository->all();
        return view('frontend.book_suggest.index', compact('bookSuggests'));
    }
    
    public function create()
    {
        return view('frontend.book_suggest.create');
    }
    
    public function store(BookSuggestPostRequest $request)
    {        
        $this->bookSuggestRepository->create($request->only($this->bookSuggestRepository->getModel()->fillable));  
        return redirect('/bookSuggest/')->with('flash_message', 'Book suggest added successfully');
    }
    
    public function show($id)
    {
        $bookSuggest = $this->bookSuggestRepository->show($id);
        $previousBookSuggestId = $this->bookSuggestRepository->getPreviousBookSuggestId($id);
        $nextBookSuggestId = $this->bookSuggestRepository->getNextBookSuggestId($id);
        return view('frontend.book_suggest.show', compact('bookSuggest', 'previousBookSuggestId', 'nextBookSuggestId'));
    }

    public function edit($id)
    {
        $bookSuggest = $this->bookSuggestRepository->show($id);
        $previousBookSuggestId = $this->bookSuggestRepository->getPreviousBookSuggestId($id, 'edit');
        $nextBookSuggestId = $this->bookSuggestRepository->getNextBookSuggestId($id, 'edit');        
        return view('frontend.book_suggest.edit', compact('bookSuggest', 'previousBookSuggestId', 'nextBookSuggestId'));
    }
    
    public function update(BookSuggestPostRequest $request, $id)
    {
        $this->bookSuggestRepository->update($request->only($this->bookSuggestRepository->getModel()->fillable), $id);

        return redirect('/bookSuggest/')->with('flash_message', 'Book suggest updated successfully');
    }
    
    public function destroy($id)
    {
        $this->bookSuggestRepository->delete($id);

        return redirect('/bookSuggest/')->with('flash_message', 'BookSuggest information deleted successfully');
    }
}
