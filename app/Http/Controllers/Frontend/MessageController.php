<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\MessageRepository;
use App\Http\Requests\MessagePostRequest;

use App\Models\Message;

class MessageController extends Controller
{
    protected $messageRepository;
   
    public function __construct(Message $message)
    {
        $this->middleware('auth');
        $this->messageRepository = new MessageRepository($message);
    }
    
    public function index()
    {
        $messages = $this->messageRepository->all();
        return view('frontend.message.index', compact('messages'));
    }
    
    public function create()
    {
        return view('frontend.message.create');
    }
    
    public function store(MessagePostRequest $request)
    {        
        $this->messageRepository->create($request->only($this->messageRepository->getModel()->fillable));  
        return redirect('/message/')->with('flash_message', 'Book suggest added successfully');
    }
    
    public function show($id)
    {
        $message = $this->messageRepository->show($id);
        $previousMessageId = $this->messageRepository->getPreviousMessageId($id);
        $nextMessageId = $this->messageRepository->getNextMessageId($id);
        return view('frontend.message.show', compact('message', 'previousMessageId', 'nextMessageId'));
    }

    public function edit($id)
    {
        $message = $this->messageRepository->show($id);
        $previousMessageId = $this->messageRepository->getPreviousMessageId($id, 'edit');
        $nextMessageId = $this->messageRepository->getNextMessageId($id, 'edit');        
        return view('frontend.message.edit', compact('message', 'previousMessageId', 'nextMessageId'));
    }
    
    public function update(MessagePostRequest $request, $id)
    {
        $this->messageRepository->update($request->only($this->messageRepository->getModel()->fillable), $id);

        return redirect('/message/')->with('flash_message', 'Book suggest updated successfully');
    }
    
    public function destroy($id)
    {
        $this->messageRepository->delete($id);

        return redirect('/message/')->with('flash_message', 'Message information deleted successfully');
    }
}
