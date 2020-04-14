<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookIssued extends Model
{
    protected $table = 'book_issueds';

    protected $primaryKey = 'id';

    protected $fillable = ['issue_date', 'return_date', 'quantity', 'book_id', 'user_id', 'issued_by', 'is_approved', 'is_request_from_student'];

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
