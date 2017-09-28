@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    Dean's Scholarship Applications
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')

    <link rel="stylesheet" href="{{ asset('assets/css/pages/tab.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/float-card.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/pages/buttons.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}" />

    <style>
        @media (min-width:320px) and (max-width:425px){
            .popover.left{
                width:100px !important;
            }
        }
    </style>
@stop

{{-- Page content --}}
@section('content')

    @include('admin.layouts.partials.content_header.scholarship_management')
    <!--section ends-->
    <section class="content">
        <!--main content-->
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">

                        <h3 class="panel-title">
                            {{--<i class="livicon" data-name="piggybank" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>--}}
                            Dean's Summer Internship Scholarship Applications

                        </h3>





                        <div class=" kal pull-right">
                            <!-- Tabs -->
                            <ul class="nav panel-tabs">
                                <li class="active" id="tab_tobeapproved">
                                    <a href="#tab1" data-toggle="tab">To be reviewed</a>
                                </li>
                                <li id="tab_approved">
                                    <a href="#tab2" data-toggle="tab">Forwarded</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form method="post" action="#">
                            <div class="tab-content" id="slim1">
                                <div class="tab-pane text-justify active" id="tab1">
                                    <h4>
                                    <span>
                                        Applications that need review
                                    </span>
                                        <button id="button_approve" type="button" class="btn btn-sm btn-warning" disabled>
                                            <span class="glyphicon glyphicon-check"></span> Forward to Committee
                                        </button>
                                    </h4>
                                    {{--here are applications' float cards--}}
                                    <div class="row">
                                        <?php
//                                        echo $submitted_application_cards;
                                        ?>
                                    </div>

                                </div>
                                <div class="tab-pane text-justify" id="tab2">
                                    <h4> Forwarded Applications</h4>
                                    {{--here are applications' float cards--}}
                                    <div class="row">
                                        <?php
//                                        echo $approved_application_cards;
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </form>

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
    <script src="{{ asset('assets/js/pages/submitted_dean_scholarship_applications.js') }}" type="text/javascript"></script>
@stop
