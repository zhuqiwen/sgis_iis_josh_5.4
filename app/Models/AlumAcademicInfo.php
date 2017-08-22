<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AlumAcademicInfo
 */
class AlumAcademicInfo extends Model
{
    protected $table = 'alum_academic_info';

    public $timestamps = true;

    protected $fillable = [
        'class-year',
        'degree',
        'contact_id',
        'field_id'
    ];

    protected $guarded = [];

        
}