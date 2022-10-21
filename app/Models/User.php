<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'fname',
        'mname',
        'lname',
        'username',
        'password',
        'last_seen',
        'role'
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

    /**
     * Get all of the Request for the User(Normal User)
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function requests(): HasMany
    {
        return $this->hasMany(Request::class, 'user_id', 'id');
    }

    /**
     * Get all of the Request for the User(Admin User)
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function adminRequests(): HasMany
    {
        return $this->hasMany(Request::class, 'handler_id', 'id');
    }

    /**
     * Get all of the UserLogs(activities) for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function userLogs(): HasMany
    {
        return $this->hasMany(UserLog::class, 'user_id', 'id');
    }

    /**
     * Get all of the RequestHistories(activities) for the User(Admin User)
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function editHistories(): HasMany
    {
        return $this->hasMany(RequestHistory::class, 'user_id', 'id');
    }
}
