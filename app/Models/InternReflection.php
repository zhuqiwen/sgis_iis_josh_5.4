<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class InternReflection
 */
class InternReflection extends SgisModels
{
    protected $table = 'intern_reflections';

    public $timestamps = true;

    protected $fillable = [
	    "internship_id",
	    "intern_reflection_content",
	    "intern_reflection_due_date",
	    "intern_reflection_submitted_on",

    ];

    protected $guarded = ['id'];

	use SoftDeletes;

	protected $dates = ['deleted_at'];


    public function getAvailable($internship_id)
    {
        return $this->where('internship_id', $internship_id)
            ->whereNull('submitted_at')
            ->get();
    }
}