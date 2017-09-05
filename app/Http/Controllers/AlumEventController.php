<?php

namespace App\Http\Controllers;

use App\Models\AlumEvent;
use Illuminate\Http\Request;
use Datatables;

class AlumEventController extends Controller
{

	protected $fields_titles = [
		"id" => "ID",
		"event_name" => "Event",
		"event_date" => "Date",
		"event_country" => "Country",
		"event_state" => "State/Province",
		"event_city" => "City",
		"event_location" => "Location",
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
            ->withPageTitle('Alumni Events')
            ->withPageSpecificJs(asset('assets/js/pages/admin/alum_events/alumni_events.js'));

    }

	public function data()
	{
		$records = AlumEvent::get([
		    'id',
            'event_name',
            'event_date',
            'event_country',
            'event_state',
            'event_city',
            'event_location',
        ]);

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
	    return AlumEvent::create($request->all());
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
        return AlumEvent::where('id', $id)
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
