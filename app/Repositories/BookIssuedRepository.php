<?php 

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Response;
use App\Book;
use App\User;

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
        return $this->model->all();
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
        return $this->model->where('id', '<', $id)->max('id');
    }

    public function getNextBookIssuedId($id)
    {
        return $this->model->where('id', '>', $id)->min('id');
    }

    public function getBooks($id='')
    {
        if($id == '') {
            return Book::where('is_available', 1)->latest()->get();
        } else {
            $issuedBook = Book::where('id', $id)->get();
            $availableBook = Book::where('is_available', 1)->get();
            $list = $issuedBook->merge($availableBook);
            return $list;            
        }
    }

    public function getUsers()
    {
        $today = date('Y-m-d', strtotime("today midnight". ' + 7 days'));
        return User::where('expiry_date', '>=', $today)->latest()->get();
    }

    public function updateBookAvailability($id, $status)
    {
        $book = Book::findOrFail($id);
        $book->is_available = $status;
        $book->save();
    }
}