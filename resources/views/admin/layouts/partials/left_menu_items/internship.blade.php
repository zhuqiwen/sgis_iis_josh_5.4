<li {!! (Request::is('admin/internships') || Request::is('admin/approve_internship_applications') || Request::is('admin/archive_internships') ? 'class="active"' : '') !!}>
    <a href="#">
        <i class="livicon" data-name="medal" data-size="18" data-c="#6CC66C" data-hc="#6CC66C"
           data-loop="true"></i>
        <span class="title">Internships</span>
        <span class="fa arrow"></span>
    </a>
    <ul class="sub-menu">
        <li {!! (Request::is('admin/approve_internship_applications') ? 'class="active"' : '') !!}>
            <a href="{{ URL::to('admin/approve_internship_applications') }}">
                <i class="fa fa-angle-double-right"></i>
                Approve Applications
            </a>
        </li>
        <li {!! (Request::is('admin/archive_internships') ? 'class="active"' : '') !!}>
            <a href="{{ URL::to('admin/archive_internships') }}">
                <i class="fa fa-angle-double-right"></i>
                Review Internships
            </a>
        </li>

    </ul>
</li>