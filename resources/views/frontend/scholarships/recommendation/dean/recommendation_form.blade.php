<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dean Scholarship Recommendation | SGIS IIS</title>
    <!--global css starts-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">
    <!--end of global css-->
    <!--page level css starts-->
{{--    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/iCheck/css/all.css')}}" />--}}
{{--    <link href="{{ asset('assets/vendors/bootstrapvalidator/css/bootstrapValidator.min.css') }}" rel="stylesheet"/>--}}
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/frontend/register.css') }}">
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
    <!--end of page level css-->
</head>
<body>
<div class="container">
    <!--Content Section Start -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            {{--<i class="livicon" data-name="folder-add" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> --}}
                            Dean's Summer Internship Scholarship Recommendation
                        </h3>
                        <div id="notific">
                            @include('notifications')
                        </div>
                        {{--<span class="pull-right clickable">--}}
                        {{--<i class="glyphicon glyphicon-chevron-up"></i>--}}
                    </span>
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('submit_dean_scholarship_recommendation') }}" method="post" id="dean_scholarship_recommendation_form">
                            <!-- CSRF Token -->
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                            {!! Form::hidden('portal_id', $portal_id) !!}
                            {!! Form::hidden('dean_application_id', $dean_application_id) !!}

                            <div id="rootwizard">
                                <ul>

                                    <?php
                                    $tabNames = [
                                        'Guide',
                                        'Recommendation',
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


                                    @include('frontend.partials.scholarship_recommendation.dean.guide')
                                    @include('frontend.partials.scholarship_recommendation.dean.dean_scholarship_recommendation')


                                    <ul class="pager wizard">
                                        <li class="previous">
                                            <a href="#">Previous</a>
                                        </li>
                                        <li class="next">
                                            <a href="#">Next</a>
                                        </li>
                                        <li class="next finish" style="display:none;">
                                            {{--<a href="javascript:;" type="submit">Finish</a>--}}
                                            <a href="javascript:;">Preview</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div id="recommendation_preview_modal" class="modal fade" role="dialog">
                                <div class="modal-dialog"  style="width: 75%;">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Preview</h4>
                                        </div>
                                        <div id="recommendation_preview_modal_body"  class="modal-body">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Edit</button>
                                            <button id="recommendation_submit_button" type="submit" class="btn btn-default" data-dismiss="modal">Submit</button>
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
    <!-- //Content Section End -->
</div>
<!--global js starts-->
<script type="text/javascript" src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
{{--<script src="{{ asset('assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js') }}" type="text/javascript"></script>--}}
{{--<script type="text/javascript" src="{{ asset('assets/vendors/iCheck/js/icheck.js') }}"></script>--}}
<script type="text/javascript" src="{{ asset('assets/js/frontend/register_custom.js') }}"></script>
<!--global js end-->

<script src="{{ asset('assets/js/frontend/ajax_init.js') }}"></script>
<script src="{{ asset('assets/vendors/iCheck/js/icheck.js') }}"></script>
<script src="{{ asset('assets/vendors/moment/js/moment.min.js') }}" ></script>
<script src="{{ asset('assets/vendors/select2/js/select2.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/bootstrapwizard/jquery.bootstrap.wizard.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/pages/dean_scholarship_recommendation_form.js') }}"  type="text/javascript"></script>
<!--page level js ends-->

</body>
</html>
