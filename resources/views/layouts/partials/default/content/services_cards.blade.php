<!-- Service cards Section Start-->
<div class="row">
    <!-- Responsive Section Start -->
    <div class="text-center">
        <h3 class="border-primary"><span class="heading_border bg-primary">What you can do with us</span></h3>
    </div>
    <div class="col-sm-12 col-md-4 wow bounceInLeft" data-wow-duration="0.5s">
        <div class="box">
            <a href="{{ URL::to(config('constants.menu_path.front_end.internship_timeline')) }}">
                <div class="box-icon">
                    {{--<i class="livicon icon" data-name="desktop" data-size="55" data-loop="true" data-c="#01bc8c" data-hc="#01bc8c"></i>--}}
                    <i class="livicon icon" data-name="globe" data-size="55" data-loop="true" data-c="#01bc8c" data-hc="#01bc8c"></i>
                </div>
                <div class="info">
                    <h3 class="success text-center">Internships</h3>
                    <p>Create Internship Application</p>
                    <p>Management Internship</p>
                    <p>Submit Internship Assignments</p>
                    <div class="text-right primary"><a href="#">Read more</a>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <!-- //Responsive Section End -->
    <!-- Easy to Use Section Start -->
    <div class="col-sm-12 col-md-4 wow bounceInDown" data-wow-duration="0.5s" data-wow-delay="0.1s">
        <!-- Box Start -->
        <div class="box">
            <a href="{{ URL::to(config('constants.menu_path.front_end.scholarships_index')) }}">
                <div class="box-icon box-icon1">
                    <i class="livicon icon1" data-name="money" data-size="55" data-loop="true" data-c="#418bca" data-hc="#418bca"></i>
                </div>
                <div class="info">
                    <h3 class="primary text-center">Funding</h3>
                    <p>Apply for Internship Funding</p>
                    <p>Manage Funding Applications</p>
                    <p>Other Scholarships</p>
                    <div class="text-right primary"><a href="#">Read more</a>
                    </div>
                </div>
            </a>

        </div>
    </div>
    <div class="col-sm-12 col-md-4 wow bounceInRight" data-wow-duration="0.5s" data-wow-delay="0.1s">
        <div class="box">
            <a href="{{ URL::to(config('constants.menu_path.front_end.others_stories')) }}">
                <div class="box-icon box-icon3">
                    <i class="livicon icon1" data-name="comments" data-size="55" data-loop="true" data-c="#FFD43C" data-hc="#FFD43C"></i>
                </div>
                <div class="info">
                    <h3 class="yellow text-center">Learn From Others</h3>
                    <p>learn others' internship experience</p>
                    <p>look for suggestions</p>
                    <p>Learn how we help our students</p>
                    <div class="text-right primary"><a href="#">Read more</a>
                    </div>
                </div>
            </a>

        </div>
    </div>
    <!-- //20+ Page Section End -->
</div>
<!-- //Services Section End -->