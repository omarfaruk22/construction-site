@extends('backend.master_template.template')

@section('content')

<div class="br-pagetitle">
    <i class="icon ion-ios-home-outline"></i>
    <div>
      <h4>Query Page</h4>
      <p class="mg-b-0">Add a Query</p>
    </div>
    @if(Session::has('message'))
        
            <span id="flash-message" class="alert alert-success">{{ Session::get('message') }}</span>
               @endif
</div>

      <div class="br-pagebody">
        <form action="{{route('querystore')}}" method="post" enctype="multipart/form-data">
          @csrf
        <div class="row">
          <div class="col-sm-6">
        
          	 <div class="form-group">
              <label for="question">Qustion</label> 
              <input type="text" name="question" id="question" placeholder="Enter a Qustion" class="form-control" required>
              <span class="text-danger">
                @error('question')
                  {{ $message }}
                @enderror
              </span>
             </div>
             <div class="form-group">
              <label for="answer">Project description</label> 
              <textarea type="text" name="answer" id="answer" placeholder="Enter answer" class="form-control"  value="{{ old('answer') }}"></textarea>
              <span class="text-danger">
                @error('answer')
                  {{ $message }}
                @enderror
              </span>
             </div>
             <div class="form-group">
              <label for="status">Query Status</label>
              <select name="status" id="status" class="form-control">
                <option value="">-----Select Status-----</option>
                <option value="1">Active</option>
                <option value="2">Inactive</option>
              </select>
             </div>

             <div class="form-group">
               <button class="form-control btn btn-info" >Add Query</button>
             </div>
          </div>
          </div><!-- col-3 -->
        </form>
      </div><!-- br-pagebody -->
      <script>
        ClassicEditor
            .create(document.querySelector('#answer'))
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