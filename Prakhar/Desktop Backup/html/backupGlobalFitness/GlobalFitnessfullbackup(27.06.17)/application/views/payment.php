<!--chackout_first  -->
<section>
	<div class="container-fluid">
		<div class=" PADD_ThREee">
		    	<div class="col-md-9 col-sm-9 chack_out_one">
		    		<div class="chackout_penal_heading">
				      <h4>Equipment in Your Cart</h4>
				    </div>
		    	</div>

            <div class="row chack_out_one_product">
            	<?php
            	$products = $_SESSION['productDetail']['myextracart'];
					$k = 0;
					foreach($products as $live){

			        	$thisPrice =  $_SESSION['addon'][$k]*$live->Price;
						$totalprice1= $totalprice1+$thisPrice;
						?>
						<div class="col-md-9 col-sm-8 col-xs-4">
							<div class="cart_product_img"><img  src="<?php
                if($live->IsWarranty ==1){
                 echo base_url('/public/assets/images/warranty_img_bottom.png');}else{
                   echo base_url().'/'.$live->Expr1;
                 }
                  ?>" alt="<?php echo $live->ProductName; ?>" ></div>
							<h4 class="chackpro_name web_view">
								<?php if($live->KingdomContingent=="Cardio"){
									 ?>
									<a href="<?php echo base_url('cardio').'/'.$live->Name; ?>"><?php echo $live->Name; ?></a>
									<?php
								}
								else
								{
									?>
									<a href="<?php echo base_url('strength').'/'.$live->Name; ?>"><?php echo $live->Name; ?></a>
									<?php
								}
								?>
							</h4>
						</div>
						<div class="col-md-3 col-sm-4 col-xs-8">
							<h4 class="chackpro_name responsiv">
								<?php if($live->KingdomContingent=="Cardio"){ ?>
									<a href="<?php echo base_url('cardio').'/'.$live->Name; ?>"><?php echo $live->Name; ?></a>
									<?php
								}
								else
								{
									?>
									<a href="<?php echo base_url('strength').'/'.$live->Name; ?>"><?php echo $live->Name; ?></a>
									<?php
								}
								?>
							</h4>

							<div class="joint_penal_group">
								<div class="joint_one">
									<div class="parice_check">Price</div>
									<div class="parice_check_total"><?php
									print_r($live->Price);
									 preg_replace('/[^A-Za-z0-9\-(.)]/', '', $live->Price);
									// print_r($live->Price);die();
									?></div>
									<!-- preg_replace('/[^A-Za-z0-9\-(.)]/', '', $live->Price); -->
								</div>
								<div class="joint_one">
									<div class="parice_check">Quantity</div>
									<div class="parice_check_total"><?php echo $_SESSION['addon'][$k]; ?></div>
								</div>
							   <!-- <div class="joint_one">
									<div class="parice_check red_color">Shipping</div>
									<div id="shipingprice" class="parice_check_total red_color">0.00</div>
							   </div>
							   <div class="joint_one">
									<div class="parice_check red_color">Tax</div>
									<div class="parice_check_total red_color">0.00</div>
								</div> -->
								<div class="border_bot"></div>
							  <!-- <div class="joint_one">
									<div class="parice_check">Subtotal</div>
									<div class="parice_check_total">$<?php // echo $thisPrice ; ?></div>

								</div>-->

							</div>
						</div>
						<?php
					$k++;
					}
            	$totalshipcharges = 0;
            	$totalprice = 0;
				$totalWeight=0;
				$total_main_price = 0;

            	 for($i=0; $i<$_SESSION['productDetail']['count'];$i++){

            	 	$thisPrice = 0;
					$thisWeight=0;



			        $product = $this->Site_model->productdetail($_SESSION['productDetail']['addtocart'][$i]);
					foreach($product as $live){

							$thisPrice = $_SESSION['sale'][$i]*preg_replace('/[^A-Za-z0-9\-(.)]/', '', $live->Price);

							//<!-- //preg_replace('/[^A-Za-z0-9\-(.)]/', '', $live->Price); -->
							$totalprice= $totalprice+$thisPrice;
							$total_main_price+=$thisPrice;
							$WeightString = $live->Weight;
							$arrayWeight = explode(" ", $WeightString);
							$Weight = $arrayWeight[1];
							$thisWeight = $_SESSION['sale'][$i]*$Weight;
							$totalWeight = $totalWeight+$thisWeight;
					//echo $Weight;

		    //https://my.yrc.com/dynamic/national/servlet?CONTROLLER=com.rdwy.ec.rexcommon.proxy.http.controller.ProxyApiController&redir=/tfq561&LOGIN_USERID=globalfitness&LOGIN_PASSWORD=d5nuspes&BusId=73176053593&BusRole=Shipper&PaymentTerms=Prepaid&OrigCityName=Gardena&OrigStateCode=CA&OrigZipCode=90249&OrigNationCode=USA&DestCityName=Danville&DestStateCode=IL&DestZipCode=61832&DestNationCode=USA&ServiceClass=STD&PickupDate=20160510&TypeQuery=QUOTE&LineItemWeight1=500&LineItemNmfcClass1=50&LineItemCount=1&AccOption1=NTFY&AccOptionCount=1&LineItemHandlingUnits1=1&LineItemPackageCode1=SKD&LineItemPackageLength1=48&LineItemPackageWidth1=48&LineItemPackageHeight1=48
	         		  $LOGIN_USERID="globalfitness";
			          $LOGIN_PASSWORD="d5nuspes";
			          $BusId="73176053593";
			          $BusRole="Shipper";
			          $PaymentTerms="Prepaid";
			          $OrigCityName="Gardena";
			          $OrigStateCode="CA";
			          $OrigZipCode="90249";
			          $OrigNationCode="USA";
			          $DestCityName=$_SESSION['shipping']['city'];
			          $DestStateCode=$_SESSION['shipping']['state'];
			          $DestZipCode=$_SESSION['shipping']['zipcode'];
			          $DestNationCode="USA";
			          $ServiceClass="STD";
			          $PickupDate=date("Ymd");
			          $TypeQuery="QUOTE";
			          $LineItemWeight1=$Weight;
			          $LineItemNmfcClass1="70";
			          $LineItemCount="1";
			          $AccOption1="HOMD";
			          $Acc="";
									$url = "https://my.yrc.com/dynamic/national/servlet?CONTROLLER=com.rdwy.ec.rexcommon.proxy.http.controller.ProxyApiController&redir=/tfq561&LOGIN_USERID=".$LOGIN_USERID."&LOGIN_PASSWORD=".$LOGIN_PASSWORD."&BusId=".$BusId."&BusRole=".$BusRole."&PaymentTerms=".$PaymentTerms."&OrigCityName=".$OrigCityName."&OrigStateCode=".$OrigStateCode."&OrigZipCode=".$OrigZipCode."&OrigNationCode=".$OrigNationCode."&DestCityName=".$DestCityName."&DestStateCode=".$DestStateCode."&DestZipCode=".$DestZipCode."&DestNationCode=".$DestNationCode."&ServiceClass=".$ServiceClass."&PickupDate=".$PickupDate."&TypeQuery=".$TypeQuery."&LineItemWeight1=".$LineItemWeight1."&LineItemNmfcClass1=".$LineItemNmfcClass1."&LineItemCount=".$LineItemCount."&AccOption1=".$AccOption1."&AccOptionCount=1&LineItemHandlingUnits1=1&LineItemPackageCode1=SKD&LineItemPackageLength1=48&LineItemPackageWidth1=48&LineItemPackageHeight1=48";
          	// $url = htmlentities($url);
           //echo $url;
          $url = str_replace(' ', '%20', $url);
          $curl = curl_init($url);
          curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
          curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
          $transaction= curl_exec($curl);
          curl_close($curl);
          $transaction = simplexml_load_string($transaction);
          //  echo "<pre>";print_r($transaction);die;
          $charges = $transaction->BodyMain->RateQuote->RatedCharges->TotalCharges;
					$mycharges =  number_format(($charges/100),2);
					$thischarges = $mycharges*$_SESSION['sale'][$i];
					$totalprice+=$thischarges;
       	?>
			        	<div class="col-md-9 col-sm-8 col-xs-4">
					      <div class="cart_product_img"><img src="<?php echo base_url().'/'.$live->ImageURL; ?>" alt="<?php echo $live->ProductName; ?>" title="<?php echo $live->MetaDetailPageTitleTag; ?>">
					      	<?php // echo $url; ?>

					      </div>
					      <h4 class="chackpro_name web_view">
					      	<?php if($live->Kingdom=="Cardio"){ ?>
		                        <a href="<?php echo base_url('fitness_equipment').'/'.$link; ?>"><?php echo $live->ProductName; ?></a>
		                        <?php
		                      }
		                      else
		                      {
		                        ?>
		                        <a href="<?php echo base_url('strength_equipment').'/'.$link; ?>"><?php echo $live->ProductName; ?></a>
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
			                        <a href="<?php echo base_url('strength_equipment').'/'.$link; ?>"><?php echo $live->ProductName; ?></a>
			                        <?php
			                      }
			                    ?>
							</h4>

							<div class="joint_penal_group">
							  <div class="joint_one">
									<div class="parice_check">Price</div>
					<div class="parice_check_total"><?php
					print_r($live->Price);
					preg_replace('/[^A-Za-z0-9\-(.)]/', '', $live->Price); ?></div>
							   </div>  <!-- preg_replace('/[^A-Za-z0-9\-(.)]/', '', $live->Price); -->
							   <div class="joint_one">
									<div class="parice_check">Quantity</div>
									<div class="parice_check_total"><?php echo $_SESSION['sale'][$i]; ?></div>
							   </div>
							   <div class="joint_one">
									<div class="parice_check red_color">Shipping</div>
									<div id="shipingprice" class="parice_check_total red_color"><?php

										$totalshipcharges+=$thischarges;
                    echo "$". number_format($thischarges,2,".",",");

									 ?></div>
							   </div>

							   <div class="border_bot"></div>

							</div>
							</div>
			        	<?php
			        }
			    }
				?>
            <div class="col-md-9 col-sm-8 col-xs-4">
		     </div>

		    <div class="col-md-3 col-sm-4 col-xs-8">
		    	<?php
		    //	echo $totalprice;
					if($_SESSION['shipping']['home']=="0"){
						$totalprice+=300;
						?>
							<div class="joint_penal_group">
						   <div class="border_bot"></div>
						   <div class="joint_one">

								<b>$300.00 White Glove Delivery</b>

						   </div>

						</div>

						<?php

					}
				?>

			<div class="joint_penal_group">
			   <div class="border_bot"></div>
			   <div class="joint_one">
					<div class="parice_check">Total</div>
					<div class="parice_check_total"><?php
									if(isset($_SESSION['totaldiscountPrice'])){
										if(isset($totalprice1)){
								$_SESSION['totalPrice'] = $_SESSION['totaldiscountPrice']+$totalprice1;
									}else{
								$_SESSION['totalPrice'] = $_SESSION['totaldiscountPrice'];
									 	}
									 }else{
									 	if(isset($totalprice1)){
								$_SESSION['totalPrice'] = $totalprice+$totalprice1;
									 	}else{
								$_SESSION['totalPrice'] = $totalprice;
											}
								    	}
								echo "$".number_format($_SESSION['totalPrice'],2,".",",");
								?></div>
					<!-- preg_replace('/[^A-Za-z0-9\-(.)]/', '', $totalprice); -->
			   </div>

			</div>
			</div>



			<!-- <div class="col-md-6 col-sm-6 col-xs-6">
			<p class="align_right color_blue web_view">Enter a Promotional Code</p>
		    </div>
			<div class="col-md-6 col-sm-6 col-xs-6">
				<div class="edit_button text_right"><button type="button" class="btn btn-default">edit</button></div>
			</div> -->
		</div>
		</div>


			<!-- <div class="row border_res repon">
				<div class="col-md-6">
					<p class="align_right color_blue responsiv">Promo Code?</p>
				</div>
				<div class="col-md-6"><div class="edit_button web_view"><button type="button" class="btn btn-default">edit</button></div></div>
			</div> -->
		<div class="row PADD_ThREee">
			<div class="col-md-12 col-sm-12 chack_out_one_accordian">
					<ul id="accordion" class="accordion">
					  <li>
					    <div class="link">
					    	<a href="#ShippingDetails" aria-expanded="false" aria-controls="ShippingDetails" class="accordion-title accordionTitle js-accordionTrigger CuStom_ClSSS">
					    		<span>1</span> Shipping Details
								<div class="Edit_BUTTonn_buton_penal pull-right">
									<a class="Edit_BUTTonn_buton" href="<?php echo base_url('/site/step2'); ?>">Edit</a>
								</div>
					    	</a>

					    </div>
						    <ul class="submenuaccordion-content accordionItem is-collapsed" id="ShippingDetails" aria-hidden="true">
						    	<div class="row">
								    <div class="col-md-6 col-sm-6">
								    	<div class="shipping_chack_out">
								    		<span style="color:red;" id="shippingerror"></span>
								    		<div class="shipping_title">Shipping Address</div>
							    			<div class="checkbox">
							    			    <div class="chackbox_left"></div>
												<div class="chackbox_right">
													<?php if(isset($_SESSION['shipping']['buisness'])){ ?>
													<label>This is a business</label>
													<?php } ?>
												</div>
											</div>
								    	</div>
								    	<div class="shipping_form_penal">
								    		<div class="first_penal_ship">
								    			<div class="form-group">
												  <input type="text" id="firstname" class="form-control firstname" name="firstname" readOnly value="<?php echo $_SESSION['shipping']['firstname']; ?>">
												</div>
												<div class="form-group_second">
												  <input type="text" id="lastname" name="lastname" class="form-control lastname" readOnly value="<?php echo $_SESSION['shipping']['lastname']; ?>">
												</div>
								    		</div>

								    		<div class="second_penal_ship">
								    			<div class="form-group">
												  <input type="text" id="CompanyName" name="companyname" class="form-control firstname" readOnly value="<?php echo $_SESSION['shipping']['companyname']; ?>">
												</div>
								    		</div>

								    		<div class="third_penal_ship">
								    			<div class="form-group_area_cod">
												  <input type="text" id="AreaCode" name="areacode" class="form-control AreaCode" readOnly value="<?php echo $_SESSION['shipping']['areacode']; ?>">
												</div>
												<div class="form-group_primary_number">
												  <input type="text" id="PrimaryPhone" name="primaryphone" class="form-control PrimaryPhone" readOnly value="<?php echo $_SESSION['shipping']['primaryphone']; ?>">
												</div>
								    		</div>

								    		<div class="fourth_penal_ship">
								    			<div class="form-group">
												  <input type="text" id="StreetAddress" name="streetadress" class="form-control StreetAddress" readOnly value="<?php echo $_SESSION['shipping']['streetadress']; ?>">
												</div>
								    		</div>

								    		<div class="fourth_penal_ship">
								    			<div class="form-group">
												  <input type="text" id="suite" name="suite" class="form-control" readOnly value="<?php echo $_SESSION['shipping']['suite']; ?>">
												</div>
								    		</div>


								    		<div class="fifth_penal_ship">
								    			<div class="form-group_state">
												  <input type="text" name="city" id="city" class="form-control" readOnly value="<?php echo $_SESSION['shipping']['city']; ?>">
												</div>
								    			<div class="form-group_city">
											        <input type="text"  readOnly value="<?php echo $_SESSION['shipping']['state']; ?>" name="state" id="state" class="form-control" >
												</div>

												<div class="form-group_zipcode">
												  <input name="zipcode" type="text" id="ZipCode" class="form-control" readOnly value="<?php echo $_SESSION['shipping']['zipcode']; ?>">
												</div>
								    		</div>

								    		<div class="last_shipping_chack_out_penal">
									    		<div class="shipping_title">United States</div>
								    			<div class="checkbox">
								    			<label>
								    				<?php
								    					if($_SESSION['shipping']['home']=="0"){
								    						echo "I want this placed inside my home";
								    					}
								    					if($_SESSION['shipping']['home']=="1"){
								    						echo "I want to ship this internationally";
								    					}
								    					if($_SESSION['shipping']['home']=="2"){
								    						echo "I want to pick this up";
								    					}
								    				?></label>

												</div>

								    		</div>

								    	</div>
								    </div>
								    <div class="col-md-6 col-sm-6 padd_lot">
								    	<div class="shipping_title">Shipping Policy</div>
								    	<p class="text_shipping">We do not ship to APO/FPO or PO Boxes.</p>
								    	<p class="text_shipping">We ship to curbside only unless specified below. (fees apply)</p>
								    	<p class="text_shipping">Delivery times are estimates</p>
								    </div>
								</div>

								<div class="row border_top chack_out_contnue_penal">
										<div class="col-md-12 col-sm-12">
										  	<div class="row align_right ">
										  		<div class="col-md-4 col-sm-5 col-md-offset-8">
													<div class="chat_and_chack opn_res">
														<div class="chat"><!-- <a href="">Chat Now</a> --></div>
														<div class="chackout_box_buton"><a href="<?php echo base_url('/site/step2'); ?>">Edit Details</a></div>
													</div>
												</div>
											</div>
										</div>
								</div>

						    </ul>
					  </li>


					  <li>
					    <div class="link">
							<a href="#PaymentDetails" aria-expanded="true" aria-controls="PaymentDetails" class="accordion-title accordionTitle js-accordionTrigger is-collapsed is-expanded"><span>2</span> Payment Details</a>
					    	</div>
						    <ul class="submenuaccordion-content accordionItem is-expanded animateIn" id="PaymentDetails" aria-hidden="false">
    	<form action="" method="post" id="payment">
    	<div class="row">


    		<span style="color:red;" id="paymenterror"></span>
								    <div class="col-md-6 col-sm-6">
								    	<div class="shipping_chack_out">


								    		<div class="shipping_title">Billing Contact</div>
							    			<div class="checkbox">
							    			    <div class="chackbox_left">
							    			    	<input <?php
													if((isset($_SESSION['payment']['same_as'])) && ($_SESSION['payment']['same_as']!="")){ echo 'checked'; } ?>  type="checkbox" id="samechecked" name="same_as" value=""></div>
												<div class="chackbox_right"><label class="color_blue">Same as shipping</label></div>
											</div>
								    	</div>
								    	<div class="shipping_form_penal">
								    		<div class="first_penal_ship">
								    			<div class="form-group">
												  <input type="text" id="firstnames" class="form-control firstname" name="firstname" <?php
													if(isset($_SESSION['payment']['firstname'])){ echo "value='".$_SESSION['payment']['firstname']."'"; } ?> placeholder="First Name">
												</div>
												<div class="form-group_second">
												  <input type="text" id="lastnames" <?php
													if(isset($_SESSION['payment']['lastnames'])){ echo "value='".$_SESSION['payment']['lastnames']."'"; } ?> name="lastnames" class="form-control lastname" placeholder="Last Name">
												</div>
								    		</div>


								    		<div class="third_penal_ship">
								  <!--   			<div class="form-group_area_cod">
												  <input type="text" <?php
													//if(isset($_SESSION['payment']['areacodes'])){ echo "value='".$_SESSION['payment']['areacodes']."'"; } ?> id="areacodes" name="areacodes" class="form-control AreaCode" placeholder="Area Code">
												</div> -->
												<!-- <div class="form-group_primary_number"> -->
												<div class="form-group">
												  <input <?php
													if(isset($_SESSION['payment']['primaryphone'])){ echo "value='".$_SESSION['payment']['primaryphone']."'"; } ?> type="text" id="primaryphones" name="primaryphone" class="form-control PrimaryPhone" placeholder="Primary Phone">
												</div>
								    		</div>
								    		<div class="second_penal_ship">
								    			<div class="form-group">
												  <input <?php
													if(isset($_SESSION['payment']['email'])){ echo "value='".$_SESSION['payment']['email']."'"; } ?> type="text" id="email" name="email" class="form-control EmailAddress" placeholder="Email Address">
												</div>
								    		</div>
								    	</div>


								    	<div class="shipping_chack_out">
								    		<div class="shipping_title">Billing Address</div>
								    	</div>

								    	<?php
											// echo "<pre>";
								   //  		print_r($_SESSION['shipping']);
								   //  		echo "</pre>";
								    	?>


										<div class="shipping_form_penal">

											<div class="second_penal_ship">
								    			<div class="form-group">
												  <input <?php
													if(isset($_SESSION['payment']['companys'])){ echo "value='".$_SESSION['payment']['companys']."'"; } ?> type="text" placeholder="Company Name (optional)" class="form-control firstname" name="companys" id="companynames">
												</div>
								    		</div>

								    		<div class="fourth_penal_ship">
								    			<div class="form-group">
												  <input <?php
													if(isset($_SESSION['payment']['streetadd'])){ echo "value='".$_SESSION['payment']['streetadd']."'"; } ?> type="text" id="streetaddress" class="form-control StreetAddress" name="streetadd" placeholder="Street Address">
												</div>
								    		</div>
								    		<div class="fourth_penal_ship">
								    			<div class="form-group">
												  <input <?php
													if(isset($_SESSION['payment']['suite'])){ echo "value='".$_SESSION['payment']['suite']."'"; } ?> type="text" id="suites" name="suite" class="form-control" placeholder="Suite, Bldg, Apt (optional)">
												</div>
								    		</div>

								    			<div class="fifth_penal_ship" >
													<div class="form-group_zipcode">


													<input <?php
													if(isset($_SESSION['shipping']['zipcode'])){ echo "value='".$_SESSION['shipping']['zipcode']."'"; } ?> name="zipcode" type="text" autocomplete="off" id="ZipCodeasd" class="form-control" placeholder="Zip Code">
													 <table id="ResultCity">
                                                    </table>
                                                    <div class="loder_zip_file"><img style="display:none" id="loader" src="<?php echo base_url(); ?>/public/assets/images/ajax-loader.gif"></div>
													</div>

													<div class="form-group_city">
														<input <?php
													if(isset($_SESSION['shipping']['city'])){ echo "value='".$_SESSION['shipping']['city']."'"; } ?> type="text" name="city" id="cities" class="form-control" readonly placeholder="City">
													</div>

													<div class="form-group_state">
													<input <?php
													if(isset($_SESSION['shipping']['state'])){ echo "value='".$_SESSION['shipping']['state']."'"; } ?> type="text" name="states" style="width:92px" id="states" class="form-control" readonly placeholder="State Code eg. WI">
													</div>



												</div>

							<!-- 	    	  <div class="fifth_penal_ship">
												<div class="form-group_state">
												  <input <?php
													if(isset($_SESSION['payment']['city'])){ echo "value='".$_SESSION['payment']['city']."'"; } ?> type="text" name="city" id="citys" class="form-control"  value="">
												</div>
								    			<div class="form-group_city">
											        <input <?php
													if(isset($_SESSION['payment']['states'])){ echo "value='".$_SESSION['payment']['states']."'"; } ?> type="text" name="states" id="states" class="form-control" placeholder="State Code eg. WI">
												</div>
												<div class="form-group_zipcode">
												  <input <?php
													if(isset($_SESSION['payment']['zipcode'])){ echo "value='".$_SESSION['payment']['zipcode']."'"; } ?> name="zipcode" type="text" id="zipcodes" class="form-control" value="">
												</div>
								    		</div> -->
								    		<div class="last_shipping_chack_out_penal">
									    		<div class="shipping_title">United States</div>

								    		</div>

								    	</div>
								    </div>
								    <div class="col-md-6 col-sm-6 padd_lot">

							    	<div class="shipping_title">Payment Method</div>
								    	<div class="payment_chack_prop">
								    		<div class="radio-inline">

								    		<input checked type="radio" value="0" name="paymenttype"></div>
								    		<div class="payment_metod_img">
								    		   <img src="<?php echo base_url('public/assets/images/payment_method_img.png'); ?>" alt=""/>
								    		</div>
								    	</div>

                                  <div class="payment_padding">
                                  	<div class="payment_penal_ship">
						    			<div class="form-group_citychackout">
						    				<b>Card Type</b>
										</div>
										<div class="form-group_SecurityCode">
										  <!-- <input type="text" id="Craditcard" class="form-control" placeholder="Credit or Debit Card Number"> -->
										  <select name="cardtype" id="cardtype">
									            <option value="visa">Visa</option>
									            <option value="MasterCard">MasterCard</option>
									            <option value="AmericanExpress">American Express</option>
									          </select>
										</div>
						    		</div>
						    		<div class="payment_penal_ship">
						    			<div class="form-group_citychackout">
						    				<b>Card Holder Name</b>
										</div>
										<div class="form-group_SecurityCode">
										<input type="text" id="cardholder" name="cardholder" class="form-control" placeholder="e.g. John Smith">

										</div>
						    		</div>
						    		<div class="payment_penal_ship">
						    			<div class="form-group_citychackout">
						    			<input type="text" id="cardnumber" name="cardnumber" class="form-control" placeholder="Credit or Debit Card Number">
										</div>
										<div class="form-group_SecurityCode">
										  <input type="text" id="cardcvv" name="cardcvv" class="form-control" placeholder="Security Code">
										</div>
										<span data-toggle="modal" data-target="#Modal_QUSTION">?</span>
						    		</div>

						    		<div class="payment_penal_ship">
						    			<div class="form-group_mounth_chackout">
						    			<input type="text" id="cardmonth" name="cardmonth" class="form-control" placeholder="Month(mm)">
										</div>
										<div class="form-group_year_expire">
										  <input type="text" id="cardyear" name="cardyear" class="form-control" placeholder="Year(yyyy)">
										</div>
										<div class="expirecrd" >Expires Date</div>
						    		</div>
						    	  </div>
						    	  <div class="payment_chack_prop_bottom">
						    		<div class="radio-inline">
						    			<input type="radio"  value="1" name="paymenttype"></div>
						    		<div class="payment_metod_img">COD / Wire (requires will call / pick up on shipping section 1)</div>
						    		<p class="color_blue">Wire & COD Instructions</p>
	                                </div>
	                                	    	  <div class="payment_chack_prop_bottom">

										<?php
											// if($_SESSION['shipping']['home']=="0"){
											// 	$totalprice+=300;
											// 	echo "<div class='shipping_title'><b>$300.00 White Glove Delivery<br></b></div>";
											// }
										?>


								    	<input type="hidden" name="allshipcharge" value="<?php echo $totalshipcharges; ?>"/>
								    	<input type="hidden" name="allmainpayment" value="<?php echo $total_main_price; ?>"/>
								    	<input type="hidden" name="allpayment" value="<?php
									if(isset($_SESSION['totaldiscountPrice'])){
										if(isset($totalprice1)){
								$_SESSION['totalPrice'] = $_SESSION['totaldiscountPrice']+$totalprice1;
									}else{
								$_SESSION['totalPrice'] = $_SESSION['totaldiscountPrice'];
									 	}
									 }else{
									 	if(isset($totalprice1)){
								$_SESSION['totalPrice'] = $totalprice+$totalprice1;
									 	}else{
								$_SESSION['totalPrice'] = $totalprice;
											}
								    	}
								echo $_SESSION['totalPrice'];
								?>"/>
									  		</div>
    							    </div>
								</div>
								<div class="row border_top chack_out_contnue_penal">
									<div class="col-md-12 col-sm-12">

									  	<div class="row align_right ">
									  		<div class="col-md-4 col-sm-5 col-md-offset-8">
												<div class="chat_and_chack opn_res">
													<div class="chat"><!-- <a href="">Chat Now</a> --></div>
													<div class="chackout_box_buton"><a href="#" id="billingclick">Continue</a></div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</form>
						    </ul>
					  </li>
