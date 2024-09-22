@extends('frontend.layouts.master')
@section('title', 'About')
@section('content')

<!-- about -->
<section id="about-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="about-head text-center">
                    <h1>{{ $about->name }}</h1>
                    <p>
                        {{ $about->bio }}
                    </p>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-lg-6">
                {!! $about->details !!}
            </div>
            <div class="col-lg-6">
                <div class="aboutt-img">
                    <img src="{{ asset($about->image) }}" class="w-100" alt="" />
                </div>
            </div>
        </div>

        @foreach($about_sections as $key=>$section)
        @if($key%2==0)
        <div class="row mt-5">
            <div class="col-lg-12">
                <div class="mission-head text-center">
                    <h3>{{ $section->name }}</h3>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-5 order-lg-1 order-2">
                    <div class="mission-img">
                        <img src="{{ asset($section->image) }}" class="w-100" alt="" />
                    </div>
                </div>
                <div class="col-lg-7 order-lg-2 order-1">
                    <div class="mission-text">
                        {!! $section->details !!}
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="row mt-5">
            <div class="col-lg-12">
                <div class="mission-head text-center">
                    <h3>{{ $section->name }}</h3>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-7">
                    <div class="mission-text">
                        {!! $section->details !!}
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="mission-img">
                        <img src="{{ asset($section->image) }}" class="w-100" alt="" />
                    </div>
                </div>
            </div>
        </div>
        @endif
        @endforeach
    </div>
</section>
<!-- about -->


@endsection