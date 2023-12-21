<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Add Family</h4>
            <button type="button" id="btn_close" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('admin.shgmemberfamilyStore',Crypt::encrypt(@$rs_update[0]->id)) }}" method="post" class="add_form" button-click="btn_close" select-triger="member_select_box">
                {{ csrf_field() }} 
                    <div class="row">
                        <input type="hidden" name="shg_member_detail_id" value="{{@$shg_member_detail_id}}"> 
                        <div class="col-lg-4 form-group">
                            <label for="exampleInputEmail1">Head of family</label>
                            <span class="fa fa-asterisk"></span>
                            <input type="text" name="name" class="form-control" placeholder="Enter Name" maxlength="100" value="{{@$rs_update[0]->name}}">
                    </div>
                    <div class="col-lg-4 form-group">
                            <label for="exampleInputEmail1">No of family Member</label>
                            <span class="fa fa-asterisk"></span>
                            <input type="text" name="no_of_family_member" class="form-control" placeholder="Enter No of family Member" maxlength="100" value="{{@$rs_update[0]->name}}">
                    </div>
                    <div class="col-lg-4 form-group">
                        <label for="exampleInputEmail1">Relation</label>
                        <select name="relation" id="relation" class="form-control">
                            <option selected disabled>Select Relation Type</option>
                            @foreach ($relation_type as $relation_type)       
                            <option value="{{$relation_type->id}}"{{$relation_type->id==@$rs_update[0]->relation_id?'selected':''}}>{{$relation_type->relation_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-4 form-group">
                        <label for="exampleInputPassword1">DOB</label> 
                        <input type="date" name="dob" class="form-control" value="{{@$rs_update[0]->dob}}">
                    </div>
                    <div class="col-lg-4 form-group">
                        <label for="exampleInputPassword1">Age</label> 
                        <input type="text" name="age" class="form-control" maxlength="3" onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="{{@$rs_update[0]->age}}">
                    </div>
                    <div class="col-lg-4 form-group">
                        <label for="exampleInputEmail1">Gender</label>
                        <select name="gender" id="gender" class="form-control">
                            <option selected disabled>Select Gender Type</option>
                            @foreach ($gender_type as $gender_typ)       
                            <option value="{{$gender_typ->id}}"{{$gender_typ->id==@$rs_update[0]->gender_id?'selected':''}}>{{$gender_typ->gender_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-4 form-group">
                        <label for="exampleInputEmail1">Pension</label>
                        <select name="Pension" class="form-control">
                            <option selected value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                    </div>

                    <div class="col-lg-4 form-group">
                        <label for="exampleInputEmail1">Education</label>
                        <span class="fa fa-asterisk"></span>
                        <select name="education" id="education" class="form-control">
                            <option selected disabled>Select Education</option>
                            @foreach ($education_level as $education)       
                            <option value="{{$education->id}}"{{$education->id==@$rs_update[0]->education?'selected':''}}>{{$education->edu_level_name}}</option>
                            @endforeach
                        </select>
                    </div> 


                    <div class="col-lg-6 form-group">
                        <label for="exampleInputEmail1">Remaks</label>
                        <input type="text" class="form-control" name="remaks" value="{{@$rs_update[0]->remaks}}">
                    </div>

                    <div class="col-lg-12 text-center">
                        <button type="submit" class="btn btn-primary form-control">Submit</button> 
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

