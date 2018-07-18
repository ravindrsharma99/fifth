
    <script src="<?php echo base_url('public/assets/js/jquery-1.8.3.min.js');?>"></script> 
<style> 
body{
  margin-bottom:0px !important;
}
.footer_outer{
  display:none;
}
.likeImageS{
  cursor: pointer;
}
</style>
<input type="hidden" id="getcount" value="<?php echo count($replacement) ; ?>">

<!--filter_menu_section  -->
<!-- div class="navigation_filter_menu_responsive padd-no_live mobile_filtr_view">
  <div class="container padd-no_live">
    <div class="col-md-12 col-xs-12 filter_menu_nav_respon padd-no_live">
        <div class="liveenventry_responsive_filter  mob_respon_filter_liv"><a href="<?php echo base_url('live-inventory/filter'); ?>"><span class="glyphicon glyphicon-filter"></span> Filter</a></div>
    </div>
  </div>
</div> -->
<!--filter_menu_section  -->

<section class="web_view">
    <div class="container-fluid">
        <div class="row PADD_ThREee">
            <div class="col-md-12 col-sm-12 bordr">
                <div class="col-md-6 col-sm-6">
                    <div class="col-md-12 col-sm-12">
                        <div class="inventory">
                            <h4>Replacement Gym Parts </h4>
                        </div>
                        <a href="<?php echo base_url('/site/listing');?>" title="View and Download your custom list">
                            <div class="cart">
                                <div class="nin2 webcountvalue">
                                    <div class="mylistLink">

                                        <?php
                                        // unset($_SESSION['mylistproducting']['count']);
                                         if(isset($_SESSION['mylistproducting']['count'])){ echo $_SESSION['mylistproducting']['count']; }else{ echo "0"; } ?>
                                    </div>
                                </div>
                                <!--end of nine-->
                            </div>
                        </a>
                        <a href="<?php echo base_url('/site/mylist');?>" title="View and Download your custom list">
                            <div class="my_list">
                                <h4>My List</h4>
                            </div>
                        </a>
                        <!--end of inventory-->
                    </div>
                    <!--end of colm8-->
                    <div class="col-md-6 col-sm-6">
                        <div class="col-md-3 col-sm-3 padding">
                        </div>
                        <!--inr-->
                        <div class="col-md-6 col-sm-6 padding">
                            <!--end of my-->
                        </div>
                        <!--inr-->
                    </div>
                    <!--end of colm-->
                </div>
                <!--end of colm-->
                <!-- <div class="col-md-6 col-sm-6 col-xs-12 MARGEN_ZERO">
                    <h4 class="SAERCH_CUSTOM">Search:</h4>
                    <div id="custom-search-input">
                        <div class="input-group col-md-12">
                            <input type="text" class="form-control input-lg" placeholder="" />
                            <span class="input-group-btn">
                                <button class="btn btn-info btn-lg" type="button">
                                    
                                </button>
                            </span>
                        </div>
                    </div>
                </div> -->
                <div class="clear"></div>
            </div>
            <!--end colm-->
        </div>
        <!--end of row-->
    </div>
    <!--end of container-->
    <div class="container-fluid">
        <div class="row PADD_ThREee Gim_PArts">
            <div class="col-md-12 col-sm-12 padding">
                <div class="glob">
                <!-- feedproductivity id="scrollableTable"  -->
                    <div class="table-responsive feedproductivity">
                        <table  class=" table  scrollIDS" width="100%"  id="scrollableTable">
                            <thead>
                                <tr class="tb_hdr">
                                    <TH width="44" class="blank"> </TH>
                                    <TH width="480" class="min_first">Part Name</TH>
                                    <TH width="71" class="min">MPN</TH>
                                    <TH width="84" class="min">Category</TH>
                                    <TH width="141" class="min">Availability</TH>
                                    <TH width="118" class="min">Price</TH>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if(count($replacement)>0){
                                      foreach($replacement as $live){
                                        ?>
                                    <tr class="countTr">
                                        <td class="blank">
                                            <?php
                                            
                                                if( in_array($live->PartName , $_SESSION['mylistproducting']['listname']) )
                                                  {
                                                    ?>
                                                <img class="likeImageS" src="<?php echo base_url('public/assets/images/check_img.png'); ?>" data-status="1" data-name="<?php  echo $live->PartName;  ?>" data-src="<?php echo base_url('public/assets/images/plush_cart.png'); ?>">
                                                <?php
                                                      }
                                                      else{
                                                        ?>
                                                <img class="likeImageS" data-src="<?php echo base_url('public/assets/images/check_img.png'); ?>" data-status="0" data-name="<?php  echo $live->PartName;  ?>" src="<?php echo base_url('public/assets/images/plush_cart.png'); ?>">
                                                <?php
                                                          }
                                                       ?>

                                        </td>
                                        <td class="min_first">
                                            <?php echo $live->PartName; ?>
                                        </td>
                                        <td class="mina">
                                            <?php echo $live->MPN; ?>
                                        </td>
                                        <td class="mina">
                                            <?php echo $live->Category ; ?>
                                        </td>
                                        <td class="mina">
                                            <?php
                                              if($live->QuantityOnHand<=0){
                                                ?><span class="outstock">Out of Stock</span>
                                                                            <?php
                                              }
                                              else if(($live->QuantityOnHand>0) && ($live->QuantityOnHand<3)){
                                                echo "< 3";
                                              }else{
                                                ?>
                                                    <span class="inerstock">In Stock</span>
                                                    <?php 
                                                     } ?>
                                        </td>
                                        <td class="mina">
                                            <table>
                                                <tr class="INNER_TABLE__penal">
                                                    <td class="INNER_TABLE_PRICE" align="left">
                                                        <?php if($live->Price!="Please Enquire"){ echo "$";} ?>
                                                        <?php echo trim($live->Price,'$'); ?>
                                                    </td>
                                                    <td class="INNER_TABLE_BUTTON" align="right">
                                                       

                                                        <?php
                                                          if($live->QuantityOnHand<=0){
                                                            if($live->countwish==0){                  
                                                            ?>
                                                            <div class="outr">
                                                                <input type="button" <?php if($this->session->userdata('userId')==""){ echo 'data-toggle="modal" data-target="#myModal_login"'; }else{ echo 'class="clickwishlist"'; } ?> data-val="
                                                                <?php echo $live->PartName; ?>" value="Wait List Me"></div>
                                                            <?php
                                                                }
             
                                                              }else{
                                                                ?>
                                                                <div class="filter">
                                                                    <input type="button" value="Add to cart">
                                                                </div>
                                                                <?php 
                                                                } ?>
                                                                <!--end filter-->
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <?php 
                                            $i++;
                                          }
                                        }
                                        else{
                                          echo "No Records Found. ";
                                        }
                                      ?>
                            </tbody>
                        </table>
                        <?php if(count($lproduct)>24){ ?>
                        <img id="load_img" src="<?php echo base_url(" /public/assets/images/global_loader.gif "); ?>">
                        <?php  }  ?>
                    </div>
                </div>
                <!--end of glob-->
            </div>
            <!--end col12-->
        </div>
        <!--end of row-->
    </div>
