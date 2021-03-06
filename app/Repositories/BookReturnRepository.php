<?php 

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

use App\Book;
use App\User;

class BookReturnRepository implements RepositoryInterface
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

    public function getPreviousBookReturnId($id)
    {
        return $this->model->where('id', '<', $id)->max('id');
    }

    public function getNextBookReturnId($id)
    {
        return $this->model->where('id', '>', $id)->min('id');
    }

    public function getBooks()
    {
        return Book::where('is_available', 0)->latest()->get();
    }

    public function getUsers()
    {
        return User::all();
    }

    public function updateBookAvailability($id, $status)
    {
        $book = Book::findOrFail($id);
        $book->is_available = $status;
        $book->save();
    }
}