            
                  @foreach($user as $user_info)
                  <div class="row">
                    <div class="col-md-7">
                      <div class="form-group">
                        <label class="form-control-label" for="input-full-name">Name of Group</label>
                        <div class="input-group input-group-alternative mb-4">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons text-dark">group</i></span>
                          </div>
                          <input class="form-control form-control-alternative" placeholder="Name of Group" type="text" name="name_of_group" id="name_of_group" required>
                        </div>
                      </div>
                    </div>
                   

                    @foreach($user_info->tbl_address as $address)
                    <div class="col-md-5">
                      <div class="form-group">
                        <label class="form-control-label" for="input-full-name">Municipality/City</label>
                        <div class="input-group input-group-alternative mb-4">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons text-dark">place</i></span>
                          </div>
                          <input class="form-control form-control-alternative " placeholder="Municipality/City" type="text" readonly value="{{ $address->tbl_barangay->tbl_town->town_name }}, Laguna">
                        </div>
                      </div>
                    </div>
                    @endforeach
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-full-name">Contact Person</label>
                        <div class="input-group input-group-alternative mb-4">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons text-dark">person</i></span>
                          </div>
                          <input class="form-control form-control-alternative" placeholder="Contact Person" type="text" readonly value="{{ $user_info->first_name }} {{ $user_info->middle_name }} {{ $user_info->last_name }}">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-full-name">Contact number</label>
                        <div class="input-group input-group-alternative mb-4">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons text-dark">phone</i></span>
                          </div>
                          <input class="form-control form-control-alternative" placeholder="Contact number" type="text" readonly value="{{ $user_info->contact }}">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-full-name">Email</label>
                        <div class="input-group input-group-alternative mb-4">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="material-icons text-dark">email</i></span>
                          </div>
                          <input class="form-control form-control-alternative" placeholder="Email" type="text" readonly value="{{ $user_info->email }}">
                        </div>
                      </div>
                    </div>
                  </div>
                  @endforeach
                  <hr class="my-4" />
                  <h6 class="heading-small text-muted mb-4">Members</h6>
                    <div class="col-md-12 member_list">
                     <div class="row">
                     <i class="mb-xl-0 d-lg-block d-none">
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     </i>
                      <div class="col-md-6">
                        <h4>Member Name</h4>
                        <div class="form-group">
                          <div class="input-group input-group-alternative mb-4">
                            <input class="form-control form-control-alternative" placeholder="Name of Person" type="text" name="member_name[]" id="member_name[]" required>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-5">
                        <h4>ID Picture</h4>
                        <div class="form-group">
                          <input class="form-control form-control-alternative" placeholder="Name of Person" accept="image/*" type="file" name="member_image[]" id="member_image[]"  required>
                        </div>
                      </div>
                    </div>
                  </div>
                  <p class="heading-small text-muted mb-4 ">
                    <button class="btn add_member btn-default btn-sm"><i class=" fa fa-plus"></i> Add new member</button>
                  </p>
                  <br>
                  <div class="row">
                    <button type="submit" class="btn btn-icon btn-3 btn-danger right btn-submit" type="button">
                      <span class="btn-inner--icon"><i class="ni ni-send" id="subIcon"></i></span>
                      <span class="btn-inner--text">Submit Registration</span>
                    </button>
                  </div>

                  
  