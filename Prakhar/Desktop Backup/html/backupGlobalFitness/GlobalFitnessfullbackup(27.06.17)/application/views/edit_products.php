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
            <h3><b>Edit Product</b></h3>
            </header>

            <?php foreach ($category_list as $val) {
             # code...
            ?>
               <div class="panel-body">
            <form class="form-horizontal" method="post" enctype="multipart/form-data" action="" role="form" >

              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">MPN</label>
                  <div class="col-lg-5">
                    <select name="MPN" class="form-control m-bot15" id="AmpsID">
                     <?php
                        foreach($mpn as $am){
                         if($am->ManufacturerPartNumber == $val->MPN){
                            echo "<option selected value='".$am->ManufacturerPartNumber."'>".$am->SalesDesc."</option>";
                         }else{

                          echo "<option value='".$am->ManufacturerPartNumber."''>".$am->SalesDesc."</option>";
                         }
                        }
                     ?>
                    </select>
                  </div>
              </div>

              <div class="form-group">
                  <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Kingdom</label>
                  <div class="col-lg-5">
                    <select name="Kingdom" class="form-control m-bot15" id="Kingdom"  >
                    <option value='Cardio' <?php if($val->Kingdom == 'Cardio') { echo "selected"; } ?> >Cardio</option>
                    <option value='Strength' <?php if($val->Kingdom == 'Strength') { echo "selected"; } ?> >Strength</option>
                    </select>
                  </div>
              </div>

                <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">CategoryName</label>
                  <div class="col-lg-5">
                    <select name="CategoryName" class="form-control m-bot15" id="CategoryName">
                     <?php
                        foreach($category as $ct){
                         if($ct->Name == $val->CategoryName){
                            echo "<option selected value='".$ct->Name."'>".$ct->Name."</option>";
                         }else{

                          echo "<option value='".$ct->Name."''>".$ct->Name."</option>";
                         }
                        }
                     ?>
                    </select>
                  </div>
              </div>
         <!--  <div class="panel-body"> StockKeepingUnit MetaDetailPageTitleTag  MetaDetailPageDescriptionTag
         MetaDetailPageKeywordTag ProductName ImageURL Price Condition WarrantyBlurb WarrantyDecription
         Voltage ProductDescription Amps Dimensions Weight WeightCapacity    
         QuantityOnHand  QuantityOnOrder QuantityOnSalesOrder Kingdom CategoryName NMFCClass ShippingWeight BrandName
         VersionName Piece  Class ConditionFilter
            <form class="form-horizontal" method="post" enctype="multipart/form-data" action="" role="form" > -->


              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">BrandName</label>
                  <div class="col-lg-5">
                    <select name="BrandName" class="form-control m-bot15" id="BrandName">
                     <?php
                        foreach($Brand as $bd){
                         if($bd->Name == $val->BrandName){
                            echo "<option selected value='".$bd->Name."'>".$bd->Name."</option>";
                         }else{

                          echo "<option value='".$bd->Name."''>".$bd->Name."</option>";
                         }
                        }
                     ?>
                    </select>
                  </div>
              </div>

              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">VersionName</label>
                  <div class="col-lg-5">
                    <select name="VersionName" class="form-control m-bot15" id="VersionName">
                     <?php
                        foreach($version as $ver){
                         if($ver->Name == $val->VersionName){
                            echo "<option selected value='".$ver->Name."'>".$ver->Name."</option>";
                         }else{

                          echo "<option value='".$ver->Name."''>".$ver->Name."</option>";
                         }
                        }
                     ?>
                    </select>
                  </div>
              </div>


              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Piece</label>
                  <div class="col-lg-5">
                    <select name="Piece" class="form-control m-bot15" id="Piece">
                     <?php
                        foreach($piece as $pec){
                         if($pec->Name == $val->Piece){
                            echo "<option selected value='".$pec->Name."'>".$pec->Name."</option>";
                         }else{

                          echo "<option value='".$pec->Name."''>".$pec->Name."</option>";
                         }
                        }
                     ?>
                    </select>
                  </div>
              </div>


              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Class</label>
                  <div class="col-lg-5">
                    <select name="Class" class="form-control m-bot15" id="Class">
                     <?php
                        foreach($class as $cls){
                         if($cls->Name == $val->Class){
                            echo "<option selected value='".$cls->Name."'>".$cls->Name."</option>";
                         }else{

                          echo "<option value='".$cls->Name."''>".$cls->Name."</option>";
                         }
                        }
                     ?>
                    </select>
                  </div>
              </div>

                <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">ListID</label>
                  <div class="col-lg-5">
                    <input value='<?php echo $val->ListID; ?>' required placeholder="Enter ListID" type="text" class="form-control" id="ListID" name="ListID" >
                  </div>
                </div>


              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">ParentRef_FullName</label>
                  <div class="col-lg-5">
                    <input value='<?php echo $val->ParentRef_FullName; ?>' required placeholder="Enter ParentRef_FullName" type="text" class="form-control" id="ParentRef_FullName" name="ParentRef_FullName" >
                  </div>
              </div>

              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">StockKeepingUnit</label>
                  <div class="col-lg-5">
                    <input value='<?php echo $val->StockKeepingUnit; ?>' required placeholder="Enter StockKeepingUnit" type="text" class="form-control" id="StockKeepingUnit" name="StockKeepingUnit" >
                  </div>
                </div>

            <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">MetaDetailPageTitleTag</label>
                  <div class="col-lg-10">
                      <textarea  name="MetaDetailPageTitleTag"  placeholder="Approximately 200 Words, no HTML or special charactors" class="form-control" cols="60" rows="5"><?php echo $val->MetaDetailPageTitleTag; ?></textarea>
                  </div>
              </div>

              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">MetaDetailPageDescriptionTag</label>
                  <div class="col-lg-10">
                      <textarea  name="MetaDetailPageDescriptionTag"  placeholder="Approximately 200 Words, no HTML or special charactors" class="form-control" cols="60" rows="5"><?php echo $val->MetaDetailPageDescriptionTag; ?></textarea>
                  </div>
              </div>
                
              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">MetaDetailPageKeywordTag</label>
                  <div class="col-lg-10">
                      <textarea  name="MetaDetailPageKeywordTag"  placeholder="Approximately 200 Words, no HTML or special charactors" class="form-control" cols="60" rows="5"><?php echo $val->MetaDetailPageKeywordTag; ?></textarea>
                  </div>
              </div>
                 
                 <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">ProductName</label>
                  <div class="col-lg-10">
                      <textarea  name="ProductName"  placeholder="Approximately 200 Words, no HTML or special charactors" class="form-control" cols="60" rows="5"><?php echo $val->ProductName; ?></textarea>
                  </div>
              </div>
                

                <!-- <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">ImageURL</label>
                  <div class="col-lg-5">
                    <input value='<?php //echo $val->ImageURL; ?>' required placeholder="Enter ProductName" type="text" class="form-control" id="ImageURL" name="ImageURL" >
                  </div>
                </div> -->

                  <!-- <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Choose file</label>
                  <div class="col-lg-5">
                      <input type="file" class="form-control" id="inputPassword1" name="file" >
                  </div>
              </div> -->

              

              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Price</label>
                  <div class="col-lg-5">
                    <input value='<?php echo $val->Price; ?>' required placeholder="Enter Price" type="text" class="form-control" id="Price" name="Price" >
                  </div>
                </div>



                 <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Condition</label>
                  <div class="col-lg-5">
                    <select name="Condition" class="form-control m-bot15" id="Condition">
                     <?php
                        foreach($condition as $cr){
                         if($cr->Name == $val->Condition){
                            echo "<option selected value='".$cr->Name."'>".$cr->Name."</option>";
                         }else{

                          echo "<option value='".$cr->Name."''>".$cr->Name."</option>";
                         }
                        }
                     ?>
                    </select>
                  </div>
              </div>



              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Warranty</label>
                  <div class="col-lg-5">
                    <select name="WarrantyBlurb" class="form-control m-bot15" id="WarrantyBlurb">
                     <?php
                        foreach($warranty as $wt){
                         if($wt->Name == $val->WarrantyBlurb){
                            echo "<option selected value='".$wt->Name."'>".$wt->Name."</option>";
                         }else{

                          echo "<option value='".$wt->Name."''>".$wt->Name."</option>";
                         }
                        }
                     ?>
                    </select>
                  </div>
              </div>


               <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">WarrantyDecription</label>
                  <div class="col-lg-5">
                    <input value='<?php echo $val->WarrantyDecription; ?>'  placeholder="Enter WarrantyDecription" type="text" class="form-control" id="WarrantyDecription" name="WarrantyDecription" >
                  </div>
              </div>


              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Voltage</label>
                  <div class="col-lg-5">
                    <input value='<?php echo $val->Voltage; ?>' required placeholder="Enter Price" type="text" class="form-control" id="Voltage" name="Voltage" >
                  </div>
              </div>



              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">ProductDescription</label>
                  <div class="col-lg-10">
                      <textarea  name="ProductDescription"  placeholder="Approximately 200 Words, no HTML or special charactors" class="form-control" cols="60" rows="5"><?php echo $val->ProductDescription; ?></textarea>
                  </div>
              </div>



              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Amps</label>
                  <div class="col-lg-5">
                    <input value='<?php echo $val->Amps; ?>' required placeholder="" type="text" class="form-control" id="Amps" name="Amps" >
                  </div>
              </div>

              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Dimensions </label>
                  <div class="col-lg-5">
                    <input value='<?php echo $val->Dimensions ; ?>' required placeholder="" type="text" class="form-control" id="Dimensions" name="Dimensions" >
                  </div>
              </div>


              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Weight</label>
                  <div class="col-lg-5">
                    <input value='<?php echo $val->Weight ; ?>' required placeholder="" type="text" class="form-control" id="Weight" name="Weight" >
                  </div>
              </div>

              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">WeightCapacity</label>
                  <div class="col-lg-5">
                    <input value='<?php echo $val->WeightCapacity ; ?>' required placeholder="" type="text" class="form-control" id="WeightCapacity" name="WeightCapacity" >
                  </div>
              </div>


              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Feature 1st</label>
                  <div class="col-lg-10">
                      <textarea  placeholder="*Max of 100 characters" name="Feature1st" class="form-control" cols="60" rows="5"><?php echo $val->Feature1st ; ?></textarea>
                  </div>
              </div>
             <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Feature 2nd</label>
                  <div class="col-lg-10"> 
                      <textarea  placeholder="*Max of 100 characters" name="Feature2nd" class="form-control" cols="60" rows="5"><?php echo $val->Feature2nd ; ?></textarea>
                  </div>
              </div>


              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Feature 3rd</label>
                  <div class="col-lg-10">
                      <textarea  placeholder="*Max of 100 characters" name="Feature3rd" class="form-control" cols="60" rows="5"><?php echo $val->Feature3rd ; ?></textarea>
                  </div>
              </div>
             <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Feature 4th</label>
                  <div class="col-lg-10">
                      <textarea  placeholder="*Max of 100 characters" name="Feature4th" class="form-control" cols="60" rows="5"><?php echo $val->Feature4th ; ?></textarea>
                  </div>
              </div>


              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Feature 5th</label>
                  <div class="col-lg-10">
                      <textarea  placeholder="*Max of 100 characters" name="Feature5th" class="form-control" cols="60" rows="5"><?php echo $val->Feature5th ; ?></textarea>
                  </div>
              </div>
             <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Feature 6th</label>
                  <div class="col-lg-10">
                      <textarea  placeholder="*Max of 100 characters" name="Feature6th" class="form-control" cols="60" rows="5"><?php echo $val->Feature6th ; ?></textarea>
                  </div>
              </div>


              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Feature 7th</label>
                  <div class="col-lg-10">
                      <textarea  placeholder="*Max of 100 characters" name="Feature7th" class="form-control" cols="60" rows="5"><?php echo $val->Feature7th ; ?></textarea>
                  </div>
              </div>
             <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Feature 8th</label>
                  <div class="col-lg-10">
                      <textarea  placeholder="*Max of 100 characters" name="Feature8th" class="form-control" cols="60" rows="5"><?php echo $val->Feature8th ; ?></textarea>
                  </div>
              </div>


               <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">QuantityOnHand</label>
                  <div class="col-lg-5">
                    <input value='<?php echo $val->QuantityOnHand; ?>' required placeholder="" type="text" class="form-control" id="QuantityOnHand" name="QuantityOnHand" >
                  </div>
              </div>

              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">QuantityOnOrder</label>
                  <div class="col-lg-5">
                    <input value='<?php echo $val->QuantityOnOrder; ?>' required placeholder="" type="text" class="form-control" id="QuantityOnOrder" name="QuantityOnOrder" >
                  </div>
              </div>

              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">QuantityOnSalesOrder</label>
                  <div class="col-lg-5">
                    <input value='<?php echo $val->QuantityOnSalesOrder; ?>' required placeholder="" type="text" class="form-control" id="QuantityOnSalesOrder" name="QuantityOnSalesOrder" >
                  </div>
              </div>



              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">NMFCClass</label>
                  <div class="col-lg-5">
                    <input value='<?php echo $val->NMFCClass; ?>'  placeholder="" type="text" class="form-control" id="NMFCClass" name="NMFCClass" >
                  </div>
              </div>
             
              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">ShippingWeight</label>
                  <div class="col-lg-5">
                    <input value='<?php echo $val->ShippingWeight; ?>'  placeholder="" type="text" class="form-control" id="ShippingWeight" name="ShippingWeight" >
                  </div>
              </div>
                

              <!-- <input type="hidden" value="<?php //echo $val->ListID; ?>" name="id"> -->
              <?php } ?>
              <div class="form-group">
                  <div class="col-lg-offset-2 col-lg-10">
                      <button type="submit" name="submitLog" class="btn btn-danger">Update</button>
                  </div>
              </div>
            </form>
             <span><a class="btn btn-primary" href='<?php echo base_url("/dashboard/$type"); ?>'>Back</a></span>
          </div>
        </section>
      </div>
    </div>
  </section>
</section>