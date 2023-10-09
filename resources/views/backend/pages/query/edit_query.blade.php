@extends('backend.master_template.template')

@section('content')

<div class="br-pagetitle">
    <i class="icon ion-ios-home-outline"></i>
    <div>
      <h4>Query Page</h4>
      <p class="mg-b-0">Edit a Query</p>
    </div>
</div>

      <div class="br-pagebody">
        <form action="{{route('queryupdate', $editquery->id)}}" method="post" enctype="multipart/form-data">
          @csrf
        <div class="row">
          <div class="col-sm-6">
        
          	 <div class="form-group">
              <label for="question">Question</label> 
              <input type="text" name="question" id="question" placeholder="Edit this Question" class="form-control" value="{{ $editquery->qustion }}">
              <span class="text-danger">
                @error('question')
                  {{ $message }}
                @enderror
              </span>
             </div>
             <div class="form-group">
               
              <label for="answer">Query Answer</label> 
              <textarea type="text" name="answer" id="answer" placeholder="Edit Query answer" class="form-control">{!!$editquery->answer!!}</textarea>
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
            <option value="1" @if($editquery->status==1) selected @endif >Active</option>
            <option value="2" @if($editquery->status==2) selected @endif >Inactive</option>
          </select>
        </div>

             <div class="form-group">
               <button class="form-control btn btn-info" >Update Query</button>
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
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
@endsection