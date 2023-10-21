@extends('frontend.master_template.frontend_template')
@section('frontend')

            <!-- Fact Start -->
            <div class="fact">
                <div class="container-fluid">
                    <div class="row counters">
                        <div class="col-md-6 fact-left wow slideInLeft">
                            <div class="row">
                                <div class="col-6">
                                    <div class="fact-icon">
                                        <i class="flaticon-worker"></i>
                                    </div>
                                    <div class="fact-text">
                                        <h2 data-toggle="counter-up">{{$countemployee}}</h2>
                                        <p>Expert Workers</p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="fact-icon">
                                        <i class="flaticon-building"></i>
                                    </div>
                                    <div class="fact-text">
                                        <h2 data-toggle="counter-up">{{$countclient}}</h2>
                                        <p>Happy Clients</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 fact-right wow slideInRight">
                            <div class="row">
                                <div class="col-6">
                                    <div class="fact-icon">
                                        <i class="flaticon-address"></i>
                                    </div>
                                    <div class="fact-text">
                                        <h2 data-toggle="counter-up">{{$countcompleteproject}}</h2>
                                        <p>Completed Projects</p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="fact-icon">
                                        <i class="flaticon-crane"></i>
                                    </div>
                                    <div class="fact-text">
                                        <h2 data-toggle="counter-up">{{$countrunningproject}}</h2>
                                        <p>Running Projects</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Fact End -->


            <!-- Service Start -->
            <div class="service">
                <div class="container">
                    <div class="section-header text-center">
                        <p>Our Services</p>
                        <h2>We Provide Services</h2>
                    </div>
                    <div class="row">
                        @foreach($sershow as $data)
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            
                            <div class="service-item">
                                <div class="service-img">
                                    <a href="#"> <img height="200"width="80" src="{{ asset('backend/blogimage/'.$data->pic)  }}" alt="Image"></a>
                                    <div class="service-overlay">
                                        <p>
                                            {!! substr($data->description, 0, 100) !!}...
                                        </p>
                                    </div>
                                </div>
                                <div class="service-text">
                                    <h3 >{{$data->title}}</h3>
                                    <a class="btn" href="{{route('postshow',$data->slug)}}" >read more</a>
                                </div>
                            </div>
                           
                        </div>
                        @endforeach
                    
                    </div>
                </div>
            </div>
            <!-- Service End -->


            <!-- Video Start -->
            {{-- <div class="video wow fadeIn" data-wow-delay="0.1s">
                <div class="container">
                    <button type="button" class="btn-play" data-toggle="modal" data-src="https://www.youtube.com/embed/DWRcNpR6Kdc" data-target="#videoModal">
                        <span></span>
                    </button>
                </div>
            </div>
            
            <div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>        
                            <!-- 16:9 aspect ratio -->
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="" id="video"  allowscriptaccess="always" allow="autoplay"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <!-- Video End -->


            <!-- Team Start -->
            <div class="team">
                <div class="container">
                    <div class="section-header text-center">
                        <p>Our Team</p>
                        <h2>Meet Our Engineer</h2>
                    </div>
                    <div class="row">
                        @foreach($team as $data)
                        <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="team-item">
                                <div class="team-img">
                                    <img style="height:250px;"src="{{asset('backend/employeeimage/'.$data->pic)}}" alt="Team Image">
                                </div>
                                <div class="team-text">
                                    <h2>{{$data->name}}</h2>
                                    <p>{{$data->designation}}</p>
                                </div>
                                <div class="team-social">
                                    <a class="social-tw" href="mailto:{{$data->emaillink}}"><i class="fab fa-google"></i></a>
                                    <a class="social-li" href="{{$data->linkdnlink}}"><i class="fab fa-linkedin-in"></i></a>
                                    <a class="social-li" href="#"><i class="fab fa-twitter"></i></a>
                                    <a class="social-li" href="#"><i class="fab fa-facebook"></i></a>
                                  
                                </div>
                            </div>
                        </div>
                        @endforeach
                          
                        </div>
                        {{-- <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                            <div class="team-item">
                                <div class="team-img">
                                    <img src="{{asset('frontend/img/team-2.jpg')}}" alt="Team Image">
                                </div>
                                <div class="team-text">
                                    <h2>Dylan Adams</h2>
                                    <p>Civil Engineer</p>
                                </div>
                                <div class="team-social">
                                    <a class="social-tw" href=""><i class="fab fa-twitter"></i></a>
                                    <a class="social-fb" href=""><i class="fab fa-facebook-f"></i></a>
                                    <a class="social-li" href=""><i class="fab fa-linkedin-in"></i></a>
                                    <a class="social-in" href=""><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div> --}}
                        {{-- <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                            <div class="team-item">
                                <div class="team-img">
                                    <img src="{{asset('frontend/img/team-3.jpg')}}" alt="Team Image">
                                </div>
                                <div class="team-text">
                                    <h2>Jhon Doe</h2>
                                    <p>Interior Designer</p>
                                </div>
                                <div class="team-social">
                                    <a class="social-tw" href=""><i class="fab fa-twitter"></i></a>
                                    <a class="social-fb" href=""><i class="fab fa-facebook-f"></i></a>
                                    <a class="social-li" href=""><i class="fab fa-linkedin-in"></i></a>
                                    <a class="social-in" href=""><i class="fab fa-instagram"></i></a>
                                </div>
                            </div> --}}
                        {{-- </div>
                        <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.4s">
                            <div class="team-item">
                                <div class="team-img">
                                    <img src="{{asset('frontend/img/team-4.jpg')}}" alt="Team Image">
                                </div>
                                <div class="team-text">
                                    <h2>Josh Dunn</h2>
                                    <p>Painter</p>
                                </div>
                                <div class="team-social">
                                    <a class="social-tw" href=""><i class="fab fa-twitter"></i></a>
                                    <a class="social-fb" href=""><i class="fab fa-facebook-f"></i></a>
                                    <a class="social-li" href=""><i class="fab fa-linkedin-in"></i></a>
                                    <a class="social-in" href=""><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
            <!-- Team End -->
            

            <!-- FAQs Start -->
            <div class="faqs">
                <div class="container">
                    <div class="section-header text-center">
                        <p>Frequently Asked Question</p>
                        <h2>You May Ask</h2>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div id="accordion-1">
                                @foreach($queryshow as $key=>$data)
                                <div class="card wow fadeInLeft" data-wow-delay="0.1s">
                                    <div class="card-header">
                                        <a class="card-link collapsed" data-toggle="collapse" href="#collapseOne{{$key}}">
                                            {{$data->qustion}}
                                        </a>
                                    </div>
                                    <div id="collapseOne{{$key}}" class="collapse" data-parent="#accordion-1">
                                        <div class="card-body">
                                            {!!$data->answer!!}
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                             
                            
                             
                              
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div id="accordion-2">
                                @foreach($queryshow1 as $key=>$data)
                                <div class="card wow fadeInRight" data-wow-delay="0.1s">
                                    <div class="card-header">
                                        <a class="card-link collapsed" data-toggle="collapse" href="#collapseSix{{$key}}">
                                            {{$data->qustion}}
                                        </a>
                                    </div>
                                    <div id="collapseSix{{$key}}" class="collapse" data-parent="#accordion-2">
                                        <div class="card-body">
                                            {!!$data->answer!!}
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                               
                               
                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- FAQs End -->


          
             <!-- Testimonial Start -->
            
             <div class="slider-area">
                <div class="row">
                    <div class="col-md-12">
                        <h5 class="text-center text-warning">Our Happy Clients</h5>
                    </div>
                </div>
                <div class="container">
                    @if(count($clientshow) > 0)
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                       
                            @foreach($clientshow as $key => $data)
                            <li class="d-none" data-target="#carouselExampleControls" data-slide-to="{{ $key }}" @if($key == 0) class="active" @endif></li>
                            @endforeach
                        
                        <div class="carousel-inner">
                            @foreach($clientshow as $key => $data)
                            <div class="carousel-item @if($key == 0) active @endif">
                                <div class="img-area">
                                    <img src="{{asset('backend/clientimage/'.$data->pic)}}" alt="client">
                                </div>
                                <div class="carousel-caption  d-md-block d-sm-block">
                                    <h5>{{$data->name}}</h5>
                                    <h3>{{ $data->profession }}</h3>
                                    <p>{!!$data->opinion!!}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    @else
                    <p>No client testimonials available.</p>
                    @endif
                </div>
            </div>
                    
                    
                  
                
           
          
            <!-- Testimonial End -->


            <!-- Blog Start -->
            <div class="blog">
                <div class="container">
                    <div class="section-header text-center">
                        <p>Latest Blog</p>
                        <h2>Latest From Our Blog</h2>
                    </div>
                   
                    <div class="row">
                        @foreach($blogshow as $data)
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                            <div class="blog-item">
                                <div class="blog-img">
                                   <a href="{{route('blogsshow',$data->slug)}}"> <img height="200"width="80" src="{{ asset('backend/blogpostimage/'.$data->pic)  }}" alt="Image"></a>
                                </div>
                                <div class="blog-title">
                                    <h3>{{$data->title}}</h3>
                                    <a class="btn" href="{{route('blogsshow',$data->slug)}}">Read more</a>
                                </div>
                                <div class="blog-meta">
                                    <p>By<a href="#">Admin</a></p>
                                    <p>In<a href="#"> {{$data->created_at->format('M d, y')}} . {{$data->created_at->diffForHumans()}}</a></p>
                                </div>
                                <div class="blog-text">
                                    <p> 
                                        {!! substr($data->description, 0, 100) !!}...
                                      
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                      
                    </div>
                 
                </div>
            </div>
            <!-- Blog End -->
@endsection