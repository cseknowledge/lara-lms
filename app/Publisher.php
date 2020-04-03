<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    protected $table = 'publishers';

    protected $primaryKey = 'id';

    protected $fillable = ['publisher_name', 'publisher_owner_name', 'address', 'short_description', 'logo'];

    //protected $guarded = [];

    public function books()
    {
        return $this->hasMany(Book::class, 'publisher_id');
    }
}
