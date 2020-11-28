

<body class="bg-dark">

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header" style="text-align: center;">Admin Login</div>
	   <?php  if($this->session->flashdata('message')){ echo $this->session->flashdata('message'); } ?>

      <div class="card-body"> 
        <form method="post" action="">
          <div class="form-group">
            <div class="form-label-group">
              <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" value="<?=set_value('email')?>" required="required" autofocus="autofocus">
              <label for="inputEmail">Email address</label>
            </div>
			  <div class="error"> <?=form_error('email')?> </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" value="<?=set_value('password')?>" required="required">
              <label for="inputPassword">Password</label>
            </div>
			
			<div class="error"> <?=form_error('password')?> </div>
          </div>

		  <input type="submit"class="btn btn-primary btn-block" value="Login" >
         
        </form>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?=base_url()?>asset/admin/vendor/jquery/jquery.min.js"></script>
  <script src="<?=base_url()?>asset/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?=base_url()?>asset/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
