<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.5";
  fjs.parentNode.insertBefore(js, fjs); 
}(document, 'script', 'facebook-jssdk'));</script>

<div itemscope itemtype="http://schema.org/Product">
  <div class="container-fluid">
        <div class=" accordin_penal_b PADD_ThREee">
            <div class="accordion cust_acc padd-no">
              <dl>
                <div class="top_brder">
                  <div class="padd-no">
                    <dt class="respon all_center">
                        <h1 aria-expanded="false" aria-controls="accordion1" class="accordion-title accordionTitle js-accordionTrigger  ACCORDIan_H_ONE"  href="#accordion1"> <span itemprop="brand" style="display: none"><?php echo $detail[0]->BrandName; ?></span><span itemprop="name"><?php echo $detail[0]->ProductName ; ?> </span>
                        <div class="arrw BFDBFDBD"><span class="bar top"></span><span class="bar bottom"></span></div></h1>
                    </dt>
                    <dd class="accordion-content accordionItem is-collapsed" id="#accordion1" aria-hidden="true">
                        <div class="row inner_product_container">
                            <div class="col-md-12 col-sm-12 padd-no">
                                <!-- <p><?php echo $detail[0]->ProductName ; ?></p> -->
                                <div class="product">
                                    <p>
                                        <span itemprop="description"><?php echo $detail[0]->ProductDescription; ?></span>
                                        <span itemprop="mpn" style="display: none"><?php  echo $detail[0]->MPN; ?> </span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </dd>
                  </div>
                </div>
              </dl>
            </div>
          </div>
      </div>
 <span itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
    <span itemprop="ratingValue" style="display:none"><?php echo $star_rate; ?></span><span itemprop="reviewCount" style="display:none"><?php echo $star_count; ?></span></span>
<div class="container-fluid PADD_ThREee">
<div class="top_brder">
<div class="container-fluid custom">
<div class="row inner_product_discription  ">
<div class="col-md-6 col-sm-6 img_penal_l">
<a href="">
<img itemprop="image" class="img-responsive" src="<?php echo base_url().$detail[0]->ImageURL; ?>" alt="<?php echo $detail[0]->ProductName; ?>" title="<?php echo $detail[0]->MetaDetailPageTitleTag; ?>">
</a>
</div>
 <span itemprop="offers" itemscope itemtype="http://schema.org/Offer">
<div class="col-md-4 col-sm-6 col-md-offset-2 col-sm-offset-0">
<div class="row">
<div class="col-md-6 col-sm-6"><div class="price_box"><meta itemprop="priceCurrency" content="USD" /><?php if($detail[0]->Price!="Please Enquire"){ echo "$";} $helo = trim($detail[0]->Price,'$'); ?><span itemprop="price" content="<?php print_r(str_replace(",","",$helo)); ?>"><?php echo trim($detail[0]->Price,'$'); ?></span></div></div>
<div class="col-md-6 col-sm-6">
<div class="dropdown ">
<?php                  
$heckcount = 0;
if(isset($_SESSION['productDetail']['addtocart'])){
  if(in_array($detail[0]->ListID,$_SESSION['productDetail']['addtocart'])){
    $heckcount = 1;
  }
}
else{
   $heckcount= 0;
}
if($heckcount==0){
?>  
<?php
  
   if(trim($detail[0]->Price,'$') === 'Please Enquire' ){ ?>
  
  <button class="btn btn-default Emailwala" data-toggle="modal" data-target="#myModal_email">
  Email me</button>


 <!--  <form  method='post' name='email_me' >
    <input type='hidden' name='productId' value='<?php  echo $detail[0]->ListID; ?>'>
    <input type='hidden' name='productName' value='<?php echo $detail[0]->ProductName; ?>'>
    <input type='hidden' name='brandName' value='<?php echo $detail[0]->BrandName; ?>'>
    <input type='hidden' name='versionName' value='<?php echo $detail[0]->VersionName; ?>'>
    <input type='submit' class="btn drop_ad" name='email_me' value='Email me'>
</form> -->
<?php }else{ 

 if($detail[0]->QuantityOnHand<=0){
                      ?>
                       <button class="btn btn-default Emailwala" id="waitlistMe" data-toggle="modal" data-target="#waitlistMeModal">
                    Waitlist Me</button>  
                  <?php }else
                       {
                    ?> 
                    <?php if($detail[0]->CategoryName =='Selectorized Station' || $detail[0]->CategoryName =='Plate Loaded Station'){
                      ?>
                        <a rel="nofollow" data-toggle="modal" data-target="#myModal_important_notice" class="btn drop_ad " title="Click here to add this <?php echo $detail[0]->ProductName; ?> to your shopping cart" >Add To Cart</a>
                      <?php 
                      } else{?>
                  <a rel="nofollow"  class="btn drop_ad " title="Click here to add this <?php echo $detail[0]->ProductName; ?> to your shopping cart" href="<?php echo base_url('site/addcart').'/'.$detail[0]->ListID ; ?>" id="addcart" >Add To Cart</a>
                  <?php
                }
                   }


 } }?>
