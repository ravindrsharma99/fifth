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
              <th>BrandID</th>
              <th>Product Keywords</th>
              <th>Product Description</th>
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
                <td><?php echo $products->BrandID; ?></td>                
                <td><?php echo $products->Keywords; ?></td>   
                <td><?php echo $products->Description; ?></td>  
                <?php if($controller =='ProductsCardio'){?>
                <td><a class="btn btn-primary" href="<?php echo base_url('dashboard/view/'); ?>/<?php echo $controller."/cardioproducts/".$products->ID; ?>">View</a>                
                  <a class="btn btn-info" href="<?php echo base_url('dashboard/editproduct/'); ?>/<?php echo "cardioproducts/".$products->ID; ?>">Edit</a>  </td>    
                  <?php }else{?>
                   <td><a class="btn btn-primary" href="<?php echo base_url('dashboard/view/'); ?>/<?php echo $controller."/strengthproducts/".$products->ID; ?>">View</a>                
                  <a class="btn btn-info" href="<?php echo base_url('dashboard/editproduct/'); ?>/<?php echo "strengthproducts/".$products->ID; ?>">Edit</a>  </td>  
                  <?php }?>          
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
