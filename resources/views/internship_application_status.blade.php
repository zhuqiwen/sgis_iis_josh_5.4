@extends('layouts/default')

{{-- Page title --}}
@section('title')Create Internship Application
@parent
@stop

{{-- page level styles --}}
{{-- page level styles --}}
@section('header_styles')
    <!--page level css starts-->
{{--    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/bootstrap-tagsinput/css/bootstrap-tagsinput.css') }}" />--}}
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/frontend/panel.css') }}">
{{--    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/frontend/features.css') }}">--}}
{{--    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/frontend/timeline.css') }}">--}}
{{--    <link type="text/css" rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-switch/css/bootstrap-switch.css') }}">--}}
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
                <h3 style="margin-left: 13px;">Hi, {{ Sentinel::getUser()->first_name }}, Here are your Internship Applications</h3>
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 class="panel-title">Submitted Applications</h4>
                            <span class="pull-right clickable">
                                <i class="glyphicon glyphicon-chevron-up"></i>
                            </span>
                        </div>
                        <div class="panel-body">
                            <p>
                                There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h4 class="panel-title">Approved Applications</h4>
                            <span class="pull-right clickable">
                                <i class="glyphicon glyphicon-chevron-up"></i>
                            </span>
                        </div>
                        <div class="panel-body">
                            <p>
                                There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.
                            </p>
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
{{--    <script type="text/javascript" src="{{ asset('assets/vendors/bootstrap-tagsinput/js/bootstrap-tagsinput.js') }}"></script>--}}
{{--    <script type="text/javascript" src="{{ asset('assets/vendors/modal/js/classie.js') }}"></script>--}}
{{--    <script type="text/javascript" src="{{ asset('assets/vendors/modal/js/modalEffects.js') }}"></script>--}}
{{--    <script type="text/javascript" src="{{ asset('assets/vendors/bootstrap-switch/js/bootstrap-switch.js') }}"></script>--}}
    <script type="text/javascript" src="{{ asset('assets/js/pages/internship_application_status.js') }}"></script>
    <!--page level js ends-->

@stop
