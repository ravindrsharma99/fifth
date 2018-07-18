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
    <header class="panel-heading"><?php echo $type; ?> Products List</header>
    <div class="panel-body">      
      <div class="adv-table table-responsive">
        <?php echo form_open('Dashboard/delete_products'); ?> 
        <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
          <thead>
            <tr>
              <th>Sr. No.</th>
              <th>Coupon Code</th>
              <th>Coupon Name</th>
              <th>Coupon Description</th>
              <th>Start Date</th>
              <th>End Date</th>
              <th>Product Category</th>
              <th>Product Brand</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>                  
            <?php     
            $counter = 1;
              foreach ($promo_list as $products) {
               ?>
              <tr>
                <td><?php echo $counter; ?></td>
                <td><?php echo $products->CoupnCode; ?></td>                
                <td><?php echo $products->CouponName; ?></td>                
                <td><?php echo $products->CouponDescription; ?></td>                
                <td><?php echo $products->CouponStartDate; ?></td>                
                <td><?php echo $products->CouponEndDate; ?></td>                
                <td><?php echo $products->ProductCategory; ?></td>                
                <td><?php echo $products->ProductBrand; ?></td>                
                <td><a class="btn btn-primary" href="<?php echo base_url('dashboard/view/'); ?>/<?php echo $controller."/promocode/".$products->id; ?>">View</a>                
                  <a class="btn btn-info" href="<?php echo base_url('dashboard/editpromo/'); ?>/<?php echo $controller."/".$products->id; ?>">Edit</a>  </td>              
              </tr>
            <?php 
               $counter++;
              } 
            ?>            
          </tbody>
        </table>
         </form>
      </div>
    </div>
    </section>
    <!-- page end-->
  </section>
</section>
