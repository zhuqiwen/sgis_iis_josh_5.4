<?php

namespace App\Http\Controllers;



use app\Helpers\HTMLSnippet;
use App\Models\Notifications;
use App\Models\ScholarshipApplicationDean;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Datatables;

class ScholarshipDeanController extends Controller
{
    public function adminCardIndexSubmittedApplications()
    {
        $applications = new ScholarshipApplicationDean();
        $applications = $applications->with([
            'recommendationPortal',
            'internshipApplication',
            'internshipApplication.applicant',
            'internshipApplication.organization',
            'internshipApplication.supervisor',
            ]);
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
            $cards .= HTMLSnippet::generateDeanScholarshipApplicationFloatCardWithModal($application);
        }
        return $cards;
    }


    public function generatePackageEmail($application_id)
    {

        $application = ScholarshipApplicationDean::with([
            'recommendationPortal',
            'internshipApplication',
            'internshipApplication.applicant',
            'internshipApplication.organization',
            'internshipApplication.supervisor',
        ])->find($application_id);

        $transcript_file = $application->transcript_file_name;
        $acceptance_file = $application->accept_letter_file_name;
        $recommendation_file = $application->recommendation_file_name;

        //generate internship detail pdf
        $pdf = new PDFController();
        $view = 'admin.scholarships.dean.partials.internship_details';
        $internship = $application->internshipApplication;
        $organization = $application->internshipApplication->organization;
        $supervisor = $application->internshipApplication->supervisor;
        $applicant = $application->internshipApplication->applicant;

        $data = compact('internship', 'organization', 'supervisor', 'applicant');
        $internship_details_file = 'internship_details.pdf';
        $user_folder_name = $applicant->first_name . '_' . $applicant->last_name . '_' . $applicant->iuid;
        $path = config('constants.scholarship_file_path.dean_scholarship') . $user_folder_name;

        if($pdf->generateAndSavePDF($view, $data, $path, $internship_details_file))
        {
            $internship_details_file = $path . '/' . $internship_details_file;
            $files = compact('transcript_file', 'acceptance_file', 'recommendation_file', 'internship_details_file');


            $package_file_name = $pdf->mergeAndSavePDFs($files, $path);

            $application->package_file_name = $package_file_name;
            $application->save();

            //generate a notification record
            $to = config('constants.notification_emails.dean_scholarship.to_committee.to');
            $body = config('constants.notification_emails.dean_scholarship.to_committee.body');
            $from = Sentinel::getUser()->email;
            $type = config('constants.email_notification_types.dean_scholarship_application');
            $type_record_id = $application->id;
            $attachments = $package_file_name;
            $data = compact('to', 'from', 'body', 'type', 'type_record_id', 'attachments');
            $notification = Notifications::create($data);



            return view('admin.notification_emails.scholarships.dean.to_committee.package_email')
                ->withNotification($notification)
                ->withEditable(True);


        }

        return 'ooops.....';





    }






    //



}
