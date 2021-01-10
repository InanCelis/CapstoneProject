    <div class="row">
      <div class="col-md-3">
        <div class="form-group">
          <label class="form-control-label" for="input-full-name">Height</label>
          <div class="input-group input-group-alternative mb-4">
            <input class="form-control form-control-alternative" placeholder="Height" type="number" step="any" required name="height" id="height">
            <div class="input-group-prepend">
              <span class="input-group-text bg-dark rounded-right text-white">cm</span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label class="form-control-label" for="input-full-name">Weight</label>
          <div class="input-group input-group-alternative mb-4">
            <input class="form-control form-control-alternative" placeholder="Weight" type="number" step="any"  required  name="weight" id="weight">
            <div class="input-group-prepend">
              <span class="input-group-text bg-dark rounded-right text-white">kg</span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label class="form-control-label" for="input-full-name">Color of Hair</label>
          <div class="input-group input-group-alternative mb-4">
            <input class="form-control form-control-alternative" placeholder="Color of Hair" type="text"  required  name="color_of_hair" id="color_of_hair">
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label class="form-control-label" for="input-full-name">Color of Eyes</label>
          <div class="input-group input-group-alternative mb-4">
            <input class="form-control form-control-alternative" placeholder="Color of Eyes" type="text"  required name="color_of_eyes" id="color_of_eyes">
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label class="form-control-label" for="input-full-name">Special Hobbies/Talent</label>
          <div class="input-group input-group-alternative mb-4">
            <input class="form-control form-control-alternative" placeholder="Special Hobbies/Talent" type="text"  required  name="special_hobbies" id="special_hobbies">
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label class="form-control-label" for="input-full-name">Occupation <i class="material-icons text-sm text-default" data-toggle="tooltip" data-placement="bottom" title="If this field is not applicable, please go to Account Settings.">info</i></label>
          <div class="input-group input-group-alternative mb-4">
            <input class="form-control form-control-alternative" placeholder="Occupation" type="text"   value="{{ $user_info->work }}" readonly>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label class="form-control-label" for="input-full-name">Employer</label>
          <div class="input-group input-group-alternative mb-4">
            <input class="form-control form-control-alternative" placeholder="Employer" type="text"    name="employer" id="employer">
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label class="form-control-label" for="input-full-name">School <i class="material-icons text-sm text-default" data-toggle="tooltip" data-placement="bottom" title="If this field is not applicable, please go to Account Settings.">info</i></label>
          <div class="input-group input-group-alternative mb-4">
            <input class="form-control form-control-alternative" placeholder="School " type="text"   value="{{ $user_info->school }}" readonly>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label class="form-control-label" for="input-full-name">Degree</label>
          <div class="input-group input-group-alternative mb-4">
            <input class="form-control form-control-alternative" placeholder="Degree" type="text"    name="degree" id="degree">
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label class="form-control-label" for="input-full-name">Father's name</label>
          <div class="input-group input-group-alternative mb-4">
            <input class="form-control form-control-alternative" placeholder="Father's name" type="text"   name="father_name" id="father_name">
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label class="form-control-label" for="input-full-name">Occupation</label>
          <div class="input-group input-group-alternative mb-4">
            <input class="form-control form-control-alternative" placeholder="Occupation" type="text"    name="father_occupation" id="father_occupation">
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label class="form-control-label" for="input-full-name">Mother's name</label>
          <div class="input-group input-group-alternative mb-4">
            <input class="form-control form-control-alternative" placeholder="Mother's name" type="text"    name="mother_name" id="mother_name">
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label class="form-control-label" for="input-full-name">Occupation</label>
          <div class="input-group input-group-alternative mb-4">
            <input class="form-control form-control-alternative" placeholder="Occupation" type="text"    name="mother_occupation" id="mother_occupation">
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="form-group">
         <label class="form-control-label" for="input-school">Why do you wish to join LAGUNA GAY QUEEN {{ $currentyear }}?</label>
         <textarea rows="2" class="form-control form-control-alternative" placeholder="Why do you wish to join LAGUNA GAY QUEEN {{ $currentyear }}?" name="wish_to_join" id="wish_to_join"></textarea>
        </div>
      </div>
    </div>
    <div class="row">
     <div class="col-md-8">
      <div class="form-group">
        <label class="form-control-label" for="input-full-name">ID Picture</label>
        <div class="input-group input-group-alternative mb-4">
          <input class="form-control form-control-alternative bg-white" accept="image/*" type="file" readonly id="id_picture" name="id_picture" required>
        </div>
       </div>
     </div><br>
      <button type="submit" class="btn btn-icon btn-3 btn-danger right btn-submit" type="button">
        <span class="btn-inner--icon"><i class="ni ni-send" id="subIcon"></i></span>
        <span class="btn-inner--text">Submit Registration</span>
      </button>
    </div>