@extends('backend.master_template.template')

@section('content')

<div class="br-pagetitle">
    <i class="icon ion-ios-home-outline"></i>
    <div>
      <h4>Project Page</h4>
      <p class="mg-b-0">Add a Project</p>
    </div>
    @if(Session::has('message'))
        
            <span id="flash-message" class="alert alert-success">{{ Session::get('message') }}</span>
               @endif
</div>

      <div class="br-pagebody">
        <form action="{{route('projectstore')}}" method="post" enctype="multipart/form-data">
          @csrf
        <div class="row">
          <div class="col-sm-6">
        
          	 <div class="form-group">
              <label for="pname">Project Title</label> 
              <input type="text" name="pname" id="pname" placeholder="Enter Project title" class="form-control" required>
              <span class="text-danger">
                @error('pname')
                  {{ $message }}
                @enderror
              </span>
             </div>
             <div class="form-group">
              <label for="name">Project description</label> 
              <textarea type="text" name="description" id="description" placeholder="Enter Project description" class="form-control"  value="{{ old('content') }}"></textarea>
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
              <label for="ptype">Project Type</label>
              <select name="ptype" id="ptype" class="form-control">
                <option value="">------Select Project Type-----</option>
              
                <option value="0">Upcomming</option> 
                <option value="1">Running</option> 
                <option value="2">Completed</option> 
             
              </select>
              <span class="text-danger">
                @error('ptype')
                  {{ $message }}
                @enderror
              </span>
            </div>


             <div class="form-group">
              <label for="status">Project Status</label>
              <select name="status" id="status" class="form-control">
                <option value="">-----Select Status-----</option>
                <option value="1">Active</option>
                <option value="2">Inactive</option>
              </select>
             </div>

             <div class="form-group">
               <button class="form-control btn btn-info" >Add Project</button>
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