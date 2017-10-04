<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AlumAcademicInfo
 */
class Notifications extends Model
{
    protected $table = 'notifications';

    public $timestamps = true;

    protected $fillable = [
        "to",
        "from",
        "cc",
        "bcc",
        "title",
        "type",
        "type_record_id",
        "body",
        "attachments",
        "sent",
    ];

    protected $guarded = ['id'];




}