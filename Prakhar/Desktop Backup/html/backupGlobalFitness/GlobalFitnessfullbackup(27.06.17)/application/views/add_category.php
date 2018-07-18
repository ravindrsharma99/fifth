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
            <h3><b>New Category</b></h3>
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
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">ClickCount</label>
                  <div class="col-lg-5">
                    <input required placeholder="" value="0" type="number" class="form-control" id="ClickCount" name="ClickCount" >
                  </div>
              </div>

              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">MenuName</label>
                  <div class="col-lg-5">
                    <input required placeholder=""  type="text" class="form-control" id="MenuName" name="MenuName" >
                  </div>
              </div>

                <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">ImageFolderName</label>
                  <div class="col-lg-5">
                    <input required placeholder="" type="text" class="form-control" id="ImageFolderName" name="ImageFolderName" >
                  </div>
              </div>

               
              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Description</label>
                  <div class="col-lg-8">
                      <textarea required name="Description" onKeyDown="limitText(this.form.Description,this.form.countdown,500);" onKeyUp="limitText(this.form.Description,this.form.countdown,500);"  placeholder="Approximately 500 Words, no HTML or special charactors" class="form-control" cols="60" rows="5"></textarea>
                      
                  </div>
                  <font size="1">(Maximum characters: 500)<br>
You have <input readonly type="text" name="countdown" size="3" value="500"> characters left.</font>
              </div>
              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Keywords</label>
                  <div class="col-lg-8">
                      <textarea required name="Keywords" onKeyDown="limitText(this.form.Keywords,this.form.countdown1,500);" onKeyUp="limitText(this.form.Keywords,this.form.countdown1,500);"  placeholder="Approximately 500 Words, no HTML or special charactors" class="form-control" cols="60" rows="5"></textarea>
                  </div>
                   <font size="1">(Maximum characters: 500)<br>
You have <input readonly type="text" name="countdown1" size="3" value="500"> characters left.</font>
       
              </div>

              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">ClassID</label>
                  <div class="col-lg-5">
                    <input required placeholder="" value="0" type="text" class="form-control" id="ClassID" name="ClassID" >
                  </div>
              </div> 

                <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">szCode</label>
                  <div class="col-lg-5">
                    <input  placeholder="" value="0" type="text" class="form-control" id="szCode" name="szCode" >
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">msCode</label>
                  <div class="col-lg-5">
                    <input  placeholder="" value="0" type="text" class="form-control" id="szCode" name="msCode" >
                  </div>
              </div>
          <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">scCode</label>
                  <div class="col-lg-5">
                    <input  placeholder="" value="0" type="text" class="form-control" id="scCode" name="scCode" >
                  </div>
              </div> 
              <div class="form-group">
                  <label for="ntCode" class="col-lg-2 col-sm-2 control-label">ntCode</label>
                  <div class="col-lg-5">
                    <input  placeholder="" value="0" type="text" class="form-control" id="ntCode" name="ntCode" >
                  </div>
              </div> 
 

               <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">GoogleCode</label>
                  <div class="col-lg-8">
                      <textarea required name="GoogleCode"  onKeyDown="limitText(this.form.GoogleCode,this.form.countdown2,500);" onKeyUp="limitText(this.form.GoogleCode,this.form.countdown2,500);" placeholder="Approximately 500 Words, no HTML or special charactors" class="form-control" cols="60" rows="5"></textarea>
                  </div>
                      <font size="1">(Maximum characters: 500)<br>
You have <input readonly type="text" name="countdown2" size="3" value="500"> characters left.</font>
              </div>

            <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">TitleF1</label>
                  <div class="col-lg-8">
                      <textarea  name="TitleF1"  onKeyDown="limitText(this.form.TitleF1,this.form.countdown3,500);" onKeyUp="limitText(this.form.TitleF1,this.form.countdown3,500);" placeholder="Approximately 500 Words, no HTML or special charactors" class="form-control" cols="60" rows="5"></textarea>
                  </div>
                      <font size="1">(Maximum characters: 500)<br>
