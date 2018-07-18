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
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Carousel Title</label>
                  <div class="col-lg-5">
                      <input required type="text" name="CarouselTitle" class="form-control" id="inputPassword1" value= "" placeholder="Carousel Title">
                  </div>
              </div>

               <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Carousel SubTitle</label>
                  <div class="col-lg-5">
                      <input required type="text" name="CarouselSubTitle" class="form-control" id="inputPassword1" value="" placeholder="Carousel SubTitle">
                  </div>
              </div>
               <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Carousel SubTitle Alt Attribute</label>
                  <div class="col-lg-5">
                      <input required type="text" name="CarouselSubTitleAltAttribute" class="form-control" id="inputPassword1" value= "" placeholder="Carousel SubTitle Alt Attribute">
                  </div>
              </div>

              <div class="form-group">
               <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Carousel Image Small</label>
              <div class="col-lg-5">
                 <input required type="text" name="IndexCarouselImageSmall" class="form-control" id="inputPassword1" value= "" placeholder="Carousel Image Small">
                </div>
              </div>
                    <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Carousel Image Medium</label>
                  <div class="col-lg-5">
                      <input required type="text" name="IndexCarouselImageMedium" class="form-control" id="inputPassword1" value= "" placeholder="Carousel Image Medium">
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Carousel Image Large</label>
                  <div class="col-lg-5">
                      <input required type="text" name="IndexCarouselImageLarge" class="form-control" id="inputPassword1" value= "" placeholder="Carousel Image Large">
                  </div>
              </div>
                     <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Carousal Image Title Attribute</label>
                  <div class="col-lg-5">
                      <input required type="text" name="CarouselImageTitleAtribute" class="form-control" id="inputPassword1" value="" placeholder="Carousel Image Title Atribute">
                  </div>
              </div>
                    <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Carousal Image Alternate Attribute</label>
                  <div class="col-lg-5">
                      <input required type="text" name="CarouselImageAltAtribute" class="form-control" id="inputPassword1" value="" placeholder="Carousel  Image Alternate Atribute">
                  </div>
              </div>
                    <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Carousel Footer</label>
                  <div class="col-lg-5">
                      <input required type="text" name="CarouselFooter" class="form-control" id="inputPassword1" value= "" placeholder="Carousel Footer">
                  </div>
              </div>
                        <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Carousel Hyperlink</label>
                  <div class="col-lg-5">
                      <input required type="text" name="Carousel Hyperlink" class="form-control" id="inputPassword1" value= "" placeholder="CarouselHyperlink">
                  </div>
              </div>

          <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Carousel Footer Title Attribute</label>
                  <div class="col-lg-5">
                      <input required type="text" name="CarouselFooterTitleAttribute" class="form-control" id="inputPassword1" value= "" placeholder="Carousel Footer Title Attribute">
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

<script src="<?php echo base_url();?>public/assets/ckeditor/ckeditor.js" ></script>