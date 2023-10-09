@extends('backend.master_template.template')

@section('content')

<div class="br-pagetitle">
    <i class="icon ion-ios-home-outline"></i>
    <div>
      <h4>Contact Page</h4>
      <p class="mg-b-0">View Contact</p>
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
                  <td>Name</td>  
                  <td>Email</td>
                  <td>Subject</td>
                  <td>Message</td>
                  <td>Read</td>

                  <td>Action</td>
                </tr>
              </thead> 

              <tbody class="tbody">
              @php $sl=1 @endphp
                @foreach ($contact as $data)
                  <tr>
                    <td>{{ $sl }}</td>
                    <td>{{ $data->name }}</td>
                    <td>{{$data->email}}</td>
                    <td>{{$data->subject}}</td>
                    <td>{{$data->message}}</td>
                    <td> @if ($data->read==1)
                        <span class="badge badge-success">Viewed</span>
                        @elseif(($data->read==0))
                        <span class="badge badge-warning">Not View</span>
                        @else
                        <span class="badge badge-danger">Errors</span>
                        @endif</td>
                    
                      <td>
                   
                      
                      <button class="btn btn-sm btn-dark"><i class="fas fa-eye" data-target='#view{{ $data->id }}' data-toggle="modal"></i></button>
                      <button class="btn btn-sm btn-danger"><i class="fa fa-trash" data-target='#delete{{ $data->id }}' data-toggle="modal"></i></button>
                    </td>
                  </tr>
                  <!-- Modal -->
<div class="modal fade" id="view{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">View Message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {{-- Are you sure want to delete this Admin? --}}
        <div class="row">
            
                <div class="col-md-12">
                <div class="card " style="width: 28rem; background-color:#e6ffff" >
         <!-- <img class="card-img-top" src="path/to/image.jpg" alt="Card image cap"> -->
        <div class="card-body">
        <h4> Name: {{ $data->name }}</h4>
         <h5 class="card-text">Email: {{ $data->email }}</h5>
         <h6>Subject:</h6><p> {{ $data->subject }}</p>
         <h6>Message:</h6><p> {{ $data->message }}</p>
         
     </div>
      </div>
            
        </div>
     

      
      
      </div>
      </div>
      <div class="modal-footer">
        
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="{{route('contactupdate',$data->id)}}" class="btn btn-info">view</a>
        
      </div>
    </div>
  </div>
</div>
{{-- this is delete modal --}}
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
          Are you sure want to delete this message?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <a href="{{route('contactdelete', $data->id )}}" class="btn btn-danger">Confirm</a>
        </div>
      </div>
    </div>
  </div>
{{-- end delete modal  --}}
                   @php $sl++ @endphp
                @endforeach
              </tbody>

             </table> 
            </div>
          
      </div><!-- br-pagebody -->
      
@endsection