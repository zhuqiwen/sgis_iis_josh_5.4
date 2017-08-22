<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AlumEmployerType
 */
class AlumEmployerType extends Model
{
    protected $table = 'alum_employer_types';

    public $timestamps = true;

    protected $fillable = [
        'type'
    ];

    protected $guarded = [];

        
}