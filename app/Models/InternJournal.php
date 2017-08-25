<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

/**
 * Class InternJournal
 */
class InternJournal extends SgisModels
{
    protected $table = 'intern_journals';

    public $timestamps = true;

    protected $fillable = [
	    "internship_id",
	    "intern_journal_content",
	    "intern_journal_serial_num",
	    "intern_journal_required_total_num",
	    "intern_journal_due_date",
	    "intern_journal_submitted_on",

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