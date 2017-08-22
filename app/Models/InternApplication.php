<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

/**
 * Class InternApplication
 */
class InternApplication extends Model
{
    protected $table = 'intern_applications';

    public $timestamps = true;

    protected $fillable = [
	    "intern_application_year",
	    "intern_application_term",
	    "intern_application_country",
	    "intern_application_state",
	    "intern_application_city",
	    "intern_application_street",
	    "intern_application_credit_hours",
	    "intern_application_budget_airfare",
	    "intern_application_budget_housing",
	    "intern_application_budget_meals",
	    "intern_application_budget_transportation",
	    "intern_application_budget_others",
	    "intern_application_depart_date",
	    "intern_application_return_date",
	    "intern_application_start_date",
	    "intern_application_end_date",
	    "intern_application_work_hours_per_week",
	    "intern_application_work_schedule",
	    "intern_application_description",
	    "intern_application_reasons",
	    "intern_application_cultural_interaction",
	    "intern_application_challenges",
	    "user_id",
	    "intern_organization_id",
	    "intern_supervisor_id",
	    "intern_application_paid_internship",
	    "intern_application_approved_date",
	    "intern_application_approved_by",
	    "intern_application_submitted_date",
	    "intern_application_submitted_by",
//	    "country_warning_id",
    ];

    protected $guarded = ['id'];


	use SoftDeletes;

	protected $dates = ['deleted_at'];

	/*
	 * relations
	 */
	public function applicant()
	{
		return $this->belongsTo('App\User', 'user_id');
	}

	public function submitter()
	{
		return $this->belongsTo('App\User', 'intern_application_submitted_by');
	}

	public function approvedBy()
	{
		return $this->belongsTo('App\User', 'intern_application_approved_by');
	}

	public function organization()
	{
		return $this->belongsTo('App\Models\InternOrganization', 'intern_organization_id');
	}

	public function supervisor()
	{
		return $this->belongsTo('App\Models\InternSupervisor', 'intern_supervisor_id');
	}

	public function internship()
	{
		return $this->hasOne('App\Models\InternInternship', 'application_id');
	}


	/*
	 * data retrievers
	 */

	public function getSubmittedApplicationsByApplicantId($user_id)
	{
		return $this->where('user_id', $user_id)
			->whereNotNull('intern_application_submitted_date')
			->whereNotNull('intern_application_submitted_by')
			->whereNull('deleted_at')
			->whereNull('intern_application_approved_by')
			->whereNull('intern_application_approved_date')
			->get();

	}

	public function getApprovedApplicationsByApplicantId($applicant_id)
	{
//		$options = [
//			'intern_application_submitted_date NOT NULL',
//			'intern_application_submitted_by NOT NULL',
//			'intern_application_approved_by NOT NULL',
//			'intern_application_approved_date NOT NULL',
//		];
		return $this->where('user_id', $applicant_id)
			->whereNotNull('intern_application_submitted_date')
			->whereNotNull('intern_application_submitted_by')
			->whereNull('deleted_at')
			->whereNotNull('intern_application_approved_by')
			->whereNotNull('intern_application_approved_date')
			->get();

//		return $this->getApplicationsByApplicantId($applicant_id, $options)->get();

	}

	public function getFinishedApplicationByApplicantId($applicant_id)
    {
        $approved_applications = $this->getApprovedApplicationsByApplicantId($applicant_id);
        $today = Carbon::now(config('current_time_zone'))->toDateString();
        return $approved_applications->where('intern_end_date', '<', $today)->all();
    }

	//
	public function getApplicationsByApplicantId($applicant_id, array $options = [])
	{
		$applications = $this->where('user_id', $applicant_id)
			->whereNull('deleted_at');
		for($i = 0; $i < sizeof($options); $i++)
		{
			$applications = $applications->where($options[$i]);
		}

		return $applications->get();
	}

    public function getSubmittedApplications()
    {
        return $this->whereNotNull('intern_application_submitted_date')
            ->whereNotNull('intern_application_submitted_by')
            ->whereNull('deleted_at')
            ->whereNull('intern_application_approved_by')
            ->whereNull('intern_application_approved_date')
            ->get()
            ->load('applicant');
	}


    public function approveApplication(Request $request)
    {
        //update application
        $approved_application = $this->find($request->application_id);
        $approved_application->intern_application_approved_date = Carbon::now(config('current_time_zone'))->toDateString();
                // for test only
        $approved_application->intern_application_approved_by = $request->user_id;
//        $approved_application->intern_application_approved_by = $request->user()->id;
        $approved_application->save();

        // create or update associated internship
        $internship = InternInternship::updateOrCreate(
            [
                'application_id' => $approved_application->id,
            ],
            [
                'intern_internship_application_approval_notes' => $request->intern_internship_application_approval_notes,
                'intern_internship_x373_hours' => $approved_application->intern_application_credit_hours,
            ]
        );

        // prepare for itnernship assignments creations
        $journal_interval = config('journal_interval');
        $journal_buffer = config('journal_buffer');
        $reflection_buffer = config('reflection_buffer');
        $site_evaluation_buffer = config('site_evaluation_buffer');
        $student_evaluation_buffer = config('student_evaluation_buffer');

        $start_date = Carbon::createFromFormat('YYYY-MM-DD', $approved_application->start_date);
        $end_date = Carbon::createFromFormat('YYYY-MM-DD', $approved_application->end_date);

        $internship_duration = $start_date->copy()->diffInDays($end_date);
        $num_journals = $internship_duration / $journal_interval;

        // create journal stubs
        for($i = 0; $i < $num_journals; $i++)
        {
            $journal = InternJournal::create([
                'internship_id' => $internship->id,
                'intern_journal_serial_num' => $i + 1,
                'intern_journal_required_total_num' => $num_journals,
                'intern_journal_due_date' => $end_date->copy()->addDays($journal_buffer),
            ]);
        }

        // create reflection stub
        $reflection = InternReflection::create([
            'internship_id' => $internship->id,
            'intern_reflection_due_date' => $end_date->copy()->addDays($reflection_buffer),
        ]);


        // create site eval stub
        $site_evaluation = InternSiteEvaluation::create([
            'internship_id' => $internship->id,
            'intern_site_evaluation_due_date' => $end_date->copy()->addDays($site_evaluation_buffer),
        ]);


        // create student eval stub
        $student_evaluation = InternStudentEvaluation::create([
            'internship_id' => $internship->id,
            'intern_student_evaluation_due_date' => $end_date->copy()->addDays($student_evaluation_buffer),
        ]);




	}
}