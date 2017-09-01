<li {!! (Request::is('admin/overseas_study_funding') || Request::is('admin/approve_osf_application') ? 'class="active"' : '') !!}>
    <a href="#">
        <i class="livicon" data-name="medal" data-size="18" data-c="#6CC66C" data-hc="#6CC66C"
           data-loop="true"></i>
        <span class="title">Overseas Study Funding</span>
        <span class="fa arrow"></span>
    </a>
    <ul class="sub-menu">
        <li {!! (Request::is('admin/approve_osf_application') ? 'class="active"' : '') !!}>
            <a href="{{ URL::to('admin/approve_osf_application') }}">
                <i class="fa fa-angle-double-right"></i>
                Approve Applications
            </a>
        </li>
    </ul>
</li>