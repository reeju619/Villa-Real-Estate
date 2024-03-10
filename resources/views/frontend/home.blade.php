@extends('frontend.layouts.main')

@section('main-container')
    <div class="main-banner">
        <div class="owl-carousel owl-banner">
            <div class="item item-1">
                <div class="header-text">
                    <span class="category">Toronto, <em>Canada</em></span>
                    <h2>Hurry!<br>Get the Best Villa for you</h2>
                </div>
            </div>
            <div class="item item-2">
                <div class="header-text">
                    <span class="category">Melbourne, <em>Australia</em></span>
                    <h2>Be Quick!<br>Get the best villa in town</h2>
                </div>
            </div>
            <div class="item item-3">
                <div class="header-text">
                    <span class="category">Miami, <em>South Florida</em></span>
                    <h2>Act Now!<br>Get the highest level penthouse</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="featured section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="section-heading">
                        <h6>| About Us</h6>
                        <h2>Founded in 2010</h2>
                    </div>
                    <div>
                        <div>
                            <div>
                                <div>
                                    Villa has been revolutionizing the <strong>real estate
                                        industry</strong>, offering unparalleled services to both buyers and sellers alike
                                </div>
                            </div>
                        </div>
                        <div>
                            <h2>
                            </h2>
                            <div>
                                <div>
                                    Our journey began with a vision to simplify the process of finding and acquiring the
                                    perfect home, and over the years, we've stayed true to that mission, continuously
                                    evolving to meet the ever-changing needs of our clients.
                                </div>
                            </div>
                        </div>
                        <div>
                            <h2>
                            </h2>
                            <div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="section-heading">
                        <h6>| Featured</h6>
                        <h2>Best Appartment &amp; Sea view</h2>
                    </div>
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Commitment
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    At Villa, we understand that buying or selling a property can be one of the most
                                    significant decisions in a person's life. That's why we've built a platform that
                                    provides a seamless experience from start to finish. </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Excellence and innovation
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    What sets Villa apart is our commitment to excellence and innovation. Our website boasts
                                    a user-friendly interface, allowing you to browse through a diverse range of properties
                                    with ease. From cozy apartments to luxurious villas, we have something to suit every
                                    taste and budget.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Why Choose Us ?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Villa is more than just a listing platform. We offer comprehensive services tailored to
                                    your specific needs. Our team of experienced <strong>real estate agents</strong> is
                                    dedicated to helping you navigate the complexities of the market, providing expert
                                    advice and support throughout the entire process.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="info-table">
                        <ul>
                            <li>
                                <img src="{{ url('frontend/assets/images/info-icon-01.png') }}" alt=""
                                    style="max-width: 52px;">
                                <h4>250 m<sup style="vertical-align: super;">2</sup><br><span>Total Flat Space</span></h4>
                            </li>
                            <li>
                                <img src="{{ url('frontend/assets/images/info-icon-02.png') }}" alt=""
                                    style="max-width: 52px;">
                                <h4>Contract<br><span>Contract Ready</span></h4>
                            </li>
                            <li>
                                <img src="{{ url('frontend/assets/images/info-icon-03.png') }}" alt=""
                                    style="max-width: 52px;">
                                <h4>Payment<br><span>Payment Process</span></h4>
                            </li>
                            <li>
                                <img src="{{ url('frontend/assets/images/info-icon-04.png') }}" alt=""
                                    style="max-width: 52px;">
                                <h4>Safety<br><span>24/7 Under Control</span></h4>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="video section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 offset-lg-4">
                    <div class="section-heading text-center">
                        <h6>| Video View</h6>
                        <h2>Get Closer View & Different Feeling</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="video-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="video-frame">
                        <img src="{{ url('frontend/assets/images/video-frame.jpg') }}" alt="">
                        <a href="https://youtube.com" target="_blank"><i class="fa fa-play"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="fun-facts">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="wrapper">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="counter">
                                    <h2 class="timer count-title count-number" data-to="100" data-speed="10000"></h2>
                                    <p class="count-text ">Buildings<br>Finished Now</p>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="counter">
                                    <h2 class="timer count-title count-number" data-to="14" data-speed="10000"></h2>
                                    <p class="count-text ">Years<br>Experience</p>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="counter">
                                    <h2 class="timer count-title count-number" data-to="1000" data-speed="10000"></h2>
                                    <p class="count-text ">Happy<br>Clients</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section best-deal">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="section-heading">
                        <h6>| Best Deal</h6>
                        <h2>Find Your Best Deal Right Now!</h2>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="tabs-content">
                        <div class="row">
                            <div class="nav-wrapper ">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="appartment-tab" data-bs-toggle="tab"
                                            data-bs-target="#appartment" type="button" role="tab"
                                            aria-controls="appartment" aria-selected="true">Appartment</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="villa-tab" data-bs-toggle="tab"
                                            data-bs-target="#villa" type="button" role="tab" aria-controls="villa"
                                            aria-selected="false">Villa House</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="penthouse-tab" data-bs-toggle="tab"
                                            data-bs-target="#penthouse" type="button" role="tab"
                                            aria-controls="penthouse" aria-selected="false">Penthouse</button>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="appartment" role="tabpanel"
                                    aria-labelledby="appartment-tab">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="info-table">
                                                <ul>
                                                    <li>Total Flat Space <span>185 m<sup
                                                                style="vertical-align: super;">2</sup></span></li>
                                                    <li>Floor number <span>26th</span></li>
                                                    <li>Number of rooms <span>4</span></li>
                                                    <li>Parking Available <span>Yes</span></li>
                                                    <li>Payment Process <span>Bank</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <img src="{{ url('frontend/assets/images/deal-01.jpg') }}" alt="">
                                        </div>
                                        <div class="col-lg-3">
                                            <h4>Extra Info About Property</h4>
                                            <p>What sets Villa apart is our commitment to excellence and innovation. Our
                                                website boasts
                                                a user-friendly interface, allowing you to browse through a diverse range of
                                                properties
                                                with ease. From cozy apartments to luxurious villas, we have something to
                                                suit every
                                                taste and budget.
                                            </p>
                                            <div class="icon-button">
                                                <a href="{{ route('property') }}"><i class="fa fa-calendar"></i>More
                                                    Properties</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="villa" role="tabpanel" aria-labelledby="villa-tab">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="info-table">
                                                <ul>
                                                    <li>Total Flat Space <span>250 m<sup
                                                                style="vertical-align: super;">2</sup></span></li>
                                                    <li>Floor number <span>26th</span></li>
                                                    <li>Number of rooms <span>5</span></li>
                                                    <li>Parking Available <span>Yes</span></li>
                                                    <li>Payment Process <span>Bank</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <img src="{{ url('frontend/assets/images/deal-02.jpg') }}" alt="">
                                        </div>
                                        <div class="col-lg-3">
                                            <h4>Detail Info About Villa</h4>
                                            <p> Villa is more than just a listing platform. We offer comprehensive services
                                                tailored to
                                                your specific needs. Our team of experienced <strong>real estate
                                                    agents</strong> is
                                                dedicated to helping you navigate the complexities of the market, providing
                                                expert
                                                advice and support throughout the entire process.
                                            </p>
                                            <div class="icon-button">
                                                <a href="{{ route('property') }}"><i class="fa fa-calendar"></i>More
                                                    Properties</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="penthouse" role="tabpanel"
                                    aria-labelledby="penthouse-tab">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="info-table">
                                                <ul>
                                                    <li>Total Flat Space <span>320 m<sup
                                                                style="vertical-align: super;">2</sup></span></li>
                                                    <li>Floor number <span>34th</span></li>
                                                    <li>Number of rooms <span>6</span></li>
                                                    <li>Parking Available <span>Yes</span></li>
                                                    <li>Payment Process <span>Bank</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <img src="{{ url('frontend/assets/images/deal-03.jpg') }}" alt="">
                                        </div>
                                        <div class="col-lg-3">
                                            <h4>Extra Info About Penthouse</h4>
                                            <p>At Villa, we understand that buying or selling a property can be one of the
                                                most
                                                significant decisions in a person's life. That's why we've built a platform
                                                that
                                                provides a seamless experience from start to finish.
                                            </p>
                                            <div class="icon-button">
                                                <a href="{{ route('property') }}"><i class="fa fa-calendar"></i>More
                                                    Properties</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="search" style="margin-top: 120px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 offset-lg-4">
                    <div class="section-heading text-center">
                        <h6>Search your Desired Properties</h6>
                        <h2>We are here for you</h2>
                    </div>
                    <input type="text" id="searchInput" class="searchTerm" placeholder="Type to search...">
                    <button type="submit" class="searchButton">
                        <i class="fa fa-search"></i>
                    </button>
                    {{-- <!-- Example button for voice search -->
                    <button id="voiceSearchButton">
                        <img src="{{ url('frontend/assets/images/voice-search-icon.png') }}" alt="Voice Search"
                            style="width: 20px; height: 20px">
                    </button> --}}

                    <div id="searchResult"></div>
                    <div id="propertyDetails"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="properties section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 offset-lg-4">
                    <div class="section-heading text-center">
                        <h6>| Properties</h6>
                        <h2>We Provide The Best Property You Like</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($properties as $property)
                    <div class="col-lg-4 col-md-6">
                        <div class="item">
                            <a href="{{ route('property-details', $property->id) }}"><img
                                    src="{{ asset('storage/' . $property->property_image) }}" alt=""></a>
                            <span class="category">{{ $property->category_name }}</span>
                            <h6>{{ $property->price }}</h6>
                            <h4><a
                                    href="{{ route('property-details', $property->id) }}">{{ $property->property_name }}</a>
                            </h4>
                            <ul>
                                <li>Address: <span class = "address"><a
                                            href="{{ route('property-details', $property->id) }}">{{ $property->address }}</a></span>
                                </li>
                                <li><span>{{ $property->bhk }} BHK</span></li>
                                <li>Area: <span>{{ $property->area }}</span></li>
                                @if (in_array($property->category_name, ['Apartment', 'Penthouse', 'Modern Condo']))
                                    <li>Floor: <span>{{ $property->floor }}th</span></li>
                                @else
                                    <li>Floor: <span>{{ $property->floor }}</span></li>
                                @endif
                                <li>Parking: <span>{{ $property->parking }}</span></li>
                            </ul>
                            <div class="main-button">
                                <a href="{{ route('property-details', $property->id) }}">View Details</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="text-center main-button">
                <a href="{{ route('property') }}">More Properties</a>
            </div>
        </div>
    </div>

    <div class="contact section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 offset-lg-4">
                    <div class="section-heading text-center">
                        <h6>| Contact Us</h6>
                        <h2>Get In Touch With Our Agents</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="contact-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div id="map">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12469.776493332698!2d-80.14036379941481!3d25.907788681148624!2m3!1f357.26927939317244!2f20.870722720054623!3f0!3m2!1i1024!2i768!4f35!3m3!1m2!1s0x88d9add4b4ac788f%3A0xe77469d09480fcdb!2sSunny%20Isles%20Beach!5e1!3m2!1sen!2sth!4v1642869952544!5m2!1sen!2sth"
                            width="100%" height="500px" frameborder="0"
                            style="border:0; border-radius: 10px; box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.15);"
                            allowfullscreen=""></iframe>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="item phone">
                                <img src="{{ url('frontend/assets/images/phone-icon.png') }}" alt=""
                                    style="max-width: 52px;">
                                <h6><a href="tel:0100200340">010-020-0340</a><br><span>Phone Number</span></h6>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="item email">
                                <img src="{{ url('frontend/assets/images/email-icon.png') }}" alt=""
                                    style="max-width: 52px;">
                                <h6><a href="mailto:info@villa.co">info@villa.co</a><br><span>Business Email</span>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form id="contact-form" action="{{ route('contact.send') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <fieldset>
                                    <label for="name">Full Name</label>
                                    <input type="text" name="name" id="name" placeholder="Your Name"
                                        value="{{ old('name') }}">
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <label for="email">Email Address</label>
                                    <input type="email" name="email" id="email" placeholder="Your E-mail">
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <label for="subject">Mobile No.</label>
                                    <input type="number" name="number" id="number" placeholder="Mobile No.">
                                    @error('number')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <label for="message">Message</label>
                                    <textarea name="message" id="message" placeholder="Your Message"></textarea>
                                    @error('message')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <button type="submit" id="form-submit" class="orange-button">Send
                                        Message</button>
                                </fieldset>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('title')
    Home
