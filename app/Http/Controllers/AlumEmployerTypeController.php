<?php

namespace App\Http\Controllers;

use App\Models\AlumEmployerType;
use App\Models\AlumStudyField;
use Illuminate\Http\Request;
use Datatables;

class AlumEmployerTypeController extends Controller
{

	protected $fields_titles = [
		"id" => "ID",
		"employer_type" => "Employer Type",
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
            ->withPageTitle('Alumni Employer Types')
            ->withPageSpecificJs(asset('assets/js/pages/admin/alum_employer_types/alumni_employer_types.js'));

    }

	public function data()
	{
		$records = AlumEmployerType::get(['id','employer_type']);

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
	    return AlumEmployerType::create($request->all());
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
        return AlumEmployerType::where('id', $id)
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
