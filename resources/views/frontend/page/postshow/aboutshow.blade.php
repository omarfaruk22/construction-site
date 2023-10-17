@extends('frontend.master_template.frontend_template1')
@section('content')
   
            <!-- Page Header Start -->
            <div class="page-header">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h2>About Us</h2>
                        </div>
                        <div class="col-12">
                            <a href="{{route('landing')}}">Home</a>
                            <a href="{{route('aboutshow')}}">About Us</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page Header End -->

     <!-- About Start -->
            <div class="about wow fadeInUp" data-wow-delay="0.1s">
                <div class="container">
                    @foreach($aboutshows as $data)
                    <div class="row align-items-center">
                        <div class="col-lg-5 col-md-6">
                            <div class="about-img">
                                <img src="{{asset('backend/blogimage/'.$data->pic)}}" alt="Image">
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-6">
                            <div class="section-header text-left">
                                <p>Welcome to Builderz</p>
                                <h2>{{$data->title}}</h2>
                            </div>
                            <div class="about-text">
                                <p>
                                    {!! substr($data->description, 0, 300) !!}...
                                </p>
                                <a class="btn" href="{{route('postshow',$data->slug)}}">Learn More</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <!-- About End -->
            
            
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
                                        <h2 data-toggle="counter-up">{{$countemployee1}}</h2>
                                        <p>Expert Workers</p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="fact-icon">
                                        <i class="flaticon-building"></i>
                                    </div>
                                    <div class="fact-text">
                                        <h2 data-toggle="counter-up">{{$countclient1}}</h2>
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
                                        <h2 data-toggle="counter-up">{{$countcompleteproject1}}</h2>
                                        <p>Completed Projects</p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="fact-icon">
                                        <i class="flaticon-crane"></i>
                                    </div>
                                    <div class="fact-text">
                                        <h2 data-toggle="counter-up">{{$countrunningproject1}}</h2>
                                        <p>Running Projects</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Fact End -->
            
            
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
                                @foreach($queryshow2 as $key=>$data)
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
                                @foreach($queryshow3 as $key=>$data)
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
         
            <!-- Contact End -->
@endsection