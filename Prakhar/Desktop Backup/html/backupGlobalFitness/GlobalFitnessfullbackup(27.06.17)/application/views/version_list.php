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
    <header class="panel-heading"> Brand Version List</header>
    <div class="panel-body">    	
      <div class="adv-table table-responsive">
        <?php echo form_open('Dashboard/delete_products'); ?> 
        <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
          <thead>
            <tr>
              <th>Sr. No.</th>
              <th>Name</th>
              <th>Brand Name</th>
              <th>Description</th>
            <!--   <th>Feature1</th>
              <th>Feature2</th>
              <th>Feature3</th>
              <th>Feature4</th>
              <th>Feature5</th>
              <th>Feature6</th> -->
              <th>Logo</th>
              <th>Is Active</th>
              <th>FilterType</th>
              <th>MenuType</th>
              <th >Action</th>
            </tr>
          </thead>
          <tbody>                  
          	<?php     
            $counter = 1;
              foreach ($brandversion_list as $products) {
               ?>
              <tr>
                <td><?php echo $counter; ?></td>
                <td><?php echo $products->Name; ?></td>                
                <td><?php echo $products->bname; ?></td>                
                <td><?php echo $products->Description; ?></td>
               <!--  <td><?php echo $products->Feature1; ?></td> 
                <td><?php echo $products->Feature2; ?></td> 
                <td><?php echo $products->Feature3; ?></td> 
                <td><?php echo $products->Feature4; ?></td> 
                <td><?php echo $products->Feature5; ?></td> 
                <td><?php echo $products->Feature6; ?></td>  -->
                <td><?php echo $products->Logo; ?></td>                    
                <td><?php echo $products->Is_Active; ?></td>                
                <td><?php echo $products->FilterType; ?></td>                
                <td><?php echo $products->MenuType; ?></td>                
                <td>
                  <form action="" method="post">
                      <a class="btn btn-success" href="<?php echo base_url('dashboard/view/version'); ?>/<?php echo $products->ID; ?>">View</a>
                        <a class="btn btn-info" href="<?php echo base_url('dashboard/editversion/version'); ?>/<?php echo $products->ID; ?>">Edit</a>
                        <input type="hidden" value="<?php echo $products->ID; ?>" name="delete" >
                        <button class="btn btn-danger">Delete</button>
                    </form>
                  </td>                
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
