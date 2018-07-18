            <?php
                            if(isset($_SESSION['review_data'])){ 
                               
                              unset($_SESSION['review_quote_data']);
                            }else{                             
                             
                             unset($_SESSION['review_data']);
                            }
                        ?>
<div class="panel_Custom">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <h3>Service Summary</h3>
        </div>
    </div>    
    <div class="modal-body">
        <div class="row">
            <div class="HADING_TITTLE">
                <div class="col-md-12 col-sm-12">
                    <div class="popup_title">
                        <h2>Contact Info</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="penal_detl_BOx">
                    <div class="imag_penal"><img src="<?php echo base_url(); ?>assests/images/blueusser.png"></div>
                    <span id="sdnm1">
                        <h4><?php print_r($_SESSION['review_data']['name']); 
                         print_r($_SESSION['review_quote_data']['name']); ?>
                        </h4>
                    </span>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="penal_detl_BOx">
                    <div class="imag_penal"><img src="<?php echo base_url(); ?>assests/images/bluephone.png"></div>
                    <span id="sdph1">
                    <h4><?php print_r($_SESSION['review_data']['phone']); 
                     print_r($_SESSION['review_quote_data']['phone']); ?>
                    </h4>
                </span>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="cateGORy_contenT_PEnal text-center">
                    <h5>category</h5>
                    <div class="cateGORy_img_box">
                        <img src="<?php echo $category->image ; ?>">
                    </div>
                    <h3><?php echo $category->categoryName; ?></h3>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="cateGORy_contenT_PEnal text-center">
                    <h5>sub Category</h5>
                    <div class="cateGORy_img_box">
                        <img src="<?php echo $category->sub_cat_image; ?>">
                    </div>
                    <h3><?php echo $category->sub_cat_name; ?></h3>
                </div>
            </div>
        </div>
        <hr>
        <div class="modal-bodyCustom">
            <div class="HADING_TITTLE">
                <div class="col-md-4 col-sm-4">
                    <div class="popup_title">
                        <h2>Location</h2>
                    </div>
                </div>
            </div>
        </div>

    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="form_hding">
                <h1>From</h1>
                <div class="too">
                    <?php echo $_SESSION['review_quote_data']['pickup_location'] ; ?>
                    <?php echo $_SESSION['review_data']['pickup_location']; ?>
                </div>
            </div>
        </div>
        <?php  if((isset($_SESSION['review_data']['categoryType'] ) && $_SESSION['review_data']['categoryType'] == 2  )||( isset($_SESSION['review_quote_data']['categoryType']) && $_SESSION['review_quote_data']['categoryType']==2) ) {}else{ ?>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="form_hding">
                <h1>To</h1>
                <div class="too">
                    <?php echo $_SESSION['review_data']['dropOff_location']; ?>
                    <?php echo $_SESSION['review_quote_data']['dropOff_location']; ?>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
    <?php   if((isset($_SESSION['review_data']['categoryType'] ) && $_SESSION['review_data']['categoryType'] == 2  )||( isset($_SESSION['review_quote_data']['categoryType']) && $_SESSION['review_quote_data']['categoryType']==2) ) { }else{ ?>
        <div class="HADING_TITTLE">
            <div class="col-md-4 col-sm-4">
                <div class="title">
                    <h2><span><img src="<?php echo base_url(); ?>assests/images/time.png"></span>Distance & Time</h2>
                </div>
            </div>
            <div class="col-md-8 col-sm-8">
                <div class="popup_contact_info">
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="penal_detl_BOx bG_Whit">
                    <h4 class="penal_detl_BOx_DAte pull-left FULL_LENght">Distance </h4>
                    <span class="penal_detl_BOx_DATEAuto pull-right TIME_text" id="dt1">
                        <?php print_r($_SESSION['review_data']['distance']);print_r($_SESSION['review_quote_data']['distance']);echo "Kilometers"; ?>
                    </span>
                    
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="penal_detl_BOx bG_Whit">
                    <h4 class="penal_detl_BOx_Time pull-left FULL_LENght">Time </h4>
                    <span class="penal_detl_BOx_timeAuto pull-right TIME_text" id="tm1">
                        <?php print_r($_SESSION['review_data']['hours']); ?><?php print_r($_SESSION['review_quote_data']['hours']); ?>
                    </span>
                    
                </div>
            </div>
        </div>
        <?php } ?>
        <?php
        if((isset($_SESSION['review_data']['categoryType'] ) && $_SESSION['review_data']['categoryType'] == 2  )||( isset($_SESSION['review_quote_data']['categoryType']) && $_SESSION['review_quote_data']['categoryType']==2) ) {

         ?>
        <div class="HADING_TITTLE">
            <div class="col-md-4 col-sm-4">
                <div class="title">
                    <h2><span><img src="<?php echo base_url(); ?>assests/images/time.png"></span>Number of hours</h2>
                </div>
            </div>
            <div class="col-md-8 col-sm-8">
                <div class="popup_contact_info">
                <p>
                    <?php 
                        echo $_SESSION['review_data']['hours']; 
                        echo $_SESSION['review_quote_data']['hours']; 
                    ?>
                Hours</p>
                </div>
            </div>
        </div>
        <?php } 
             if(empty(isset($_SESSION['review_data']['description']))){ }else{ ?>
        <hr>
         <div class="modal-bodyCustom">
            <div class="HADING_TITTLE">
                <div class="col-md-4 col-sm-4">
                    <div class="popup_title">
                        <h2>Description</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="form_hding">
                <p><?php echo $_SESSION['review_data']['description']; ?></p> 
                </div>
            </div>
        </div>
        <?php } 
             if(empty(isset($_SESSION['review_quote_data']['description']))){ }else{ ?>
        <div class="modal-bodyCustom">
            <div class="HADING_TITTLE">
                <div class="col-md-4 col-sm-4">
                    <div class="popup_title">
                        <h2>Description</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="form_hding">
                <p><?php echo $_SESSION['review_quote_data']['description']; ?></p> 
                </div>
            </div>
        </div>
        <?php } ?>

        <div class="HADING_TITTLE">
            <div class="col-md-4 col-sm-4">
                <div class="title">
                    <h2><span><img src="<?php echo base_url(); ?>assests/images/time.png"></span>Date Time</h2>
                </div>
            </div>
            <div class="col-md-8 col-sm-8">
                <div class="popup_contact_info">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-6">  
                <div class="penal_detl_BOx bG_Whit">
                    <h4 class="penal_detl_BOx_DAte pull-left FULL_LENght">Date</h4>
                    <span class="penal_detl_BOx_DATEAuto pull-right TIME_text" id="dt1"><?php print_r($_SESSION['review_data']['booking_date']); ?><?php print_r($_SESSION['review_quote_data']['booking_date']); ?></span>
                </div>
            </div>
                  
            <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="penal_detl_BOx bG_Whit">
                    <h4 class="penal_detl_BOx_Time pull-left FULL_LENght">Time</h4>
                    <span class="penal_detl_BOx_timeAuto pull-right TIME_text" id="tm1">
                        <?php
                            if(isset($_SESSION['review_data'])){ 
                                $time = date("g:i a", strtotime($_SESSION['review_data']['booking_time'])); echo $time;
                              // unset($_SESSION['review_quote_data']);
                            }else{                             
                              $time = date("g:i a", strtotime($_SESSION['review_quote_data']['booking_time'])); echo $time;
                             // unset($_SESSION['review_data']);
                            }
                        ?>
                    </span>
                </div>
            </div>
        </div>

        <div class="HADING_TITTLE">
            <div class="col-md-4 col-sm-4">
                <div class="title">
                    <h2><span><img src="<?php echo base_url(); ?>assests/images/dollor.png"></span>Price</h2>
                </div>
            </div>
        </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 ">
                    <div class="popup_loaction">
                        <div class="col-md-6 col-sm-6">
                            <div class="est">
                                <h3><span><img src="<?php echo base_url(); ?>assests/images/esT.png"></span>EST . FARE</h3>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="est">
                                <h4><input type="hidden" name="fare" id="fare" value=""><span id="est"><?php echo "$".$_SESSION['estprice']; ?></span></h4>
                            </div>
                        </div>
                    </div>
                    <?php foreach($_SESSION['service_data'] as $keyy){ if($keyy['totalprice'] == 0){}else{ ?>
                    <div class="popup_loaction">
                        <div class="col-md-6 col-sm-6">
                            <div class="est">
                                <h3><img src="<?php echo base_url(); ?>assests/images/esT.png"><input type="hidden" id="nm0"><span id="nmn0"><?php echo $keyy['ServiceTitle']; ?></span></h3>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="est">
                                <h4><input type="hidden" id="amt" value=""><span id="amt1"><?php if(!empty($keyy['totalprice'])){echo "$".$keyy['totalprice'];}else{ echo "$0";} ?></span></h4>
                            </div>
                        </div>
                    </div>
                    <?php }  }?>
                </div>
            </div>
        <!-- <div class="popup_loaction">
                <div class="col-md-6 col-sm-6">
                    <div class="est">
                        <h3><img src="<?php echo base_url(); ?>assests/images/esT.png"><input type="hidden" id="nm1"><span id="nmn1"></span></h3>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="est">
                        <h4><input type="hidden" id="amt2" value="">$<span id="amt3"></span></h4>
                    </div>
                </div>
            </div>
            <div class="popup_loaction">
                <div class="col-md-6 col-sm-6">
                    <div class="est">
                        <h3><img src="<?php echo base_url(); ?>assests/images/esT.png"><input type="hidden" id="nm2"><span id="nmn2"></span></h3>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="est">
                        <h4><input type="hidden" id="amt4" value="">$<span id="amt5"></span></h4>
                    </div>
                </div>
            </div> -->
        <div>
            <?php //if($this->session->flashdata('suc1')){ ?>
            <div>
                <h4><?php //echo $this->session->flashdata('suc1'); ?></h4></div>
            <?php //} ?>
            <?php 
                if(isset($_SESSION['promocode_id'])){
                   echo '<h3>'.$_SESSION['suc1'].'</h3>';
                }else{
                   echo '';
                }
            ?>
        </div>
        <div class="popup_loaction">
            <div class="col-md-12 col-sm-12">
                <hr>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="pop">
                    <h3><span><img src="<?php echo base_url(); ?>assests/images/esT.png"></span>TOTAL FARE</h3>
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="pop_right">
                    <h4><input type="hidden" id="ttl" name="tprce" value="">$<span id="ttll"><?php echo $_SESSION['review_data']['totalprice']; ?><?php echo $_SESSION['review_quote_data']['totalprice']; ?></span>
            </h4>
                </div>
            </div>
        </div>
        <P class="highlight">Tolls,labour and parking fees are not included</P>
    </div>
    <?php if(empty(isset($_SESSION['promocode_id']))){ ?>
    <div class="text-center">
        <a href="<?php echo base_url(); ?>Booking/coupon"><h2>Have a Promo Code?</h2></a>
    </div>
    <?php }else{ ?>
    <div class="text-center">
        <a href="<?php echo base_url(); ?>Booking/cancel_coupon"><h2>Cancel Promo Code?</h2></a>
    </div>
    <?php } ?>
    <?php if($this->session->flashdata('err')){ ?>
    <div>
        <p style="color:red;">
            <?php echo $this->session->flashdata('err'); ?>
        </p>
    </div>
    <?php } ?>
    <div class="modal-footer book_order">
        <a href="<?php echo base_url(); ?>index.php/Booking/review_pay">
            <input type="button" name="suborder" id="ordersub" value="Book Order" class="book_now">
        </a>
    </div>
</div>
</form>
</div>
</div>
