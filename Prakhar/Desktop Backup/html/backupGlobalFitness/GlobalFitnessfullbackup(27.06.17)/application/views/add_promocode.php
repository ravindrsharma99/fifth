<script type="text/javascript">  
function limitText(limitField, limitCount, limitNum) {
  if (limitField.value.length > limitNum) {
    limitField.value = limitField.value.substring(0, limitNum);
    alert('Sorry !! Words Limit Reached');
  } else {
    limitCount.value = limitNum - limitField.value.length;
  }
}

</script>
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
            <h3><b>New Promo Code</b></h3>
            </header>
           
          <div class="panel-body">
            <form class="form-horizontal" method="post" enctype="multipart/form-data" action="" role="form" >

              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Coupon Code</label>
                  <div class="col-lg-5">
                    <input required placeholder="Coupon Code" type="text" class="form-control" id="CoupnCode" name="CoupnCode" >
                  </div>
              </div>

              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Coupon Name</label>
                  <div class="col-lg-5">
                    <input required placeholder="Coupon Name"  type="text" class="form-control" id="CouponName" name="CouponName" >
                  </div>
              </div>

               
              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Coupon Description</label>
                  <div class="col-lg-8">
                      <textarea required name="CouponDescription" onKeyDown="limitText(this.form.Description,this.form.countdown,500);" onKeyUp="limitText(this.form.Description,this.form.countdown,500);"  placeholder="Approximately 500 Words, no HTML or special charactors" class="form-control" cols="60" rows="5"></textarea>
                      
                  </div>
                  <font size="1">(Maximum characters: 500)<br>
You have <input readonly type="text" size="3" value="500"> characters left.</font>
              </div>

                <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Coupon Start Date</label>
                  <div class="col-lg-5">
                    <input required placeholder="" type="text" class="form-control some_class" id="CouponStartDate" name="CouponStartDate" >
                  </div>
              </div>

              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Coupon End Date</label>
                  <div class="col-lg-5">
                    <input required placeholder=""  type="text" class="form-control some_class1" id="EndDate" name="CouponEndDate" >
                  </div>
              </div>
            
                <div class="form-group">
                  <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">IsPercent Off</label>
                  <div class="col-lg-5">
                    <select name="IsPercentOff" class="form-control m-bot15" id="IsPercentOff">
                    <option value='Y'>Yes</option>
                    <option value='N'>No</option>
                    </select>
                  </div>
              </div>
             
             

                <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Percent Off</label>
                  <div class="col-lg-5">
                    <input  placeholder="" value="0" type="text" class="form-control" id="szCode" name="PercentOff" >
                  </div>
              </div>

               <div class="form-group">
                  <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">IsDollar Off</label>
                  <div class="col-lg-5">
                    <select name="IsDollarOff" class="form-control m-bot15" id="IsDollarOff">
                    <option value='Y'>Yes</option>
                    <option value='N'>No</option>
                    </select>
                  </div>
              </div>

          <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Dollar Off</label>
                  <div class="col-lg-5">
                    <input  placeholder="" value="0" type="text" class="form-control" id="scCode" name="DollarOff" >
                  </div>
              </div> 
                <div class="form-group">
                  <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">IsOrder Size Contingent</label>
                  <div class="col-lg-5">
                    <select name="IsOrderSizeContingent" class="form-control m-bot15" id="IsOrderSizeContingent">
                    <option value='Y'>Yes</option>
                    <option value='N'>No</option>
                    </select>
                  </div>
              </div>
             


              

               <div class="form-group">
                  <label for="ntCode" class="col-lg-2 col-sm-2 control-label">Contingent Limit</label>
                  <div class="col-lg-5">
                    <input  placeholder="" value="0" type="text" class="form-control" id="ntCode" name="ContingentLimit" >
                  </div>
              </div> 
                  <div class="form-group">
                  <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">IsProduct Specific</label>
                  <div class="col-lg-5">
                    <select name="IsProductSpecific" class="form-control m-bot15" id="IsProductSpecific">
                    <option value='Y'>Yes</option>
                    <option value='N'>No</option>
                    </select>
                  </div>
              </div>
             
               <div class="form-group">
                  <label for="ntCode" class="col-lg-2 col-sm-2 control-label">Product ListID</label>
                  <div class="col-lg-5">
                    <input  placeholder="" value="0" type="text" class="form-control" id="ntCode" name="ProductListID" >
                  </div>
              </div> 

                 <div class="form-group">
                  <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">IsCategory Specific</label>
                  <div class="col-lg-5">
                    <select name="IsCategorySpecific" class="form-control m-bot15" id="IsCategorySpecific">
                    <option value='Y'>Yes</option>
                    <option value='N'>No</option>
                    </select>
                  </div>
              </div>
               <div class="form-group">
                  <label for="ntCode" class="col-lg-2 col-sm-2 control-label">Product Category</label>
                  <div class="col-lg-5">
                    <input  placeholder="" value="0" type="text" class="form-control" id="ntCode" name="ProductCategory" >
                  </div>
              </div> 
               <div class="form-group">
                  <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">IsBrand Specific</label>
                  <div class="col-lg-5">
                    <select name="IsBrandSpecific" class="form-control m-bot15" id="IsBrandSpecific">
                    <option value='Y'>Yes</option>
                    <option value='N'>No</option>
                    </select>
                  </div>
              </div>


               <div class="form-group">
                  <label for="ntCode" class="col-lg-2 col-sm-2 control-label">Product Brand</label>
                  <div class="col-lg-5">
                    <input  placeholder="" value="0" type="text" class="form-control" id="ntCode" name="ProductBrand" >
                  </div>
              </div> 
    <div class="form-group">
                  <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Is Active</label>
                  <div class="col-lg-5">
                    <select name="IsActive" class="form-control m-bot15" id="IsActive">
                    <option value='Y'>Yes</option>
                    <option value='N'>No</option>
                    </select>
                  </div>
              </div>
          

              
              <div class="form-group">
                  <div class="col-lg-offset-2 col-lg-10">
                      <button type="submit" name="submitLogPromo" class="btn btn-danger">Add</button>
                  </div>
              </div>
            </form>
          </div>
        </section>
      </div>
    </div>
  </section>
</section>




<script src="<?php echo base_url('js/jquery.js');?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.4/build/jquery.datetimepicker.full.js"></script>
<script>
$.datetimepicker.setLocale('en');
$('.some_class').datetimepicker();
$('.some_class1').datetimepicker();

</script>