<!--<button class="btn  dropdown-toggle" type="button" data-toggle="dropdown">Add To Cart
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
    <li><a href="#">Add To Cart</a></li>
    <li><a href="#">Add To Cart</a></li>
    <li><a href="#">Add To Cart</a></li>
  </ul>-->
</div>
</div>
</div>

<div class="row">
<div class="col-md-12 col-sm-12">
<div class="product_penal_content">
  <p><?php echo $detail[0]->WarrantyBlurb; ?></p>
  <div class="product_penal_shiping">
    <div class="product_penal_shiping_left">Condition:<link itemprop="itemCondition" 
href="http://schema.org/UsedCondition"/></div>
    <div class="product_penal_shiping_right"><?php echo $detail[0]->Condition; ?></div>
    <div class="product_penal_shiping_left">Availability:</div>
    <div class="product_penal_shiping_right"><link itemprop="availability" href="http://schema.org/InStock"/>  

       <?php 
if($detail[0]->QuantityOnHand<=0){
    ?><span class="outstock">Out of Stock</span><?php
  }
  else if(($detail[0]->QuantityOnHand>0) && ($detail[0]->QuantityOnHand<3)){
    echo "< 3";
  }else{
    ?>
    <span class="inerstock">In Stock</span></span>
  <?php 
  } ?>

    </div>
    <div class="product_penal_shiping_left">Lead Time:</div>
    <div class="product_penal_shiping_right"><span> Ships Within 48 Hrs</span></div>
  </div>
  <div class="product_penal__question">
   <div class="question_heding"><img alt ="img" src="<?php echo base_url('public/assets/images/renameq.jpg'); ?>">Have Questions?</div>
   <ul>
  
      <li>
        <span style="color:#f00">
         <?php 
            if(isset($_SESSION['errorto']) && ($_SESSION['errorto']!=1)){
              echo $_SESSION['errorto'];
              unset($_SESSION['errorto']);
            }
          ?>
        </span>

        <a data-toggle="modal" data-target="" title="Click to chat about this <?php echo $detail[0]->ProductName; ?>" class="btn btn-link" href="">Live Chat</a><br>
                       <a data-toggle="modal"  title="Click here to contact Global Fitness about this <?php echo $detail[0]->ProductName; ?>" data-target="#emailUs" class="btn btn-link" href="">Email Us</a><br>
                       <a data-toggle="modal" title="Click here to request a call and discuss this <?php echo $detail[0]->ProductName; ?>"  data-target="#requestacall" class="btn btn-link" href="">Request To Call</a><br>
                       <a class="btn btn-link"  title="Read reviews on the <?php echo $detail[0]->ProductName; ?>" id="reviewlink_c" href="#top">Reviews</a><br><br>
                       <div class="question_heding" style="color: #007fff">More Options</div>
                       <a data-toggle="modal"  title="Are you interested in renting this <?php echo $detail[0]->ProductName; ?>" data-target="#myModal_RentProduct" class="btn btn-link" href="">Rent this <?php echo $detail[0]->CategoryName; ?></a>
                       <a data-toggle="modal"  title="Sell your <?php echo $detail[0]->ProductName; ?> to GlobalFitness here"  data-target="#myModal_SellProduct" class="btn btn-link" href="">Sell your <?php echo $detail[0]->CategoryName; ?></a>
   </li>