<?php if($this->session->userdata('userId')==""){ ?>
					  <li>
					  	<div class="link">
					    <a href="#Account" aria-expanded="false" aria-controls="Account" class="accordion-title accordionTitle js-accordionTrigger"><span>3</span> Account</a></div>
						  <!--   <ul class="submenuaccordion-content accordionItem is-collapsed" id="Account" aria-hidden="true">
						        <div class="row chackout_account_penal">
									<div class="col-md-12 col-sm-12">
										<div class="row">
							            	<div class="col-md-6 col-sm-6">
									    		<div class="shipping_title">Would you like to Create an account?</div>
									    		<p class="text_shipping">Creating an account gives you access to product news, online warranty support and service tickets, waitlists and more!</p>
									    	</div>
									    	<div class="col-md-6 col-sm-6">

									    		<div class="shipping_title"><span>Username:</span> labistour@yahoo.com</div>
												<div class="form-group account_inputs_chackout">
												  <input type="text" placeholder="New Password (at least 8 characters)" class="form-control" id="newpassword">
												</div>

												<div class="form-group account_inputs_chackout">
												  <input type="text" placeholder="Confirm Password" class="form-control" id="conformpassword">
												</div>

												<div class="checkbox_account">
							    			    	<div class="chackbox_left"><input type="checkbox" value=""></div>
													<div class="chackbox_right">Keep me up to date with news and the latest information on products and services from Global Fitness!</div>
											    </div>


									    	</div>

									    </div>
									</div>
								</div>




								<div class="row border_top chack_out_contnue_penal">
									<div class="col-md-12 col-sm-12">
									  	<div class="row align_right ">
											<div class="col-md-8 col-sm-7">
									  			<div class="checkbox_account_penal">
							    			    	<div class="chackbox_left"><input type="checkbox" value=""></div>
													<div class="chackbox_right">I agree to the <p class="color_blue">terms and conditions.</p></div>
											    </div>
										    </div>
									  		<div class="col-md-4 col-sm-5">
												<div class="chat_and_chack opn_res">
													<div class="chat"><a href="">Chat Now</a></div>
													<div class="chackout_box_buton"><a href="">Continue as Guest</a></div>
												</div>
											</div>
										</div>
									</div>
								</div>


						    </ul> -->
					  </li>
					  <?php } ?>
					</ul>
				 </div>
		</div>
	    <div class="row PADD_ThREee">
	    	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 chackoutpage_border_bg">

	    	</div>
	    </div>

	    <div class="row PADD_ThREee">
			<div class="col-md-12 col-sm-12 Chack_out_question">
				<div class="chackout_penal_heading">
				    <h3>Questions</h3>
				</div>
			</div>
		</div>

		<div class="row PADD_ThREee">
			<div class="col-md-6 col-sm-6 Chack_out_question_content mobile_off">
				<div class="Ouestion_penal_left">
					<h3>How do I track my order?</h3>
					<p>Global Fitness will email you when your order ships from our warehouse. The email will contain the tracking number & carrier information with  instuctions on how to track your order.shipping company and tra</p>
				</div>

				<div class="Ouestion_penal_left">
					<h3>Do you offer free shipping in the LA basin?</h3>
					<p>More often than not we can offer free delivery in the Los Angeles area, however this would need to be arranged and accounted for at the time of sale or you can contact your sales representative for offers and restrictions on free local deliveries.</p>
				</div>
			</div>

			<div class="col-md-6 col-sm-6 Chack_out_question_content mobile_off">
				<div class="Ouestion_penal_right">
					<h3>How will my equipment be delivered to me?</h3>
					<p>Our fitness equipment is delivered with common carriers with a lift-gate & unless an inside delivery was purchased at the time of sale or other arrangements were made, the unit will be delivered curbside. It would be your responsibility to move it into your home as common carriers are neither equipped nor insured to enter your home.</p>
				</div>

				<div class="Ouestion_penal_right">
					<h3>When will my credit card be charged?</h3>
					<p>Your card is only authorized at the time you place your order, the authorization is only settled when we ship your order. However, depending on your bank or card issuer the authorization may show as pending & the amount reserved on your credit card.	 </p>
				</div>
			</div>
		</div>



		<!-- responsive_view -->
			<div class="row  PADD_ThREee">
				<div class="col-md-12 col-sm-12 chackout_mobile_view_question">
				<div class="accordin">
				 <dl>
				<div class="chack_out_question">
				   <dt>
				    <a class="accordion-title accordionTitle js-accordionTrigger" aria-controls="product3" aria-expanded="false" href="#question1">
				     How do I track my order?<div class="arrw"><span class="bar top"></span><span class="bar bottom"></span></div>
				    </a>
				  </dt>
				  <dd aria-hidden="true" id="question1" class="accordion-content accordionItem is-collapsed">
				      <div class="accordian_inner_con">
						<div class="Ouestion_penal_right">
							<p>Global Fitness will email you when your order ships from our warehouse. The email will contain the tracking number & carrier information with  instuctions on how to track your order.shipping company and tra</p>
						</div>
				      </div>
				  </dd>
				</div>
				<div class="chack_out_question">
				   <dt>
				    <a class="accordion-title accordionTitle js-accordionTrigger" aria-controls="product3" aria-expanded="false" href="#question2">
				     Do you offer free shipping in the LA basin?<div class="arrw"><span class="bar top"></span><span class="bar bottom"></span></div>
				    </a>
				  </dt>
				  <dd aria-hidden="true" id="question2" class="accordion-content accordionItem is-collapsed">
				      <div class="accordian_inner_con">
						<div class="Ouestion_penal_right">
							<p>More often than not we can offer free delivery in the Los Angeles area, however this would need to be arranged and accounted for at the time of sale or you can contact your sales representative for offers and restrictions on free local deliveries.</p>
						</div>
				      </div>
				  </dd>
				</div>

				<div class="chack_out_question">
				   <dt>
				    <a class="accordion-title accordionTitle js-accordionTrigger" aria-controls="product3" aria-expanded="false" href="#question3">
				     How will my equipment be delivered to me?<div class="arrw"><span class="bar top"></span><span class="bar bottom"></span></div>
				    </a>
				  </dt>
				  <dd aria-hidden="true" id="question3" class="accordion-content accordionItem is-collapsed">
				      <div class="accordian_inner_con">
						<div class="Ouestion_penal_right">
							<p>Our fitness equipment is delivered with common carriers with a lift-gate & unless an inside delivery was purchased at the time of sale or other arrangements were made, the unit will be delivered curbside. It would be your responsibility to move it into your home as common carriers are neither equipped nor insured to enter your home.</p>
						</div>
				      </div>
				  </dd>
				</div>
				<div class="chack_out_question">
				   <dt>
				    <a class="accordion-title accordionTitle js-accordionTrigger" aria-controls="product3" aria-expanded="false" href="#question4">
				     When will my credit card be charged?<div class="arrw"><span class="bar top"></span><span class="bar bottom"></span></div>
				    </a>
				  </dt>
				  <dd aria-hidden="true" id="question4" class="accordion-content accordionItem is-collapsed">
				      <div class="accordian_inner_con">
						<div class="Ouestion_penal_right">
					<p>Your card is only authorized at the time you place your order, the authorization is only settled when we ship your order. However, depending on your bank or card issuer the authorization may show as pending & the amount reserved on your credit card. </p>
						</div>
				      </div>
				  </dd>
				</div>


				</dl>
				</div>
				</div>
			</div>
		<!-- responsive_view -->

	</div>
