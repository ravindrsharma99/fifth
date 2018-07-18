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
            <h3><b>New Brand</b></h3>
            </header>
           <?php foreach ($category_list as $val) {
             # code...
            ?>
          <div class="panel-body">
            <form class="form-horizontal" method="post" enctype="multipart/form-data" action="" role="form" >

                <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Name</label>
                  <div class="col-lg-5">
                    <input required  value='<?php echo $val->Name; ?>'
                    placeholder="Name only characters" type="text" class="form-control" id="Name" name="Name" >
                  </div>
              </div>

              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Description</label>
                  <div class="col-lg-10">
                      <textarea required name="Description" placeholder="Approximately 200 Words, no HTML or special charactors" class="form-control" cols="60" rows="5"><?php echo $val->Description; ?></textarea>
                  </div>
              </div>
              
              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Keywords</label>
                  <div class="col-lg-10">
                      <textarea placeholder="e.x. 95ti, life fitness treadmill, etc." required name="Keywords" class="form-control" cols="60" rows="5"><?php echo $val->Keywords; ?></textarea>
                  </div>
              </div>

                <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Logo</label>
                  <div class="col-lg-10">
                      <textarea placeholder="e.x. 95ti, life fitness treadmill, etc." name="Logo" class="form-control" cols="60" rows="5"><?php echo (isset($val->Logo) ? $val->Logo : 'NULL'); ?></textarea>
                  </div>
              </div>

              <div class="form-group">
                  <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Brand Type</label>
                  <div class="col-lg-5">
                    <select name="BrandType" class="form-control m-bot15" id="BrandType">
                    <option value='' <?php if($val->BrandType == 'NULL') { echo "selected"; } ?>>Please Select</option>
                      <option value='0' <?php if($val->BrandType == '0') { echo "selected"; } ?> >0</option>
                      <option value='1' <?php if($val->BrandType == '1') { echo "selected"; } ?> >1</option>
                      <option value='2' <?php if($val->BrandType == '2') { echo "selected"; } ?> >2</option>
                    </select>
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Is Active</label>
                  <div class="col-lg-5">
                    <select name="Is_Active" class="form-control m-bot15" id="Is_Active"  >
                    <option value='Y' <?php if($val->Is_Active == 'Y') { echo "selected"; } ?> >Y</option>
                    <option value='N' <?php if($val->Is_Active == 'N') { echo "selected"; } ?> >N</option>
                    </select>
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Filter Type</label>
                  <div class="col-lg-5">
                    <select name="FilterType" class="form-control m-bot15" id="FilterType" value=''>
                    <option value='0' <?php if($val->FilterType == '0') { echo "selected"; } ?> >0</option>
                    <option value='1' <?php if($val->FilterType == '1') { echo "selected"; } ?> >1</option>
                    </select>
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Menu Type</label>
                   <div class="col-lg-5">
                    <select name="MenuType" class="form-control m-bot15" id="MenuType" value=''>
                    <option value='0'<?php if($val->MenuType == '0') { echo "selected"; } ?> >0</option>
                    <option value='1' <?php if($val->MenuType == '1') { echo "selected"; } ?>  >1</option>
                    </select>
                  </div>
              </div>
              <?php } ?>
                <input type="hidden" value="<?php echo $val->ID; ?>" name="id">

              
              <div class="form-group">
                  <div class="col-lg-offset-2 col-lg-10">
                      <button type="submit" name="submitLog" class="btn btn-danger">Update</button>
                  </div>
              </div>
            </form>
            <span><a class="btn btn-primary" href='<?php echo base_url("/dashboard/brands"); ?>'>Back</a></span>
         </div>
        </section>
      </div>
    </div>
  </section>
</section>