<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

/**
 * Class custom model
 */
class SgisModels extends Model
{

	public function ajaxUpdate(Request $request)
	{
		$this->find($request->record_id)->update($request->all());
	}

}