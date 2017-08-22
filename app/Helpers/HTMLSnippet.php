<?php
/**
 * Created by PhpStorm.
 * User: zqw
 * Date: 7/12/17
 * Time: 15:12
 */

namespace app\Helpers;

use Illuminate\Support\Facades\Auth;

class HTMLSnippet
{



    ////////////////////////////////////////////used by adminlte version//////////////////////////////////////////////////

    // tabs
    public static function generateProfileGroupTab($tab_name, $active = FALSE)
    {
        $original_tab_name = str_replace('_', ' ', $tab_name);
//		$tab_name = str_replace(' ', '_', $tab_name);


        if($active)
        {
            $li = '<li class="active">';
        }
        else
        {
            $li = '<li>';
        }
        return $li.'<a href="#'.$tab_name.'" data-toggle="tab">'.$original_tab_name.'</a></li>';
    }


    // float card with modal
    public static function generateApplicationFloatCardWithModal($application)
    {
        $modal = self::generateApplicationModal($application);
        $card = <<< EOF
		<div class="col-md-4 col-sm-12 col-lg-3" style="margin-bottom: 5%;">
            <a id="float-card" href="#" style="text-decoration: none" data-toggle="modal" data-target="#myModalApplicationId_$application->id">
                <div class="col-md-10 col-md-offset-1 float-card">
                    <div class="title" id="$application->id">
	                    <div class="row">
	                        <div class="col-md-9">
	                                <h4 id="applicant_name">
	                                    $application->last_name, $application->first_name
	                                    <br/><small>Application ID: $application->id</small>
	                                </h4>
	                        </div>
	                        <div id="iconCheck_$application->id" class="col-md-3 hide" style="margin-top:5%;">
	                            <i class="fa fa-check fa-2x"></i>
	                        </div>
	                    </div>
                    </div>
                    <hr style="color: black; background-color: black; height: 1px; margin: 0 0;">
                    <div class="text">
                        <div class="row">
	                        <div class="col-md-12">
		                        <p><strong>Internship Address:</strong></p>
		                        <p>$application->street, $application->city,</p>
		                        <p>$application->state, $application->country</p>
		                        <p><strong>Internship Organization:</strong></p>
		                        <p>$application->org_name</p>
		                        <p><strong>Internship Date:</strong></p>
		                        <p>From $application->start_date To $application->end_date</p>
		                    </div>
	                    </div>
                    </div>
                </div>
            </a>
            $modal
        </div>
EOF;
        return $card;


    }

    public static function generateInternshipFloatCardWithModal($internship)
    {
        $modal = self::generateInternshipModal($internship);
        $card = <<< EOF
		<div class="col-md-4" style="margin-bottom: 5%;">
            <a id="float_card_a" href="#" style="text-decoration: none" data-toggle="modal" data-target="#myModalInternshipId_$internship->internship_id">
                <div id="float-card" class="col-md-10 col-md-offset-1 float-card">
                    <div class="title" id="$internship->id">
	                    <div class="row">
	                        <div class="col-md-8">
	                                <h4 id="applicant_name">
	                                    $internship->last_name, $internship->first_name
	                                    <br/><small>Internship ID: $internship->internship_id</small>
	                                    <br/><small>Application ID: $internship->application_id</small>
	                                </h4>
	                        </div>
	                        <div id="iconCheck_$internship->id" class="col-md-4 hide" style="margin-top:5%;">
	                            <i class="fa fa-check fa-2x"></i>
	                        </div>
	                    </div>
                    </div>
                    <hr style="color: black; background-color: black; height: 1px; margin: 0 0;">
                    <div class="text">
                        <div class="row">
	                        <div class="col-md-12">
		                        <p><strong>Internship Address:</strong></p>
		                        <p id="address_$internship->internship_id">$internship->street, $internship->city,
		                        $internship->state, $internship->country</p>
		                        <p><strong>Internship Organization:</strong></p>
		                        <p>$internship->org_name</p>
		                        <p><strong>Internship Date:</strong></p>
		                        <p>From $internship->start_date To $internship->end_date</p>
		                    </div>
	                    </div>
                    </div>
                </div>
            </a>
            $modal

        </div>
EOF;
        return $card;


    }

