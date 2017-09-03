<?php

namespace App\Http\Controllers;

use app\Helpers\HTMLSnippet;
use App\Models\InternInternship;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


	/**
	 * Return HTML code for ajax refresh
	 * @param Request $request
	 * @return string
	 */
	public function ajaxGetAssignmentToSubmit(Request $request)
	{

		$internship = InternInternship::find($request->internship_id);
		if(!is_null($internship))
		{
			$internship = $internship->load('application', 'journals', 'reflection', 'siteEvaluation');

		}
		else
		{
			return 'So such Internship';
		}

		// hasMany, so no need to use get()
		$journals = $internship->journals
			->where('intern_journal_submitted_on', NULL);
		// hasOne, so get() is necessary, or only returns a Builder instead of a collection
		// AND has to add filter of internship_id, or it will return all unsubmitted assignment of all internships
		$reflection = $internship->reflection
			->where('intern_reflection_submitted_on', NULL)
			->where('internship_id', $request->internship_id)
			->get();
		$site_evaluation = $internship->siteEvaluation
			->where('intern_site_evaluation_submitted_on', NULL)
			->where('internship_id', $request->internship_id)
			->get();



		if($reflection->isEmpty())
		{
			$reflection = NULL;
		}
		else
		{
			$reflection = $reflection[0];
		}

		if($site_evaluation->isEmpty())
		{
			$site_evaluation = NULL;
		}
		else
		{
			$site_evaluation = $site_evaluation[0];
		}

		$assignments = $this->packAssignments(compact('journals', 'reflection', 'site_evaluation'));

		return $assignments;
	}


	/*
	 * helpers
	 */
	public function packAssignments(array $assignment_items = [])
	{
		$assignments = '';
		foreach ($assignment_items as $type => $item)
		{
			$assignments .= HTMLSnippet::generateAssignmentItemCollapsePanel($type, $item);
		}

		return $assignments;
	}


	public function getColumnsForDataTables()
	{
		$objects_array = [];
		foreach ($this->fields_titles as $field => $title)
		{
			$object = [
				'title' => $title,
				'column' => [
					'data' => $field,
					'name' => $field
				]
			];
			$objects_array[] = $object;
		}

		return json_encode($objects_array);
	}
}
