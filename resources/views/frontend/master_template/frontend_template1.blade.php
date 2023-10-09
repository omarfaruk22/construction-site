<!DOCTYPE html>
<html lang="en">
    <head>
  @include('frontend.includes.head')
    </head>

    <body>
        <div class="wrapper">
            <!-- Top Bar Start -->
          @include('frontend.includes.topbar')
            <!-- Top Bar End -->

            <!-- Nav Bar Start -->
          @include('frontend.includes.navbar')
            <!-- Nav Bar End -->



@yield('content')


            <!-- Footer Start -->
          @include('frontend.includes.footer')
            <!-- Footer End -->

            <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
        </div>

        <!-- JavaScript Libraries -->
       @include('frontend.includes.js')
    </body>
</html>
