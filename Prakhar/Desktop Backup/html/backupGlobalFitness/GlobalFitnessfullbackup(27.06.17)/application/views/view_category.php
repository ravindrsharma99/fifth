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
            <h3><b>View Category</b></h3>
            </header>
           <?php foreach ($category_list as $val) {
             # code...
            ?>
          <div class="panel-body">
            <form class="form-horizontal" method="post" enctype="multipart/form-data" action="" role="form" >

              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Name</label>
                  <div class="col-lg-5">
                   <?php echo $val->Name; ?>
                  </div>
              </div>

              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">ClickCount</label>
                  <div class="col-lg-5">
                    <?php echo $val->ClickCount; ?>
                  </div>
              </div>

              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">MenuName</label>
                  <div class="col-lg-5"><?php echo $val->MenuName; ?>
                  </div>
              </div>

                <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">ImageFolderName</label>
                  <div class="col-lg-5"><?php echo $val->ImageFolderName; ?>
                  </div>
              </div>

               
              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Description</label>
                  <div class="col-lg-10"><?php echo $val->Description; ?>
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Keywords</label>
                  <div class="col-lg-10"><?php echo $val->Keywords; ?>
                  </div>
              </div>

              <!-- rudra code -->
              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Page Title</label>
                  <div class="col-lg-5"><?php echo $val->PageTitle; ?>
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Name Description</label>
                  <div class="col-lg-5"><?php echo $val->MetaNameDescription; ?>
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Name Keywords</label>
                  <div class="col-lg-5"><?php echo $val->MetaNameKeywords; ?>
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Name Author</label>
                  <div class="col-lg-5"><?php echo $val->MetaNameAuthor; ?>
                  </div>
              </div>
                   <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Name Distribution</label>
                  <div class="col-lg-5"><?php echo $val->MetaNameDistribution; ?>
                  </div>
              </div>
                   <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Name Language</label>
                  <div class="col-lg-5"><?php echo $val->MetaNameLanguage; ?>
                  </div>
              </div>




              <!-- rudra code end -->
              
              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">ClassID</label>
                  <div class="col-lg-5"><?php echo $val->ClassID; ?>
                  </div>
              </div> 

                <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">szCode</label>
                  <div class="col-lg-5"><?php echo $val->szCode; ?>
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">msCode</label>
                  <div class="col-lg-5"><?php echo $val->msCode; ?>
                  </div>
              </div>
          <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">scCode</label>
                  <div class="col-lg-5"><?php echo $val->scCode; ?>
                  </div>
              </div> 
              <div class="form-group">
                  <label for="ntCode" class="col-lg-2 col-sm-2 control-label">ntCode</label>
                  <div class="col-lg-5"><?php echo $val->ntCode; ?>
                  </div>
              </div> 
 

               <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">GoogleCode</label>
                  <div class="col-lg-10"><?php echo $val->GoogleCode; ?>
                  </div>
              </div>

            <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">TitleF1</label>
                  <div class="col-lg-10"><?php echo $val->TitleF1; ?>
                  </div>
              </div>
            <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">TitleF2</label>
                  <div class="col-lg-10"><?php echo $val->TitleF2; ?>
                  </div>
              </div>

              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">TitleF3</label>
                  <div class="col-lg-10"><?php echo $val->TitleF3; ?>
                  </div>
              </div>


                <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">TitleF4</label>
                  <div class="col-lg-10"><?php echo $val->TitleF4; ?>
                  </div>
              </div>


                <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">TitleF5</label>
                  <div class="col-lg-10"><?php echo $val->TitleF5; ?>
                  </div>
              </div>


                <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">TitleF6</label>
                  <div class="col-lg-10"><?php echo $val->TitleF6; ?>
                  </div>
              </div>


                <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">TitleF7</label>
                  <div class="col-lg-10"><?php echo $val->TitleF7; ?>
                  </div>
              </div>


                <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">TitleF8</label>
                  <div class="col-lg-10"><?php echo $val->TitleF8; ?>
                  </div>
              </div>


 <div class="form-group">
                  <label for="NMFCClass" class="col-lg-2 col-sm-2 control-label">NMFCClass</label>
                  <div class="col-lg-5"><?php echo $val->NMFCClass; ?>
                  </div>
              </div> 

           
             
              <div class="form-group">
                  <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Is Active</label>
                  <div class="col-lg-5">
                    <?php if($val->Is_Active == 'Y') { echo "selected"; } ?>
                    <?php if($val->Is_Active == 'N') { echo "selected"; } ?>
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Filter Type</label>
                  <div class="col-lg-5"><?php if($val->FilterType == '0') { echo "selected"; } ?><?php if($val->FilterType == '1') { echo "selected"; } ?>
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Menu Type</label>
                  <div class="col-lg-5">
                    <?php if($val->MenuType == '0') { echo "selected"; } ?><?php if($val->MenuType == '1') { echo "selected"; } ?>
                  </div>
              </div>
                   <?php } ?>
                       </form>
            <span><a class="btn btn-primary" href='<?php echo base_url("/dashboard/category"); ?>'>Back</a></span>
          </div>
        </section>
      </div>
    </div>
  </section>
</section>