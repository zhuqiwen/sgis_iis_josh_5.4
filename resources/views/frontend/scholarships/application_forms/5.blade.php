@extends('layouts/default')

{{-- Page title --}}
@section('title')Create Internship Application
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
    <link href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}"  rel="stylesheet" type="text/css" />


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
                                <i class="livicon" data-name="folder-add" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> Dean's Summer Internship Scholarship
                            </h3>
                            {{--<span class="pull-right clickable">--}}
                        {{--<i class="glyphicon glyphicon-chevron-up"></i>--}}
                    {{--</span>--}}
                        </div>
                        <div class="panel-body">
                            <form id="scholarship_dean_application_form" method="post" action="#">
                                <div id="rootwizard">
                                    <ul>

                                        <?php
                                            $tabNames = [
                                                    'Guide',
                                                    'Internship',
                                                    'Liability Release',
                                                    'Recommendation',
                                                    'Transcript',
                                            ];
                                            for ($i = 0; $i < sizeof($tabNames); $i++)
                                            {
                                                echo "<li>";
                                                echo "<a href='#tab$i' data-toggle='tab'>$tabNames[$i]</a>";
                                                echo "</li>";
                                            }
                                        ?>

                                    </ul>
                                    <div class="tab-content">


                                        @include('frontend.partials.scholarship_application_form.dean.guide_and_internship_selection')
                                        @include('frontend.partials.scholarship_application_form.dean.verify_internship')
                                        @include('frontend.partials.scholarship_application_form.dean.liability_release')
                                        @include('frontend.partials.scholarship_application_form.dean.recommendation_info')
                                        @include('frontend.partials.scholarship_application_form.dean.transcript_upload')




                                        <ul class="pager wizard">
                                            <li class="previous">
                                                <a href="#">Previous</a>
                                            </li>
                                            <li class="next">
                                                <a href="#">Next</a>
                                            </li>
                                            <li class="next finish" style="display:none;">
                                                <a href="javascript:;" type="submit">Finish</a>
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

    <script src="{{ asset('assets/js/frontend/ajax_init.js') }}"></script>
    <script src="{{ asset('assets/vendors/iCheck/js/icheck.js') }}"></script>
    <script src="{{ asset('assets/vendors/moment/js/moment.min.js') }}" ></script>
    <script src="{{ asset('assets/vendors/select2/js/select2.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/bootstrapwizard/jquery.bootstrap.wizard.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/pages/scholarship_dean_application.js') }}"  type="text/javascript"></script>
    <!--page level js ends-->

@stop
