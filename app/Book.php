<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';

    protected $primaryKey = 'id';

    protected $fillable = ['generated_book_id', 'book_name', 'short_description', 'author_id', 'publisher_id', 'price', 'is_available'];

    //protected $guarded = [];

    public function author()
    {
        return $this->belongsTo(Author::class, 'id');
    }

    public function publisher()
    {
        return $this->belongsTo(Publisher::class, 'id');
    }

    public function booksIssued()
    {
        return $this->hasMany(BookIssued::class, 'book_id');
    }

    public function booksReturend()
    {
        return $this->hasMany(BookReturn::class, 'book_id');
    }
}
