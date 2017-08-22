<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class InternSiteEvaluation
 */
class InternSiteEvaluation extends Model
{
    protected $table = 'intern_site_evaluations';

    public $timestamps = true;

    protected $fillable = [
        'internship_id',
        'how_did_locate',
        'site_description',
        'task_description',
        'fit_into_study',
        'site_strength',
        'site_weakness',
        'gained_skills',
        'brief_comment',
        'willing_to_recommend',
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