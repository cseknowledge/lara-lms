<?php 

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Auth;

use Carbon\Carbon;

class UserRepository implements RepositoryInterface
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
        $userData = $data;
        $userData['password'] = Hash::make($data['password']);
        $userData['member_id'] = $this->generateMemberId($data['expiry_date']);
        return $this->model->create($userData);
    }

    // update record in the database
    public function update(array $data, $id)
    {
        $record = $this->model->findOrFail($id);
        $userData = $data;
        $userData['password'] = Hash::make($data['password']);
        return $record->update($userData);
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

    public function getPreviousUserId($id)
    {
        return $this->model->where('id', '<', $id)->max('id');
    }

    public function getNextUserId($id)
    {
        return $this->model->where('id', '>', $id)->min('id');
    }

    public function generateMemberId($data)
    {
        return substr(date('Y'), -2).date('m').date('d').substr(Carbon::parse($data)->format('Y'), -2).Carbon::parse($data)->format('m').$this->all()->count()+1;
    }

    public function updatePassword(array $data)
    {
        $affected = DB::table('users')
              ->where('id', Auth::user()->id)
              ->update(['password' => Hash::make($data['password'])]);
        return $affected;
    }
}