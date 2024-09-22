@extends('frontend.layouts.master')
@section('title', '')
@section('content')
<section
    style="
        background: url(./frontend/images/campus-347285_1280.jpg) no-repeat center
          center/cover;
      "
    id="banner">
    <div class="over-lay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="banner-content text-center">
                    <h2>
                        Study Town: Simplifying the Path to Higher Education with
                        Support and Adaptable Learning Plans
                    </h2>
                    <a href="/apply">Apply Now</a>
                    <!-- <p>No Qualification Needed</p> -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- banner -->

<!-- about part start -->
<section id="about">
    <div class="container">
        <div class="row gapp">
            <div class="col-lg-5 col-md-5 order-2 order-lg-1">
                <div class="about-img">
                    <img src="frontend/images/about.webp" class="w-100" alt="" />
                </div>
            </div>
            <div class="col-lg-7 col-md-7 order-1 order-lg-2">
                <div class="about-content">
                    <h3>Welcome to Study Town</h3>
                    <p>
                        At Study Town, we are dedicated to helping British or EU
                        citizens, as well as individuals with settlement or
                        pre-settlement status, achieve their academic aspirations. We
                        provide expert application assistance and personalized course
                        selection, tailored to your goals. With flexible class schedules
                        and strong partnerships with universities, we are committed to
                        ensuring your success.
                    </p>
                    <a href="/about">See more</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- about part end -->

<!-- service part start -->
<section id="services">
    <div class="container">
        <div class="row mt-3">
            <div class="col-lg-12">
                <div class="studytown-head-main text-center">
                    <h3>SERVICES WE OFFER</h3>
                    <p>
                        Discover our extensive range of services crafted to assist you in gaining admission to leading universities.</p>
                </div>
            </div>
        </div>
        <div class="row gapp mt-5">
            <div class="col-lg-4">
                <div class="service-inner">
                    <div class="services-icon">
                        <img src="frontend/images/s1.png" alt="" />
                    </div>
                    <div class="services-content">
                        <h4>Free Counselling</h4>
                        <p>
                            We offer complimentary counseling to our students, provided by
                            expert counselors who have graduated from UK universities.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="service-inner">
                    <div class="services-icon">
                        <img src="frontend/images/s2.png" alt="" />
                    </div>
                    <div class="services-content">
                        <h4>Student Admission Services</h4>
                        <p>
                            Professional guidance throughout the application process, along with tailored advice to help you select the right courses.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="service-inner">
                    <div class="services-icon">
                        <img src="frontend/images/s3.png" alt="" />
                    </div>
                    <div class="services-content">
                        <h4>Compliance Assistance</h4>
                        <p>
                            Our dedicated compliance team is here to guide students
                            through every step of the visa process.
                        </p>
                    </div>
                </div>
            </div>
            <!-- <div class="col-lg-4">
                <div class="service-inner">
                <div class="services-icon">
                    <img src="frontend/images/s4.png" alt="" />
                </div>
                <div class="services-content">
                    <h4>Student Accommodation Services</h4>
                    <p>
                    offers top-quality student accommodation services at an affordable price.
                    </p>
                </div>
                </div>
            </div> -->
            <div class="col-lg-4">
                <div class="service-inner">
                    <div class="services-icon">
                        <img src="frontend/images/s5.png" alt="" />
                    </div>
                    <div class="services-content">
                        <h4>Partner University Services</h4>
                        <p>
                            Our services are not limited to students; we also offer a range of solutions for the universities we partner with.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="service-inner">
                    <div class="services-icon">
                        <img src="frontend/images/s6.png" alt="" />
                    </div>
                    <div class="services-content">
                        <h4>End-to-End Services
                        </h4>
                        <p>
                            Our services are ongoing and do not end at a specific point. We are committed to providing continued support and assistance, even after course completion in the UK, if required
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
<!-- service part end -->

<!-- courses -->
<section id="courses">
    <div class="container">
        <div class="row mt-3">
            <div class="col-lg-12">
                <div class="studytown-head-main text-center">
                    <h3>COURSES WE OFFER</h3>

                </div>
            </div>
        </div>
        <div class="row gapp my-4">
            @foreach($courses as $course)
            <div class="col-lg-3 col-sm-6">

                <div class="courses-main text-center">
                    <div class="course-img">
                        <img src="{{ asset($course->image) }}" class="w-100" alt="">
                    </div>
                    <h5>{{ $course->name }}</h5>
                    <a href="/apply">Apply Now</a>
                </div>

            </div>
            @endforeach
        </div>
        <div class="row mt-5">
            <div class="col-lg-12">
                <div class="course-seemore-btn text-center">
                    <a href="/courses">View All Courses</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- courses -->

<!-- apply  -->
<section id="apply">
    <div class="container">
        <div class="row mt-3">
            <div class="col-lg-12">
                <div class="studytown-head-main text-center">
                    <h3>GET IN TOUCH WITH US</h3>
                </div>
            </div>
        </div>
        @include('frontend.includes.apply')
    </div>
    </div>
</section>
<!-- apply -->

<!-- our concern -->
<section id="concern">
    <i class="fa-solid fa-chevron-left prev"></i>
    <i class="fa-solid fa-chevron-right next"></i>
    <div class="container">
        <div class="row mt-3">
            <div class="col-lg-12">
                <div class="studytown-head-main text-center">
                    <h3>OUR CONCERN</h3>
                </div>
            </div>
        </div>
        <div class="row concern-slide">
            @foreach($concerns as $concern)
            <div class="col-lg-3">
                <div class="concern-img">
                    <img src="{{ asset($concern->image) }}" class="w-100" alt="">
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>
<!-- our concern -->
@endsection