<li {!! (Request::is('admin/alum_contacts')
        || Request::is('admin/alum_employer_types')
        || Request::is('admin/alum_engagement_indicators')
        || Request::is('admin/alum_events')
        || Request::is('admin/alum_study_fields') ? 'class="active"' : '') !!}>
    <a href="#">
        <i class="livicon" data-name="medal" data-size="18" data-c="#6CC66C" data-hc="#6CC66C"
           data-loop="true"></i>
        <span class="title">Alumni</span>
        <span class="fa arrow"></span>
    </a>
    <ul class="sub-menu">
        <li {!! (Request::is('admin/alum_contacts') ? 'class="active"' : '') !!}>
            <a href="{{ URL::to('admin/alum_contacts') }}">
                <i class="fa fa-angle-double-right"></i>
                Contacts
            </a>
        </li>



        <li {!! (Request::is('admin/alum_employer_types') ? 'class="active"' : '') !!}>
            <a href="{{ URL::to('admin/alum_employer_types') }}">
                <i class="fa fa-angle-double-right"></i>
                Employer Types
            </a>
        </li>

        <li {!! (Request::is('admin/alum_engagement_indicators') ? 'class="active"' : '') !!}>
            <a href="{{ URL::to('admin/alum_engagement_indicators') }}">
                <i class="fa fa-angle-double-right"></i>
                Engagement Indicators
            </a>
        </li>

        <li {!! (Request::is('admin/alum_events') ? 'class="active"' : '') !!}>
            <a href="{{ URL::to('admin/alum_events') }}">
                <i class="fa fa-angle-double-right"></i>
                Events
            </a>
        </li>

        <li {!! (Request::is('admin/alum_study_fields') ? 'class="active"' : '') !!}>
            <a href="{{ URL::to('admin/alum_study_fields') }}">
                <i class="fa fa-angle-double-right"></i>
                Study Fields
            </a>
        </li>


    </ul>
</li>