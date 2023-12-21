<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Edit</h4>
            <button type="button" id="btn_close" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('admin.Master.gran.panchayat.store',$GramPanchayat->id) }}" method="post" class="add_form" select-triger="block_select_box" button-click="btn_close">
                {{ csrf_field() }}
                <input type="hidden" name="states" value="{{ $GramPanchayat->states_id }}">
                <input type="hidden" name="district" value="{{ $GramPanchayat->district_id }}">
                <input type="hidden" name="block_mc" value="{{ $GramPanchayat->block_id }}">
                <div class="card-body"> 
                    <div class="form-group">
                        <label for="exampleInputEmail1">Gram Panchayat Code</label>
                        <span class="fa fa-asterisk"></span>
                        <input type="text" name="code" class="form-control" placeholder="Enter Code" maxlength="5" value="{{ $GramPanchayat->code }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Gram Panchayat Name</label>
                        <span class="fa fa-asterisk"></span>
                        <input type="text" name="name" class="form-control" placeholder="Enter Name (English)" maxlength="50" value="{{ $GramPanchayat->name }}">
                    </div>
                    <div class="modal-footer card-footer justify-content-between">
                        <button type="submit" class="btn btn-success form-control">Update</button>
                        <button type="button" class="btn btn-danger form-control" data-dismiss="modal">Close</button>           
                    </div>
                </form>
            </div>
        </div>
    </div>

