
{{--based on anyone login or not display menu items--}}
@if(Sentinel::guest())
    <li><a href="{{ URL::to('login') }}">Login</a>
    </li>
    <li><a href="{{ URL::to('register') }}">Register</a>
    </li>
@else

    <li {!! (Request::is('/') ? 'class="active"' : '') !!}>
        <a href="{{ route('home') }}">
            Home
        </a>
    </li>
    {{--Internship with dropdown of guidance(timeline guide), create application, Application status(un-and submitted and approved in here), Internship Assignments--}}
        {{--application status page: tabs of unsubmitted, submitted, approved and rejected--}}
        {{--internship assignments page: tabs of journals, Reflection, and Site evaluation--}}
        {{--requires student role--}}
    <li class="dropdown {!! (Request::is('internship')
                            || Request::is(config('constants.menu_path.front_end.internship_create_application'))
                            || Request::is(config('constants.menu_path.front_end.internship_application_status'))
                            || Request::is(config('constants.menu_path.front_end.internship_assignments')) ? 'active' : '')!!}">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Internships</a>
        <ul class="dropdown-menu" role="menu">
            <li><a href="{{ URL::to(config('constants.menu_path.front_end.internship_create_application')) }}">Create Application</a>
            </li>
            <li><a href="{{ URL::to(config('constants.menu_path.front_end.internship_application_status')) }}">Application Status</a>
            </li>
            <li><a href="{{ URL::to(config('constants.menu_path.front_end.internship_assignments')) }}">Assignment</a>
            </li>
            <li><a href="{{ URL::to(config('constants.menu_path.front_end.internship_timeline')) }}">Timeline</a>
            </li>
        </ul>
    </li>
    {{--Funding: dropdown of Scholarships and Internship fundings--}}
        {{--requires student role--}}
    <li class="dropdown {!! (Request::is(config('constants.menu_path.front_end.scholarships_index'))
                            || Request::is(config('constants.menu_path.front_end.funding_overseas_internship'))
                            || Request::is(config('constants.menu_path.front_end.funding_scholarships')) ? 'active' : '') !!}">
        <a href="{{ URL::to(config('constants.menu_path.front_end.scholarships_index')) }}"> Scholarships</a>
        {{--<ul class="dropdown-menu" role="menu">--}}
            {{--<li><a href="{{ URL::to(config('constants.menu_path.front_end.funding_overseas_internship')) }}">Overseas Study Scholarships</a>--}}
            {{--</li>--}}
            {{--<li><a href="{{ URL::to(config('constants.menu_path.front_end.funding_scholarships')) }}">Other Scholarships</a>--}}
            {{--</li>--}}
        {{--</ul>--}}
    </li>
    {{--Alumni (in furture version | register, and update their informatio; new alum nees to apply and be approved to become an official alum)--}}
        {{--alumni can get contact with each other and receive help request from current student--}}
        {{--requires alumni role--}}
    {{--My timeline (in furture version | records and shows student's actions in this system)--}}
    {{--Others' Internship Experiences--}}
        {{--students can browse others internship experiences--}}
    <li {!! (Request::is('experiences') ? 'class="active"' : '') !!}">
        <a href="{{ URL::to(config('constants.menu_path.front_end.others_stories')) }}"> Others' experiences</a>
    </li>
    {{--logout--}}


    {{--<li class="dropdown {!! (Request::is('typography') || Request::is('advancedfeatures') || Request::is('grid') ? 'active' : '') !!}">--}}
        {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Features</a>--}}
        {{--<ul class="dropdown-menu" role="menu">--}}
            {{--<li><a href="{{ URL::to('typography') }}">Typography</a>--}}
            {{--</li>--}}
            {{--<li><a href="{{ URL::to('advancedfeatures') }}">Advanced Features</a>--}}
            {{--</li>--}}
            {{--<li><a href="{{ URL::to('grid') }}">Grid System</a>--}}
            {{--</li>--}}
        {{--</ul>--}}
    {{--</li>--}}
    {{--<li class="dropdown {!! (Request::is('aboutus') || Request::is('timeline') || Request::is('faq') || Request::is('blank_page')  ? 'active' : '') !!}"><a href="#" class="dropdown-toggle" data-toggle="dropdown"> Pages</a>--}}
        {{--<ul class="dropdown-menu" role="menu">--}}
            {{--<li><a href="{{ URL::to('aboutus') }}">About Us</a>--}}
            {{--</li>--}}
            {{--<li><a href="{{ URL::to('timeline') }}">Timeline</a></li>--}}
            {{--<li><a href="{{ URL::to('price') }}">Price</a>--}}
            {{--</li>--}}
            {{--<li><a href="{{ URL::to('404') }}">404 Error</a>--}}
            {{--</li>--}}
            {{--<li><a href="{{ URL::to('500') }}">500 Error</a>--}}
            {{--</li>--}}
            {{--<li><a href="{{ URL::to('faq') }}">FAQ</a>--}}
            {{--</li>--}}
            {{--<li><a href="{{ URL::to('blank_page') }}">Blank</a>--}}
            {{--</li>--}}
        {{--</ul>--}}
    {{--</li>--}}
    {{--<li class="dropdown {!! (Request::is('products') || Request::is('single_product') || Request::is('compareproducts') || Request::is('category')  ? 'active' : '') !!}"><a href="#" class="dropdown-toggle" data-toggle="dropdown"> Shop</a>--}}
        {{--<ul class="dropdown-menu" role="menu">--}}
            {{--<li><a href="{{ URL::to('products') }}">Products</a>--}}
            {{--</li>--}}
            {{--<li><a href="{{ URL::to('single_product') }}">Single Product</a>--}}
            {{--</li>--}}
            {{--<li><a href="{{ URL::to('compareproducts') }}">Compare Products</a>--}}
            {{--</li>--}}
            {{--<li><a href="{{ URL::to('category') }}">Categories</a></li>--}}
        {{--</ul>--}}
    {{--</li>--}}
    {{--<li class="dropdown {!! (Request::is('portfolio') || Request::is('portfolioitem') ? 'active' : '') !!}"><a href="#" class="dropdown-toggle" data-toggle="dropdown"> Portfolio</a>--}}
        {{--<ul class="dropdown-menu" role="menu">--}}
            {{--<li><a href="{{ URL::to('portfolio') }}">Portfolio</a>--}}
            {{--</li>--}}
            {{--<li><a href="{{ URL::to('portfolioitem') }}">Portfolio Item</a>--}}
            {{--</li>--}}
        {{--</ul>--}}
    {{--</li>--}}
    {{--<li class="dropdown {!! (Request::is('news') || Request::is('news_item') ? 'active' : '') !!}"><a href="#" class="dropdown-toggle" data-toggle="dropdown"> News</a>--}}
        {{--<ul class="dropdown-menu" role="menu">--}}
            {{--<li><a href="{{ URL::to('news') }}">News</a>--}}
            {{--</li>--}}
            {{--<li><a href="{{ URL::to('news_item') }}">News Item</a>--}}
            {{--</li>--}}
        {{--</ul>--}}
    {{--</li>--}}
    {{--<li {!! (Request::is('blog') || Request::is('blogitem/*') ? 'class="active"' : '') !!}><a href="{{ URL::to('blog') }}"> Blog</a>--}}
    {{--</li>--}}
    {{--<li {!! (Request::is('contact') ? 'class="active"' : '') !!}><a href="{{ URL::to('contact') }}">Contact</a>--}}
    {{--</li>--}}
    {{--<li {{ (Request::is('my-account') ? 'class=active' : '') }}><a href="{{ URL::to('my-account') }}">My Account</a>--}}
    {{--</li>--}}
    <li><a href="{{ URL::to('logout') }}">Logout</a>
    </li>
@endif


