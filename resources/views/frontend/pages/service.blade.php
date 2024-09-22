@extends('frontend.layouts.master')
@section('title', 'Services')
@section('content')

<section id="services-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="services-head text-center">
                    <h3>SERVICES WE OFFER</h3>
                    <p>
                        Discover the comprehensive range of services we
                        offer to help you gain admission.
                    </p>
                </div>
            </div>
        </div>

        @foreach($services as $key=>$service)
        
        @if($key%2==0)
        <div class="row mt-5">
            <div class="col-lg-6">
                <div class="service-text">
                    <h4>{{ $service->name }}</h4>

                    {!! $service->details !!}
                </div>
            </div>
            <div class="col-lg-6">
                <div class="student-c-img">
                    <img
                        src="{{ asset($service->image) }}"
                        class="w-100"
                        alt="" />
                </div>
            </div>
        </div>
        @else
        <div class="row mt-5">
            <div class="col-lg-6">
                <div class="student-c-img">
                    <img
                        src="{{ asset($service->image) }}"
                        class="w-100"
                        alt="" />
                </div>
            </div>
            <div class="col-lg-6">
                <div class="service-text">
                    <h4>{{ $service->name }}</h4>

                    {!! $service->details !!}
                </div>
            </div>
        </div>
        @endif
        @endforeach
    </div>
</section>
<!-- services -->

@endsection