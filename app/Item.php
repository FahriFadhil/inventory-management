<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $guarded = ['id'];

    public function room() 
    {
        return $this->belongsTo(Room::class);
    } 
    public function categories() 
    {
        return $this->hasMany(Category::class);
    } 
}
