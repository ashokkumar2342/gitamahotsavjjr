<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Add Assets</h4>
            <button type="button" id="btn_close" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">

            <form action="{{ route('admin.shg.assets.store', Crypt::encrypt($shg_id)) }}" method="post" class="add_form" button-click="btn_close" select-triger="shg_select_box">
                {{ csrf_field() }}
                <div class="row"> 
                    <div class="col-lg-4 form-group">
                        <label for="exampleInputEmail1">House</label>
                        <select name="house" class="form-control">
                            <option value="1">Own</option>
                            <option value="2">Rented</option>
                            <option value="3">Ancestral</option>
                        </select>
                    </div>
                    <div class="col-lg-4 form-group">
                        <label for="exampleInputEmail1">Room</label>
                        <select name="room" class="form-control">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">More than 4</option>
                        </select>
                    </div>
                    <div class="col-lg-4 form-group">
                        <label for="exampleInputEmail1">Barnda</label>
                        <select name="barnda" class="form-control">
                            <option value="1">No</option>
                            <option value="2">Yes</option>
                        </select>
                    </div>
                    <div class="col-lg-4 form-group">
                        <label for="exampleInputEmail1">Kitchen</label>
                        <select name="kitchen" class="form-control">
                            <option value="1">No</option>
                            <option value="2">Yes</option>
                        </select>
                    </div>
                    <div class="col-lg-4 form-group">
                        <label for="exampleInputEmail1">Toilet</label>
                        <select name="toilet" class="form-control">
                            <option value="1">No</option>
                            <option value="2">Yes</option>
                        </select>
                    </div>
                    <div class="col-lg-4 form-group">
                        <label for="exampleInputEmail1">Open Space</label>
                        <select name="open_space" class="form-control">
                            <option value="1">No</option>
                            <option value="2">Yes</option>
                        </select>
                    </div>
                    <div class="col-lg-4 form-group">
                        <label for="exampleInputEmail1">Area</label>
                        <select name="area" class="form-control">
                            <option value="1">Less than 50 Sq yard</option>
                            <option value="2">50-100  Sq yard</option>
                            <option value="3">100-200  Sq yard</option>
                            <option value="4">More than 200  Sq yard</option>
                        </select>
                    </div>
                    <div class="col-lg-4 form-group">
                        <label for="exampleInputEmail1">Agriculture Land</label>
                        <select name="agriculture_land" class="form-control">
                            <option value="1">No</option>
                            <option value="2">Yes</option>
                        </select>
                    </div>
                    <div class="col-lg-4 form-group">
                        <label for="exampleInputEmail1">Livestock</label>
                        <select name="livestock" class="form-control">
                            <option value="1">No</option>
                            <option value="2">Yes</option>
                        </select>
                    </div>
                    <div class="col-lg-4 form-group">
                        <label for="exampleInputEmail1">Buffalo</label>
                        <select name="buffalo" class="form-control">
                            <option value="1">No</option>
                            <option value="2">1</option>
                            <option value="3">2</option>
                            <option value="4">3</option>
                            <option value="5">More than 3</option>
                        </select>
                    </div>
                    <div class="col-lg-4 form-group">
                        <label for="exampleInputEmail1">Cow</label>
                        <select name="cow" class="form-control">
                            <option value="1">No</option>
                            <option value="2">1</option>
                            <option value="3">2</option>
                            <option value="4">3</option>
                            <option value="5">More than 3</option>
                        </select>
                    </div>
                    <div class="col-lg-4 form-group">
                        <label for="exampleInputEmail1">Vehicle</label>
                        <select name="vehicle" class="form-control">
                            <option value="1">No</option>
                            <option value="2">Two Wheeler</option>
                            <option value="3">Four Wheeler</option>
                        </select>
                    </div>
                    <div class="col-lg-4 form-group">
                        <label for="exampleInputEmail1">Public Transport</label>
                        <select name="public_transport" class="form-control">
                            <option value="1">No</option>
                            <option value="2">E-Rikshaw</option>
                            <option value="3">Four Wheeler</option>
                            <option value="4">Tractor</option>
                            <option value="5">Other</option>
                        </select>
                    </div>
                                 
                    <div class="col-lg-12 text-center">
                        <button type="submit" class="btn btn-primary form-control">Submit</button> 
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


