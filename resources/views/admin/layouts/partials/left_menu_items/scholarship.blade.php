<li {!! (Request::is('admin/scholarships') || Request::is('admin/scholarship_deans') ? 'class="active"' : '') !!}>
    <a href="#">
        <i class="livicon" data-name="medal" data-size="18" data-c="#6CC66C" data-hc="#6CC66C"
           data-loop="true"></i>
        <span class="title">Scholarships</span>
        <span class="fa arrow"></span>
    </a>
    <ul class="sub-menu">
        <li {!! (Request::is('admin/scholarships') ? 'class="active"' : '') !!}>
            <a href="{{ URL::to('admin/scholarships') }}">
                <i class="fa fa-angle-double-right"></i>
                Manage Scholarships
            </a>
        </li>

        <li {!! (Request::is('admin/scholarship_deans') ? 'class="active"' : '') !!}>
            <a href="{{ URL::to('admin/scholarship_deans') }}">
                <i class="fa fa-angle-double-right"></i>
                Applications for Deans
            </a>
        </li>
    </ul>
</li>