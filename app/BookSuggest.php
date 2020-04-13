<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookSuggest extends Model
{
    protected $table = 'book_suggests';

    protected $primaryKey = 'id';

    protected $fillable = ['book_name', 'author_name', 'publisher_name', 'user_id', 'short_description'];

    //protected $guarded = [];    

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
