<li {!! (Request::is('admin/news') || Request::is('admin/news_item')  ? 'class="active"' : '') !!}>
    <a href="#">
        <i class="livicon" data-name="move" data-c="#ef6f6c" data-hc="#ef6f6c" data-size="18"
           data-loop="true"></i>
        <span class="title">News</span>
        <span class="fa arrow"></span>
    </a>
    <ul class="sub-menu">
        <li {!! (Request::is('admin/news') ? 'class="active"' : '') !!}>
            <a href="{{ URL::to('admin/news') }}">
                <i class="fa fa-angle-double-right"></i>
                News
            </a>
        </li>
        <li {!! (Request::is('admin/news_item') ? 'class="active"' : '') !!}>
            <a href="{{ URL::to('admin/news_item') }}">
                <i class="fa fa-angle-double-right"></i>
                News Details
            </a>
        </li>
    </ul>
</li>