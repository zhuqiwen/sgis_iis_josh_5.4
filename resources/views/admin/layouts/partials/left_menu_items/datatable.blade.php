<li {!! (Request::is('admin/simple_table') || Request::is('admin/responsive_tables') || Request::is('admin/advanced_tables') || Request::is('admin/advanced_tables2') ? 'class="active"' : '') !!}>
    <a href="#">
        <i class="livicon" data-name="table" data-c="#418BCA" data-hc="#418BCA" data-size="18"
           data-loop="true"></i>
        <span class="title">DataTables</span>
        <span class="fa arrow"></span>
    </a>
    <ul class="sub-menu">
        <li {!! (Request::is('admin/simple_table') ? 'class="active"' : '') !!}>
            <a href="{{ URL::to('admin/simple_table') }}">
                <i class="fa fa-angle-double-right"></i>
                Simple tables
            </a>
        </li>
        <li {!! (Request::is('admin/advanced_tables') ? 'class="active"' : '') !!}>
            <a href="{{ URL::to('admin/advanced_tables') }}">
                <i class="fa fa-angle-double-right"></i>
                Advanced Data Tables
            </a>
        </li>
        <li {!! (Request::is('admin/advanced_tables2') ? 'class="active"' : '') !!}>
            <a href="{{ URL::to('admin/advanced_tables2') }}">
                <i class="fa fa-angle-double-right"></i>
                Advanced Data Tables2
            </a>
        </li>

        <li {!! (Request::is('admin/responsive_tables') ? 'class="active"' : '') !!}>
            <a href="{{ URL::to('admin/responsive_tables') }}">
                <i class="fa fa-angle-double-right"></i>
                Responsive Datatables
            </a>
        </li>
    </ul>
</li>
