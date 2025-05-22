<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">Update Account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form id="updateAccountForm" method="post">
            {{ csrf_field() }}
            {{ method_field('POST') }}
            <div class="modal-body">

          


            <div class="row">
                    <div class="col-md-6">
                        <div class="row mt-1">
                            <div class="col-md-12">
                               <div class="col-md-12">
                                <div class="form-group border-fullname">
                                    <label for="fullname">Employee Fullname</label>
                                     <input type="text" class="form-control" id="u_fullname" name="u_fullname" required="">
                                    <small class='error-message' id="error-fullname"></small>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="row mt-1">
                            
                        </div>

                        <div class="row mt-1">
                            <div class="col-md-12">
                                <div class="form-group border-age">
                                    <label for="age">Age</label>
                                    <input type="number" min="0" max="999999" class="form-control" id="u_age" name="u_age" required="">
                                    <small class='error-message' id="error-age"></small>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-1">
                            <div class="col-md-12">
                                <div class="form-group border-address">
                                    <label for="address">Address</label> 
                                    <input type="text" class="form-control" id="u_address" name="u_address" required="">
                                    <small class='error-message' id="error-address"></small>
                                </div>
                            </div>
                        </div>


                        <div class="row mt-1">
                            <div class="col-md-12">
                                <div class="form-group border-contact_number">
                                    <label for="contact_number">Contact No.</label> 
                                    <input type="number"  min="0" max="" class="form-control" id="u_contact_number" name="u_contact_number" required="">
                                    <small class='error-message' id="error-contact_number"></small>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-1">
                            <div class="col-md-12">
                                <div class="form-group border-status">
                                    <label for="status">Active </label> 
                                     <input type="hidden" name="u_status" value="0">
                                    <input type="checkbox" id="u_status" name="u_status" value="1">
                                    <small class='error-message' id="error-status"></small>
                                </div>
                            </div>
                        </div>


                    </div>

                    <div class="col-md-6">

                        <div class="row mt-1">
                            <div class="col-md-12">
                                <div class="form-group border-birthdate">
                                    <label for="birthdate">Birthdate</label>
                                    <input type="date" class="form-control" id="u_birthdate" name="u_birthdate" required="">
                                    <small class='error-message' id="error-birthdate"></small>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-1">
                            <div class="col-md-12">
                                <div class="form-group border-civil_status">
                                    <label for="civil_status">Civil Status</label>
                                    <select class="form-control" id="u_civil_status" name="u_civil_status"  required="">
                                        <option value="">Select One</option>
                                        <option value="Single">Single</option>
                                        <option value="Married">Married</option>
                                        <option value="Separated">Separated</option>    
                                        <option value="Widowed">Widowed</option>   
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="row mt-1">
                            <div class="col-md-12">
                                <div class="form-group border-salary">
                                    <label for="salary">Salary </label> 
                                    <input type="number"  step="0.01" min="0.00" max="" class="form-control" id="u_salary" name="u_salary" required="">
                                    <small class='error-message' id="error-salary"></small>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-1">
                            <div class="col-md-12">
                                <div class="form-group border-gender">
                                    <label for="gender">Gender</label>
                                     <!-- <label>Gender:</label> -->
                                        <div>
                                            <input type="radio" id="gender-male" name="u_gender" value="male" required>
                                            <label for="gender-male">Male</label>
                                        </div>
                                        <div>
                                            <input type="radio" id="gender-female" name="u_gender" value="female" required>
                                            <label for="gender-female">Female</label>
                                        </div>
                                        <div>
                                            <input type="radio" id="gender-other" name="u_gender" value="other" required>
                                            <label for="gender-other">Other</label>
                                        </div>
                                        <small class="error-message" id="error-gender"></small>
                                        </div>
                            </div>
                        </div>



                    </div>
                </div>

            </div>



            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Update</button>
            </div>
            </form>
    </div>
  </div>
</div>
