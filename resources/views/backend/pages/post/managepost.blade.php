@extends('backend.master_template.template')

@section('content')

<div class="br-pagetitle">
    <i class="icon ion-ios-home-outline"></i>
    <div>
      <h4>Post Page</h4>
      <p class="mg-b-0">Manage Post</p>
    </div>
</div>

      <div class="br-pagebody">
      <div class="row">
          <div class="col-md-12">   
          	  <div class="msg"></div>
              <table class="table">
              <thead>
                <tr>
                  <td>#Sl</td>
                  <td>Title</td>
                  <td>Description</td>
                  <td>Image</td>
                  <td>Category name</td>
                  <td>status</td>
                  <td>Action</td>
                </tr>
              </thead> 

              <tbody class="tbody">
              @php $sl=1 @endphp
                @foreach ($post as $data)
                  <tr>
                    <td>{{ $sl }}</td>
                    
                    <td>{{ $data->title }}</td>
                    <td>{!!$data->description!!}</td>
                    <td><img height="60"width="80" src="{{ asset('backend/blogimage/'.$data->pic)  }}" /></td>
                    <td> @if ($data->type==0)
                      <span class="badge badge-sm btn-info">Welcome</span>
                      @elseif(($data->type==1))
                      <span class="badge badge-sm btn-warning">About</span>
                      @elseif(($data->type==2))
                      <span class="badge badge-sm btn-success">Services</span>
                      @elseif(($data->type==3))
                      <span class="badge badge-sm btn-primary">Blog</span>
                      @else
                      <span class="badge badge-sm btn-danger">error</span>
                      @endif</td>
                    <td> @if ($data->status==1)
                      <span class="badge badge-sm btn-success">active</span>
                      @elseif(($data->status==2))
                      <span class="badge badge-sm btn-info">inactive</span>
                      @else
                      <span class="badge badge-sm btn-danger">error</span>
                      @endif</td>
                  
                    <td>
                  
                    <td>
                      <a href="{{route('blogedit',$data->id)}}" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
                      <button class="btn btn-sm btn-danger"><i class="fa fa-trash" data-target='#delete{{ $data->id }}' data-toggle="modal"></i></button>
                    </td>
                  </tr>
                  <!-- Modal -->
<div class="modal fade" id="delete{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmation Message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure want to delete this Post?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="{{route('blogdelete', $data->id )}}" class="btn btn-danger">Confirm</a>
      </div>
    </div>
  </div>
</div>
                   @php $sl++ @endphp
                @endforeach
              </tbody>

             </table> 
            </div>
          </div>
      </div><!-- br-pagebody -->
      
@endsection