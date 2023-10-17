<div id="carousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        @foreach($carshow as $key => $data)
            <li data-target="#carousel" data-slide-to="{{$key}}" @if($loop->first) class="active" @endif></li>
        @endforeach
    </ol>
    <div class="carousel-inner">
        @foreach($carshow as $key => $data)
            <div class="carousel-item @if($loop->first) active @endif">
                <img src="{{asset('backend/blogimage/'.$data->pic)}}" alt="Carousel Image">
                <div class="carousel-caption">
                    <p class="animated fadeInRight">{{$data->title}}</p>
                    <h1 class="animated fadeInLeft">{!! substr($data->description, 0, 50) !!}</h1>
                    <a class="btn animated fadeInUp" href="{{route('postshow',$data->slug)}}">Know More</a>
                </div>
            </div>
        @endforeach
    </div>

    @foreach($carshow as $key => $data)
        <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    @endforeach
</div>