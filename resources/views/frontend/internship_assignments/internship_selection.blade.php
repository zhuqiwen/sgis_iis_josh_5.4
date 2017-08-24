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
                                <form id="form-addwizard">
                                    <p>
                                        If you haven't already found it, the source code for the accordion wizard is available on github
                                        <a href="https://github.com/sathomas/acc-wizard">here</a>
                                        . There are two main folders,
                                        <code>/src</code>
                                        and
                                        <code>/release</code>
                                        .
                                    </p>
                                    <p>
                                        There are two different ways to add the accordion wizard to your pages. The simplest approach is just to add the CSS and javascript files from the
                                        <code>/release</code>
                                        folder directly in your HTML without modifying them:
                                    </p>
                                    <pre>&lt;link href="css/bootstrap.min.css" rel="stylesheet"&gt;
                                                            &lt;link href="css/acc-wizard.min.css" rel="stylesheet"&gt;
                                                        </pre>
                                    <p>and</p>
                                    <pre>&lt;script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" type="text/javascript"&gt;&lt;/script&gt;
                                                            &lt;script src="js/bootstrap.min.js"&gt;&lt;/script&gt;
                                                            &lt;script src="js/acc-wizard.min.js"&gt;&lt;/script&gt;
                                                        </pre>
                                    <p>
                                        The release styles for the accordion wizard are based on Bootstrap's default styles. If you've tweaked the Bootstrap styles (e.g. by changing the link color), you'll want to make corresponding tweaks to
                                        <code>acc-wizard.min.css</code>
                                        .
                                    </p>
                                    <p>
                                        Alternatively, if you're building custom CSS and javascript, then you might want to start with the files in the
                                        <code>/src</code>
                                        folder and adapt them to your source code. The
                                        <code>/src</code>
                                        folder contains a LESS file and uncompressed (and commented) javascript. Note that the
                                        <code>acc-wizard.less</code>
                                        file depends on variables defined in Bootstrap's
                                        <code>variables.less</code>
                                        file.
                                    </p>
                                    <div class="acc-wizard-step"></div>
                                </form>
                            </div>
                            <!--/.panel-body --> </div>
                        <!-- /#addwizard --> </div>
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
{{--    <script src="{{ asset('assets/js/pages/accordionformwizard.js') }}"  type="text/javascript"></script>--}}
    <!--page level js ends-->

@stop