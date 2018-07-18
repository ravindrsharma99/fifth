<section>
	<div class="container">
		<div class="row thanku_page_penal">
  			<div class="col-md-12">

  				<h2>Thank you <?php echo ucfirst($_SESSION['firstname']." ".$_SESSION['middlename']." ".$_SESSION['lastname']); ?>!</h2>
  			</div>
  		</div>
  		<?php
  		if(count($order)>0){
  			foreach($order as $or){
  			?>
  		<div class="row thanku_page_penal">
  			<div class="col-md-12">
  				<h2>Your order # is <?php echo $or->ID ;?></h2>
  			</div>
  		</div>
  		<div class="row thanku_page_penal">
  			<div class="col-md-6 col-sm-6">
  				<div class="address_penal">
  					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13004069.896900944!2d-104.65611544442767!3d37.27565371492453!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited+States!5e0!3m2!1sen!2sin!4v1469522984444" width="430" height="200" frameborder="0" style="border:0" allowfullscreen></iframe>
  				</div>
  				<div class="map_bottom_text">
	  				<h3>Your order is confirmed</h3>
	  				<p><?php if($or->paymenttype=="0"){ ?>Your payment has been accepted and your order confirmed. <?php } ?> A confirmation email been sent to the email <?php echo $or->billingemail;  ?>.</p>
	  			</div>
  			</div>
  			<div class="col-md-6 col-sm-6">
  				<h3 class="cust_info">Customer Information</h3>
  				<div class="row">
	  				<div class="col-md-6 col-sm-6">
	  					<?php if($or->shippingfirstname!=""){ ?>
	  					<p class="cust_info_text"><strong>Shipping Address</strong></p>
	  					<p class="cust_info_text"><?php echo ucfirst($or->shippingfirstname." ".$or->shippinglastname);  ?></br ></p>
	  					<p class="cust_info_text"><?php echo ucfirst($or->shippingcompanyname);  ?></br ></p>
	  					<p class="cust_info_text"><?php echo ucfirst($or->shippingstreetadress);  ?> </br ></p>
	  					<p class="cust_info_text"><?php echo ucfirst($or->shippingstate)." , ".ucfirst($or->shippingcity)." , ".ucfirst($or->shippingzipcode);  ?></br ></p>
	  					<p class="cust_info_text"><?php echo $or->shippingareacode."-".ucfirst($or->shippingprimaryphone);  ?></br ></p>
	  					<?php  } ?>
	  					<p class="cust_info_text"><strong>Shipping Method</strong></p>
	  					<p class="cust_info_text">
	  						<?php if($or->shippinghome=="0"){
								echo "I want this placed inside my home";
								}
								if($or->shippinghome=="1"){
									echo "I want to ship this internationally";
								}
								if($or->shippinghome=="2"){
									echo "I want to pick this up";
								}
							?>
	  					</p>
	  				</div>
	  				<div class="col-md-6 col-sm-6">
	  					<p class="cust_info_text"><strong>Billing Address</strong></p>
	  					<p class="cust_info_text"><?php echo ucfirst($or->billingfirstname." ".$or->billinglastnames);  ?></br ></p>
	  					<p class="cust_info_text"><?php echo ucfirst($or->billingcompanys);  ?></br ></p>
	  					<p class="cust_info_text"><?php echo ucfirst($or->billingstreetadd);  ?> </br ></p>
	  					<p class="cust_info_text"><?php echo ucfirst($or->billingstates)." , ".ucfirst($or->billingcity)." , ".ucfirst($or->billingzipcode);  ?></br ></p>
	  					<?php if($or->billingsuite!=""){ ?>
	  					<p class="cust_info_text"><?php echo ucfirst($or->billingareacodes)."-".ucfirst($or->billingprimaryphone);  ?></br ></p>
	  					<?php } ?>
	  					<p class="cust_info_text"><?php echo ucfirst($or->billingprimaryphone);  ?></br ></p>
	  					<p class="cust_info_text"><strong>Payment Method</strong></p>
	  					<p class="cust_info_text">
	  						<?php if($or->paymenttype=="0"){
									echo "By ".$or->cardtype;
								}else{
									echo "Cash On Delivery";
								}
							?>
	  					</p>
	  				</div>
  				</div>
  			</div>
  		</div>
		<div class="row chack_out_one_n">
	    	<div class="col-md-12 col-sm-12">
	    		<div class="chackout_penal_heading">
			      <h4>Order Confirmation Invoice</h4>
			    </div>
	    	</div>
	    </div>
	    <div class="row chack_out_one_product">
	    	<?php
	    		$products = explode(",,,,",$or->ListID);
	    		$piece = explode(",,,,",$or->piece);
            	$totalcharges = 0;
            	$totalprice = 0;
				$totalWeight=0;
            	 for($i=0; $i<count($products);$i++){
            	 	$thisPrice = 0;
					$thisWeight=0;
			        $product = $this->Site_model->productdetail($products[$i]);

			        foreach($product as $live){
						$thisPrice = $piece[$i]*trim($live->Price,'$');
						$totalprice= $totalprice+$thisPrice;
						$WeightString = $live->Weight;
						$arrayWeight = explode(" ", $WeightString);
						$Weight = $arrayWeight[1];
						$thisWeight = $piece[$i]*$Weight;
						$totalWeight = $totalWeight+$thisWeight;
						$LOGIN_USERID="test1234";
						$LOGIN_PASSWORD="testing";
						$BusId="67022240928";
						$BusRole="Shipper";
						$PaymentTerms="Prepaid";
						$OrigCityName="Akron";
						$OrigStateCode="OH";
						$OrigZipCode="44310";
						$OrigNationCode="USA";
						$DestCityName=$or->shippingcity;
						$DestStateCode=$or->shippingstate;
						$DestZipCode=$or->shippingzipcode;
						$DestNationCode="USA";
						$ServiceClass="STD";
						$PickupDate=date("Ymd");
						$TypeQuery="QUOTE";
						$LineItemWeight1=$totalWeight;
						$LineItemNmfcClass1="70";
						$LineItemCount="1";
						$AccOption1="HOMD";
						$Acc="";
		          			$url = "https://my.yrc.com/dynamic/national/servlet?CONTROLLER=com.rdwy.ec.rexcommon.proxy.http.controller.ProxyApiController&redir=/tfq561&LOGIN_USERID=".$LOGIN_USERID."&LOGIN_PASSWORD=".$LOGIN_PASSWORD."&BusId=".$BusId."&BusRole=".$BusRole."&PaymentTerms=".$PaymentTerms."&OrigCityName=".$OrigCityName."&OrigStateCode=".$OrigStateCode."&OrigZipCode=".$OrigZipCode."&OrigNationCode=".$OrigNationCode."&DestCityName=".$DestCityName."&DestStateCode=".$DestStateCode."&DestZipCode=".$DestZipCode."&DestNationCode=".$DestNationCode."&ServiceClass=".$ServiceClass."&PickupDate=".$PickupDate."&TypeQuery=".$TypeQuery."&LineItemWeight1=".$LineItemWeight1."&LineItemNmfcClass1=".$LineItemNmfcClass1."&LineItemCount=".$LineItemCount."&AccOption1=".$AccOption1."&Acc";
          // $url = htmlentities($url);
							$curl = curl_init($url);
							curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
							curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
							$transaction= curl_exec($curl);
							curl_close($curl);

							$transaction = simplexml_load_string($transaction);

							$charges = $transaction->BodyMain->RateQuote->RatedCharges->TotalCharges;

							$thischarges = $charges*$piece[$i];
							$totalprice+=$thischarges;
			        	?>
			        	<div class="col-md-9 col-sm-8 col-xs-4">
					      <div class="cart_product_img"><img src="<?php echo base_url().'/'.$live->ImageURL; ?>" alt="<?php echo $live->ProductName; ?>" title="<?php echo $live->MetaDetailPageTitleTag; ?>"></div>
					      <h4 class="chackpro_name web_view">
					      	<?php if($live->Kingdom=="Cardio"){ ?>
		                        <a href="<?php echo base_url('fitness-equipment').'/'.$link; ?>"><?php echo $live->ProductName; ?></a>
		                        <?php
		                      }
		                      else
		                      {
		                        ?>
		                        <a href="<?php echo base_url('gym-equipment').'/'.$link; ?>"><?php echo $live->ProductName; ?></a>
		                        <?php
		                      }
		                    ?>
					      </h4>
					    </div>
					    <div class="col-md-3 col-sm-4 col-xs-8">
							<h4 class="chackpro_name responsiv">
								<?php if($live->Kingdom=="Cardio"){ ?>
			                        <a href="<?php echo base_url('fitness_equipment').'/'.$link; ?>"><?php echo $live->ProductName; ?></a>
			                        <?php
			                      }
			                      else
			                      {
			                        ?>
			                        <a href="<?php echo base_url('gym-equipment').'/'.$link; ?>"><?php echo $live->ProductName; ?></a>
			                        <?php
			                      }
			                    ?>
							</h4>
							<div class="joint_penal_group">
							  <div class="joint_one">
									<div class="parice_check">Price</div>
									<div class="parice_check_total"><?php
									echo $live->Price; ?></div>
							   </div>
							   <div class="joint_one">
									<div class="parice_check">Quantity</div>
									<div class="parice_check_total"><?php echo $piece[$i]; ?></div>
							   </div>
							   <div class="joint_one">
									<div class="parice_check red_color">Shipping</div>
									<div id="shipingprice" class="parice_check_total red_color"><?php echo $thischarges; ?></div>
							   </div>
							 	  <div class="border_bot"></div>
							   </div>
							</div>
			        	<?php
			        }
			    }

          	?>
		    <div class="col-md-3 col-sm-4 col-xs-8">

			<div class="joint_penal_group">
			   <div class="border_bot"></div>
			   <div class="joint_one">
					<div class="parice_check">Subtotal</div>
					<div class="parice_check_total"><?php //echo $or->allmainpayment;
							echo "$".number_format($or->allmainpayment,2,".",",");
					 ?></div>

			   </div>

			</div>

			<div class="joint_penal_group">
			    <div class="border_bot"></div>
			    <div class="joint_one">
				<div class="parice_check">Shipping</div>
				<div class="parice_check_total"><?php
					echo "$".number_format($or->allshipcharge,2,".",",");
				// echo $or->allshipcharge;
				 ?>
				</div>
			    </div>
			</div>

 		<?php if($or->home=="0"){ ?>
			<div class="joint_penal_group">
			    <div class="border_bot"></div>
			    <div class="joint_one">
				<div class="parice_check">$300 USD White Glove Delivery</div>
			    </div>
			</div>

			<?php } ?>

			<div class="joint_penal_group">
			   <div class="border_bot"></div>
			   <div class="joint_one">
					<div class="parice_check">Total</div>
					<div class="parice_check_total"><?php
					 // echo $or->billingallpayment;
						echo "$".number_format($or->billingallpayment,2,".",",");
					 ?></div>

			   </div>

			</div>
			</div>

		</div>
		      <div class="row chackoutpage_border_bg"></div>

		<?php  } }
		else{
			?>
			<div class="row border_top chack_out_contnue_penal margin_padd">
				<div class="col-md-12 col-sm-12">
				  	<div class="row align_right ">
						<div class="col-md-12 col-sm-12">
							<div class="continue_button marginnone" style="color:red"><?php echo "No Records Found" ?></div>
					    </div>
					</div>
				</div>
			</div>
			<div class="row chackoutpage_border_bg"></div>
			<?php
		} ?>
		<div class="row border_top chack_out_contnue_penal margin_padd">
			<div class="col-md-12 col-sm-12">
			  	<div class="row align_right ">
					<div class="col-md-8 col-sm-7">
						<div class="continue_button marginnone"><a href="<?php echo base_url('/fitness-equipment/treadmill'); ?>">Continue Shopping</a></div>
				    </div>
			  		<div class="col-md-4 col-sm-5">
			  		<p class="phone_contact">Questions? Call 1-800-991-9991</p>
					</div>
				</div>
			</div>
		</div>
		<div class="row chackoutpage_border_bg"></div>
  	</div>
</section>
