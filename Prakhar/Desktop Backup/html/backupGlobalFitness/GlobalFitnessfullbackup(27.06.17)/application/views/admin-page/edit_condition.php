<section id="main-content">
  <section class="wrapper">
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

    <div class="row">
      <div class="col-lg-12">
        <section class="panel">
          <header class="panel-heading">
            <h3><b>Edit Condition  </b></h3>
            </header>
             <?php foreach ($category_list as $val) {
             # code...
            ?>
           
          <div class="panel-body">
            <form class="form-horizontal" method="post" enctype="multipart/form-data" action="" role="form" >

              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Name</label>
                  <div class="col-lg-5">
                    <input required value='<?php echo $val->Name; ?>' placeholder="Name only characters" type="text" class="form-control" id="Name" name="Name" >
                  </div>
              </div>
<div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">WebsiteConditionName</label>
                  <div class="col-lg-5">
                    <input  type="text" value='<?php echo $val->WebsiteConditionName; ?>' class="form-control" id="WebsiteConditionName" name="WebsiteConditionName" >
                  </div>
              </div>


                           
              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Description</label>
                  <div class="col-lg-10">
                      <textarea  name="Description" placeholder="Approximately 200 Words, no HTML or special charactors" class="form-control" cols="60" rows="5"><?php echo $val->Description; ?></textarea>
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">GMerchant</label>
                  <div class="col-lg-5">
                    <input  type="text" value='<?php echo $val->GMerchant; ?>' class="form-control" id="GMerchant" name="GMerchant" >
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Bing</label>
                  <div class="col-lg-5">
                    <input  type="text" value='<?php echo $val->Bing; ?>' class="form-control" id="Bing" name="Bing" >
                  </div>
              </div>
              
        
             
              <div class="form-group">
                  <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Warranty</label>
                  <div class="col-lg-5">
                    <select class="form-control m-bot15" name="WarrantyID">
                 <?php
                      foreach($wr as $wa){
                        if($wa->ID == $val->WarrantyID){
                          echo "<option selected value='".$wa->ID."'>".$wa->Name."</option>";
                        }
                          else{
                          echo "<option value='".$wa->ID."'>".$wa->Name."</option>";
                        }
                      }
                     ?>
                    </select>
                  </div>
              </div>
             
                 <input type="hidden" value="<?php echo $val->ID; ?>" name="id">
              <?php } ?>
         
              <div class="form-group">
                  <div class="col-lg-offset-2 col-lg-10">
                      <button type="submit" name="submitLog" class="btn btn-danger">Update</button>
                  </div>
              </div>
            </form>
            <span><a class="btn btn-primary" href='<?php echo base_url("/dashboard/condition_list"); ?>'>Back</a></span>
          </div>
        </section>
      </div>
    </div>
  </section>
</section>