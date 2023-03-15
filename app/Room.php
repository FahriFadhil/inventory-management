<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $guarded = ['id'];

    protected $with = ['user'];

    public function user() 
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
