
<!-- The Login Modal (loginModalJobSeeker) -->
<div class="modal loginModal" id="jobApplyModal">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-body text-center">
        <div>
          <img src="{{ asset('public/img/akij-group-logo.png') }}" alt="" style="width: 50px">
        </div>
        <h5 class="title">AKIJ GROUP</h5>
        <p class="text-muted">
          CAREER
        </p>

        <div class="login-title">
          Apply Job - Test Job
        </div>

        <div class="row justify-content-center">
          <div class="col-md-12 mt-2">
            <form action="" method="post" id="jobApplyForm">

              <div class="form-group row mt-2">
                <label for="expected_salary" class="col-4 col-form-label">
                  Your Expected Salary <span class="text-danger">*</span>
                </label>
                <div class="col-6">
                  <input type="text" class="form-control" aria-label="" placeholder="Your Expected Salary">
                </div>
                <div class="col-2 font-12 text-info">(Monthly)</div>
              </div>

              <div class="form-group row mt-2">
                <label for="cv" class="col-4 col-form-label pointer">
                  Curriculam Vitae  <span class="font-10 text-info">(optional)</span>
                </label>
                <div class="col-6">
                  <input type="file" class="form-control" aria-label="cv" placeholder="Your Curriculam Vitae" id="cv">
                  <small class="font-12 text-danger">
                   Upload your curriculam vitae, Max size: 2MB (only pdf)
                 </small>
               </div>
               <div class="col-2">
                <label for="use_profile_cv">
                  <small class="font-12 text-info pointer">Use Profile CV</small>
                </label>
                <br>
                <input type="checkbox" name="use_profile_cv" id="use_profile_cv">
              </div>
            </div>


            <div class="form-group row mt-2">
              <label for="simple-editor" class="col-4 col-form-label pointer">
                Cover Letter <span class="font-10 text-info">(optional)</span>
              </label>
              <div class="col-6">
                <textarea name="cover_letter" id="simple-editor" rows="3" class="form-control"></textarea>
              </div>

            </div>

            <div>
              <div class="form-check mb-2">
                <input class="form-check-input" type="checkbox" id="agree-terms-signup">
                <label class="form-check-label mt-1 font-12 text-info" for="agree-terms-signup">
                  I agree to the terms and conditions
                </label>
              </div>
              <button class="btn btn-primary" type="submit">
               <i class="fa fa-check"></i> Submit
             </button>

             <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
           </div>


         </form>
       </div>
     </div>

   </div>

 </div>
</div>
</div> <!-- End Job Seeker Login -->