<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Country
 */
class Country extends Model
{
    protected $table = 'countries';

    public $timestamps = true;

    protected $fillable = [
        'country',
        'fips104',
        'iso2',
        'iso3',
        'ison',
        'internet',
        'capital',
        'map_reference',
        'nationality_singular',
        'nationality_plural',
        'currency',
        'currency_code',
        'population',
        'title',
        'comment',
        'phone_code',
        'country_id'
    ];

    protected $guarded = [];

        
}