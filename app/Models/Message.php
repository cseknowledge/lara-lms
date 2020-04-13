<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'messages';

    protected $primaryKey = 'id';

    // protected $fillable = ['message', 'department', 'message_from_user_id', 'is_viewed', 'is_read'];

    protected $guarded = [];

    public function user(Type $var = null)
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function wishlist()
    {
        return $this->belongsTo(Wishlist::class, 'wishlist_id');
    }
}
