<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $table = 'authors';

    protected $primaryKey = 'id';

    protected $fillable = ['author_name', 'short_description'];

    //protected $guarded = [];

    public function books()
    {
        return $this->hasMany(Book::class, 'author_id');
    }
}
