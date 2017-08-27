<li {!! (Request::is('admin/animatedicons') || Request::is('admin/buttons') || Request::is('admin/advanced_buttons') || Request::is('admin/tabs_accordions') || Request::is('admin/panels') || Request::is('admin/icon') || Request::is('admin/color') || Request::is('admin/grid') || Request::is('admin/carousel') || Request::is('admin/advanced_modals') || Request::is('admin/tagsinput') || Request::is('admin/nestable_list') || Request::is('admin/sortable_list') || Request::is('admin/toastr') || Request::is('admin/notifications')|| Request::is('admin/treeview_jstree')|| Request::is('admin/sweetalert') || Request::is('admin/session_timeout') || Request::is('admin/portlet_draggable') ? 'class="active"' : '') !!}>
    <a href="#">
        <i class="livicon" data-name="brush" data-c="#F89A14" data-hc="#F89A14" data-size="18"
           data-loop="true"></i>
        <span class="title">UI Features</span>
        <span class="fa arrow"></span>
    </a>
    <ul class="sub-menu">
        <li {!! (Request::is('admin/animatedicons') ? 'class="active"' : '') !!}>
            <a href="{{ URL::to('admin/animatedicons') }}">
                <i class="fa fa-angle-double-right"></i>
                Animated Icons
            </a>
        </li>
        <li {!! (Request::is('admin/buttons') ? 'class="active"' : '') !!}>
            <a href="{{ URL::to('admin/buttons') }}">
                <i class="fa fa-angle-double-right"></i>
                Buttons
            </a>
        </li>
        <li {!! (Request::is('admin/advanced_buttons') ? 'class="active"' : '') !!}>
            <a href="{{ URL::to('admin/advanced_buttons') }}">
                <i class="fa fa-angle-double-right"></i>
                Advanced Buttons
            </a>
        </li>
        <li {!! (Request::is('admin/tabs_accordions') ? 'class="active"' : '') !!}>
            <a href="{{ URL::to('admin/tabs_accordions') }}">
                <i class="fa fa-angle-double-right"></i>
                Tabs and Accordions
            </a>
        </li>
        <li {!! (Request::is('admin/panels') ? 'class="active"' : '') !!}>
            <a href="{{ URL::to('admin/panels') }}">
                <i class="fa fa-angle-double-right"></i>
                Panels
            </a>
        </li>
        <li {!! (Request::is('admin/icon') ? 'class="active"' : '') !!}>
            <a href="{{ URL::to('admin/icon') }}">
                <i class="fa fa-angle-double-right"></i>
                Font Icons
            </a>
        </li>
        <li {!! (Request::is('admin/color') ? 'class="active"' : '') !!}>
            <a href="{{ URL::to('admin/color') }}">
                <i class="fa fa-angle-double-right"></i>
                Color Picker Slider
            </a>
        </li>
        <li {!! (Request::is('admin/grid') ? 'class="active"' : '') !!}>
            <a href="{{ URL::to('admin/grid') }}">
                <i class="fa fa-angle-double-right"></i>
                Grid Layout
            </a>
        </li>
        <li {!! (Request::is('admin/carousel') ? 'class="active"' : '') !!}>
            <a href="{{ URL::to('admin/carousel') }}">
                <i class="fa fa-angle-double-right"></i>
                Carousel
            </a>
        </li>
        <li {!! (Request::is('admin/advanced_modals') ? 'class="active"' : '') !!}>
            <a href="{{ URL::to('admin/advanced_modals') }}">
                <i class="fa fa-angle-double-right"></i>
                Advanced Modals
            </a>
        </li>
        <li {!! (Request::is('admin/tagsinput') ? 'class="active"' : '') !!}>
            <a href="{{ URL::to('admin/tagsinput') }}">
                <i class="fa fa-angle-double-right"></i>
                Tags Input
            </a>
        </li>
        <li {!! (Request::is('admin/nestable_list') ? 'class="active"' : '') !!}>
            <a href="{{ URL::to('admin/nestable_list') }}">
                <i class="fa fa-angle-double-right"></i>
                Nestable List
            </a>
        </li>

        <li {!! (Request::is('admin/sortable_list') ? 'class="active"' : '') !!}>
            <a href="{{ URL::to('admin/sortable_list') }}">
                <i class="fa fa-angle-double-right"></i>
                Sortable List
            </a>
        </li>

        <li {!! (Request::is('admin/treeview_jstree') ? 'class="active"' : '') !!}>
            <a href="{{ URL::to('admin/treeview_jstree') }}">
                <i class="fa fa-angle-double-right"></i>
                Treeview and jsTree
            </a>
        </li>

        <li {!! (Request::is('admin/toastr') ? 'class="active"' : '') !!}>
            <a href="{{ URL::to('admin/toastr') }}">
                <i class="fa fa-angle-double-right"></i>
                Toastr Notifications
            </a>
        </li>

        <li {!! (Request::is('admin/sweetalert') ? 'class="active"' : '') !!}>
            <a href="{{ URL::to('admin/sweetalert') }}">
                <i class="fa fa-angle-double-right"></i>
                Sweet Alert
            </a>
        </li>

        <li {!! (Request::is('admin/notifications') ? 'class="active"' : '') !!}>
            <a href="{{ URL::to('admin/notifications') }}">
                <i class="fa fa-angle-double-right"></i>
                Notifications
            </a>
        </li>
        <li {!! (Request::is('admin/session_timeout') ? 'class="active"' : '') !!}>
            <a href="{{ URL::to('admin/session_timeout') }}">
                <i class="fa fa-angle-double-right"></i>
                Session Timeout
            </a>
        </li>
        <li {!! (Request::is('admin/portlet_draggable') ? 'class="active"' : '') !!}>
            <a href="{{ URL::to('admin/portlet_draggable') }}">
                <i class="fa fa-angle-double-right"></i>
                Draggable Portlets
            </a>
        </li>
    </ul>
</li>