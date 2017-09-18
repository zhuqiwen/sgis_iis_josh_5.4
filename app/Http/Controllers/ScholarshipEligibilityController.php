<?php

namespace App\Http\Controllers;

use App\Models\ScholarshipEligibility;
use Illuminate\Http\Request;

class ScholarshipEligibilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
	    $eligibility = ScholarshipEligibility::where('scholarship_id', $request->scholarship_id)
		    ->orderBy('eligibility_order', 'desc')
		    ->first();
	    if($eligibility)
	    {
		    $highest_order = $eligibility->eligibility_order;
	    }
	    else
	    {
		    $highest_order = 0;
	    }

	    $highest_order++;

	    return ScholarshipEligibility::create([
		    "scholarship_id" => $request->scholarship_id,
		    "eligibility_order" => $highest_order,
	    ]);

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
        //

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
	    $eligibility = ScholarshipEligibility::find($id);
	    if($eligibility)
	    {
		    $eligibility->delete();
	    }

	    return response($id . ' has been deleted');
    }
}
