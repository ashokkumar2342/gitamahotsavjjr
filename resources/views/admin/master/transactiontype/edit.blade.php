<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Edit</h4>
            <button type="button" id="btn_close" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('admin.Master.transaction.type.update',Crypt::encrypt($rs_update[0]->id)) }}" method="post" class="add_form" content-refresh="Transaction_Type_table" button-click="btn_close">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Transaction Type</label>
                        <span class="fa fa-asterisk"></span>
                        <input type="text" name="name" class="form-control" placeholder="Enter Transaction Type" maxlength="50" value="{{$rs_update[0]->name}}">
                    </div> 
                    <div class="modal-footer card-footer justify-content-between">
                        <button type="submit" class="btn btn-success form-control">Update</button>
                        <button type="button" class="btn btn-danger form-control" data-dismiss="modal">Close</button>           
                    </div>
                </form>
            </div>
        </div>
    </div>

