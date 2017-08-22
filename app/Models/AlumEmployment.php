<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AlumEmployment
 */
class AlumEmployment extends Model
{
    protected $table = 'alum_employments';

    public $timestamps = true;

    protected $fillable = [
        'job_title',
        'country',
        'state',
        'city',
        'contact_id',
        'employer_id'
    ];

    protected $guarded = [];

        
}