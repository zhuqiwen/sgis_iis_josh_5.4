<?php

use Illuminate\Database\Seeder;

use App\Models\AlumContact;
use App\Models\AlumContactSocialAccount;
use App\Models\AlumAcademicInfo;
use App\Models\AlumEmployer;
use App\Models\AlumEmployerType;
use App\Models\AlumEmployment;
use App\Models\AlumEngagementIndicator;
use App\Models\AlumEngagement;
use App\Models\AlumEvent;
use App\Models\AlumEventAttendance;
use App\Models\AlumStudyField;

class AlumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
	    AlumContact::truncate();
	    $this->command->info('alum contacts emptied successfully.');

	    AlumContactSocialAccount::truncate();
	    $this->command->info('alum contact social accounts emptied successfully.');

	    AlumAcademicInfo::truncate();
	    $this->command->info('alum academic info emptied successfully.');

	    AlumEmployerType::truncate();
	    $this->command->info('alum employer types emptied successfully.');

	    AlumEmployer::truncate();
	    $this->command->info('alum employers emptied successfully.');

	    AlumEmployment::truncate();
	    $this->command->info('alum employments emptied successfully.');

	    AlumEvent::truncate();
	    $this->command->info('alum events emptied successfully.');

	    AlumEventAttendance::truncate();
	    $this->command->info('alum event attendance emptied successfully.');

	    AlumEngagementIndicator::truncate();
	    $this->command->info('alum engagement indicators emptied successfully.');

	    AlumEngagement::truncate();
	    $this->command->info('alum engagements emptied successfully.');

	    AlumStudyField::truncate();
	    $this->command->info('alum study fields emptied successfully.');


	    // seeding independent tables
	    $num_contacts = random_int(100, 120);
	    $num_events = random_int(7, 12);
	    factory(AlumContact::class, $num_contacts)->create();
	    factory(AlumEvent::class, $num_events)->create();




	    // pivot tables for many to many

	    for($i = 1; $i < $num_contacts; $i++)
	    {
		    $contact = AlumContact::find($i);
		    for ($j = 1; $j < random_int(0, $num_events); $j++)
		    {
			    $contact->events()->attach($j);
		    }
	    }
    }
}
