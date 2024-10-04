<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**Ac
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [
        'id',
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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function followers():BelongsToMany
    {
        return $this->belongsToMany(self::class,'followers','followed_id','following_id');
    }

    public function follows():BelongsToMany
    {
        return $this->belongsToMany(self::class,'followers','following_id','followed_id');
    }

    public function getAllUsers(int $user_id)
    {
        return self::where('id','!=',$user_id)->paginate(5);
    }

    public function follow(Int $user_id)
    {
        return $this->follows()->attach($user_id);
    }

    public function unfollow(Int $user_id)
    {
        return $this->follows()->detach($user_id);
    }

    public function isFollowing(Int $user_id)
    {
        return (boolean) $this->follows()->where('followed_id',$user_id)->first(['id']);
    }

    public function isFollowed(Int $user_id)
    {
        return (boolean) $this->followers()->where('following_id',$user_id)->first(['id']);
    }
}
