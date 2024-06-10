<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileVisit extends Model
{
    use HasFactory;

    protected $fillable = ['visitor_user_id', 'visited_user_id'];

    public function visitor()
    {
        return $this->belongsTo(User::class, 'visitor_user_id');
    }

    public function visited()
    {
        return $this->belongsTo(User::class, 'visited_user_id');
    }
}

