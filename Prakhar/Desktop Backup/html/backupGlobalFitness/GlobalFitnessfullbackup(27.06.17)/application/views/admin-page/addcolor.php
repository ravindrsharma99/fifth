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
            <h3><b>New ColorCardio</b></h3>
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
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">ColorCode</label>
                  <div class="col-lg-5">
                    <input required placeholder="ColorCode" type="text" class="form-control" id="ColorCode" name="ColorCode" >
                  </div>
              </div>

              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">URLPrefix</label>
                  <div class="col-lg-5">
                    <input required placeholder="URLPrefix" type="text" class="form-control" id="ColorCode" name="URLPrefix" >
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