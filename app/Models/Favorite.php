<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Favorite extends Model
{
    public $timestamps = false;


    protected $guarded = [
        'id'
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function tweet():BelongsTo
    {
        return $this->belongsTo(Tweet::class);
    }


}