    // modal
    private static function generateApplicationModal($application)
    {
        $modal =<<<EOF
			<div id="myModalApplicationId_$application->id" class="modal fade" role="dialog">
                <div class="modal-dialog" style="width: 80%;">
                      <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">$application->first_name $application->last_name 's Internship in $application->country</h4>
                                <p>$application->credit_hours Credit Hours Desired</p>
                            </div>
                            <div class="modal-body">
                                <div>
                                <h4>Internship Location: <small id="address_$application->id">$application->city, $application->state, $application->country</small></h4> 
                                <!--<img src="http://via.placeholder.com/800x300">-->
                                <div id="map_$application->id" style="height: 450px; width: 100%;"></div>
                                </div>
                                <hr>
                                <div>
                                $application->term, in $application->year<br>
                                plan to leave the States on $application->depart_date and return on $application->return_date<br>
                                The internship starts on $application->start_date and ends on $application->end_date<br>
                                </div>
                                <hr>
                                <div>
                                $application->description<br>
                                </div>
                                <hr>
                                <div>
                                $application->reasons<br>
                                </div>
                                <hr>
                                
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                <button id="$application->id" type="button" class="btn btn-info addToFolio" data-dismiss="modal">Select In To Approval Folio</button>
                                <button id="$application->id" type="button" class="btn btn-danger removeFromFolio" data-dismiss="modal">Remove From Approval Folio</button>
                            </div>
                      </div>

                </div>
            </div>

EOF;
        return $modal;


    }

    private static function generateInternshipModal($internship)
    {

        $accordion_journal = self::generateInternshipJournalOutsideAccordion($internship);
        $accordion_reflection = self::generateInternshipReflectionAccordion($internship);
        $accordion_site_evaluation = self::generateInternshipSiteEvaluationAccordion($internship);
        $accordion_student_evaluation = self::generateInternshipStudentEvaluationOutsideAccordion($internship);

        $form_sgis_opinion = self::generateInternshipSGISOpinionForm($internship);

        $modal =<<<EOF
			<div id="myModalInternshipId_$internship->internship_id" class="modal fade" role="dialog">
                <div class="modal-dialog">
                      <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">$internship->first_name $internship->last_name 's Internship in $internship->country</h4>
                                <p>$internship->year, $internship->term</p>
                            </div>
                            <div class="modal-body">
                                <div id="internship_details">
                                    <h4>Internship Details</h4>
                                   
                                    <div>
                                    <h4>Internship Location: <small>$internship->street, $internship->state, $internship->country</small></h4> 
                                    <div id="map_$internship->internship_id" style="height: 450px; width: 100%;"></div>
                                    </div>
                                    <div>
                                    $internship->term, in $internship->year<br>
                                    plan to leave the States on $internship->depart_date and return on $internship->return_date<br>
                                    The internship starts on $internship->start_date and ends on $internship->end_date<br>
                                    </div>
                                    <div>
                                    $internship->description<br>
                                    </div>
                                    <div>
                                    $internship->reasons<br>
                                    </div>
                                    <hr>
                                </div> 
                                <div id="internship_assignments">
                                    <div class="panel-group" id="accordion_$internship->internship_id">
                                        <h4>Internship Assignments</h4>
                                      $accordion_journal
                                      $accordion_reflection
                                      $accordion_site_evaluation
                                      $accordion_student_evaluation
                                      
                                    </div>
                                    <hr>
                                </div>
                                <div id="internship_for_sgis_use_only">
                                <h4>SGIS Opinions</h4>
                                $form_sgis_opinion
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                <button form="sgis_opinions_form" id="close_internship_$internship->internship_id" type="button" class="btn btn-info closeInternship" data-dismiss="modal">Close and Archive</button>
                            </div>
                      </div>
                </div>
            </div>

EOF;
        return $modal;


    }


    // tab list container
    public static function generateTabListContainer($grouped_profiles)
    {
        $cnt = 0;
        $tabs = '';
        $tab_panes = '';
        foreach($grouped_profiles as $tab_name => $profiles)
        {
            if ($cnt == 0)
            {
                //
                $tabs .= HTMLSnippet::generateProfileGroupTab($tab_name, TRUE);
                $tab_panes .=  '<div class="tab-pane fade in active" id="'.$tab_name.'">'
                    .'<div class="row">'
                    .'<div class="col-md-12">';
            }
            else
            {
                $tabs .= HTMLSnippet::generateProfileGroupTab($tab_name, FALSE);
                $tab_panes .= '<div class="tab-pane fade" id="'.$tab_name.'">'
                    .'<div class="row">'
                    .'<div class="col-md-12">';
            }


            // add cards
            foreach ($profiles as $key => $profile)
            {
                if($profile->profile_type == 'internship')
                {
                    $tab_panes .= HTMLSnippet::generateInternshipFloatCardWithModal($profile);
                }
                else
                {
                    $tab_panes .= HTMLSnippet::generateApplicationFloatCardWithModal($profile);
                }


            }


            $tab_panes .= '</div></div></div>';

            $cnt ++;


        }


        $content = <<<EOF
        <div class="row">
            <div class="col-md-12" style="padding-bottom: 30px;">
                <div class="panel with-nav-tabs panel-default">
                    <div class="panel-heading">
                        <ul id="tabs" class="nav nav-tabs">

                            $tabs

                        </ul>
                    </div>
                    <div class="panel-body" style="height: 70vh; overflow: scroll;">
                        <div id="tab-contents" class="tab-content">

                            $tab_panes


                        </div>
                    </div>
                </div>
            </div>
        </div>

EOF;
        return $content;

    }

