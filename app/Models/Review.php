<?php

namespace App\Models;

use App\Traits\RecordFeed;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory, RecordFeed;

    protected $fillable = ['user_id', 'movie_id', 'rating', 'body'];

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get all of the user's likes.
     */
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
