@extends('backend.master_template.template')

@section('content')

<div class="br-pagetitle">
    <i class="icon ion-ios-home-outline"></i>
    <div>
      <h4>Client Page</h4>
      <p class="mg-b-0">Add a Client</p>
    </div>
</div>

      <div class="br-pagebody">
        <form action="{{route('clientstore')}}" method="post" enctype="multipart/form-data">
          @csrf
        <div class="row">
         
          <div class="col-sm-6">
            @if(Session::has('message'))
        
            <span id="flash-message" class="alert alert-success">{{ Session::get('message') }}</span>
               @endif
         
          	 <div class="form-group">
              <label for="name">Client Name</label> 
              <input type="text" name="name" id="name" placeholder="Enter Client Name" class="form-control" value="{{ old('name') }}">
              <span class="text-danger">
                @error('name')
                  {{ $message }}
                @enderror
              </span>
             </div>
             <div class="form-group">
              <label for="opinion">Client Opinion</label> 
              <textarea type="text" name="opinion" id="opinion" placeholder="Enter Client opinion" class="form-control"  value="{{ old('opinion') }}"></textarea>
              <span class="text-danger">
                @error('opinion')
                  {{ $message }}
                @enderror
              </span>
             </div>

             <div class="form-group">
              <label for="pic">choose client picture</label> 
              <input type="file" name="pic" id="pic" placeholder="Choose a picture" class="form-control" value="{{ old('pic') }}">
              <span class="text-danger">
                @error('pic')
                  {{ $message }}
                @enderror
              </span>
             </div>


             <div class="form-group">
              <label for="status">Client Status</label>
              <select name="status" id="status" class="form-control">
                <option value="">-----Select Status-----</option>
                <option value="1">Active</option>
                <option value="2">Inactive</option>
              </select>
             </div>

             <div class="form-group">
               <button class="form-control btn btn-info" >Add Client</button>
             </div>
          </div>
          </div><!-- col-3 -->
        </form>
      </div><!-- br-pagebody -->
      <script>
        ClassicEditor
            .create(document.querySelector('#opinion'))
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