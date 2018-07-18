<section id="main-content">
  <section class="wrapper site-min-height">
 <?php if($this->session->flashdata('msg')): ?>
  <div class="alert alert-success  alert-block fade in">
              <button data-dismiss="alert" class="close close-sm" type="button">
                <i class="fa fa-times"></i>
              </button>
              <h4>
                <i class="fa fa-ok-sign"></i>
                <?php echo $this->session->flashdata('msg'); ?>
              </h4>
        </div> 
<?php endif; ?> 
    <!-- page start-->
    <section class="panel">
       <header class="panel-heading"><?php echo ucfirst($title); ?> List</header>
    <div class="panel-body">    	
      <div class="adv-table table-responsive">
       
        <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
          <thead>
            <tr>
              <th>Order #</th>
              <th>Email</th>
              <th>Total Payment</th>
              <th>Payment Type</th>
              <th>Transaction Id</th>
              <th>View</th>
              <?php if($title=="new"){
                ?>
              <th>Action</th>
                  <?php     } ?>
            </tr>
          </thead>
          <tbody>                  
          	<?php     
              foreach ($packages_list as $products) {
               ?>
              <tr>
                <td><?php echo $products->ID; ?></td>
                <td><?php echo $products->billingemail; ?></td>                
                <td><?php echo $products->billingallpayment; ?></td>                
                <td><?php if($products->paymenttype==0){ echo "By ".$products->cardtype; }else{ echo "COD"; }  ?></td>                
                <td><?php echo $products->transactionId; ?></td>
                <td><a href="<?php echo base_url('/dashboard/view'); ?>/Order/order_detail/<?php echo $products->ID; ?>" class="btn btn-info">View</a></td>
                <?php if($title=="new"){
                ?>
                <td>
                    <form action="" method="post">
                        <input type="hidden" value="<?php echo $products->ID; ?>" name="contact_id">
                        <input type="submit" class="btn btn-default" value="completed">
                    </form>
                </td>
                  <?php     } ?>               
              </tr>
            <?php 
       
              } 
            ?>            
          </tbody>
        </table>
     
      </div>
    </div>
    </section>
    <!-- page end-->
  </section>
</section>
