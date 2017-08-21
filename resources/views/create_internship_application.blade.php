@extends('layouts/default')

{{-- Page title --}}
@section('title')
Advanced Features
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <!--page level css starts-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/bootstrap-tagsinput/css/bootstrap-tagsinput.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/frontend/panel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/frontend/features.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/frontend/timeline.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/vendors/switchery/css/switchery.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-switch/css/bootstrap-switch.css') }}">
    <link href="{{ asset('assets/vendors/select2/css/select2.min.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('assets/vendors/select2/css/select2-bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendors/bootstrapvalidator/css/bootstrapValidator.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendors/iCheck/css/all.css') }}"  rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/pages/wizard.css') }}" rel="stylesheet">
    <!--end of page level css-->
@stop

{{-- breadcrumb --}}
@section('top')
    <div class="breadcum">
    </div>
@stop


{{-- Page content --}}
@section('content')
    <!-- Container Section Start -->
    <div class="container">
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <i class="livicon" data-name="folder-add" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> Internship Application Wizard
                            </h3>
                            <span class="pull-right clickable">
                        <i class="glyphicon glyphicon-chevron-up"></i>
                    </span>
                        </div>
                        <div class="panel-body">
                            <form id="commentForm" method="post" action="#">
                                <div id="rootwizard">
                                    <ul>

                                        <?php
                                            $numTabs = 9;
                                            $tabNames = [
                                                    'Guide',
                                                    'Organization',
                                                    'Supervisor',
                                                    'Basic details',
                                                    'Location',
                                                    'Dates',
                                                    'Budget',
                                                    'Work schedule',
                                                    'Value',
                                            ];
                                            for ($i = 0; $i < $numTabs; $i++)
                                            {
                                                echo "<li>";
                                                echo "<a href='#tab$i' data-toggle='tab'>$tabNames[$i]</a>";
                                                echo "</li>";
                                            }
                                        ?>
                                        {{--<li>--}}
                                            {{--<a href="#tab1" data-toggle="tab">Guide</a>--}}
                                        {{--</li>--}}
                                        {{--<li>--}}
                                            {{--<a href="#tab2" data-toggle="tab">Second</a>--}}
                                        {{--</li>--}}
                                        {{--<li>--}}
                                            {{--<a href="#tab3" data-toggle="tab">Third</a>--}}
                                        {{--</li>--}}
                                    </ul>
                                    <div class="tab-content">
                                        {!! Form::open(['action' => 'InternApplicationController@ajaxStore', 'id' => 'create_application_organization_form']) !!}
                                        {{--<div class="tab-pane" id="tab1">--}}
                                            {{--<h2 class="hidden">&nbsp;</h2>--}}
                                            {{--<div class="form-group">--}}
                                                {{--<label for="userName" class="control-label">User name *</label>--}}
                                                {{--<input id="userName" name="username" type="text" placeholder="Enter your name" class="form-control required">--}}
                                            {{--</div>--}}
                                            {{--<div class="form-group">--}}
                                                {{--<label for="email" class="control-label">Email *</label>--}}
                                                {{--<input id="email" name="email" placeholder="Enter your Email" type="text" class="form-control required email">--}}
                                            {{--</div>--}}
                                            {{--<div class="form-group">--}}
                                                {{--<label for="password" class="control-label">Password *</label>--}}
                                                {{--<input id="password" name="password" type="password" placeholder="Enter your password" class="form-control required">--}}
                                            {{--</div>--}}
                                            {{--<div class="form-group">--}}
                                                {{--<label for="confirm" class="control-label">Confirm Password *</label>--}}
                                                {{--<input id="confirm" name="confirm" type="password" placeholder="Confirm your password " class="form-control required">--}}
                                            {{--</div>--}}
                                        {{--</div>--}}

                                        @include('frontend.partials.internship_application_form.guide')
                                        @include('frontend.partials.internship_application_form.organization')
                                        @include('frontend.partials.internship_application_form.supervisor')
                                        @include('frontend.partials.internship_application_form.basic_details')
                                        @include('frontend.partials.internship_application_form.location')
                                        @include('frontend.partials.internship_application_form.dates')
                                        @include('frontend.partials.internship_application_form.budget')
                                        @include('frontend.partials.internship_application_form.work_schedule')
                                        @include('frontend.partials.internship_application_form.value')

                                        {{--<div class="tab-pane" id="tab2">--}}
                                            {{--<h2 class="hidden">&nbsp;</h2>--}}
                                            {{--<div class="form-group">--}}
                                                {{--<label for="name" class="control-label">First name *</label>--}}
                                                {{--<input id="name" name="fname" placeholder="Enter your First name" type="text" class="form-control required">--}}
                                            {{--</div>--}}
                                            {{--<div class="form-group">--}}
                                                {{--<label for="surname" class="control-label">Last name *</label>--}}
                                                {{--<input id="surname" name="lname" type="text" placeholder=" Enter your Last name" class="form-control required">--}}
                                            {{--</div>--}}
                                            {{--<div class="form-group">--}}
                                                {{--<label for="email">Gender</label>--}}
                                                {{--<select class="form-control" name="gender" id="gender"--}}
                                                        {{--title="Select an account type...">--}}
                                                    {{--<option disabled="" selected="">Select</option>--}}
                                                    {{--<option>MALE</option>--}}
                                                    {{--<option>FEMALE</option>--}}
                                                {{--</select>--}}
                                            {{--</div>--}}
                                            {{--<div class="form-group">--}}
                                                {{--<label for="address" class="control-label">Address</label>--}}
                                                {{--<input id="address" name="address" type="text" class="form-control">--}}
                                            {{--</div>--}}
                                            {{--<div class="form-group">--}}
                                                {{--<label for="age" class="control-label">Age *</label>--}}
                                                {{--<input id="age" name="age" type="text" maxlength="3" class="form-control required number" min="17" data-bv-greaterthan-inclusive="false" data-bv-greaterthan-message="The input must be greater than or equal to 18" max="100" data-bv-lessthan-inclusive="true" data-bv-lessthan-message="The input must be less than 100">                                    </div>--}}
                                        {{--</div>--}}
                                        {{--<div class="tab-pane" id="tab3">--}}
                                            {{--<div class="form-group">--}}
                                                {{--<label for="phone1" class="control-label">Home number *</label>--}}
                                                {{--<input type="text" class="form-control" id="phone1" name="phone1" placeholder="(999)999-9999">--}}
                                            {{--</div>--}}
                                            {{--<div class="form-group">--}}
                                                {{--<label for="phone2" class="control-label">Personal number *</label>--}}
                                                {{--<input type="text" class="form-control" id="phone2" name="phone2" placeholder="(999)999-9999">--}}
                                            {{--</div>--}}
                                            {{--<div class="form-group">--}}
                                                {{--<label for="phone3" class="control-label">Alternate number *</label>--}}
                                                {{--<input type="text" class="form-control" id="phone3" name="phone3" placeholder="(999)999-9999">--}}
                                            {{--</div>--}}
                                            {{--<h2 class="hidden">&nbsp;</h2>--}}
                                            {{--<div class="form-group">--}}
                                                {{--<label>--}}
                                                    {{--<input id="acceptTerms" name="acceptTerms" type="checkbox" class="custom-checkbox"> *I agree with the Terms and Conditions.--}}
                                                {{--</label>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        <ul class="pager wizard">
                                            <li class="previous">
                                                <a href="#">Previous</a>
                                            </li>
                                            <li class="next">
                                                <a href="#">Next</a>
                                            </li>
                                            <li class="next finish" style="display:none;">
                                                <a href="javascript:;">Finish</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div id="myModal" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">User Register</h4>
                                            </div>
                                            <div class="modal-body">
                                                <p>You Submitted Successfully.</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@stop

{{-- page level scripts --}}
@section('footer_scripts')
    <!-- page level js starts-->
    {{--<script type="text/javascript" src="{{ asset('assets/vendors/bootstrap-tagsinput/js/bootstrap-tagsinput.js') }}"></script>--}}
    {{--<script type="text/javascript" src="{{ asset('assets/vendors/modal/js/classie.js') }}"></script>--}}
    {{--<script type="text/javascript" src="{{ asset('assets/vendors/modal/js/modalEffects.js') }}"></script>--}}
    {{--<script type="text/javascript" src="{{ asset('assets/vendors/switchery/js/switchery.js') }}"></script>--}}
    {{--<script type="text/javascript" src="{{ asset('assets/vendors/bootstrap-switch/js/bootstrap-switch.js') }}"></script>--}}
    {{--<script type="text/javascript" src="{{ asset('assets/js/frontend/advfeatures.js') }}"></script>--}}


    <script src="{{ asset('assets/vendors/iCheck/js/icheck.js') }}"></script>
    <script src="{{ asset('assets/vendors/moment/js/moment.min.js') }}" ></script>
    <script src="{{ asset('assets/vendors/select2/js/select2.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/bootstrapwizard/jquery.bootstrap.wizard.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/pages/form_wizard.js') }}"  type="text/javascript"></script>
    <!--page level js ends-->

@stop
