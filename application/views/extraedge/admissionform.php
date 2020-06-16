<div class="panel panel-info">
    <div class="panel-heading">
        <div class="panel-title">Registration Form</div>
        <div style="float:right; font-size: 85%; position: relative; top:-10px"></div>
    </div>  
    <div class="panel-body" >
            <form  class="form-horizontal" id="application_form" >
            <div class="col-md-12">
                <div class="row">
                    <div id="div_id_username" class="form-group required">
                        <label for="student_name" class="control-label col-md-4  requiredField"> Student Name<span class="asteriskField">*</span> </label>
                        <div class="controls col-md-8 ">
                            <input class="input-md  textinput textInput form-control" id="student_name" maxlength="30" name="student_name" placeholder="Student Name" style="margin-bottom: 10px" type="text" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div id="div_id_catagory" class="form-group required">
                        <label for="dob" class="control-label col-md-4  requiredField"> Date of birth<span class="asteriskField">*</span> </label>
                        <div class="controls col-md-8 "> 
                            <input type="text" id="dob" name="dob" class="form-control" style="margin-bottom:10px;" placeholder="Date of birth">    
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div id="div_id_gender" class="form-group required">
                        <label for="gender"  class="control-label col-md-4  requiredField"> Gender<span class="asteriskField">*</span> </label>
                        <div class="controls col-md-8 "  style="margin-bottom: 10px">
                             <label class="radio-inline"> <input type="radio" name="gender" id="gender" value="Male"  style="margin-bottom: 10px">Male</label>
                             <label class="radio-inline"> <input type="radio" name="gender" id="gender" value="Female"  style="margin-bottom: 10px">Female </label>
                        </div>
                    </div>          
                </div>
                <div class="row">
                    <div id="div_id_name" class="form-group required"> 
                        <label for="religion" class="control-label col-md-4  requiredField"> Religion<span class="asteriskField">*</span> </label> 
                        <div class="controls col-md-8 "> 
                        <select name="religion"  class="form-control" id="religion" style="margin-bottom:10px;">
                              <option value="">-- Select --</option>
                              <option value="Hindu">Hindu</option>
                              <option value="Islam">Islam</option>
                              <option value="Christian">Christian</option>
                              <option value="Others">Others</option>
                            </select> 
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div id="div_id_name" class="form-group required"> 
                        <label for="caste" class="control-label col-md-4  requiredField"> Caste Category<span class="asteriskField">*</span> </label> 
                        <div class="controls col-md-8 "> 
                        <select name="caste"  class="form-control" id="caste" style="margin-bottom:10px;">
                              <option value="">-- Select --</option>
                              <option value="General">General</option>
                              <option value="OBC-M">OBC-M</option>
                              <option value="OBC-MP">OBC-MP</option>
                              <option value="ST">ST</option>
                              <option value="SC">SC</option>
                              <option value="Outstanding Sport Person">Outstanding Sport Person</option>
                            </select> 
                        </div>
                    </div>
                </div>
                <div class="row">       
                    <div id="div_id_number" class="form-group required">
                         <label for="father_name" class="control-label col-md-4  requiredField"> Father's Name<span class="asteriskField">*</span> </label>
                         <div class="controls col-md-8 ">
                             <input class="input-md textinput textInput form-control" id="father_name" name="father_name" placeholder="Father's Name" style="margin-bottom: 10px" type="text" />
                        </div> 
                    </div>
                </div>
                <div class="row">       
                    <div id="div_id_number" class="form-group required">
                         <label for="father_name" class="control-label col-md-4  requiredField"> Father Occupation</label>
                         <div class="controls col-md-8 ">
                             <input class="input-md textinput textInput form-control" id="father_occuption" name="father_occuption" placeholder="Father Occuption" style="margin-bottom: 10px" type="text" />
                        </div> 
                    </div>
                </div>
                <div class="row">       
                    <div id="div_id_mother" class="form-group required">
                         <label for="mother_name" class="control-label col-md-4  requiredField"> Mother's Name<span class="asteriskField">*</span> </label>
                         <div class="controls col-md-8 ">
                             <input class="input-md textinput textInput form-control" id="mother_name" name="mother_name" placeholder="Mother's Name" style="margin-bottom: 10px" type="text" />
                        </div> 
                    </div>
                </div>
                <div class="row">       
                    <div id="div_id_mother" class="form-group required">
                         <label for="mother_name" class="control-label col-md-4  requiredField"> Mother Occuption</label>
                         <div class="controls col-md-8 ">
                             <input class="input-md textinput textInput form-control" id="mother_occuption" name="mother_occuption" placeholder="Mother Occuption" style="margin-bottom: 10px" type="text" />
                        </div> 
                    </div>
                </div>

                <div class="row">
                    <div id="div_id_number" class="form-group required">
                         <label for="permanent_address" class="control-label col-md-4  requiredField"> Permanent Address In Full<span class="asteriskField">*</span> </label>
                         <div class="controls col-md-8 ">
                             <input class="input-md textinput textInput form-control" id="permanent_address" name="permanent_address" placeholder="Permanent Address In Full" style="margin-bottom: 10px" type="text" />
                        </div> 
                    </div>
                </div>
                <div class="row">
                    <div id="div_id_number" class="form-group required">
                         <label for="permanent_address" class="control-label col-md-4  requiredField"> Permanent Address Post Office<span class="asteriskField">*</span> </label>
                         <div class="controls col-md-8 ">
                             <input class="input-md textinput textInput form-control" id="permanent_address_po" name="permanent_address_po" placeholder="Permanent Address Post Office" style="margin-bottom: 10px" type="text" />
                        </div> 
                    </div>
                </div>
                <div class="row">
                    <div id="div_id_number" class="form-group required">
                         <label for="permanent_address" class="control-label col-md-4  requiredField"> Permanent Address Police Station<span class="asteriskField">*</span> </label>
                         <div class="controls col-md-8 ">
                             <input class="input-md textinput textInput form-control" id="permanent_address_ps" name="permanent_address_ps" placeholder="Permanent Address Police Station" style="margin-bottom: 10px" type="text" />
                        </div> 
                    </div>
                </div>
                
                <div class="row">       
                    <div id="div_id_number" class="form-group required">
                         <label for="permanent_pin" class="control-label col-md-4  requiredField"> Permanent Address Pin Code<span class="asteriskField">*</span> </label>
                         <div class="controls col-md-8 ">
                             <input class="input-md textinput textInput form-control" id="permanent_pin" name="permanent_pin" placeholder="Permanent Address Pin" style="margin-bottom: 10px" type="number" maxlength="7" />
                        </div> 
                    </div> 
                </div>

                <div class="row">       
                    <div id="div_id_number" class="form-group required">
                        <label for="whatapps_no" class="control-label col-md-4  requiredField">Contact Number<span class="asteriskField">*</span> 
                        </label>
                        <div class="controls col-md-8 ">
                             <input class="input-md textinput textInput form-control" id="whatapps_no" name="whatapps_no" placeholder="Contact Number" style="margin-bottom: 10px" type="number" maxlength="10" />
                        </div> 
                    </div>
                </div>
                <div class="row">
                    <div id="div_id_email" class="form-group required">
                        <label for="aadhaar_number" class="control-label col-md-4  requiredField">Aadhaar Number<span class="asteriskField">*</span> </label>
                        <div class="controls col-md-8 ">
                            <input class="input-md emailinput form-control" id="aadhaar_number" name="aadhaar_number" placeholder="____-____-____"  style="margin-bottom: 10px" type="text" />
                        </div>     
                    </div>
                </div>
                <div class="row">
                    <div id="div_id_company" class="form-group required"> 
                        <label for="identification_mark" class="control-label col-md-4  requiredField"> Identification Mark </label>
                        <div class="controls col-md-8 "> 
                             <input class="input-md textinput textInput form-control" id="identification_mark" name="identification_mark" placeholder="Identification Mark" style="margin-bottom: 10px" type="text" />
                        </div>
                    </div> 
                </div>
                <div class="row">
                    <div id="div_id_pwd" class="form-group required">
                        <label for="pwd"  class="control-label col-md-4  requiredField">Person with disability<span class="asteriskField">*</span> </label>
                        <div class="controls col-md-8 "  style="margin-bottom: 10px">
                             <label class="radio-inline"> <input type="radio" name="pwd" id="pwd" value="YES"  style="margin-bottom: 10px">YES</label>
                             <label class="radio-inline"> <input type="radio" name="pwd" id="pwd" value="NO"  style="margin-bottom: 10px">NO</label>
                        </div>
                    </div>          
                </div>
                <div class="row">       
                    <div id="div_id_password1" class="form-group required">
                        <label for="blood_group" class="control-label col-md-4  requiredField">Blood Group<span class="asteriskField">*</span> </label>
                        <div class="controls col-md-8 "> 
                         
                            <select name="blood_group"  class="form-control" id="blood_group" style="margin-bottom:10px;">
                                <option value="">-- Select --</option>
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                            </select> 
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div id="div_id_number" class="form-group required">
                         <label for="x_pass_board" class="control-label col-md-4  requiredField"> Class X Passed Board<span class="asteriskField">*</span> </label>
                         <div class="controls col-md-8 ">
                             <input class="input-md textinput textInput form-control" id="x_pass_board" name="x_pass_board" placeholder="Class X Passed Board" style="margin-bottom: 10px" type="text" />
                        </div> 
                    </div>
                </div>
                <div class="row">
                    <div id="div_id_number" class="form-group required">
                         <label for="x_pass_school" class="control-label col-md-4  requiredField"> X Board Passed out School Name<span class="asteriskField">*</span> </label>
                         <div class="controls col-md-8 ">
                             <input class="input-md textinput textInput form-control" id="x_pass_school" name="x_pass_school" placeholder="School Name" style="margin-bottom: 10px" type="text" />
                        </div> 
                    </div>
                </div>
                <div class="row">
                    <div id="div_id_number" class="form-group required">
                         <label for="roll_no" class="control-label col-md-4  requiredField">X Board Roll No<span class="asteriskField">*</span> </label>
                         <div class="controls col-md-8 ">
                             <input class="input-md textinput textInput form-control" id="roll_no" name="roll_no" placeholder="Roll No" style="margin-bottom: 10px" type="text" />
                        </div> 
                    </div>
                </div>
                <div class="row">
                    <div id="div_x_passed_year" class="form-group required">
                         <label for="x_passed_year" class="control-label col-md-4  requiredField">Year of Passed class X<span class="asteriskField">*</span> </label>
                         <div class="controls col-md-8 ">
                             <input class="input-md textinput textInput form-control" id="x_passed_year" name="x_passed_year" placeholder="Year of Passed" style="margin-bottom: 10px" type="text" />
                        </div> 
                    </div>
                </div>
                <div class="row">
                    <div id="div_x_division" class="form-group required">
                         <label for="x_division" class="control-label col-md-4  requiredField">Class X Division<span class="asteriskField">*</span> </label>
                         <div class="controls col-md-8 ">
                             <input class="input-md textinput textInput form-control" id="x_division" name="x_division" placeholder="Division" style="margin-bottom: 10px" type="text" />
                        </div> 
                    </div>
                </div>
                <div class="row">       
                    <div id="div_id_number" class="form-group required">
                        <label for="percentage" class="control-label col-md-4  requiredField"><span class="asteriskField">*</span> X Board Percentage (%) / Grade Point</label>
                        <div class="controls col-md-8 ">
                             <input class="input-md textinput textInput form-control" id="percentage" name="percentage" placeholder="Percentage/Grade Point" style="margin-bottom: 10px" type="text" />
                        </div> 
                    </div> 
                </div>
                <div class="row">       
                    <div id="div_x_subject_offer" class="form-group required">
                        <label for="x_subject_offer" class="control-label col-md-4  requiredField"><span class="asteriskField">*</span>Class X Subject offers </label>
                        <div class="controls col-md-8 ">
                             <input class="input-md textinput textInput form-control" id="x_subject_offer" name="x_subject_offer" placeholder="eg... English, Mathematic, Science etc" style="margin-bottom: 10px" type="text" />
                        </div> 
                    </div> 
                </div>
                <div class="row">       
                    <div id="div_x_eligible_cert_no" class="form-group required">
                        <label for="x_eligible_cert_no" class="control-label col-md-4  requiredField">Eligibility Certificate No. (for transferee)</label>
                        <div class="controls col-md-8 ">
                             <input class="input-md textinput textInput form-control" id="x_eligible_cert_no" name="x_eligible_cert_no" placeholder="" style="margin-bottom: 10px" type="text" />
                        </div> 
                    </div> 
                </div>
                <div class="row" >       
                    <div id="div_id_subject_detail" class="form-group required">
                    <br>
                    <div class="col-md-12">
                        <label for="subject_combination" > Select subject combination. <span class="asteriskField">*</span> </label>
                        </div>
                        <div class="controls col-md-12 ">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <label class="radio-inline"> 
                                    <input type="radio" name="subject_combination" id="subject_combination" value="GROUP-A"  style="margin-bottom: 10px">
                                    <b>Group A :</b>
                                    <br> Physics, Chemistry, Biology, Mathematics, English.
                                    <br> General English/Manipuri or Alt.
                                    </label>
                                </li>
                                <li class="list-group-item">
                                    <label class="radio-inline"> 
                                    <input type="radio" name="subject_combination" id="subject_combination" value="GROUP-B"  style="margin-bottom: 10px">
                                    <b>Group B :</b>
                                    <br> Physics, Chemistry, Mathematics, Computer Science, English.
                                    <br> General English/Manipuri or Alt.
                                    </label>
                                </li>
                                <li class="list-group-item">
                                    <label class="radio-inline"> 
                                    <input type="radio" name="subject_combination" id="subject_combination" value="GROUP-C"  style="margin-bottom: 10px">
                                    <b>Group C :</b>
                                    <br> Physics, Chemistry, Biology, Home Science, English.
                                    <br> General English/Manipuri or Alt.
                                    </label>
                                </li>
                            </ul>
                       </div> 
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <div class=" col-md-12">
                            <div class="text-center"><u><strong> CAREER OPTIONS </strong></u></div><br>
                            <div id="div_id_terms" class="checkbox required">
                               <label for="ambition" class="control-label col-md-5  requiredField">Your Aim/Ambition of Life : </label>
                                <div class="controls col-md-7 ">
                                     <input class="input-md textinput textInput form-control" id="ambition" name="ambition" placeholder="" style="margin-bottom: 10px" type="text" />
                                </div> 
                            </div> 
                            <div id="div_id_terms" class="checkbox required">
                               <label for="career_option" class="control-label col-md-5  requiredField"> Career option you want to choose (after 10+2) :</label>
                                <div class="controls col-md-7 ">
                                     <input class="input-md textinput textInput form-control" id="career_option" name="career_option" placeholder="eg... Engineering,Doctor etc" style="margin-bottom: 10px" type="text" />
                                </div> 
                            </div> 
                             <div class="text-center"><u style="padding: 20px;color:#a79999;">You may choose : Medical/Dentistry/Engineering/IT/Management/NDA/Naval Academy/Air Force/Fashion Designing/Law/Journalism/General Studies/Civil Services, etc.</u></div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        <div class=" col-md-12 ">
                            <div class="text-center"><strong>DECLARATION BY THE CANDIDATE</strong></div>
                            <div id="div_id_terms" class="checkbox required">
                                <label for="id_terms" class=" requiredField">
                                     <input class="input-ms checkboxinput" id="id_terms" name="terms_student" style="margin-bottom: 10px" type="checkbox" />
                                     I hereby declare that I have gone through the prospectus of the school and I shall abide by the Rules
                                    and Regulations of the school. Further more, I declare that the statements, informations given are true
                                    to the best of my knowledge and belief and I shall hold myself responsible for any eventually thereof.
                                </label>
                            </div> 
                                
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-12 ">
                            <div class="text-center"><strong>DECLARATION BY THE PARENT/GUARDIAN</strong></div>
                            <div id="div_id_terms" class="checkbox required">
                                <label for="id_terms2" class=" requiredField">
                                     <input class="input-ms checkboxinput" id="id_terms2" name="terms_parent" style="margin-bottom: 10px" type="checkbox" />
                                I hereby declare that I hold responsible for the good conduct and behaviour of my son/daughter/
                                wards as student of the New Era Higher Secondary School and for the regular payment of fees and dues
                                during his/her stay in the school. Further, I declare that the academic progress of my son/daughter/ward
                                as monitored by the school authority will be regularly observed and the monthly progress report will be
                                contersigned.                     
                                </label>
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-12">
                        <label for="files_photo" > Student Passport Photo<span class="asteriskField">*</span> </label>
                        </div>
                        <div class="col-md-12 ">
                            <div id="div_id_terms" class="checkbox required">
                                <small style="color:red;">(Allow file type PNG,JPG,PDF AND JPEG only. Image size below 2MB)</small>
                                <input  style="margin-top: 10px;" type="file" id="files_photo" name="files_photo"></input>                           
                            </div> 
                                
                        </div>
                    </div>
                </div>  
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-12">
                        <label for="files_marksheet" > One self-attested copy of Marksheet of HSLCE<span class="asteriskField">*</span> </label>
                        </div>
                        <div class="col-md-12 ">
                            <div id="div_id_terms" class="checkbox required">
                                <small style="color:red;">(Allow file type PNG,JPG,PDF AND JPEG only. Image size below 2MB)</small>
                                <input  style="margin-top: 10px;" type="file" id="files_marksheet" name="files_marksheet"></input>                           
                            </div> 
                                
                        </div>
                    </div>
                </div> 
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-12">
                        <label for="files_admitcard" > One self-attested copy of Admit Card of HSLCE<span class="asteriskField">*</span> </label>
                        </div>
                        <div class="col-md-12 ">
                            <div id="div_id_terms" class="checkbox required">
                                <small style="color:red;">(Allow file type PNG,JPG,PDF AND JPEG only. Image size below 2MB)</small>
                                <input  style="margin-top: 10px;" type="file" id="files_admitcard" name="files_admitcard"></input>                           
                            </div> 
                                
                        </div>
                    </div>
                </div>                     
                
                <div class="row">   
                <div class="form-group"> 
                    <div class="aab controls col-md-12 "></div>
                    <div class="controls col-md-8 ">
                        <input onclick="addResgistrationFrom()" type="button" value="Submit" class="btn btn-primary btn btn-info" id="submit" />
                    </div>
                </div>
                </div>  
            </div>                      
            </form>
    </div>
</div>
</div>

<script type="text/javascript">
$(function() {

  $('#aadhaar_number').mask('0000-0000-0000', {'translation': {0: {pattern: /[0-9*]/}}});  
  $('#permanent_pin').mask('000000', {'translation': {0: {pattern: /[0-9*]/}}});   
  $('#whatapps_no').mask('0000000000', {'translation': {0: {pattern: /[0-9*]/}}}); 
  $('#x_passed_year').mask('0000', {'translation': {0: {pattern: /[0-9*]/}}}); 
   
    $( "#dob" ).datepicker({
        dateFormat : 'dd-mm-yy',
        changeMonth : true,
        changeYear : true,
        yearRange: '-100y:c+nn',
        maxDate: '-1d'
    });
}); 

</script>