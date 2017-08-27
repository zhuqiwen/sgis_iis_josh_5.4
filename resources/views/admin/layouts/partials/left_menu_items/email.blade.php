<li {!! (Request::is('admin/inbox') || Request::is('admin/compose') || Request::is('admin/view_mail') ? 'class="active"' : '') !!}>
    <a href="#">
        <i class="livicon" data-name="mail" data-size="18" data-c="#67C5DF" data-hc="#67C5DF"
           data-loop="true"></i>
        <span class="title">Email</span>
        <span class="fa arrow"></span>
    </a>
    <ul class="sub-menu">
        <li {!! (Request::is('admin/inbox') ? 'class="active"' : '') !!}>
            <a href="{{ URL::to('admin/inbox') }}">
                <i class="fa fa-angle-double-right"></i>
                Inbox
            </a>
        </li>
        <li {!! (Request::is('admin/compose') ? 'class="active"' : '') !!}>
            <a href="{{ URL::to('admin/compose') }}">
                <i class="fa fa-angle-double-right"></i>
                Compose
            </a>
        </li>
        <li {!! (Request::is('admin/view_mail') ? 'class="active"' : '') !!}>
            <a href="{{ URL::to('admin/view_mail') }}">
                <i class="fa fa-angle-double-right"></i>
                Single Mail
            </a>
        </li>
    </ul>
</li>