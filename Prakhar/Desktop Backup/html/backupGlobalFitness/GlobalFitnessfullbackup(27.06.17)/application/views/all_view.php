<section id="main-content">
  <section class="wrapper site-min-height">

    <!-- page start-->
    <section class="panel">
      <?php 
        if($view=="order_detail"){
          ?>
              <header class="panel-heading"><a class="btn btn-primary" href='<?php echo base_url("/dashboard/order/new"); ?>'>Back</a></header>
        <?php 
          }
          else
          { ?>  
          <header class="panel-heading"><a class="btn btn-primary" href='<?php echo base_url("/dashboard/$type"); ?>'>Back</a></header>
        <?php  
        }
      ?>
    
     <header class="panel-heading"><?php echo ucfirst($view);  ?> Detail</header>
     <div class="panel-body">     
      <div class="adv-table table-responsive">
        <?php echo form_open('Dashboard/delete_products'); ?> 
        <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered">
            <thead>
              <tr>  
                  <th>Coloum</th>
                  <th>Value</th>
              </tr>
            </thead>
          <tbody> 

            <?php 
              foreach($detail[0] as $key=>$value){
                ?>
                  <tr>
                      <th style="color:#607560; font-size:14px;"><?php echo $key; ?></th>
                      <td><?php echo $value; ?></td>
                  </tr>
                <?php
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
