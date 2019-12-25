

<div class="site-section bg-light" style="padding: 20px 0px;">
  <div class="container">
    <div class="row">

      <div class="col-md-6 offset-2 col-lg-8 mb-5 p-5 bg-white">

<?php  if($this->session->flashdata('message')){ echo "<center>".$this->session->flashdata('message')."</center>"; } ?>

        <center><div class="btn-group" role="group" aria-label="Basic example">
          <button type="button" id="employee-button" class="btn btn-success">Register as Employee</button>
          <button type="button" id="employer-button" class="btn btn-info">Register as Employer</button>

        </div> </center>         
        <form  action="<?=base_url()?>Register/employee" method="post" class="p-5 bg-white employee-form">
          <h3 class="text-center">Register as Employee</h3>

          <div class="row form-group">

            <div class="col-md-12">
              <label class="font-weight-bold" for="email" type="email" placeholder="Email Address" value="<?=set_value('email')?>" >Email</label>
              <input type="email" id="email" name="email"  class="form-control" placeholder="Email Address" required=" ">
            </div>
          </div>
          <div class="error" style="color: red;"><?=form_error('email')?></div>

          <div class="row form-group">
            <div class="col-md-12 mb-3 mb-md-0">
              <label class="font-weight-bold" for="phone">Password</label>
              <input class="form-control" name="password" type="password" placeholder="Password" value="<?=set_value('password')?>" required=" ">
            </div>
          </div>

          <div class="row form-group">
            <div class="col-md-12">
              <input type="submit" value="Submit" class="btn btn-primary pill px-4 py-2">
            </div>
          </div>
        </form>

        <form  action="<?=base_url()?>Register/employer" method="post" class="p-5 bg-white employer-form">
          <h3 class="text-center">Register as Employer</h3>
          <div class="row form-group">
            <div class="col-md-12">
              <label class="font-weight-bold" for="email" type="email" placeholder="Email Address" value="<?=set_value('email')?>" required=" ">Email</label>
              <input type="email" id="email" class="form-control" placeholder="Email Address"  name="email">
            </div>
          </div>
          <div class="error" style="color: red;"><?=form_error('email')?></div>
          <div class="row form-group">
            <div class="col-md-12 mb-3 mb-md-0">
              <label class="font-weight-bold" for="phone">Password</label>
              <input class="form-control" name="password" type="password" placeholder="Password" value="<?=set_value('password')?>" required=" ">
            </div>
          </div>
          <div class="row form-group">
            <div class="col-md-12">
              <input type="submit" value="Submit" class="btn btn-primary pill px-4 py-2">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<style>
  .employer-form{
    display: none;
  }
  .show-form{
    display: block;
  }

  .hide-form{
    display: none;
  }
</style>