</section>





<section class="mob_view">
<div class="container mob_view">


      <div class="col-md-6 col-sm-6 col-xs-12 bordr1">

        <div class="col-md-6 col-sm-6 col-xs-7 padding fgsfdg">
          <div class="inventory">
          <h4>Replacement Gym Parts </h4>
          </div><!--end of inventory-->
        </div><!--end of colm8-->

        <div class="col-md-6 col-sm-6 col-xs-5 padding fgsfdg">
          <div class="col-md-3 col-sm-3 ">
          <div class="cart">  
          <div class="nin mobilecountvalue" >
            <a  class="mylistLink"  href="<?php echo base_url('/site/listing');?>"><?php if(isset($_SESSION['mylistproducting']['count'])){ echo $_SESSION['mylistproducting']['count']; }else{ echo "0"; } ?></a>
          </div><!--end of nine-->  
        
          </div>
         </div><!--inr-->
       <div class="col-md-6 col-sm-6 padding">
          <div class="my_list">
          <h4>My List</h4>
          </div><!--end of my-->
        </div><!--inr-->
        </div><!--end of colm-->

        </div><!--end of colm-->
    

</div><!--end of container-->
</section>


<div class="container mob_view">
  <div class="bodr">
<div class="accordin_penal_b">
<div class="accorrdd feedproductivity">
<div class="panel-group scrollIDS" id="accordion">
    <?php
    $jack = 0;
      if(count($replacement)>0){
        foreach($replacement as $live){
       
          $jack++;
           ?>
           <div class="panel panel-default dashd liveENVTRY">
              <div class="panel-heading">
                <h4 class="panel-title">
                  <i class="indicator glyphicon glyphicon-chevron-up margn pull-left"></i>
                  <a class="accordion-toggle Accccccc" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $jack; ?>">
                    <?php echo $live->PartName; ?>
                  </a>
                   <span class="stock "><?php
                    if($live->QuantityOnHand<=0){
                      ?>
                      <span class="outstock">Out of Stock</span><?php
                    }
                    else if(($live->QuantityOnHand>0) && ($live->QuantityOnHand<3)){
                      echo "<span>< 3</span>";
                    }else{
                      ?>
                      <span class="inerstock">In Stock</span>
                    <?php 
                    } ?>
                  </span>
                </h4>
              </div>
              <div id="collapse<?php echo $jack; ?>" class="panel-collapse collapse">
                <div class="panel-body">
                 <div class="row inner_product_discription">            

            <div class="row inner_product_container">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="small">
                  <h5><?php echo $live->PartName; ?></h5>
                </div><!--end of small-->
              </div>

      <div class="col-md-5 col-sm-5 col-md-offset-1">        
          <div class="col-md-12 col-sm-12">
            <div class="product_penal_content">
             <div class="product_penal_shiping2">
              <?php 
                if($live->MPN!=""){
              ?>
                <div class="product_penal_shiping_left">MPN:</div>
                <div class="product_penal_shiping_right"><?php echo $live->MPN; ?></div>
                <?php } 
                if($live->Piece!=""){ ?>
                <div class="product_penal_shiping_left">Piece:</div>
                <div class="product_penal_shiping_right"><?php echo $live->Piece ; ?></div>
                  <?php } 
                if($live->QuantityOnHand!=""){ ?>
                <div class="product_penal_shiping_left">QuantityOnHand</div>
                <div class="product_penal_shiping_right"><?php
              if($live->QuantityOnHand<=0){
                ?><span class="outstock">Out of Stock</span><?php
              }
              else if(($live->QuantityOnHand>0) && ($live->QuantityOnHand<3)){
                echo "<span>< 3</span>";
              }else{
                ?>
                <span class="inerstock">In Stock</span>
              <?php 
              } ?></div> 
              <?php } 

                if($live->Price!=""){ ?>
                <div class="product_penal_shiping_left">Price</div>
                <div class="product_penal_shiping_right"><?php if($live->Price!="Please Enquire"){ echo "$";} ?><?php echo trim($live->Price,'$'); ?></div>
                <?php } ?>
              </div>
              <div class="product_penal__question">
                <div class="col-xs-6 padd">
               <div class="question_heding">
                <div class="requu">  
                   <!-- <img src="<?php echo base_url(); ?>/public/assets/images/plush_cart.png">-->
                <?php
                if( in_array($live->PartName , $_SESSION['mylistproducting']['listname']) )
                  {
                    ?>
                    <img class="likeImageS" src="<?php echo base_url('public/assets/images/check_img.png'); ?>" data-status="1" data-name="<?php  echo $live->PartName;  ?>" data-src="<?php echo base_url('public/assets/images/plush_cart.png'); ?>">
                    <?php
                  }
                  else
                  {
                    ?>
                    <img class="likeImageS" data-src="<?php echo base_url('public/assets/images/check_img.png'); ?>" data-status="0" data-name="<?php  echo $live->PartName;  ?>" src="<?php echo base_url('public/assets/images/plush_cart.png'); ?>">  <?php
                  }
               ?></div><!--end of requu--></div></div>
                    <div class="col-xs-6 padd">
              <div class="filter_top">
              <?php
              if($live->QuantityOnHand<=0){
                if($live->countwish==0){                  
                ?><div class="outr">

                <input <?php if($this->session->userdata('userId')==""){ echo 'data-toggle="modal" data-target="#myModal_login"';  }else{ echo 'class="clickwishlist"'; } ?> data-val="<?php echo $live->PartName; ?>" type="button" value="Wait List Me">
              </div>


                <?php
                }
              }else{
                ?>
                 <div class="filter"><input type="button" value="Add to cart"></div>
              <?php 
              } ?>
            </div><!--end filter--><!--HAVE--></div>
                
                 </div>
               </div>
             </div>
           </div>
         </div>
        </div>
                </div>
              </div>
            </div>
          <?php 
        }
      }
    ?>

  <?php  if(count($lproduct)>24){ ?> 
    <div class="text_align"><img id="load_img" src="<?php echo base_url("/public/assets/images/global_loader.gif"); ?>"></div>
  <?php } ?>
     </div>
    </div>
   </div>
  </div>
 </div>

<script type="text/javascript">
  
function toggleChevron(e) {
    $(e.target)
        .prev('.panel-heading')
        .find("i.indicator")
        .toggleClass('glyphicon-chevron-down glyphicon-chevron-up');
}
$('#accordion').on('hidden.bs.collapse', toggleChevron);
$('#accordion').on('shown.bs.collapse', toggleChevron);

</script>