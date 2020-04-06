<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'members';

    protected $primaryKey = 'id';

    protected $fillable = ['user_id', 'address', 'member_type', 'member_date', 'expiry_date'];

    //protected $guarded = [];    

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
