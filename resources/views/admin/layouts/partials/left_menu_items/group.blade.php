<li {!! (Request::is('admin/groups') || Request::is('admin/groups/create') || Request::is('admin/groups/*') ? 'class="active"' : '') !!}>
    <a href="#">
        <i class="livicon" data-name="users" data-size="18" data-c="#418BCA" data-hc="#418BCA"
           data-loop="true"></i>
        <span class="title">Groups</span>
        <span class="fa arrow"></span>
    </a>
    <ul class="sub-menu">
        <li {!! (Request::is('admin/groups') ? 'class="active" id="active"' : '') !!}>
            <a href="{{ URL::to('admin/groups') }}">
                <i class="fa fa-angle-double-right"></i>
                Group List
            </a>
        </li>
        <li {!! (Request::is('admin/groups/create') ? 'class="active" id="active"' : '') !!}>
            <a href="{{ URL::to('admin/groups/create') }}">
                <i class="fa fa-angle-double-right"></i>
                Add New Group
            </a>
        </li>
    </ul>
</li>