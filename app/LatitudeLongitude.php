<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LatitudeLongitude extends Model
{
    protected $table = 'latitude_longitude';
    protected $fillable = [
        'id',
        'latitude',
        'longitude'
    ];
}
