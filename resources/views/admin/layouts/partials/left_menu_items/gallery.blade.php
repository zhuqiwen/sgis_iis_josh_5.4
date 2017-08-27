<li {!! (Request::is('admin/gallery') || Request::is('admin/masonry_gallery') || Request::is('admin/imagecropping') || Request::is('admin/imgmagnifier') ? 'class="active"' : '') !!}>
    <a href="#">
        <i class="livicon" data-name="image" data-c="#418BCA" data-hc="#418BCA" data-size="18"
           data-loop="true"></i>
        <span class="title">Gallery</span>
        <span class="fa arrow"></span>
    </a>
    <ul class="sub-menu">
        <li {!! (Request::is('admin/gallery') ? 'class="active"' : '') !!}>
            <a href="{{ URL::to('admin/gallery') }}">
                <i class="fa fa-angle-double-right"></i>
                Gallery
            </a>
        </li>
        <li {!! (Request::is('admin/masonry_gallery') ? 'class="active"' : '') !!}>
            <a href="{{ URL::to('admin/masonry_gallery') }}">
                <i class="fa fa-angle-double-right"></i>
                Masonry Gallery
            </a>
        </li>
        <li {!! (Request::is('admin/imagecropping') ? 'class="active"' : '') !!}>
            <a href="{{ URL::to('admin/imagecropping') }}">
                <i class="fa fa-angle-double-right"></i>
                Image Cropping
            </a>
        </li>
        <li {!! (Request::is('admin/imgmagnifier') ? 'class="active"' : '') !!}>
            <a href="{{ URL::to('admin/imgmagnifier') }}">
                <i class="fa fa-angle-double-right"></i>
                Image Magnifier
            </a>
        </li>
    </ul>
</li>