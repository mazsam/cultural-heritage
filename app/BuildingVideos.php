<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BuildingVideos extends Model
{
    protected $table = 'building_videos';
    protected $fillable = [
        'id',
        'building_id',
        'video_id'
    ];

    public function building()
    {
        return $this->hashMany(building::class, 'id', 'building_id');
    }

    public function videos()
    {
        return $this->hashMany(videos::class, 'id', 'video_id');
    }
}
