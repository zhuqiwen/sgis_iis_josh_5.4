<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AlumEmployer
 */
class AlumEmployer extends Model
{
    protected $table = 'alum_employers';

    public $timestamps = true;

    protected $fillable = [
        'name',
        'web_address',
        'type_id'
    ];

    protected $guarded = [];

        
}