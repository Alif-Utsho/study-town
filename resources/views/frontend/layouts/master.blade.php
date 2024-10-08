<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>
        @hasSection('title')
        @yield('title') |
        @endif
        {{ $generalsetting->name }}
    </title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset($generalsetting->favicon) }}" type="image/x-icon" />

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer" />
    <link
        href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap"
        rel="stylesheet" />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" />
    <link rel="stylesheet" href="frontend/css/bootstrap.min.css" />
    <link rel="stylesheet" href="frontend/css/slick.css" />
    <link rel="stylesheet" href="frontend/css/style.css" />
    <link rel="stylesheet" href="frontend/css/responsive.css" />
</head>

<body>
    <div id="preloader">
        <div id="preloader-inner"></div>
    </div>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg menu-bg">
        <div class="container">
            <a class="navbar-brand" href="/"><img src="{{ asset($generalsetting->logo) }}" alt="" /></a>
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation">

                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- <form class="d-flex m-auto mb-2 mb-lg-0  search" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form> -->
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/service">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/courses">Courses</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/contact">Contact Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- navbar -->
    <!-- banner -->
    @yield('content')


    <!-- book now -->
    <section id="book">
        <div class="container">
            <div class="row mt-3 mb-5">

                <div class="col-lg-12">

                    <div class="book-inner">
                        <div class="book-img">
                            <img src="frontend/images/meeting.png" alt="">
                        </div>
                        <div class="book-content">
                            <h4>Confused About Courses? Book your Appointment Now</h4>
                            <p>Discover the perfect course for your future! Book a free consultation with our experts today."
                                <br>
                                This version focuses on action and the benefits of taking the next step, encouraging users to engage.
                            </p>
                        </div>
                        <div class="book-btn">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#bookAppointmentModal">Book Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- book now -->
    <!--book now modal -->

    <div class="modal fade" id="bookAppointmentModal" tabindex="-1" aria-labelledby="bookAppointmentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bookAppointmentModalLabel">Book Appointment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @include('frontend.includes.appointment')
                </div>
            </div>
        </div>
    </div>
    <!-- book now modal -->


    <!-- Modal -->
    <div id="success_tic" class="modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered">

            <!-- Modal content-->
            <div class="modal-content">
                <a class="close" href="#" data-bs-dismiss="modal">&times;</a>
                <div class="page-body">
                    <div class="head">
                        <h3 style="margin-top:5px;">{{ session('success') }}</h3>
                        <br>
                    </div>

                    <h1 style="text-align:center;">
                        <div class="checkmark-circle">
                            <div class="background"></div>
                            <div class="checkmark draw"></div>
                        </div>
                        <h1>

                </div>
            </div>
        </div>
    </div>


    <button type="button" class="btn btn-info btn-lg" data-bs-toggle="modal" data-bs-target="#success_tic">Open Modal</button>


    <!-- footer -->
    <footer id="footer">
        <div class="container">
            <div class="row gapp">
                <div class="col-lg-4 col-md-4">
                    <div class="footer-logo text-center">
                        <img src="{{ asset($generalsetting->logo) }}" class="w-50" alt="">
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 col-md-4">
                    <div class="footer-content">
                        <h4>CONTACT INFORMATION</h4>
                        <ul class="mt-3">
                            <li>Address: <span>{{ $contactInfo->address }}</span></li>
                            <li>Phone: <span>{{ $contactInfo->phone }}</span></li>
                            <li>Email: <span>{{ $contactInfo->email }}</span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 col-md-4">
                    <div class="footer-content">
                        <h4>SOCIAL MEDIA</h4>
                        <ul class="social-icon mt-4">
                            @foreach($socialicons as $socialicon)
                            <li><a href="{{ $socialicon->link }}"><img src="{{ asset($socialicon->logo) }}" alt=""></a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer -->




    <script src="frontend/js/jquery-1.12.4.min.js"></script>
    <script src="frontend/js/bootstrap.bundle.min.js"></script>
    <script src="frontend/js/slick.min.js"></script>
    <script src="frontend/js/jquery.counterup.js"></script>
    <script src="frontend/js/jquery.youtube-background.min.js"></script>
    <script src="frontend/js/waypoints.min.js"></script>
    <script src="frontend/https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script src="frontend/js/custom.js"></script>

    @if (session('success'))
    <script>
        $(document).ready(function() {
            var successModal = new bootstrap.Modal(document.getElementById('success_tic'));
            successModal.show();
        });
    </script>
    @endif
</body>

</html>