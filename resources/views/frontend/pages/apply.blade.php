@extends('frontend.layouts.master')
@section('title', 'Apply')
@section('content')

<section id="allcourses">
    <div class="container">
        <div class="row mt-3">
            <div class="col-lg-12">
                <div class="studytown-head-main text-center">
                    <h3>Apply Now</h3>
                    <p>
                        To get your desired course , We will get in
                        touch with you to duscuss more
                    </p>
                </div>
            </div>
        </div>
        @include('frontend.includes.apply')
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