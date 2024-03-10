<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    @stack('404-style')

    <title>Villa Agency - @yield('title', 'Real Estate')</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ url('frontend/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href=  "{{ url('frontend/assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href=  "{{ url('frontend/assets/css/templatemo-villa-agency.css') }}">
    <link rel="stylesheet" href=  "{{ url('frontend/assets/css/owl.css') }}">
    <link rel="stylesheet" href=  "{{ url('frontend/assets/css/modal.css') }}">
    <link rel="stylesheet" href=  "{{ url('frontend/assets/css/animate.css') }}">
    <link rel="stylesheet" href=  "{{ url('frontend/assets/css/chatbot.css') }}">
    <link rel="stylesheet" href=  "{{ url('frontend/assets/css/footer.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">



</head>

<body>


    <div class="sub-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <ul class="info">
                        <li><i class="fa fa-envelope"></i><a
                                href="mailto:villarealtor@gmail.com">villarealtor@gmail.com</a></li>
                        <li><i class="fa fa-map"></i> Sunny Isles Beach, FL 33160</li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-4">
                    <ul class="social-links">
                        @section('social-icon')
                            <li><a href="JavaScript:void(0)"><i class="fab fa-facebook"></i></a></li>
                            <li><a href="JavaScript:void(0)" target="_blank"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="JavaScript:void(0)"><i class="fab fa-linkedin"></i></a></li>
                            <li><a href="JavaScript:void(0)"><i class="fab fa-instagram"></i></a></li>
                        @show
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="{{ route('home') }}" class="logo">
                            <h1>Villa</h1>
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a href="{{ route('home') }}" class="{{ Request::is('/') ? 'active' : '' }}">Home</a>
                            </li>
                            <li><a href="{{ route('property') }}"
                                    class="{{ Request::is('property') ? 'active' : '' }}">Properties</a></li>
                            <li><a href="{{ route('contact') }}"
                                    class="{{ Request::is('contact') ? 'active' : '' }}">Contact Us</a></li>
                            <li><a href="#" data-bs-toggle="modal" data-bs-target="#scheduleVisitModal"><i
                                        class="fa fa-calendar"></i> Schedule a visit</a></li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
        <!-- Download Brochure Box -->
        {{-- <div class="download-brochure">
            <a href="{{ asset('frontend/assets/files/blank.pdf') }}" download>
                <div class="text">Download Brochure</div>
            </a>
        </div> --}}
        @include('frontend.partials.download-brochure')
        @include('frontend.partials.whatsapp')
        @include('frontend.partials.chatbot')
    </header>
    <!-- ***** Header Area End ***** -->
