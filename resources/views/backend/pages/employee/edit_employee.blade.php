@extends('backend.master_template.template')

@section('content')

<div class="br-pagetitle">
    <i class="icon ion-ios-home-outline"></i>
    <div>
      <h4>Employee Page</h4>
      <p class="mg-b-0">Edit an Employee</p>
    </div>
</div>

      <div class="br-pagebody">
        <form action="{{route('employeeupdate', $employeeedit->id)}}" method="post" enctype="multipart/form-data">
          @csrf
        <div class="row">
          <div class="col-sm-6">
          	 <div class="form-group">
              <label for="name">Employee Name</label> 
              <input type="text" name="name" id="name" placeholder="Edit Employee Name" class="form-control" value="{{$employeeedit->name}}">
              <span class="text-danger">
                @error('name')
                  {{ $message }}
                @enderror
              </span>
             </div>
             <div class="form-group">
                <label for="name">Employee Designation</label> 
                <input type="text" name="designation" id="designation" placeholder="Edit Employee Designation" class="form-control" value="{{$employeeedit->designation}}">
                <span class="text-danger">
                  @error('designation')
                    {{ $message }}
                  @enderror
                </span>
               </div>
 
             <div class="form-group">
              <label for="pic">Edit picture</label> 
              <img height="150" src="{{ asset('backend/employeeimage/'.$employeeedit->pic) }}" alt="edit">
               
               <input type="file" name="pic" id="pic" placeholder=" edit picture" class="form-control" value="{{ old('pic') }}">
               <span class="text-danger">
                @error('pic')
                  {{ $message }}
                @enderror
              </span>
             </div>
             <div class="form-group">
                <label for="email">Employee Email</label> 
                <input type="email" name="email" id="email" placeholder="Edit Employee Email" class="form-control" value="{{$employeeedit->emaillink}}">
                <span class="text-danger">
                  @error('email')
                    {{ $message }}
                  @enderror
                </span>
               </div>
               <div class="form-group">
                <label for="linkedn">Employee Linkedn</label> 
                <input type="text" name="linkedn" id="linkedn" placeholder="Edit Employee Linkedn" class="form-control" value="{{$employeeedit->linkdnlink}}">
                <span class="text-danger">
                  @error('linkedn')
                    {{ $message }}
                  @enderror
                </span>
               </div>

             <div class="form-group">
              <label for="status">Employee Status</label>
              <select name="status" id="status" class="form-control">
                <option value="">-----Select Status-----</option>
                <option value="1" @if($employeeedit->status==1) selected @endif >Active</option>
                 <option value="2" @if($employeeedit->status==2) selected @endif >Inactive</option>
              </select>
             </div>

             <div class="form-group">
               <button class="form-control btn btn-info" >Update Employee</button>
             </div>
          </div>
          </div><!-- col-3 -->
        </form>
      </div><!-- br-pagebody -->
      
@endsection