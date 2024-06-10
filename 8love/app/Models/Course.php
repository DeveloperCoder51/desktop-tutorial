<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'courses';
    protected $fillable = [
        'name',
        'description',
        'type',
        'charges',
        'states',
        'price',
        'status',
        'created_by',
        'student_what_gain',
        'category_id',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Define the relationship with the User model as author
    public function author()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function VideosAudios()
    {
        return $this->hasMany(CourseVideo::class);
    }
    use HasFactory;
}
