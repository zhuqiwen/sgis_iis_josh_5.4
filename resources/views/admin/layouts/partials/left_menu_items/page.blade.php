<li {!! (Request::is('admin/invoice') || Request::is('admin/blank')  ? 'class="active"' : '') !!}>
    <a href="#">
        <i class="livicon" data-name="flag" data-c="#418bca" data-hc="#418bca" data-size="18"
           data-loop="true"></i>
        <span class="title">Pages</span>
        <span class="fa arrow"></span>
    </a>
    <ul class="sub-menu">
        <li {!! (Request::is('admin/lockscreen') ? 'class="active"' : '') !!}>
            <a href="{{ URL::route('lockscreen',Sentinel::getUser()->id) }}">
                <i class="fa fa-angle-double-right"></i>
                Lockscreen
            </a>
        </li>
        <li {!! (Request::is('admin/invoice') ? 'class="active"' : '') !!}>
            <a href="{{ URL::to('admin/invoice') }}">
                <i class="fa fa-angle-double-right"></i>
                Invoice
            </a>
        </li>
        <li {!! (Request::is('admin/login') ? 'class="active"' : '') !!}>
            <a href="{{ URL::to('admin/login') }}">
                <i class="fa fa-angle-double-right"></i>
                Login
            </a>
        </li>
        <li {!! (Request::is('admin/login2') ? 'class="active"' : '') !!}>
            <a href="{{ URL::to('admin/login2') }}">
                <i class="fa fa-angle-double-right"></i>
                Login 2
            </a>
        </li>
        <li>
            <a href="{{ URL::to('admin/login#toregister') }}">
                <i class="fa fa-angle-double-right"></i>
                Register
            </a>
        </li>
        <li>
            <a href="{{ URL::to('admin/register2') }}">
                <i class="fa fa-angle-double-right"></i>
                Register2
            </a>
        </li>
        <li {!! (Request::is('admin/404') ? 'class="active"' : '') !!}>
            <a href="{{ URL::to('admin/404') }}">
                <i class="fa fa-angle-double-right"></i>
                404 Error
            </a>
        </li>
        <li {!! (Request::is('admin/500') ? 'class="active"' : '') !!}>
            <a href="{{ URL::to('admin/500') }}">
                <i class="fa fa-angle-double-right"></i>
                500 Error
            </a>
        </li>
        <li {!! (Request::is('admin/blank') ? 'class="active"' : '') !!}>
            <a href="{{ URL::to('admin/blank') }}">
                <i class="fa fa-angle-double-right"></i>
                Blank Page
            </a>
        </li>
    </ul>
</li>