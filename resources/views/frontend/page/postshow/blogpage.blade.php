@extends('frontend.master_template.frontend_template1')
@section('content')


            <!-- Page Header Start -->
            <div class="page-header">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h2>Our Blog</h2>
                        </div>
                        <div class="col-12">
                            <a href="">Home</a>
                            <a href="">Our Blog</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page Header End -->

 <!-- Blog Start -->
 <div class="blog">
    <div class="container">
        <div class="section-header text-center">
            <p> Blog</p>
            <h2> Our Blog</h2>
        </div>
        <div class="row blog-page">
            @forelse($blogpost as $data)
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                <div class="blog-item">
                    <div class="blog-img">
                        <a href=""> <img height="200"width="80" src="{{ asset('backend/blogpostimage/'.$data->pic)  }}" alt="Image"></a>
                    </div>
                    <div class="blog-title">
                        <h3>{{$data->title}}</h3>
                        <a class="btn" href="{{route('blogsshow',$data->slug)}}">Read more</a>
                    </div>
                    <div class="blog-meta">
                        <p>By<a href="">Admin</a></p>
                        <p>In<a href="">{{$data->created_at->diffForHumans()}}</a></p>
                    </div>
                    <div class="blog-text">
                        <p>
                           {!!$data->short_des!!}.
                        </p>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-md-12">
                
                   
                    <div class="text-center">
                        <h3>No Post Available</h3>
                    
                 
                </div>
            </div>
          
            @endforelse
           
           
           
           
          
         
        </div>
        <div class="row">
            <div class="col-12">
                {!! $blogpost->links() !!}
            </div>
        </div>
    </div>
</div>
<!-- Blog End -->
         
            <!-- Contact End -->
@endsection