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
            <h3><b>New Piece</b></h3>
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
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Description</label>
                  <div class="col-lg-10">
                      <textarea required name="Description" placeholder="Approximately 200 Words, no HTML or special charactors" class="form-control" cols="60" rows="5"></textarea>
                  </div>
              </div>
              
              <div class="form-group">
                <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Keywords</label>
                <div class="col-lg-10">
                    <textarea required name="Keywords" placeholder="Approximately 200 Words, no HTML or special charactors" class="form-control" cols="60" rows="5"></textarea>
                </div>
              </div>

              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Default Image</label>
                  <div class="col-lg-5">
                    <input required  type="text" class="form-control" id="DefaultImage" name="DefaultImage" >
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
                    <option value=''>Please Select</option>
                    <option value='0'>0</option>
                    <option value='1'>1</option>
                    </select>
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Menu Type</label>
                  <div class="col-lg-5">
                    <select name="MenuType" class="form-control m-bot15" id="MenuType">
                     <option value=''>Please Select</option>
                    <option value='0'>0</option>
                    <option value='1'>1</option>
                    </select>
                  </div>
              </div>

              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Box Length</label>
                  <div class="col-lg-5">
                    <input   type="text" class="form-control" id="BoxLength" name="BoxLength" >
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Box Width</label>
                  <div class="col-lg-5">
                    <input   type="text" class="form-control" id="BoxWidth" name="BoxWidth" >
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Box Height</label>
                  <div class="col-lg-5">
                    <input   type="text" class="form-control" id="BoxHeight" name="BoxHeight" >
                  </div>
              </div> 

              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Box Weight</label>
                  <div class="col-lg-5">
                    <input   type="text" class="form-control" id="BoxWeight" name="BoxWeight" >
                  </div>
              </div>  

              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Piece NMFC</label>
                  <div class="col-lg-5">
                    <input   type="text" class="form-control" id="PieceNMFC" name="PieceNMFC" >
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