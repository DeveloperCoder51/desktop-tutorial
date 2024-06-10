<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $guarder;

    public function destination(){
        return $this->belongsTo(Destination::class);
    }


    public function rooms(){
        return $this->hasMany(Room::class);
    }

    use HasFactory;
}
