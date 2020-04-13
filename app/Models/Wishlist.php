<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $table = 'wishlists';

    protected $primaryKey = 'id';

    // protected $fillable = ['book_id', 'message_id', 'is_user_acknowledged', 'short_description'];

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function book()
    {
        return $this->belongsTo(Book::class, 'user_id');
    }

    public function message()
    {
        return $this->hasOne(Message::class, 'wishlist_id');
    }
}
