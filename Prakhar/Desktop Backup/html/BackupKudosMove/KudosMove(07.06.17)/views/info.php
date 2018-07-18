<style>
.design{color:#2b92df;}
</style>
<div class="panel_Custom">

    <div class="row">
        <div class="HADING_TITTLE">
            <div class="col-md-12 col-sm-12">
                <div class="title">
                    <h2 style="text-align: center;">
                        <?php
                            if($show->is_quote == 1 || $show->status == 0){
                                echo "Task #" .$show->book_id;
                            }else{
                                if($show->status == 1 || $show->status == 2){
                                    echo "Accepted Task #" .$show->book_id;
                                }elseif($show->status == 3){
                                    echo "Completed Task #" .$show->book_id;
                                }elseif($show->status == 4){
                                    echo "Cancelled Task #" .$show->book_id;
                                }else{
                                    echo "Pending Task #" .$show->book_id;
                                }
                            }
                        ?>
                    </h2>
                </div>
            </div>
           <!--  <div class="col-md-8 col-sm-8">
                <div class="contact_info"> -->
                    <!-- <ul>
                        <li><span><img src="<?php echo base_url(); ?>assests/images/usser.png"></span>
                            <input type="text" value="<?php echo $show->name ; ?>" readonly="readonly">
                        </li>
                        <li><span><img src="<?php echo base_url(); ?>assests/images/phone.png"></span>
                            <input type="text" name="num" value="<?php echo $show->phone ; ?>" readonly="readonly">
                        </li>
                    </ul> -->
            <!--     </div>
            </div> -->
        </div>
    </div>

    <?php $path_way = base64_decode($show->path_wayPoints); ?>

    <hr>
    <div class="row mapp text-center">
        <div class="col-md-12 col-sm-12 col-xs-12">
           <img src="https://maps.googleapis.com/maps/api/staticmap?size=1000x350&markers=icon:http://phphosting.osvin.net/Uber_style/AndroidDots/ic_dot_green.png|color:0x288cd7|shadow:true|<?php echo $show->pickup_lat;?>,<?php echo $show->pickup_long;?>&markers=icon:http://phphosting.osvin.net/Uber_style/AndroidDots/ic_dot_red.png|color:0x288cd7|shadow:true|<?php echo $show->dropOff_lat;?>,<?php echo $show->dropOff_long;?>&path=weight:5%7Ccolor:0x14456a%7Cenc:<?php echo $path_way ; ?>&key=AIzaSyAtYoGDXguJ0LVCuz0Vby2abe1bcYEWjnk"></img>

           <!-- <img src="https://maps.googleapis.com/maps/api/staticmap?size=1000x350&markers=color:0xFFFF00|shadow:true|<?php echo $show->pickup_lat; ?>,<?php echo $show->pickup_long; ?>&markers=color:0x0000ff|shadow:true|<?php echo $show->dropOff_lat; ?>,<?php echo $show->dropOff_long; ?>&path=weight:5%7Ccolor:0x14456a%7C<?php echo $show->pickup_lat; ?>,<?php echo $show->pickup_long; ?>|<?php echo $show->dropOff_lat; ?>,<?php echo $show->dropOff_long; ?>&key=AIzaSyAtYoGDXguJ0LVCuz0Vby2abe1bcYEWjnk"></img> -->

        </div>
    </div>
    <hr>
     <div class="row">
        <div class="HADING_TITTLE">
            <div class="col-md-4 col-sm-4">
                <div class="title">
                    <h2>Contact Info</h2>
                </div>
            </div>
            <div class="col-md-8 col-sm-8">
                <div class="contact_info">
                    <ul>
                        <li><span><img src="<?php echo base_url(); ?>assests/images/usser.png"></span>
                            <input type="text" value="<?php echo $show->name ; ?>" readonly="readonly">
                        </li>
                        <li><span><img src="<?php echo base_url(); ?>assests/images/phone.png"></span>
                            <input type="text" name="num" value="<?php echo $show->phone ; ?>" readonly="readonly">
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <hr>
   
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="cateGORy_contenT_PEnal text-center">
                <h5>category</h5>
                <div class="cateGORy_img_box">
                    <img src="<?php echo $category->image; ?>">
                </div>
                <h3><?php echo $category->categoryName; ?></h3>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="cateGORy_contenT_PEnal text-center">
                <h5>Sub Category</h5>
                <div class="cateGORy_img_box">
                    <img src="<?php echo $category->sub_cat_image; ?>">
                </div>
                <h3><?php echo $category->sub_cat_name; ?></h3>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="form_hding">
                <h1>From</h1>
                <div class="too">
                    <?php echo $show->pickup_location; ?>
                </div>
            </div>
        </div>
        <?php $type = $show->categoryType;
            if($type == 2){}else{ ?>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="form_hding">
                <h1>To</h1>
                <div class="too">
                    <?php echo $show->dropOff_location; ?>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>

    <?php $type = $show->categoryType;
            if($type == 2){ ?>

    <div class="row">
        <div class="HADING_TITTLE_new">
            <div class="col-md-4 col-sm-4">
                <div class="title">
                    <h2 class="new_tittle">Number of hours</h2>
                </div>
            </div>
            <div class="col-md-8 col-sm-8">
                <div class="contact_info">
                <h4 class="design"><?php echo $show->hours; ?> Hours</h4>
                </div>
            </div>
        </div>
    </div>
    <?php } else{ ?>
    <div class="row INFO_bOx">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="date_time">
                <ul>
                    <li>
                        <span><img src="<?php echo base_url(); ?>assests/images/ic_distance.png"></span>
                        <!-- <input type="text"  id="distancekm" name="distancekm" value="" placeholder="Distance"> -->
                        <p class="distence_new"><?php echo $show->distance ; ?> kilometers</p>
                    </li>
                    <li>
                        <span><img src="<?php echo base_url(); ?>assests/images/ic_time_distance.png"></span>
                        <p class="distence_new"><?php 
                            $seconds = $show->time ;
$hours = floor($seconds / 3600);

$seconds -= $hours * 3600;
$minutes = floor($seconds / 60);
// $seconds -= $minutes * 60;
if($hours == 0){
    echo $minutes. " Minutes";
}else{
    echo $hours." Hours ".$minutes." Minutes";
}
                         ?> </p>
                        <!-- <input type="text" id="time123" class="form-control floating-label"  name="time123" value="" placeholder="Travel Time"> -->
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <?php } ?>



    <div class="row INFO_bOx">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="date_time" id="datetimepicker">
                <ul>
                    <li><span><img src="<?php echo base_url(); ?>assests/images/datepicer.png"></span>
                        <?php 
                        // print_r($show->booking_date);die;
                        $newDate = date("d-m-Y", strtotime($show->booking_date)); echo $newDate; ?>
                    </li>
                    <li><span><img src="<?php echo base_url(); ?>assests/images/timing.png"></span>
                        <?php $time = date("g:i a", strtotime($show->booking_time)); echo $time; ?>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- <hr class="padding_tp_bot"> -->
    <div class="row">
        <div class="col-md-3 col-sm-3 col-xs-12 PAdd_no">
            <div class="booked">
                <p>
                    <?php $time = $show->date_created;
                      
                          $timee = substr($time,0,-8);
                          $newDate = date("d-m-Y", strtotime($timee)); 
                          echo $newDate;  
                    ?>
                </p>
                <div class="check">
                     <img src="<?php echo base_url(); ?>assests/images/check.png"> 
                   <!--  <h5>12:45 PM</h5> -->
                </div>
                <h4>Booked</h4>
            </div>
            <div class="progress_lin"></div>

        </div>
        <?php  if($show->status == 4){ ?>
            <div class="col-md-3 col-sm-3 col-xs-12 PAdd_no">
            <div class="booked">
                <p><?php $time = $show->cancelled_time;
                          $timee = substr($time,0,-8);
                          $newDate = date("d-m-Y", strtotime($timee)); 
                          echo $newDate;  
                    ?>
                </p>
                <div class="check">
                     <img src="<?php echo base_url(); ?>assests/images/check.png"> 
                    <!-- <h5>12:45 PM</h5> -->
                </div>
                <h4>Cancelled</h4>
            </div>

            <div class="progress_lin_both"></div>
      

        <?php  }else{ ?>

        <div class="col-md-3 col-sm-3 col-xs-12 PAdd_no">
            <?php if($show->status == 1 || $show->status == 2 || $show->status == 3){ ?>
            <div class="booked">
                <p>
                    <?php $time = $show->accepted_time;
                          $timee = substr($time,0,-8);
                          $newDate = date("d-m-Y", strtotime($timee)); 
                          echo $newDate;  
                    ?>
                </p>
                <div class="check">
                   <img src="<?php echo base_url(); ?>assests/images/check.png"> 
                   <!--  <h5>12:45 PM</h5> -->
                </div>
                <h4>Accepted</h4>
            </div>
            <div class="progress_lin_both"></div>
            <?php }else{ ?>
            <div class="unbooked">
                <p>###########</p>
                <div class="uncheck">
                 <img src="<?php echo base_url(); ?>assests/images/check.png"> 
                   <!--  <h5>12:45 PM</h5> -->
                </div>
                <h4>Accepted</h4>
            </div>
            <div class="progress_lin_last_unbook"></div>
            <?php } ?>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-12 PAdd_no">
            <?php if($show->status == 2 || $show->status == 3){ ?>
            <div class="booked">
                <p>
                    <?php 
                        $time = $show->started_time; 
                        $timee = substr($time,0,-8);
                        $newDate = date("d-m-Y", strtotime($timee)); 
                        echo $newDate;
                    ?>
                </p>
                <div class="check">
                    <img src="<?php echo base_url(); ?>assests/images/check.png"> 
                   <!--  <h5>12:45 PM</h5> -->
                </div>
                <h4>Started</h4>
            </div>
            <div class="progress_lin_both"></div>
            <?php }else{ ?>
            <div class="unbooked">
                <p>###########</p>
                <div class="uncheck">
                     <img src="<?php echo base_url(); ?>assests/images/check.png"> 
                   <!--  <h5>12:45 PM</h5> -->
                </div>
                <h4>Started</h4>
            </div>
            <div class="progress_lin_last_unbook"></div>
            <?php } ?>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-12 PAdd_no">
            <?php if($show->status == 3 ){ ?>
            <div class="booked">
                <p>
                    <?php 
                        $time = $show->completed_time;
                        $timee = substr($time,0,-8);
                        $newDate = date("d-m-Y", strtotime($timee)); 
                        echo $newDate;
                    ?>
                </p>
                <div class="check">
                     <img src="<?php echo base_url(); ?>assests/images/check.png"> 
                  <!--   <h5>12:45 PM</h5> -->
                </div>
                <h4>Finished</h4>
            </div>

            <div class="progress_lin_last"></div>
            <?php }else{ ?>
            <div class="unbooked">
                <p>###########</p>
                <div class="uncheck">
                     <img src="<?php echo base_url(); ?>assests/images/check.png"> 
                  <!--  <h5>12:45 PM</h5> -->
                </div>
                <h4>Finished</h4>
            </div>
            <div class="progress_lin_last_unbook"></div>
            <?php } } ?>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 ">
            <div class="loaction">
                <div class="col-md-6 col-sm-6">
                    <div class="est">
                        <h3><span><img src="<?php echo base_url(); ?>assests/images/esT.png"></span>EST. FARE</h3>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="est">
                        <h4>   
                            <span id="span11">
                                <?php
                                    $est_price = $show->estimatedprice; 
                                    $servic = $show->services;
                                    $brk = json_decode($servic);
                                    foreach($brk as $totall12){
                                        $price1 = $totall12->totalprice;
                                        $val += $price1;
                                    } 
                                    $subtrct = $est_price - $val;
                                    echo "$" .$subtrct;  
                                ?>
                            </span>
                        </h4>
                    </div>
                </div>
            </div>

            <?php 
                $servic = $show->services;
                $brk = json_decode($servic);
                if($brk == ""){}else{
                foreach($brk as $bb){ if($bb->totalprice == 0){}else{ ?>
                    <div class="loaction">
                        <div class="col-md-6 col-sm-6">
                            <div class="est">
                                <h3><span><img src="<?php echo base_url(); ?>assests/images/esT.png"></span><?php echo $bb->ServiceTitle; ?></h3>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="est">
                                <h4><span id="span11"><?php echo "$" .$bb->totalprice; ?></span></h4>
                            </div>
                        </div>
                    </div>
            <?php } } }?>

            <?php if($show->status == 3 && $show->is_quote == 1){ ?>
            <div class="loaction">
                <div class="col-md-6 col-sm-6">
                    <div class="est">
                        <h3><span><img src="<?php echo base_url(); ?>assests/images/extra.png"></span>EST. TOTAL FARE</h3>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="est">
                        <h4><span id="span11"><?php echo "$" .$show->totalprice; ?></span></h4>
                    </div>
                </div>
            </div>
            <div class="loaction">
                <div class="col-md-6 col-sm-6">
                    <div class="est">
                        <h3><span><img src="<?php echo base_url(); ?>assests/images/extra.png"></span>Quote Accepted on Price</h3>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="est">
                        <?php 
                            $can_pri = $show->cancelled_by;
                            if($can_pri == 0){ ?>
                                <h4><span id="span11"><?php echo "$" .$show->totalprice; ?></span></h4>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <?php } 
                if($show->extra_fare == ""){}elseif($show->status == 1){}else{ ?>
                <div class="loaction">
                <div class="col-md-6 col-sm-6">
                    <div class="est">
                        <h3><span><img src="<?php echo base_url(); ?>assests/images/extra.png"></span>Extra Fare</h3>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="est">
                        <h4><span id="span11"><?php echo "$" .$show->extra_fare; ?></span></h4>
                    </div>
                </div>
            </div>

            <?php } ?>

            <?php $hour_charge = $show->afterHourCharges;if($hour_charge == ""){}elseif(!empty($hour_charge) && $show->is_quote == 0){ ?>
            <div class="loaction">
                <div class="col-md-6 col-sm-6">
                    <div class="est">
                        <h3><span><img src="<?php echo base_url(); ?>assests/images/esT.png"></span>After Hour Charge</h3>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="est">
                        <h4><span id="span11"><?php echo "$" .$hour_charge; ?></span></h4>
                    </div>
                </div>
            </div>
            <?php }elseif(!empty($hour_charge) && $show->is_quote == 1){ ?>
            <div class="loaction">
                <div class="col-md-6 col-sm-6">
                    <div class="est">
                        <h3><span><img src="<?php echo base_url(); ?>assests/images/esT.png"></span>After Hour Charge</h3>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="est">
                        <h4><span id="span11"><?php echo "$" .$hour_charge; ?></span></h4>
                    </div>
                </div>
            </div>
            <?php }else{}
                if(empty($promo_apply)){

                }else{
                    if($promo_apply->type == 0){
                        echo '<h4>You applied promo code('.$promo_apply->promo_code.').You will get $'.$promo_apply->value.' discount on end of this task.</h4>';
                    }else{
                        echo '<h4>You applied promo code('.$promo_apply->promo_code.').You will get '.$promo_apply->value.'% discount on end of this task.</h4>';
                    }
                }
            ?>
            <div class="loaction">
                <div class="col-md-6 col-sm-6">
                    <div class="est">
                        <h3><span><img src="<?php echo base_url(); ?>assests/images/extra.png"></span>TOTAL FARE</h3>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="est">
                        <h4>
                            <span id="span12">
                                <?php
                                    $extra_fare1 = $show->extra_fare;
                                    $hour_charge = $show->afterHourCharges;
                                    if($hour_charge == ""){
                                        echo "$" .$show->totalprice; 
                                    }elseif($extra_fare1 != ""){
                                        $net_amt0 = $show->totalprice + $extra_fare1;
                                        echo "$" .$net_amt0;
                                    }else{
                                        $net_amt = $show->totalprice + $hour_charge;
                                        echo "$" .$net_amt;
                                    }                                   
                                ?>
                            </span>
                        </h4>
                    </div>
                </div>
            </div>

            <?php if($show->status == 3){ ?>
            <div class="loaction">
                <div class="col-md-6 col-sm-6">
                    <div class="est">
                        <h3><span><img src="<?php echo base_url(); ?>assests/images/extra.png"></span>Amount Deducted</h3>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="est">
                        <h4>
                            <span id="span12">
                                <?php
                                    $extra_fare1 = $show->extra_fare;
                                    $hour_charge = $show->afterHourCharges; 
                                    $can_pri = $show->cancelled_by;
                                    if(empty($promo_apply)){
                                      if($can_pri == 0 && $hour_charge == ""){ 
                                            echo "$" .$show->totalprice;
                                        }elseif($extra_fare1 != ""){
                                            $net_amt0 = $show->totalprice + $extra_fare1;
                                            echo "$" .$net_amt0;
                                        }else{
                                            $net_amt = $show->totalprice + $hour_charge;
                                            echo "$" .$net_amt;
                                        }  
                                    }else{
                                        if($can_pri == 0 && $hour_charge == ""){
                                            if($promo_apply->type == 1){
                                                $promo = $show->totalprice * ($promo_apply->value  / 100);
                                            }else{
                                                $promo = $show->totalprice  - $promo_apply->value ;
                                            }
                                            echo "$" .$promo;
                                        }elseif($extra_fare1 != ""){
                                            $net_amt0 = $show->totalprice + $extra_fare1;
                                            if($promo_apply->type == 1){
                                                $promo= $net_amt0  * ($promo_apply->value  / 100);
                                            }else{
                                                $promo = $net_amt0  - $promo_apply->value ;
                                            }
                                            
                                            echo "$" .$promo;
                                        }else{
                                            $net_amt = $show->totalprice + $hour_charge;
                                            if($promo_apply->type == 1){
                                                $promo = $net_amt * ($promo_apply->value  / 100);
                                            }else{
                                                $promo = $net_amt  - $promo_apply->value ;
                                            }
                                            
                                            echo "$" .$promo;
                                        }
                                    }
                                ?>
                            </span>
                        </h4>
                    </div>
                </div>
            </div>
            <?php } ?>



        </div>
    </div>
    <?php $quote_type = $show->is_quote;
           $quest = $show->questions;
           //print_r($quest);die;
           $questions = json_decode($quest);

        if($quote_type == 0){}else{ ?>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="HADING_TITTLE_new">
                <div class="title">
                    <h2 class="new_tittle">Questions</h2>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-sm-12">
            <div class="new_question_list">
                <?php foreach($questions as $qu){ ?>
                <ul>
                    <li><?php echo $qu->question ; ?> Yes</li>
                </ul>
                <?php } ?>
            </div>
        </div>
        
    </div>
    <?php } ?>
    <?php $ch_ch = $show->description; if($ch_ch == ""){ }else{ ?>
    <div class="row">        
        <div class="col-md-12 col-sm-12">
            <div class="HADING_TITTLE_new">
                <div class="title">
                    <h2 class="new_tittle">Description</h2>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-sm-12">
            <div class="new_question_list">
                <ul>
                    <li><?php echo $show->description; ?></li>
                </ul>
            </div>
        </div>
    </div>
    <?php } ?>


    <?php if($show->status == 4){ }elseif($show->status == 1 || $show->status == 2){ ?>
    <hr>
    <div class="row">
        <div class="HADING_TITTLE">
            <div class="col-md-4 col-sm-4">
                <div class="title">
                    <h2>Provider Information</h2>
                </div>
            </div>
            <div class="col-md-8 col-sm-8">
                <div class="contact_info">
                    <ul>
                        <li><span class="providr_image"><img src="<?php 
                        if(isset($driver->profile_pic) && !empty($driver->profile_pic)){
                            echo $driver->profile_pic;
                        }else{
                            echo base_url('assests/images/Dumy_profile.png');
                        }

                         ?>"></span>
                            <input type="text" value="<?php echo $driver->fname .' '. $driver->lname ; ?>" readonly="readonly">
                        </li>
                        <li></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
    <?php if($show->status == 1){ ?>
        <hr>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="manage_book">
                    <h5>Manage Your Booking</h5>
                </div>
                <form action="<?php echo base_url(); ?>Booking/cancel" method="POST">
                    <input type="hidden" name="idd" value="<?php echo $show->book_id; ?>">
                    <input type="submit" class="cancel_btn" name="cancel" value="Cancel">
                </form>
            </div>
        </div>
        <p class="highlight">Note:If you cancel the within 48 hours before its start.Booking fees will not be refunded in your wallet.</p>
    <?php }else{
         } } elseif($show->status == 3){ ?>
    <hr>
    <div class="row">
        <div class="HADING_TITTLE">
            <div class="col-md-4 col-sm-4">
                <div class="title">
                    <h2>Provider Information</h2>
                </div>
            </div>
            <div class="col-md-8 col-sm-8">
                <div class="contact_info">
                    <ul>
                             <li><span class="providr_image"><img src="<?php 
                        if(isset($driver->profile_pic) && !empty($driver->profile_pic)){
                            echo $driver->profile_pic;
                        }else{
                            echo base_url('assests/images/Dumy_profile.png');
                        }

                         ?>"></span>
                            <input type="text" value="<?php echo $driver->fname .' '. $driver->lname ; ?>" readonly="readonly">
                        </li>
                       <!--  <li></li> -->
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <?php 
        $check_rating = $rating->rating; if(empty($check_rating)){ ?>
        <div class="text-center">
            <h4>Manage your booking</h4>
            <h3><a data-toggle="modal" href="#rating_model"><span><img src="<?php echo base_url(); ?>assests/images/rating_icon_given.png"></span> Rate this driver </a></h3>
        </div>
    <?php }else{ 
            echo "<h4> You rated </h4>" ; 
            ?>   
            <div class="group2">
            <?php for($i=0 ;$i<5;$i++){
                if($i>=$check_rating){
                echo '<div class="jr-ratenode jr-nomal"></div>';
            }else{
                echo '<div class="jr-ratenode jr-rating"></div>';
                } 
            }
    ?>
    </div>
    <?php    } ?>
    
    <?php }else{ ?>
    <hr>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="manage_book">
                <h5>Manage Your Booking</h5>
            </div>
            <form action="<?php echo base_url(); ?>index.php/Booking/cancel" method="POST">
                <input type="hidden" name="idd" value="<?php echo $show->id; ?>">
                <input type="submit" class="cancel_btn" name="cancel" value="Cancel">
            </form>
        </div>
    </div>
    <p class="highlight">Note:If you cancel the within 48 hours before its start.Booking fees will not be refunded in your wallet.</p>
    <?php } ?>
</div>




