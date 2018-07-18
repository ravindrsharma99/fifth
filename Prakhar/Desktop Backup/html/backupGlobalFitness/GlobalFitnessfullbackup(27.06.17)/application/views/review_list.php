
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
    <header class="panel-heading"> Products List</header>
    <div class="panel-body">    	
      <div class="adv-table table-responsive">
        <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
          <thead>
            <tr>
              <th>Sr. No.</th>
              <th>Product Id</th>
              <th>ProductName</th>
              <th>Review By</th>
              <th>Star Rating</th>
              <th>Brief Comment</th>
              <th>Description</th>
              <th>Helpfull</th>
           
              <th >Action</th>
            </tr>
          </thead>
          <tbody>                  
          	<?php     
            $counter = 1;
              foreach ($review as $products) {
               ?>
              <tr>
                <td><?php echo $counter; ?></td>
                <td><?php echo $products->product_id; ?></td>                
                <td><?php echo $products->ProductName; ?></td>                
                <td><?php echo ucfirst($products->FirstName." ".$products->MiddleName." ".$products->LastName); ?></td>                
                <td><?php echo $products->star_rate; ?></td>                
                <td><?php echo $products->brief; ?></td>                
                <td><?php echo $products->description; ?></td>                 
                <td><?php echo $products->totalhelp; ?></td>                 
                <td>
                    <form action="" method="post">
                      <input type="hidden" value="<?php echo $products->ID; ?>" name="decline" >
                      <button class="btn btn-default"><?php echo $status==1 ? "Decline" : "Approve"; ?></button>
                    </form>
                    <br>             
                    <form action="" method="post">
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
        
      </div>
    </div>
    </section>
    <!-- page end-->
  </section>
</section>
