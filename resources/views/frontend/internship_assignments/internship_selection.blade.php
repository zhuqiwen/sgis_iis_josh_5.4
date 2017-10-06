@extends('layouts/default')

{{-- Page title --}}
@section('title')Internship Assignments
@parent
@stop

{{-- page level styles --}}
{{-- page level styles --}}
@section('header_styles')
    <!--page level css starts-->
{{--    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet" />--}}

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/frontend/panel.css') }}">

{{--    <link href="{{ asset('assets/vendors/acc-wizard/acc-wizard.min.css') }}" rel="stylesheet" />--}}
{{--    <link href="{{ asset('assets/css/pages/accordionformwizard.css') }}" rel="stylesheet" />--}}

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/frontend/panel.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/tab.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/float-card.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/pages/buttons.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}" />

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
        {{--<section class="content-header">--}}
            {{--<!--section starts-->--}}
            {{--<h1>Internship Assignments</h1>--}}
        {{--</section>--}}
        <!--section ends-->
        <section class="content">
            <!--main content-->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                {{--<i class="livicon" data-name="printer" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>--}}
                                Internship Assignments
                            </h3>
                            <span class="pull-right clickable">
                                    {{--<i class="glyphicon glyphicon-chevron-up"></i>--}}
                                </span>
                        </div>
                        <div class="panel-body">
                            <div class="bs-example">
                                <ul class="nav nav-tabs" style="margin-bottom: 15px;">
                                    <li class="active">
                                        <a href="#submission_wizard" data-toggle="tab">Submission Wizard</a>
                                    </li>
                                    <li>
                                        <a href="#submitted" data-toggle="tab">Submitted Assignments</a>
                                    </li>
                                </ul>
                                <div id="myTabContent" class="tab-content">
                                    <div class="tab-pane fade active in" id="submission_wizard">
                                        {{--assignment submission wizard--}}
                                        <div id="accordion-demo" class="panel-group">
                                            <div class="panel panel-success">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        <a href="#panel_select_internship" data-parent="#accordion-demo" data-toggle="collapse">Select an Internship</a>
                                                    </h4>
                                                </div>
                                                <div id="panel_select_internship" class="panel-collapse collapse in">
                                                    <div class="panel-body">

                                                        <div class="row">
                                                            <div class="col-sm-12 col-md-8 col-md-offset-2">
                                                                {!! Form::select(
                                                                    'internship_id'
                                                                    , $internship_options
                                                                    , null
                                                                    , [
                                                                        'placeholder' => 'select an internship',
                                                                        'class' => 'form-control',
                                                                        'id' => 'internship_select',
                                                                    ]
                                                                ) !!}
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <!--/.panel-body -->
                                                </div>
                                                <!-- /#prerequisites -->
                                            </div>
                                            <!-- /.panel.panel-default -->

                                            <div class="panel panel-info">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        <a id="assignment_panel_title" href="#panel_assignments" data-parent="#accordion-demo" data-toggle="collapse">Assignments</a>
                                                    </h4>
                                                </div>
                                                {{--<div id="panel_assignments" class="panel-collapse collapse awd-h" style="height: 36.400001525878906px;">--}}
                                                <div id="panel_assignments" class="panel-collapse collapse">
                                                    <div class="panel-body">

                                                    </div>
                                                    <!--/.panel-body -->
                                                </div>
                                                <!-- /#addwizard -->
                                            </div>
                                            <!-- /.panel.panel-default -->

                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="submitted">
                                        {{--submitted assignments grouped by internships--}}
                                        <div id="accordion-internship" class="panel-group">

                                            <?php
                                                echo $internship_panels_submitted;
                                            ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--main content ends--> </section>
    </div>












@stop

{{-- page level scripts --}}
@section('footer_scripts')
    <!-- page level js starts-->
{{--    <script src="{{ asset('assets/vendors/acc-wizard/acc-wizard.min.js') }}" ></script>--}}
    <script src="{{ asset('assets/js/frontend/ajax_init.js') }}"  type="text/javascript"></script>
    <script src="{{ asset('assets/js/pages/internship_assignments.js') }}"  type="text/javascript"></script>

    <!--page level js ends-->

@stop
