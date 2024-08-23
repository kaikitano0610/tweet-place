<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Tweet extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [
        'id'
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function favorites():HasMany
    {
        return $this->hasMany(Favorite::class);
    }
    public function comments():HasMany
    {
        return $this->hasMany(Comment::class);
    }
}
