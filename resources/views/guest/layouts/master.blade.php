@include('guest.layouts.__header')

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->


    @include('guest.layouts.__navbar')
     
    @include('guest.layouts.__hero')
    @include('guest.layouts.__process')
    @yield('content')

    @include('guest.layouts.__benefit')
    @include('guest.layouts.__testimonial')

    @include('guest.layouts.__footer')

    <!-- Back to Top -->
    <a href="#" class="btn btn-info border-3 border-info rounded-circle back-to-top"><i
            class="fa fa-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/guest/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('assets/guest/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/guest/lib/lightbox/js/lightbox.min.js') }}"></script>
    <script src="{{ asset('assets/guest/lib/owlcarousel/owl.carousel.min.js') }}"></script>


     <script src="{{asset('assets/guest/js/main.js')}}"></script>


     @yield('script')
</body>

</html>