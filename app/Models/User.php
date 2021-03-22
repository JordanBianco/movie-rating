<?php

namespace App\Models;

use App\Traits\RecordFeed;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, RecordFeed;

    public static function boot()
    {
        parent::boot();

        static::created(function($user) {
            $user->profile()->create();
        });
    }

    protected $with = ['reviews'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'birth_date',
        'gender',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function image()
    { 
        if ($this->images->first()) {
            return '/storage/'. $this->images->first()->url;
        } else {
            return 'https://eu.ui-avatars.com/api/?name=' . $this->name;
        }
    }

    #
    # Relationship
    #
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function watchlist()
    {
        return $this->belongsToMany(Movie::class, 'movie_user')->withTimestamps();
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    /**
     * Get all of the user's images.
     */
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function feeds()
    {
        return $this->hasMany(Feed::class)->latest();
    }
}