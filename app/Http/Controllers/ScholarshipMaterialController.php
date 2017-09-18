<?php

namespace App\Http\Controllers;

use App\Models\ScholarshipMaterial;
use Illuminate\Http\Request;

class ScholarshipMaterialController extends Controller
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
	    $material = ScholarshipMaterial::where('scholarship_id', $request->scholarship_id)
		    ->orderBy('material_order', 'desc')
		    ->first();
	    if($material)
	    {
		    $highest_order = $material->material_order;
	    }
	    else
	    {
		    $highest_order = 0;
	    }

	    $highest_order++;

	    return ScholarshipMaterial::create([
		    "scholarship_id" => $request->scholarship_id,
		    "material_order" => $highest_order,
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
	    $material = ScholarshipMaterial::find($id);
	    if($material)
	    {
		    $material->delete();
	    }
	    return response($id . ' has been deleted');

    }
}
