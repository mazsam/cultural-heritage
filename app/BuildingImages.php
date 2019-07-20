<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BuildingImages extends Model
{
    protected $table = 'building_images';
    protected $fillable = [
        'id',
        'building_id',
        'image_id'
    ];
    public $timestamps = false;

    public function building()
    {
        return $this->hashMany(building::class, 'id', 'building_id');
    }

    public function images()
    {
        return $this->hashMany(images::class, 'id', 'image_id');
    }
}
