<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    protected  $guarded;

    public function hotels(){
        return $this->hasMany(Hotel::class);
    }
    
    use HasFactory;
}
