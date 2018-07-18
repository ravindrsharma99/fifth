     <script src="<?php echo base_url('public/assets/js/jquery-1.8.3.min.js');?>"></script> 
<div class="margen_top">
	<div class="mgnto">
	</div>
</div>
<section class="menual_litracther_penal">
	<div class="container-fluid">
		<div class="row PADD_ThREee">
			<div class="menual_litracther_penal_top">
				<div class="col-md-6 col-sm-6 col-xs-12 MARGEN_ZERO">
					<div class="inventory">
						<h4 class="GYM_HEADNIG">Gym Equipment User Manuals</h4>
					</div>
				</div>
<!-- 				<div class="col-md-6 col-sm-6 col-xs-12 MARGEN_ZERO">
					<h4 class="SAERCH_CUSTOM">Search:</h4>
				<div id="custom-search-input">
					<div class="input-group col-md-12">
						<input type="text" class="form-control input-lg" placeholder="" />
						<span class="input-group-btn">
							<button class="btn btn-info btn-lg" type="button">
								<i class="glyphicon glyphicon-search"></i>
							</button>
						</span>
					</div>
				</div>


				</div> -->
			</div>
		</div>
		<div class="row PADD_ThREee">
			<div class="col-md-12 col-sm-12 col-xs-12 MARGEN_ZERO">
				<div class="menual_litracther">
					<div class="widget stacked widget-table action-table">
						<div class="widget-content"><!-- /widget-content -->
							<table class="table table-striped table-bordered search_inner"  id="hidden-table-info"> 


								<thead>
									<tr style="background: rgb(235, 235, 235) none repeat scroll 0% 0%; font-size: 17px; font-weight:600;">
										<th>User Manuals</th>
										<th class="td-actions">
										</th>
									</tr>
								</thead>
								<tbody>
								<?php foreach ($manuals as $man ) {
								
								?>
									<tr>
										<td><?php echo $man->Name ; ?></td>
										<td class="td-actions">
											<div class="GYM_download">
												<input value="Download" type="button" data-toggle="modal" data-target="#menual_litracther">
											</div>
										</td>
									</tr>
									<?php } ?>
								 <!--    <tr>
										  <td>Apex Fitness 3-stack Multi-Station User Manual (Manufaturers Part Number: AP-MS3 )</td>
										<td class="td-actions">
											<div class="GYM_download">
												<input value="Download" type="button" data-toggle="modal" data-target="#menual_litracther">
											</div>
										</td>
									</tr>
									<tr>
										<td>Concept 2 SkiErg Indoor Nordic Ski Ergometer User Manual (Manufaturers Part Number: 2715-US )</td>
										<td class="td-actions">
											<div class="GYM_download">
												<input value="Download" type="button" data-toggle="modal" data-target="#menual_litracther">
											</div>
										</td>
									</tr> -->
								<!-- 	<tr>
										<td style="height:34px;"></td>
										<td class="td-actions">
										</td>
									</tr>
									<tr>
										<td style="height:34px;"></td>
										<td class="td-actions">
										</td>
									</tr>
									<tr>
										<td style="height:34px;"></td>
										<td class="td-actions">
										</td>
									</tr>
									<tr>
										<td style="height:34px;"></td>
										<td class="td-actions">
										</td>
									</tr> -->
								</tbody>
							</table>
						</div>
						<!-- /widget-content -->
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<!-- modal for menual_litracther start  -->
<div class="modal fade myModal_email" id="menual_litracther" tabindex="-1" role="dialog" aria-labelledby="menual_litracther" aria-hidden="true">
	<div class="modal-dialog email_model_box"><!-- /.modal-dialog -->
		<div class="modal-content"><!-- /.modal-content -->
			<div class="modal-header">
				<div class="paddingg">
					<div class="Email_auttoo">
						<h4 class="modal-title" id="menual_litracther" style="color:#007fff !important;">User Manual Request</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<img src="<?php echo base_url() ?>/public/assets/images/close_icon_popup.png">
						</button>
					</div>
					<div class="modal-body">
					<div class="box">
					<span class="error" id='error' style="color:red;"></span>
				</div>
						<form method='post' name='user_manual' id='user_manual'>
							<div class="first_penal_ship">
								<div class="form-group">
									<input required id="Email_firstname" class="form-control firstname" name="FirstName" value="" placeholder="First Name (required)" type="text">
								</div>
								<div class="form-group_second">
									<input required value="" id="Email_lastname" name="LastName" class="form-control lastname" placeholder="Last Name (required)" type="text">
								</div>
							</div>
							<div class="fourth_penal_ship">
								<div class="form-group">
									<input required id="email_address" value="" name="Email" class="form-control StreetAddress" placeholder="Email address (required)" type="text">
								</div>
							</div>
							<div class="fourth_penal_ship">
								<div class="form-group">
									<input id="SerialNumber" value="" name="SerialNumber" class="form-control StreetAddress" placeholder="Serial Number (Optional)" type="text">
								</div>
							</div>
							<div id="recaptcha2" class='g-recaptcha-response'></div>
							<div class="EmailSubmiuttt_penal green_color" style="margin-top: 12px;">
								<input type='submit' class="btn drop_ad" name='submit_manual' value='Send Email' id='email_request'>
							</div>
						</form>
					</div>
				</div>
				<div class="Email_bottom_foter">
					<h1>Questions</h1>
					<div class="Email_bottom_foter_content">
						<h2>Why do you ask for the serial number of the machine?</h2>
						<p>Global Fitness ask that you provide the serial number for the machine so that we can get you the correct user manual. Often there are many versions that fall under the same, or similar product name, but could in fact be a newer or older product revision, the serial number helps us identify which product revision you own.</p>
					</div>
					<div class="row footer_bottom">
						<div class="col-md-12 col-sm-12">
							<p>Copyright &copy; 2017 Global Fitness, Inc. All rights reserved.</p>
						</div>
					</div>
				</div>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>



    <script src="<?php echo base_url('public/assets/js/bootstrap.min.js') ?>"></script>
    
    <!--common script for all pages-->
   

<script src="https://cdn.datatables.net/1.10.8/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.8/js/dataTables.bootstrap.min.js " type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
  $('#hidden-table-info').DataTable();
});
</script>

<!-- modal for menual_litracther END  -->
