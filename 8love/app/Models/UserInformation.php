<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInformation extends Model
{
    protected $fillable = [
        'user_id',
        'birthdate',
        'gender',
        'relation_status',
        'height',
        'weight',
        'looking_for',
        'about',
        'location',
        'interest',
        'age',
        'latitude',
        'longitude',
        'type',
    ];
    use HasFactory;
}