    // extra content in internship modal
    // internship journals
    private static function generateInternshipJournalOutsideAccordion($internship)
    {
        $inner_journals = self::generateInternshipJournalInsideAccordion($internship->journal);
        $num_submitted_journals = 0;
        $required_total_num_journals = sizeof($internship->journal);
        for($i = 0; $i < sizeof($internship->journal); $i++)
        {
            if(!is_null($internship->journal[$i]->journal))
            {
                $num_submitted_journals ++;
            }
        }

        $accordion = <<<EOF
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-sm-6">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion_$internship->internship_id" href="#journal_of_internship_$internship->internship_id">
                            Journals
                            </a>
                        </h4>
                    </div> 
                    <div class="col-sm-1 col-sm-offset-5">
                        <span>$num_submitted_journals/$required_total_num_journals</span>
                    </div> 
                </div>  
            </div>
            <div id="journal_of_internship_$internship->internship_id" class="panel-collapse collapse">
                <div class="panel-body">
                $inner_journals
                </div>
            </div>
        </div>

EOF;
        return $accordion;

    }

    private static function generateInternshipJournalInsideAccordion($journals)
    {
        $accordion = '<div class="panel-group" id="journal_accordion">';

        foreach ($journals as $journal)
        {
            $journal_content = $journal->journal;
            $submission_mark = '<i class="fa fa-check" aria-hidden="true"></i>';

            if($journal->submitted_at > $journal->due_date)
            {
                $submission_mark = '<i class="fa fa-clock-o" aria-hidden="true"></i>';
            }

            if(is_null($journal_content))
            {
                $journal_content = 'No Submission';
                $submission_mark = '<i class="fa fa-times" aria-hidden="true"></i>';

            }


            $accordion .= '<div class="panel panel-default">'
                . '<div class="panel-heading">'
                . '<div class="row">'
                . '<div class="col-sm-10">'
                . '<h4 class="panel-title">'
                . '<a data-toggle="collapse" data-parent="#journal_accordion" href="#journal_'
                . $journal->id
                . '">'
                . 'Journal ' . $journal->serial_num . '/' . $journal->required_total_num
                . ' due: ' . $journal->due_date
                . ' | submitted: ' . $journal->submitted_at
                . '</a>'
                . '</h4>'
                . '</div>'
                . '<div class="col-sm-1 col-sm-offset-1">'
                . $submission_mark
                . '</div>'
                . '</div>'
                . '<div id="journal_'
                . $journal->id
                . '" class="panel-collapse collapse">'
                . '<div class="panel-body">'
                . $journal_content
                . '</div>'
                . '</div>'
                . '</div>'
                . '</div>';
        }

        $accordion .= '</div>';


        return $accordion;

    }

    // internship reflection
    private static function generateInternshipReflectionAccordion($internship)
    {
        $submission_marker = '<i class="fa fa-check" aria-hidden="true"></i>';

        $reflection = $internship->reflection[0];

        if($reflection->submitted_at > $reflection->due_date)
        {
            $submission_marker = '<i class="fa fa-clock-o" aria-hidden="true"></i>';
        }

        if(is_null($reflection->reflection))
        {
            $submission_marker = '<i class="fa fa-times" aria-hidden="true"></i>';
        }


        $accordion = <<<EOF
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-sm-6">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion_$internship->internship_id" href="#reflection_of_internship_$internship->internship_id">
                            Reflection Paper
                            </a>
                        </h4>
                    </div> 
                    <div class="col-sm-1 col-sm-offset-5">
                        <span>$submission_marker</span>
                    </div> 
                </div>  
            </div>
            <div id="reflection_of_internship_$internship->internship_id" class="panel-collapse collapse">
                <div class="panel-body">
                $reflection->reflection
                </div>
            </div>
        </div>

EOF;
        return $accordion;
    }

    // internship site evaluation
    private static function generateInternshipSiteEvaluationAccordion($internship)
    {
        $submission_marker = '<i class="fa fa-check" aria-hidden="true"></i>';

        $site_evaluation = $internship->site_evaluation[0];

        $site_eval_contents = 'detailed contents of site evaluation';

        if($site_evaluation->submitted_at > $site_evaluation->due_date)
        {
            $submission_marker = '<i class="fa fa-clock-o" aria-hidden="true"></i>';
        }

        if(is_null($site_evaluation->submitted_at))
        {
            $submission_marker = '<i class="fa fa-times" aria-hidden="true"></i>';
            $site_eval_contents = 'No Submission';
        }

        $accordion = <<<EOF
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-sm-6">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion_$internship->internship_id" href="#site_evaluation_of_internship_$internship->internship_id">
                            Internship Site Evaluation
                            </a>
                        </h4>
                    </div> 
                    <div class="col-sm-1 col-sm-offset-5">
                        <span>$submission_marker</span>
                    </div> 
                </div>  
            </div>
            <div id="site_evaluation_of_internship_$internship->internship_id" class="panel-collapse collapse">
                <div class="panel-body">
                $site_eval_contents
                </div>
            </div>
        </div>

EOF;
        return $accordion;
    }