</section>

<input type="hidden" id="buisness_home_val" value="<?php echo $_SESSION['shipping']['home'] ; ?>">


<script>

function AddCity(city,state)
{
	$("#cities").val(city);
	$("#states").val(state);
	$("#ResultCity").html('');

}
 $('#ZipCodeasd').on('keyup', function () {
        var key = $('#ZipCodeasd').val();
        if (key && key.length > 0)
        {

          $("#loader").css("display","block");
          req = $.ajax({
            url: '<?php echo base_url(); ?>Site/searchcity',
            type: 'POST',
            cache: false,
            data: {
               keysearch: key
            },
            success: function (data)
            {
            console.log(data);
           var data=data.trim();
            if (data && data!='0')
            {
              $("#ResultCity").html(data);
            }else{

              $("#ResultCity").html('<tr style="padding:6px" colspan="3"><td><a>"Invalid US Zip Code,are you wanting to ship internationally,please select the options to do so?"</a></td></tr>');
                $("#cities").val('');
                $("#states").val('');
            }
            $("#loader").css("display","none");
          }
        });
        } else{
			$("#ResultCity").html('');
			$("#cities").val('');
			$("#states").val('');
        }

      });
	$("#billingclick").click(function(e){
		e.preventDefault();
		$error = "";

		$emailrejax = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

		$rejax = /^[1-9]{1}[0-9]{9}$/;

		if($("#firstnames").val()==""){
			$error += "* Please Fill the First Name Field <br>";
		}

		if($("#areacodes").val()==""){
			$error += "* Please Fill the Area Code Field <br>";
		}

		if($("#primaryphones").val()==""){
			$error += "* Please Fill the Primary Phone Field <br>";
		}else if($rejax.test($("#primaryphones").val()) == false){
				$error += "* Please enter valid 10 digit Phone Number <br>";
			}

		<?php
			if(isset($_SESSION['shipping']['buisness']) && $_SESSION['shipping']['buisness']==1){
		?>
				if($("#companynames").val()==""){
					$error += "* Please Fill the Company Name Field <br>";
				}
		<?php
			}
		?>

		if($("#streetaddress").val()==""){
			$error += "* Please Fill the Street Address Field <br>";
		}

		if($("#states").val()==""){
			$error += "* Please Fill the State Field <br>";
		}if($("#email").val()==""){
			$error += "* Please Fill the Email Field <br>";
		}else if($emailrejax.test($("#email").val()) == false){
				$error += "* Please enter valid email <br>";
			}

		if($("#citys").val()==""){
			$error += "* Please Fill the City Field <br>";
		}

		if($("#zipcodes").val()==""){
			$error += "* Please Fill the Zipcodes Field <br>";
		}

		// if($("#suites").val()==""){
		// 	$error += "* Please Fill the Additional Suites,Bags Field <br>";
		// }
		if($error!="")
		{
			$("#paymenterror").html($error);
		}
		else{
				if($("#payment input[type='radio']:checked").val()=="1"){
					$("#paymenterror").html("");
					if($("#buisness_home_val").val()!=2){
						$('#Modal_important_cod').modal('show');
					 	return false;
					}
					else{
						$("#payment").submit();
					}
				}
				else
				{
					$kerror="";
						if($("#cardtype").val()==""){
							$kerror += "* Please Select Card<br>";
						}
						if($("#cardholder").val()==""){
							$kerror += "* Please Fill Card Holder Name<br>";
						}
						if($("#cardnumber").val()==""){
							$kerror += "* Please Fill Card Number<br>";
						}
						if($("#cardcvv").val()==""){
							$kerror += "* Please Fill CVV Number<br>";
						}
						if($("#cardmonth").val()==""){
							$kerror += "* Please Select Month<br>";
						}
						if($("#cardyear").val()==""){
							$kerror += "* Please Select Year<br>";
						}


					if($kerror==""){
						$("#paymenterror").html("");
						$.ajax(
					    {
						 type: 'post',
						 url: $base_url+"/site/pay",
						 data : $("#payment").serialize(),
						 cache:false,
						 success: function(data)
						 {
						 	console.log(data)
						 	if(data=="Payment Success"){
						 			$("#paymenterror").text("Pay Successfully.");
						 		setInterval(function(){
						 			$("#payment").submit();
						 		 }, 3000);
						 	}
						 	else{
						 		// alert('1');
						 			$('#myModal_card_error').modal('show');
						 		// $("#paymenterror").html(data);
						 	}
						 }
				 	 });
					}
					else{
						// alert('0');
						$('#myModal_card_error').modal('show');
						// $("#paymenterror").html($kerror);
					}
				}
		}


		// return false;


		// if(($("#").val()!="") && ($("#areacodes").val()!="") && ($("#primaryphones").val()!="") && ($("#companynames").val()!="") && ($("#streetaddress").val()!="") && ($("#states").val()!="") && ($("#citys").val()!="") && ($("#zipcodes").val()!="") && ($("#suites").val()!="")){


		// 		if($("#payment input[type='radio']:checked").val()=="1"){
		// 			$("#payment").submit();
		// 		}
		// 		else
		// 		{
		// 			if(($("#cardtype").val()!="") && ($("#cardholder").val()!="") && ($("#cardnumber").val()!="") && ($("#cardcvv").val()!="") && ($("#cardmonth").val()!="") && ($("#cardyear").val()!="")){
		// 				$.ajax(
		// 			    {
		// 				 type: 'post',
		// 				 url: $base_url+"/site/pay",
		// 				 data : $("#payment").serialize(),
		// 				 cache:false,
		// 				 success: function(data)
		// 				 {
		// 				 	if(data=="Payment Success"){
		// 				 			$("#paymenterror").text("Pay successfully.");
		// 				 		setInterval(function(){
		// 				 			$("#payment").submit();
		// 				 		 }, 3000);
		// 				 	}
		// 				 	else{
		// 				 		$("#paymenterror").text(data);
		// 				 	}
		// 				 }
		// 		 	 });
		// 			}
		// 			else{
		// 				$("#paymenterror").text("All Fields of cards are required.");
		// 			}
		// 		}
		// }
		// else
		// {
		// 	$("#paymenterror").text("All Fields are required. ");
		// }
	});
</script>
