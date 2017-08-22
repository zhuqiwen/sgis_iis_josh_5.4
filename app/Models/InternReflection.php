<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class InternReflection
 */
class InternReflection extends Model
{
    protected $table = 'intern_reflections';

    public $timestamps = true;

    protected $fillable = [
        'internship_id',
        'reflection',
        'due_date',
        'submitted_at'
    ];

    protected $guarded = [];

	use SoftDeletes;

	protected $dates = ['deleted_at'];


    public function getAvailable($internship_id)
    {
        return $this->where('internship_id', $internship_id)
            ->whereNull('submitted_at')
            ->get();
    }
}