<link rel="stylesheet" href="<?php echo base_url('/public/assets/css'); ?>/chosen.css">

<style type="text/css" media="all">
  .chosen-ltr .chosen-drop { left: -9000px; }
  .chosen-ltr{text-align:left!important;}
</style>

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
            <h3><b>New Product</b></h3>
            </header>
           
          <div class="panel-body">
            <form class="form-horizontal" method="post" enctype="multipart/form-data" action="" role="form" >
              <div class="form-group">
                  <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">AmpsID</label>
                  <div class="col-lg-5">
                    <select name="AmpsID" class="form-control m-bot15" id="AmpsID">
                     <?php
                        foreach($Amps as $am){
                          echo "<option value='".$am->ID."''>".$am->Name."</option>";
                        }
                     ?>
                    </select>
                  </div>
              </div>

              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">BrandID</label>
                  <div class="col-lg-5">
                      <select name="BrandID" class="form-control m-bot15" id="AmpsID">
                     <?php
                        foreach($Brand as $am){
                          echo "<option value='".$am->ID."''>".$am->Name."</option>";
                        }
                     ?>
                    </select>
                  </div>
              </div>

               <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">CategoryID</label>
                  <div class="col-lg-5">
                     <select name="CategoryID" class="form-control m-bot15" id="AmpsID">
                     <?php
                        foreach($category as $am){
                          echo "<option value='".$am->ID."''>".$am->Name."</option>";
                        }
                     ?>
                      </select>
                  </div>
              </div>

              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">MPN</label>
                  <div class="col-lg-10">
                    <!-- <select name="MPN" class="form-control m-bot15" id="AmpsID"> -->

                     <select name="MPN" data-placeholder="Your Favorite Type of Bear" class="form-control m-bot15 chosen-select chosen-ltr" tabindex="13">
                     <?php
                        foreach($mpn as $am){
                          echo "<option value='".$am->MPN."''>".$am->MPNshow."</option>";
                        }
                     ?>
                    </select>
                  </div>
              </div>

              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">VoltageID</label>
                  <div class="col-lg-5">
                      <select name="VoltageID" class="form-control m-bot15" id="AmpsID">
                     <?php
                        foreach($voltage as $am){
                          echo "<option value='".$am->ID."''>".$am->Name."</option>";
                        }
                     ?>
                    </select>
                  </div>
              </div>


              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Keywords</label>
                  <div class="col-lg-10">
                      <textarea placeholder="e.x. 95ti, life fitness treadmill, etc." required name="Keywords" class="form-control" cols="60" rows="5"></textarea>
                  </div>
              </div>



              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">DimLength</label>
                  <div class="col-lg-10">
                    <input required placeholder="e.x. 72 (enter only the number no special characters ) *Max of 5 Numbers" type="number" class="form-control" id="inputPassword1" name="DimLength" >
                  </div>
              </div>


              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">DimWidth</label>
                  <div class="col-lg-10">
                      <input required placeholder="e.x. 52 (enter only the number no special characters ) *Max of 5 Numbers" type="number" class="form-control" id="inputPassword1" name="DimWidth" >
                  </div>
              </div>


              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">DimHeight</label>
                  <div class="col-lg-10">
                      <input placeholder="e.x. 22 (enter only the number no special characters ) *Max of 5 Numbers" required type="number" class="form-control" id="inputPassword1" name="DimHeight" >
                  </div>
              </div>


              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Weight</label>
                  <div class="col-lg-10">
                      <input required placeholder="e.x. 350 (enter only the number no special characters ) *Max of 5 Numbers"  type="number" class="form-control" id="inputPassword1" name="Weight" >
                  </div>
              </div>

              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">ShippingWeight</label>
                  <div class="col-lg-10">
                      <input required placeholder="e.x. 350 (enter only the number no special characters ) *Max of 5 Numbers"  type="number" class="form-control" id="inputPassword1" name="ShippingWeight" >
                  </div>
              </div>

              
              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">WeightCapacity</label>
                  <div class="col-lg-10">
                      <input required placeholder=" e.x. 325 (enter only the number no special characters or Undiscolsed) *Max of 10 Numbers" type="number" class="form-control" id="inputPassword1" name="WeightCapacity" >
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Description</label>
                  <div class="col-lg-10">
                      <textarea required name="Description" placeholder="Approximately 200 Words, no HTML or special charactors" class="form-control" cols="60" rows="5"></textarea>
                  </div>
              </div>
            
             
              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Feature 1st</label>
                  <div class="col-lg-10">                     
                       <textarea required name="Feature1st" placeholder="zFitnessCategory.TitleF1(Max of 100 characters)" class="form-control" cols="60" rows="5"></textarea>
                  </div>
              </div>

              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Feature 2nd</label>
                  <div class="col-lg-10">
                      <textarea required placeholder="zFitnessCategory.TitleF2(Max of 100 characters)s" name="Feature2nd" class="form-control" cols="60" rows="5"></textarea>
                  </div>
              </div>

              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Feature 3rd</label>
                  <div class="col-lg-10">
                    <textarea placeholder="zFitnessCategory.TitleF3(Max of 100 characters)" required name="Feature3rd" class="form-control" cols="60" rows="5"></textarea>
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Feature 4th</label>
                  <div class="col-lg-10">
                      
                      <textarea placeholder="zFitnessCategory.TitleF4(Max of 100 characters)" required name="Feature4th" class="form-control" cols="60" rows="5"></textarea>
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Feature 5th</label>
                  <div class="col-lg-10">
                      <textarea required placeholder="zFitnessCategory.TitleF5(Max of 100 characters)" name="Feature5th" class="form-control" cols="60" rows="5"></textarea>
                  </div>
              </div>
              

              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Feature 6th</label>
                  <div class="col-lg-10">
                      <textarea required placeholder="zFitnessCategory.TitleF6(Max of 100 characters)" name="Feature6th" class="form-control" cols="60" rows="5"></textarea>
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Feature 7th</label>
                  <div class="col-lg-10">
                      <textarea required placeholder="zFitnessCategory.TitleF7(Max of 100 characters)" name="Feature7th" class="form-control" cols="60" rows="5"></textarea>
                  </div>
              </div>
             <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Feature 8th</label>
                  <div class="col-lg-10">
                      <textarea required placeholder="zFitnessCategory.TitleF8(Max of 100 characters)" name="Feature8th" class="form-control" cols="60" rows="5"></textarea>
                  </div>
              </div>

               <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">FrameColorOption</label>
                  <div class="col-lg-5">
                      <input required type="text" class="form-control" id="inputPassword1"  readOnly value="N" name="FrameColorOption" >
                  </div>
              </div>

               <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">UpholsteryColorOption</label>
                  <div class="col-lg-5">
                      <input required type="text" readOnly value="N" class="form-control" id="inputPassword1" name="UpholsteryColorOption" >
                  </div>
              </div>

              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Choose file</label>
                  <div class="col-lg-5">
                      <input type="file" class="form-control" id="inputPassword1" name="file" >
                  </div>
              </div>

              
              
              <div class="form-group">
                  <div class="col-lg-offset-2 col-lg-2">
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