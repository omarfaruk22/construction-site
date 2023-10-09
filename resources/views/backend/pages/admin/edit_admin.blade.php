@extends('backend.master_template.template')

@section('content')

<div class="br-pagetitle">
    <i class="icon ion-ios-home-outline"></i>
    <div>
      <h4>Edit Admin Page</h4>
      <p class="mg-b-0">Edit a Admin</p>
    </div>
</div>

      <div class="br-pagebody">
        <form action="{{route('adminupdate', $adminedit->id)}}" method="post" enctype="multipart/form-data">
          @csrf
        <div class="row">
          <div class="col-sm-6">
        
          	 <div class="form-group">
              <label for="name">Admin Name</label> 
              <input type="text" name="name" id="name" placeholder=" Admin Name" class="form-control" value="{{ $adminedit->name }}">
              <span class="text-danger">
                @error('adminedit')
                  {{ $name }}
                @enderror
              </span>
             </div>
             <div class="form-group">
               
              <label for="email">Admin Email</label> 
              <input type="text" name="email" id="email" placeholder="Admin Email" class="form-control"value="{{$adminedit->email}}">
              <span class="text-danger">
                @error('email')
                  {{ $message }}
                @enderror
              </span>
             </div>

             <div class="form-group">
              <label for="role">Admin Role </label>
              <select name="role" id="role" class="form-control">
                <option value="">-----Edit Role-----</option>
                <option value="1" @if($adminedit->role==1) selected @endif >Admin</option>
                <option value="0" @if($adminedit->role==0) selected @endif >Not Admin</option>

              </select>
            </div>
             <div class="form-group">
               <button class="form-control btn btn-info" >Update Admin</button>
             </div>
          </div>
          </div><!-- col-3 -->
        </form>
      </div><!-- br-pagebody -->
  
@endsection