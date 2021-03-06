@extends('admin.layouts.default')

{{-- Page title --}}
@section('title')
    {{$page_title}}
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
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pages/admin/alum_datatable.css') }}"/>

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/c3/c3.min.css') }}" rel="stylesheet" type="text/css" />
{{--    <link href="{{ asset('assets/css/pages/piecharts.css') }}" rel="stylesheet" type="text/css" />--}}
@stop

{{-- Page content --}}
@section('content')

    <section class="content-header">
        <h1>{{ $page_title }}</h1>
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
                                    <i class="livicon" data-name="edit" data-size="16" data-loop="true" data-c="#fff"
                                       data-hc="white"></i>
                                    Data: </span>
                            <small>Double click a row for more details</small>
                        </h3>
                    </div>
                    <div class="panel-body">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                        <div id="sample_editable_1_wrapper" class="">
                            {{--Add button and modal--}}
                            <button id="add_button" type="button" class="btn btn-responsive button-alignment btn-primary">Add</button>
                            {{--END Add button and modal--}}

                            {{--Columns Toggle wrapper--}}
                            <div id="toggles_div_wrapper">
                            </div>
                            {{--END Columns Toggle wrapper--}}

                            {{--Datatables--}}
                            <div class="table-responsive" id="responsive_table_div">

                            </div>
                            {{--END Datatables--}}
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
    <div id="visualization_modal_container"></div>
@stop

{{-- page level scripts --}}
@section('footer_scripts')

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
    {{--<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/buttons.print.js') }}"></script>--}}
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/pdfmake.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/vfs_fonts.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.scroller.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/select2/js/select2.js') }}"></script>
    {{--<script type="text/javascript" src="{{ asset('assets/js/pages/table-editable.js') }}" ></script>--}}
    <script src="{{ asset('assets/vendors/sweetalert/js/sweetalert.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/sweetalert/js/sweetalert-dev.js') }}" type="text/javascript"></script>

    <script src="{{ asset('assets/vendors/jqvmap/js/jquery.vmap.js') }}"  type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/jqvmap/js/jquery.vmap.world.js') }}"  type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/jqvmap/js/jquery.vmap.usa.js') }}"  type="text/javascript"></script>


    <script src="{{ asset('assets/js/frontend/ajax_init.js') }}" type="text/javascript"></script>
    <script src="{{ $page_specific_js}}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/pages/admin/alum_datatables_init.js') }}" type="text/javascript"></script>

    <script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/d3/d3.min.js') }}"></script>
    <script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/d3pie/d3pie.min.js') }}"></script>
    <script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/c3/c3.min.js') }}"></script>




@stop
