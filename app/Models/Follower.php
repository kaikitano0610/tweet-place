<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Follower extends Model
{
    use HasFactory;

    //複合キーの設定が適切ではないみたいなので削除

    protected $fillable = [
        'following_id',
        'followed_id'
    ];    

    public $timestamps = false;
    public $incrementing = false;
}
