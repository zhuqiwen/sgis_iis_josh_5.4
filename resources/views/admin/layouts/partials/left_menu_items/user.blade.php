<li {!! (Request::is('admin/users') || Request::is('admin/users/create') || Request::is('admin/user_profile') || Request::is('admin/users/*') || Request::is('admin/deleted_users') ? 'class="active"' : '') !!}>
    <a href="#">
        <i class="livicon" data-name="user" data-size="18" data-c="#6CC66C" data-hc="#6CC66C"
           data-loop="true"></i>
        <span class="title">Users</span>
        <span class="fa arrow"></span>
    </a>
    <ul class="sub-menu">
        <li {!! (Request::is('admin/users') ? 'class="active" id="active"' : '') !!}>
            <a href="{{ URL::to('admin/users') }}">
                <i class="fa fa-angle-double-right"></i>
                Users
            </a>
        </li>
        <li {!! (Request::is('admin/users/create') ? 'class="active" id="active"' : '') !!}>
            <a href="{{ URL::to('admin/users/create') }}">
                <i class="fa fa-angle-double-right"></i>
                Add New User
            </a>
        </li>
        <li {!! ((Request::is('admin/users/*')) && !(Request::is('admin/users/create')) ? 'class="active" id="active"' : '') !!}>
            <a href="{{ URL::route('admin.users.show',Sentinel::getUser()->id) }}">
                <i class="fa fa-angle-double-right"></i>
                View Profile
            </a>
        </li>
        <li {!! (Request::is('admin/deleted_users') ? 'class="active" id="active"' : '') !!}>
            <a href="{{ URL::to('admin/deleted_users') }}">
                <i class="fa fa-angle-double-right"></i>
                Deleted Users
            </a>
        </li>
    </ul>
</li>