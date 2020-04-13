<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\AuthorRepository;
use App\Http\Requests\AuthorPostRequest;

use App\Models\Author;

class AuthorController extends Controller
{
    protected $authorRepository;
   
    public function __construct(Author $author)
    {
        $this->middleware('auth');
        $this->authorRepository = new AuthorRepository($author);
    }
    
    public function index()
    {
        $authors = $this->authorRepository->all();
        return view('frontend.author.index', compact('authors'));
    }
    
    public function create()
    {
        return view('frontend.author.create');
    }
    
    public function store(AuthorPostRequest $request)
    {        
        $this->authorRepository->create($request->only($this->authorRepository->getModel()->fillable));        
        return redirect('/author/')->with('flash_message', 'New author created successfully');
    }
    
    public function show($id)
    {
        $author = $this->authorRepository->show($id);
        $previousAuthorId = $this->authorRepository->getPreviousAuthorId($id);
        $nextAuthorId = $this->authorRepository->getNextAuthorId($id);
        return view('frontend.author.show', compact('author', 'previousAuthorId', 'nextAuthorId'));
    }

    public function edit($id)
    {
        $author = $this->authorRepository->show($id);
        $previousAuthorId = $this->authorRepository->getPreviousAuthorId($id);
        $nextAuthorId = $this->authorRepository->getNextAuthorId($id);
        return view('frontend.author.edit', compact('author', 'previousAuthorId', 'nextAuthorId'));
    }
    
    public function update(AuthorPostRequest $request, $id)
    {
        $this->authorRepository->update($request->only($this->authorRepository->getModel()->fillable), $id);
        return redirect('/author/')->with('flash_message', 'Author updated successfully');
    }
    
    public function destroy($id)
    {
        $this->authorRepository->delete($id);
        return redirect('/author/')->with('flash_message', 'Author information deleted successfully');
    }
}
