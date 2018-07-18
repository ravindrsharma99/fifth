<?php 

if($title == 'Contact Us'){
    // print_r($title);
?>

<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-12 ppppd">
                <!--<?php
						//echo $result[0]->Content ;
     				?>	 
     			-->
                <div class="CoNTACT_US_MAP">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3311.512911835987!2d-118.30856968442005!3d33.902196433068966!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2b58ec12cdbf5%3A0x1186bd328b160ae7!2sGlobalfitness%C2%AE+Fitness+Equipment!5e0!3m2!1sen!2sin!4v1485496623383" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
        <div class="row PADD_ThREee" id="contact_PAGE_Id" >
            <div class="col-md-12 col-sm-12">
                <h2 class="GET_intouch">Get in Touch</h2>
            </div>
        </div>
        <span id ="error" style="color: red"></span>
        <div class="row PADD_ThREee" id="contact_PAGE_Id">
          <form method='post' action="#" name='contactus-form' id='contactus-form'>
            <div class="col-md-7 col-sm-7 col-xs-12">
                <div class="shipping_form_penal cust_PADDD">
                    <div class="first_penal_ship">
                        <div class="form-group">
                            <input id="firstname_contactus" class="form-control firstname" name="firstname_contactus" placeholder="First Name (required)" type="text">
                        </div>
                        <div class="form-group_second">
                            <input id="lastname_contactus" name="lastname_contactus" class="form-control lastname" placeholder="Last Name (required)" type="text">
                        </div>
                    </div>
                    <div class="second_penal_ship">
                        <div class="form-group">
                            <input id="email_contactus" name="email_contactus" class="form-control firstname" placeholder="Email Address (required)" type="Email">
                        </div>
                    </div>
                    <div class="fourth_penal_ship">
                        <div class="form-group">
                            <input id="telephone_contactus" name="telephone_contactus" class="form-control StreetAddress" placeholder="Mobile Number (optional)" type="phone no">
                        </div>
                    </div>
                    <div class="fifth_penal_ship">
						<div class="form-group">
                        	<textarea id="message_contactus" name="message_contactus" class="form-control TEXT_HEIGHT" placeholder="Message"></textarea>
                        </div>
                        <div id="recaptcha8" class='g-recaptcha-response'></div>
                        <div class="form-group">
                            <button id="contact_us" name ="sending_mails"  class="btn btn-info pull-left CONTACT_SEnd_BTn" type="button">Send Email</button>
                        </div>
                    </div>
                </div>
            </div>
           </form>
            <div class="col-md-5 col-sm-5 col-xs-12">
            	<div id="FIRST_ADRESss">
            	    <h2 class="GET_intouch_ADDRESS">GLOBAL FITNESS USA</h2>
	                <h4 class="CONTct_ADD_ADDrs">1639 W. Rosecrans Ave <br>Gardena, CA 90249</h4>
	                <p class="CONTct_TEXT_ADDrs">Tel: 310-808-0888</p>
	                <p class="CONTct_TEXT_ADDrs">Hours: 8am - 5pm PST</p>
            	</div>

            	<div id="Second_ADRESss">
            		<h2 class="GET_intouch_ADDRESS">GLOBAL FITNESS STUDIO</h2>
	                <h4 class="CONTct_ADD_ADDrs">1641 W. Rosecrans Ave <br>Gardena, CA 90249</h4>
	                <p class="CONTct_TEXT_ADDrs">Tel: 310-808-0888</p>
	                <p class="CONTct_TEXT_ADDrs">Hours: By Appointment</p>
            	</div>

               
            </div>
        </div>
        <div class="row bac_ground">
            <div class="col-md-12 col-sm-12">
                <h2 class="GET_intouch text-center">Get Social! </h2>
            </div>
        </div>
        <div class="row bac_ground">
            <div class="col-md-12 col-sm-12 col-xs-12 ppppd">
            	<div class="social_cont_PENl text-center" >                    
                    <ul class="social_cont">
                      <li class="TWENTYWTH"><a href="http://amazon.globalfitness.com"><img src="<?php echo base_url() ?>/public/assets/images/AMAZON_cONT_ICN.png" alt=""></a></li>
                      <li class="TWENTYWTH"><a href="http://facebook.globalfitness.com"><img src="<?php echo base_url() ?>public/assets/images/FB_cONT_ICN.png" alt=""></a></li>
                      <li class="TWENTYWTH"><a href="http://plus.google.globalfitness.com"><img src="<?php echo base_url() ?>/public/assets/images/gPLUSH_cONT_ICN.png" alt=""></a></li>
                      <li class="TWENTYWTH"><a href="http://instagram.globalfitness.com"><img src="<?php echo base_url() ?>/public/assets/images/INSTA_cONT_ICN.png" alt=""></a></li>
                      <li class="TWENTYWTH"><a href="http://linkedin.globalfitness.com"><img src="<?php echo base_url() ?>/public/assets/images/LINKIN_cONT_ICN.png" alt=""></a></li>
                      <li class="TWENTYWTH"><a href="http://pinterest.globalfitness.com"><img src="<?php echo base_url() ?>/public/assets/images/PINTRST_cONT_ICN.png" alt=""></a></li>
                      <li class="TWENTYWTH"><a href="http://twitter.globalfitness.com"><img src="<?php echo base_url() ?>/public/assets/images/TEITTER_cONT_ICN.png" alt=""></a></li>
                      <li class="TWENTYWTH"><a href="http://youtube.globalfitness.com"><img src="<?php echo base_url() ?>/public/assets/images/YOUTUB_cONT_ICN.png" alt=""></a></li>
                    </ul>
                  </li>
            	</div>
            </div>
        </div>
    </div>
</section>
<?php  } else{ ?>
<section>
    <div class="container wapper">
    <div class="row">
        <div class="col-md-12 col-sm-12">
    <?php
    echo $result[0]->Content ;

     ?> 

    </div>
    </div>
    </div>
</section><?php }?>