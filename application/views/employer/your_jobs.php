<?php echo $this->session->flashdata('message');  ?>  
    <div class="site-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-5 mb-md-0" data-aos="fade-up" data-aos-delay="100">
            <h2 class="mb-5 h3 text-center">Your Posted
             Jobs</h2>
            <div class="rounded border jobs-wrap">
            <?php if ($jobs) {?>
        <?php foreach ($jobs as $job) {  ?>
              <a href="<?=base_url()?>Jobs/job_details/<?=$job['id']?>" class="job-item d-block d-md-flex align-items-center  border-bottom fulltime">
                <div class="company-logo blank-logo text-center text-md-left pl-3">
                  <img src="<?=base_url()?>images/<?=$job['company_logo']?>" alt="Image" class="img-fluid mx-auto">
                </div>
                <div class="job-details h-100">
                  <div class="p-3 align-self-center">
                    <h3><?=$job['title']?></h3>
                    <div class="d-block d-lg-flex">
                      <div class="mr-3"><span class="icon-suitcase mr-1"></span> <?=$job['company_name']?></div>
                      <div class="mr-3"><span class="icon-room mr-1"></span> <?=$job['location']?></div>
                      <div><span class="icon-money mr-1"></span> <?=$job['salary_range']?></div>
                    </div>
                  </div>
                </div>
                <div class="job-category align-self-center">
                 <ul style="list-style: none;display: inline;white-space:nowrap; ">
                   <li> View Details</li>
                 </ul>
                </div>  
              </a>
              <style type="text/css">
                li{
                  display: inline;
                }
              </style>
  <?php } } else{ ?>

    <h1 class="text-center">You did not posted any job yet!</h1>
<?php } ?>
            

            </div>

          </div>

        </div>


      </div>

    </div>

