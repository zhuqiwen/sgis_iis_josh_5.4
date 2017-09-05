<?php

namespace App\Http\Controllers;

use App\Models\AlumEngagementIndicator;
use Illuminate\Http\Request;
use Datatables;

class AlumEngagementIndicatorController extends Controller
{

	protected $fields_titles = [
		"id" => "ID",
		"engagement_indicator_name" => "Engagement Indicator",
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
            ->withPageTitle('Alumni Engagement Indicators')
            ->withPageSpecificJs(asset('assets/js/pages/admin/alum_engagement_indicators/alumni_engagement_indicators.js'));

    }

	public function data()
	{
		$records = AlumEngagementIndicator::get(['id','engagement_indicator_name']);

		return  Datatables::of($records)
			->add_column('edit', '<a class="edit" href="javascript:;">Edit</a>')
			->rawColumns(['edit'])
			->make(true);

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
	    return AlumEngagementIndicator::create($request->all());
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
        return AlumEngagementIndicator::where('id', $id)
	        ->update($request->except('_token'));

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
