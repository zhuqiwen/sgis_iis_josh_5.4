<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class InternStudentEvaluation
 */
class InternStudentEvaluation extends Model
{
    protected $table = 'intern_student_evaluations';

    public $timestamps = true;

    protected $fillable = [
	    "internship_id",
	    "intern_student_evaluation_performance_comment",
	    "intern_student_evaluation_has_noteworthy",
	    "intern_student_evaluation_noteworthy_aspects",
	    "intern_student_evaluation_need_improve",
	    "intern_student_evaluation_student_weakness",
	    "intern_student_evaluation_weakness_remedy",
	    "intern_student_evaluation_suitability",
	    "intern_student_evaluation_job_advice",
	    "intern_student_evaluation_performance_rating",
	    "intern_student_evaluation_development_rating",
	    "intern_student_evaluation_is_midterm",
	    "intern_student_evaluation_due_date",
	    "intern_student_evaluation_submitted_on",
	    "intern_student_evaluation_request_sent_on",
	    "intern_student_evaluation_request_sent_by",

    ];

	protected $guarded = ['id'];

	use SoftDeletes;
	protected $dates = ['deleted_at'];


    public function getAvailable($internship_id)
    {
        return $this->where('internship_id', $internship_id)
            ->whereNull('submitted_at')
            ->get();
    }
}