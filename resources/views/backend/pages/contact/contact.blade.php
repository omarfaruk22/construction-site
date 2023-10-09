@extends('frontend.master_template.frontend_template1')
@section('content')

            <!-- Page Header Start -->
            <div class="page-header">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h2>Contact Us</h2>
                        </div>
                        <div class="col-12">
                            <a href="">Home</a>
                            <a href="">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page Header End -->


            <!-- Contact Start -->
            <div class="contact wow fadeInUp">
                <div class="container">
                    <div class="section-header text-center">
                        <p>Get In Touch</p>
                        <h2>For Any Query</h2>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="contact-info">
                                <div class="contact-item">
                                    <i class="flaticon-address"></i>
                                    <div class="contact-text">
                                        <h2>Location</h2>
                                        <p>123 Street, New York, USA</p>
                                    </div>
                                </div>
                                <div class="contact-item">
                                    <i class="flaticon-call"></i>
                                    <div class="contact-text">
                                        <h2>Phone</h2>
                                        <p>+012 345 67890</p>
                                    </div>
                                </div>
                                <div class="contact-item">
                                    <i class="flaticon-send-mail"></i>
                                    <div class="contact-text">
                                        <h2>Email</h2>
                                        <p>info@example.com</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="contact-form">
                                <div id="success"></div>
                                   @if(Session::has('message'))
        
                                    <span id="flash-message" class="alert alert-success">{{ Session::get('message') }}</span>
                                        @endif
                                <form action="{{route('contactstore')}}" method="post">
                                    @csrf
                                    <div class="control-group py-1">
                                        <input type="text" class="form-control " id="name" name="name" placeholder="Your Name" required="required" data-validation-required-message="Please enter your name" />
                                        <span class="text-danger">
                                            @error('name')
                                              {{ $message }}
                                            @enderror
                                          </span>
                                    </div>
                                    <div class="control-group py-1">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Your Email" required="required" data-validation-required-message="Please enter your email" />
                                        <span class="text-danger">
                                            @error('email')
                                              {{ $message }}
                                            @enderror
                                          </span>
                                    </div>
                                    <div class="control-group py-1">
                                        <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" required="required" data-validation-required-message="Please enter a subject" />
                                        <span class="text-danger">
                                            @error('subject')
                                              {{ $message }}
                                            @enderror
                                          </span>
                                    </div>
                                    <div class="control-group py-1">
                                        <textarea class="form-control" id="message" name="message" placeholder="Message" required="required" data-validation-required-message="Please enter your message"></textarea>
                                        <span class="text-danger">
                                            @error('message')
                                              {{ $message }}
                                            @enderror
                                          </span>
                                    </div>
                                    <div>
                                        <button class="btn " type="submit" id="sendMessageButton">Send Message</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
            <!-- Contact End -->
@endsection