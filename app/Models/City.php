<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class City
 */
class City extends Model
{
    protected $table = 'cities';

    public $timestamps = true;

    protected $fillable = [
        'country_id',
        'region_id',
        'city',
        'latitude',
        'longitude',
        'time_zone',
        'code'
    ];

    protected $guarded = [];

        
}