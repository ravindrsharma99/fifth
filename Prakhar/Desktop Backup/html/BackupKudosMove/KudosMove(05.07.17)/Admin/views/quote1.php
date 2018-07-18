<?php if ($this->session->flashdata('msg')) { ?>
<div><h3><?php echo $this->session->flashdata('msg') ?></h3></div>
<?php } ?>
<?php //print_r($info);die; ?>
<div class="panel_Custom">
<div class="modal-body Get_a_quot">
    <ul class="nav nav-tabs" role="tablist">
       <!--  <li role="presentation"><a href="<?php echo base_url(); ?>index.php/Booking/quote">Get a Quote</a></li> -->
        <li role="presentation" class="active"><a href="javascript:void(0)">Your Quotes</a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="home">
            <!-- TAB 1 CONTENT-->
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
               <!--  <div class="row"> -->
                    <!-- <form action="<?php echo base_url(); ?>index.php/Booking/view_proposal" method="POST"> -->
                    <?php //foreach($info as $quote){ ?>
                    	<!-- <div class="your_quto_penal">
                    		<input type="hidden" name="id" value="<?php echo $quote->id; ?>">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

								<div class="fiFTy_PENAL1"> -->
									<!-- <p>22-May-2017<span>at</span>04:27PM</p> -->
									<p><?php //echo $quote->date_created; ?></p>
							<!-- 	</div>						
							</div>
	                        <div class="col-md-6 col-sm-6 col-xs-12">
	                            <div class="movin_room">
	                                <h6>Category</h6>
	                                <h5><input type="hidden" name="catname" value="<?php echo $quote->categoryName; ?>"><?php echo $quote->categoryName; ?></h5>
	                            </div>
	                        </div>
	                        <div class="col-md-6 col-sm-6 col-xs-12">
	                            <div class="movin_room">
	                                <h6>Sub Category</h6>
	                                <h5><input type="hidden" name="subcatname" value="<?php echo $quote->subCategoryName; ?>"><?php echo $quote->subCategoryName; ?></h5> -->
	                                <!-- <h2></h2> -->
	                            <!-- </div>
	                        </div>
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="fiFTy_PENAL">
									<p class="DISCUP_PANAL"><input type="hidden" name="desp" value="<?php echo $quote->description; ?>"><?php echo $quote->description; ?></p>
								</div>
							</div>
	                        <div class="col-md-12 col-sm-12 view_proposale">
	                            <a href="<?php echo base_url(); ?>Booking/view_proposal?quote_id=<?php echo $quote->id; ?>">
	                            	<button class="View_proposale_button" type="submit">View proposale</button> -->
	                            <!-- <input type="submit" name="submitt" value="View Proposale"> -->
	                        <!-- </div>
						</div> -->
                    <?php //} ?>
                    <!-- </form> -->
                    <!-- <div class="row maap_show"> 
					    <?php foreach($info as $his){ 
					    	 $path_way1 = base64_decode($his->path_wayPoints); ?>
					      <div class="col-md-6 col-sm-6 col-xs-12">      
					        <a href="<?php echo base_url(); ?>index.php/Booking/info?id=<?php echo $his->id; ?>"><img src="https://maps.googleapis.com/maps/api/staticmap?size=1000x300&markers=icon:http://phphosting.osvin.net/Uber_style/AndroidDots/ic_dot_green.png|color:0x288cd7|shadow:true|<?php echo $his->pickup_lat;?>,<?php echo $his->pickup_long;?>&markers=icon:http://phphosting.osvin.net/Uber_style/AndroidDots/ic_dot_red.png|color:0x288cd7|shadow:true|<?php echo $his->dropOff_lat;?>,<?php echo $his->dropOff_long;?>&path=weight:5%7Ccolor:0x14456a%7Cenc:<?php echo $path_way1 ; ?>&key=AIzaSyAtYoGDXguJ0LVCuz0Vby2abe1bcYEWjnk"></img>
					        </a>
					        <?php echo $his->date_created; ?>
					        Task #<?php echo $his->id; ?>
					        <?php echo "$" .$his->totalprice; ?>
					        <p>Pending</p>
					      </div>
					    
					    <?php } ?>
					</div> -->
					 <div class="row">
                        <?php foreach($info as $his){ 
                            $path_way1 = base64_decode($his->path_wayPoints); ?>
                        <div class="col-md-6 col-sm-6 col-xs-12 PADD_REmove">
                            <div class="old_welt_history magn_nun">
                                <div class="old_welt_history_content">
                                    <div class="DAte_penal1">
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <h5 class="pull-left">
                                               <?php 
                                                    $newDate = date("d-m-Y", strtotime($his->booking_date));
                                                    $time = date("g:i a", strtotime($his->booking_time));
                                                    echo $newDate. " at " .$time;
                                                ?>
                                            </h5>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <h4 class="pull-right"><?php echo "$" .$his->totalprice; ?></h4>
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
                                   <a href="<?php echo base_url(); ?>index.php/Booking/info?id=<?php echo $his->id; ?>"><img src="https://maps.googleapis.com/maps/api/staticmap?size=1000x300&markers=icon:http://phphosting.osvin.net/Uber_style/AndroidDots/ic_dot_green.png|color:0x288cd7|shadow:true|<?php echo $his->pickup_lat;?>,<?php echo $his->pickup_long;?>&markers=icon:http://phphosting.osvin.net/Uber_style/AndroidDots/ic_dot_red.png|color:0x288cd7|shadow:true|<?php echo $his->dropOff_lat;?>,<?php echo $his->dropOff_long;?>&path=weight:5%7Ccolor:0x14456a%7Cenc:<?php echo $path_way1 ; ?>&key=AIzaSyAtYoGDXguJ0LVCuz0Vby2abe1bcYEWjnk"></img>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <!-- </div> -->
            </div>
        </div>
    </div>
</div>