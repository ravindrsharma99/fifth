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
            <h3><b>Add Product</b></h3>
            </header>
           
          <div class="panel-body">
            <form class="form-horizontal" method="post" action="" role="form" >
              <div class="form-group">
                  <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">MPN</label>
                  <div class="col-lg-5">
                      <input required type="text" name="MPN" class="form-control" id="inputEmail1" >
                  </div>
              </div>

              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">ListID</label>
                  <div class="col-lg-5">
                      <input required type="text" class="form-control" name="ListID">
                  </div>
              </div>

               <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Parent Reference</label>
                  <div class="col-lg-5">
                      <input required type="text" class="form-control" id="inputPassword1" name="ParentRef_FullName" >
                  </div>
              </div>

              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Socket Keeping Unit</label>
                  <div class="col-lg-5">
                      <input required type="text" class="form-control" id="inputPassword1" name="StockKeepingUnit" >
                  </div>
              </div>

              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Meta Title Tag</label>
                  <div class="col-lg-10">
                      <textarea name="MetaTitleTag" class="form-control" cols="60" rows="5"></textarea>
                  </div>
              </div>


              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Meta Description Tag</label>
                  <div class="col-lg-10">
                      <textarea required name="MetaDescriptionTag" class="form-control" cols="60" rows="5"></textarea>
                  </div>
              </div>



              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Meta Keyword Tag</label>
                  <div class="col-lg-10">
                    <textarea required name="MetaKeywordTag" class="form-control" cols="60" rows="5"></textarea>
                  </div>
              </div>


              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Stock Keeping Unit</label>
                  <div class="col-lg-5">
                      <input required type="text" class="form-control" id="inputPassword1" name="StockKeepingUnit" >
                  </div>
              </div>


              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Product Name</label>
                  <div class="col-lg-5">
                      <input required type="text" class="form-control" id="inputPassword1" name="ProductName" >
                  </div>
              </div>


              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Price</label>
                  <div class="col-lg-5">
                      <input required type="number" class="form-control" id="inputPassword1" name="Price" >
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Condition</label>
                  <div class="col-lg-5">
                      <input required type="text" class="form-control" id="inputPassword1" name="Condition" >
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Warranty Blurb</label>
                  <div class="col-lg-5">
                      <input required type="text" class="form-control" id="inputPassword1" name="WarrantyBlurb" >
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Warranty Decription</label>
                  <div class="col-lg-10">
                       <textarea required name="WarrantyDecription" class="form-control" cols="60" rows="5"></textarea>

                  </div>
              </div>
              
              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Voltage</label>
                  <div class="col-lg-5">
                      <input required type="text" class="form-control" id="inputPassword1" name="Voltage" >
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Product Description</label>
                  <div class="col-lg-10">
                      <textarea required name="ProductDescription" class="form-control" cols="60" rows="5"></textarea>
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Amps</label>
                  <div class="col-lg-5">
                      <input required type="text" class="form-control" id="inputPassword1" name="Amps" >
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Dimensions</label>
                  <div class="col-lg-5">
                      <input required type="text" class="form-control" id="inputPassword1" name="Dimensions" >
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Weight</label>
                  <div class="col-lg-5">
                      <input required type="text" class="form-control" id="inputPassword1" name="Weight" >
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Weight Capacity</label>
                  <div class="col-lg-5">
                      <input required type="text" class="form-control" id="inputPassword1" name="WeightCapacity" >
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Feature 1st</label>
                  <div class="col-lg-5">                     
                       <textarea required name="Feature1st" class="form-control" cols="60" rows="5"></textarea>
                  </div>
              </div>

              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Feature 2nd</label>
                  <div class="col-lg-10">
                      <textarea required name="Feature2nd" class="form-control" cols="60" rows="5"></textarea>
                  </div>
              </div>

              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Feature 3rd</label>
                  <div class="col-lg-10">
                    <textarea required name="Feature3rd" class="form-control" cols="60" rows="5"></textarea>
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Feature 4th</label>
                  <div class="col-lg-10">
                      
                      <textarea required name="Feature4th" class="form-control" cols="60" rows="5"></textarea>
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Feature 5th</label>
                  <div class="col-lg-10">
                      <textarea required name="Feature5th" class="form-control" cols="60" rows="5"></textarea>
                  </div>
              </div>
              

              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Feature 6th</label>
                  <div class="col-lg-10">
                      <textarea required name="Feature6th" class="form-control" cols="60" rows="5"></textarea>
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Feature 7th</label>
                  <div class="col-lg-10">
                      <textarea required name="Feature7th" class="form-control" cols="60" rows="5"></textarea>
                  </div>
              </div>
             <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Feature 8th</label>
                  <div class="col-lg-10">
                      <textarea required name="Feature8th" class="form-control" cols="60" rows="5"></textarea>
                  </div>
              </div>

               <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Quantity On Hand</label>
                  <div class="col-lg-5">
                      <input required type="text" class="form-control" id="inputPassword1" name="QuantityOnHand" >
                  </div>
              </div>

               <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Quantity On Order</label>
                  <div class="col-lg-5">
                      <input required type="text" class="form-control" id="inputPassword1" name="QuantityOnOrder" >
                  </div>
              </div>
               <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Quantity On Sales Order</label>
                  <div class="col-lg-5">
                      <input required type="text" class="form-control" id="inputPassword1" name="QuantityOnSalesOrder" >
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