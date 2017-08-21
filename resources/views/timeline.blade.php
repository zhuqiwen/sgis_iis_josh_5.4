@extends('layouts/default')

{{-- Page title --}}
@section('title')
Timeline
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/frontend/timeline1.css') }}">
<link href="{{ asset('assets/vendors/animate/animate.min.css') }}" rel="stylesheet" type="text/css" />
@stop

{{-- breadcrumb --}}
@section('top')
    <div class="breadcum">
       {{--keep this div for the dviding line between nav menu and content--}}
    </div>
@stop



{{-- Page content --}}
@section('content')
    <!-- Container Section Start -->
    <div class="container">
        <!--Content Section Start -->
        <div class="row">
            <ul class="timeline">
                <!-- Item 1 -->
                <li>
                    <div class="direction-l wow slideInLeft" data-wow-duration="3.5s">
                        <div class="flag-wrapper">
                            <span class="hexa"></span>
                            <span class="flag">Create and Submit Application</span>
                            <span class="time-wrapper"><span class="time">1st</span></span>
                        </div>
                        <div class="desc">
                            <p>You will need to know:</p>
                                    <p>Internship organization name, website, and type;</p>
                                    <p>Your internship supervisor's contact information;</p>
                                    <p>Other <a href="#" style="text-decoration: underline">details</a> of your internship.</p>

                        </div>
                    </div>
                </li>

                <!-- Item 2 -->
                <li>
                    <div class="direction-l wow slideInLeft" data-wow-duration="3.5s">
                        <div class="flag-wrapper">
                            <span class="hexa"></span>
                            <span class="flag">Wait for approval</span>
                            <span class="time-wrapper"><span class="time">2nd</span></span>
                        </div>
                        <div class="desc">
                            <p>Once an application is submitted, it cannot be edited and updated any more;</p>
                            <p>You will receive an email notice once the application is approved;</p>
                            <p>Of course, you can also check the <a href="#" style="text-decoration: underline">status</a> of submitted applications</p>
                        </div>
                    </div>
                </li>

                <!-- Item 3 -->
                <li>
                    <div class="direction-r wow slideInRight" data-wow-duration="3.5s">
                        <div class="flag-wrapper">
                            <span class="hexa"></span>
                            <span class="flag">SGIS approval</span>
                            {{--<span class="time-wrapper"><span class="time">Aug 2015</span></span>--}}
                        </div>
                        {{--<div class="desc">Lorem ipsum Minim labore Ut cupidatat quis qui deserunt proident fugiat pariatur cillum cupidatat reprehenderit sit id dolor consectetur ut.</div>--}}
                    </div>
                </li>

                <!-- Item 4 -->
                <li>
                    <div class="direction-l wow slideInLeft" data-wow-duration="3.5s">
                        <div class="flag-wrapper">
                            <span class="hexa"></span>
                            <span class="flag">Fullfill Internship</span>
                            <span class="time-wrapper"><span class="time">3rd</span></span>
                        </div>
                        {{--<div class="desc">Lorem ipsum In ut sit in dolor nisi ex magna eu anim anim tempor dolore aliquip enim cupidatat laborum dolore.</div>--}}
                    </div>
                </li>

                <!-- Item 5 -->
                <li>
                    <div class="direction-l wow slideInLeft" data-wow-duration="3.5s">
                        <div class="flag-wrapper">
                            <span class="hexa"></span>
                            <span class="flag">Submit Assignments</span>
                            <span class="time-wrapper"><span class="time">4th</span></span>
                        </div>
                        {{--<div class="desc">Lorem ipsum Minim labore Ut cupidatat quis qui deserunt proident fugiat pariatur cillum cupidatat reprehenderit sit id dolor consectetur ut.</div>--}}
                    </div>
                </li>
            </ul>
        </div>
        <!-- //Content Section End -->
    </div>

@stop

{{-- page level scripts --}}
@section('footer_scripts')
    <script src="{{ asset('assets/vendors/wow/js/wow.min.js') }}" type="text/javascript"></script>
    <script>
        jQuery(document).ready(function() {
            new WOW().init();
        });
    </script>

@stop
