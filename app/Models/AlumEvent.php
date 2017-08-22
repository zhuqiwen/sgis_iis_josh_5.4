<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AlumEvent
 */
class AlumEvent extends Model
{
    protected $table = 'alum_events';

    public $timestamps = true;

    protected $fillable = [
        'name',
        'date',
        'country',
        'state',
        'city'
    ];

    protected $guarded = [];

        
}