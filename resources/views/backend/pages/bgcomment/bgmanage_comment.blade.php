@extends('backend.master_template.template')

@section('content')

<div class="br-pagetitle">
    <i class="icon ion-ios-home-outline"></i>
    <div>
      <h4> Blog Comment Page</h4>
      <p class="mg-b-0">View Comment</p>
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
                  <td>Blog Name</td>  
                  <td>Email</td>
                  <td>Message</td>
                  <td>status</td>

                  <td>Action</td>
                </tr>
              </thead> 

              <tbody class="tbody">
              @php $sl=1 @endphp
                @foreach ($bgmanagecomment as $data)
                  <tr>
                    <td>{{ $sl }}</td>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->bgblogs->title }}</td>
                    <td>{{$data->email}}</td>
                    <td>{{$data->comment}}</td>
                    <td> @if ($data->status==0)
                        <span class="badge badge-success">Active</span>
                        @elseif(($data->status==1))
                        <span class="badge badge-warning">Not Active</span>
                        @else
                        <span class="badge badge-danger">Errors</span>
                        @endif</td>
                    
                      <td> 
                        <a href="{{route('bgcommentedit',$data->id)}}" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
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
                          Are you sure want to delete this Comment?
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <a href="{{route('bgcommentdelete', $data->id )}}" class="btn btn-danger">Confirm</a>
                        </div>
                      </div>
                    </div>
                  </div>
                                     @php $sl++ @endphp
                                  @endforeach
                                </tbody>
                               
                               </table> 
                               {!! $bgmanagecomment->links() !!}
                              </div>
                            </div>
          
      </div><!-- br-pagebody -->
      
@endsection