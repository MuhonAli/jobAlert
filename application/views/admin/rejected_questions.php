

<div id="content-wrapper">

  <div class="container-fluid">

    <!-- DataTables Example -->
    <div class="card mb-3">
      <div class="card-header">
        <i class="fas fa-table"></i>
      question List</div>
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
              <th>Seen</th>
              <th>Answer</th>
              <th>Details</th>
              
            </tr>
          </thead>
          <tbody>

            <?php  $count=1; foreach($questions as $question){ ?>
            <tr>
              <td><?=$count?></td>
              <td><?=$question['title']?></td>
              <td><?=$question['seen']?></td>
              <td><?=$question['answer']?></td>
               <td><a href="<?=base_url()?>Admin/question_details/<?=$question['id']?>" type="button" class="btn btn-info">Details</a></td>
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


