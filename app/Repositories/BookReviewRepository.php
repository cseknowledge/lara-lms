<?php 

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Auth;
use App\Book;
use App\User;

class BookReviewRepository implements RepositoryInterface
{
    // model property on class instances
    protected $model;

    // Constructor to bind model to repo
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    // Get all instances of model
    public function all()
    {
        $loggedUserList = $this->model->where('user_id', '=', Auth::user()->id)->get();
        $utherUsersList = $this->model->where('user_id', '!=', Auth::user()->id)->get();
        $list = $loggedUserList->merge($utherUsersList);
        return $list;
    }

    // create a new record in the database
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    // update record in the database
    public function update(array $data, $id)
    {
        $record = $this->model->findOrFail($id);
        return $record->update($data);
    }

    // remove record from the database
    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    // show the record with the given id
    public function show($id)
    {
        return $this->model->with('book')->with('user')->findOrFail($id);
    }

    // Get the associated model
    public function getModel()
    {
        return $this->model;
    }

    // Set the associated model
    public function setModel($model)
    {
        $this->model = $model;
        return $this;
    }

    // Eager load database relationships
    public function with($relations)
    {
        return $this->model->with($relations);
    }

    public function getPreviousBookReviewId($id, $action='')
    {
        if($action == '') {
            return $this->model->where('id', '<', $id)->max('id');
        } else {
            return $this->model->where('id', '<', $id)->where('user_id', '=', Auth::user()->id)->max('id');
        }
    }

    public function getNextBookReviewId($id, $action='')
    {
        if($action == '') {
            return $this->model->where('id', '>', $id)->min('id');
        } else {
            return $this->model->where('id', '>', $id)->where('user_id', '=', Auth::user()->id)->min('id');
        }        
    }

    public function getBooks()
    {
        return Book::all();
    }

    public function getUsers()
    {
        return User::all();
    }
}