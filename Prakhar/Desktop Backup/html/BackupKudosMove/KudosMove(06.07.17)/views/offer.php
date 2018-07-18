

<div class="bhoechie-tab-content">
  <div class="container1">
      <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="span12 history_tabs remove_margin">
              <a href="<?php echo base_url(); ?>index.php/Booking/notifications" class="btn">Trip</a>
              <a href="javascript:void(0)" class="btn active" data-toggle="tab" aria-pressed="true">Offers</a>
            </div>
            <div class="">
                <div class="tab-pane" id="Offers">
                  <?php foreach($offers as $msg){ $type = $msg->type; if($type == 0){ ?>

                  <div class="col-xs-12 col-sm-6 col-md-6">
                      <div class="old_welt_history">
                          <div class="old_welt_history_content">
                             <!--  <h4>Amount added from referral code.</h4> -->
                             <div class="DAte_penal">
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                      <h4 class="pull-left">Date & Time</h4>
                                  </div>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                      <h5 class="pull-right">
                                         <?php 
                                                $time = $msg->date_created ;
                                                $utc_ts = strtotime($time);
                                                $newDate = date("d-m-Y", strtotime($time));
                                                $time = date("g:i A", strtotime($time));
                                                echo $newDate. " at " .$time;
                                                ?>
</h5>
                                  </div>
                             </div>

                             <div class="row1">
                                  <div class="col-md-12 col-sm-12 col-xs-12">
                                      <h3 class="OFFer_DEtial">You can get<span class="MAIN_OFFER"> $<?php echo $msg->value; ?> discount</span> On new booking using<span class="MAIN_OFFER"> <?php echo $msg->promo_code; ?></span> </h3>
                                  </div>
                             </div>
     
                          </div>
                      </div>
                  </div>
                <!-- 

                    <div>
                        <h4>You can get <p style='color:blue;'>$<?php echo $msg->value; ?> discount </p>
                         on new booking using <p style='color:blue;'><?php echo $msg->promo_code; ?></p></h4>
                        <p><?php echo $msg->date_created; ?></p>
                    </div> -->
                  <?php }else{ ?>

                      <div class="col-xs-12 col-sm-6 col-md-6">
                          <div class="old_welt_history">
                              <div class="old_welt_history_content">
                                 <!--  <h4>Amount added from referral code.</h4> -->
                                 <div class="DAte_penal">
                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                          <h4 class="pull-left">Date & Time</h4>
                                      </div>
                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                          <h5 class="pull-right">     <?php 
                                                $time = $msg->date_created ;
                                                $utc_ts = strtotime($time);
                                                $newDate = date("d-m-Y", strtotime($time));
                                                $time = date("g:i A", strtotime($time));
                                                echo $newDate. " at " .$time;
                                                ?></h5>
                                      </div>
                                 </div>


                               <div class="row1">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <h3 class="OFFer_DEtial">You can get<span class="MAIN_OFFER"> <?php echo $msg->value; ?> % discount</span> On new booking using<span class="MAIN_OFFER"> <?php echo $msg->promo_code; ?></span> </h3>
                                    </div>
                               </div>
       
                              </div>
                          </div>
                      </div>

                  <!--                     
                  <div>
                        <h4>You can get <p style='color:blue;'><?php echo $msg->value; ?>% discount </p> on new booking using <p style='color:blue;'><?php echo $msg->promo_code; ?></p></h4>
                        <p><?php echo $msg->date_created; ?></p>
                  </div> -->

                  <?php } } ?>
                </div>
            </div>
        </div>
      </div>
  </div>
</div>