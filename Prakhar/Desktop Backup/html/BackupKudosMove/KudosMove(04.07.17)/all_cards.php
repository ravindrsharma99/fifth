<?php //print_r($money);die; ?>
<div class="panel_Custom">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<form action="<?php echo base_url(); ?>Booking/pay" method="POST">
				<table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
					<tr>
					    <th>Serial No</th>
					    <th>Card No</th>
					    <th>Amount</th>
					    <th>Action</th>
					</tr>
					<?php $i = 1; foreach($card_det as $detail){ ?>
					<tr>
					    <!-- <td><?php echo $i ; ?></td>
					    <input type="hidden" name="id" value="<?php echo $detail->id; ?>">
					    <td><input type="hidden" name="card" value="<?php echo $detail->card_no; ?>">XXXX XXXX XXXX <?php echo $detail->card_no; ?></td>
					    <td><input type="hidden" name="amount" value="<?php echo $money; ?>">$<?php echo $money; ?></td>
					    <td><input class="PAy_Buton" type="submit" name="submit" value="Pay"></td> -->
					    <td><input type="hidden" name="id" value="<?php echo $detail->id; ?>"><?php echo $i ; ?></td>
					    <td><input type="hidden" name="card" value="<?php echo $detail->card_no; ?>"><?php echo "XXXX XXXX XXXX " .$detail->card_no; ?></td>
					    <td><input type="hidden" name="amount" value="<?php echo $money; ?>"><?php echo $money; ?></td>
					    <td><input type="submit" name="submit" class="PAy_Buton" value="Pay"></td>
					</tr>
					<?php $i++; } ?>
				</table>
			</form>
		</div>
		<div class="col-md-12 col-sm-12 col-xs-12">
			<a href="<?php echo base_url(); ?>Booking/payment">
				<button type="button" class="book_Credit ADD_NEW_CARD">Add New Credit Card</button>
			</a>
		</div>
	</div>
</div>