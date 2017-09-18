@extends('admin.layouts.default')

{{-- Page title --}}
@section('title')
    Alumni Contacts
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <meta name="_token" content="{!! csrf_token() !!}"/>
    <link href="{{ asset('assets/vendors/sweetalert/css/sweetalert.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/select2/css/select2.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/select2/css/select2-bootstrap.css') }}"/>
    <link rel="stylesheet" type="text/css"
          href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/buttons.bootstrap.css') }}"/>
    <link rel="stylesheet" type="text/css"
          href="{{ asset('assets/vendors/datatables/css/colReorder.bootstrap.css') }}"/>
    <link rel="stylesheet" type="text/css"
          href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.css') }}"/>
    <link rel="stylesheet" type="text/css"
          href="{{ asset('assets/vendors/datatables/css/rowReorder.bootstrap.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/buttons.bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/scroller.bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pages/tables.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pages/admin/alum_datable.css') }}"/>
@stop

{{-- Page content --}}
@section('content')

    <section class="content-header">
        <h1>Alumni Contacts</h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Second Data Table -->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="panel panel-danger table-edit">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                                    <span>
                                    {{--<i class="livicon" data-name="edit" data-size="16" data-loop="true" data-c="#fff"--}}
                                       {{--data-hc="white"></i>--}}
                                    Contacts</span>
                        </h3>
                    </div>
                    <div class="panel-body">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                        <div id="sample_editable_1_wrapper" class="">
                            {{--Add button and modal--}}
                            <button id="add_button" type="button" class="btn btn-responsive button-alignment btn-primary">Add Contact</button>
                            {{--END Add button and modal--}}

                            <div id="toggles_div_wrapper">
                            </div>


                            <div class="table-responsive" id="responsive_table_div">
                                {{--insert table here--}}
                            </div>
                        </div>
                        <!-- END EXAMPLE TABLE PORTLET-->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- content -->
    <div class="modal fade" id="alum_study_field_public_modal" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">
                        {{--insert title using js--}}
                    </h4>
                </div>
                <div class="modal-body">
                    {{--insert form using js--}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    {{--update button using js; create: btn-primary, create; update/edit: btn-danger, update--}}
                    <button type="submit" class="btn" id="public_modal_submit_button" data-dismiss="modal"></button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
@stop

{{-- page level scripts --}}
@section('footer_scripts')

    <script src="{{ asset('assets/js/frontend/ajax_init.js') }}" type="text/javascript"></script>


    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/jquery.dataTables.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.bootstrap.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.buttons.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.colReorder.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.responsive.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.rowReorder.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/buttons.colVis.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/buttons.html5.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/buttons.print.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/buttons.bootstrap.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/buttons.print.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/pdfmake.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/vfs_fonts.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.scroller.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/select2/js/select2.js') }}"></script>
    <script src="{{ asset('assets/vendors/sweetalert/js/sweetalert.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/sweetalert/js/sweetalert-dev.js') }}" type="text/javascript"></script>



    <script src="{{ asset('assets/js/pages/admin/alum_contacts/alumni_contacts.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/pages/admin/alum_datatables_init.js') }}" type="text/javascript"></script>


{{--    <script src="{{ asset('assets/vendors/jqvmap/js/jquery.vmap.sampledata.js') }}" ></script>--}}

    {{--<script type="text/javascript">--}}
        {{--jQuery(document).ready(function() {--}}
            {{--jQuery('#geo_distribution_world_map').vectorMap({--}}
                {{--map: 'world_en',--}}
                {{--backgroundColor: '#ffffff',--}}
                {{--color: '#ffffff',--}}
                {{--hoverOpacity: 0.7,--}}
                {{--selectedColor: '#666666',--}}
                {{--enableZoom: true,--}}
                {{--showTooltip: true,--}}
                {{--values: sample_data,--}}
                {{--scaleColors: ['#045707', '#84F088'],--}}
                {{--normalizeFunction: 'polynomial'--}}
            {{--});--}}
{{--//            jQuery('#vmapusa').vectorMap({--}}
{{--//                map: 'usa_en',--}}
{{--//                backgroundColor: '#ffffff',--}}
{{--//                color: '#ffffff',--}}
{{--//                hoverOpacity: 0.7,--}}
{{--//                selectedColor: '#666666',--}}
{{--//                enableZoom: true,--}}
{{--//                showTooltip: true,--}}
{{--//                values: sample_data,--}}
{{--//                scaleColors: ['#5bc0de', '#D6DBDE'],--}}
{{--//                normalizeFunction: 'polynomial'--}}
{{--//            });--}}
        {{--});--}}
        {{--$('.map_size').closest('.panel-body').on('resize', function () {--}}
            {{--$(window).trigger('resize');--}}
        {{--});--}}
{{--//        $('#slim1').slimscroll({--}}
{{--//            height: '500px',--}}
{{--//            size: '3px',--}}
{{--//            color: '#D84A38',--}}
{{--//            opacity: 1--}}
{{--//        });--}}
    {{--</script>--}}




@stop
