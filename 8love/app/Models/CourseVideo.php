<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseVideo extends Model
{
    protected $fillable = ['course_id', 'video', 'audio'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    use HasFactory;
}