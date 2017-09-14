<li {!! (Request::is('admin/scholarships') ? 'class="active"' : '') !!}>
    <a href="#">
        <i class="livicon" data-name="medal" data-size="18" data-c="#6CC66C" data-hc="#6CC66C"
           data-loop="true"></i>
        <span class="title">Overseas Study Funding</span>
        <span class="fa arrow"></span>
    </a>
    <ul class="sub-menu">
        <li {!! (Request::is('admin/scholarships') ? 'class="active"' : '') !!}>
            <a href="{{ URL::to('admin/scholarships') }}">
                <i class="fa fa-angle-double-right"></i>
                Manage Scholarships
            </a>
        </li>
    </ul>
</li>