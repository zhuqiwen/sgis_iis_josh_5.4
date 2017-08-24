@extends('layouts/default')

{{-- Page title --}}
@section('title')Create Internship Application
@parent
@stop

{{-- page level styles --}}
{{-- page level styles --}}
@section('header_styles')
    <!--page level css starts-->
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet" />

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/frontend/panel.css') }}">

    <link href="{{ asset('assets/vendors/acc-wizard/acc-wizard.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/pages/accordionformwizard.css') }}" rel="stylesheet" />

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
        <section class="content-header">
            <!--section starts-->
            <h1>Internship Assignment submission wizards</h1>
        </section>
        <!--section ends-->
        <section class="content">
            <!--main content-->
            <div class="row">
                <div id="accordion-demo" class="panel-group">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a href="#prerequisites" data-parent="#accordion-demo" data-toggle="collapse">Select an Internship</a>
                            </h4>
                        </div>
                        <div id="prerequisites" class="panel-collapse collapse in">
                            <div class="panel-body">

                                <div class="row">
                                    <div class="col-sm-12 col-md-8 col-md-offset-2">
                                        {!! Form::select(
                                            'internship_id'
                                            , [
                                                '1' => 'internship 1',
                                                '2' => 'internship 2',
                                            ]
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
                                <a href="#addwizard" data-parent="#accordion-demo" data-toggle="collapse">Assignments</a>
                            </h4>
                        </div>
                        <div id="addwizard" class="panel-collapse collapse awd-h" style="height: 36.400001525878906px;">
                            <div class="panel-body">

                            </div>
                            <!--/.panel-body -->
                        </div>
                        <!-- /#addwizard -->
                    </div>
                    <!-- /.panel.panel-default -->

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
