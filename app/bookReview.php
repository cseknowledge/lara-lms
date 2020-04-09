<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bookReview extends Model
{
    protected $table = 'book_reviews';

    protected $primaryKey = 'id';

    protected $fillable = ['book_id', 'user_id', 'book_review'];

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
