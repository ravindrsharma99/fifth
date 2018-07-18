<?php //print_r($trip);die; ?>
<div class="bhoechie-tab-content">
  <div class="container1">
      <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="span12 history_tabs remove_margin">
              <a href="javascript:void(0)" class="btn active">Trip</a>
              <a href="<?php echo base_url(); ?>index.php/Booking/offer" class="btn active">Offers</a>
            </div>
            <div class="">
              <div class="tab-pane" id="Trip">
                  <div class="inner_imges" id="mapp" style="height: 250px; width: 100%">
                   <!--  <img src="<?php echo base_url(); ?>assests/images/login_usser.png" alt="#"> -->
                    <?php if($trip == ""){ ?>
                        <img src="<?php echo base_url(); ?>assests/images/login_usser.png" alt="#">
                    <?php }else{ 
                      foreach($trip as $msg){ 
                      $type = $msg->messageNotification; 
                      $user_type = $msg->user_type;
                      $id = base64_encode($msg->req_id);
                      if($type == "cancelled" && $user_type == 0){ ?>
                      
                      <div class="col-xs-12 col-sm-6 col-md-6">
                          <div class="old_welt_history">
                              <div class="old_welt_history_content">
                                 <!--  <h4>Amount added from referral code.</h4> -->
                                 <div class="DAte_penal">
                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                          <h4 class="pull-left">Task #<?php echo $msg->req_id; ?></h4>
                                      </div>
                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                          <h5 class="pull-right">
                                          <!-- <?php
                                            $date = substr($msg->date_created,0,10);
                                            $time1 = substr($msg->date_created,-8,-2); 
                                            $newDate = date("d-m-Y", strtotime($date));
                                            $time = date("g:i a", strtotime($time1)); 
                                            echo $newDate ." AT ". $time; 
                                          ?>  -->  
                                          <?php $msg->date_created; ?>                                          
                                          </h5>
                                      </div>
                                 </div>
                               <div class="row1">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <a href="<?php echo base_url(); ?>Booking/info/<?php echo $id; ?>"><h3 class="OFFer_DEtial">Your task cancelled by service provider.</h3></a>
                                    </div>
                               </div>
       
                              </div>
                          </div>
                      </div>

                    <?php }elseif($type == "completed" && $user_type == 0){ ?>

                      <div class="col-xs-12 col-sm-6 col-md-6">
                          <div class="old_welt_history">
                              <div class="old_welt_history_content">
                                 <!--  <h4>Amount added from referral code.</h4> -->
                                 <div class="DAte_penal">
                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                          <h4 class="pull-left">Task #<?php echo $msg->req_id; ?></h4>
                                      </div>
                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                          <h5 class="pull-right"><?php echo $msg->date_created; ?></h5>
                                      </div>
                                 </div>
                               <div class="row1">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <a href="<?php echo base_url(); ?>Booking/info/<?php echo $id; ?>"><h3 class="OFFer_DEtial">Your task completed by service provider.</h3></a>
                                    </div>
                               </div>
       
                              </div>
                          </div>
                      </div>

                    <?php }elseif($type == "quote" && $user_type == 0){ ?>

                      <div class="col-xs-12 col-sm-6 col-md-6">
                          <div class="old_welt_history">
                              <div class="old_welt_history_content">
                                 <!--  <h4>Amount added from referral code.</h4> -->
                                 <div class="DAte_penal">
                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                          <h4 class="pull-left">Task #<?php echo $msg->req_id; ?></h4>
                                      </div>
                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                          <h5 class="pull-right"><?php echo $msg->date_created; ?></h5>
                                      </div>
                                 </div>
                               <div class="row1">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <a href="<?php echo base_url(); ?>Booking/info/<?php echo $id; ?>"><h3 class="OFFer_DEtial">Your get a quote on your task by service provider.</h3></a>
                                    </div>
                               </div>
       
                              </div>
                          </div>
                      </div>

                    <?php }elseif($type == "started" && $user_type == 0){ ?>

                      <div class="col-xs-12 col-sm-6 col-md-6">
                          <div class="old_welt_history">
                              <div class="old_welt_history_content">
                                 <!--  <h4>Amount added from referral code.</h4> -->
                                 <div class="DAte_penal">
                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                          <h4 class="pull-left">Task #<?php echo $msg->req_id; ?></h4>
                                      </div>
                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                          <h5 class="pull-right"><?php echo $msg->date_created; ?></h5>
                                      </div>
                                 </div>
                               <div class="row1">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <a href="<?php echo base_url(); ?>Booking/info/<?php echo $id; ?>"><h3 class="OFFer_DEtial">Your task started by service provider.</h3></a>
                                    </div>
                               </div>
       
                              </div>
                          </div>
                      </div>
                    <?php }elseif($type == "accepted" && $user_type == 0){ ?>
                      <div class="col-xs-12 col-sm-6 col-md-6">
                          <div class="old_welt_history">
                              <div class="old_welt_history_content">
                                 <!--  <h4>Amount added from referral code.</h4> -->
                                 <div class="DAte_penal">
                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                          <h4 class="pull-left">Task #<?php echo $msg->req_id; ?></h4>
                                      </div>
                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                          <h5 class="pull-right"><?php echo $msg->date_created; ?></h5>
                                      </div>
                                 </div>
                               <div class="row1">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <a href="<?php echo base_url(); ?>Booking/info/<?php echo $id; ?>"><h3 class="OFFer_DEtial">Your task accepted by service provider.</h3></a>
                                    </div>
                               </div>
       
                              </div>
                          </div>
                      </div>
                    <?php }else{}}} ?>
              </div>


                      <!-- <div class="old_welt_history">
                          <div class="old_welt_history_content"> -->
                             <!--  <h4>Amount added from referral code.</h4> -->
                             <!-- <div class="DAte_penal">
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                      <h4 class="pull-left">Date</h4>
                                  </div>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                      <h5 class="pull-right"><?php echo $msg->date_created; ?></h5>
                                  </div>
                             </div> -->

                             <!-- <div class="row1">
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                      <h4 class="pull-left">You can get</h4>
                                  </div>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                      <h5 class="pull-right" style="color:#f00;">$<?php echo $msg->value; ?> % discount </h5>
                                  </div>
                             </div>

                             <div class="row1">
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                      <h4 class="pull-left">On new booking using</h4>
                                  </div>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                      <h5 class="pull-right"><?php echo $msg->promo_code; ?></h5>
                                  </div>
                             </div>         
                          </div>
                      </div>

 -->
                
            </div>
                <!-- <div class="tab-pane" id="Offers">Activated Content</div> -->
            </div>
        </div>
      </div>
  </div>
</div>

























