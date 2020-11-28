
<div id="content-wrapper">

  <div class=" col-md-8 container-fluid">

    				<?php if($this->session->flashdata('message')){
    					echo $this->session->flashdata('message');
    				}?>

                <h4>Question :</h4>
    				<h1> <i class="icofont icofont-hand-right"></i> <?=$question[0]['title']?> </h1>

    				<br /> 

    				<p> <?=$question[0]['description']?> </p>

    				<br /> 

    				<br /> 
    				<?php if (!empty($question[0]['code'])) { ?>
    					<xmp class="jumbotron"><?=strip_tags($question[0]['code']);?></xmp>
    				<?php } ?>


    				<p><i>Asked by : <?=$question[0]['username']?> on: <?php echo(date("d M Y",$question[0]['date'])) ?> </i></p>
    				<br>
    			</div>




    			<div class="container col-md-8">

    				<div class="Comment "> 

    					<?php   

    					if(!empty($answers)){ ?>
                <h4>ANSWERS :</h4>

    					<?php	foreach($answers as $row){  
    							?>
    							<div class="comment_area jumbotron"> 
    								<p><strong> <i class="fa fa-comment" aria-hidden="true"></i> <?=$row['username']?> </strong><br> <?=$row['answer']?></p>
    								<br>

                                    <div class="rating" id="rating2">

                                        <?php  $get_answer_id=  $this->db->select('*')->from('vote')->where('answer_id',$row['id'])->where('user_id',$this->session->userdata('userid'))->get()->result_array(); ?>

                                        <?php
                                        if ($get_answer_id) {

                                           if ($get_answer_id[0]['answer_id']==$this->session->userdata('userid') && $get_answer_id[0]['like_answer']==1) { ?>

                                             <a href="" onclick="return false;" disabled style="color:black;">Liked</a>
                                         <?php }else{ ?>
                                          <a href="">Like</a>
                                      <?php } } else{?>
                                       <a href="">Like</a> <?php }?>
                                       <span class="likes"><?php echo $like=  $this->db->select('*')->from('vote')->where('answer_id',$row['id'])->where('like_answer',1)->get()->num_rows(); ?></span>

                                       <?php
                                       if ($get_answer_id) {
                                        if ($get_answer_id[0]['answer_id']==$this->session->userdata('userid') && $get_answer_id[0]['dislike_answer']==1) { ?>

                                         <a href="" onclick="return false;" disabled style="color:black;">Disliked</a>
                                     <?php }else{ ?>
                                      <a href="">Dislike</a>
                                  <?php } } else{ ?>
                                    <a href="" onclick="return false;">Dislike</a>
                                <?php } ?>

                                <span class="likes"><?php echo $dislike=  $this->db->select('*')->from('vote')->where('answer_id',$row['id'])->where('dislike_answer',1)->get()->num_rows(); ?></span>
                            </div>

                        </div>
                        <br />
                        <?php  

                    }
                }

                ?>


            </div>
</div>
</div>
