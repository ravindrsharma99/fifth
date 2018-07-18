 
<div class="margen_top">
    <div class="mgnto">
    </div>
</div>

 <div class="bg_grey">

  <div class="container-fluid">
    <div class="row accrodian_arrow_penal PADD_ThREee">
     <div class="col-md-12 col-sm-12 col-xs-12 padd_0_mgn_none">
  
<div class="container-fluid  padding_no"> 
<?php if(isset($getcategory)){ ?> 
        <dt class="respon">
          <a class="accordion-title accordionTitle js-accordionTrigger" aria-controls="accordion1" aria-expanded="false" href="#accordion1"><?php echo $category_name;  ?> 
        <div class="arrw"><span class="bar top"></span><span class="bar bottom"></span></div></a>
         </dt>
         <dd aria-hidden="true" id="#accordion1" class="accordion-content accordionItem is-collapsed">
          <div class="row inner_product_container">
            <div class="col-md-12 col-sm-12">
              <!-- <p>Factory Serviced LeMond RevMaster Pro Group Cycling Bike</p> -->
              <?php // if($description!=""){ ?>
              <div class="product_inner_accordian_content">
               <p><?php echo $CollapsiblePanelDescription; ?></p>
               </div>
                     <?php // }
       } ?>
            </div>
        </div>
    </dd>
</div>

  </div>
  </div>
  </div>
<div class="container-fluid padding_no">


 <div class="row category PADD_ThREee">

<div class="products">
  <?php 
  if(count($product)>0){
      foreach($product as $products){
        // echo "<pre>";
        // print_r($products);die();
       //echo 'this'; print_r($products->ProductName); 
       $link  = str_replace("-", "*",$products->ProductName);
       $link  = str_replace(" ", "-",$link);
        //$link  = rawurlencode($products->ProductName) ;
       //echo 'this'; print_r($link); 
        ?>
  <div class="col-md-3 col-sm-4 col-xs-6 padd_0"> 
   <div class="img_block">

    <?php if($products->Kingdom == 'Cardio'){ 
            ?>   
             <div class="pp_img"><i><a href="<?php echo base_url('/cardio').'/'.$link; ?>">
              <img alt="<?php echo $products->ProductName; ?>" title="<?php echo $products->MetaDetailPageTitleTag; ?>" 
               src="<?php echo base_url().'/'.$products->ImageURL; ?>" /></a></i></div>
            <?php
          }
          else{
            ?>
             <div class="pp_img"><i><a href="<?php echo base_url('/strength').'/'.$link; ?>"><img alt="<?php echo $products->ProductName; ?>" title="<?php echo $products->MetaDetailPageTitleTag; ?>"  src="<?php echo base_url().'/'.$products->ImageURL; ?>" /></a></i></div>
            <?php
          }
      ?>
    
     <div class="img_content">
 
       <h5><?php echo $products->ProductName; ?></h5>
        <p><?php if($products->Price!="Please Enquire"){ echo "$";} ?><?php echo trim($products->Price,"$"); ?><p> 
       <!--  <p><?php //echo round($products->Price,2) ; ?></p>  -->
       <!-- <ul> <a href="#"><img src="<?php// echo base_url('public/assets/images/star.png'); ?>" alt=""/></a>
         <a href="#"><img src="<?php //echo base_url('public/assets/images/star.png'); ?>" alt=""/></a>
         <a href="#"><img src="<?php //echo base_url('public/assets/images/star.png'); ?>" alt=""/></a>
         <a href="#"><img src="<?php //echo base_url('public/assets/images/star.png'); ?>" alt=""/></a>
         <a href="#"><img src="<?php //echo base_url('public/assets/images/star.png'); ?>" alt=""/></a>
       </ul> -->

       <?php 
         $id=$products->ListID;
         $rate =  $this->Site_model->getrating($id);
        //print_r($rates); die;
            $add='';
          foreach ($rate as $rates) 
          {
              $add += $rates->star_rate;
          }
              $divide=count($rate);
              if($divide <1){
                $divide =1;
              }
              else{
                              $avg_rate=$add/$divide;            
              }
      ?>
       <div class="col-md-9 col-sm-9 padd-no">
        <input id="input-21b" class="rating" data-min="0" data-max="5" data-step="1" 
        value='<?php echo $avg_rate; ?>' data-disabled="true" data-size="xs" data-show-clear="false" data-show-caption="false" >
       </div>
       <p>Available to ship: 

              <?php 
              if($products->QuantityOnHand<=0){
                      ?><span class="outstock">Out of Stock</span><?php
                    }
                    else if(($products->QuantityOnHand>0) && ($products->QuantityOnHand<3)){
                      echo "< 3";
                    }else{
                      ?>
                      <span class="inerstock">In Stock</span>
                    <?php 
                    } ?>
        </p>
     </div>   
   </div>
 </div>
    <?php
      }
    }else{
       echo  "<h4 style='color:red'>No Result Found.</h4>";
      }
  ?>
 
 <div class="clearfix"></div>
</div>
</div>
</div>

</div>