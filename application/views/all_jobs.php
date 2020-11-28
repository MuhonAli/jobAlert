
    <div class="site-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-5 mb-md-0" data-aos="fade-up" data-aos-delay="100">
            <h2 class="mb-5 h3 text-center">All Jobs</h2>
            <div class="rounded border jobs-wrap">

        <?php
        if ($jobs) {
         foreach ($jobs as $job) {  ?>
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
                  <div class="p-3">
                    <span class="text-info p-2 rounded border border-info">Full Time</span>
                  </div>
                </div>  
              </a>
  <?php } } else{
    echo "<h2 class='text-center' >No Job Found!</h2>";
  } ?>

            

            </div>

          </div>

        </div>


      </div>

      <br><br>
<div class="container col-md-4 offset-4">

<?php echo $this->pagination->create_links(); ?>

</div>
    </div>

