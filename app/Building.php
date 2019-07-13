<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    protected $table = 'Buildings';
    protected $fillable = [
        'id',
        'name',
        'address',
        'year',
        'lat',
        'lng',
        'district_id',
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function images()
    {
        return $this->belongsToMany(Images::class, BuildingImages::class, 'building_id', 'image_id');
    }

    public function videos()
    {
        return $this->belongsToMany(Videos::class, BuildingVideos::class, 'building_id', 'video_id');
    }
}
