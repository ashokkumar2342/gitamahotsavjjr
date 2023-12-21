<div class="modal-dialog modal-lg">
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title">Edit Member</h4>
      <button type="button" id="btn_close1" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <form action="{{ route('admin.shg.detail.selfhelpgroup.update.member',Crypt::encrypt($shg_member_detail_id)) }}" method="post" class="add_form" button-click="btn_close1,view_update_button{{$selfHelpGroupid}}">
      {{ csrf_field() }}
      
      <div class="card-body"> 
        <div class="row"> 
          <div class="col-lg-6 form-group">
              <label for="exampleInputEmail1">Member Name</label>
              <span class="fa fa-asterisk"></span>
              <input type="text" name="member_name" class="form-control" placeholder="Enter Member Name" maxlength="100" value="{{$rs_updates[0]->member_name}}">
          </div>
          <div class="col-lg-6 form-group">
              <label for="exampleInputEmail1">Father/Husband Name</label>
              <span class="fa fa-asterisk"></span>
              <input type="text" name="father_husband_name" class="form-control" placeholder="Enter Father/Husband Name" maxlength="100" value="{{$rs_updates[0]->relation_name}}">
          </div>
          <div class="col-lg-6 form-group">
              <label for="exampleInputEmail1">Relation</label>
              <select name="relation" id="relation" class="form-control">
                <option selected disabled>Select Relation Type</option>
                @foreach ($relation_type as $relation_type)       
                  <option value="{{$relation_type->id}}"{{$relation_type->id==$rs_updates[0]->relation_id?'selected':''}}>{{$relation_type->relation_name}}</option>
                @endforeach
              </select>
          </div>
          <div class="col-lg-6 form-group">
              <label for="exampleInputPassword1">DOB</label> 
              <input type="date" name="dob" class="form-control" value="{{$rs_updates[0]->dob}}">
          </div>
          <div class="col-lg-6 form-group">
              <label for="exampleInputPassword1">Age</label> 
              <input type="text" name="age" class="form-control" maxlength="3" onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="{{$rs_updates[0]->age}}">
          </div>
          <div class="col-lg-6 form-group">
              <label for="exampleInputEmail1">Gender</label>
              <select name="gender" id="gender" class="form-control">
                <option selected disabled>Select Gender Type</option>
                @foreach ($gender_type as $gender_typ)       
                  <option value="{{$gender_typ->id}}"{{$gender_typ->id==$rs_updates[0]->gender_id?'selected':''}}>{{$gender_typ->gender_name}}</option>
                @endforeach
              </select>
          </div>
          
          <div class="col-lg-6 form-group">
              <label for="exampleInputEmail1">Religion</label>
              <select name="religion" id="religion" class="form-control">
                <option selected disabled>Select Religion Type</option>
                @foreach ($religion_type as $religion_typ)       
                  <option value="{{$religion_typ->id}}"{{$religion_typ->id==$rs_updates[0]->caste?'selected':''}}>{{$religion_typ->type_name}}</option>
                @endforeach
              </select>
          </div>
          <div class="col-lg-6 form-group">
              <label for="exampleInputPassword1">Aadhar No.</label>
              
              <input type="text" name="aadhar_no" class="form-control" placeholder="Enter Aadhar No" maxlength="12" minlength="12" onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="{{$rs_updates[0]->aadhar_no}}">
          </div>
          <div class="col-lg-6 form-group">
              <label for="exampleInputPassword1">PPP ID</label>
              
              <input type="text" name="ppp" class="form-control" placeholder="Enter PPP ID" maxlength="20" value="{{$rs_updates[0]->ppp}}">
          </div>
          <div class="col-lg-6 form-group">
              <label for="exampleInputPassword1">Mobile No.</label>
              
              <input type="text" name="mobile_no" class="form-control" placeholder="Enter Mobile No." maxlength="10" minlength="10" onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="{{$rs_updates[0]->mobile_no}}">
          </div>
          <div class="col-lg-6 form-group">
              <label for="exampleInputPassword1">Date of Joining</label> 
              <input type="date" name="date_of_joining" class="form-control" value="{{$rs_updates[0]->joining_date}}">
          </div>
          <div class="col-lg-6 form-group">
              <label for="exampleInputPassword1">Address</label> 
              <input type="text" name="address" class="form-control" maxlength="100" value="{{$rs_updates[0]->address}}">
          </div>
          <div class="col-lg-6 form-group">
              <label for="exampleInputPassword1">Pincode</label> 
              <input type="text" name="pincode" class="form-control" maxlength="6" minlength="6" onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="{{$rs_updates[0]->pincode}}">
          </div>
          <div class="col-lg-6 form-group">
              <label for="exampleInputPassword1">Account No.</label>
              
              <input type="text" name="account_no" class="form-control" placeholder="Enter Account No." maxlength="30" minlength="9" onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="{{$rs_updates[0]->account_no}}">
          </div>
          <div class="col-lg-6 form-group">
              <label for="exampleInputPassword1">Bank Name</label>
              
              <input type="text" name="bank_name" class="form-control" placeholder="Enter Bank Name" maxlength="50" value="{{$rs_updates[0]->bank_name}}">
          </div>
          <div class="col-lg-6 form-group">
              <label for="exampleInputPassword1">Ifsc Code</label>
              
              <input type="text" name="ifsc_code" class="form-control" placeholder="Enter Ifsc Code" maxlength="20" value="{{$rs_updates[0]->ifsc_code}}">
          </div>
          <div class="col-lg-6 form-group">
              <label for="exampleInputPassword1">Account Opning Date</label> 
              <input type="date" name="account_opening_date" class="form-control" value="{{$rs_updates[0]->ac_open_date}}">
          </div>
          <div class="col-lg-6 form-group">
              <label for="exampleInputEmail1">Degignation</label>
              <span class="fa fa-asterisk"></span>
              <select name="degignation" id="degignation" class="form-control">
                <option selected disabled>Select Degignation Type</option>
                @foreach ($Degignations as $Degignation)       
                  <option value="{{$Degignation->id}}"{{$Degignation->id==$rs_updates[0]->designation_id?'selected':''}}>{{$Degignation->desig_name}}</option>
                @endforeach
              </select>
          </div> 
          <div class="col-lg-6 form-group">
              <label for="exampleInputEmail1">Disability</label>
              <select name="disability" id="disability" class="form-control">
                <option selected disabled>Select Disability Type</option>
                @foreach ($disability_type as $disability_type)       
                  <option value="{{$disability_type->id}}"{{$disability_type->id==$rs_updates[0]->disability?'selected':''}}>{{$disability_type->type_name}}</option>
                @endforeach
              </select>
          </div>
          <div class="col-lg-6 form-group">
              <label for="exampleInputEmail1">Handicraft</label>
              <select name="handi_craft" id="handi_craft" class="form-control">
                <option selected disabled>Select Handicraft Type</option>
                @foreach ($handi_craft as $handi_craft)       
                  <option value="{{$handi_craft->id}}">{{$handi_craft->name}}</option>
                @endforeach
              </select>
          </div>
          <div class="col-lg-6 form-group">
              <label for="exampleInputEmail1">Rojgar</label>
              <select name="handi_craft" id="handi_craft" class="form-control">
                <option selected disabled>Select Rojgar Type</option>
                {{-- @foreach ($handi_craft as $value)       
                  <option value="{{$value->id}}">{{$value->name}}</option>
                @endforeach --}}
              </select>
          </div>
          <div class="col-lg-3 form-group">
            <label>Pjsby</label>
            <div class="form-group clearfix">
              <div class="icheck-primary d-inline">
                <input type="radio" id="radioPrimary1" name="pjsby" value="0" checked="">
                <label for="radioPrimary1">No</label>
              </div>
              <div class="icheck-primary d-inline">
                <input type="radio" id="radioPrimary2" name="pjsby" value="1">
                <label for="radioPrimary2">Yes</label>
              </div> 
            </div>
          </div>
          <div class="col-lg-3 form-group">
            <label>pjjby</label>
            <div class="form-group clearfix">
              <div class="icheck-primary d-inline">
                <input type="radio" id="radioPrimary1" name="pjjby" value="0" checked="">
                <label for="radioPrimary1">No</label>
              </div>
              <div class="icheck-primary d-inline">
                <input type="radio" id="radioPrimary2" name="pjjby" value="1">
                <label for="radioPrimary2">Yes</label>
              </div> 
            </div>
          </div>
          <div class="col-lg-3 form-group">
            <label>spy</label>
            <div class="form-group clearfix">
              <div class="icheck-primary d-inline">
                <input type="radio" id="radioPrimary1" name="spy" value="0" checked="">
                <label for="radioPrimary1">No</label>
              </div>
              <div class="icheck-primary d-inline">
                <input type="radio" id="radioPrimary2" name="spy" value="1">
                <label for="radioPrimary2">Yes</label>
              </div> 
            </div>
          </div>
          <div class="col-lg-3 form-group">
            <label>ayushman</label>
            <div class="form-group clearfix">
              <div class="icheck-primary d-inline">
                <input type="radio" id="radioPrimary1" name="ayushman" value="0" checked="">
                <label for="radioPrimary1">No</label>
              </div>
              <div class="icheck-primary d-inline">
                <input type="radio" id="radioPrimary2" name="ayushman" value="1">
                <label for="radioPrimary2">Yes</label>
              </div> 
            </div>
          </div>
          <div class="col-lg-12 text-center">
            <button type="submit" class="btn btn-primary form-control">Submit</button> 
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

