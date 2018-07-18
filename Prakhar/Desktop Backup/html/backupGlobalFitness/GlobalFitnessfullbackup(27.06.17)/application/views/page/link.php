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
               <header class="panel-heading"> <?php echo $name; ?> </header>              
          <div class="panel-body">
              <div class="form">
              <!-- <form class="cmxform form-horizontal tasi-form" id="AddJobType" name="AddJobType" method="post" action=""> -->

             <form class="form-horizontal" action="<?php echo base_url('/dashboard/contactwithus'); ?>/<?php echo $name; ?>" method="post">

             <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Url</label>
                  <div class="col-lg-5">
                      <input type="text" name="title" class="form-control" id="inputPassword1" value= "<?php echo $result[0]->title; ?>" placeholder="e.g. http://www.exapmle.com"><input type="hidden" name="type" value="<?php echo $name ?>">
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