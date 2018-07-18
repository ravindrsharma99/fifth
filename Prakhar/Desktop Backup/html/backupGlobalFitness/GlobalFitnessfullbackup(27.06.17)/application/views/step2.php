<!--chackout_first  -->
<style>
.displaynone{
	display: none;
}
</style>
<?php
error_reporting(0);
ini_set('display_errors',0);
?>
<script type="text/javascript">
	function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        $("#true").text('Please Enter Numeric Value');
        $("#true").show();
        return false;
    }else{
    	$("#true").hide();
    return true;
    }
}

</script>

<div class="margen_top">
	<div class="container-fluid">
	</div>
</div>
<section >
	<div class="container-fluid">
		<div class="row PADD_ThREee">
			<div class="col-md-9 col-sm-9">
				<div class="chackout_penal_heading">
					<h4>Equipment in Your Cart</h4>
				</div>
			</div>
			<div class="row chack_out_one_product chack_out_one">
				<?php
				$totalprice = 0;
				$totalWeight=0;
				$rk = 1;
				$rs = 1;
				$rss = 10;
					$thisPrice = 0;
					$thisWeight = 0;
					$product = $this->Site_model->productdetail($_SESSION['productDetail']['addtocart'][$i]);
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
									// print_r($link);die();
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
								<div class="border_bot"></div>
							</div>
						</div>
						<?php
					$k++;
					}

