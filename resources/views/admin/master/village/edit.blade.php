<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Edit</h4>
            <button type="button" id="btn_close" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('admin.Master.village.store',$village->id) }}" method="post" class="add_form" select-triger="gram_panchayat" button-click="btn_close">
                {{ csrf_field() }}
                <input type="hidden" name="states" value="{{ $village->states_id }}">
                <input type="hidden" name="district" value="{{ $village->districts_id }}">
                <input type="hidden" name="block_mc" value="{{ $village->blocks_id }}">
                <input type="hidden" name="gram_panchayat" value="{{ $village->gram_panchayat_id }}">
                <div class="card-body"> 
                    <div class="form-group">
                        <label for="exampleInputEmail1">Village Code</label>
                        <span class="fa fa-asterisk"></span>
                        <input type="text" name="code" class="form-control" placeholder="Enter Code" maxlength="5" value="{{ $village->code }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Village Name</label>
                        <span class="fa fa-asterisk"></span>
                        <input type="text" name="name" class="form-control" placeholder="Enter Name (English)" maxlength="50" value="{{ $village->name }}">
                    </div>
                    <div class="modal-footer card-footer justify-content-between">
                        <button type="submit" class="btn btn-success form-control">Update</button>
                        <button type="button" class="btn btn-danger form-control" data-dismiss="modal">Close</button>           
                    </div>
                </form>
            </div>
        </div>
    </div>

