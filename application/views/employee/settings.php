<?php echo $this->session->flashdata('message');  ?>  
    
    <div class="site-section bg-light">
      <div class="container">
        <div class="row">
       
          <div class="col-md-12 col-lg-7 mb-5">
          
            <form action="<?php echo base_url()?>Employee/profile_setting" method="post" class="p-5 bg-white" enctype="multipart/form-data">
              <h3 class="h5 text-black mb-3">Update Profile</h3>
              <hr>
              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname">Name</label>
                  <input type="text" id="fullname" class="form-control" placeholder="Name" value="<?php if(!empty($employee[0]['name'])){ echo $employee[0]['name']; } ?>" name="name" required >
                </div>
              </div>
              <div class="error"><?=form_error('name')?></div>

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="font-weight-bold" for="email">CV</label>
                  <input type="file" id="email" class="form-control" placeholder="Upload your CV" value="<?=set_value('cv')?>" name="cv">
                </div>
              </div>
              <div class="error"><?=form_error('cv')?></div>

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="phone">Address</label>
                  <input type="text" id="address" class="form-control" placeholder="Address" value="<?php if(!empty($employee[0]['address'])){ echo $employee[0]['address']; } ?>" name="address" required>
                </div>
              </div>
              <div class="error"><?=form_error('address')?></div>


              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="phone">Mobile Number</label>
                  <input type="text" id="address" class="form-control" placeholder="Enter your mobile number" value="<?php if(!empty($employee[0]['number'])){ echo $employee[0]['number']; } ?>" name="number" required>
                </div>
              </div>
              <div class="error"><?=form_error('number')?></div>



              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="Update" class="btn btn-primary pill px-4 py-2">
                </div>
              </div>
            </form>
          </div>

          <div class="col-lg-5">
            <div class="p-4 mb-3 bg-white">
            <form action="<?php echo base_url()?>Employee/personal_info_update/<?php echo $this->session->userdata('userid'); ?>" method="post" class="p-5 bg-white">
              <h3 class="h5 text-black mb-3">Update login info</h3>
              <hr>

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="font-weight-bold" for="email">Email</label>
                  <input type="email" id="email" class="form-control" placeholder="Enter your Email Address" value="<?php if(!empty($employee[0]['email'])){ echo $employee[0]['email']; } ?>" name="email" required>
                </div>
              </div>
              <div class="error"><?=form_error('email')?></div>

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="phone">Password</label>
                  <input type="password" id="phone" class="form-control" placeholder="Enter new Password" value="<?php if(!empty($employee[0]['password'])){ echo $employee[0]['password']; } ?>" name="password" required>
                </div>
              </div>
              <div class="error"><?=form_error('password')?></div>

              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="Update" class="btn btn-primary pill px-4 py-2">
                </div>
              </div>
            </form>
            </div>
          
          </div>
        </div>
      </div>
    </div>
