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
            <h3><b>Edit Category</b></h3>
            </header>
           <?php foreach ($category_list as $val) {
             # code...
            ?>
          <div class="panel-body">
            <form class="form-horizontal" method="post" enctype="multipart/form-data" action="" role="form" >

              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Name</label>
                  <div class="col-lg-5">
                    <input value='<?php echo $val->Name; ?>' required placeholder="Name only characters" type="text" class="form-control" id="Name" name="Name" >
                  </div>
              </div>

              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">ClickCount</label>
                  <div class="col-lg-5">
                    <input required placeholder="" value='<?php echo $val->ClickCount; ?>' type="number" class="form-control" id="ClickCount" name="ClickCount" >
                  </div>
              </div>

              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">MenuName</label>
                  <div class="col-lg-5">
                    <input required placeholder=""  type="text" value='<?php echo $val->MenuName; ?>' class="form-control" id="MenuName" name="MenuName" >
                  </div>
              </div>

                <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">ImageFolderName</label>
                  <div class="col-lg-5">
                    <input required placeholder="" type="text" class="form-control" value='<?php echo $val->ImageFolderName; ?>' id="ImageFolderName" name="ImageFolderName" >
                  </div>
              </div>

               
              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Description</label>
                  <div class="col-lg-10">
                      <textarea required name="Description"  placeholder="Approximately 200 Words, no HTML or special charactors" class="form-control" cols="60" rows="5"><?php echo $val->Description; ?></textarea>
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Keywords</label>
                  <div class="col-lg-10">
                      <textarea required name="Keywords" placeholder="Approximately 200 Words, no HTML or special charactors" class="form-control" cols="60" rows="5"><?php echo $val->Keywords; ?></textarea>
                  </div>
              </div>

              <!-- rudra code -->
              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Page Title</label>
                  <div class="col-lg-5">
                    <input required placeholder="" value='<?php echo $val->PageTitle; ?>' type="text"  class="form-control" id="ClassID" name="PageTitle" >
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Name Description</label>
                  <div class="col-lg-5">
                    <input required placeholder="" value='<?php echo $val->MetaNameDescription; ?>' type="text"  class="form-control" id="ClassID" name="MetaNameDescription" >
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Name Keywords</label>
                  <div class="col-lg-5">
                    <input required placeholder="" value='<?php echo $val->MetaNameKeywords; ?>' type="text"  class="form-control" id="ClassID" name="MetaNameKeywords" >
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Name Author</label>
                  <div class="col-lg-5">
                    <input required placeholder="" value='<?php echo $val->MetaNameAuthor; ?>' type="text"  class="form-control" id="ClassID" name="MetaNameAuthor" >
                  </div>
              </div>
                   <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Name Distribution</label>
                  <div class="col-lg-5">
                    <input required placeholder="" value='<?php echo $val->MetaNameDistribution; ?>' type="text"  class="form-control" id="ClassID" name="MetaNameDistribution" >
                  </div>
              </div>
                   <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Name Language</label>
                  <div class="col-lg-5">
                    <input required placeholder="" value='<?php echo $val->MetaNameLanguage; ?>' type="text"  class="form-control" id="ClassID" name="MetaNameLanguage" >
                  </div>
              </div>




              <!-- rudra code end -->
              
              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">ClassID</label>
                  <div class="col-lg-5">
                    <input required placeholder="" value='<?php echo $val->ClassID; ?>' type="text"  class="form-control" id="ClassID" name="ClassID" >
                  </div>
              </div> 

                <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">szCode</label>
                  <div class="col-lg-5">
                    <input  placeholder="" value='<?php echo $val->szCode; ?>' type="text" class="form-control" id="szCode" name="szCode" >
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">msCode</label>
                  <div class="col-lg-5">
                    <input  placeholder="" value='<?php echo $val->msCode; ?>' type="text" class="form-control" id="szCode" name="msCode" >
                  </div>
              </div>
          <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">scCode</label>
                  <div class="col-lg-5">
                    <input  placeholder="" value='<?php echo $val->scCode; ?>' type="text" class="form-control" id="scCode" name="scCode" >
                  </div>
              </div> 
              <div class="form-group">
                  <label for="ntCode" class="col-lg-2 col-sm-2 control-label">ntCode</label>
                  <div class="col-lg-5">
                    <input  placeholder="" value='<?php echo $val->ntCode; ?>' type="text" class="form-control" id="ntCode" name="ntCode" >
                  </div>
              </div> 
 

               <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">GoogleCode</label>
                  <div class="col-lg-10">
                      <textarea required name="GoogleCode" placeholder="Approximately 200 Words, no HTML or special charactors" class="form-control" cols="60" rows="5"><?php echo $val->GoogleCode; ?></textarea>
                  </div>
              </div>

            <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">TitleF1</label>
                  <div class="col-lg-10">
                      <textarea  name="TitleF1" 
                      placeholder="Approximately 200 Words, no HTML or special charactors" class="form-control" cols="60" rows="5"><?php echo $val->TitleF1; ?></textarea>
                  </div>
              </div>
            <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">TitleF2</label>
                  <div class="col-lg-10">
                      <textarea  name="TitleF2" placeholder="Approximately 200 Words, no HTML or special charactors" class="form-control" cols="60" rows="5"><?php echo $val->TitleF2; ?></textarea>
                  </div>
              </div>

              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">TitleF3</label>
                  <div class="col-lg-10">
                      <textarea  name="TitleF3" placeholder="Approximately 200 Words, no HTML or special charactors" class="form-control" cols="60" rows="5"><?php echo $val->TitleF3; ?></textarea>
                  </div>
              </div>


                <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">TitleF4</label>
                  <div class="col-lg-10">
                      <textarea  name="TitleF4" placeholder="Approximately 200 Words, no HTML or special charactors" class="form-control" cols="60" rows="5"><?php echo $val->TitleF4; ?></textarea>
                  </div>
              </div>


                <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">TitleF5</label>
                  <div class="col-lg-10">
                      <textarea  name="TitleF5" placeholder="Approximately 200 Words, no HTML or special charactors" class="form-control" cols="60" rows="5"><?php echo $val->TitleF5; ?></textarea>
                  </div>
              </div>


                <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">TitleF6</label>
                  <div class="col-lg-10">
                      <textarea  name="TitleF6" placeholder="Approximately 200 Words, no HTML or special charactors" class="form-control" cols="60" rows="5"><?php echo $val->TitleF6; ?></textarea>
                  </div>
              </div>


                <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">TitleF7</label>
                  <div class="col-lg-10">
                      <textarea  name="TitleF7" placeholder="Approximately 200 Words, no HTML or special charactors" class="form-control" cols="60" rows="5"><?php echo $val->TitleF7; ?></textarea>
                  </div>
              </div>


                <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">TitleF8</label>
                  <div class="col-lg-10">
                      <textarea  name="TitleF8" placeholder="Approximately 200 Words, no HTML or special charactors" class="form-control" cols="60" rows="5"><?php echo $val->TitleF8; ?></textarea>
                  </div>
              </div>


 <div class="form-group">
                  <label for="NMFCClass" class="col-lg-2 col-sm-2 control-label">NMFCClass</label>
                  <div class="col-lg-5">
                    <input  placeholder="" type="text" value='<?php echo $val->NMFCClass; ?>'
                     class="form-control" id="ntCode" name="NMFCClass" >
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

              <input type="hidden" value="<?php echo $val->ID; ?>" name="id">
              <?php } ?>
              <div class="form-group">
                  <div class="col-lg-offset-2 col-lg-10">
                      <button type="submit" name="submitLog" class="btn btn-danger">Update</button>
                  </div>
              </div>
            </form>
            <span><a class="btn btn-primary" href='<?php echo base_url("/dashboard/category"); ?>'>Back</a></span>
          </div>
        </section>
      </div>
    </div>
  </section>
</section>