<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class InternJournal
 */
class InternJournal extends Model
{
    protected $table = 'intern_journals';

    public $timestamps = true;

    protected $fillable = [
        'internship_id',
        'journal',
        'serial_num',
        'required_total_num',
        'due_date',
        'submitted_at'
    ];

    protected $guarded = [];

    public function getAvailable($internship_id)
    {
        return $this->where('internship_id', $internship_id)
            ->whereNull('submitted_at')
            ->get();
    }
        
}