<?php 

namespace App\Traits;

use App\Models\Feed;
use Illuminate\Support\Str;

trait RecordFeed
{
    public static function bootRecordFeed()
    {
        // registro i vari model events  
        static::created(function($model) {
            $model->recordFeed('created');
        });

        static::updated(function($model) {
            $model->recordFeed('updated');
        });

        static::deleted(function($model) {
            $model->recordFeed('deleted');
        });
    }

    public function recordFeed($event)
    {
        $this->feeds()->create([
            'user_id' => auth()->id(),
            'feedable_type' => get_class($this),
            'feedable_id' => $this->id,
            'description' => Str::lower(class_basename($this)) . '_' . $event // review_created
        ]);
    }

    public function feeds()
    {
        return $this->morphMany(Feed::class, 'feedable');
    }
}