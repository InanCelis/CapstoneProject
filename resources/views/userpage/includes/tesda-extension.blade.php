<hr class="my-4" />
  <h6 class="heading-small mb-4"><strong>Educational Background</strong></h6>
  <div class="pl-lg-4">
    {{-- elementary --}}
    <label class="heading-small text-muted mb-4"><b><u>Primary / Elementary</u></b>  </label>
    <div class="row">
       <div class="col-lg-6">
         <div class="form-group">
            <label class="form-control-label" for="input-elem-name">Name of School</label>
            <input type="text" id="input-elem-name" class="form-control form-control-alternative" placeholder="Name of School" name="elementary_name">
         </div>
       </div>
       
       <div class="col-lg-2">
         <div class="form-group">
            <label class="form-control-label" for="input-elem-year">Year Graduated</label>
            <input type="number" min="1900" max="2099" step="1" id="input-elem-year" class="form-control form-control-alternative" placeholder="Year" name="elementary_year">
         </div>
       </div> 
       <div class="col-lg-4">
         <div class="form-group">
            <label class="form-control-label" for="input-elem-acad">Academic Honor Recieved</label>
            <input type="text" id="input-elem-acad" class="form-control form-control-alternative" placeholder="Academic Honor Recieved" name="elementary_academic" >
         </div>
       </div>
    </div>
    {{-- highschool --}}
    <label class="heading-small text-muted mb-4"><b><u>Secondary / Highschool</u></b>  </label>
    <div class="row">
       <div class="col-lg-6">
         <div class="form-group">
            <label class="form-control-label" for="input-sec-name">Name of School</label>
            <input type="text" id="input-sec-name" class="form-control form-control-alternative" placeholder="Name of School" name="secondary_name" >
         </div>
       </div>
       <div class="col-lg-2">
         <div class="form-group">
            <label class="form-control-label" for="input-sec-year">Year Graduated</label>
            <input type="number" min="1900" max="2099" step="1" id="input-sec-year" class="form-control form-control-alternative" placeholder="Year" name="secondary_year">
         </div>
       </div>
       <div class="col-lg-4">
         <div class="form-group">
            <label class="form-control-label" for="input-sec-acad">Academic Honor Recieved</label>
            <input type="text" id="input-sec-acad" class="form-control form-control-alternative" placeholder="Academic Honor Recieved" name="secondary_academic" >
         </div>
       </div>
    </div>
    {{-- vocational --}}
    <label class="heading-small text-muted mb-4"><b><u>Vocational Course</u></b>  </label>
    <div class="row">
       <div class="col-lg-6">
         <div class="form-group">
            <label class="form-control-label" for="input-voc-name">Name of School</label>
            <input type="text" id="input-voc-name" class="form-control form-control-alternative" placeholder="Name of School" name="vocational_name">
         </div>
       </div>
       <div class="col-lg-2">
         <div class="form-group">
            <label class="form-control-label" for="input-voc-year">Year Graduated</label>
            <input type="number" min="1900" max="2099" step="1" id="input-voc-year" class="form-control form-control-alternative" placeholder="Year" name="vocational_year">
         </div>
       </div>
       <div class="col-lg-4">
         <div class="form-group">
            <label class="form-control-label" for="input-voc-acad">Academic Honor Recieved</label>
            <input type="text" id="input-voc-acad" class="form-control form-control-alternative" placeholder="Academic Honor Recieved" name="vocational_academic">
         </div>
       </div>
    </div>
    {{-- college --}}
    <label class="heading-small text-muted mb-4"><b><u>College</u></b>  </label>
    <div class="row">
       <div class="col-lg-6">
         <div class="form-group">
            <label class="form-control-label" for="input-college-name">Name of School</label>
            <input type="text" id="input-college-name" class="form-control form-control-alternative" placeholder="Name of School" name="college_name">
         </div>
       </div>
       <div class="col-lg-2">
         <div class="form-group">
            <label class="form-control-label" for="input-college-year">Year Graduated</label>
            <input type="number" min="1900" max="2099" step="1" id="input-college-year" class="form-control form-control-alternative" placeholder="Year" name="college_year">
         </div>
       </div>
       <div class="col-lg-4">
         <div class="form-group">
            <label class="form-control-label" for="input-college-acad">Academic Honor Recieved</label>
            <input type="text" id="input-college-acad" class="form-control form-control-alternative" placeholder="Academic Honor Recieved" name="college_academic">
         </div>
       </div>
    </div>
  </div>
  <hr class="my-4" />
  <h6 class="heading-small mb-4"><strong>Emergency Information</strong></h6>
  <div class="pl-lg-4">
    <div class="row">
       <div class="col-lg-5">
         <div class="form-group">
            <label class="form-control-label" for="input-contact-person">Name of Person to be contact</label>
            <input type="text" id="input-contact-person" class="form-control form-control-alternative" placeholder="Name of Person to be contact" name="contact_person" required>
         </div>
       </div>
       <div class="col-lg-7">
         <div class="form-group">
            <label class="form-control-label" for="input-contact-address">His/Her Address</label>
            <input type="text" id="input-contact-address" class="form-control form-control-alternative" placeholder="His/Her Address" name="contact_address" required>
         </div>
       </div>
    </div>
  </div>
   <hr class="my-4" />
  <h6 class="heading-small mb-4"><strong>Questions</strong></h6>
  <div class="pl-lg-4">
    <div class="row">
       <div class="col-lg-12">
         <div class="form-group">
            <label class="form-control-label" for="input-school-name">Are you student or an out-of-school youth? (Ikaw ba ay isang estudyante o isang hindi na nag-aaral na kabataan?)</label>
            <div class="custom-control custom-radio mb-4">
              <input name="student_or_out_of_school" class="custom-control-input" id="student" type="radio" value="Student" required>
              <label class="custom-control-label" for="student">Student (Estudyante)</label> 
            </div>
            <div class="custom-control custom-radio mb-4">
              <input name="student_or_out_of_school" class="custom-control-input" id="outofschool" type="radio" value="Out of School" required>
              <label class="custom-control-label" for="outofschool">Out of School (Hindi na nag-aaral)</label>
            </div>
         </div>
       </div>
    </div>
  </div>
  <hr class="my-4" />
  <h6 class="heading-small mb-4"><strong>Computer Background</strong></h6>
  <div class="pl-lg-4">
    <label class="heading-small text-muted mb-4"><b>5 Being the highest and 1 being the lowest / 5 pinaka mataas at 1 pinaka mababa.</b>  </label>
    <div class="row">
     <div class="col-lg-4">
       <div class="form-group">
         <label class="form-control-label" for="input-ms-office">Microsoft Office</label>
          <select class="form-control" name="microsoft_office" id="input-ms-office" required>
             <option disabled="" selected=""></option>
             <option value="5">5</option>
             <option value="4">4</option>
             <option value="3">3</option>
             <option value="2">2</option>
             <option value="1">1</option>
          </select>
       </div>
     </div>
     <div class="col-lg-4">
       <div class="form-group">
         <label class="form-control-label" for="input-excel">Microsoft Excel</label>
          <select class="form-control" name="microsoft_excel" id="input-excel" required>
             <option disabled="" selected=""></option>
             <option value="5">5</option>
             <option value="4">4</option>
             <option value="3">3</option>
             <option value="2">2</option>
             <option value="1">1</option>
          </select>
       </div>
     </div>
     <div class="col-lg-4">
       <div class="form-group">
         <label class="form-control-label" for="input-powerpoint">Powerpoint Presentation</label>
          <select class="form-control" name="powerpoint" id="input-powerpoint" required>
             <option disabled="" selected=""></option>
             <option value="5">5</option>
             <option value="4">4</option>
             <option value="3">3</option>
             <option value="2">2</option>
             <option value="1">1</option>
          </select>
       </div>
     </div>
    </div>
    <div class="row">
       <div class="col-lg-6">
       <div class="form-group">
         <label class="form-control-label" for="input-photoshop">Adobe Photoshop</label>
          <select class="form-control" name="adobe_photoshop" id="input-photoshop" required>
             <option disabled="" selected=""></option>
             <option value="5">5</option>
             <option value="4">4</option>
             <option value="3">3</option>
             <option value="2">2</option>
             <option value="1">1</option>
          </select>
       </div>
     </div>
     <div class="col-lg-6">
       <div class="form-group">
         <label class="form-control-label" for="input-adobe-premiere">Adobe Premiere</label>
          <select class="form-control" name="adobe_premiere" id="input-adobe-premiere" required>
             <option disabled="" selected=""></option>
             <option value="5">5</option>
             <option value="4">4</option>
             <option value="3">3</option>
             <option value="2">2</option>
             <option value="1">1</option>
          </select>
       </div>
     </div>
    </div>
  </div>
  <hr class="my-4" />
  <h6 class="heading-small mb-4"><strong>Others</strong></h6>
  <div class="pl-lg-4">
    <div class="row">
       <div class="col-lg-12">
         <div class="form-group">
          <label class="form-control-label" for="input-school">others please specify</label>
          <textarea rows="2" maxlength="70" class="form-control form-control-alternative" name="other_specify" placeholder="others please specify"></textarea>
         </div>
       </div>
    </div>
    <div class="row">
       <div class="col-lg-5">
         <div class="form-group">
            <label class="form-control-label" for="user_picture">Picture(2x2 white background and formal)</label>
            <div class="input-group input-group-alternative mb-4">
              <input class="form-control form-control-alternative bg-white" required="" type="file" accept="image/*"  id="user_picture" name="picture" >
            </div>
         </div> 
         <div class="form-group">
            <label class="form-control-label" for="input-school-name">Choose preffered schedule</label>
            <div class="custom-control custom-radio mb-4">
              <input name="schedule" class="custom-control-input" id="weekend" type="radio" value="Weekend" required>
              <label class="custom-control-label" for="weekend">Weekend</label> 
            </div>
            <div class="custom-control custom-radio mb-4">
              <input name="schedule" class="custom-control-input" id="weekdays" type="radio" value="Weekdays" required>
              <label class="custom-control-label" for="weekdays">Weekdays</label>
            </div>
         </div>
       </div>
       <div class="col-lg-7">
        <br><br>
         <button type="submit" class="btn btn-icon btn-3 btn-primary right btn-submit" type="button">
           <span class="btn-inner--icon"><i class="ni ni-send" id="subIcon"></i></span>
           <span class="btn-inner--text">Submit Registration</span>
         </button>
      </div>
    </div>
  </div>