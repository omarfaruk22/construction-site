@extends('frontend.master_template.frontend_template1')
@section('content')
          <!-- Team Start -->
          <div class="team">
            <div class="container">
                <div class="section-header text-center">
                    <p>Our Team</p>
                    <h2>Meet Our Engineer</h2>
                </div>
                <div class="row">
                    @foreach($teamshow as $data)
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
                                <a class="social-fb" href=""><i class="fab fa-facebook-f"></i></a>
                                
                                <a class="social-in" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div> 
                    @endforeach  
                               
                </div>
                {!! $teamshow->links() !!}   
            </div>
        </div>
        <!-- Team End -->
    
@endsection