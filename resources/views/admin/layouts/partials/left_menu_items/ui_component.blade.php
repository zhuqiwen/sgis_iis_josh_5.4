<li {!! (Request::is('admin/general') || Request::is('admin/pickers') || Request::is('admin/x-editable') || Request::is('admin/timeline') || Request::is('admin/transitions') || Request::is('admin/sliders') || Request::is('admin/knob') ? 'class="active"' : '') !!}>
    <a href="#">
        <i class="livicon" data-name="lab" data-c="#EF6F6C" data-hc="#EF6F6C" data-size="18"
           data-loop="true"></i>
        <span class="title">UI Components</span>
        <span class="fa arrow"></span>
    </a>
    <ul class="sub-menu">
        <li {!! (Request::is('admin/general') ? 'class="active"' : '') !!}>
            <a href="{{ URL::to('admin/general') }}">
                <i class="fa fa-angle-double-right"></i>
                General Components
            </a>
        </li>
        <li {!! (Request::is('admin/pickers') ? 'class="active"' : '') !!}>
            <a href="{{ URL::to('admin/pickers') }}">
                <i class="fa fa-angle-double-right"></i>
                Pickers
            </a>
        </li>
        <li {!! (Request::is('admin/x-editable') ? 'class="active"' : '') !!}>
            <a href="{{ URL::to('admin/x-editable') }}">
                <i class="fa fa-angle-double-right"></i>
                X-editable
            </a>
        </li>
        <li {!! (Request::is('admin/timeline') ? 'class="active"' : '') !!}>
            <a href="{{ URL::to('admin/timeline') }}">
                <i class="fa fa-angle-double-right"></i>
                Timeline
            </a>
        </li>
        <li {!! (Request::is('admin/transitions') ? 'class="active"' : '') !!}>
            <a href="{{ URL::to('admin/transitions') }}">
                <i class="fa fa-angle-double-right"></i>
                Transitions
            </a>
        </li>
        <li {!! (Request::is('admin/sliders') ? 'class="active"' : '') !!}>
            <a href="{{ URL::to('admin/sliders') }}">
                <i class="fa fa-angle-double-right"></i>
                Sliders
            </a>
        </li>
        <li {!! (Request::is('admin/knob') ? 'class="active"' : '') !!}>
            <a href="{{ URL::to('admin/knob') }}">
                <i class="fa fa-angle-double-right"></i>
                Circles Sliders
            </a>
        </li>
    </ul>
</li>