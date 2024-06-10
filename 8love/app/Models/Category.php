<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function coursescount(){
        return $this->hasMany(Course::class)->selectRaw('category_id, count(*) as count')->groupBy('category_id');
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    use HasFactory;
}
