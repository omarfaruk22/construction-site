<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- head -->
    @include('backend.includes.head')
    <!-- css file -->
    @include('backend.includes.css')
  </head>
  <body>
    <!-- sidebar -->
    @include('backend.includes.sidebar')
    <!-- topbar -->
    @include('backend.includes.topbar')
    <!-- Rightbar -->
    @include('backend.includes.rightbar')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
      
      @yield('content')

      <!-- Footer -->
          @include('backend.includes.footer')
    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
    <!-- Scripts -->
    @include('backend.includes.scripts')
  </body>
</html>