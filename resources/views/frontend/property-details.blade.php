@extends('frontend.layouts.main')

@section('main-container')

    <div class="page-heading header-text">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <span class="breadcrumb"><a href="#">Home</a> / Single Property</span>
                    <h3>{{ $property->property_name }}</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="single-property section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="main-image">
                        <img src="{{ asset('storage/' . $property->property_image) }}" alt="{{ $property->property_name }}"
                            class="img-fluid">
                    </div>
                    <div class="main-content">
                        <span class="category">{{ $property->category_name }}</span>
                        <h4>{{ $property->address }}</h4>
                        <p>At Villa, we understand that buying or selling a property can be one of the most
                            significant decisions in a person's life. That's why we've built a platform that
                            provides a seamless experience from start to finish. At Villa, we understand that buying or
                            selling a property can be one of the most
                            significant decisions in a person's life. That's why we've built a platform that
                            provides a seamless experience from start to finish.
                        </p>
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
                                    What sets Villa apart is our commitment to excellence and innovation. Our website boasts
                                    a user-friendly interface, allowing you to browse through a diverse range of properties
                                    with ease. From cozy apartments to luxurious villas, we have something to suit every
                                    taste and budget.
                                </div>
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
                <div class="col-lg-4">
                    <div class="info-table">
                        <ul>
                            <li>
                                <img src="{{ url('frontend/assets/images/info-icon-01.png') }}" alt=""
                                    style="max-width: 52px;">
                                <h4>{{ $property->area }}<br><span>Total Flat Space</span></h4>
                            </li>
                            <li>
                                <img src="{{ url('frontend/assets/images/info-icon-03.png') }}" alt=""
                                    style="max-width: 52px;">
                                <h4>{{ $property->price }}<br><span>Price</span></h4>
                            </li>
                            <li>
                                <img src="{{ url('frontend/assets/images/info-icon-02.png') }}" alt=""
                                    style="max-width: 52px;">
                                <h4>{{ $property->bhk }} BHK<br><span>Bedroom, Hall and Kitchen</span></h4>
                            </li>
                            <li>
                                <img src="{{ url('frontend/assets/images/info-icon-01.png') }}" alt=""
                                    style="max-width: 52px;">
                                <h4>{{ $property->parking }}<br><span>Parking</span></h4>
                            </li>
                            <li>
                                <img src="{{ url('frontend/assets/images/info-icon-01.png') }}" alt=""
                                    style="max-width: 52px;">
                                @if (in_array($property->category_name, ['Apartment', 'Penthouse', 'Modern Condo']))
                                    <h4>{{ $property->floor }}<sup>th</sup><br><span>Floor</span></h4>
                                @else
                                    <h4>{{ $property->floor }}<br><span>Floor</span></h4>
                                @endif
                            </li>
                            <li>
                                <img src="{{ url('frontend/assets/images/info-icon-02.png') }}" alt=""
                                    style="max-width: 52px;">
                                <h4>Contract<br><span>Contract Ready</span></h4>
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
                                                    <li>Total Flat Space <span>540 m<sup
                                                                style="vertical-align: super;">2</sup></span></li>
                                                    <li>Floor number <span>3</span></li>
                                                    <li>Number of rooms <span>8</span></li>
                                                    <li>Parking Available <span>Yes</span></li>
                                                    <li>Payment Process <span>Bank</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <img src="{{ url('frontend/assets/images/deal-01.jpg') }}" alt="">
                                        </div>
                                        <div class="col-lg-3">
                                            <h4>All Info About Apartment</h4>
                                            <p>What sets Villa apart is our commitment to excellence and innovation. Our
                                                website boasts
                                                a user-friendly interface, allowing you to browse through a diverse range of
                                                properties
                                                with ease. From cozy apartments to luxurious villas, we have something to
                                                suit every
                                                taste and budget.
                                            </p>
                                            <div class="icon-button">
                                                <a href="{{ route('contact') }}"><i class="fa fa-calendar"></i>Contact
                                                    Us</a>
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
                                            <h4>Detail Info About New Villa</h4>
                                            <p>In addition to our buying and selling services, Villa also offers valuable
                                                resources and tools to empower our clients. From mortgage calculators to
                                                neighborhood guides, we provide everything you need to make informed
                                                decisions about your real estate investments.
                                            </p>
                                            <div class="icon-button">
                                                <a href="{{ route('contact') }}"><i class="fa fa-calendar"></i>Contact
                                                    Us</a>
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
                                            <p>At Villa, we believe that everyone deserves to find their perfect home.
                                                That's why we're committed to making the process as simple and enjoyable as
                                                possible. So why wait? Start your journey with Villa today and turn your
                                                real estate dreams into reality.</p>
                                            <div class="icon-button">
                                                <a href="{{ route('contact') }}"><i class="fa fa-calendar"></i>Contact
                                                    Us</a>
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

@endsection

@section('title', $property->property_name)
