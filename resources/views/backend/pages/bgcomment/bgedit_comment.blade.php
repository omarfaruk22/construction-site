@extends('backend.master_template.template')

@section('content')

<div class="br-pagetitle">
    <i class="icon ion-ios-home-outline"></i>
    <div>
      <h4>Edit comment</h4>
      <p class="mg-b-0">Edit a comment</p>
    </div>
</div>

      <div class="br-pagebody">
        <form action="{{route('bgcommentupdate', $bgeditcomment->id)}}" method="post" enctype="multipart/form-data">
          @csrf
        <div class="row">
          <div class="col-sm-6">
        
          	 <div class="form-group">
              <label for="name"> Name</label> 
              <input type="text" name="name" id="name" placeholder="  Name" class="form-control" value="{{ $bgeditcomment->name }}">
              <span class="text-danger">
                @error('adminedit')
                  {{ $name }}
                @enderror
              </span>
             </div>
             <div class="form-group">
               
              <label for="email"> Email</label> 
              <input type="text" name="email" id="email" placeholder=" Email" class="form-control"value="{{$bgeditcomment->email}}">
              <span class="text-danger">
                @error('email')
                  {{ $message }}
                @enderror
              </span>
             </div>
             <div class="form-group">
             <label for="comment"> comment</label> 
             <input type="text" name="comment" id="comment" placeholder=" comment" class="form-control"value="{{$bgeditcomment->comment}}">
             <span class="text-danger">
               @error('comment')
                 {{ $message }}
               @enderror
             </span>
            </div>

             <div class="form-group">
              <label for="status"> status </label>
              <select name="status" id="status" class="form-control">
                <option value="">-----Edit status-----</option>
                <option value="0" @if($bgeditcomment->status==0) selected @endif >Active</option>
                <option value="1" @if($bgeditcomment->status==1) selected @endif >Not Active</option>

              </select>
            </div>
             <div class="form-group">
               <button class="form-control btn btn-info" >Update Blog Comment</button>
             </div>
          </div>
          </div><!-- col-3 -->
        </form>
      </div><!-- br-pagebody -->
  
@endsection