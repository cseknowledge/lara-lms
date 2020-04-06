<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\PublisherRepository;
use App\Http\Requests\PublisherPostRequest;

use App\Publisher;

class PublisherController extends Controller
{
    protected $publisherRepository;
   
    public function __construct(Publisher $publisher)
    {
        $this->middleware('auth');
        $this->publisherRepository = new PublisherRepository($publisher);
    }
    
    public function index()
    {
        $publishers = $this->publisherRepository->all();
        return view('frontend.publisher.index', compact('publishers'));
    }
    
    public function create()
    {
        return view('frontend.publisher.create');
    }
    
    public function store(PublisherPostRequest $request)
    {        
        $this->publisherRepository->create($request->only($this->publisherRepository->getModel()->fillable));        
        return redirect('/publisher/')->with('flash_message', 'New publisher created successfully');
    }
    
    public function show($id)
    {
        $publisher = $this->publisherRepository->show($id);
        $previousPublisherId = $this->publisherRepository->getPreviousPublisherId($id);
        $nextPublisherId = $this->publisherRepository->getNextPublisherId($id);
        return view('frontend.publisher.show', compact('publisher', 'previousPublisherId', 'nextPublisherId'));
    }

    public function edit($id)
    {
        $publisher = $this->publisherRepository->show($id);
        $previousPublisherId = $this->publisherRepository->getPreviousPublisherId($id);
        $nextPublisherId = $this->publisherRepository->getNextPublisherId($id);
        return view('frontend.publisher.edit', compact('publisher', 'previousPublisherId', 'nextPublisherId'));
    }
    
    public function update(PublisherPostRequest $request, $id)
    {
        $this->publisherRepository->update($request->only($this->publisherRepository->getModel()->fillable), $id);
        return redirect('/publisher/')->with('flash_message', 'Publisher updated successfully');
    }
    
    public function destroy($id)
    {
        $this->publisherRepository->delete($id);
        return redirect('/publisher/')->with('flash_message', 'Publisher information deleted successfully');
    }
}
