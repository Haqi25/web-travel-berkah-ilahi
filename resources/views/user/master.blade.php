@include('user.layouts.__header')

<body>
        {{-- <!-- Spinner Start -->
    <div id="spinner"
        class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End --> --}}
  

    @include('user.layouts.__navbar')
     
    @include('user.layouts.__hero')
    @include('user.layouts.__service')
    @yield('content')



    @include('user.layouts.__testimonial')
    @include('user.layouts.__contact')
    @include('user.layouts.__footer')

       
    <!-- Back to Top -->
    <a href="#" class="btn btn-info border-3 border-info rounded-circle back-to-top"><i
            class="fa fa-arrow-up"></i></a>

     <script src="{{env('APP_URL')}}/assets/guest/js/main.js"></script>
     
       <script src="{{env('APP_URL')}}/assets/guest/js/animation.js"></script>
    @yield('script')

</body>
</html>