<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>

<div class="panel_Custom pad_top">
    <div class="col-lg-12 col-sm-12 PADD_REmove">
        <div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
            <div class="btn-group" role="group">
                <button type="button" id="stars" class="btn btn-primary Font_pad" href="#Pending" data-toggle="tab">
                    <!-- <span class="glyphicon glyphicon-star" aria-hidden="true"></span> -->
                    <div class="hidden-xs1">Pending</div>
                </button>
            </div>
            <div class="btn-group" role="group">
                <button type="button" id="favorites" class="btn btn-default Font_pad" href="#Accepted" data-toggle="tab">
                    <!-- <span class="glyphicon glyphicon-heart" aria-hidden="true"></span> -->
                    <div class="hidden-xs1">Accepted</div>
                </button>
            </div>
            <div class="btn-group" role="group"> 
                <button type="button" id="following" class="btn btn-default Font_pad" href="#Completed" data-toggle="tab">
                    <!-- <span class="glyphicon glyphicon-user" aria-hidden="true"></span> -->
                    <div class="hidden-xs1">Completed</div>
                </button>
            </div>


            <div class="btn-group" role="group">
                <button type="button" id="following" class="btn btn-default Font_pad" href="#Cancelled" data-toggle="tab">
                    <!-- <span class="glyphicon glyphicon-user" aria-hidden="true"></span> -->
                    <div class="hidden-xs1">Cancelled</div>
                </button>
            </div>
        </div>




