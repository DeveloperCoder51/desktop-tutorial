<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SearchTerm extends Model
{
    protected $fillable = ['user_id', 'term'];
    use HasFactory;

    /**
     * Get the user that owns the SearchTerm
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
