<?php

namespace App\Http\Controllers;



use app\Helpers\HTMLSnippet;
use App\Models\ScholarshipApplicationDean;
use Datatables;

class ScholarshipDeanController extends Controller
{
    public function adminCardIndexSubmittedApplications()
    {
        $applications = new ScholarshipApplicationDean();
        $applications = $applications->with(['internshipApplication', 'internshipApplication.applicant']);
        $submitted_applications = $applications->where('forward_to_committee', 0)->get();
        $forwarded_applications = $applications->where('forward_to_committee', 1)->get();
//
        $submitted_application_cards = $this->getApplicationCards($submitted_applications);
        $forwarded_application_cards = $this->getApplicationCards($forwarded_applications);


        return view('admin.scholarships.dean.float_card_view.submitted_applications')
            ->withSubmittedApplicationCards($submitted_application_cards)
            ->withForwardedApplicationCards($forwarded_application_cards);
    }


    public function getApplicationCards($applications)
    {
        $cards = '';
        foreach ($applications as $application)
        {
            $cards = HTMLSnippet::generateDeanScholarshipApplicationFloatCardWithModal($application);
        }
        return $cards;
    }






    //



}
