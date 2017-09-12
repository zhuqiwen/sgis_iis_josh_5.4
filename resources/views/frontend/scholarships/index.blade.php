@extends('layouts/default')

{{-- Page title --}}
@section('title')
Scholarships
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <!--page level css starts-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/frontend/portfolio.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/fancybox/jquery.fancybox.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/fancybox/helpers/jquery.fancybox-buttons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/float-card.css') }}" />

    <!--end of page level css-->
@stop

{{-- breadcrumb --}}
@section('top')
    <div class="breadcum">
        {{--<div class="container">--}}
            {{--<ol class="breadcrumb">--}}
                {{--<li>--}}
                    {{--<a href="{{ route('home') }}"> <i class="livicon icon3 icon4" data-name="home" data-size="18" data-loop="true" data-c="#3d3d3d" data-hc="#3d3d3d"></i>Dashboard--}}
                    {{--</a>--}}
                {{--</li>--}}
                {{--<li class="hidden-xs">--}}
                    {{--<i class="livicon icon3" data-name="angle-double-right" data-size="18" data-loop="true" data-c="#01bc8c" data-hc="#01bc8c"></i>--}}
                    {{--<a href="#">Portfolio</a>--}}
                {{--</li>--}}
            {{--</ol>--}}
            {{--<div class="pull-right">--}}
                {{--<i class="livicon icon3" data-name="briefcase" data-size="20" data-loop="true" data-c="#3d3d3d" data-hc="#3d3d3d"></i> Portfolio--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    @stop


{{-- Page content --}}
@section('content')
    <!-- Container Section Start -->
    <div class="container">
        <h2 id="portfolio_title">Scholarships</h2>
        <!-- Images Section Start -->
        <div class="col-md-12" style="padding: 0">
            <div id="gallery">
                <div id="portfolio_btns">
                    <button class=" btn filter btn-primary" data-filter="all">ALL</button>
                    <button class="btn filter btn-primary" data-filter=".category_summer_intern">Summer Internship Funding</button>
                    <button class=" btn filter btn-primary" data-filter=".category_overseas_study">Overseas Study Scholarships</button>
                    <button class=" btn filter btn-primary" data-filter=".category_others">Other Scholarships</button>
                </div>
                <div>
                    {{--card wiht modal--}}
                    <div class="mix category_summer_intern col-md-4" data-my-order="1" style="margin-top: 20px; margin-bottom: 20px;">
                        <a data-toggle="modal" data-target="#dean_scholarship" href="#" style="text-decoration: none">
                            <div class="col-md-12 float-card" style="height: 400px;">
                                <div class="title" style="margin-top: 10px;">
                                    <div class="row">
                                        <div class="col-md-10 col-md-offset-1">
                                            <p style="text-align: center">Dean’s Scholarship</p>
                                        </div>
                                    </div>
                                </div>
                                <hr style="color: black; background-color: black; height: 1px; margin: 0 0;">
                                <div class="text">
                                    <p><strong>Dead line</strong></p>
                                    <p>March 31, 2017, 5 pm</p>
                                    <p><strong>Eligibility</strong></p>
                                    <p>Undergraduate or graduate student</p>
                                    <p>Minimum GPA: 3.2</p>
                                    <p>Proof of acceptance to a summer internship program (preference to N.E.D. applicants)</p>
                                </div>
                            </div>
                        </a>
                        {{--modal--}}
                        <div id="dean_scholarship" class="modal fade" role="dialog">
                            <div class="modal-dialog" style="width: 80%;">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">$applicant->first_name $applicant->last_name's $payment Internship in $intern_application_country</h4>
                                        <p>$intern_application_year, $intern_application_term</p>
                                    </div>
                                    <div class="modal-body">
                                        <div id="internship_details">

                                            <div>
                                                <h4>Internship Location:
                                                    <small>
                                                        $intern_application_street,
                                                        $intern_application_city,
                                                        $intern_application_state,
                                                        $intern_application_country
                                                    </small>
                                                </h4>
                                                <div id="map_$internship->id" style="height: 450px; width: 100%;"></div>
                                            </div>
                                            <div>
                                                <h4>
                                                    Internship Organization:
                                                </h4>
                                                <div>
                                                    <p>
                                                        Name: $intern_organization_name
                                                    </p>
                                                    <P>
                                                        Website: <a href="$intern_organization_url" target="_blank">$intern_organization_url</a>
                                                    </P>
                                                    <P>
                                                        Type: $intern_organization_type
                                                    </P>
                                                </div>
                                            </div>

                                            <div>
                                                <h4>
                                                    Internship Supervisor:
                                                </h4>
                                                <div>
                                                    <p>
                                                        Name: $intern_supervisor_prefix $intern_supervisor_first_name $intern_supervisor_last_name
                                                    </p>
                                                    <p>
                                                        Email: <a href="mailto:$intern_supervisor_email">$intern_supervisor_email</a>
                                                    </p>
                                                    <p>
                                                        Phone: $intern_supervisor_phone_country_code-$intern_supervisor_phone
                                                    </p>
                                                </div>
                                            </div>
                                            <div>
                                                <h4>
                                                    Internship Dates:
                                                </h4>
                                                <div>
                                                    <p>
                                                        $intern_application_term, in $intern_application_year
                                                    </p>
                                                    $depart_return_info
                                                    <p>
                                                        Starts: $intern_application_start_date
                                                    </p>
                                                    <p>
                                                        Ends: $intern_application_end_date
                                                    </p>
                                                    <p>
                                                        Duration: $internship_duration (including weekends)
                                                        / $internship_duration_without_weekends (excluding weekends)
                                                    </p>
                                                </div>
                                            </div>
                                            <div>
                                                <h4>
                                                    Internship Budgets:
                                                </h4>
                                                <div>
                                                    <p>
                                                        Airfare: $intern_application_budget_airfare
                                                    </p>
                                                    <p>
                                                        Housing: $intern_application_budget_housing
                                                    </p>
                                                    <p>
                                                        Meals: $intern_application_budget_meals
                                                    </p>
                                                    <p>
                                                        Transportation: $intern_application_budget_transportation
                                                    </p>
                                                    <p>
                                                        Others: $intern_application_budget_others
                                                    </p>
                                                </div>
                                            </div>
                                            <div>
                                                <h4>
                                                    Other info
                                                </h4>
                                                <div>
                                                    <p>
                                                        Work hours per week: $intern_application_work_hours_per_week
                                                    </p>
                                                    <p>
                                                        Schedule: <br>$intern_application_work_schedule
                                                    </p>
                                                    <p>
                                                        Internship description: <br>$intern_application_description
                                                    </p>
                                                    <p>
                                                        Reasons: <br>$intern_application_reasons
                                                    </p>
                                                    <p>
                                                        Cultural Interaction: <br>$intern_application_cultural_interaction
                                                    </p>
                                                    <p>
                                                        Challenges: <br>$intern_application_challenges
                                                    </p>
                                                    <p>
                                                        This internship was submitted on: <br>$intern_application_submitted_date
                                                    </p>
                                                    <p>
                                                        This internship was approved on: <br>$intern_application_approved_date
                                                    </p>
                                                </div>
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
                                            $sgis_opinions
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        $submit_button
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mix category_overseas_study col-md-4" data-my-order="2" style="margin-top: 20px; margin-bottom: 20px;">
                        <a data-toggle="modal" data-target="#anderson_scholarship" href="#" style="text-decoration: none">
                            <div class="col-md-12 float-card" style="height: 400px;">
                                <div class="title" style="margin-top: 10px;">
                                    <div class="row">
                                        <div class="col-md-10 col-md-offset-1">
                                            <p style="text-align: center">Anderson Overseas Study SGIS Scholarship</p>
                                        </div>
                                    </div>
                                </div>
                                <hr style="color: black; background-color: black; height: 1px; margin: 0 0;">
                                <div class="text">
                                    <p><strong>Dead line</strong></p>
                                    <p>October 20, 2017</p>
                                    <p><strong>Eligibility</strong></p>
                                    <p>To be eligible for this scholarship, you must:</p>
                                    <p>Be officially enrolled as a full-time undergraduate student (minimum 12 credit hours) with a major in SGIS at the time you apply</p>
                                    <p>Have a minimum cumulative GPA of 3.00 at the time you apply</p>
                                    <p>Have been accepted to participate in an IU-approved, credit-bearing overseas study program</p>
                                </div>
                            </div>
                        </a>
                        <div id="anderson_scholarship" class="modal fade" role="dialog">
                            <div class="modal-dialog" style="width: 80%;">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">$applicant->first_name $applicant->last_name's $payment Internship in $intern_application_country</h4>
                                        <p>$intern_application_year, $intern_application_term</p>
                                    </div>
                                    <div class="modal-body">
                                        <div id="internship_details">

                                            <div>
                                                <h4>Internship Location:
                                                    <small>
                                                        $intern_application_street,
                                                        $intern_application_city,
                                                        $intern_application_state,
                                                        $intern_application_country
                                                    </small>
                                                </h4>
                                                <div id="map_$internship->id" style="height: 450px; width: 100%;"></div>
                                            </div>
                                            <div>
                                                <h4>
                                                    Internship Organization:
                                                </h4>
                                                <div>
                                                    <p>
                                                        Name: $intern_organization_name
                                                    </p>
                                                    <P>
                                                        Website: <a href="$intern_organization_url" target="_blank">$intern_organization_url</a>
                                                    </P>
                                                    <P>
                                                        Type: $intern_organization_type
                                                    </P>
                                                </div>
                                            </div>

                                            <div>
                                                <h4>
                                                    Internship Supervisor:
                                                </h4>
                                                <div>
                                                    <p>
                                                        Name: $intern_supervisor_prefix $intern_supervisor_first_name $intern_supervisor_last_name
                                                    </p>
                                                    <p>
                                                        Email: <a href="mailto:$intern_supervisor_email">$intern_supervisor_email</a>
                                                    </p>
                                                    <p>
                                                        Phone: $intern_supervisor_phone_country_code-$intern_supervisor_phone
                                                    </p>
                                                </div>
                                            </div>
                                            <div>
                                                <h4>
                                                    Internship Dates:
                                                </h4>
                                                <div>
                                                    <p>
                                                        $intern_application_term, in $intern_application_year
                                                    </p>
                                                    $depart_return_info
                                                    <p>
                                                        Starts: $intern_application_start_date
                                                    </p>
                                                    <p>
                                                        Ends: $intern_application_end_date
                                                    </p>
                                                    <p>
                                                        Duration: $internship_duration (including weekends)
                                                        / $internship_duration_without_weekends (excluding weekends)
                                                    </p>
                                                </div>
                                            </div>
                                            <div>
                                                <h4>
                                                    Internship Budgets:
                                                </h4>
                                                <div>
                                                    <p>
                                                        Airfare: $intern_application_budget_airfare
                                                    </p>
                                                    <p>
                                                        Housing: $intern_application_budget_housing
                                                    </p>
                                                    <p>
                                                        Meals: $intern_application_budget_meals
                                                    </p>
                                                    <p>
                                                        Transportation: $intern_application_budget_transportation
                                                    </p>
                                                    <p>
                                                        Others: $intern_application_budget_others
                                                    </p>
                                                </div>
                                            </div>
                                            <div>
                                                <h4>
                                                    Other info
                                                </h4>
                                                <div>
                                                    <p>
                                                        Work hours per week: $intern_application_work_hours_per_week
                                                    </p>
                                                    <p>
                                                        Schedule: <br>$intern_application_work_schedule
                                                    </p>
                                                    <p>
                                                        Internship description: <br>$intern_application_description
                                                    </p>
                                                    <p>
                                                        Reasons: <br>$intern_application_reasons
                                                    </p>
                                                    <p>
                                                        Cultural Interaction: <br>$intern_application_cultural_interaction
                                                    </p>
                                                    <p>
                                                        Challenges: <br>$intern_application_challenges
                                                    </p>
                                                    <p>
                                                        This internship was submitted on: <br>$intern_application_submitted_date
                                                    </p>
                                                    <p>
                                                        This internship was approved on: <br>$intern_application_approved_date
                                                    </p>
                                                </div>
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
                                            $sgis_opinions
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        $submit_button
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mix category_overseas_study col-md-4" data-my-order="3" style="margin-top: 20px; margin-bottom: 20px;">
                        <a data-toggle="modal" data-target="" href="#fielding_scholarship" style="text-decoration: none">
                            <div class="col-md-12 float-card" style="height: 400px;">
                                <div class="title" style="margin-top: 10px;">
                                    <div class="row">
                                        <div class="col-md-10 col-md-offset-1">
                                            <p style="text-align: center">James D. Fielding Family Study Abroad Scholarship</p>
                                        </div>
                                    </div>
                                </div>
                                <hr style="color: black; background-color: black; height: 1px; margin: 0 0;">
                                <div class="text">
                                    <p><strong>Dead line</strong></p>
                                    <p>October 20, 2017</p>
                                    <p><strong>Eligibility</strong></p>
                                    <p>Be officially enrolled as a full-time undergraduate student (minimum 12 credit hours) with a major in SGIS at the time you apply</p>
                                    <p>Have a minimum cumulative GPA of 3.00 at the time you apply</p>
                                    <p>Have been accepted to participate in an IU-approved, credit-bearing overseas study program</p>
                                </div>
                            </div>
                        </a>
                        <div id="fielding_scholarship" class="modal fade" role="dialog">
                            <div class="modal-dialog" style="width: 80%;">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">$applicant->first_name $applicant->last_name's $payment Internship in $intern_application_country</h4>
                                        <p>$intern_application_year, $intern_application_term</p>
                                    </div>
                                    <div class="modal-body">
                                        <div id="internship_details">

                                            <div>
                                                <h4>Internship Location:
                                                    <small>
                                                        $intern_application_street,
                                                        $intern_application_city,
                                                        $intern_application_state,
                                                        $intern_application_country
                                                    </small>
                                                </h4>
                                                <div id="map_$internship->id" style="height: 450px; width: 100%;"></div>
                                            </div>
                                            <div>
                                                <h4>
                                                    Internship Organization:
                                                </h4>
                                                <div>
                                                    <p>
                                                        Name: $intern_organization_name
                                                    </p>
                                                    <P>
                                                        Website: <a href="$intern_organization_url" target="_blank">$intern_organization_url</a>
                                                    </P>
                                                    <P>
                                                        Type: $intern_organization_type
                                                    </P>
                                                </div>
                                            </div>

                                            <div>
                                                <h4>
                                                    Internship Supervisor:
                                                </h4>
                                                <div>
                                                    <p>
                                                        Name: $intern_supervisor_prefix $intern_supervisor_first_name $intern_supervisor_last_name
                                                    </p>
                                                    <p>
                                                        Email: <a href="mailto:$intern_supervisor_email">$intern_supervisor_email</a>
                                                    </p>
                                                    <p>
                                                        Phone: $intern_supervisor_phone_country_code-$intern_supervisor_phone
                                                    </p>
                                                </div>
                                            </div>
                                            <div>
                                                <h4>
                                                    Internship Dates:
                                                </h4>
                                                <div>
                                                    <p>
                                                        $intern_application_term, in $intern_application_year
                                                    </p>
                                                    $depart_return_info
                                                    <p>
                                                        Starts: $intern_application_start_date
                                                    </p>
                                                    <p>
                                                        Ends: $intern_application_end_date
                                                    </p>
                                                    <p>
                                                        Duration: $internship_duration (including weekends)
                                                        / $internship_duration_without_weekends (excluding weekends)
                                                    </p>
                                                </div>
                                            </div>
                                            <div>
                                                <h4>
                                                    Internship Budgets:
                                                </h4>
                                                <div>
                                                    <p>
                                                        Airfare: $intern_application_budget_airfare
                                                    </p>
                                                    <p>
                                                        Housing: $intern_application_budget_housing
                                                    </p>
                                                    <p>
                                                        Meals: $intern_application_budget_meals
                                                    </p>
                                                    <p>
                                                        Transportation: $intern_application_budget_transportation
                                                    </p>
                                                    <p>
                                                        Others: $intern_application_budget_others
                                                    </p>
                                                </div>
                                            </div>
                                            <div>
                                                <h4>
                                                    Other info
                                                </h4>
                                                <div>
                                                    <p>
                                                        Work hours per week: $intern_application_work_hours_per_week
                                                    </p>
                                                    <p>
                                                        Schedule: <br>$intern_application_work_schedule
                                                    </p>
                                                    <p>
                                                        Internship description: <br>$intern_application_description
                                                    </p>
                                                    <p>
                                                        Reasons: <br>$intern_application_reasons
                                                    </p>
                                                    <p>
                                                        Cultural Interaction: <br>$intern_application_cultural_interaction
                                                    </p>
                                                    <p>
                                                        Challenges: <br>$intern_application_challenges
                                                    </p>
                                                    <p>
                                                        This internship was submitted on: <br>$intern_application_submitted_date
                                                    </p>
                                                    <p>
                                                        This internship was approved on: <br>$intern_application_approved_date
                                                    </p>
                                                </div>
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
                                            $sgis_opinions
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        $submit_button
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mix category_others col-md-4" data-my-order="4" style="margin-top: 20px; margin-bottom: 20px;">
                        <a data-toggle="modal" data-target="#albright_scholarship" href="#" style="text-decoration: none">
                            <div class="col-md-12 float-card" style="height: 400px;">
                                <div class="title" style="margin-top: 10px;">
                                    <div class="row">
                                        <div class="col-md-10 col-md-offset-1">
                                            <p style="text-align: center">David E. Albright Memorial Scholarship</p>
                                        </div>
                                    </div>
                                </div>
                                <hr style="color: black; background-color: black; height: 1px; margin: 0 0;">
                                <div class="text">
                                    <p><strong>Dead line</strong></p>
                                    <p>Friday, March 3, 2017</p>

                                </div>
                            </div>
                        </a>
                        <div id="albright_scholarship" class="modal fade" role="dialog">
                            <div class="modal-dialog" style="width: 80%;">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">$applicant->first_name $applicant->last_name's $payment Internship in $intern_application_country</h4>
                                        <p>$intern_application_year, $intern_application_term</p>
                                    </div>
                                    <div class="modal-body">
                                        <div id="internship_details">

                                            <div>
                                                <h4>Internship Location:
                                                    <small>
                                                        $intern_application_street,
                                                        $intern_application_city,
                                                        $intern_application_state,
                                                        $intern_application_country
                                                    </small>
                                                </h4>
                                                <div id="map_$internship->id" style="height: 450px; width: 100%;"></div>
                                            </div>
                                            <div>
                                                <h4>
                                                    Internship Organization:
                                                </h4>
                                                <div>
                                                    <p>
                                                        Name: $intern_organization_name
                                                    </p>
                                                    <P>
                                                        Website: <a href="$intern_organization_url" target="_blank">$intern_organization_url</a>
                                                    </P>
                                                    <P>
                                                        Type: $intern_organization_type
                                                    </P>
                                                </div>
                                            </div>

                                            <div>
                                                <h4>
                                                    Internship Supervisor:
                                                </h4>
                                                <div>
                                                    <p>
                                                        Name: $intern_supervisor_prefix $intern_supervisor_first_name $intern_supervisor_last_name
                                                    </p>
                                                    <p>
                                                        Email: <a href="mailto:$intern_supervisor_email">$intern_supervisor_email</a>
                                                    </p>
                                                    <p>
                                                        Phone: $intern_supervisor_phone_country_code-$intern_supervisor_phone
                                                    </p>
                                                </div>
                                            </div>
                                            <div>
                                                <h4>
                                                    Internship Dates:
                                                </h4>
                                                <div>
                                                    <p>
                                                        $intern_application_term, in $intern_application_year
                                                    </p>
                                                    $depart_return_info
                                                    <p>
                                                        Starts: $intern_application_start_date
                                                    </p>
                                                    <p>
                                                        Ends: $intern_application_end_date
                                                    </p>
                                                    <p>
                                                        Duration: $internship_duration (including weekends)
                                                        / $internship_duration_without_weekends (excluding weekends)
                                                    </p>
                                                </div>
                                            </div>
                                            <div>
                                                <h4>
                                                    Internship Budgets:
                                                </h4>
                                                <div>
                                                    <p>
                                                        Airfare: $intern_application_budget_airfare
                                                    </p>
                                                    <p>
                                                        Housing: $intern_application_budget_housing
                                                    </p>
                                                    <p>
                                                        Meals: $intern_application_budget_meals
                                                    </p>
                                                    <p>
                                                        Transportation: $intern_application_budget_transportation
                                                    </p>
                                                    <p>
                                                        Others: $intern_application_budget_others
                                                    </p>
                                                </div>
                                            </div>
                                            <div>
                                                <h4>
                                                    Other info
                                                </h4>
                                                <div>
                                                    <p>
                                                        Work hours per week: $intern_application_work_hours_per_week
                                                    </p>
                                                    <p>
                                                        Schedule: <br>$intern_application_work_schedule
                                                    </p>
                                                    <p>
                                                        Internship description: <br>$intern_application_description
                                                    </p>
                                                    <p>
                                                        Reasons: <br>$intern_application_reasons
                                                    </p>
                                                    <p>
                                                        Cultural Interaction: <br>$intern_application_cultural_interaction
                                                    </p>
                                                    <p>
                                                        Challenges: <br>$intern_application_challenges
                                                    </p>
                                                    <p>
                                                        This internship was submitted on: <br>$intern_application_submitted_date
                                                    </p>
                                                    <p>
                                                        This internship was approved on: <br>$intern_application_approved_date
                                                    </p>
                                                </div>
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
                                            $sgis_opinions
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        $submit_button
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mix category_others col-md-4" data-my-order="5" style="margin-top: 20px; margin-bottom: 20px;">
                        <a data-toggle="modal" data-target="#direct_admin_grant" href="#" style="text-decoration: none">
                            <div class="col-md-12 float-card" style="height: 400px;">
                                <div class="title" style="margin-top: 10px;">
                                    <div class="row">
                                        <div class="col-md-10 col-md-offset-1">
                                            <p style="text-align: center">SGIS Direct Admit Travel Grant</p>
                                        </div>
                                    </div>
                                </div>
                                <hr style="color: black; background-color: black; height: 1px; margin: 0 0;">
                                <div class="text">
                                    <p>Travel grants to offset the cost of overseas study and international internship/research will be provided to SGIS direct admit students who have matriculated in 2013, 2014, or 2015. Students must meet the eligibility requirements at the time they wish to receive the grant.</p>
                                </div>
                            </div>
                        </a>
                        <div id="direct_admin_grant" class="modal fade" role="dialog">
                            <div class="modal-dialog" style="width: 80%;">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">$applicant->first_name $applicant->last_name's $payment Internship in $intern_application_country</h4>
                                        <p>$intern_application_year, $intern_application_term</p>
                                    </div>
                                    <div class="modal-body">
                                        <div id="internship_details">

                                            <div>
                                                <h4>Internship Location:
                                                    <small>
                                                        $intern_application_street,
                                                        $intern_application_city,
                                                        $intern_application_state,
                                                        $intern_application_country
                                                    </small>
                                                </h4>
                                                <div id="map_$internship->id" style="height: 450px; width: 100%;"></div>
                                            </div>
                                            <div>
                                                <h4>
                                                    Internship Organization:
                                                </h4>
                                                <div>
                                                    <p>
                                                        Name: $intern_organization_name
                                                    </p>
                                                    <P>
                                                        Website: <a href="$intern_organization_url" target="_blank">$intern_organization_url</a>
                                                    </P>
                                                    <P>
                                                        Type: $intern_organization_type
                                                    </P>
                                                </div>
                                            </div>

                                            <div>
                                                <h4>
                                                    Internship Supervisor:
                                                </h4>
                                                <div>
                                                    <p>
                                                        Name: $intern_supervisor_prefix $intern_supervisor_first_name $intern_supervisor_last_name
                                                    </p>
                                                    <p>
                                                        Email: <a href="mailto:$intern_supervisor_email">$intern_supervisor_email</a>
                                                    </p>
                                                    <p>
                                                        Phone: $intern_supervisor_phone_country_code-$intern_supervisor_phone
                                                    </p>
                                                </div>
                                            </div>
                                            <div>
                                                <h4>
                                                    Internship Dates:
                                                </h4>
                                                <div>
                                                    <p>
                                                        $intern_application_term, in $intern_application_year
                                                    </p>
                                                    $depart_return_info
                                                    <p>
                                                        Starts: $intern_application_start_date
                                                    </p>
                                                    <p>
                                                        Ends: $intern_application_end_date
                                                    </p>
                                                    <p>
                                                        Duration: $internship_duration (including weekends)
                                                        / $internship_duration_without_weekends (excluding weekends)
                                                    </p>
                                                </div>
                                            </div>
                                            <div>
                                                <h4>
                                                    Internship Budgets:
                                                </h4>
                                                <div>
                                                    <p>
                                                        Airfare: $intern_application_budget_airfare
                                                    </p>
                                                    <p>
                                                        Housing: $intern_application_budget_housing
                                                    </p>
                                                    <p>
                                                        Meals: $intern_application_budget_meals
                                                    </p>
                                                    <p>
                                                        Transportation: $intern_application_budget_transportation
                                                    </p>
                                                    <p>
                                                        Others: $intern_application_budget_others
                                                    </p>
                                                </div>
                                            </div>
                                            <div>
                                                <h4>
                                                    Other info
                                                </h4>
                                                <div>
                                                    <p>
                                                        Work hours per week: $intern_application_work_hours_per_week
                                                    </p>
                                                    <p>
                                                        Schedule: <br>$intern_application_work_schedule
                                                    </p>
                                                    <p>
                                                        Internship description: <br>$intern_application_description
                                                    </p>
                                                    <p>
                                                        Reasons: <br>$intern_application_reasons
                                                    </p>
                                                    <p>
                                                        Cultural Interaction: <br>$intern_application_cultural_interaction
                                                    </p>
                                                    <p>
                                                        Challenges: <br>$intern_application_challenges
                                                    </p>
                                                    <p>
                                                        This internship was submitted on: <br>$intern_application_submitted_date
                                                    </p>
                                                    <p>
                                                        This internship was approved on: <br>$intern_application_approved_date
                                                    </p>
                                                </div>
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
                                            $sgis_opinions
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        $submit_button
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- //Images Section End -->
    </div>
    <!-- Container Section End -->
@stop

{{-- page level scripts --}}
@section('footer_scripts')
    <!-- page level js starts-->
    <script type="text/javascript" src="{{ asset('assets/vendors/mixitup/jquery.mixitup.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/fancybox/jquery.fancybox.pack.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/fancybox/helpers/jquery.fancybox-buttons.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/fancybox/helpers/jquery.fancybox-media.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/frontend/portfolio.js') }}"></script>
    <!--page level js ends-->

@stop
