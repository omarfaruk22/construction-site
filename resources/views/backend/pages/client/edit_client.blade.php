@extends('backend.master_template.template')

@section('content')

<div class="br-pagetitle">
    <i class="icon ion-ios-home-outline"></i>
    <div>
      <h4>Client Page</h4>
      <p class="mg-b-0">Edit a Client</p>
    </div>
</div>

      <div class="br-pagebody">
        <form action="{{route('clientupdate', $editclient->id)}}" method="post" enctype="multipart/form-data">
          @csrf
        <div class="row">
          <div class="col-sm-6">
          	 <div class="form-group">
              <label for="name">Client Name</label> 
              <input type="text" name="name" id="name" placeholder="Edit Client Name" class="form-control" value="{{$editclient->name}}">
              <span class="text-danger">
                @error('name')
                  {{ $message }}
                @enderror
              </span>
             </div>
             <div class="form-group">
                <label for="name">Client Opinion</label> 
                <textarea type="text" name="opinion" id="opinion" placeholder="Edit Client opinion" class="form-control"> {!!$editclient->opinion!!}</textarea>
                <span class="text-danger">
                  @error('opinion')
                    {{ $message }}
                  @enderror
                </span>
               </div>
 
             <div class="form-group">
              <label for="pic">Edit picture</label> 
              <img height="150" src="{{ asset('backend/clientimage/'.$editclient->pic) }}" alt="edit">
               
               <input type="file" name="pic" id="pic" placeholder=" edit picture" class="form-control" value="{{ old('pic') }}">
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
                <option value="1" @if($editclient->status==1) selected @endif >Active</option>
                 <option value="2" @if($editclient->status==2) selected @endif >Inactive</option>
              </select>
             </div>

             <div class="form-group">
               <button class="form-control btn btn-info" >Update Client</button>
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
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
      
@endsection