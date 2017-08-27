<li {!! (Request::is('admin/googlemaps') || Request::is('admin/vectormaps') || Request::is('admin/advancedmaps') ? 'class="active"' : '') !!}>
    <a href="#">
        <i class="livicon" data-name="map" data-c="#67C5DF" data-hc="#67C5DF" data-size="18"
           data-loop="true"></i>
        <span class="title">Maps</span>
        <span class="fa arrow"></span>
    </a>
    <ul class="sub-menu">
        <li {!! (Request::is('admin/googlemaps') ? 'class="active"' : '') !!}>
            <a href="{{ URL::to('admin/googlemaps') }}">
                <i class="fa fa-angle-double-right"></i>
                Google Maps
            </a>
        </li>
        <li {!! (Request::is('admin/vectormaps') ? 'class="active"' : '') !!}>
            <a href="{{ URL::to('admin/vectormaps') }}">
                <i class="fa fa-angle-double-right"></i>
                Vector Maps
            </a>
        </li>
        <li {!! (Request::is('admin/advancedmaps') ? 'class="active"' : '') !!}>
            <a href="{{ URL::to('admin/advancedmaps') }}">
                <i class="fa fa-angle-double-right"></i>
                Advanced Maps
            </a>
        </li>
    </ul>
</li>