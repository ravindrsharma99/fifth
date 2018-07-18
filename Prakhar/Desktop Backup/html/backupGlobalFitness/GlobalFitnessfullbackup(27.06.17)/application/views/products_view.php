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
              <th>MPN</th>
              <th>ListID</th>
              <th>Product Name</th>
              <th>Price</th>
              <th>Condition</th>
              <th>Voltage</th>
              <th>WarrantyBlurb</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>                  
            <?php     
            $counter = 1;
              foreach ($products_list as $products) {
               ?>
              <tr>
                <td><?php echo $counter; ?></td>
                <td><?php echo $products->MPN; ?></td>                
                <td><?php echo $products->ListID; ?></td>                
                <td><?php echo $products->ProductName; ?></td>                
                <td><?php echo trim($products->Price,'$'); ?></td>                
                <td><?php echo $products->Condition; ?></td>                
                <td><?php echo $products->Voltage; ?></td>                
                <td><?php echo $products->WarrantyBlurb; ?></td>                
                <td><a class="btn btn-primary" href="<?php echo base_url('dashboard/view/'); ?>/<?php echo $controller."/products/".$products->ListID; ?>">View</a>                
                  <a class="btn btn-info" href="<?php echo base_url('dashboard/editproducts/'); ?>/<?php echo $controller."/products/".$products->ListID; ?>">Edit</a>  </td>              
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
