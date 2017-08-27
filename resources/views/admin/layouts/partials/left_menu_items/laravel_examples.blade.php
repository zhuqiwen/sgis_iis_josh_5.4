<li {!! (Request::is('admin/datatables') || Request::is('admin/editable_datatables') || Request::is('admin/dropzone') || Request::is('admin/multiple_upload') || Request::is('admin/custom_datatables')? 'class="active"' : '') !!}>
    <a href="#">
        <i class="livicon" data-name="medal" data-size="18" data-c="#6CC66C" data-hc="#6CC66C"
           data-loop="true"></i>
        <span class="title">Laravel Examples</span>
        <span class="fa arrow"></span>
    </a>
    <ul class="sub-menu">
        <li {!! (Request::is('admin/datatables') ? 'class="active"' : '') !!}>
            <a href="{{ URL::to('admin/datatables') }}">
                <i class="fa fa-angle-double-right"></i>
                Ajax Data Tables
            </a>
        </li>
        <li {!! (Request::is('admin/editable_datatables') ? 'class="active"' : '') !!}>
            <a href="{{ URL::to('admin/editable_datatables') }}">
                <i class="fa fa-angle-double-right"></i>
                Editable Data Tables
            </a>
        </li>
        <li {!! (Request::is('admin/custom_datatables') ? 'class="active"' : '') !!}>
            <a href="{{ URL::to('admin/custom_datatables') }}">
                <i class="fa fa-angle-double-right"></i>
                Custom Datatables
            </a>
        </li>
        <li {!! (Request::is('admin/dropzone') ? 'class="active"' : '') !!}>
            <a href="{{ URL::to('admin/dropzone') }}">
                <i class="fa fa-angle-double-right"></i>
                Drop Zone
            </a>
        </li>
        <li {!! (Request::is('admin/multiple_upload') ? 'class="active"' : '') !!}>
            <a href="{{ URL::to('admin/multiple_upload') }}">
                <i class="fa fa-angle-double-right"></i>
                Multiple File Upload
            </a>
        </li>
    </ul>
</li>