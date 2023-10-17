@extends('backend.master_template.template')

@section('content')

<div class="br-pagetitle">
    <i class="icon ion-ios-home-outline"></i>
    <div>
      <h4>Blog Page</h4>
      <p class="mg-b-0">Edit a Blog</p>
    </div>
      </div>

      <div class="br-pagebody">
        <form action="{{route('blogpostupdate',$blogpostedit->id)}}" method="post" enctype="multipart/form-data">
          @csrf
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <label for="cat_id">Edit Blog Category</label>
              <select name="cat_id" id="cat_id" class="form-control">
                  <option value="">------Select Category-----</option>
                  @foreach($catedit as $data)
                      <option value="{{ $data->id }}" @if($blogpostedit->cat_id == $data->id) selected @endif>{{ $data->name }}</option>
                  @endforeach
              </select>
              <span class="text-danger">
                  @error('cat_id')
                      {{ $message }}
                  @enderror
              </span>
          </div>
          	 <div class="form-group">
              <label for="title">Blog Title</label> 
              <input type="text" name="title" id="title" placeholder=" Blog title" class="form-control" required value="{{$blogpostedit->title}}">
              <span class="text-danger">
                @error('title')
                  {{ $message }}
                @enderror
              </span>
             </div>
             <div class="form-group">
              <label for="name">Blog description</label> 
              <textarea type="text" name="description" id="description" placeholder=" Blog description" class="form-control"  >{!!$blogpostedit->description!!}</textarea>
              <span class="text-danger">
                @error('description')
                  {{ $message }}
                @enderror
              </span>
             </div>
             <div class="form-group">
              <label for="writer_name">Writer Name</label> 
              <input type="text" name="writer_name" id="writer_name" placeholder=" Blog writer Name" class="form-control" required value="{{$blogpostedit->writer_name}}">
              <span class="text-danger">
                @error('writer_name')
                  {{ $message }}
                @enderror
              </span>
             </div>
             <div class="form-group">
              <label for="meta_tag">Meta Keywords</label> 
              <input type="text" name="meta_tag" id="meta_tag" placeholder=" Ex:Your, Keywords, Here" class="form-control" required value="{{$blogpostedit->meta_tag}}">
              <span class="text-danger">
                @error('meta_tag')
                  {{ $message }}
                @enderror
              </span>
             </div>
          </div>
             <div class="col-sm-6">
              <div class="form-group">
                <label for="pic">Edit picture</label> 
                <img height="150" src="{{ asset('backend/blogpostimage/'.$blogpostedit->pic) }}" alt="edit">
                 
                 <input type="file" name="pic" id="pic" placeholder=" edit picture" class="form-control" value="{{ old('pic') }}">
                 <span class="text-danger">
                  @error('pic')
                    {{ $message }}
                  @enderror
                </span>
               </div>
             
             <div class="form-group">
              <label for="name">Blog short description</label> 
              <textarea type="text" name="short_des" id="short_des" placeholder=" Blog short description" class="form-control"  value="{{ old('short_des') }}">{!!$blogpostedit->short_des!!}</textarea>
              <span class="text-danger">
                @error('short_des')
                  {{ $message }}
                @enderror
              </span>
             </div>
             <div class="form-group">
              <label for="status">Blog Status</label>
              <select name="status" id="status" class="form-control">
                <option value="">-----Select Status-----</option>
                <option value="1" @if($blogpostedit->status==1) selected @endif >Active</option>
                 <option value="2" @if($blogpostedit->status==2) selected @endif >Inactive</option>
              </select>
             </div>

             <div class="form-group">
               <button class="form-control btn btn-info" >Update Blog</button>
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
            ClassicEditor
            .create(document.querySelector('#short_des'))
            .catch(error => {
                console.error(error);
            });
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
@endsection