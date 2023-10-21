@extends('frontend.master_template.frontend_template1')
@section('content')
@section('title', $blogshows->first()->title . ' | ' . config('app.name'))
@section('keywords', $blogshows->first()->meta_tag)

        <!-- Single Post Start-->
        <div class="single">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        @foreach($blogshows as $data)
                        <div class="single-content wow fadeInUp">
                            <img height="300"width="80" src="{{ asset('backend/blogpostimage/'.$data->pic)  }}" alt="Image">
                            <h2>{{$data->title}}</h2>
                            <p><span>Writter: {{$data->writer_name}}</span>  .  {{ $data->created_at->format('Y-m-d') }}</p>

                            <p>
                                {!! $data->description!!}
                            </p>
                           
                        </div>
                        @endforeach
                      
                        <div class="single-bio wow fadeInUp">
                            <div class="single-bio-img">
                                <img src="img/user.jpg" />
                            </div>
                            <div class="single-bio-text">
                                <h3>Admin </h3>
                                <p>
                                    Lorem ipsum dolor sit amet elit. Integer lorem augue purus mollis sapien, non eros leo in nunc. Donec a nulla vel turpis tempor ac vel justo. In hac platea dictumst.
                                </p>
                            </div>
                        </div> 

                       <div class="single-comment wow fadeInUp">
                            <h2>Comments</h2>
                            <ul class="comment-list">
                                @foreach($bgcommentshow as $data)
                                <li class="comment-item">
                                    <div class="comment-body">
                                        <div class="comment-img">
                                            <img src="{{asset('frontend/img/user1.png')}}" />
                                        </div>
                                        <div class="comment-text">
                                            <h3><a href="">{{$data->name}}</a></h3>
                                            <span>{{Carbon\Carbon::parse($data->created_at)->setTimezone('Asia/Dhaka')->format('M d, Y - h:i:s A')}}</span>
                                            <p>
                                                {{$data->comment}} .
                                            </p>
                                            
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul> 
                       </div>
                       <div class="comment-form wow fadeInUp">
                            <h2>Leave a comment</h2>
                            @if(Session::has('message'))
        
                            <span id="flash-message" class="alert alert-success">{{ Session::get('message') }}</span>
                               @endif
                            <form action="{{route('bgcommentsent')}}" method="post">
                                @csrf
                                <input type="hidden" class="form-control" id="blog_id"name="blog_id" value="{{$blogshow->id}}">
                                <div class="form-group">
                                    <label for="name">Name *</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email *</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                            <div class="form-group">
                                    <label for="comment">Message *</label>
                                    <textarea id="comment" name="comment" cols="30" rows="5" class="form-control" required></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Post Comment" class="btn">
                                </div>
                            </form>
                        </div> 
                    </div>

                    <div class="col-lg-4">
                        <div class="sidebar">
                            <div class="sidebar-widget wow fadeInUp">
                                <h2 class="widget-title">Categories</h2>
                                <div class="category-widget">
                                    <ul>
                                        
                                        @foreach($bgCategoryshow as $data)
                                      
                                        <li><a href="{{ route('blogshow',$data->name )}}">{{ $data->name}}</a><span>({{$data->blognam_count}})</span></li>
                                      
                                        @endforeach
                                       
                                        
                                    </ul>
                                </div>
                            </div>
                            <div class="sidebar-widget wow fadeInUp">
                                <h2 class="widget-title">Recent Blog Post</h2>
                                <div class="recent-post">
                                    @foreach($resentbgshow as $data)
                                    <div class="post-item">
                                        <div class="post-img">
                                            <img src="{{ asset('backend/blogpostimage/'.$data->pic)  }}" />
                                        </div>
                                        <div class="post-text">
                                            <a href="{{route('blogsshow',$data->slug)}}">{{$data->title}}</a>
                                            <div class="post-meta">
                                                <p>By<a href="">Admin</a></p>
                                                <p>In<a href="">{{$data->created_at->diffForHumans()}}</a></p>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                  
                                </div>
                            </div>

                            
                          
                           
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
        <!-- Single Post End--> 
@endsection