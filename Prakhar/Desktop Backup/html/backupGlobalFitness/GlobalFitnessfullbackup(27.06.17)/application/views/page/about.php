<section id="main-content">
  <section class="wrapper">
    <?php if($this->session->flashdata('msg')): ?>
      <div class="alert alert-danger  alert-block fade in">
        <button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button>
        <h4><i class="fa fa-ok-sign"></i><?php echo $this->session->flashdata('msg'); ?></h4>
      </div> 
    <?php endif; ?> 
    <div class="row">
      <div class="col-lg-12">
        <section class="panel">                  
               <header class="panel-heading"> About Us </header>              
          <div class="panel-body">
              <div class="form">
              <!-- <form class="cmxform form-horizontal tasi-form" id="AddJobType" name="AddJobType" method="post" action=""> -->

             <form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF'];; ?>" method="post">

              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Title</label>
                  <div class="col-lg-5">
                      <input type="text" name="title" class="form-control" id="inputPassword1" value= "<?php echo $result[0]->title; ?>" placeholder="Title">
                  </div>
              </div>

               <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Keywords</label>
                  <div class="col-lg-10">
                      <input type="text" name="keyword" class="form-control" id="inputPassword1" value="<?php echo $result[0]->keywords; ?>" placeholder="Keywords">
                  </div>
              </div>

              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Description</label>
                  <div class="col-lg-10">
                      <textarea class="form-control" name="description" placeholder="Description" rows="5"><?php echo $result[0]->description; ?></textarea>
                  </div>
              </div>


                <div class="form-group">
                  <label class="col-sm-2 control-label col-sm-2">About Us Content</label>
                  <div class="col-sm-10">
                      <textarea class="form-control ckeditor" name="content" rows="50"><?php echo $result[0]->Content; ?></textarea>
                      <input type="hidden" name="type" value="About">
                  </div>
              </div>



                <div class="form-group">
                  <div class="col-lg-offset-2 col-lg-10">                    
                    <button type="submit" value="<?php echo $result[0]->Id; ?>" name="updateid" class="btn btn-danger">Update</button> 
                  </div>
                </div>  

              </form>
            </div>
          </div>          
        </section>
      </div>
    </div>
  </section>
</section>

<script src="<?php echo base_url();?>public/assets/ckeditor/ckeditor.js" ></script>