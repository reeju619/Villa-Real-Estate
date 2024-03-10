@extends('frontend.layouts.main')

@section('main-container')
    <div class="page-heading header-text">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <span class="breadcrumb"><a href="#">Home</a> / Contact Us</span>
                    <h3>Contact Us</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="contact-page section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-heading">
                        <h6>| Contact Us</h6>
                        <h2>Get In Touch With Our Agents</h2>
                    </div>
                    <p>At Villa, we understand that buying or selling a property can be one of the most significant
                        decisions in a person's life. That's why we've built a platform that provides a seamless experience
                        from start to finish. Whether you're searching for your dream home or looking to sell your property
                        at the best price, Villa is here to guide you every step of the way. If you need more information,
                        please contact us.</p>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="item phone">
                                <img src="{{ url('frontend/assets/images/phone-icon.png') }}" alt=""
                                    style="max-width: 52px;">
                                <h6><a href="tel:0100200340">010-020-0340</a><br><span>Phone Number</span></h6>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="item email">
                                <img src="{{ url('frontend/assets/images/email-icon.png') }}" alt=""
                                    style="max-width: 52px;">
                                <h6><a href="mailto:villarealtor@gmail.com">villarealtor@gmail.com</a><br><span
                                        id="email">Business
                                        Email</span></h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
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
                                    <button type="submit" id="form-submit" class="orange-button">Send Message</button>
                                </fieldset>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-12">
                    <div id="map">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12469.776493332698!2d-80.14036379941481!3d25.907788681148624!2m3!1f357.26927939317244!2f20.870722720054623!3f0!3m2!1i1024!2i768!4f35!3m3!1m2!1s0x88d9add4b4ac788f%3A0xe77469d09480fcdb!2sSunny%20Isles%20Beach!5e1!3m2!1sen!2sth!4v1642869952544!5m2!1sen!2sth"
                            width="100%" height="500px" frameborder="0"
                            style="border:0; border-radius: 10px; box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.15);"
                            allowfullscreen=""></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('title')
    Contact
@endsection

@section('social-icon')
    @parent
    <li><a href="#"><i class="fab fa-youtube"></i></a></li>
    <p>There is an extra youtube icon here.</p>
@endsection
