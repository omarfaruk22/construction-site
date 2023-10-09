@extends('backend.master_template.template')

@section('content')

<div class="br-pagetitle">
    <i class="icon ion-ios-home-outline"></i>
    <div>
      <h4>Project Page</h4>
      <p class="mg-b-0">Edit a Project</p>
    </div>
</div>

      <div class="br-pagebody">
        <form action="{{route('projectupdate', $projectedit->id)}}" method="post" enctype="multipart/form-data">
          @csrf
        <div class="row">
          <div class="col-sm-6">
        
          	 <div class="form-group">
              <label for="pname">Project Title</label> 
              <input type="text" name="pname" id="pname" placeholder="Edit project title" class="form-control" value="{{ $projectedit->name }}">
              <span class="text-danger">
                @error('pname')
                  {{ $message }}
                @enderror
              </span>
             </div>
             <div class="form-group">
               
              <label for="description">Project description</label> 
              <textarea type="text" name="description" id="description" placeholder="Edit project description" class="form-control">{!!$projectedit->description!!}</textarea>
              <span class="text-danger">
                @error('description')
                  {{ $message }}
                @enderror
              </span>
             </div>

             <div class="form-group">
              <label for="pic">Edit picture</label> 
             <img height="150" src="{{ asset('backend/projectimage/'.$projectedit->pic) }}" alt="edit">
              
              <input type="file" name="pic" id="pic" placeholder=" edit picture" class="form-control" value="{{ old('pic') }}">
              <span class="text-danger">
                @error('pic')
                  {{ $message }}
                @enderror
              </span>
             </div>
             <div class="form-group">
              <label for="type">Project type </label>
              <select name="type" id="type" class="form-control">
                <option value="">-----Edit Type-----</option>
                <option value="0" @if($projectedit->type==0) selected @endif >Upcomming</option>
                <option value="1" @if($projectedit->type==1) selected @endif >Running</option>
                <option value="2" @if($projectedit->type==2) selected @endif >Completed</option>
              </select>
            </div>

             <div class="form-group">
          <label for="status">Post Status</label>
          <select name="status" id="status" class="form-control">
            <option value="">-----Select Status-----</option>
            <option value="1" @if($projectedit->status==1) selected @endif >Active</option>
            <option value="2" @if($projectedit->status==2) selected @endif >Inactive</option>
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