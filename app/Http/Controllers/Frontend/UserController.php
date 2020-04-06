<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Http\Requests\UserPostRequest;

use App\User;

class UserController extends Controller
{
    protected $userRepository;
   
    public function __construct(User $user)
    {
        $this->middleware('auth');
        $this->userRepository = new UserRepository($user);
    }
    
    public function index()
    {
        $users = $this->userRepository->all();
        return view('frontend.user.index', compact('users'));
    }
    
    public function create()
    {
        return view('frontend.user.create');
    }
    
    public function store(UserPostRequest $request)
    {        
        $this->userRepository->create($request->only($this->userRepository->getModel()->fillable));        
        return redirect('/user/')->with('flash_message', 'New user created successfully');
    }
    
    public function show($id)
    {
        $user = $this->userRepository->show($id);
        $previousUserId = $this->userRepository->getPreviousUserId($id);
        $nextUserId = $this->userRepository->getNextUserId($id);
        return view('frontend.user.show', compact('user', 'previousUserId', 'nextUserId'));
    }

    public function edit($id)
    {
        $user = $this->userRepository->show($id);
        $previousUserId = $this->userRepository->getPreviousUserId($id);
        $nextUserId = $this->userRepository->getNextUserId($id);
        return view('frontend.user.edit', compact('user', 'previousUserId', 'nextUserId'));
    }
    
    public function update(UserPostRequest $request, $id)
    {
        $this->userRepository->update($request->only($this->userRepository->getModel()->fillable), $id);
        return redirect('/user/')->with('flash_message', 'User updated successfully');
    }
    
    public function destroy($id)
    {
        $this->userRepository->delete($id);
        return redirect('/user/')->with('flash_message', 'User information deleted successfully');
    }
}
