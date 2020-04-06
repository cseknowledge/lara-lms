<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookReturn extends Model
{
    protected $table = 'book_returns';

    protected $primaryKey = 'id';

    protected $fillable = ['return_date', 'book_id', 'user_id'];

    //protected $guarded = [];

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
