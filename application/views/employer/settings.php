<?php echo $this->session->flashdata('message');  ?>  
    
    <div class="site-section bg-light">
      <div class="container">
        <div class="row">
       
          <div class="col-md-12 col-lg-7 mb-5">
          
            <form action="<?php echo base_url()?>Employer" method="post" class="p-5 bg-white">
              <h3 class="h5 text-black mb-3">Company Info</h3>
              <hr>
              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname">Company Name</label>
                  <input type="text" id="fullname" class="form-control" placeholder="Company Name" value="<?=set_value('company_name')?>" name="company_name" required >
                </div>
              </div>
              <div class="error"><?=form_error('company_name')?></div>

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="font-weight-bold" for="email">Company Logo</label>
                  <input type="file" id="email" class="form-control" placeholder="Email Address" value="<?=set_value('company_logo')?>" name="company_logo" required>
                </div>
              </div>
              <div class="error"><?=form_error('company_logo')?></div>

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="phone">Company Address</label>
                  <input type="text" id="company_address" class="form-control" placeholder="Company Address" value="<?=set_value('company_address')?>" name="company_address" required>
                </div>
              </div>
              <div class="error"><?=form_error('company_address')?></div>


              <div class="row form-group">
                <div class="col-md-12">
                  <label class="font-weight-bold" for="message">Company Description</label> 
                  <textarea name="company_description" id="company_description" cols="30" rows="5" class="form-control" placeholder="Say hello to us" required></textarea>
                </div>
              </div>
              <div class="error"><?=form_error('company_description')?></div>


              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="Send Message" class="btn btn-primary pill px-4 py-2">
                </div>
              </div>
            </form>
          </div>

          <div class="col-lg-5">
            <div class="p-4 mb-3 bg-white">
            <form action="<?php echo base_url()?>Contact" method="post" class="p-5 bg-white">
              <h3 class="h5 text-black mb-3">Personal Info</h3>
              <hr>
              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname">Full Name</label>
                  <input type="text" id="fullname" class="form-control" placeholder="Full Name" value="<?=set_value('name')?>" name="name" required >
                </div>
              </div>
              <div class="error"><?=form_error('name')?></div>

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="font-weight-bold" for="email">Email</label>
                  <input type="email" id="email" class="form-control" placeholder="Email Address" value="<?=set_value('email')?>" name="email" required>
                </div>
              </div>
              <div class="error"><?=form_error('email')?></div>

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="phone">Phone</label>
                  <input type="text" id="phone" class="form-control" placeholder="Phone" value="<?=set_value('number')?>" name="number" required>
                </div>
              </div>
              <div class="error"><?=form_error('number')?></div>

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="font-weight-bold" for="message">Message</label> 
                  <textarea name="message" id="message" cols="30" rows="5" class="form-control" placeholder="Say hello to us" required></textarea>
                </div>
              </div>
              <div class="error"><?=form_error('message')?></div>

              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="Send Message" class="btn btn-primary pill px-4 py-2">
                </div>
              </div>
            </form>
            </div>
          
          </div>
        </div>
      </div>
    </div>
