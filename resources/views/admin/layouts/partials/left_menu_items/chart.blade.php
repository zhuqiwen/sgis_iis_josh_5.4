<li {!! (Request::is('admin/charts') || Request::is('admin/piecharts') || Request::is('admin/charts_animation') || Request::is('admin/jscharts') || Request::is('admin/sparklinecharts') ? 'class="active"' : '') !!}>
    <a href="#">
        <i class="livicon" data-name="barchart" data-size="18" data-c="#6CC66C" data-hc="#6CC66C"
           data-loop="true"></i>
        <span class="title">Charts</span>
        <span class="fa arrow"></span>
    </a>
    <ul class="sub-menu">
        <li {!! (Request::is('admin/charts') ? 'class="active"' : '') !!}>
            <a href="{{ URL::to('admin/charts') }}">
                <i class="fa fa-angle-double-right"></i>
                Flot Charts
            </a>
        </li>
        <li {!! (Request::is('admin/piecharts') ? 'class="active"' : '') !!}>
            <a href="{{ URL::to('admin/piecharts') }}">
                <i class="fa fa-angle-double-right"></i>
                Pie Charts
            </a>
        </li>
        <li {!! (Request::is('admin/charts_animation') ? 'class="active"' : '') !!}>
            <a href="{{ URL::to('admin/charts_animation') }}">
                <i class="fa fa-angle-double-right"></i>
                Animated Charts
            </a>
        </li>
        <li {!! (Request::is('admin/jscharts') ? 'class="active"' : '') !!}>
            <a href="{{ URL::to('admin/jscharts') }}">
                <i class="fa fa-angle-double-right"></i>
                JS Charts
            </a>
        </li>
        <li {!! (Request::is('admin/sparklinecharts') ? 'class="active"' : '') !!}>
            <a href="{{ URL::to('admin/sparklinecharts') }}">
                <i class="fa fa-angle-double-right"></i>
                Sparkline Charts
            </a>
        </li>
    </ul>
</li>