You have <input readonly type="text" name="countdown3" size="3" value="500"> characters left.</font>
              </div>
            <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">TitleF2</label>
                  <div class="col-lg-8">
                      <textarea  name="TitleF2"  onKeyDown="limitText(this.form.TitleF2,this.form.countdown4,500);" onKeyUp="limitText(this.form.TitleF2,this.form.countdown4,500);" placeholder="Approximately 500 Words, no HTML or special charactors" class="form-control" cols="60" rows="5"></textarea>
                  </div>
                      <font size="1">(Maximum characters: 500)<br>
You have <input readonly type="text" name="countdown4" size="3" value="500"> characters left.</font>
              </div>

              <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">TitleF3</label>
                  <div class="col-lg-8">
                      <textarea  name="TitleF3"  onKeyDown="limitText(this.form.TitleF3,this.form.countdown5,500);" onKeyUp="limitText(this.form.TitleF3,this.form.countdown5,500);" placeholder="Approximately 500 Words, no HTML or special charactors" class="form-control" cols="60" rows="5"></textarea>
                  </div>
                      <font size="1">(Maximum characters: 500)<br>
You have <input readonly type="text" name="countdown5" size="3" value="500"> characters left.</font>
              </div>


                <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">TitleF4</label>
                  <div class="col-lg-8">
                      <textarea  name="TitleF4"  
                       onKeyDown="limitText(this.form.TitleF4,this.form.countdown6,500);" onKeyUp="limitText(this.form.TitleF4,this.form.countdown6,500);"  placeholder="Approximately 500 Words, no HTML or special charactors" class="form-control" cols="60" rows="5"></textarea>
                  </div>
                             <font size="1">(Maximum characters: 500)<br>
You have <input readonly type="text" name="countdown6" size="3" value="500"> characters left.</font>
              </div>


                <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">TitleF5</label>
                  <div class="col-lg-8">
                      <textarea  name="TitleF5"  onKeyDown="limitText(this.form.TitleF5,this.form.countdown7,500);" onKeyUp="limitText(this.form.TitleF5,this.form.countdown7,500);" placeholder="Approximately 500 Words, no HTML or special charactors" class="form-control" cols="60" rows="5"></textarea>
                  </div>
                             <font size="1">(Maximum characters: 500)<br>
You have <input readonly type="text" name="countdown7" size="3" value="500"> characters left.</font>
              </div>


                <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">TitleF6</label>
                  <div class="col-lg-8">
                      <textarea  name="TitleF6"  onKeyDown="limitText(this.form.TitleF6,this.form.countdown8,500);" onKeyUp="limitText(this.form.TitleF6,this.form.countdown8,500);" placeholder="Approximately 500 Words, no HTML or special charactors" class="form-control" cols="60" rows="5"></textarea>
                  </div>
                             <font size="1">(Maximum characters: 500)<br>
You have <input readonly type="text" name="countdown8" size="3" value="500"> characters left.</font>
              </div>


                <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">TitleF7</label>
                  <div class="col-lg-8">
                      <textarea  name="TitleF7"  onKeyDown="limitText(this.form.TitleF7,this.form.countdown9,500);" onKeyUp="limitText(this.form.TitleF7,this.form.countdown9,500);" placeholder="Approximately 500 Words, no HTML or special charactors" class="form-control" cols="60" rows="5"></textarea>
                  </div>
                             <font size="1">(Maximum characters: 500)<br>
You have <input readonly type="text" name="countdown9" size="3" value="500"> characters left.</font>
              </div>


                <div class="form-group">
                  <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">TitleF8</label>
                  <div class="col-lg-8">
                      <textarea  name="TitleF8"  onKeyDown="limitText(this.form.TitleF8,this.form.countdown10,500);" onKeyUp="limitText(this.form.TitleF8,this.form.countdown10,500);" placeholder="Approximately 500 Words, no HTML or special charactors" class="form-control" cols="60" rows="5"></textarea>
                  </div>
                             <font size="1">(Maximum characters: 500)<br>
You have <input readonly type="text" name="countdown10" size="3" value="500"> characters left.</font>
              </div>


 <div class="form-group">
                  <label for="NMFCClass" class="col-lg-2 col-sm-2 control-label">NMFCClass</label>
                  <div class="col-lg-5">
                    <input  placeholder="" value="0" type="text" class="form-control" id="ntCode" name="NMFCClass" >
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