<?php 

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Response;
use Auth;
use App\Models\Book;
use App\Models\User;
use App\Models\BookIssued;

class BookIssuedRepository implements RepositoryInterface
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
        if(Auth::user()->member_type != "Student") {
            return $this->model->where('issued_by', '!=', null)->where('is_approved', '=', true)->get();
        } else {
            return $this->model->where('is_request_from_student', '=', true)->where('user_id', '=', Auth::user()->id)->get();
        }
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
        if(Auth::user()->member_type == "Student") {
            $book = Book::findOrFail($id); 
            $book->is_available = 1;
            $book->quantity = ++$book->quantity;
            $book->save();
        }
        return $this->model->destroy($id);
    }

    // show the record with the given id
    public function show($id)
    {
        return $this->model->findOrFail($id);
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

    public function getPreviousBookIssuedId($id)
    {
        if(Auth::user()->member_type != "Student") {
            return $this->model->where('id', '<', $id)->where('issued_by', '=', null)->where('is_approved', '=', true)->max('id');
        } else {
            return $this->model->where('id', '<', $id)->where('issued_by', '=', null)->where('is_approved', '=', false)->where('user_id', '=', Auth::user()->id)->max('id');
        }
    }

    public function getNextBookIssuedId($id)
    {
        if(Auth::user()->member_type != "Student") {
            return $this->model->where('id', '>', $id)->where('issued_by', '=', null)->where('is_approved', '=', true)->min('id');
        } else {
            return $this->model->where('id', '>', $id)->where('issued_by', '=', null)->where('is_approved', '=', false)->where('user_id', '=', Auth::user()->id)->min('id');
        }
    }

    public function getBooks($id='')
    {
        if($id == '') {
            return Book::where('quantity', '>', 0)->latest()->get();
        } else {
            $issuedBook = Book::where('id', $id)->get();
            $availableBook = Book::where('is_available', 1)->get();
            $list = $issuedBook->merge($availableBook);
            return $list;            
        }
    }

    public function getUsers($action = '')
    {
        if($action == '') {
            $today = date('Y-m-d', strtotime("today midnight". ' + 7 days'));
            return User::where('expiry_date', '>=', $today)->latest()->get(); 
        } else {
            return User::latest()->get();
        }       
    }

    public function updateBookAvailability($id, $status)
    {
        $book = Book::findOrFail($id);     
        if($book->quantity == 1) {
            $book->is_available = $status;
        }   
        $book->quantity = $status == 0 ? --$book->quantity : ++$book->quantity;
        $book->save();
    }

    public function updateStudentRequest($id, $status)
    {
        $bookIssue = BookIssued::findOrFail($id); 
        $bookIssue->issued_by = Auth::user()->id;
        $bookIssue->is_approved = $status;
        $bookIssue->save();
    }
}