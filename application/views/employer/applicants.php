
<div class="site-section bg-light">
  <div class="container">
    <div class="row">
      <div class="col-md-12 mb-5 mb-md-0" data-aos="fade-up" data-aos-delay="100">
        <h2 class="mb-5 h3 text-center">All applicants</h2>
        <div class="rounded border applicants-wrap">

          <?php
          if ($applicants) {
           foreach ($applicants as $applicant) { ?>
             <div class="applicant-details h-100">
              <div class="p-3 align-self-center">

                <div class="d-block d-lg-flex">
                  <div class="mr-3"><span class="icon-suitcase mr-1"></span>Name : <?=$applicant['name']?> |</div>
                  <div class="mr-3"><span class="icon-suitcase mr-1"></span>Email : <?=$applicant['email']?> |</div>
                  <div class="mr-3"><span class="icon-room mr-1"></span>Address : <?=$applicant['address']?> |</div>
                  <div><span class="icon-money mr-1"></span>Mobile : <?=$applicant['number']?> | </div>

                  <?php if (!empty($applicant['cv'])) { ?>
                    <div> <span  class="icon-money mr-1"></span><a style="margin-left: 30px;" class="" target="_blank" href="<?=base_url()?>images/<?=$applicant['cv']?>"> view cv</a></div>
                  <?php } ?>

                </div>
              </div>
            </div>
          <?php } } else{
            echo "<h2 class='text-center' >No applicant Found!</h2>";
          } ?>
        </div>

      </div>

    </div>

  </div>

  <br><br>

</div>

