@extends('backend.master_template.template')

@section('content')

<div class="br-pagetitle">
    <i class="icon ion-ios-home-outline"></i>
    <div>
      <h4>Post Page</h4>
      <p class="mg-b-0">Add a Post</p>
    </div>
</div>

      <div class="br-pagebody">
        <form action="{{route('blogstore')}}" method="post" enctype="multipart/form-data">
          @csrf
        <div class="row">
         
          <div class="col-sm-6">
            @if(Session::has('message'))
        
            <span id="flash-message" class="alert alert-success">{{ Session::get('message') }}</span>
               @endif
          <div class="form-group">
              <label for="type">Select post Category</label>
              <select name="type" id="type" class="form-control">
                <option value="">------Select post Category-----</option>
        
                <option value="0">welcome</option> 
                <option value="1">About</option> 
                <option value="2">Services</option> 
                <option value="3">Blog</option> 

              </select>
              <span class="text-danger">
                @error('type')
                  {{ $message }}
                @enderror
              </span>
            </div>
          	 <div class="form-group">
              <label for="title">Post Title</label> 
              <input type="text" name="title" id="title" placeholder="Enter Post title" class="form-control" value="{{ old('title') }}">
              <span class="text-danger">
                @error('title')
                  {{ $message }}
                @enderror
              </span>
             </div>
             <div class="form-group">
              <label for="description">Post content</label> 
              <textarea type="text" name="description" id="description" placeholder="Enter post content" class="form-control"  value="{{ old('description') }}"></textarea>
              <span class="text-danger">
                @error('description')
                  {{ $message }}
                @enderror
              </span>
             </div>

             <div class="form-group">
              <label for="pic">choose a picture</label> 
              <input type="file" name="pic" id="pic" placeholder="Choose a picture" class="form-control" value="{{ old('pic') }}">
              <span class="text-danger">
                @error('pic')
                  {{ $message }}
                @enderror
              </span>
             </div>


             <div class="form-group">
              <label for="status">Post Status</label>
              <select name="status" id="status" class="form-control">
                <option value="">-----Select Status-----</option>
                <option value="1">Active</option>
                <option value="2">Inactive</option>
              </select>
             </div>

             <div class="form-group">
               <button class="form-control btn btn-info" >Add Post</button>
             </div>
          </div>
          </div><!-- col-3 -->
        </form>
      </div><!-- br-pagebody -->
      <script>
        ClassicEditor
            .create(document.querySelector('#description'))
            .catch(error => {
                console.error(error);
            });

            document.addEventListener('DOMContentLoaded', function () {
         var flashMessage = document.getElementById('flash-message');
        if (flashMessage) {
        setTimeout(function () {
            flashMessage.style.display = 'none';
         }, 3000); // 3 seconds
       }
      });
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
@endsection