<li {!! ((Request::is('admin/blogcategory') || Request::is('admin/blogcategory/create') || Request::is('admin/blog') ||  Request::is('admin/blog/create')) || Request::is('admin/blog/*') || Request::is('admin/blogcategory/*') ? 'class="active"' : '') !!}>
    <a href="#">
        <i class="livicon" data-name="comment" data-c="#F89A14" data-hc="#F89A14" data-size="18"
           data-loop="true"></i>
        <span class="title">Blog</span>
        <span class="fa arrow"></span>
    </a>
    <ul class="sub-menu">
        <li {!! (Request::is('admin/blogcategory') ? 'class="active"' : '') !!}>
            <a href="{{ URL::to('admin/blogcategory') }}">
                <i class="fa fa-angle-double-right"></i>
                Blog Category List
            </a>
        </li>
        <li {!! (Request::is('admin/blog') ? 'class="active"' : '') !!}>
            <a href="{{ URL::to('admin/blog') }}">
                <i class="fa fa-angle-double-right"></i>
                Blog List
            </a>
        </li>
        <li {!! (Request::is('admin/blog/create') ? 'class="active"' : '') !!}>
            <a href="{{ URL::to('admin/blog/create') }}">
                <i class="fa fa-angle-double-right"></i>
                Add New Blog
            </a>
        </li>
    </ul>
</li>