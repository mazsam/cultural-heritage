<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DistrictLatLong extends Model
{
    protected $table = 'district_latlong';
    protected $fillable = [
        'id',
        'latlong_id',
        'district_id'
    ];
}
