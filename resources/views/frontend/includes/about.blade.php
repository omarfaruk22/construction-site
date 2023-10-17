<div class="about wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="row align-items-center">
            @foreach($aboutshow as $data)
            <div class="col-lg-5 col-md-6 aboutp">
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
            @endforeach
        </div>
    </div>
</div>