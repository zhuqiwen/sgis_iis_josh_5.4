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

        $accordion_journal = self::generateAdminInternshipJournalOutsideAccordion($internship);
        $accordion_reflection = self::generateAdminInternshipReflectionAccordion($internship);
        $accordion_site_evaluation = self::generateAdminInternshipSiteEvaluationAccordion($internship);
        $accordion_student_evaluation = self::generateAdminInternshipStudentEvaluationOutsideAccordion($internship);

        $form_sgis_opinion = self::generateAdminInternshipSGISOpinionForm($internship);

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


    /*
     * Admin components of internship assignments
     */
    // extra content in internship modal
    // internship journals
    private static function generateAdminInternshipJournalOutsideAccordion($internship)
    {
        $inner_journals = self::generateAdminInternshipJournalInsideAccordion($internship->journal);
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

    private static function generateAdminInternshipJournalInsideAccordion($journals)
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
    private static function generateAdminInternshipReflectionAccordion($internship)
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
    private static function generateAdminInternshipSiteEvaluationAccordion($internship)
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
    private static function generateAdminInternshipStudentEvaluationOutsideAccordion($internship)
    {


        $inner_accordion = self::generateAdminInternshipStudentEvaluationInsideAccordion($internship->student_evaluation);

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

    private static function generateAdminInternshipStudentEvaluationInsideAccordion($evaluations)
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
    private static function generateAdminInternshipSGISOpinionForm($internship)
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


    /*
     * Front end user's components of Internship Assignments SUBMISSION
     */

    public static function generateAssignmentItemCollapsePanel($type, $item)
    {
        $panel = '';
	    if($type === 'journals')
	    {
		    $panel .= self::generateAssignmentJournalsOuterAccordion($item);
	    }
	    elseif($type === 'reflection')
	    {
		    $panel .= self::generateAssignmentReflectionAccordion($item);
	    }
	    elseif($type === 'site_evaluation')
	    {
		    $panel .= self::generateAssignmentSiteEvaluationAccordion($item);
	    }
	    elseif($type === 'student_evaluations')
	    {
		    $panel .= self::generateAssignmentStudentEvaluationAccordion($item);
	    }

        return $panel;

    }


    // Journals: outer wrapper
    public static function generateAssignmentJournalsOuterAccordion($journals_to_submit, $for = 'to_submit')
    {

	    if(!empty($journals_to_submit))
//	    if(!$journals_to_submit->isEmpty())
	    {
		    $journal_inner_accordions = self::generateAssignmentJournalsInnerAccordions($journals_to_submit, $for);
	    }
	    else
	    {
		    if($for === 'to_submit')
		    {
			    $journal_inner_accordions = 'No Journals need to be submitted';
		    }
		    elseif($for === 'submitted')
		    {
			    $journal_inner_accordions = 'No Journal has been submitted yet';
		    }
	    }

        $num_to_submit = sizeof($journals_to_submit);
	    if($for === 'to_submit')
	    {
		    $panel_title = $num_to_submit . ' Journals to submit';
	    }
	    elseif($for === 'submitted')
	    {
		    $panel_title = $num_to_submit . ' Journals has been submitted';
	    }

        $accordion = <<<EOF
        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <!--<i class="livicon" data-name="signal" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>-->
                                    $panel_title
                                </h3>
                                <span class="pull-right clickable">
                                    <i class="glyphicon glyphicon-chevron-up"></i>
                                </span>
                            </div>
                            <div class="panel-body">
                                <div class="panel-group" id="journal_accordion" role="tablist" aria-multiselectable="true">
                                    <!--Inner panels-->
                                    $journal_inner_accordions
                                </div>
                                <!-- nav-tabs-custom -->
                            </div>
                        </div>

EOF;
        return $accordion;

    }

    // Journals: inner accordions
    public static function generateAssignmentJournalsInnerAccordions($journals, $for)
    {
        $accordions = '';
        $action = config('constants.ajax.urls.submit_internship_assignment_journal');
//        for($i = 0; $i < sizeof($journals); $i++)
	    foreach ($journals as $journal)
        {
	        if($for === 'to_submit')
	        {
		        $single_textarea = self::generateSingleTextareaForm($journal->id, $action);
	        }
	        elseif($for === 'submitted')
	        {
		        $single_textarea = self::generateSingleTextareaDisplay();
	        }
	        else
	        {
		        $single_textarea = 'oooops, seems something went wrong.';

	        }
            $journal_serial_num = $journal->intern_journal_serial_num;
            $panel_heading_id = $for . '_heading_' . $journal_serial_num;
            $collapse_id = $for . '_coolapse_' . $journal_serial_num;
            $panel_heading = <<<HEADING
            <div class="panel-heading" role="tab" id="$panel_heading_id">
                <a role="button" data-toggle="collapse" data-parent="#journal_accordion" href="#$collapse_id" aria-expanded="false" aria-controls="$collapse_id">
                    <h4 class="panel-title">Journal $journal_serial_num</h4>
                </a>
            </div>

HEADING;
            $panel_body = <<<BODY
            <div id="$collapse_id" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="$panel_heading_id">
                <div class="panel-body">
                $single_textarea
                </div>
            </div>

BODY;

            $div_wrapper_begin = '<div class="panel panel-default">';
            $div_wrapper_end = '</div>';

            $accordions .= $div_wrapper_begin . $panel_heading . $panel_body . $div_wrapper_end;
        }

//        if($journals->isEmpty())
        if(empty($journals))
        {
	        $accordions = 'All Journals have been submitted';
        }

        return $accordions;
    }



    // Reflection
	public static function generateAssignmentReflectionAccordion($reflection_to_submit, $for = 'to_submit')
	{
		$action = config('constants.ajax.urls.submit_internship_assignment_reflection');
		if(!is_null($reflection_to_submit))
//		if(!empty($reflection_to_submit))
		{
//			dd($reflection_to_submit);

			if($for === 'to_submit')
			{
				$single_textarea = self::generateSingleTextareaForm($reflection_to_submit->id, $action);
			}
			elseif($for === 'submitted')
			{
				$single_textarea = self::generateSingleTextareaDisplay($reflection_to_submit->id, 'reflection');
			}
		}
		else
		{
			if($for === 'to_submit')
			{
				$single_textarea = 'Internship Reflection has been submitted';
			}
			elseif($for === 'submitted')
			{
				$single_textarea = 'Internship Reflection has not been submitted';

			}
		}

		if($for === 'to_submit')
		{
			$panel_title = 'Reflection to submit';
		}
		elseif ($for === 'submitted')
		{
			$panel_title = 'Submitted Reflection';

		}
		$accordion = <<<EOF
        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <!--<i class="livicon" data-name="signal" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>-->
                                    $panel_title
                                </h3>
                                <span class="pull-right clickable">
                                    <i class="glyphicon glyphicon-chevron-up"></i>
                                </span>
                            </div>
                            <div class="panel-body">
                                $single_textarea
                            </div>
                        </div>

EOF;
		return $accordion;
	}

	// Site evaluation
	public static function generateAssignmentSiteEvaluationAccordion($site_evaluation_to_submit, $for = 'to_submit')
	{
		$action = config('constants.ajax.urls.submit_internship_assignment_site_evaluation');
		if(!is_null($site_evaluation_to_submit))
		{
			if($for === 'to_submit')
			{
				$content = self::generateSiteEvaluationForm($site_evaluation_to_submit->id, $action, $for);

			}
			elseif ($for === 'submitted')
			{
				$content = self::generateSiteEvaluationDisplay($site_evaluation_to_submit);
			}
		}
		else
		{
			if($for === 'to_submit')
			{
				$content = 'Internship Site Evaluation has been submitted';
			}
			elseif ($for === 'submitted')
			{
				$content = 'Internship Site Evaluation has NOT been submitted';
			}
		}

		if($for === 'to_submit')
		{
			$panel_title = 'Site Evaluation to submit';
		}
		elseif ($for === 'submitted')
		{
			$panel_title = 'Submitted Site Evaluation';
		}

		$accordion = <<<EOF
        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <!---<i class="livicon" data-name="signal" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>--->
                                    $panel_title
                                </h3>
                                <span class="pull-right clickable">
                                    <i class="glyphicon glyphicon-chevron-up"></i>
                                </span>
                            </div>
                            <div class="panel-body">
                                $content
                            </div>
                        </div>

EOF;
		return $accordion;

	}

	// Student evaluations
	public static function generateAssignmentStudentEvaluationAccordion($student_evaluation_to_submit)
	{
		return "to be finished";
	}

	/*
	 * END OF ASSIGNMENT SUBMISSION COMPONENTS
	 */

	/*
	 * SUBMITTED ASSIGNMENT GROUPED BY INTERNSHIPS
	 */
	public static function generateInternshipCollapsePanelWithSubmittedAssignments($internship, $journals, $reflection, $site_evaluation)
	{

		$internship_info = '';
		$internship_info .= $internship->application->intern_application_year . ', ';
		$internship_info .= $internship->application->intern_application_term . ', ';
		$internship_info .= $internship->application->intern_application_country;

		$journals_panel = self::generateSubmittedJournalsCollapsePanel($journals);
		$reflection_panel = self::generateSubmittedReflectionCollapsePanel($reflection);
		$site_evaluation_panel = self::generateSubmittedSiteEvaluationCollapsePanel($site_evaluation);

		$panel = <<<PANEL
			<div class="panel panel-info">
	            <div class="panel-heading">
	                <h4 class="panel-title">
	                    <a id="assignment_panel_title" href="#$internship->id" data-parent="#accordion-internship" data-toggle="collapse">$internship_info</a>
	                </h4>
	            </div>
	            <div id="$internship->id" class="panel-collapse collapse">
	                <div class="panel-body">
						$journals_panel
						$reflection_panel
						$site_evaluation_panel
	                </div>
	                <!--/.panel-body -->
	            </div>
	            <!-- /#addwizard -->
	        </div>

PANEL;
		return $panel;

	}

	public static function generateSubmittedJournalsCollapsePanel($submitted_journals)
	{

		return self::generateAssignmentJournalsOuterAccordion($submitted_journals, 'submitted');
	}

	public static function generateSubmittedReflectionCollapsePanel($submitted_reflection)
	{
		return self::generateAssignmentReflectionAccordion($submitted_reflection, 'submitted');
	}

	public static function generateSubmittedSiteEvaluationCollapsePanel($site_evaluation)
	{
		return self::generateAssignmentSiteEvaluationAccordion($site_evaluation, 'submitted');
	}





    /*
     * single element form generators
     */

    public static function generateSingleTextareaForm($record_id, $action)
    {
        $form = <<<FORM
		<form class="form-horizontal" action="$action" method="POST">
			<!-- Textarea -->
			<div class="form-group">
			  <div class="col-sm-12 col-md-8 col-md-offset-1">                     
			    <textarea class="form-control" id="textarea" name="textarea">default text</textarea>
			  </div>
			
			<!-- Button -->
			  <div class="col-sm-12 col-md-2">
			    <button type="submit" class="btn btn-primary" data-record-id="$record_id">Submit</button>
			  </div>
			</div>
		</form>
FORM;

        return $form;
    }

	public static function generateSingleTextareaDisplay($record_id, $record_type)
	{
		$div_id = $record_type . '_' . $record_id;
		$display = <<<DISPLAY
			<div class="col-md-10 col-md-offset-1 display_submitted" id="$div_id">
				<p>
					display submitted single text area assignment
				</p>
			</div>

DISPLAY;

		return $display;

    }


	public static function generateSiteEvaluationForm($record_id, $action)
	{
		$form = <<<FORM
		<form class="form-horizontal" method="PUT" action="$action">
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label class="col-md-12" for="how_did_locate">How did you locate this internship?</label>
						<div class="col-md-12">                     
				            <textarea class="form-control" id="how_did_locate" name="how_did_locate">default text</textarea>
				        </div>
				    </div>
				    <div class="form-group">
						<label class="col-md-12" for="site_description">Provide brief description of the internship site</label>
						<div class="col-md-12">                     
							<textarea class="form-control" id="site_description" name="site_description">default text</textarea>
						</div>
				    </div>
				    <div class="form-group">
						<label class="col-md-12" for="task_description">What were your tasks and responsibilities as an intern?</label>
						<div class="col-md-12">                     
						    <textarea class="form-control" id="task_description" name="task_description">default text</textarea>
				        </div>
				    </div>
				    <div class="form-group">
				        <label class="col-md-12" for="fit_into_study">How does this internship site fit into the scope of your studies at IU?</label>
						<div class="col-md-12">                     
				            <textarea class="form-control" id="fit_into_study" name="fit_into_study">default text</textarea>
				        </div>
				    </div>
				    <div class="form-group">
				        <label class="col-md-12" for="willing_to_recommend">Would you recommend this internship site?</label>
						<div class="col-md-12">                     
				            <select id="willing_to_recommend" name="willing_to_recommend" class="form-control">
							    <option value="2">Yes! Very Much!</option>
							    <option value="1">Yes</option>
							    <option value="0">Not Sure</option>
							    <option value="-1">No</option>
							    <option value="-2">Absolutely NO!</option>
						    </select>
				        </div>
				    </div>				    				    			
				</div>
				
				<div class="col-md-6">
					<div class="form-group">
						<label class="col-md-12" for="site_strength">What were the strengths of the internship site?</label>
						<div class="col-md-12">                     
				            <textarea class="form-control" id="site_strength" name="site_strength">default text</textarea>
				        </div>
				    </div>
				    <div class="form-group">
						<label class="col-md-12" for="site_weakness">What were weaknesses of the internship site?</label>
						<div class="col-md-12">                     
							<textarea class="form-control" id="site_weakness" name="site_weakness">default text</textarea>
						</div>
				    </div>
				    <div class="form-group">
    			        <label class="col-md-12" for="gained_skills">What skills and knowledge did you gain by participating in this internship site?</label>
						<div class="col-md-12">                     
						    <textarea class="form-control" id="gained_skills" name="gained_skills">default text</textarea>
				        </div>
				    </div>
				    <div class="form-group">
				        <label class="col-md-12" for="brief_comment">Any other brief comment?</label>
						<div class="col-md-12">                     
				            <textarea class="form-control" id="brief_comment" name="brief_comment">default text</textarea>
				        </div>
				    </div>
				    <div class="form-group">
   				        <label class="col-md-12" for="single_button">&nbsp</label>
						<div class="col-md-12">                     
							<button type="submit" id="single_button" data-record-id="$record_id" class="btn btn-primary">Submit</button>
				        </div>
				    </div>
				</div>
			</div>			
		</form>


FORM;

		return $form;

    }


	public static function generateSiteEvaluationDisplay($site_evaluation)
	{
		$labels = [
			"how_did_locate" => 'How did you locate this internship?',
			"site_description" => 'Provide brief description of the internship site',
			"task_description" => 'What were your tasks and responsibilities as an intern?',
			"fit_into_study" => 'How does this internship site fit into the scope of your studies at IU?',
			"site_strength" => 'What were the strengths of the internship site?',
			"site_weakness" => 'What were weaknesses of the internship site?',
			"gained_skills" => 'What skills and knowledge did you gain by participating in this internship site?',
			"brief_comment" => 'Any other brief comment?',
			"willing_to_recommend" => 'Would you recommend this internship site?',
		];
		$excludes = [
			"id" => '',
			"internship_id" => '',
			"intern_site_evaluation_due_date" => '',
			"intern_site_evaluation_submitted_on" => '',
			"created_at" => '',
			"updated_at" => '',
			"deleted_at" => '',
		];
		$attributes = $site_evaluation->getAttributes();
		$attributes = array_diff_key($attributes, $excludes);
		$content = '';
		foreach ($attributes as $key => $value)
		{
			$content .= '<div class="col-md-10 col-me-offset-1">';
			$content .= '<div class="form-group">';
			$content .= '<label class="col-md-12" for="' . $key . '">' . $labels[$key] . '</label>';
			$content .= '<div class="col-md-12">';
			$content .= nl2br($value);
			$content .= '</div></div></div>';

		}
		$display = <<<DISPLAY
		<div class="row">
			$content
		</div>

DISPLAY;

		return $display;
    }

}