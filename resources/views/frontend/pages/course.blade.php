@extends('frontend.layouts.master')
@section('title', 'Courses')
@section('content')


<!-- courses -->
<section id="allcourses">
    <div class="container">
        <div class="row mt-3">
            <div class="col-lg-12">
                <div class="studytown-head-main text-center">
                    <h3>ALL COURSES</h3>
                </div>
            </div>
        </div>
        <div class="row gapp my-4">
            @foreach($courses as $course)
            <div class="col-lg-3 col-sm-6">
                <div class="courses-main text-center">
                    <div class="course-img">
                        <img
                            src="{{ asset($course->image) }}"
                            class="w-100"
                            alt="" />
                    </div>
                    <h5>{{ $course->name }}</h5>
                    <a href="/apply">Apply Now</a>
                </div>
            </div>
            @endforeach
            
        </div>
    </div>
</section>
<!-- courses -->


@endsection