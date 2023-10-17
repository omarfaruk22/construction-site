@extends('frontend.master_template.frontend_template1')
@section('content')

            <!-- Page Header Start -->
            <div class="page-header">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h2>Our Project</h2>
                        </div>
                        <div class="col-12">
                            <a href="">Home</a>
                            <a href="">Our Project</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page Header End -->

     <!-- Portfolio Start -->
     <div class="blog">
        <div class="container">
            <div class="section-header text-center">
                <p>Latest Project</p>
                <h2>Latest From Our Project</h2>
            </div>
            <div class="row blog-page">
                @foreach($projectshow as $data)
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="blog-item">
                        <div class="blog-img">
                            <a href=""> <img height="200"width="80" src="{{ asset('backend/blogimage/'.$data->pic)  }}" alt="Image"></a>
                        </div>
                        <div class="blog-title">
                            <h3>{{$data->title}}</h3>
                            <a class="btn" href="{{route('postshow',$data->slug)}}">Read more</a>
                        </div>
                        <div class="blog-meta">
                            <p>By<a href="">Admin</a></p>
                            <p>In<a href="">Construction</a></p>
                        </div>
                        <div class="blog-text">
                            <p>
                               {!!$data->description!!}.
                            </p>
                        </div>
                    </div>
                </div>
              
                @endforeach
               
               
               
               
              
             
            </div>
            <div class="row">
                <div class="col-12">
                    {!! $projectshow->links() !!}
                </div>
            </div>
        </div>
    </div>
    <!-- Portfolio End -->
         
            <!-- Contact End -->
@endsection