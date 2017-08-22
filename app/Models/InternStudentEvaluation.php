<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class InternStudentEvaluation
 */
class InternStudentEvaluation extends Model
{
    protected $table = 'intern_student_evaluations';

    public $timestamps = true;

    protected $fillable = [
        'internship_id',
        'performance_comment',
        'has_noteworthy',
        'noteworthy_aspects',
        'need_improve',
        'student_weakness',
        'weakness_remedy',
        'suitability',
        'job_advice',
        'performance_rating',
        'development_rating',
        'is_midterm',
        'due_date',
        'submitted_at',
        'sent_at',
    ];

    protected $guarded = [];


    public function getAvailable($internship_id)
    {
        return $this->where('internship_id', $internship_id)
            ->whereNull('submitted_at')
            ->get();
    }
}