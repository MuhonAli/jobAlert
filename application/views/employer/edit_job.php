<?php echo $this->session->flashdata('message');  ?>  
    
    <div class="site-section bg-light">
      <div class="container">
        <div class="row">
       
          <div class="col-md-12 col-lg-10 offset-1 mb-5">
          
            <form action="<?php echo base_url()?>Employer/edit_job/<?=$job[0]['id']?>" method="post" class="p-5 bg-white" enctype="multipart/form-data">
              <h2 class="text-center">Edit Job</h2>
              <hr>
              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold">Job Title</label>
                  <input type="text" class="form-control" placeholder="Enter Job Title" value="<?=$job[0]['title']?>" name="title" required >
                </div>
              </div>
              <div class="error"><?=form_error('title')?></div>

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="font-weight-bold">Job Description</label>
                  <input type="text" class="form-control" placeholder="Enter Job Description" value="<?=$job[0]['description']?>" name="description">
                </div>
              </div>
              <div class="error"><?=form_error('description')?></div>

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="phone">Job Requirements</label>
                  <input type="text" class="form-control" placeholder="Enter Job Requirements" value="<?=$job[0]['requirements']?>" name="requirements" required>
                </div>
              </div>
              <div class="error"><?=form_error('requirements')?></div>

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="phone">Job Type</label>
                  <input type="text" class="form-control" placeholder="Enter Job Type" value="<?=$job[0]['type']?>" name="type" required>
                </div>
              </div>
              <div class="error"><?=form_error('type')?></div>


              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="phone">Salary Range</label>
                  <input type="text" class="form-control" placeholder="Enter Salary Range" value="<?=$job[0]['salary_range']?>" name="salary_range" required>
                </div>
              </div>
        <div class="error"><?=form_error('salary_range')?></div>


              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="phone">Job Location</label>
                  <input type="text" class="form-control" placeholder="Enter Job Location" value="<?=$job[0]['location']?>" name="location" required>
                </div>
              </div>
              <div class="error"><?=form_error('location')?></div>

              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="Update Job" class="btn btn-primary pill px-4 py-2">
                </div>
              </div>
            </form>
          </div>

        </div>
      </div>
    </div>
