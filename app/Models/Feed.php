<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feed extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'description',
        'feedable_id',
        'feedable_type'
    ];

    public function feedable()
    {
        return $this->morphTo();
    }
}
