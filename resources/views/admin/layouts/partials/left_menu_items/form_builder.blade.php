<li {!! (Request::is('admin/form_builder') || Request::is('admin/form_builder2') || Request::is('admin/buttonbuilder') || Request::is('admin/gridmanager') ? 'class="active"' : '') !!}>
    <a href="#">
        <i class="livicon" data-name="wrench" data-size="18" data-c="#6CC66C" data-hc="#6CC66C"
           data-loop="true"></i>
        <span class="title">Builders</span>
        <span class="fa arrow"></span>
    </a>
    <ul class="sub-menu">
        <li {!! (Request::is('admin/form_builder') ? 'class="active"' : '') !!}>
            <a href="{{ URL::to('admin/form_builder') }}">
                <i class="fa fa-angle-double-right"></i>
                Form Builder
            </a>
        </li>
        <li {!! (Request::is('admin/form_builder2') ? 'class="active"' : '') !!}>
            <a href="{{ URL::to('admin/form_builder2') }}">
                <i class="fa fa-angle-double-right"></i>
                Form Builder 2
            </a>
        </li>
        <li {!! (Request::is('admin/buttonbuilder') ? 'class="active"' : '') !!}>
            <a href="{{ URL::to('admin/buttonbuilder') }}">
                <i class="fa fa-angle-double-right"></i>
                Button Builder
            </a>
        </li>
        <li {!! (Request::is('admin/gridmanager') ? 'class="active"' : '') !!}>
            <a href="{{ URL::to('admin/gridmanager') }}">
                <i class="fa fa-angle-double-right"></i>
                Page Builder
            </a>
        </li>
    </ul>
</li>