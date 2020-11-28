<?php echo $this->session->flashdata('message');  ?>  
<?php if ($employee) { ?>
<div class="unit-5 overlay" style="background-image: url('<?=base_url()?>asset/images/hero_2.jpg');">
  <div class="container text-center">
    <h2 class="mb-0"><?=$employee[0]['name']?></h2>
  </div>
</div>

<div class="site-section bg-light">
  <div class="container">
    <div class="row">

      <div class="col-md-12 col-lg-8 offset-2 mb-5">
        <?php if ($employee[0]['user_id'] == $this->session->userdata('userid')) { ?>
        <div class=" col-md-12 pull-right">


          <span style="float: right;" class="btn btn-primary  py-2 px-4"><a href="<?=base_url()?>Employee/profile_setting" style="color: white;">Update Profile</a></span>
        </div> <br><br>
      <?php } ?>
        <div class="p-5 bg-white">


          <div class="mb-4 mb-md-5 mr-5">
           <div class="job-post-item-header">
             <h2 class="mr-3 text-black h4">Name : <?=$employee[0]['name']?></h2><br>
             <h2 class="mr-3 text-black h4">Email : <?=$employee[0]['email']?></h2><br>
             <h2 class="mr-3 text-black h4">Number : <?=$employee[0]['number']?></h2><br>
             <h2 class="mr-3 text-black h4">Address : <?=$employee[0]['address']?></h2><br>
             <h2 class="mr-3 text-black h4">CV : <a href="<?=base_url()?>images/<?=$employee[0]['cv']?>" target="_blank">View CV</a> </h2>
          </div>

        </div>

      </div>
    </div>

  </div>
</div>
</div>
<?php } else{ ?>
<div class="unit-5 overlay" style="background-image: url('<?=base_url()?>asset/images/hero_2.jpg');">
  <div class="container text-center">
    <h2 class="mb-0">create your profile</h2>
  </div>
</div>

<div class="bg-light col-md-12" style="padding: 7em 0;">
  <div class="container">
    <div class="row">
      <h1 class="text-center"><a href="<?=base_url()?>Employee/profile_setting" > Please update your profile by clicking here</a></h1>
      </div>
    </div>
  </div>
  <?php } ?>

