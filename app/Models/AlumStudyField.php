<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AlumStudyField
 */
class AlumStudyField extends Model
{
    protected $table = 'alum_study_fields';

    public $timestamps = true;

    protected $fillable = [
        'field'
    ];

    protected $guarded = [];

        
}