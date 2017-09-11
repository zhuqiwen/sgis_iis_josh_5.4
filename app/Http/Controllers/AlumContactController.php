<?php

namespace App\Http\Controllers;

use App\Models\AlumContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Datatables;

class AlumContactController extends Controller
{

	protected $fields_titles = [
		"id" =>  "ID",
		"contact_salutation" => "Salutation",
		"contact_first_name" => "First Name",
		"contact_middle_name" => "Middle Name",
		"contact_last_name" => "Last Name",
		"contact_age_group" => "Age Group",
		"contact_email" => "Email",
		"contact_phone_home" => "Phone (home)",
		"contact_phone_mobile" => "Phone (mobile)",
		"contact_country" => "Country",
		"contact_state" => "State/Province",
		"contact_city" => "City",
		"contact_line1" => "Street Line 1",
		"contact_line2" => "Street Line 2",
		"contact_zip" => "Zip Code",
		"contact_no_email" => "No Email",
		"contact_no_phone_call" => "No Phone Call",
		"contact_no_mail" => "No Mail",
		"contact_iuaa_member" => "IUAA Member",
		"contact_share_with_iuaa" => "Share With IUAA",
		"event_titles" => "Events",
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
            ->withPageTitle('Alumni Contacts')
            ->withPageSpecificJs(asset('assets/js/pages/admin/alum_contacts/alumni_contacts.js'));



    }

	public function data()
	{


//		$display_fields = array_keys($this->fields_titles);


		$age_groups = config('constants.tables.alum_contacts.age_groups');
		$age_group_frequency = [];
		foreach ($age_groups as $age_group)
		{
			$age_group_frequency[$age_group] = AlumContact::whereNull('deleted_at')
				->where('contact_age_group', $age_group)->count();
		}
		$num_active_contacts = AlumContact::whereNull('deleted_at')->count('id');



		$records = AlumContact::with([
			'events',
//			'employments',
//			'socialAccounts',
//			'donations',
//			'engagementIndicators',
		]);
//			->get($display_fields);
//			->get();

		return  Datatables::of($records)
			->add_column('edit', '<a class="edit" href="javascript:;">Edit</a>')
			->with(compact('age_group_frequency', 'num_active_contacts'))
			->rawColumns(['edit'])
			->make(true);

	}


	protected function getDisplayFieldsForDataTables()
	{
		$all_fields = Schema::getColumnListing('alum_contacts');
		$remove_fields = [
			"created_at",
			"updated_at",
			"deleted_at",
		];
		return array_diff($all_fields, $remove_fields);
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
        return AlumContact::create($request->all());
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
	    return AlumContact::where('id', $id)
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
