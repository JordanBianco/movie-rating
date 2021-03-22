<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $table = 'profile';

    protected $fillable = [
        'user_id',
        'bio',
        'website',
        'phone',
        'job',
        'location',
        'is_public',
        'points',
        'level',
    ];

    public function level()
    {
        $points = $this->points;

        if ($points < 2) {
            $this->level = 0;
            $this->save();
        } 
        elseif ($points >= 2 && $points <= 5) {
            $this->level = 1;
            $this->save();
        } 
        elseif($points >= 6 && $points <= 10) {
            $this->level = 2;
            $this->save();
        } 
        elseif($points >= 11 && $points <= 20) {
            $this->level = 3;
            $this->save();
        } 
        elseif($points >= 21 && $points <= 50) {
            $this->level = 4;
            $this->save();
        } 
        else {
            $this->level = 5;
            $this->save();
        }

        return $this->level;
    }

    public function nextLevel()
    {
        $currentUserPoints = $this->points;

        if ($this->level == 0) {
            $pointsNeeded = 2;
            $remainingPoints = $pointsNeeded - $currentUserPoints;
        } else if ($this->level == 1) {
            $pointsNeeded = 6;
            $remainingPoints = $pointsNeeded - $currentUserPoints;
        } else if ($this->level == 2) {
            $pointsNeeded = 11;
            $remainingPoints = $pointsNeeded - $currentUserPoints;
        } else if ($this->level == 3) {
            $pointsNeeded = 21;
            $remainingPoints = $pointsNeeded - $currentUserPoints;
        } else if ($this->level == 4) {
            $pointsNeeded = 51;
            $remainingPoints = $pointsNeeded - $currentUserPoints;
        } else {
            $remainingPoints = 0;
        }

        return $remainingPoints;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
