<?php

namespace App\Http\Controllers;



use App\Models\Scholarship;
use App\Models\ScholarshipCriteria;
use App\Models\ScholarshipEligibility;
use App\Models\ScholarshipMaterial;
use App\Models\ScholarshipProcess;
use App\Models\ScholarshipRequirement;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Datatables;

class ScholarshipController extends Controller
{
    public function frontendIndex()
    {
        return view('frontend.scholarships.index');
    }

	public function applicationForm($scholarship_name)
	{

		$view = 'frontend.scholarships.application_forms.' . $scholarship_name;
		return view($view);
    }




	protected $fields_titles = [
		"id" => "ID",
		"scholarship_introduction" => "Introduction",
		"scholarship_award_amount" => "Award",
		"scholarship_admin" => "Managed by",
		"scholarship_deadline" => "Deadline",
	];



	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		//
		return view('admin.alumni.independent_tables.independent_table')
			->withPageTitle('Scholarships')
			->withPageSpecificJs(asset('assets/js/pages/admin/scholarships/scholarships.js'));



	}

	public function data()
	{

		$records = Scholarship::with([
			'criteria',
			'eligibility',
			'materials',
			'process',
			'requirements',
		]);


		return  Datatables::of($records)
			->add_column('edit', '<a class="edit" href="javascript:;">Edit</a>')
			->rawColumns(['edit'])
			->make(true);

	}


	protected function getDisplayFieldsForDataTables()
	{
		$all_fields = Schema::getColumnListing('scholarship_masters');
		$remove_fields = [
			"created_at",
			"updated_at",
			"deleted_at",
		];
		return array_diff($all_fields, $remove_fields);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		//
	}
}
