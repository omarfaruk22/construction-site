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
        <form action="{{route('postupdate', $blogedit->id)}}" method="post" enctype="multipart/form-data">
          @csrf
        <div class="row">
          <div class="col-sm-6">
        
            <div class="form-group">
              <label for="type">Select post Category</label>
              <select name="type" id="type" class="form-control">
                <option value="">------Select post Category-----</option>
                <option value="0" @if($blogedit->type==0) selected @endif >Project</option>
                <option value="1" @if($blogedit->type==1) selected @endif >About</option>
                <option value="2" @if($blogedit->type==2) selected @endif >Services</option>
                <option value="3" @if($blogedit->type==3) selected @endif >Blog</option>
                <option value="4" @if($blogedit->type==4) selected @endif >Welcome</option>
      
              </select>
              <span class="text-danger">
                @error('type')
                  {{ $message }}
                @enderror
              </span>
            </div>
          	 <div class="form-group">
              <label for="title">Post Title</label> 
              <input type="text" name="title" id="title" placeholder="Enter Post title" class="form-control" value="{{$blogedit->title}}">
              <span class="text-danger">
                @error('title')
                  {{ $message }}
                @enderror
              </span>
             </div>
             <div class="form-group">
              <label for="description">Post content</label> 
              <textarea type="text" name="description" id="description" placeholder="Enter post content" class="form-control" >{{$blogedit->description}}</textarea>
              <span class="text-danger">
                @error('description')
                  {{ $message }}
                @enderror
              </span>
             </div>

             <div class="form-group">
              <label for="pic">Edit picture</label> 
              <img height="150" src="{{ asset('backend/blogimage/'.$blogedit->pic) }}" alt="edit">
               
               <input type="file" name="pic" id="pic" placeholder=" edit picture" class="form-control" value="{{ old('pic') }}">
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
                <option value="1" @if($blogedit->status==1) selected @endif >Active</option>
                 <option value="2" @if($blogedit->status==2) selected @endif >Inactive</option>
              </select>
             </div>

             <div class="form-group">
               <button class="form-control btn btn-info" >Update Post</button>
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
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
@endsection