</ul>

 </div>
   <div class="fb-like" data-href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>"  data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>

<br>
<br>
</div>
</div>
</div>


</div>
<div class="hr_line"></div>
<h2>Product Details<font>: <?php echo $detail[0]->ProductName ; ?></font></h2>

<div class="row">
<div class="col-md-8 col-sm-8">
<h3>Electrical Requirements</h3>
<ul class="product_inner">
<li><?php echo $detail[0]->Voltage ;  ?></li>
<li><?php echo $detail[0]->Amps ;  ?></li>
</ul>
</div>
<div class="col-md-4 col-sm-4">
<h3>Electrical Requirements</h3>
<ul class="product_inner">
<li>What’s in the box?</li>
<li><?php echo $detail[0]->ProductName ; ?></li>
<li>Warranty Registration Card</li>
<li>AC power cord</li>
</ul>
</div>
</div>

<div class="row">
<div class="col-md-8 col-sm-8">
<h3>Technical Specifications</h3>
<ul class="product_inner">
<li><?php echo $detail[0]->Dimensions; ?></li>
<li><?php echo $detail[0]->Weight; ?></li>
<li><?php echo $detail[0]->WeightCapacity; ?></li>
<li><?php echo $detail[0]->Feature1st; ?></li>
<li><?php echo $detail[0]->Feature2nd; ?></li>
<li><?php echo $detail[0]->Feature3rd; ?></li>
<li><?php echo $detail[0]->Feature4th; ?></li>
<li><?php echo $detail[0]->Feature5th; ?></li>
<li><?php echo $detail[0]->Feature6th; ?></li>
<li><?php echo $detail[0]->Feature7th; ?></li>
<li><?php echo $detail[0]->Feature8th; ?></li>
</ul>
</div>
<div class="col-md-4 col-sm-4">
<h3>Warranty Details : <?php echo $detail[0]->Warranty ; ?></h3>
<ul class="product_inner">
<li><?php echo $detail[0]->WarrantyDecription; ?></li>
</ul>
</div>
</div>
</div>

<div id="top" class="row inner_product_discription tab_iner_shope_disc">
<div class="padd_no">
<h2>Product Reviews<font>: <?php echo $detail[0]->ProductName ; ?></font></h2>

<ul class="nav nav-tabs margin_top_penal_tab">
  <li class="active"><a data-toggle="tab" href="#home">Most Recent</a></li>
  <li><a data-toggle="tab" href="#menu1">Most Usefull</a></li>
  <li><a data-toggle="tab" href="#menu2">Write a review </a></li>
</ul>

