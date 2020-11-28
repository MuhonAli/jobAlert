

<div id="content-wrapper">

  <div class="container-fluid">

    <!-- DataTables Example -->
    <div class="card mb-3">
      <div class="card-header">
        <i class="fas fa-table"></i>
      message List</div>
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
              <th>Number</th>
              <th>Message</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody>

            <?php  $count=1; foreach($messages as $message){ ?>
            <tr>
              <td><?=$count?></td>
              <td><?=$message['name']?></td>
              <td><?=$message['email']?></td>
              <td><?=$message['number']?></td>
              <td><?=$message['message']?></td>
               <td><a href="<?=base_url()?>Admin/delete_message/<?=$message['id']?>" type="button" class="btn btn-danger">Delete</a></td>
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


