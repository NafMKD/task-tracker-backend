<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Request extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'handler_id',
        'requests_category_id',
        'title',
        'description',
        'status',
        'status_date'
    ];

    /**
     * Get the User(Normal User) that owns the Request
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function requester(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id')->withTrashed();
    }

    /**
     * Get the User(Admin User) that handles the Request
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function handler(): BelongsTo
    {
        return $this->belongsTo(User::class, 'handler_id', 'id')->withTrashed();
    }

    /**
     * Get the Category that owns the Request
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(RequestCategory::class, 'requests_category_id', 'id')->withTrashed();
    }

    /**
     * Get all of the RequestHistories(activities) for the Request
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function histories(): HasMany
    {
        return $this->hasMany(RequestHistory::class, 'request_id', 'id');
    }
}
