
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

    <li><a href="{{ URL::to('logout') }}">Logout</a>
    </li>
@endif


