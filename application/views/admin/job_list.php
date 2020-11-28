

<div id="content-wrapper">

  <div class="container-fluid">

    <!-- DataTables Example -->
    <div class="card mb-3">
      <div class="card-header">
        <i class="fas fa-table"></i>
      job List</div>
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
              <th>Title</th>
              <th>Category</th>
              <th>Salary</th>
              <th>Company</th>
              <th>Details</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>

            <?php  $count=1; foreach($jobs as $job){ ?>
            <tr>
              <td><?=$count?></td>
              <td><?=$job['title']?></td>
              <td><?=$job['category_name']?></td>
              <td><?=$job['salary_range']?></td>
              <td><?=$job['company_name']?></td>
               <td><a target="_blank" href="<?=base_url()?>jobs/job_details/<?=$job['id']?>" type="button" class="btn btn-info">Details</a></td>

              <?php if ($job['approved']==0) { ?>
             <td><a href="<?=base_url()?>jobs/job_approve/<?=$job['id']?>" type="button" class="btn btn-primary">Approve</a></td>
              <?php } else { ?> 
             <td><a href="<?=base_url()?>jobs/job_reject/<?=$job['id']?>" type="button" class="btn btn-danger">Reject</a></td>
                <?php } ?>

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


