@include('frontend.layouts.header')
@include('frontend.partials.modal-form')
@hasSection('main-container')
    @yield('main-container')
@else
    <h2>No Content Found.</h2>
@endif
@include('frontend.layouts.footer')
