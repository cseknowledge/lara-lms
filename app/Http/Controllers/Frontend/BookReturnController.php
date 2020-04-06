<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\BookReturnRepository;
use App\Http\Requests\BookReturnPostRequest;

use App\BookReturn;

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
        return view('frontend.bookReturn.index', compact('bookReturns'));
    }
    
    public function create()
    {
        return view('frontend.bookReturn.create');
    }
    
    public function store(BookReturnPostRequest $request)
    {        
        $this->bookReturnRepository->create($request->only($this->bookReturnRepository->getModel()->fillable));
        
        return redirect('/bookReturn/')->with('flash_message', 'New bookReturn created successfully');
    }
    
    public function show($id)
    {
        $bookReturn = $this->bookReturnRepository->show($id);
        $previousBookReturnId = $this->bookReturnRepository->getPreviousBookReturnId($id);
        $nextBookReturnId = $this->bookReturnRepository->getNextBookReturnId($id);
        return view('frontend.bookReturn.show', compact('bookReturn', 'previousBookReturnId', 'nextBookReturnId'));
    }

    public function edit($id)
    {
        $bookReturn = $this->bookReturnRepository->show($id);
        $previousBookReturnId = $this->bookReturnRepository->getPreviousBookReturnId($id);
        $nextBookReturnId = $this->bookReturnRepository->getNextBookReturnId($id);
        return view('frontend.bookReturn.edit', compact('bookReturn', 'previousBookReturnId', 'nextBookReturnId'));
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
