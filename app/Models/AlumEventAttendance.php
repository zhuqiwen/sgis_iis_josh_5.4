<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AlumEventAttendance
 */
class AlumEventAttendance extends Model
{
    protected $table = 'alum_event_attendance';

    public $timestamps = true;

    protected $fillable = [
        'contact_id',
        'event_id'
    ];

    protected $guarded = [];

        
}