<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title">Edit</h4>
      <button type="button" id="btn_close" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <form action="{{ route('admin.Master.districtsStore',$Districts->id) }}" method="post" class="add_form" select-triger="state_select_box" button-click="btn_close">
          {{ csrf_field() }}
          <div class="card-body">
              <div class="form-group">
                  <label for="exampleInputEmail1">States</label>
                  <span class="fa fa-asterisk"></span>
                  <select name="states" class="form-control">
                      <option selected disabled>Select States</option>
                      @foreach ($States as $State)
                      <option value="{{ $State->id }}"{{ $Districts->state_id==$State->id?'selected' :'' }}>{{ $State->code }}--{{ $State->name }}</option>  
                      @endforeach
                  </select>
              </div>
              <div class="form-group">
                  <label for="exampleInputEmail1">Districts Code</label>
                  <span class="fa fa-asterisk"></span>
                  <input type="text" name="code" class="form-control" placeholder="Enter Code" value="{{ $Districts->code }}" maxlength="5" >
              </div>
              <div class="form-group">
                  <label for="exampleInputPassword1">Districts Name</label>
                  <span class="fa fa-asterisk"></span>
                  <input type="text" name="name" class="form-control" placeholder="Enter Name (English)" value="{{ $Districts->name }}" maxlength="50">
              </div>
              
          </div> 
          <div class="modal-footer card-footer justify-content-between">
          <button type="submit" class="btn btn-success form-control">Update</button>
          <button type="button" class="btn btn-danger form-control" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>

