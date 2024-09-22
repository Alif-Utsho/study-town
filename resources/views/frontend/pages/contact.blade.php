@extends('frontend.layouts.master')
@section('title', 'Contact')
@section('content')


<!-- contact -->
<section id="contact">
    <div class="container">
        <div class="row gapp">
            <div class="col-lg-6 col-md-6">
                <h1>{{ $contactInfo->name }}</h1>
                <p>{!! $contactInfo->bio !!}</p>
                <br>
                <h5>Contact</h5>
                <p></p>
                <p><i class="fa-solid fa-location-dot"></i> <strong>Location:</strong> {{ $contactInfo->address }}</p>
                <p><i class="fa-solid fa-phone"></i> <strong>Phone:</strong> {{ $contactInfo->phone }}</p>
                <p><i class="fa-solid fa-envelope"></i> <strong>Email:</strong> {{ $contactInfo->email }}</p>

                <ul class="social-icon mt-4">
                    <li>
                        <a href="#"><img src="images/facebook.png" alt="" /></a>
                    </li>
                    <li>
                        <a href="#"><img src="images/whatsapp.png" alt="" /></a>
                    </li>
                    <li>
                        <a href="#"><img src="images/instagram.png" alt="" /></a>
                    </li>
                    <li>
                        <a href="#"><img src="images/twitter.png" alt="" /></a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="map">
                    {!! $contactInfo->google_map !!}
                </div>
            </div>
        </div>
    </div>
</section>
<!-- contact -->

@endsection