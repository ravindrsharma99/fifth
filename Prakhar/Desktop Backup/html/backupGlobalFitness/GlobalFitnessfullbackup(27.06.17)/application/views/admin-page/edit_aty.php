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
            <h3><b>Edit Availability</b></h3>
            </header>
            <?php foreach ($category_list as $val) {
             # code...
            ?>
          <div class="panel-body">
            <form class="form-horizontal" method="post" enctype="multipart/form-data" action="" role="form" >

              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Name</label>
                  <div class="col-lg-5">
                    <input required value='<?php echo $val->Name; ?>' type="text" class="form-control" id="Name" name="Name" >
                  </div>
              </div>
              
               <div class="form-group">
                  <label for="LiveInventoryName" class="col-lg-2 col-sm-2 control-label">LiveInventoryName</label>
                  <div class="col-lg-5">
                    <input required type="text" value='<?php echo $val->LiveInventoryName; ?>' class="form-control" id="LiveInventoryName" name="LiveInventoryName" >
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Description</label>
                  <div class="col-lg-10">
                      <textarea required  name="Description" placeholder="Approximately 200 Words, no HTML or special charactors" class="form-control" cols="60" rows="5"><?php echo $val->Description; ?></textarea>
                  </div>
                  <input type="hidden" value="<?php echo $val->ID; ?>" name="id">
              </div> <?php } ?>
              <div class="form-group">
                <div class="col-lg-offset-2 col-lg-10">
                    <button type="submit" name="submitLog" class="btn btn-danger">Update</button>
                </div>
              </div>
            </form>
            <span><a class="btn btn-primary" href='<?php echo base_url("/dashboard/availability"); ?>'>Back</a></span>
          </div>
        </section>
      </div>
    </div>
  </section>
</section>