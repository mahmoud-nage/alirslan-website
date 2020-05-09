@include('layouts.head')

@include('layouts.navbar')

<body>
  <div class="boxed_wrapper row">
  
  <!--Start Preloader -->
  <div class="preloader col-lg-12 col-md-12 col-sm-12 col-xs-12"></div>
  <!--End Preloader --> 
    @yield('content')

  </div>

@include('layouts.footer')

@include('layouts.scripts')

