<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Edit Member</h4>
            <button type="button" id="btn_close" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('admin.shg.detail.selfhelpgroup.update.member',Crypt::encrypt($rs_updates[0]->id)) }}" method="post" class="add_form" button-click="btn_close" select-triger="shg_select_box">
            {{ csrf_field() }}
                <div class="row"> 
                    <div class="col-lg-4 form-group">
                        <label for="exampleInputEmail1">Member Name</label>
                        <span class="fa fa-asterisk"></span>
                        <input type="text" name="member_name" class="form-control" placeholder="Enter Member Name" maxlength="100" value="{{$rs_updates[0]->member_name}}">
                    </div>
                    <div class="col-lg-4 form-group">
                        <label for="exampleInputEmail1">Father/Husband Name</label>
                        <span class="fa fa-asterisk"></span>
                        <input type="text" name="father_husband_name" class="form-control" placeholder="Enter Father/Husband Name" maxlength="100" value="{{$rs_updates[0]->relation_name}}">
                    </div>
                    <div class="col-lg-4 form-group">
                        <label for="exampleInputEmail1">Relation</label>
                        <select name="relation" id="relation" class="form-control">
                            <option selected disabled>Select Relation Type</option>
                            @foreach ($relation_type as $relation_type)       
                            <option value="{{$relation_type->id}}" {{$relation_type->id==$rs_updates[0]->relation_id?'selected':''}}>{{$relation_type->relation_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-4 form-group">
                        <label for="exampleInputEmail1">Gender</label>
                        <select name="gender" id="gender" class="form-control">
                            <option selected disabled>Select Gender Type</option>
                            @foreach ($gender_type as $gender_typ)       
                            <option value="{{$gender_typ->id}}"{{$gender_typ->id==$rs_updates[0]->gender_id?'selected':''}}>{{$gender_typ->gender_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-4 form-group">
                        <label for="exampleInputEmail1">Marital Status</label>
                        <select name="marital_status" id="marital_status" class="form-control">
                            <option selected disabled>Select Marital Status</option>
                            <option value="1" {{$rs_updates[0]->marital_status==1?'selected':''}}>Unmarried</option>
                            <option value="2" {{$rs_updates[0]->marital_status==2?'selected':''}}>Marrried</option>
                            <option value="3" {{$rs_updates[0]->marital_status==3?'selected':''}}>Widow</option>
                        </select>
                    </div>
                    <div class="col-lg-4 form-group">
                        <label for="exampleInputEmail1">Religion</label>
                        <select name="religion" id="religion" class="form-control">
                            <option selected disabled>Select Religion Type</option>
                            @foreach ($religion_type as $religion_typ)       
                            <option value="{{$religion_typ->id}}"{{$religion_typ->id==$rs_updates[0]->caste?'selected':''}}>{{$religion_typ->type_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-4 form-group">
                        <label for="exampleInputPassword1">DOB</label> 
                        <input type="date" name="dob" class="form-control" value="{{$rs_updates[0]->dob}}">
                    </div>
                    <div class="col-lg-4 form-group">
                        <label for="exampleInputPassword1">Age</label> 
                        <input type="text" name="age" class="form-control" maxlength="3" onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="{{$rs_updates[0]->age}}">
                    </div>
                    <div class="col-lg-4 form-group">
                        <label for="exampleInputPassword1">Aadhar No.</label>

                        <input type="text" name="aadhar_no" class="form-control" placeholder="Enter Aadhar No" maxlength="12" minlength="12" onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="{{$rs_updates[0]->aadhar_no}}">
                    </div>
                    <div class="col-lg-4 form-group">
                        <label for="exampleInputPassword1">PPP ID</label>
                        <input type="text" name="ppp" class="form-control" placeholder="Enter PPP ID" maxlength="20" value="{{$rs_updates[0]->ppp}}">
                    </div>
                    <div class="col-lg-4 form-group">
                        <label for="exampleInputPassword1">Mobile No.</label>

                        <input type="text" name="mobile_no" class="form-control" placeholder="Enter Mobile No." maxlength="10" minlength="10" onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="{{$rs_updates[0]->mobile_no}}">
                    </div>
                    <div class="col-lg-4 form-group">
                        <label for="exampleInputPassword1">Address</label> 
                        <input type="text" name="address" class="form-control" maxlength="100" value="{{$rs_updates[0]->address}}">
                    </div>
                    <div class="col-lg-4 form-group">
                        <label for="exampleInputPassword1">Pincode</label> 
                        <input type="text" name="pincode" class="form-control" maxlength="6" minlength="6" onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="{{$rs_updates[0]->pincode}}">
                    </div>
                    <div class="col-lg-4 form-group">
                        <label for="exampleInputPassword1">Account No.</label>
                        <input type="text" name="account_no" class="form-control" placeholder="Enter Account No." maxlength="20" minlength="9" onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="{{$rs_updates[0]->account_no}}">
                    </div>
                    <div class="col-lg-4 form-group">
                        <label for="exampleInputPassword1">Bank Branch Name</label>
                        <input type="text" name="bank_branch_name" class="form-control" placeholder="Enter Bank Branch Name" maxlength="50" value="{{$rs_updates[0]->bank_name}}">
                    </div>
                    <div class="col-lg-4 form-group">
                        <label for="exampleInputPassword1">Ifsc Code</label>
                        <input type="text" name="ifsc_code" class="form-control" placeholder="Enter Ifsc Code" maxlength="20" value="{{$rs_updates[0]->ifsc_code}}">
                    </div>             
                    <div class="col-lg-4 form-group">
                        <label for="exampleInputEmail1">Education Qualification</label>
                        <select name="education_qualification" class="form-control">
                            <option value="1" {{$rs_updates[0]->education==1?'selected':''}}>Illiterate</option>
                            <option value="2" {{$rs_updates[0]->education==2?'selected':''}}>Under Primary</option>
                            <option value="3" {{$rs_updates[0]->education==3?'selected':''}}>Under High</option>
                            <option value="4" {{$rs_updates[0]->education==4?'selected':''}}>10th</option>
                            <option value="5" {{$rs_updates[0]->education==5?'selected':''}}>12th</option>
                            <option value="6" {{$rs_updates[0]->education==6?'selected':''}}>Graduate</option>
                            <option value="7" {{$rs_updates[0]->education==7?'selected':''}}>Post Graduate</option>
                        </select>
                    </div>
                    <div class="col-lg-4 form-group">
                        <label for="exampleInputEmail1">Technical Knowledge</label>
                        <select name="technical_knowledge"  class="form-control">
                            <option value="1" {{$rs_updates[0]->technical==1?'selected':''}}>N.A</option>
                            <option value="2" {{$rs_updates[0]->technical==2?'selected':''}}>ITI</option>
                            <option value="3" {{$rs_updates[0]->technical==3?'selected':''}}>Diploma</option>
                            <option value="4" {{$rs_updates[0]->technical==4?'selected':''}}>Degree</option>
                        </select>
                    </div>
                    <div class="col-lg-4 form-group">
                        <label for="exampleInputEmail1">Computer Knowledge</label>
                        <select name="computer_knowledge" class="form-control">
                            <option value="1" {{$rs_updates[0]->computer_knowledge==1?'selected':''}}>No</option>
                            <option value="2" {{$rs_updates[0]->computer_knowledge==2?'selected':''}}>Yes</option>
                        </select>
                    </div>
                    <div class="col-lg-4 form-group">
                        <label for="exampleInputEmail1">Family Main Occupation</label>
                        <input type="text" name="occupation" class="form-control" value="{{$rs_updates[0]->occupation}}">
                    </div>
                    <div class="col-lg-4 form-group">
                        <label for="exampleInputEmail1">Tentative Income Monthly</label>
                        <select name="income" class="form-control">
                            <option value="1" {{$rs_updates[0]->income==1?'selected':''}}>Less than 5000</option>
                            <option value="2" {{$rs_updates[0]->income==2?'selected':''}}>5000 - 10000</option>
                            <option value="3" {{$rs_updates[0]->income==3?'selected':''}}>10000 - 150000</option>
                            <option value="4" {{$rs_updates[0]->income==4?'selected':''}}>More than 150000</option>
                        </select>
                    </div>
                    <div class="col-lg-4 form-group">
                        <label for="exampleInputEmail1">PMJJBY</label>
                        <select name="pmjjby"  class="form-control">
                            <option value="0">No</option>
                            <option value="1" {{$rs_updates[0]->pmjjby==1?'selected':''}}>Yes</option>
                        </select>
                    </div>
                    <div class="col-lg-4 form-group">
                        <label for="exampleInputEmail1">PMJSBY</label>
                        <select name="pmjsby" class="form-control">
                            <option value="0">No</option>
                            <option value="1" {{$rs_updates[0]->pmjsby==1?'selected':''}}>Yes</option>
                        </select>
                    </div> 
                    <div class="col-lg-4 form-group">
                        <label for="exampleInputEmail1">APY</label>
                        <select name="apy" class="form-control">
                            <option value="0">No</option>
                            <option value="1" {{$rs_updates[0]->apy==1?'selected':''}}>Yes</option>
                        </select>
                    </div> 
                    <div class="col-lg-4 form-group">
                        <label for="exampleInputEmail1">Ayushman Card No.</label>
                        <input type="text" name="ayushman" class="form-control" value="{{$rs_updates[0]->ayushman}}">
                    </div>
                    <div class="col-lg-12 text-center">
                        <button type="submit" class="btn btn-primary form-control">Submit</button> 
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

