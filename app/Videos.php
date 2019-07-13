<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Videos extends Model
{
    protected $table = 'Videos';
    protected $fillable = [
        'id',
        'name',
        'url'
    ];
}
