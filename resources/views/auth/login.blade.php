@extends('layouts.adminlayout')

    @section('body')
    <div class="d-flex align-items-center justify-content-center ht-100v">
      <video id="headVideo" class="pos-absolute a-0 wd-100p ht-100p object-fit-cover" autoplay muted loop>
        <source src="{{ asset('backend/videos/video1.mp4') }}" type="video/mp4">
        <source src="{{ asset('backend/videos/video1.ogv') }}" type="video/ogg">
        <source src="{{ asset('backend/videos/video1.webm') }}" type="video/webm">
      </video><!-- /video -->
     

      <div class="overlay-body bg-black-7 d-flex align-items-center justify-content-center">
        <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 rounded bg-black-6">
          <div class="signin-logo tx-center tx-28 tx-bold tx-white"><span class="tx-normal">[</span> bracket <span class="tx-info">plus</span> <span class="tx-normal">]</span></div>
          <div class="tx-white-5 tx-center ">The Admin Template For Perfectionist</div>
          <div > @if(Session::has('message'))
        
            <span id="flash-message" class="alert alert-danger">{{ Session::get('message') }}</span>
               @endif</div>
         
          <form method="POST" action="{{ route('login') }}">
            @csrf


          <div class="form-group">
            <input type="text" name="email" class="form-control fc-outline-dark" placeholder="Enter your email">
          </div><!-- form-group -->
          <div class="form-group">
            <input type="password" name="password" class="form-control fc-outline-dark" placeholder="Enter your password">
            <a class="small" href="{{ route('password.request') }}">Forgot Password?</a>
          </div><!-- form-group -->
          <button type="submit" class="btn btn-info btn-block">Sign In</button>
          
        </form>

          <div class="mg-t-60 tx-center">Not yet a member? <a href="{{route('register')}}" class="tx-info">Sign Up</a></div>
        </div><!-- login-wrapper -->
      </div><!-- overlay-body -->
    </div><!-- d-flex -->
    <script>
document.addEventListener('DOMContentLoaded', function () {
    var flashMessage = document.getElementById('flash-message');
    if (flashMessage) {
        setTimeout(function () {
            flashMessage.style.display = 'none';
        }, 3000); // 3 seconds
    }
});


    </script>
    @endsection