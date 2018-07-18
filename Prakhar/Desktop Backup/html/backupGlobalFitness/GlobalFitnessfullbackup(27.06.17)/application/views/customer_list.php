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
    <header class="panel-heading">All Users ( <?php echo count($customer_list); ?> )</header>
    <div class="panel-body">    	
      <div class="adv-table table-responsive">
        <?php echo form_open('Dashboard/delete_products'); ?> 
        <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
          <thead>
            <tr>
              <th>ID</th>
              <th>Username</th>
              <th>Title</th>
              <th>First Name</th>
              <th>Middle Name</th>
              <th>Last Name</th>
              <th>Email</th>
              <th>Password</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>                  
          	<?php     
            $counter = 1;
            foreach ($customer_list as $products) {
               ?>
              <tr>
                <td><?php echo $products->ID; ?></td>
                <td><?php echo $products->UserName; ?></td>                
                <td><?php echo $products->Title; ?></td>                
                <td><?php echo $products->FirstName; ?></td>                
                <td><?php echo $products->MiddleName; ?></td>               
                <td><?php echo $products->LastName; ?></td>                
                <td><?php echo $products->Email; ?></td>                
                <td><?php echo $products->Password; ?></td>                
                <td><?php if($products->Is_Active=="1") echo "Active"; else echo "Deactive"; ?></td>                
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