@endsection


@push('home-script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#searchInput').on('keyup', function() {
                var query = $(this).val();
                if (query.length > 2) {
                    $.ajax({
                        url: "{{ route('search') }}",
                        type: "GET",
                        data: {
                            'query': query,
                            '_token': "{{ csrf_token() }}",
                        },
                        success: function(data) {
                            if (data.length > 0) {
                                var suggestions = data.map(function(item) {
                                    return `<div class="search-suggestion" data-id="${item.id}">
                                <img src="/storage/${item.property_image}" alt="${item.property_name}" style="width: 50px; height: 50px; cursor: pointer;">
                                <span style="cursor: pointer;">${item.property_name}</span> - <small>${item.category_name}</small>
                            </div><br>`;
                                }).join('');
                                $('#searchResult').html(suggestions).show();
                            } else {
                                $('#searchResult').html(
                                    '<div class="search-suggestion">No properties found</div>'
                                ).show();
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error("Error occurred: " + xhr.responseText);
                            alert("Error occurred: " + xhr.responseText);
                        }
                    });
                } else {
                    $('#searchResult').hide();
                }
            });

            $(document).on('click', '.search-suggestion', function() {
                var propertyId = $(this).data('id');
                window.location.href = `/property-details/${propertyId}`;
            });
        });
    </script>
@endpush
