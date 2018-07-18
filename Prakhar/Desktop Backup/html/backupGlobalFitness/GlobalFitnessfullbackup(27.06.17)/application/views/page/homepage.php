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

             <form class="form-horizontal" action="<?php echo base_url('/dashboard/HomePage'); ?>/<?php echo $name; ?>"  enctype="multipart/form-data" method="post">

              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Product Brand</label>
                  <div class="col-lg-5">
                      <input type="text"  required name="Brand" class="form-control" id="inputPassword1" value= "" placeholder="Product Brand">
                  </div>
              </div>

               <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Product Name</label>
                  <div class="col-lg-5">
                      <input type="text" required name="Name" class="form-control" id="inputPassword1" value="" placeholder="Product Name">
                  </div>
              </div>
               <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Product Title Attribute</label>
                  <div class="col-lg-5">
                      <input type="text" required name="title" class="form-control" id="inputPassword1" value= "" placeholder="Product Title Attribute">
                  </div>
              </div>

              <div class="form-group">
               <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Small Image</label>
              <div class="col-lg-5">
                 <input type="file" required name="SmallImage"  id="fileUpload" >
                </div>
              </div>
                    <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Medium Image</label>
                  <div class="col-lg-5">
                      <input type="file" required name="MediumImage" id="fileUpload1" >
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Large Image</label>
                  <div class="col-lg-5">
                      <input type="file" required id="fileUpload2"  name="LargeImage" >
                  </div>
              </div>
                     <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Image Title Attribute</label>
                  <div class="col-lg-5">
                      <input type="text" required name="ImageTitle" class="form-control" id="inputPassword1" value="" placeholder="Image Title Attribute">
                  </div>
              </div>
                    <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Image Alternate Attribute</label>
                  <div class="col-lg-5">
                      <input type="text" required name="AltAttribute" class="form-control" id="inputPassword1" value="" placeholder="Image Alternate Attribute">
                  </div>
              </div>
                    <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Image Link</label>
                  <div class="col-lg-5">
                      <input type="text" required name="ImgLink" class="form-control" id="inputPassword1"  placeholder="Image Link">
                  </div>
              </div>
                        <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">HyperLink</label>
                  <div class="col-lg-5">
                      <input type="text" required name="HyperLink" class="form-control" id="inputPassword1"  placeholder="HyperLink">
                  </div>
              </div>

          <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Link Title Attribute</label>
                  <div class="col-lg-5">
                      <input type="text" required name="TitleAttribute" class="form-control" id="inputPassword1" value= "" placeholder="Link Title Attribute">
                  </div>
              </div>
                <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Is Active</label>
                  <div class="col-lg-5">
                    
                      <select class="form-control" id="inputPassword1" name="ok">
                      <option value="1">Yes</option>
                      <option value="0">No</option>
                      </select>
                  </div>
              </div>
                <div class="form-group">
                  <div class="col-lg-offset-2 col-lg-5">                    
                    <button type="submit" name="submit" class="btn btn-danger">
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