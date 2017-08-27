<li {!! (Request::is('admin/form_examples') || Request::is('admin/editor') || Request::is('admin/editor2') || Request::is('admin/form_layout') || Request::is('admin/validation') || Request::is('admin/formelements') || Request::is('admin/dropdowns') || Request::is('admin/radio_checkbox') || Request::is('admin/ratings') || Request::is('admin/form_layouts') || Request::is('admin/formwizard') || Request::is('admin/accordionformwizard') || Request::is('admin/datepicker') | Request::is('admin/advanced_datepickers')? 'class="active"' : '') !!}>
    <a href="#">
        <i class="livicon" data-name="doc-portrait" data-c="#67C5DF" data-hc="#67C5DF"
           data-size="18" data-loop="true"></i>
        <span class="title">Forms</span>
        <span class="fa arrow"></span>
    </a>
    <ul class="sub-menu">
        <li {!! (Request::is('admin/form_examples') ? 'class="active"' : '') !!}>
            <a href="{{ URL::to('admin/form_examples') }}">
                <i class="fa fa-angle-double-right"></i>
                Form Examples
            </a>
        </li>
        <li {!! (Request::is('admin/editor') ? 'class="active"' : '') !!}>
            <a href="{{ URL::to('admin/editor') }}">
                <i class="fa fa-angle-double-right"></i>
                Form Editors
            </a>
        </li>
        <li {!! (Request::is('admin/editor2') ? 'class="active"' : '') !!}>
            <a href="{{ URL::to('admin/editor2') }}">
                <i class="fa fa-angle-double-right"></i>
                Form Editors2
            </a>
        </li>
        <li {!! (Request::is('admin/validation') ? 'class="active"' : '') !!}>
            <a href="{{ URL::to('admin/validation') }}">
                <i class="fa fa-angle-double-right"></i>
                Form Validation
            </a>
        </li>
        <li {!! (Request::is('admin/formelements') ? 'class="active"' : '') !!}>
            <a href="{{ URL::to('admin/formelements') }}">
                <i class="fa fa-angle-double-right"></i>
                Form Elements
            </a>
        </li>
        <li {!! (Request::is('admin/dropdowns') ? 'class="active"' : '') !!}>
            <a href="{{ URL::to('admin/dropdowns') }}">
                <i class="fa fa-angle-double-right"></i>
                Drop Downs
            </a>
        </li>
        <li {!! (Request::is('admin/radio_checkbox') ? 'class="active"' : '') !!}>
            <a href="{{ URL::to('admin/radio_checkbox') }}">
                <i class="fa fa-angle-double-right"></i>
                Radio and Checkbox
            </a>
        </li>
        <li {!! (Request::is('admin/ratings') ? 'class="active"' : '') !!}>
            <a href="{{ URL::to('admin/ratings') }}">
                <i class="fa fa-angle-double-right"></i>
                Ratings
            </a>
        </li>
        <li {!! (Request::is('admin/form_layouts') ? 'class="active"' : '') !!}>
            <a href="{{ URL::to('admin/form_layouts') }}">
                <i class="fa fa-angle-double-right"></i>
                Form Layouts
            </a>
        </li>
        <li {!! (Request::is('admin/formwizard') ? 'class="active"' : '') !!}>
            <a href="{{ URL::to('admin/formwizard') }}">
                <i class="fa fa-angle-double-right"></i>
                Form Wizards
            </a>
        </li>
        <li {!! (Request::is('admin/accordionformwizard') ? 'class="active"' : '') !!}>
            <a href="{{ URL::to('admin/accordionformwizard') }}">
                <i class="fa fa-angle-double-right"></i>
                Accordion Wizards
            </a>
        </li>

        <li {!! (Request::is('admin/datepicker') ? 'class="active"' : '') !!}>
            <a href="{{ URL::to('admin/datepicker') }}">
                <i class="fa fa-angle-double-right"></i>
                Date Pickers
            </a>
        </li>
        <li {!! (Request::is('admin/advanced_datepickers') ? 'class="active"' : '') !!}>
            <a href="{{ URL::to('admin/advanced_datepickers') }}">
                <i class="fa fa-angle-double-right"></i>
                Advanced Date Pickers
            </a>
        </li>
    </ul>
</li>