    // internship student evaluation
    private static function generateInternshipStudentEvaluationOutsideAccordion($internship)
    {


        $inner_accordion = self::generateInternshipStudentEvaluationInsideAccordion($internship->student_evaluation);

        if(!is_null($internship->student_evaluation[0]->submitted_at)
            && !is_null($internship->student_evaluation[1]->submitted_at))
        {
            $num_submission = 2;
        }
        elseif (is_null($internship->student_evaluation[0]->submitted_at)
            && is_null($internship->student_evaluation[1]->submitted_at))
        {
            $num_submission = 0;
        }
        else
        {
            $num_submission = 1;
        }

        $accordion = <<<EOF
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-sm-6">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion_$internship->internship_id" href="#student_evaluation_of_internship_$internship->internship_id">
                            Supervisor's Evaluation of Student
                            </a>
                        </h4>
                    </div> 
                    <div class="col-sm-1 col-sm-offset-5">
                        <span>$num_submission/2</span>
                    </div> 
                </div>  
            </div>
            <div id="student_evaluation_of_internship_$internship->internship_id" class="panel-collapse collapse">
                <div class="panel-body">
                $inner_accordion
                </div>
            </div>
        </div>

EOF;
        return $accordion;
    }

    private static function generateInternshipStudentEvaluationInsideAccordion($evaluations)
    {
        $accordion = '<div class="panel-group" id="student_evaluation_accordion">';
        $eval_contents = 'student evaluation';
        $submission_mark = '<i class="fa fa-check" aria-hidden="true"></i>';



        foreach ($evaluations as $evaluation)
        {



            if($evaluation->submitted_at > $evaluation->due_date)
            {
                $submission_mark = '<i class="fa fa-clock-o" aria-hidden="true"></i>';
            }

            if(is_null($evaluation->submitted_at))
            {
                $submission_mark = '<i class="fa fa-times" aria-hidden="true"></i>';
                $eval_contents = 'No Submission';
            }


            if($evaluation->is_midterm == 1)
            {
                $inner_title = 'Midterm Evaluation';
            }
            else
            {
                $inner_title = 'Final Evaluation';
            }

            $accordion .= '<div class="panel panel-default">'
                . '<div class="panel-heading">'
                . '<div class="row">'
                . '<div class="col-sm-6">'
                . '<h4 class="panel-title">'
                . '<a data-toggle="collapse" data-parent="#student_evaluation_accordion" href="#student_eval_'
                . $evaluation->id
                . '">'
                . $inner_title
                . '</a>'
                . '</h4>'
                . '</div>'
                . '<div class="col-sm-1 col-sm-offset-5">'
                . $submission_mark
                . '</div>'
                . '</div>'
                . '<div id="student_eval_'
                . $evaluation->id
                . '" class="panel-collapse collapse">'
                . '<div class="panel-body">'
                . $eval_contents
                . '</div>'
                . '</div>'
                . '</div>'
                . '</div>';
        }





        $accordion .= '</div>';


        return $accordion;

    }

    // internship SGIS opinion
    private static function generateInternshipSGISOpinionForm($internship)
    {

        $action = '/test_ajax_close_internship';
        $grade_seeds = [
            'A',
            'B',
            'C',
            'D',
        ];

        $suggested_grade = $grade_seeds[rand(0,3)];
        $grade_options = '';
        foreach($grade_seeds as $seed)
        {
            $grade_options .= '<option value="'. $seed . '+' .'">'. $seed . '+' .'</option>';
            $grade_options .= '<option value="'. $seed .'">'. $seed .'</option>';
            $grade_options .= '<option value="'. $seed . '-' .'">'. $seed . '-' .'</option>';
        }
        $grade_options .='<option value="F">F</option>';


        $form = <<<EOF
        <form action="$action" method="post" id="sgis_opinions_form">
        <input type="hidden" name="internship_id" value="$internship->internship_id">
        <input type="hidden" name="case_closed" value="1">
        <label for="final_notes">Final Notes</label>
        <textarea name="final_notes" id="final_notes"></textarea>
        <label for="x373_grade">Suggested Grade: $suggested_grade</label>
        <select name="x373_grade" id="x373_grade">
        $grade_options
        </select>
        </form>

EOF;
        return $form;


    }








}