<?php //print_r($activateData);die; ?>
        <div class="well TABS_CUSTOM_CONTAINER">
            <div class="tab-content">
                <div class="tab-pane fade in active" id="Pending">
                    <div class="row">
                        <?php foreach($histData as $his){ 
                            $path_way = base64_decode($his->path_wayPoints); ?>
                        <div class="col-md-6 col-sm-6 col-xs-12 PADD_REmove">
                            <div class="old_welt_history magn_nun">
                                <div class="old_welt_history_content">
                                    <div class="DAte_penal1">
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <h5 class="pull-left"><?php echo $his->date_created ; ?></h5>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <h4 class="pull-right"><?php echo $his->totalprice; ?></h4>
                                        </div>
                                    </div>
                                    <div class="row1">
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <h4 class="pull-left">Task #<?php echo $his->id; ?></h4>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <div class="Activated_PENAL">
                                                <div class="ACtiveted_penl PEnd_COLOR">Pending</div>
                                                <div class="Pending_dot"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="<?php echo base_url(); ?>Booking/info?id=<?php echo $his->id; ?>"><img src="https://maps.googleapis.com/maps/api/staticmap?size=1000x300&markers=icon:http://phphosting.osvin.net/Uber_style/AndroidDots/ic_dot_green.png|color:0x288cd7|shadow:true|<?php echo $his->pickup_lat;?>,<?php echo $his->pickup_long;?>&markers=icon:http://phphosting.osvin.net/Uber_style/AndroidDots/ic_dot_red.png|color:0x288cd7|shadow:true|<?php echo $his->dropOff_lat;?>,<?php echo $his->dropOff_long;?>&path=weight:5%7Ccolor:0x14456a%7Cenc:<?php echo $path_way ; ?>&key=AIzaSyAtYoGDXguJ0LVCuz0Vby2abe1bcYEWjnk"></img>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                
                <div class="tab-pane fade in" id="Accepted">
                    <div class="row">
                        <?php foreach($activateData['book'] as $his1){ 
                            $path_way1 = base64_decode($his1->path_wayPoints); ?>
                        <div class="col-md-6 col-sm-6 col-xs-12 PADD_REmove">
                            <div class="old_welt_history magn_nun">
                                <div class="old_welt_history_content">
                                    <div class="DAte_penal1">
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <h5 class="pull-left">
                                                <?php 
                                                    $newDate = date("d-m-Y", strtotime($his1->booking_date));
                                                    $time = date("g:i a", strtotime($his1->booking_time));
                                                    echo $newDate. " at " .$time;
                                                ?>
                                            </h5>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <h4 class="pull-right"><?php echo "$" .$his1->totalprice; ?></h4>
                                        </div>
                                    </div>
                                    <div class="row1">
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <h4 class="pull-left">Task #<?php echo $his1->id; ?></h4>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <div class="Activated_PENAL">
                                                <div class="ACtiveted_penl ACPT_COLOR">Started</div>
                                                <div class="Accepted_dot"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <a class="margn_nun" href="<?php echo base_url(); ?>Booking/info?id=<?php echo $his1->id; ?>"><img src="https://maps.googleapis.com/maps/api/staticmap?size=1000x300&markers=icon:http://phphosting.osvin.net/Uber_style/AndroidDots/ic_dot_green.png|color:0x288cd7|shadow:true|<?php echo $his1->pickup_lat;?>,<?php echo $his1->pickup_long;?>&markers=icon:http://phphosting.osvin.net/Uber_style/AndroidDots/ic_dot_red.png|color:0x288cd7|shadow:true|<?php echo $his1->dropOff_lat;?>,<?php echo $his1->dropOff_long;?>&path=weight:5%7Ccolor:0x14456a%7Cenc:<?php echo $path_way1 ; ?>&key=AIzaSyAtYoGDXguJ0LVCuz0Vby2abe1bcYEWjnk"></img></a>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>

                <div class="tab-pane fade in" id="Completed">
                    <div class="row">
                        <?php foreach($completeData['book'] as $his2){ 
                            $path_way2 = base64_decode($his2->path_wayPoints); ?>
                        <div class="col-md-6 col-sm-6 col-xs-12 PADD_REmove">
                            <div class="old_welt_history magn_nun">
                                <div class="old_welt_history_content">
                                    <div class="DAte_penal1">
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <h5 class="pull-left">
                                                <?php
                                                    $newDate = date("d-m-Y", strtotime($his2->booking_date));
                                                    $time = date("g:i a", strtotime($his2->booking_time));
                                                    echo $newDate. " at " .$time;
                                                ?>
                                            </h5>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <h4 class="pull-right">
                                                <?php 
                                                    $hour_charge = $his2->afterHourCharges;
                                                    if($hour_charge == ""){
                                                        echo "$" .$his2->totalprice; 
                                                    }else{
                                                        $net_amt = $his2->totalprice + $hour_charge;
                                                        echo "$" .$net_amt;
                                                    }                                   
                                                ?>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="row1">
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <h4 class="pull-left">Task #<?php echo $his2->id; ?></h4>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <div class="Activated_PENAL">
                                                <div class="ACtiveted_penl COPM_COLOR">Completed</div>
                                                <div class="COMpleated_dot"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="<?php echo base_url(); ?>Booking/info?id=<?php echo $his2->id; ?>"><img src="https://maps.googleapis.com/maps/api/staticmap?size=1000x300&markers=icon:http://phphosting.osvin.net/Uber_style/AndroidDots/ic_dot_green.png|color:0x288cd7|shadow:true|<?php echo $his2->pickup_lat;?>,<?php echo $his2->pickup_long;?>&markers=icon:http://phphosting.osvin.net/Uber_style/AndroidDots/ic_dot_red.png|color:0x288cd7|shadow:true|<?php echo $his2->dropOff_lat;?>,<?php echo $his2->dropOff_long;?>&path=weight:5%7Ccolor:0x14456a%7Cenc:<?php echo $path_way2 ; ?>&key=AIzaSyAtYoGDXguJ0LVCuz0Vby2abe1bcYEWjnk"></img>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>

                <div class="tab-pane fade in" id="Cancelled">
                    <div class="row">
                        <?php foreach($cancelData['book'] as $his3){ 
                            $path_way3 = base64_decode($his3->path_wayPoints); ?>
                        <div class="col-md-6 col-sm-6 col-xs-12 PADD_REmove">
                            <div class="old_welt_history magn_nun">
                                <div class="old_welt_history_content">
                                    <div class="DAte_penal1">
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <h5 class="pull-left">
                                                <?php
                                                    $newDate = date("d-m-Y", strtotime($his3->booking_date));
                                                    $time = date("g:i a", strtotime($his3->booking_time));
                                                    echo $newDate. " at " .$time;
                                                ?>
                                            </h5>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <h4 class="pull-right"><?php echo "$" .$his3->totalprice; ?></h4>
                                        </div>
                                    </div>
                                    <div class="row1">
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <h4 class="pull-left">Task #<?php echo $his3->id; ?></h4>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <div class="Activated_PENAL">
                                                <div class="ACtiveted_penl CANCle_COLOR">Cancelled</div>
                                                <div class="Cancelled_dot"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="<?php echo base_url(); ?>Booking/info?id=<?php echo $his3->id; ?>"><img src="https://maps.googleapis.com/maps/api/staticmap?size=1000x350&markers=icon:http://phphosting.osvin.net/Uber_style/AndroidDots/ic_dot_green.png|color:0x288cd7|shadow:true|<?php echo $his3->pickup_lat;?>,<?php echo $his3->pickup_long;?>&markers=icon:http://phphosting.osvin.net/Uber_style/AndroidDots/ic_dot_red.png|color:0x288cd7|shadow:true|<?php echo $his3->dropOff_lat;?>,<?php echo $his3->dropOff_long;?>&path=weight:5%7Ccolor:0x14456a%7Cenc:<?php echo $path_way3 ; ?>&key=AIzaSyAtYoGDXguJ0LVCuz0Vby2abe1bcYEWjnk"></img></a>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
<?php include('footer.php'); ?>
