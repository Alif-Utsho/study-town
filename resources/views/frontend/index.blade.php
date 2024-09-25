@extends('frontend.layouts.master')
@section('title', '')
@section('content')
<section
    style="
        background: url('{{ asset(e($homesection->banner)) }}') no-repeat center center/cover;
    "
    id="banner">
    <div class="over-lay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="banner-content text-center">
                    <h2>
                        {{ $homesection->title }}
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
                    <img src="{{ asset($homesection->about_image) }}" class="w-100" alt="" />
                </div>
            </div>
            <div class="col-lg-7 col-md-7 order-1 order-lg-2">
                <div class="about-content">
                    <h3>{{ $homesection->about_title }}</h3>
                    {!! $homesection->about_text !!}
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
            @foreach($homeoffers as $homeoffer)
            <div class="col-lg-4">
                <div class="service-inner">
                    <div class="services-icon">
                        <img src="{{ asset($homeoffer->image) }}" alt="" />
                    </div>
                    <div class="services-content">
                        <h4>{{ $homeoffer->name }}</h4>
                        <p>
                            {{ $homeoffer->details }}
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
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