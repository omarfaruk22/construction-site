
@extends('backend.master_template.template')

@section('content')
<div class="br-pagetitle">
    <i class="icon ion-ios-home-outline"></i>
    <div>
      <h4>Category Page</h4>
      <p class="mg-b-0">Category Manage</p>
    </div>
</div>
<!-- Add Category Modal -->
<div class="modal fade" id="addCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Category Add</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label for="">Category Name</label>
            <input type="text" class="name form-control" placeholder="Enter Category Name">
            <span class="text-danger nameError"></span>
          </div>
        <div class="form-group">
            <label for="">Status</label>
            <select class="status form-control">
                <option value="1">-----Select Status-----</option>
                <option value="1">Active</option>
                <option value="2">Inactive</option>
            </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="addCategory btn btn-primary" >Add Category</button>
      </div>
    </div>
  </div>
</div>

<!-- Edit Category Model -->
<div class="modal fade" id="editCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="mmsg"></div>
      <div class="modal-body">
      <div class="form-group">
          
            <input type="hidden" id="cat_id" class="cat_id form-control" >
            <span class="text-danger nameError"></span>
          </div>
        <div class="form-group">
            <label for="">Category Name</label>
            <input type="text" id="name" class="cname form-control" placeholder="Enter Category Name">
            <span class="text-danger nameError"></span>
          </div>
        <div class="form-group">
            <label for="">Status</label>
            <select class="status form-control" id="status">
                <option class="sts"></option>
                <option value="1">Active</option>
                <option value="2">Inactive</option>
            </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="updatecategory" class="updatecategory btn btn-primary">Update Category</button>
      </div>
    </div>
  </div>
</div>

<!-- this is delete model  -->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmation Message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <input type="hidden" id="catid" class="catid form-control" >
        Are you sure want to delete this Category?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="catdelete" class="catdelete btn btn-danger">Confirm</button>
      </div>
    </div>
  </div>
</div>
<!-- end delete Model  -->

      <div class="br-pagebody">
        <div class="row">
          <div class="col-md-12">
              <button class=" btn btn-sm btn-info" data-target="#addCategory" data-toggle="modal"><i class="fa fa-plus"></i> Add Category</button>
          	  <div class="msg"></div>
              <table class="table">
              <thead>
                <tr>
                  <td>#Sl</td>
                  <td>Category Name</td>
                  <td>Status</td>
                  <td>Action</td>
                </tr>
              </thead> 

              <tbody class="tbody">
              </tbody>

             </table> 
            </div>
          </div><!-- col-3 -->
      </div><!-- br-pagebody -->
@endsection