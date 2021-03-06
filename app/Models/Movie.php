<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'release_year',
        'homepage',
        'budget'
    ];

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function watchlist()
    {
        return $this->belongsToMany(User::class, 'movie_user')->withTimestamps();
    }
}
