

<div id="content-wrapper">

  <div class="container-fluid">

    <!-- DataTables Example -->
    <div class="card mb-3">
      <div class="card-header">
        <i class="fas fa-table"></i>
      Employer List</div>
      <div class="card-body">
        <div class="table-responsive">

          <?php  if($this->session->flashdata('message')){

           echo $this->session->flashdata('message');
         }

         ?>
         <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Email</th>
              <th>Address</th>
            </tr>
          </thead>
          <tbody>

            <?php  $count=1; foreach($users as $user){ ?>
            <tr>
              <td><?=$count?></td>
              <td><?=$user['company_name']?></td>
              <td><?=$user['email']?></td>
              <td><?=$user['company_address']?></td>
              
            </tr>
          </div>

          <?php $count++;   }?>

        </tbody>
      </table>
    </div>
  </div>

</div>


</div>
<!-- /.container-fluid -->