<div class="tab-content">
  <div id="home" class="tab-pane fade in active">     <!-- 
   <span itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">     -->           
   <?php
        if(count($review)>0){
          foreach($review as $re){
              ?>
              <div class="row tab_penal_dscp">
               <div class="col-md-9 col-sm-9 right_border">
             <input id="input-21b" class="rating" data-min="0" data-max="5" data-step="1" value="<?php echo $re->star_rate; ?>" data-disabled="true" data-size="xs" data-show-clear="false" data-show-caption="false" >
              <div class="tittle_penal"> <?php echo $re->brief; ?></div>
              <div class="discp_penal"><?php echo $re->description; ?></div>
              <div class="discp_penal_date_time">Written by <?php echo $re->FirstName." ".$re->LastName." ".$re->MiddleName; ?> | <?php echo date("m/d/Y" ,strtotime($re->created)); ?></div>
              <?php 
                if($re->total!=0){
             echo $re->totalhelp; ?> of <?php echo $re->total; ?> found this review helpfull
              <?php
            }

              ?>
            </div>
            <div class="col-md-3 col-sm-3">
              <div class="discp_penal_help"><?php  if($re->myhelp==0){ ?>
              Is this usefull</div>
             <div class="discp_penal_form"><form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <input class="res_button" type="hidden" value="<?php echo $re->ID; ?>" name="review_id">
                <?php if($this->session->userdata('userId')==''){ ?>
                <a href="" class="btn btn-default" data-toggle="modal" data-target="#myModal_login"  name="action">Yes</a> <a href="" class="btn btn-default" data-toggle="modal" data-target="#myModal_login"  name="action">No</a>
                 <?php   }else{
                  ?>
                  <input class="no_button" type="submit" class="btn btn-default" value="Yes" name="action"> <input type="submit" class="btn btn-default"   value="No" name="action">
                  <?php
                 } ?> 
                
             </form>
             </div>
             <?php 
             }
             else{
              echo "Already Given Feedback.</div>";
             }                               
            ?>
          </div>
          </div>
              <hr>
         <?php }
        }
        else{
          echo "<h4 style='color:red; '>This ".$detail[0]->Piece." has no reviews; be the first to write one by <a data-toggle='tab' href='#menu2'> clicking here!</a> </h4>";
        }
    ?>
  </div>
  <div id="menu1" class="tab-pane fade">
    <?php 
      function sortByOrder($b, $a) 
      {
        return $a->total - $b->total;
      }
      usort($review, 'sortByOrder');
   ?>  
     <?php
        if(count($review)>0){
          foreach($review as $re){
              ?>
              <div class="row tab_penal_dscp">
               <div class="col-md-9 col-sm-9 right_border">
              <input id="input-21b" class="rating" data-min="0" data-max="5" data-step="1" value="<?php echo $re->star_rate; ?>" data-disabled="true" data-size="xs" data-show-clear="false" data-show-caption="false" >
              <div class="tittle_penal"> <?php echo $re->brief; ?></div>
              <div class="discp_penal"><?php echo $re->description; ?></div>
              <div class="discp_penal_date_time">Written by <?php echo $re->FirstName." ".$re->LastName." ".$re->MiddleName; ?> | <?php echo date("m/d/Y" ,strtotime($re->created)); ?></div>
              <?php 
                if($re->total!=0){
             echo $re->totalhelp; ?> of <?php echo $re->total; ?> found this review helpfull
              <?php
            }

              ?>
            </div>
            <div class="col-md-3 col-sm-3">
              <div class="discp_penal_help"><?php  if($re->myhelp==0){ ?>
              Is this usefull</div>
             <div class="discp_penal_form"><form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <input class="res_button" type="hidden" value="<?php echo $re->ID; ?>" name="review_id">
                <?php if($this->session->userdata('userId')==''){ ?>
                <a href="" class="btn btn-default" data-toggle="modal" data-target="#myModal_login"  name="action">Yes</a> <a href="" class="btn btn-default" data-toggle="modal" data-target="#myModal_login"  name="action">No</a>
                 <?php   }else{
                  ?>
                  <input class="no_button" type="submit" class="btn btn-default" value="Yes" name="action"> <input type="submit" class="btn btn-default"   value="No" name="action">
                  <?php
                 } ?> 
                
             </form>
             </div>
             <?php 
             }
             else{
              echo "Already Given Feedback.</div>";
             }                               
            ?>
          </div>
          </div>
              <hr>
         <?php }
        }
        else{
          echo "<h4 style='color:red; '>This ".$detail[0]->Piece." has no reviews; be the first to write one by <a data-toggle='tab' href='#menu2'> clicking here!</a> </h4>";
        }
    ?>
  </div>
  <div id="menu2" class="tab-pane fade">
<form id="reviewform" style="margin-top:21px;" method="post" action="" class="form-horizontal" role="form">
                        
<input type="hidden" name="productId" value="<?php echo $detail[0]->ListID; ?>">

  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Brief Subject</label>
    <div class="col-sm-10">
      <input  name="brief" required type="text" class="form-control" id="email" placeholder="Please limit to 10 words" maxlength="100">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Rate this product</label>
    <div class="col-sm-10"> 
      <span itemprop="ratingValue"> <input id="input-21b" name="star" value="4.4" type="number" class="rating" min=0 max=5 step=0.2 data-size="xs"> </span>
      (Select the number of stars you wish to rate this product.)
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Your review</label>
    <div class="col-sm-10"> 
      <textarea name="review" required class="form-control" placeholder="please limit to 300 words" maxlength="500"></textarea>
    </div>
  </div>
 
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
    <input type="submit" value="Submit" class="btn btn-default submitreviewBtn">    
    </div> 
  </div>
</form>

</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

    

