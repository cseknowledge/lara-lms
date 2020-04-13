<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'member_id', 'name', 'email', 'password', 'address', 'member_type', 'expiry_date'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function booksIssued()
    {
        return $this->hasMany(BookIssued::class, 'user_id');
    }

    public function booksReturend()
    {
        return $this->hasMany(BookReturn::class, 'user_id');
    }

    public function booksReviews()
    {
        return $this->hasMany(BookReview::class, 'user_id');
    }

    public function booksSuggests()
    {
        return $this->hasMany(BookSuggest::class, 'user_id');
    }

    public function wishlists()
    {
        return $this->hasMany(Wishlist::class, 'user_id');
    }

    public function messages_to()
    {
        return $this->hasMany(Message::class, 'message_to');
    }

    public function messages_from()
    {
        return $this->hasMany(Message::class, 'message_from');
    }
}