?>
			<div class="row chack_out_one_product chack_out_one">
				<?php
				$totalprice = 0;
				$totalWeight=0;
				for($i=0; $i<$_SESSION['productDetail']['count'];$i++){
					$thisPrice = 0;
					$thisWeight = 0;
					$product = $this->Site_model->productdetail($_SESSION['productDetail']['addtocart'][$i]);
					foreach($product as $live){

			        		//print_r($_SESSION['sale'][$i]*trim($live->Price,'$')); die;
						$thisPrice = $_SESSION['sale'][$i]*preg_replace('/[^A-Za-z0-9\-(.)]/', '', $live->Price);
						/*preg_replace('/[^A-Za-z0-9\-(.)]/', '', $live->Price)*/

						$totalprice= $totalprice+$thisPrice;
						$WeightString = $live->Weight;
						$arrayWeight = explode(" ", $WeightString);
						$Weight = $arrayWeight[1];
						$thisWeight = $_SESSION['sale'][$i]*$Weight;
						$totalWeight=$totalWeight+$thisWeight;
						// echo "<pre>"; print_r($totalWieght); echo "</pre>"; die;
						?>
						<div class="col-md-9 col-sm-8 col-xs-4">
							<div class="cart_product_img"><img src="<?php echo base_url().'/'.$live->ImageURL; ?>" alt="<?php echo $live->ProductName; ?>" title="<?php echo $live->MetaDetailPageTitleTag; ?>"></div>
							<h4 class="chackpro_name web_view">
								<?php if($live->Kingdom=="Cardio"){
									// print_r($link);die();
									 ?>
									<a href="<?php echo base_url('cardio').'/'.$live->ProductName; ?>"><?php echo $live->ProductName; ?></a>
									<?php
								}
								else
								{
									?>
									<a href="<?php echo base_url('strength').'/'.$live->ProductName; ?>"><?php echo $live->ProductName; ?></a>
									<?php
								}
								?>
							</h4>
						</div>
						<div class="col-md-3 col-sm-4 col-xs-8">
							<h4 class="chackpro_name responsiv">
								<?php if($live->Kingdom=="Cardio"){ ?>
									<a href="<?php echo base_url('cardio').'/'.$live->ProductName; ?>"><?php echo $live->ProductName; ?></a>
									<?php
								}
								else
								{
									?>
									<a href="<?php echo base_url('strength').'/'.$live->ProductName; ?>"><?php echo $live->ProductName; ?></a>
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
									<div class="parice_check_total"><?php echo $_SESSION['sale'][$i]; ?></div>
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
					}
				}

// print_r($thisWeight);die;

				?>
				<div class="col-md-9 col-sm-8 col-xs-4">
				</div>

				<div class="col-md-3 col-sm-4 col-xs-8">

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
								?>
								<!-- preg_replace('/[^A-Za-z0-9\-(.)]/', '', $live->Price); -->
							</div>
						</div>
					</div>
				</div>
<script type="text/javascript">

$(document).ready(function()
    {

         $("#hidepara").click(function(){
          // alert('working');

         $('#hiding').addClass('displaynone');
         $('#showing').removeClass('displaynone');
      });

    }
);
</script>


			<div class="col-md-6 col-sm-6 col-xs-6" id ="hiding">
			<a class="align_left color_blue web_view" id ="hidepara">Enter a Promotional Code</a>
		    </div>

		    	  <?php
		    if(isset($_SESSION['display_message'])){
		    	?>
			<div class="col-md-6 col-sm-6 col-xs-6" id ="hiding"> <?php
									echo  '<a class="align_left color_blue web_view">'.$_SESSION['display_message'];
									unset($_SESSION['display_message']);
									unset($_SESSION['promocode_name']);
									// print_r($_SESSION['display_message']);die();
								echo "</div>";} ?>
		    <form method="post" action="">
		    <div class="col-md-3 col-md-offset-3 col-sm-6 col-xs-6 displaynone" id ="showing">
			 <input type = "text" name="PromoCode" class= "pull-right color_blue promocode_box" id ="promocode"> </input>
		    </div>
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="edit_button text_right"><button type="submit" name="submitpromo" class="btn btn-default">edit</button></div>
			</div>
			</form>
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
							<div class="link"><a href="#ShippingDetails" aria-expanded="true" aria-controls="ShippingDetails" class="accordion-title accordionTitle js-accordionTrigger is-collapsed is-expanded"><span>1</span> Shipping Details</a></div>
							<ul class="submenuaccordion-content accordionItem is-expanded animateIn" id="ShippingDetails" aria-hidden="false">
								<form action="" id="shipform" method="post">
									<div class="row">
										<div class="col-md-6 col-sm-6">
											<div class="shipping_chack_out">
												<span style="font-weight:10px" id ="true"></span>
												<span style="color:red;" id="shippingerror"></span>
												<div class="shipping_title">Shipping Address</div>

												<div class="checkbox">

													<div class="chackbox_left"><input <?php
													if((isset($_SESSION['shipping']['buisness'])) && ($_SESSION['shipping']['buisness']=="1")){ echo 'checked'; } ?> type="checkbox" name="buisness" value="1" id="buisness_checkbox"></div>
													<div class="chackbox_right"><label>This is a business</label></div>
												</div>
											</div>
											<div class="shipping_form_penal">
												<div class="first_penal_ship">
													<div class="form-group">
														<input type="text" <?php
													if(isset($_SESSION['shipping']['firstname'])){ echo "value='".$_SESSION['shipping']['firstname']."'"; } ?> id="firstname" class="form-control firstname" name="firstname" placeholder="First Name">
													</div>
													<div class="form-group_second">
														<input type="text" <?php
													if(isset($_SESSION['shipping']['lastname'])){ echo "value='".$_SESSION['shipping']['lastname']."'"; } ?> id="lastname" name="lastname" class="form-control lastname" placeholder="Last Name">
													</div>
												</div>

												<div class="second_penal_ship">
													<div class="form-group">
														<input type="text" <?php
													if(isset($_SESSION['shipping']['companyname'])){ echo "value='".$_SESSION['shipping']['companyname']."'"; } ?> id="CompanyName" name="companyname" class="form-control firstname" placeholder="Company Name (optional)">
													</div>
												</div>

												<div class="third_penal_ship">
													<!-- <div class="form-group_area_cod">
														<input type="text" id="AreaCode" <?php
													//if(isset($_SESSION['shipping']['areacode'])){ echo "value='".$_SESSION['shipping']['areacode']."'"; } ?> name="areacode" class="form-control AreaCode" onkeypress="return isNumber(event)" placeholder="Area Code">
													</div>
													<div class="form-group_primary_number">-->
													<div class="form-group">
														<input type="text" id="PrimaryPhone" <?php
													if(isset($_SESSION['shipping']['primaryphone'])){ echo "value='".$_SESSION['shipping']['primaryphone']."'"; } ?> name="primaryphone" class="form-control PrimaryPhone" onkeypress="return isNumber(event)" placeholder="Primary Phone">
													</div>
												</div>

												<div class="fourth_penal_ship">
													<div class="form-group">
														<input type="text" <?php
													if(isset($_SESSION['shipping']['streetadress'])){ echo "value='".$_SESSION['shipping']['streetadress']."'"; } ?> id="StreetAddress" name="streetadress" class="form-control StreetAddress" placeholder="Street Address">
													</div>
												</div>
												<div class="fourth_penal_ship">
													<div class="form-group">
														<input type="text" <?php
													if(isset($_SESSION['shipping']['suite'])){ echo "value='".$_SESSION['shipping']['suite']."'"; } ?> id="suite" name="suite" class="form-control" placeholder="Suite, Bldg, Apt (optional)">
													</div>
												</div>


												<div class="fifth_penal_ship" >
													<div class="form-group_zipcode">


													<input <?php
													if(isset($_SESSION['shipping']['zipcode'])){ echo "value='".$_SESSION['shipping']['zipcode']."'"; } ?> name="zipcode" type="text" autocomplete="off" id="ZipCode" onkeypress="return isNumber(event)" onblur="AddCity2(this.value)"  class="form-control" placeholder="Zip Code">
													 <table id="ResultCity">
                                                    </table>
                                                    <div class="loder_zip_file"><img style="display:none" id="loader" src="<?php echo base_url(); ?>/public/assets/images/ajax-loader.gif"></div>
													</div>

													<div class="form-group_city">
														<input <?php
													if(isset($_SESSION['shipping']['city'])){ echo "value='".$_SESSION['shipping']['city']."'"; } ?> type="text" name="city" id="city" class="form-control" readonly placeholder="City">
													</div>

													<div class="form-group_state">
													<input <?php
													if(isset($_SESSION['shipping']['state'])){ echo "value='".$_SESSION['shipping']['state']."'"; } ?> type="text" name="state" style="width:92px" id="state" class="form-control" readonly placeholder="State Code eg. WI">
													</div>



												</div>

												<div class="last_shipping_chack_out_penal">
													<div class="shipping_title">United States</div>
													<div class="checkbox">
														<div class="chackbox_left">
															<input  type="checkbox" <?php
													if((isset($_SESSION['shipping']['home'])) && ($_SESSION['shipping']['home']=="0")){ echo 'checked'; } ?> value="0" name="home"></div>
															<div class="chackbox_right"><label>I want this placed inside my home</label></div>
															<div class="chackbox_right gloveDelivery" style="display:none"><b>$300.00 White Glove Delivery</b><br></div>
														</div>

														<div class="checkbox">
															<div class="chackbox_left">
																<input type="checkbox" <?php
													if((isset($_SESSION['shipping']['home'])) && ($_SESSION['shipping']['home']=="1")){ echo 'checked'; } ?> value="1" name="home"></div>
																<div class="chackbox_right"><label>I want to ship this internationally</label></div>

															</div>
															<div class="checkbox">
																<div class="chackbox_left">
																	<input <?php
													if((isset($_SESSION['shipping']['home'])) && ($_SESSION['shipping']['home']=="2")){ echo 'checked'; } ?> type="checkbox" value="2" name="home"></div>
																	<div class="chackbox_right"><label>I want to pick this up</label></div>
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
															<div class="col-md-12 col-sm-5 pull-right">
																<div class="chat_and_chack opn_res">
																	<div class="chat"><!-- <a href="">Chat Now</a> --></div>
																	<div class="chackout_box_buton"><a href="" id="shipingDetails">Continue</a></div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</form>
										</ul>
									</li>


									<li>
										<div class="link">
											<a href="#PaymentDetails" aria-expanded="false" aria-controls="PaymentDetails" class="accordion-title accordionTitle js-accordionTrigger"><span>2</span> Payment Details</a>
										</div>

									</li>

									<?php if($this->session->userdata('userId')==""){ ?>
										<li>
											<div class="link">
												<a href="#Account" aria-expanded="false" aria-controls="Account" class="accordion-title accordionTitle js-accordionTrigger"><span>3</span> Account</a></div>

											</li> <?php } ?>
										</ul>
									</div>
								</div>
						        <div class="row PADD_ThREee">
						            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 chackoutpage_border_bg">
						            </div>
						        </div>

								<div class="row PADD_ThREee Chack_out_question">
									<div class="col-md-12 col-sm-12">
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
								<div class="row chackout_mobile_view_question">
									<div class="col-md-12 col-sm-12">
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
																<p>Your card is only authorized at the time you place your order, the authorization is only settled when we ship your order. However, depending on your bank or card issuer the authorization may show as pending & the amount reserved on your credit card.</p>
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


<script>

function AddCity(city,state)
{

$("#city").val(city);
$("#state").val(state);
 $("#ResultCity").html('');
/*req = $.ajax({
            url: '<?php echo base_url(); ?>Site/searchState',
            type: 'POST',
            cache: false,
            data: {
               id: zip
            },
            success: function (data)
            {
            //alert(data);
            console.log(data)
            if (data!='')
            {
            	data= JSON.parse(data);
                $("#city").val(data[0].primary_city);
                $("#state").val(data[0].state);
                var zip=data[0].zip;
               var zipLengh= zip.toString().length;

                  if(zipLengh=="1")
                  {
                  	var zip="0000"+zip;
                  }
                  if(zipLengh=="2")
                  {
                  	var zip="000"+zip;
                  }
                  if(zipLengh=="3")
                  {
                  	var zip="00"+zip;
                  }

                  if(zipLengh=="4")
                  {
                  	var zip="0"+zip;
                  }
                   $("#ZipCode").val(zip);


                  $("#ResultCity").html('');

            }else{
              $("#city").val('');
                $("#state").val('');
                $("#ResultCity").html('');
            }
          }*/


}

      $('#ZipCode').on('keyup', function () {
        var key = $('#ZipCode').val();
        if (key && key.length > 0)
        {
          $("#loader").css("display","block");
          req = $.ajax({
            url: '<?php echo base_url(); ?>Site/searchcity',
            type: 'POST',
            data: {
               keysearch: key
            },
            success: function (data)
            {
           var data=data.trim();
            if (data && data!='0')
            {
              $("#ResultCity").html(data);
            }else{
              $("#ResultCity").html('<tr style="padding:6px" colspan="3"><td><a>"Invalid US Zip Code,are you wanting to ship internationally,please select the options to do so?"</a></td></tr>');
                $("#city").val('');
                $("#state").val('');
            }
            $("#loader").css("display","none");
          }
        });
        } else
        {
					$("#ResultCity").html('');
					$("#city").val('');
					$("#state").val('');
        }
      });

</script>
