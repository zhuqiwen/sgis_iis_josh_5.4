<?php

namespace App\Http\Controllers;



use App\Models\Scholarship;
use App\Models\ScholarshipCriteria;
use App\Models\ScholarshipEligibility;
use App\Models\ScholarshipMaterial;
use App\Models\ScholarshipProcess;
use App\Models\ScholarshipRequirement;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
			'material',
			'process',
			'requirement',
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
		$request->request->add(['scholarship_admin' => $request->user()->id]);
		$scholarship = Scholarship::create($request->all());

		if($request->criteria_content)
		{
			$scholarship->criteria()->create($request->all());
		}

		if($request->eligibility_order)
		{
			$items = [];
			foreach($request->eligibility_order as $order)
			{
				$items[] = [
					// original order starts from 0
					'eligibility_order' => $order + 1,
					'eligibility_item' => $request->eligibility_item[$order],
				];
			}

			$scholarship->eligibility()->createMany($items);
		}


		if($request->material_order)
		{
			$items = [];
			foreach($request->material_order as $order)
			{
				$items[] = [
					// original order starts from 0
					'material_order' => $order + 1,
					'material_item' => $request->material_item[$order],
				];
			}

			$scholarship->material()->createMany($items);
		}

		if($request->process_order)
		{
			$items = [];
			foreach($request->process_order as $order)
			{
				$items[] = [
					// original order starts from 0
					'process_order' => $order + 1,
					'process_item' => $request->process_item[$order],
				];
			}

			$scholarship->process()->createMany($items);
		}

		if($request->requirement_order)
		{
			$items = [];
			foreach($request->requirement_order as $order)
			{
				$items[] = [
					// original order starts from 0
					'requirement_order' => $order + 1,
					'requirement_item' => $request->requirement_item[$order],
				];
			}

			$scholarship->requirement()->createMany($items);
		}

		return $request->all();
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
		Scholarship::where('id', $id)
			->update($request->except([
				'criteria_id',
				'criteria_content',
				'eligibility_id',
				'eligibility_item',
				'material_id',
				'material_item',
				'process_id',
				'process_item',
				'requirement_id',
				'requirement_item',
			]));

		ScholarshipCriteria::where('id', $request->criteria_id)
			->update([
				'criteria_content' => $request->criteria_content,
			]);

		if($request->eligibility_id && $request->eligibility_item)
		{
			foreach($request->eligibility_id as $index => $record_id)
			{
				ScholarshipEligibility::where('id', $record_id)
					->update([
						'eligibility_item' => $request->eligibility_item[$index]
					]);
			}
		}


		if($request->material_id && $request->material_item)
		{
			foreach($request->material_id as $index => $record_id)
			{
				ScholarshipMaterial::where('id', $record_id)
					->update([
						'material_item' => $request->material_item[$index]
					]);
			}
		}

		if($request->process_id && $request->process_item)
		{
			foreach($request->process_id as $index => $record_id)
			{
				ScholarshipProcess::where('id', $record_id)
					->update([
						'process_item' => $request->process_item[$index]
					]);
			}
		}

		if($request->requirement_id && $request->requirement_item)
		{
			foreach($request->requirement_id as $index => $record_id)
			{
				ScholarshipRequirement::where('id', $record_id)
					->update([
						'requirement_item' => $request->requirement_item[$index]
					]);
			}
		}

		return response($request->all());
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
