<footer class="footer-section">
    <div class="container">

        <div class="footer-content pt-5 pb-5">
            <div class="row">
                <div class="col-xl-4 col-lg-4 mb-50">
                    <div class="footer-widget">
                        <div class="footer-logo">
                            <!-- ***** Logo Start ***** -->
                            <a href="{{ route('home') }}" class="logo" alt="logo">
                                <h1>Villa</h1>
                            </a>
                            <!-- ***** Logo End ***** -->
                        </div>
                        <div class="footer-text">
                            <p>At Villa, we understand that buying or selling a property can be one of the
                                most
                                significant decisions in a person's life. That's why we've built a platform
                                that
                                provides a seamless experience from start to finish.</p>
                        </div>
                        <div class="footer-social-icon">
                            <span>Follow us</span>
                            <a href="JavaScript:void(0)"><i class="fab fa-facebook-f facebook-bg"></i></a>
                            <a href="JavaScript:void(0)"><i class="fab fa-twitter twitter-bg"></i></a>
                            <a href="JavaScript:void(0)"><i class="fab fa-google-plus-g google-bg"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 mb-30">
                    <div class="footer-widget">
                        <div class="footer-widget-heading">
                            <h3>Useful Links</h3>
                        </div>
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">about</a></li>
                            <li><a href="#">services</a></li>
                            <li><a href="#">portfolio</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">About us</a></li>
                            <li><a href="#">Our Services</a></li>
                            <li><a href="#">Expert Team</a></li>
                            <li><a href="#">Contact us</a></li>
                            <li><a href="#">Latest News</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 mb-50">
                    <div class="footer-widget">
                        <div class="footer-widget-heading">
                            <h3>Subscribe</h3>
                        </div>
                        <div class="footer-text mb-25">
                            <p>Don’t miss to subscribe to our new feeds, kindly fill the form below.</p>
                        </div>
                        <div class="subscribe-form">
                            <form action="#">
                                <input type="text" placeholder="Email Address">
                                <button><i class="fab fa-telegram-plane"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 text-center text-lg-left">
                    <div class="copyright-text">
                        <p>Copyright &copy; 2024, All Right Reserved</p>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 d-none d-lg-block text-right">
                    <div class="footer-menu">
                        <ul>
                            <li><a href="{{ route('home') }}" class="{{ Request::is('/') ? 'active' : '' }}">Home</a>
                            </li>
                            <li><a href="{{ route('property') }}"
                                    class="{{ Request::is('property') ? 'active' : '' }}">Properties</a></li>
                            <li><a href="{{ route('contact') }}"
                                    class="{{ Request::is('contact') ? 'active' : '' }}">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

@if (Route::currentRouteName() == 'property')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ url('frontend/assets/js/modal.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/property-fliter-script.js') }}"></script>
@else
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ asset('frontend/assets/js/whatsapp.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/download-pdf.js') }}"></script>
    <script src="{{ url('frontend/assets/js/modal.js') }}"></script>
    <script src="{{ url('frontend/assets/js/isotope.min.js') }}"></script>
    <script src="{{ url('frontend/assets/js/owl-carousel.js') }}"></script>
    <script src="{{ url('frontend/assets/js/counter.js') }}"></script>
    <script src="{{ url('frontend/assets/js/custom.js') }}"></script>
    <script src="{{ url('frontend/assets/js/chatbot.js') }}"></script>
    @stack('home-script')
@endif


</body>

</html>
