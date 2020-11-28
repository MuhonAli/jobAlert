<?php echo $this->session->flashdata('message');  ?>  
<div class="unit-5 overlay" style="background-image: url('<?=base_url()?>asset/images/hero_2.jpg');">
  <div class="container text-center">
    <h2 class="mb-0"><?=$jobs[0]['title']?></h2>
  </div>
</div>

<div class="site-section bg-light">
  <div class="container">
    <div class="row">

      <div class="col-md-12 col-lg-8 mb-5">
        <?php if ($jobs[0]['user_id'] == $this->session->userdata('userid')) { ?>
        <div class=" col-md-12 pull-right">

          <span style="float: right;" class="btn btn-primary  py-2 px-4"><a href="<?=base_url()?>Employer/delete_job/<?=$jobs[0]['id']?>" style="color: white;">Delete</a></span>

          <span style="float: right;margin-left: 10px;margin-right: 10px;" class="btn btn-primary  py-2 px-4"><a href="<?=base_url()?>Employer/applicants/<?=$jobs[0]['id']?>" style="color: white;">Applicants</a></span>

          <span style="float: right;" class="btn btn-primary  py-2 px-4"><a href="<?=base_url()?>Employer/edit_job/<?=$jobs[0]['id']?>" style="color: white;">Edit</a></span>
        </div> <br><br>
      <?php } ?>
        <div class="p-5 bg-white">


          <div class="mb-4 mb-md-5 mr-5">
           <div class="job-post-item-header d-flex align-items-center">
             <h2 class="mr-3 text-black h4"><?=$jobs[0]['title']?></h2>

             <div class="badge-wrap">
              <span class="border border-warning text-warning py-2 px-4 rounded"><?=$jobs[0]['type']?></span>

            </div>
          </div>

        </div>

        <p><?=$jobs[0]['description']?></p>
        <p><?=$jobs[0]['requirements']?></p>
        <p><?=$jobs[0]['location']?></p>
        <p><?=$jobs[0]['salary_range']?>BDT</p>
        <?php if (($jobs[0]['user_id'] != $this->session->userdata('userid')) && ($this->session->userdata('user_type') !='employer')) { ?>
          <p class="mt-5"><a href="<?=base_url()?>Employee/apply_job/<?=$jobs[0]['id']?>" class="btn btn-primary  py-2 px-4">Apply Job</a></p>
        <?php } ?>
      </div>
    </div>

    <div class="col-lg-4">


      <div class="p-4 mb-3 bg-white">
        <h3 class="h5 text-black mb-3">Company Details</h3>
        <p><strong><?=$jobs[0]['company_name']?></strong></p>
        <p><?=$jobs[0]['company_description']?></p>
      </div>
    </div>
  </div>
</div>
</div>

