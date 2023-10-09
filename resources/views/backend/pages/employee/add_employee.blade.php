@extends('backend.master_template.template')

@section('content')

<div class="br-pagetitle">
    <i class="icon ion-ios-home-outline"></i>
    <div>
      <h4>Employee Page</h4>
      <p class="mg-b-0">Add a Employee</p>
    </div>
    @if(Session::has('message'))
        
            <span id="flash-message" class="alert alert-success">{{ Session::get('message') }}</span>
               @endif
</div>

      <div class="br-pagebody">
        <form action="{{route('employeestore')}}" method="post" enctype="multipart/form-data">
          @csrf
        <div class="row">
          <div class="col-sm-6">
        
          	 <div class="form-group">
              <label for="name">Employee Title</label> 
              <input type="text" name="name" id="name" placeholder="Enter Employee Name" class="form-control" required>
              <span class="text-danger">
                @error('name')
                  {{ $message }}
                @enderror
              </span>
             </div>
             <div class="form-group">
                <label for="designation">Employee Designation</label> 
                <input type="text" name="designation" id="designation" placeholder="Enter Employee designation" class="form-control" required>
                <span class="text-danger">
                  @error('designation')
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
                <label for="email">Employee Email</label> 
                <input type="email" name="email" id="email" placeholder="Enter Employee Email" class="form-control" required>
                <span class="text-danger">
                  @error('email')
                    {{ $message }}
                  @enderror
                </span>
               </div>
               <div class="form-group">
                <label for="linkedn">Employee Linkedn</label> 
                <input type="text" name="linkedn" id="linkedn" placeholder="Enter Employee Linkedn" class="form-control" required>
                <span class="text-danger">
                  @error('linkedn')
                    {{ $message }}
                  @enderror
                </span>
               </div>
           
             <div class="form-group">
              <label for="status"> Status</label>
              <select name="status" id="status" class="form-control">
                <option value="">-----Select Status-----</option>
                <option value="1">Active</option>
                <option value="2">Inactive</option>
              </select>
             </div>

             <div class="form-group">
               <button class="form-control btn btn-info" >Add an Employee</button>
             </div>
          </div>
          </div><!-- col-3 -->
        </form>
      </div><!-- br-pagebody -->
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
  
@endsection