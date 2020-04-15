<?php 

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Auth;
use DB;
use App\Models\BookSuggest;
use App\Models\User;

class BookSuggestRepository implements RepositoryInterface
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
        return $this->model->where('user_id', '=', Auth::user()->id)->get();
        // $list_of_book_suggests = DB::table('book_suggests')        
        // ->select('book_name', DB::raw('count(*) as total'))
        // ->groupBy('book_name')
        // ->pluck('total','book_name')->all();
        // dd($list_of_book_suggests);
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
        return $this->model->with('user')->findOrFail($id);
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

    public function getPreviousBookSuggestId($id)
    {
        return $this->model->where('id', '<', $id)->where('user_id', '=', Auth::user()->id)->max('id');
    }

    public function getNextBookSuggestId($id)
    {
        return $this->model->where('id', '>', $id)->where('user_id', '=', Auth::user()->id)->min('id');
    }
}