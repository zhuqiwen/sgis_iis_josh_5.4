<?php

use Illuminate\Database\Seeder;

use App\Models\Scholarship;
use App\Models\ScholarshipCriteria;
use App\Models\ScholarshipEligibility;
use App\Models\ScholarshipMaterial;
use App\Models\ScholarshipProcess;
use App\Models\ScholarshipRequirement;


class ScholarshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
	    Scholarship::truncate();
	    $this->command->info('scholarship table emptied successfully.');

	    ScholarshipCriteria::truncate();
	    $this->command->info('scholarship_criteria table emptied successfully.');

	    ScholarshipEligibility::truncate();
	    $this->command->info('scholarship_eligibility table emptied successfully.');

	    ScholarshipMaterial::truncate();
	    $this->command->info('scholarship_materials table emptied successfully.');

	    ScholarshipProcess::truncate();
	    $this->command->info('scholarship_process table emptied successfully.');

	    ScholarshipRequirement::truncate();
	    $this->command->info('scholarship_requirements table emptied successfully.');



	    // seeding independent tables
	    $num_scholarships = 5;

	    factory(Scholarship::class, $num_scholarships)->create()
		    ->each(function ($s){
		    	//criteria
			    factory(ScholarshipCriteria::class)->create(['scholarship_id' => $s->id]);

			    //eligibility
			    for($i = 1 ; $i <= random_int(1, 5); $i++)
			    {
				    factory(ScholarshipEligibility::class)->create([
				    	'eligibility_order' => $i,
				    	'scholarship_id' => $s->id,
					    ]);
			    }
			    //material
			    for($i = 1 ; $i <= random_int(1, 5); $i++)
			    {
				    factory(ScholarshipMaterial::class)->create([
					    'material_order' => $i,
					    'scholarship_id' => $s->id,
				    ]);
			    }
			    //process
			    for($i = 1 ; $i <= random_int(1, 5); $i++)
			    {
				    factory(ScholarshipProcess::class)->create([
					    'process_order' => $i,
					    'scholarship_id' => $s->id,
				    ]);
			    }
			    //requirement
			    for($i = 1 ; $i <= random_int(1, 5); $i++)
			    {
				    factory(ScholarshipRequirement::class)->create([
					    'requirement_order' => $i,
					    'scholarship_id' => $s->id,
				    ]);
			    }
		    });


    }
}
