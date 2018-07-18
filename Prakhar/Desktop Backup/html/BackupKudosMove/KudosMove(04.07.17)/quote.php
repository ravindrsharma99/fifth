<div class="modal-body Get_a_quot">
    <ul class="nav nav-tabs" role="tablist">
      <li role="presentation" class="active"><a href="javascript:void(0)" aria-controls="home" role="tab" data-toggle="tab">Get a Quote</a></li>
      <li role="presentation"><a href="<?php echo base_url(); ?>index.php/Booking/your_quote" >Your Quotes</a></li>
    </ul>
  <!-- Tab panes -->
    <div class="tab-content">
      <div role="tabpanel" class="tab-pane active" id="home"> 
      <!-- TAB 1 CONTENT-->
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
          <div class="panel panel-default">
            <div class="margin_top">
                <div class="col-xs-12 col-sm-6 col-md-6 paDD_zeor">
                  <div class="form-group FIRST">
                      <label>Select Category</label>
                      <form action="<?php echo base_url(); ?>index.php/Booking/quoterequest" method="POST">
                      <input type="hidden" value="<?php echo $id->id; ?>" name="id">
                        <select class="SELECT_box_penal" name="categoryquote" id="slectquote" required>
                            <option> --Select-- </option>
                              <?php foreach($qtdata as $quoted){ ?>
                        <option value="<?php echo $quoted->id; ?>"><?php echo $quoted->categoryName; ?></option>
                              <?php } ?>
                        </select>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 paDD_zeor">
                    <div class="form-group">
                      <label>Select Sub Category</label>
                      <select class="SELECT_box_penal" name="subcategoryquote" id="quotecat" required>
                        <!-- <option >-- select --</option> -->
                      </select>
                    </div>
                </div>
            </div>
           <!--    <div class="panel-heading" role="tab" id="headingOne"> -->
                  <!-- <h4 class="panel-title"> -->
                     <!--  <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne"> -->
                     <!-- <span class="glyphicon glyphicon-menu-down pull-right" aria-hidden="true"></span>
                       <select id="slectquote">
                        <option> -- Select --</option>
                            <?php foreach($qtdata as $quoted){ ?>
                        <option value="<?php echo $quoted->id; ?>"><?php echo $quoted->categoryName; ?></option>
                            <?php } ?>
                    </select> -->
                  <!-- <select id="slectquote"> -->
                      <!-- </a> -->
                  <!-- </h4> -->
             <!--  </div> -->
              <!-- <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                  <div class="panel-body">
                    <!-- <select id="slectquote">
                        <option> -- Select --</option>
                            <?php foreach($qtdata as $quoted){ ?>
                        <option value="<?php echo $quoted->id; ?>"><?php echo $quoted->categoryName; ?></option>
                            <?php } ?>
                    </select> -->
                 <!--  </div> -->
             <!--  </div> --> 
          </div>
          <!-- <div class="panel panel-default">
              <div class="panel-heading" role="tab" id="headingTwo">
                  <h4 class="panel-title">
                  <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"><span id="qquotecat"></span>
                   <span id="quotecat" class="glyphicon glyphicon-menu-down pull-right" aria-hidden="true"></span>
                  </a>
                  </h4>
              </div>
          </div> -->
          <!-- <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
            <div class="panel-body">
              Anim pariatur cliche reprehenderit, enim eiusmod 
            </div>
          </div> -->
        </div>
      </div>



      <div class="form-group">
          <label for="inputPassword3">Description</label>         
          <textarea class="form-control magn_btm" id="textarea" name="description" required rows="3" maxlength="250" ></textarea>
          <span class="text-right_custum" id="desciption_len">250 Characters remaining</span>
      </div>

      <label for="inputPassword3"  class="question DISCRUption">QUESTIONS</label> 
      <div class="form-group CuSTom_penaL">
        <label class="sr-only" for="">Questions</label>
          <?php $i = 1; foreach($question as $qustn){ ?>
          <p class="penal_HALf_text">
            <input type="hidden" value="<?php echo $qustn->question ; ?>" name="question<?php echo $i ; ?>"><?php echo $qustn->question ; ?>
          </p>
          <div class="penal_HALf">
            <div class="radio radio-info radio-inline">
                <input class="RADIO_buton" type="radio" id="<?php echo $i ; ?>" value="<?php echo $i ; ?>" name="radioInline<?php echo $i ; ?>">
                <label class="RADIO_buton_label" for="inlineRadio1"> Yes </label>
            </div>
            <div class="radio radio-inline">
                <input class="RADIO_buton" type="radio" id="<?php echo $i ; ?>" value="<?php echo $i ; ?>" name="radioInline<?php echo $i ; ?>">
                <label class="RADIO_buton_label" for="inlineRadio2"> No </label>
            </div>
          </div>
          <?php $i++; }  ?>

      </div>

                    <!-- <div class="form-group">
                     <label class="sr-only" for="">Questions</label>
                     <p>What are your prefrences?</p>
                     <div class="radio radio-info radio-inline">
                      <input type="radio" id="inlineRadio11" value="option1" name="radioInline" checked>
                      <label for="inlineRadio1"> Yes </label>
                    </div>
                    <div class="radio radio-inline">
                      <input type="radio" id="inlineRadio12" value="option2" name="radioInline">
                      <label for="inlineRadio2"> No </label>
                    </div>
                  </div>

                  <div class="form-group">
                   <label class="sr-only" for="">Questions</label>
                   <p>How would you like to travel?</p>
                   <div class="radio radio-info radio-inline">
                    <input type="radio" id="inlineRadio21" value="option1" name="radioInline" checked>
                    <label for="inlineRadio1"> Yes </label>
                  </div>
                  <div class="radio radio-inline">
                    <input type="radio" id="inlineRadio22" value="option2" name="radioInline">
                    <label for="inlineRadio2"> No </label>
                  </div>
                </div>
                <div class="form-group">
                 <label class="sr-only" for="">Questions</label>
                 <p>Is medium limited?</p>
                 <div class="radio radio-info radio-inline">
                  <input type="radio" id="inlineRadio31" value="option1" name="radioInline" checked>
                  <label for="inlineRadio1"> Yes </label>
                </div>
                <div class="radio radio-inline">
                  <input type="radio" id="inlineRadio32" value="option2" name="radioInline">
                  <label for="inlineRadio2"> No </label>
                </div> -->
      <div class="save_btn">
        <button class="SAVE_BUTTOn" type="submit" id="btn" name="savee" class="book_Credit">Save</button>
      </div>
      </form>
  </div>
        <!-- /TAB 1 CONTENT-->
</div>
           <!-- <div role="tabpanel" class="tab-pane" id="profile">

 

           </div> -->
         </div>
       </div>
     </div>
   </div>
 </div>