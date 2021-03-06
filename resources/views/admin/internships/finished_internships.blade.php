<?php
        $today = \Carbon\Carbon::now(config('constants.current_time_zone'))->toDateString();
?>

@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    Approve Internship Applications
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')

    <link rel="stylesheet" href="{{ asset('assets/css/pages/finished_internships_tab.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/float-card.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/pages/buttons.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}" />

    <style>
        @media (min-width:320px) and (max-width:425px){
            .popover.left{
                width:100px !important;
            }
        }
        .panel-title
        {
            color: white;
        }
    </style>
@stop

{{-- Page content --}}
@section('content')

    @include('admin.layouts.partials.content_header.internship_management')
    <!--section ends-->
    <section class="content">
        <!--main content-->
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">

                        <h3 class="panel-title">
                            Finished Internships as of {{ $today }}
                        </h3>

                        <div class=" kal pull-right">
                            <!-- Tabs -->
                            <ul class="nav panel-tabs">
                                <li class="active" id="tab_assignment_complete">
                                    <a href="#tab1" data-toggle="tab">Assignment Complete</a>
                                </li>
                                <li id="tab_assignment_incomplete">
                                    <a href="#tab2" data-toggle="tab">Assignment Incomplete</a>
                                </li>
                                <li id="tab_finalized">
                                    <a href="#tab3" data-toggle="tab">Archived Internships</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="tab-content" id="slim1">
                            <div class="tab-pane text-justify active" id="tab1">
                                <h4>
                                    <span>
                                        Finished Internships with <strong>all required assignments submitted</strong> as of {{ $today }}
                                    </span>
                                </h4>
                                {{--float cards--}}
                                <div class="row">
                                    <?php
                                        echo $cards_fiac;
                                    ?>
                                </div>

                            </div>
                            <div class="tab-pane text-justify" id="tab2">
                                <h4>
                                    <span>
                                        Finished Internships with <strong>at least 1 required assignments missing</strong> as of {{ $today }}
                                    </span>

                                </h4>
                                {{--float cards--}}
                                <div class="row">
                                    <?php
                                    echo $cards_fiai;

                                    ?>
                                </div>
                            </div>
                            <div class="tab-pane text-justify" id="tab3">
                                <h4> Finalized Internships</h4>
                                {{--here are applications' float cards--}}
                                <div class="row">
                                    <?php
                                        echo $cards_ci
                                    ?>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!--main content ends-->
    </section>
    <!-- content -->

@stop

{{-- page level scripts --}}
@section('footer_scripts')
    <script src="{{ asset('assets/js/frontend/ajax_init.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/pages/finished_internships.js') }}" type="text/javascript"></script>
@stop
