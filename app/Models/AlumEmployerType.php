<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class AlumEmployerType
 */
class AlumEmployerType extends Model
{
    protected $table = 'alum_employer_types';

    public $timestamps = true;

    protected $fillable = [
        'employer_type'
    ];

    protected $guarded = ['id'];

    use SoftDeletes;

    protected $dates = ['deleted_at'];



}