<?php namespace App;
use Cartalyst\Sentinel\Users\EloquentUser;
use Illuminate\Database\Eloquent\SoftDeletes;


class User extends EloquentUser {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes to be fillable from the model.
	 *
	 * A dirty hack to allow fields to be fillable by calling empty fillable array
	 *
	 * @var array
	 */
	protected $fillable = [];
	protected $guarded = ['id'];
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

	/**
	* To allow soft deletes
	*/
	use SoftDeletes;

    protected $dates = ['deleted_at'];


	public function InternshipApplications()
	{
		return $this->hasMany('App\Models\InternApplication', 'user_id');
	}

	public function approvedInternshipApplications()
	{
		return $this->hasMany('App\Models\InternApplication', 'intern_application_approved_by');
	}

	public function closedInternships()
	{
		return $this->hasMany('App\Models\InternInternships', 'intern_internship_closed_by');
	}
}
