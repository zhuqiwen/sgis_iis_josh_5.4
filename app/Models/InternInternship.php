<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class InternInternship
 */
class InternInternship extends Model
{
    protected $table = 'intern_internships';

    public $timestamps = true;

    protected $fillable = [
	    "application_id",
	    "intern_internship_application_approval_notes",
	    "intern_internship_final_notes",
	    "intern_internship_x373_hours",
	    "intern_internship_x373_grade",
	    "intern_internship_case_closed_date",
	    "intern_internship_closed_by",
    ];

    protected $guarded = ['id'];

	use SoftDeletes;

	protected $dates = ['deleted_at'];


	public function application()
	{
		return $this->belongsTo('App\Models\InternApplication', 'application_id');
	}

	public function closedBy()
	{
		return $this->belongsTo('App\User', 'intern_internship_closed_by');
	}

    public function journals()
    {
        return $this->hasMany('App\Models\InternJournal', 'internship_id');
	}

    public function reflection()
    {
        return $this->hasOne('App\Models\InternReflection', 'internship_id');
    }

    public function siteEvaluation()
    {
        return $this->hasOne('App\Models\InternSiteEvaluation', 'internship_id');
    }

    public function studentEvaluations()
    {
        return $this->hasMany('App\Models\InternStudentEvaluation', 'internship_id');
    }




	public function getFinishedInternshipsByApplicantId($applicant_id)
    {
        $applications = new InternApplication();
        $finishend_applications = $applications->getFinishedApplicationByApplicantId($applicant_id);
        $application_ids = [];
        foreach ($finishend_applications as $application)
        {
            $application_ids[] = $application->id;
        }

        return $this->whereIn('application_id', $application_ids)
            ->get()
            ->load('journals', 'reflection', 'siteEvaluation', 'studentEvaluation');


    }

	public function getApprovedNotClosedInternshipsByApplicantId($applicant_id)
	{
		$applications = new InternApplication();
		$applications = $applications->getApprovedApplicationsByApplicantId($applicant_id);

		$approved_application_ids = [];
		foreach ($applications as $application)
		{
			array_push($approved_application_ids, $application->id);
		}

		return $this->whereIN('application_id', $approved_application_ids)
			//closed internships do not qualify
			->whereNULL('intern_internship_case_closed_date')
			->whereNULL('intern_internship_closed_by')
			->get()
			->load('application', 'journals', 'reflection', 'siteEvaluation')
			->keyBy('id')->all();
    }


	/**
	 * @param boolean $closed
	 * true: finished and closed internships
	 * false: finished and unclosed internships
	 * @return mixed
	 *
	 */
    public function getFinishedInternshipsClosed($closed)
    {
	    $days_buffer = config('constants.internship_close_buffer');
	    $today = Carbon::now(config('constants.current_time_zone'));
	    $end_date = $today->copy()->subDays($days_buffer);

	    if($closed)
	    {
		    $internships = InternInternship::whereNotNull('intern_internship_case_closed_date')
			    ->whereNotNull('intern_internship_closed_by');
	    }
	    else
	    {
		    $internships = InternInternship::whereNull('intern_internship_case_closed_date')
			    ->whereNull('intern_internship_closed_by');
	    }

	    return $internships->get()
		    ->load('application', 'journals', 'reflection', 'siteEvaluation', 'studentEvaluations')
		    ->where('application.intern_application_end_date', '<', $end_date);
    }

	/**
	 * @return mixed
	 * return finished and closed internships
	 */
	public function getFinishedClosedInternships()
	{
		return $this->getFinishedInternshipsClosed(true);
    }

    /**
     * @return Eloquent collection
     * return finished and unclosed internships
     * all:[]
     */
    public function getFinishedUnclosedInternships()
    {
	    return $this->getFinishedInternshipsClosed(false);
    }

	/**
	 * @param boolean $assignment_incomplete
	 * $assignment_incomplete = true
	 *  returns internships with at 1 assignment not submitted
	 * $assignment_incomplete = false
	 *  return internships with all assignment submitted
	 * @return mixed
	 */
    public function getFinishedUnclosedInternshipsWithAssignmentStatus($assignment_incomplete)
    {
        $finished_unclosed = $this->getFinishedUnclosedInternships();

	    return $finished_unclosed->filter(function($internship) use ($assignment_incomplete){
		    // check if any journal is missing
		    foreach ($internship->journals as $journal)
		    {
			    if($journal->intern_journal_submitted_on == null)
			    {
				    return $assignment_incomplete;
			    }
		    }

		    // check if any student evaluation is missing
		    foreach ($internship->studentEvaluations as $studentEvaluation)
		    {
			    if($studentEvaluation->intern_student_evaluation_submitted_on == null)
			    {
				    return $assignment_incomplete;
			    }
		    }

		    if($internship->reflection->intern_reflection_submitted_on == null)
		    {
			    return $assignment_incomplete;
		    }

		    if($internship->siteEvaluation->intern_site_evaluation_submitted_on == null)
		    {
			    return $assignment_incomplete;
		    }

		    return !$assignment_incomplete;
	    });
    }

	/**
	 * @return mixed
	 * return all internships that are finished and unclosed on the day and with at leas one assignment not submitted
	 */
    public function getFinishedUnclosedInternshipsWithAssignmentIncomplete()
    {
	    return $this->getFinishedUnclosedInternshipsWithAssignmentStatus(true);
    }

	/**
	 * @return mixed
	 * return all finished and unclosed internships with all assignments submitted
	 */
    public function getFinishedUnclosedInternshipsWithAssignmentComplete()
    {
	    return $this->getFinishedUnclosedInternshipsWithAssignmentStatus(false);
    }




}