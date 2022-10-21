<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RequestHistory extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'request_id',
        'user_id',
        'target_column',
        'before',
        'after'
    ];

    /**
     * Get the Request that owns the RequestHistory
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function request(): BelongsTo
    {
        return $this->belongsTo(Request::class, 'request_id', 'id')->withTrashed();
    }

    /**
     * Get the User(Admin User) that owns the RequestHistory
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id')->withTrashed();
    }
}
