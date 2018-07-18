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
            <h3><b>New Brand Version</b></h3>
            </header>
           
          <div class="panel-body">
            <form class="form-horizontal" method="post" enctype="multipart/form-data" action="" role="form" >

                <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Name</label>
                  <div class="col-lg-5">
                    <input required placeholder="Name only characters" type="text" class="form-control" id="Name" name="Name" >
                  </div>
              </div>
               <div class="form-group">
                  <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Brand</label>
                  <div class="col-lg-5">
                    <select name="Brand" class="form-control m-bot15" id="Brand">
                      <?php 
                          foreach($brand_list as $brand){
                            echo "<option value='".$brand->ID."'>".$brand->Name."</option>";
                          }
                      ?>
                    </select>
                  </div>
              </div>

              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Description</label>
                  <div class="col-lg-10">
                      <textarea required name="Description" placeholder="Approximately 200 Words, no HTML or special charactors" class="form-control" cols="60" rows="5"></textarea>
                  </div>
              </div>
              
              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Feature1</label>
                  <div class="col-lg-10">
                      <textarea placeholder="e.x. 95ti, life fitness treadmill, etc." name="Feature1" class="form-control" cols="60" rows="5"></textarea>
                  </div>
              </div>

              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Feature2</label>
                  <div class="col-lg-10">
                      <textarea placeholder="e.x. 95ti, life fitness treadmill, etc." name="Feature2" class="form-control" cols="60" rows="5"></textarea>
                  </div>
              </div>

               

                <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Feature3</label>
                  <div class="col-lg-10">
                      <textarea placeholder="e.x. 95ti, life fitness treadmill, etc." name="Feature3" class="form-control" cols="60" rows="5"></textarea>
                  </div>
              </div>

                <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Feature4</label>
                  <div class="col-lg-10">
                      <textarea placeholder="e.x. 95ti, life fitness treadmill, etc." name="Feature4" class="form-control" cols="60" rows="5"></textarea>
                  </div>
              </div>
                <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Feature5</label>
                  <div class="col-lg-10">
                      <textarea placeholder="e.x. 95ti, life fitness treadmill, etc." name="Feature5" class="form-control" cols="60" rows="5"></textarea>
                  </div>
              </div>

               <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Feature6</label>
                  <div class="col-lg-10">
                      <textarea placeholder="e.x. 95ti, life fitness treadmill, etc." name="Feature6" class="form-control" cols="60" rows="5"></textarea>
                  </div>
              </div>
              
                <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Logo</label>
                  <div class="col-lg-10">
                      <textarea placeholder="e.x. 95ti, life fitness treadmill, etc." name="Logo" class="form-control" cols="60" rows="5"></textarea>
                  </div>
              </div>

             
              <div class="form-group">
                  <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Is Active</label>
                  <div class="col-lg-5">
                    <select name="Is_Active" class="form-control m-bot15" id="Is_Active">
                    <option value='Y'>Y</option>
                    <option value='N'>N</option>
                    </select>
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Filter Type</label>
                  <div class="col-lg-5">
                    <select name="FilterType" class="form-control m-bot15" id="FilterType">
                    <option value='0'>0</option>
                    <option value='1'>1</option>
                    </select>
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Menu Type</label>
                  <div class="col-lg-5">
                    <select name="MenuType" class="form-control m-bot15" id="MenuType">
                    <option value='0'>0</option>
                    <option value='1'>1</option>
                    </select>
                  </div>
              </div>

              
              <div class="form-group">
                  <div class="col-lg-offset-2 col-lg-10">
                      <button type="submit" name="submitLog" class="btn btn-danger">Add</button>
                  </div>
              </div>
            </form>
          </div>
        </section>
      </div>
    </div>
  </section>
</section>