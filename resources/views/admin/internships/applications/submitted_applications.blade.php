@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    Approve Internship Applications
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

    <section class="content-header">
        <!--section starts-->
        <h1>Applications to be approved</h1>

    </section>
    <!--section ends-->
    <section class="content">
        <!--main content-->
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">

                        <h3 class="panel-title">
                            <span>
                                <i class="livicon" data-name="piggybank" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                            Submitted Internship Applications
                            </span>

                            <button id="button_approve" type="button" class="btn btn-sm btn-warning">
                                <span class="glyphicon glyphicon-check"></span> Approve
                            </button>
                            <button id="button_unapprove" type="button" class="btn btn-sm btn-warning" style="display: none;">
                                <span class="glyphicon glyphicon-check"></span> Un-Approve
                            </button>
                        </h3>





                        <div class=" kal pull-right">
                            <!-- Tabs -->
                            <ul class="nav panel-tabs">
                                <li class="active" id="tab_tobeapproved">
                                    <a href="#tab1" data-toggle="tab">To be approved</a>
                                </li>
                                <li id="tab_approved">
                                    <a href="#tab2" data-toggle="tab">Approved</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="tab-content" id="slim1">
                            <div class="tab-pane text-justify active" id="tab1">
                                <h4> Applications that need approval</h4>
                                {{--here are applications' float cards--}}
                                <div class="row">
                                    <?php
                                        echo $submitted_application_cards;
                                    ?>
                                </div>

                            </div>
                            <div class="tab-pane text-justify" id="tab2">
                                <h4> Approved Applications</h4>
                                {{--here are applications' float cards--}}
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
    <script src="{{ asset('assets/js/pages/submitted_internship_applications.js') }}" type="text/javascript"></script>
@stop
