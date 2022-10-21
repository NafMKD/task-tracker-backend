<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RequestCategory extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description'
    ];

    /**
     * Get all of the Requests for the Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function histories(): HasMany
    {
        return $this->hasMany(Request::class, 'requests_category_id', 'id');
    }
}
