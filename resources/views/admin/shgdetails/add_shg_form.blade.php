<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Add SHG</h4>
            <button type="button" id="btn_close" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('admin.add.new.shg.store',Crypt::encrypt(@$selfHelpGroupId? @$selfHelpGroupId : 0)) }}" method="post" class="add_form" button-click="btn_close" select-triger="village_select_box">
                {{ csrf_field() }}
                <input type="hidden" name="district_id" value="{{@$district_id}}">  
                <input type="hidden" name="block_mc" value="{{@$block_mc}}">  
                <input type="hidden" name="gram_panchayat" value="{{@$gram_panchayat}}">  
                <input type="hidden" name="village" value="{{@$village}}"> 
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">SHG Details</h3>
                    </div>
                    <div class="row" style="margin:5px;"> 
                        <div class="col-lg-6 form-group">
                            <label for="exampleInputEmail1">Name of SHG</label> 
                            <span class="fa fa-asterisk"></span>
                            <input type="text" name="shg_name" id="shg_name" class="form-control" placeholder="Enter Group Name" maxlength="100" value="{{@$selfHelpGroupList[0]->shg_name}}">
                        </div> 
                        <div class="col-lg-6 form-group">
                            <label for="exampleInputEmail1">Formation Date</label> 
                            <input type="date" name="formation_date" id="formation_date" class="form-control" value="{{@$selfHelpGroupList[0]->formation_date}}"> 
                        </div>
                        <div class="col-lg-6 form-group">
                            <label for="exampleInputEmail1">Total Member</label> 
                            <input type="text" name="total_member" id="total_member" class="form-control" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="10" value="{{@$selfHelpGroupList[0]->total_member}}">
                        </div>
                        <div class="col-lg-6 form-group">
                            <label for="exampleInputEmail1">Bank Account No.</label>
                            <input type="text" name="account_no" id="account_no" class="form-control" placeholder="Enter Account No." maxlength="20" maxlength="30" onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="{{@$selfHelpGroupList[0]->bank_account_no}}">
                        </div>
                        <div class="col-lg-6 form-group">
                            <label for="exampleInputEmail1">Bank Branch Name</label> 
                            <input type="text" name="bank_branch_name"  class="form-control" placeholder="Enter Bank Branch Name" maxlength="100" value="{{@$selfHelpGroupList[0]->bank_branch_name}}">
                        </div>
                        <div class="col-lg-6 form-group">
                            <label for="exampleInputEmail1">Bank IFSC</label> 
                            <input type="text" name="bank_ifsc"  class="form-control" placeholder="Enter Bank IFSC" maxlength="11" value="{{@$selfHelpGroupList[0]->bank_ifsc}}">
                        </div>
                    </div>
                </div>
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Revolving Funds Details</h3>
                    </div>
                    <div class="row" style="margin:5px;"> 
                        <div class="col-lg-6 form-group">
                            <label for="exampleInputEmail1">Date of R/F</label> 
                            <input type="date" name="date_of_rf" id="formation_date" class="form-control" value="{{@$selfHelpGroupList[0]->date_of_rf}}">
                        </div> 
                        <div class="col-lg-6 form-group">
                            <label for="exampleInputEmail1">Amount of R/F</label> 
                            <input type="text" name="amount_rf"  class="form-control" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="10" value="{{@$selfHelpGroupList[0]->amount_rf}}">
                        </div>
                    </div>
                </div>
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Bank CCl Details</h3>
                    </div>
                    <div class="row" style="margin:5px;"> 
                        <div class="col-lg-6 form-group">
                            <label for="exampleInputEmail1">CCL Dose</label> 
                            <input type="text" name="ccl_dose"  class="form-control" maxlength="50" value="{{@$selfHelpGroupList[0]->ccl_dose}}"> 
                        </div>
                        <div class="col-lg-6 form-group">
                            <label for="exampleInputEmail1">Date of Sanction</label> 
                            <input type="date" name="date_of_sanction"  class="form-control" value="{{@$selfHelpGroupList[0]->date_of_sanction}}">
                        </div>
                        <div class="col-lg-6 form-group">
                            <label for="exampleInputEmail1">CCL Account No.</label>
                            <input type="text" name="ccl_account_no" id="ccl_account_no" class="form-control" placeholder="Enter Account No." maxlength="20" maxlength="30" onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="{{@$selfHelpGroupList[0]->ccl_ac_no}}">
                        </div>
                        <div class="col-lg-6 form-group">
                            <label for="exampleInputEmail1">Bank Branch Name</label> 
                            <input type="text" name="ccl_bank_branch_name"  class="form-control" placeholder="Enter Bank Branch Name" maxlength="100" value="{{@$selfHelpGroupList[0]->ccl_bank_branch_name}}">
                        </div>
                        <div class="col-lg-6 form-group">
                            <label for="exampleInputEmail1">Bank IFSC</label> 
                            <input type="text" name="ccl_bank_ifsc"  class="form-control" placeholder="Enter Bank IFSC" maxlength="11" value="{{@$selfHelpGroupList[0]->ccl_bank_ifsc}}">
                        </div>
                        
                        <div class="col-lg-6 form-group">
                            <label for="exampleInputEmail1">CCL Amount Sanction</label> 
                            <input type="text" name="ccl_amount_sanction"  class="form-control" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="10" value="{{@$selfHelpGroupList[0]->ccl_amt_sanction}}">
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

