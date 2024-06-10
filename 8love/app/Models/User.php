<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Profile;
use App\Models\UserInformation;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class User extends Authenticatable
{
    public function isAdmin()
    {
        return $this->role === 'admin'; // Adjust this condition to match your application's logic
    }
    use HasApiTokens, HasFactory, Notifiable;


    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function information()
    {
        return $this->hasOne(UserInformation::class);
    }

    public function friends()
    {
        return $this->belongsToMany(User::class, 'friends', 'user_id', 'friend_id');
    }

    public function friendOf()
    {
        return $this->belongsToMany(User::class, 'friends', 'friend_id', 'user_id');
    }

    public function likes()
    {
        return $this->hasMany(Like::class, 'user_id');
    }

    public function likedBy()
    {
        return $this->hasMany(Like::class, 'liked_user_id');
    }




    public function visits()
    {
        return $this->hasMany(ProfileVisit::class, 'visited_user_id');
    }

    public function visitors()
    {
        return $this->hasMany(ProfileVisit::class, 'visitor_user_id');
    }

    public function blockedUsers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'block_users', 'user_id', 'blacklisted_user_id');
    }

    public function courses()
    {
        return $this->hasMany(Course::class, 'created_by');
    }

    public function goalsareas()
    {
        return $this->hasOne(GoalAreas::class);
    }

    public function categories()
    {
        return $this->hasMany(Category::class, 'created_by');
    }
    /**
     * The attributes that are mass assignable.
     *
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'user_name',
        'email',
        'password',
        'country',
        'phone',
        'forget_password_code',
        'otp',
        'visiting',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
