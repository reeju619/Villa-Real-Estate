@include('admin.layouts.header')

@hasSection('content')
    @yield('content')
@else
    <h2>No Content Found.</h2>
@endif

@yield('scripts') <!-- Add this line to yield scripts -->

@include('admin.layouts.footer')
