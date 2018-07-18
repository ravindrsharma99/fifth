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

             <form class="form-horizontal" action="<?php echo base_url('/dashboard/HomePage'); ?>/<?php echo $name; ?>" method="post">

              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Video Title</label>
                  <div class="col-lg-5">
                      <input required type="text" name="VideoTitle" class="form-control" id="inputPassword1" value= "" placeholder="Video Title">
                  </div>
              </div>

               <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Video SubTitle</label>
                  <div class="col-lg-5">
                      <input required type="text" name="VideoSubTitle" class="form-control" id="inputPassword1" value="" placeholder="Video SubTitle">
                  </div>
              </div>
               <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Video Small</label>
                  <div class="col-lg-5">
                      <input required type="text" name="VideoSmall" class="form-control" id="inputPassword1" value= "" placeholder="Video Small">
                  </div>
              </div>

              <div class="form-group">
               <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Video Medium</label>
              <div class="col-lg-5">
                 <input required type="text" name="VideoMedium" class="form-control" id="inputPassword1" value= "" placeholder="Video Medium">
                </div>
              </div>
                    <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Video Large</label>
                  <div class="col-lg-5">
                      <input required type="text" name="VideoLarge" class="form-control" id="inputPassword1" value= "" placeholder="Video Large">
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Video Link Call To Action</label>
                  <div class="col-lg-5">
                      <input required type="text" name="VideoLinkCallToAction" class="form-control" id="inputPassword1" value= "" placeholder="Video Link Call To Action">
                  </div>
              </div>
                     <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Video Hyperlink</label>
                  <div class="col-lg-5">
                      <input required type="text" name="VideoHyperlink" class="form-control" id="inputPassword1" value="" placeholder="Video Hyperlink">
                  </div>
              </div>           
                <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Is Active</label>
                  <div class="col-lg-5">
                    
                      <select class="form-control" id="inputPassword1" name="ok">
                      <option value="0">No</option>
                      <option value="1">Yes</option>
                      </select>
                  </div>
              </div>
                <div class="form-group">
                  <div class="col-lg-offset-2 col-lg-5">                    
                    <button type="submit" value="" name="submit" class="btn btn-danger">
                  Insert</button> 
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

