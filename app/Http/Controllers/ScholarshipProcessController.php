<?php

namespace App\Http\Controllers;

use App\Models\ScholarshipProcess;
use Illuminate\Http\Request;

class ScholarshipProcessController extends Controller
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
	    $process = ScholarshipProcess::where('scholarship_id', $request->scholarship_id)
		    ->orderBy('process_order', 'desc')
		    ->first();
	    if($process)
	    {
		    $highest_order = $process->process_order;
	    }
	    else
	    {
		    $highest_order = 0;
	    }

	    $highest_order++;

	    return ScholarshipProcess::create([
		    "scholarship_id" => $request->scholarship_id,
		    "process_order" => $highest_order,
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
	    $process = ScholarshipProcess::find($id);
	    if($process)
	    {
		    $process->delete();
	    }
	    return response($id . ' has been deleted');

    }
}
