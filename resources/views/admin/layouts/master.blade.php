@include('admin.layouts.__header')

<body  style="overflow-y: auto;">

    <script src="{{asset('assets/admin/static/js/initTheme.js')}}"></script>
    
    @include('admin.layouts.__sidebar')
    <div id="app">
      
        
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
         
            @yield('content')
               
            @include('admin.layouts.__footer')
              
            

        
        </div>
    </div>
    
    <script src="{{asset('assets/admin/static/js/components/dark.js')}}"></script>
    <script src="{{asset('assets/admin/extensions/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    
    
        <script src="{{asset('assets/admin/compiled/js/app.js')}}"></script>
    

    
<!-- Need: Apexcharts -->

<script src="{{asset('assets/admin/extensions/apexcharts/apexcharts.min.js')}}"></script>
<script src="{{asset('assets/admin/static/js/pages/dashboard.js')}}"></script>

@yield('script')

<svg id="SvgjsSvg1360" width="2" height="0" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" style="overflow: hidden; top: -100%; left: -100%; position: absolute; opacity: 0;"><defs id="SvgjsDefs1361"></defs><polyline id="SvgjsPolyline1362" points="0,0"></polyline><path id="SvgjsPath1363" d="M-1 54.09090909090909L-1 54.09090909090909C-1 54.09090909090909 19.17391304347826 54.09090909090909 19.17391304347826 54.09090909090909C19.17391304347826 54.09090909090909 31.956521739130434 54.09090909090909 31.956521739130434 54.09090909090909C31.956521739130434 54.09090909090909 44.73913043478261 54.09090909090909 44.73913043478261 54.09090909090909C44.73913043478261 54.09090909090909 57.52173913043478 54.09090909090909 57.52173913043478 54.09090909090909C57.52173913043478 54.09090909090909 70.30434782608695 54.09090909090909 70.30434782608695 54.09090909090909C70.30434782608695 54.09090909090909 83.08695652173913 54.09090909090909 83.08695652173913 54.09090909090909C83.08695652173913 54.09090909090909 95.8695652173913 54.09090909090909 95.8695652173913 54.09090909090909C95.8695652173913 54.09090909090909 108.65217391304347 54.09090909090909 108.65217391304347 54.09090909090909C108.65217391304347 54.09090909090909 121.43478260869566 54.09090909090909 121.43478260869566 54.09090909090909C121.43478260869566 54.09090909090909 134.2173913043478 54.09090909090909 134.2173913043478 54.09090909090909C134.2173913043478 54.09090909090909 147 54.09090909090909 147 54.09090909090909C147 54.09090909090909 147 54.09090909090909 147 54.09090909090909 "></path></svg>
</body>
</html>