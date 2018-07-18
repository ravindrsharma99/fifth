<!--filter_menu_section  -->
<style>
  .displaynone{
    display: none;
  }
.item_selected22{
/*  background: none repeat scroll 0 0 #f0f0f0;*/
  padding: 0 !important;
}

.activeLI {
  background: #f0f0f0 !important;
}
.item_selected22 li {
  line-height: 30px !important;
}
/*.item_selected22 a {
  color: #323232 !important;
}
*/
 .HeiGht {
  max-height: 500px !important;
}

</style>




<div class="navigation_filter_menu_responsive ggnggfs">
  <div class="container">
    <div class="col-md-6 col-xs-6 filter_menu_nav_respon">
        <div class="btn-group show-on-hover">
          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
            Filter <span class="caret"></span>
          </button>
          <ul class="dropdown-menu testmyselfsubmit" role="menu">
            <li class="reset_button_REs">
              <div class="top_brder11">
                <div class="reset_button">
                      <!-- reset four cases are to be made 4 -->
                 <?php  if ($check_filter != '') {
              if($ptype=="0"){     ?>
                 <a href="<?php echo base_url('category/filter/'.$check_filter.''); ?>">Reset</a>
                <?php      }
              elseif ($ptype=="1"){
                ?>
                 <a href="<?php echo base_url('category/filter/'.$check_filter.''); ?>">Reset</a>
                <?php    }
            
          } else{   ?>
                 <?php  if($ptype=="0"){     ?>
                 <a href="<?php echo base_url('fitness_equipment/filter'); ?>">Reset</a>
                <?php      }
              elseif ($ptype=="1"){
                ?>
                 <a href="<?php echo base_url('strength_equipment/filter'); ?>">Reset</a>
                <?php    }  } ?>
                  <!-- <a href="">Reset</a></div> -->
                </div>
              </div>
            </li>


              <li>  <!-- for availability -->
                <div class="top_brder11">
            <dt>
              <a href="#product5" aria-controls="product5" <?php if(isset($_POST['typefilter']['Availability'])){ echo 'aria-expanded="true"  class="accordion-title accordionTitle js-accordionTrigger is-collapsed is-expanded"'; } else{ echo 'aria-expanded="false" class="accordion-title accordionTitle js-accordionTrigger"'; } ?> >
               Availability<div class="arrw"><span class="bar top"></span><span class="bar bottom"></span></div>
              </a>
            </dt>
            <dd id="product5" <?php if(isset($_POST['typefilter']['Availability'])){ echo 'class="item_selected22 accordion-content accordionItem is-expanded animateIn" aria-hidden="false"'; }else{ echo 'class="item_selected22 accordion-content accordionItem is-collapsed" aria-hidden="true"'; } ?> >
                <div class="accordian_inner_con">
                    <div class="panl_list">
             <ul>
            <li  <?php if(isset($_POST)){ $variable=$_POST['typefilter']; foreach ($variable as $key => $value) { if('Availability' == $key) {echo 'class="activeLI"'; } } } ?> > <!-- <a href="?Availability=<?php //echo  'In Stock'; ?>"><?php //echo  "In Stock"; ?></a> -->
                    <form action="" method="post" id='form'>

                      <?php //if(isset($_POST['typefilter']['Availability'])){ echo 'accordion-title accordionTitle js-accordionTrigger is-collapsed is-expanded"'; }else{ echo 'aria-expanded="false" aria-controls="product3" class="accordion-title accordionTitle js-accordionTrigger"'; } ?>

         <a href='#' class="mainvalclick" id="checkedclick"> In Stock </a> <input class='checkedclick displaynone'  type="checkbox" name="typefilter[Availability]" value="In Stock" 
         <?php if(isset($_POST)){
          $variable=$_POST['typefilter'];
          foreach ($variable as $key => $value) {
            if('Availability' == $key)
              { echo 'checked'; } } } ?>  >

                </li>
                      </ul>
                    </div>
                </div>
            </dd>
      </div>                      
            </li>




          <div class="top_brder11">
       <dt>
         <a href="#product3" aria-controls="#product3" <?php if(isset($_POST['typefilter']['brand'])){ echo 'aria-expanded="true"  class="accordion-title accordionTitle js-accordionTrigger is-collapsed is-expanded"'; }else{ echo 'aria-expanded="false" class="accordion-title accordionTitle js-accordionTrigger"'; } ?> >
        Brand<div class="arrw"><span class="bar top"></span><span class="bar bottom"></span></div>
        </a>
      </dt>
      <dd  id="product3" <?php if(isset($_POST['typefilter']['brand'])){ echo 'class="accordion-content item_selected22 accordionItem is-expanded animateIn" aria-hidden="false"'; }else{ echo 'class="accordion-content item_selected22 accordionItem is-collapsed" aria-hidden="true"'; } ?> >
      
          <div class="accordian_inner_con">
              <div class="panl_list">
                <ul class="HeiGht">
                        
                  <?php

                              if($check_filter != ''){

                                $k = 0;
                                foreach($brand as $amp){
                                    if($amp->BrandName!=""){
                                      $k++;
                                 ?>
                    <li class="<?php if(isset($_POST['typefilter']['brand'])){
                                $variable=$_POST['typefilter']['brand'];
                                  if($amp->BrandName == $variable)
                                    { echo 'activeLI'; } }  ?> <?php if($k>10){ echo "displaynone";} ?>" >
                    
                               <a href='#' class="mainvalclick" id="brandID<?php echo $amp->ID; ?>"><?php echo $amp->BrandName; ?></a>
                      <input class='brandID<?php echo $amp->ID; ?> displaynone'  type="checkbox" name="typefilter[brand]" value="<?php echo $amp->BrandName; ?>" 
                               <?php if(isset($_POST['typefilter']['brand'])){
                                $variable=$_POST['typefilter']['brand'];
                                
                                  if($amp->BrandName == $variable)
                                    {echo 'checked'; } }  ?>  >


                                  </li>
                                 <?php } } 

                              }else{

                                $k = 0; 

                                foreach($brand as $amp){
                                  if($amp->Name!=""){
                                    $k++;
                                 ?>
                                 <li class='<?php if(isset($_POST['typefilter']['brand'])){
                                $variable=$_POST['typefilter']['brand'];
                              
                                  if($amp->Name == $variable)
                                    { echo 'activeLI'; }  } ?> <?php if($k>10){ echo "displaynone";} ?>' >
                                  <a href='#' class="mainvalclick" id="brandID<?php echo $amp->ID; ?>"><?php echo $amp->Name; ?></a>
                                  <input class='brandID<?php echo $amp->ID; ?> displaynone'  type="checkbox" name="typefilter[brand]" value="<?php echo $amp->Name; ?>" 
                               <?php if(isset($_POST['typefilter']['brand'])){
                                $variable=$_POST['typefilter']['brand'];
                                
                                  if($amp->Name == $variable)
                                    {echo 'checked'; }  } ?>  >
                                    
                                  </li>

                                 <?php  } }  

                              } ?>

                <?php 
                  if(count($brand)>9){
                      ?>
                        <li class="showmore">
                        <a href="#" class="clickmore" data-val="more" style='color: #337ab7 !important;'>More Brand </a>
                        </li>
                        <li class="showless displaynone">
                          <a href="#" data-val="less" class="clickmore" style='color: #337ab7 !important;'>Less Brand </a>
                        </li>
                  <?php
                  }
                ?>
                </ul>
              </div>
          </div>
      </dd>
</div>
          </li>


            <?php

          if ($check_filter != '' ) {
        
          } else { ?>
            <li>
<div class="top_brder11">
   <dt>
      <a href="#product2" aria-controls="product2" <?php if(isset($_POST['typefilter']['category'])){ echo 'aria-expanded="true"  class="accordion-title accordionTitle js-accordionTrigger is-collapsed is-expanded"'; }else{ echo 'aria-expanded="false" class="accordion-title accordionTitle js-accordionTrigger"'; } ?> >
      Category<div class="arrw"><span class="bar top"></span><span class="bar bottom"></span></div></a>
    </dt>
      <dd  id="product2" <?php if(isset($_POST['typefilter']['category'])){ echo 'class="accordion-content item_selected22 accordionItem is-expanded animateIn" aria-hidden="false"'; }else{ echo 'class="item_selected22 accordion-content accordionItem is-collapsed" aria-hidden="true"'; } ?> >
        <div class="accordian_inner_con">
          <div class="panl_list">
            <ul>
              <?php
                foreach($mmcategory as $br){
                  ?>
                    <!-- <li><a href="?category=<?php //echo $br->Name ; ?>"><?php// echo $br->Name ; ?></a></li> -->

                        <li <?php if(isset($_POST['typefilter']['category'])){
                                $variable=$_POST['typefilter']['category'];
                                  if($br->Name == $variable)
                                    { echo 'class="activeLI"'; } }  ?> >
                    
                               <a href='#' class="mainvalclick" id="category<?php echo $br->ID; ?>"><?php echo $br->Name; ?></a>


                     <input class='category<?php echo $br->ID; ?> displaynone'  type="checkbox" name="typefilter[category]" value="<?php echo $br->Name; ?>" 
                                <?php if(isset($_POST['typefilter']['category'])){
                                $variable=$_POST['typefilter']['category'];
                                  if($br->Name == $variable)
                                    { echo 'checked'; } }  ?>  > <br>

                                  </li>
                                 <?php   } 
                                              ?>
            </ul>
          </div>
        </div>
    </dd>
         
</div>   
            </li>    <?php } ?>


                        <li>

                          <?php if ($check_filter != '' ) {
        
      } else { ?>
<div class="top_brder11">
   <dt>
      <a href="#product2" aria-controls="product2" <?php if(isset($_POST['typefilter']['category'])){ echo 'aria-expanded="true"  class="accordion-title accordionTitle js-accordionTrigger is-collapsed is-expanded"'; }else{ echo 'aria-expanded="false" class="accordion-title accordionTitle js-accordionTrigger"'; } ?> >
      Category<div class="arrw"><span class="bar top"></span><span class="bar bottom"></span></div></a>
    </dt>
      <dd  id="product2" <?php if(isset($_POST['typefilter']['category'])){ echo 'class="accordion-content item_selected22 accordionItem is-expanded animateIn" aria-hidden="false"'; }else{ echo 'class="item_selected22 accordion-content accordionItem is-collapsed" aria-hidden="true"'; } ?> >
        <div class="accordian_inner_con">
          <div class="panl_list">
            <ul>
              <?php
                foreach($mmcategory as $br){
                  ?>
                    <!-- <li><a href="?category=<?php //echo $br->Name ; ?>"><?php// echo $br->Name ; ?></a></li> -->

                        <li <?php if(isset($_POST['typefilter']['category'])){
                                $variable=$_POST['typefilter']['category'];
                                  if($br->Name == $variable)
                                    { echo 'class="activeLI"'; } }  ?> >
                    
                               <a href='#' class="mainvalclick" id="category<?php echo $br->ID; ?>"><?php echo $br->Name; ?></a>


                     <input class='category<?php echo $br->ID; ?> displaynone'  type="checkbox" name="typefilter[category]" value="<?php echo $br->Name; ?>" 
                                <?php if(isset($_POST['typefilter']['category'])){
                                $variable=$_POST['typefilter']['category'];
                                  if($br->Name == $variable)
                                    { echo 'checked'; } }  ?>  > <br>

                                  </li>
                                 <?php   } 
                                              ?>
            </ul>
          </div>
        </div>
    </dd>
         
</div>   <?php } ?>





                        </li>



            <li>
<div class="top_brder11">
    <dt class="respon">

      <a href="#product1" aria-controls="product1" <?php if(isset($_POST['typefilter']['condition'])){ echo 'aria-expanded="true"  class="accordion-title accordionTitle js-accordionTrigger is-collapsed is-expanded"'; }else{ echo 'aria-expanded="false" class="accordion-title accordionTitle js-accordionTrigger"'; } ?> >
        Condition<div class="arrw"><span class="bar top"></span><span class="bar bottom"></span></div></a>
     </dt>
     <dd  id="product1" <?php if(isset($_POST['typefilter']['condition'])){ echo 'class="accordion-content item_selected22 accordionItem is-expanded animateIn" aria-hidden="false"'; }else{ echo 'class="accordion-content item_selected22 accordionItem is-collapsed" aria-hidden="true"'; } ?> >

      <div class="accordian_inner_con">
          <div class="panl_list">
            <ul>
                <?php 
                        if($check_filter != ''){

                                foreach($condition as $cr){
                                 ?>
                              
                        <li <?php if(isset($_POST['typefilter']['condition'])){
                                $variable=$_POST['typefilter']['condition'];
                                  if($cr->Condition == $variable)
                                    { echo 'class="activeLI"'; } }  ?> >
                    
                               <a href='#' class="mainvalclick" id="condition<?php echo $cr->ID; ?>"><?php echo $cr->Condition; ?></a>


                              <input class='condition<?php echo $cr->ID; ?> displaynone'  type="checkbox" name="typefilter[condition]" value="<?php echo $cr->Condition; ?>" 
                               <?php if(isset($_POST['typefilter']['condition'])){
                                $variable=$_POST['typefilter']['condition'];
                                  if($cr->Condition == $variable)
                                    { echo 'checked'; } }  ?>  >

                                  </li>
                                 <?php   } 

                              }else{

                                foreach($condition as $cr){
                                 ?>

                                  <li <?php if(isset($_POST['typefilter']['condition'])){
                                $variable=$_POST['typefilter']['condition'];
                                  if($cr->Name == $variable)
                                    { echo 'class="activeLI"'; } }  ?> >
                    
                               <a href='#' class="mainvalclick" id="condition<?php echo $cr->ID; ?>"><?php echo $cr->Name; ?></a>



                               <input class='condition<?php echo $cr->ID; ?> displaynone'  type="checkbox" name="typefilter[condition]" value="<?php echo $cr->Name; ?>" 
                                <?php if(isset($_POST['typefilter']['condition'])){
                                $variable=$_POST['typefilter']['condition'];
                                  if($cr->Name == $variable)
                                    { echo 'checked'; } }  ?> 

                                     >
                                     <br>
                                  </li>
                                 <?php   }  ?>
                                  <!-- <li><a href="?condition=<?php //echo  $cr->Name; ?>"><?php// echo $cr->Name; ?></a></li> -->
                                 
                                
                                 <?php } 

                               ?>
            </ul>
          </div>
      </div>
    </dd>
</div>    
            </li>

            


            

<?php if ($check_filter != '' ) {
        
      } else { ?> <li>
<div class="top_brder11">
   <dt>

    <a href="#product3" aria-controls="product5" <?php if(isset($_POST['typefilter']['piece'])){ echo 'aria-expanded="true"  class="accordion-title accordionTitle js-accordionTrigger is-collapsed is-expanded"'; }else{ echo 'aria-expanded="false" class="accordion-title accordionTitle js-accordionTrigger"'; } ?> >
     Piece<div class="arrw"><span class="bar top"></span><span class="bar bottom"></span></div>
    </a>
  </dt>
  <dd  id="product3" <?php if(isset($_POST['typefilter']['piece'])){ echo 'class="accordion-content accordionItem item_selected22 is-expanded animateIn" aria-hidden="false"'; }else{ echo 'class="accordion-content item_selected22 accordionItem is-collapsed" aria-hidden="true"'; } ?> >
      <div class="accordian_inner_con">
          <div class="panl_list">
            <ul>
              <?php

              $ppp = 0;
               foreach($piece as $amp){
                $ppp++;
                 ?>
                  <!-- <li><a href="?piece=<?php// echo  $amp->Name; ?>"><?php// echo  $amp->Name; ?></a></li> -->
                   <li class='<?php if(isset($_POST['typefilter']['piece'])){
                                $variable=$_POST['typefilter']['piece'];
                                  if($amp->Name == $variable)
                                    { echo 'activeLI'; } }  ?> <?php if($ppp>10){ echo "displaynone";} ?>' >
                    
                               <a href='#' class="mainvalclick" id="piece<?php echo $amp->ID; ?>"><?php echo $amp->Name; ?></a>


                   
                    <input class='piece<?php echo $amp->ID; ?> displaynone'  type="checkbox" name="typefilter[piece]" value="<?php echo $amp->Name; ?>"   <?php if(isset($_POST['typefilter']['piece'])){
                                $variable=$_POST['typefilter']['piece'];
                                  if($amp->Name == $variable)
                                    { echo 'checked'; } }  ?>  > <br>

                                  </li>
                                 <?php   }  ?>

                              <?php 
                                if(count($piece)>9){
                                    ?>
                                     <li class="showmore">
                        <a href="#" class="clickmore" data-val="more" style='color: #337ab7 !important;'>More Piece </a>
                        </li>
                        <li class="showless displaynone">
                          <a href="#" data-val="less" class="clickmore" style='color: #337ab7 !important;'>Less Piece </a>
                        </li>
                                  <?php
                                }
                            ?>
            </ul>
          </div>
      </div>
  </dd>
</div>
</li>
<?php } ?>


            <li>  <!-- for price -->
 <div class="top_brder11">
             <dt>
              
              <a href="#product3" aria-controls="product5" <?php if(isset($_POST['typefilter']['Price'])){ echo 'aria-expanded="true"  class="accordion-title accordionTitle js-accordionTrigger is-collapsed is-expanded"'; }else{ echo 'aria-expanded="false" class="accordion-title accordionTitle js-accordionTrigger"'; } ?> >
               Price<div class="arrw"><span class="bar top"></span><span class="bar bottom"></span></div>
             
              </a>
            </dt>
            <dd  id="product3" <?php if(isset($_POST['typefilter']['Price'])){ echo 'class="accordion-content item_selected22 accordionItem is-expanded animateIn" aria-hidden="false"'; }else{ echo 'class="item_selected22 accordion-content accordionItem is-collapsed" aria-hidden="true"'; } ?> >
                <div class="accordian_inner_con">
                    <div class="panl_list">
                      <ul>
                       
                            <!-- <li><a href="?Price=<?php// echo  'ascending'; ?>"><?php// echo 'Ascending'; ?></a></li>
                            <li><a href="?Price=<?php// echo  'descending'; ?>"><?php// echo  'Descending'; ?></a></li>   -->

                             <li <?php if(isset($_POST['typefilter']['Price'])){
                                $variable=$_POST['typefilter']['Price'];
                                  if("ASC"== $variable)
                                    { echo 'class="activeLI"'; } }  ?> >
                    
                               <a href='#' class="mainvalclick" id="priceASC">Ascending</a>

                <input class='priceASC displaynone'  type="checkbox" name="typefilter[Price]" value='ASC' 
                      <?php if($_POST['typefilter']['Price'] == 'ASC'){   
                          echo 'checked'; }   ?>  >
                        </li>


<li <?php if(isset($_POST['typefilter']['Price'])){
                                $variable=$_POST['typefilter']['Price'];
                                  if("DESC"== $variable)
                                    { echo 'class="activeLI"'; } }  ?> >
                    
                               <a href='#' class="mainvalclick" id="priceDESC">Descending</a>
              <input class='priceDESC displaynone'  type="checkbox" name="typefilter[Price]" value='DESC' 
                     <?php if($_POST['typefilter']['Price'] == 'DESC'){   
                          echo 'checked'; }   ?>      >    </li>     

                       
                      </ul>
                    </div>
                </div>
            </dd>
      </div>
            </li>



            

            <li>  <!-- for rating -->
<div class="top_brder11">
             <dt>
              <a href="#product3" aria-controls="product5" <?php if(isset($_POST['typefilter']['Rating'])){ echo 'aria-expanded="true"  class="accordion-title accordionTitle js-accordionTrigger is-collapsed is-expanded"'; }else{ echo 'aria-expanded="false" class="accordion-title accordionTitle js-accordionTrigger"'; } ?> >
               Rating<div class="arrw"><span class="bar top"></span><span class="bar bottom"></span></div>
              </a>
            </dt>
            <dd  id="product3" <?php if(isset($_POST['typefilter']['Rating'])){ echo 'class="accordion-content item_selected22 accordionItem is-expanded animateIn" aria-hidden="false"'; }else{ echo 'class="item_selected22 accordion-content accordionItem is-collapsed" aria-hidden="true"'; } ?> >
                <div class="accordian_inner_con">
                    <div class="panl_list">
                      <ul>
                         <!-- <li><a href="?Rating=<?php// echo  'ascending'; ?>"><?php// echo 'Ascending'; ?></a></li>
                            <li><a href="?Rating=<?php// echo  'descending'; ?>"><?php// echo  'Descending'; ?></a></li>   -->

                              <li <?php if(isset($_POST['typefilter']['Rating'])){
                                $variable=$_POST['typefilter']['Rating'];
                                  if("ASC"== $variable)
                                    { echo 'class="activeLI"'; } }  ?> >
                    
                               <a href='#' class="mainvalclick" id="RatingASC">Ascending</a>

                <input class='RatingASC displaynone'  type="checkbox" name="typefilter[Rating]" value='ASC' 
                      <?php if($_POST['typefilter']['Rating'] == 'ASC'){   
                          echo 'checked'; }   ?>  >
                        </li>


<li <?php if(isset($_POST['typefilter']['Rating'])){
                                $variable=$_POST['typefilter']['Rating'];
                                  if("DESC"== $variable)
                                    { echo 'class="activeLI"'; } }  ?> >
                    
                               <a href='#' class="mainvalclick" id="RatingDESC">Descending</a>
              <input class='RatingDESC displaynone'  type="checkbox" name="typefilter[Rating]" value='DESC' 
                     <?php if($_POST['typefilter']['Rating'] == 'DESC'){   
                          echo 'checked'; }   ?>      >    </li>



                               
                           </form> 
                      </ul>
                    </div>
                </div>
            </dd>
      </div>
            </li>


          </ul>
        </div>


    </div>

        <div class="col-md-6 col-xs-6 filter_menu_nav_respon_right">
          <div class="short">
         <!--    <p><span>Sort by</span>Brand</p> -->
          </div>
        </div>


  </div>
</div>




<!--filter_menu_section  -->



  <div class="bg_grey">
  <div class="container">
  <div class="row accrodian_arrow_penal">
    <div class="col-md-12 col-sm-12 col-xs-12 abil_pad_1">
      <div class="cust_form accrodian_arrow  filter_BUTihjhb  Filter_VEVEVEV For_resetBUTn">
        
        <div class="reset_button">
          <?php  if ($check_filter != '') {
              if($ptype=="0"){     ?>
                 <a href="<?php echo base_url('category/index/'.$check_filter.''); ?>">Reset</a>
                <?php      }
              elseif ($ptype=="1"){
                ?>
                 <a href="<?php echo base_url('category/index/'.$check_filter.''); ?>">Reset</a>
                <?php    }
            
          } else{   ?>
                 <?php  if($ptype=="0"){     ?>
                 <a href="<?php echo base_url('fitness_equipment/filter'); ?>">Reset</a>
                <?php      }
              elseif ($ptype=="1"){
                ?>
                 <a href="<?php echo base_url('strength_equipment/filter'); ?>">Reset</a>
                <?php    }  } ?>
                  <!-- <a href="">Reset</a></div> -->
                </div>

        <div class="select-style Filter_BUTTn_Reste">
          <?php if(isset($getcategory)){ 
              $link  = str_replace("-", "*",$category_name);
              $link  = str_replace(" ", "-",$link);
              //$link  = rawurlencode($category_name) ;
            if($ptype=="0"){ 
                ?>
                 <a href="<?php echo base_url('/category/index/'.$link); ?>?type=fitness_equipment">Filter</a>
                <?php
              }
              else{
                ?>
                 <a href="<?php echo base_url('/category/index/'.$link); ?>?type=strength_equipment">Filter</a>
                <?php
              }
            }else{
              if($ptype=="0"){ 
                ?>
                 <a href="<?php echo base_url('/fitness_equipment'); ?>">Filter</a>
                <?php
              }
              else{
                ?>
                 <a href="<?php echo base_url('/strength_equipment'); ?>">Filter</a>
                <?php
              }     
          } ?>
        </div>
      </div>
<div class="inner_accordian_arrow">
<div class="container padding_no"> 
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
               <p><?php echo $CollapsiblePanelDescription; ?>
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
  </div>




<div class="container">
<div class="miob">
<div class="accordin_penal_b neawo">
    <div class="accordion cust_acc">
      <dl>
      
<div class="top_brder11">
    <dt class="respon">
<a href="#product1" aria-expanded="false" aria-controls="product1" class="accordion-title accordionTitle js-accordionTrigger">
      Availability<div class="arrw"><span class="bar top"></span><span class="bar bottom"></span></div></a>

     </dt>
     <dd class="accordion-content accordionItem is-collapsed" id="product1" aria-hidden="true">
      <div class="accordian_inner_con">
          <div class="panl_list">
            <ul>
            <li>Life Fitness</li>
            <li>Precor</li>
            <li>Star Trac</li>
            <li>Woodway</li>
            </ul>
          </div>
      </div>
    </dd>
</div>    
<div class="top_brder11">
   <dt>
    <a href="#product2" aria-expanded="false" aria-controls="product2" class="accordion-title accordionTitle js-accordionTrigger">
      Brand<div class="arrw"><span class="bar top"></span><span class="bar bottom"></span></div></a>
    </dt>
    <dd class="accordion-content accordionItem is-collapsed" id="product2" aria-hidden="true">
        <div class="accordian_inner_con">
          <div class="panl_list">
            <ul>
            <li>Life Fitness</li>
            <li>Precor</li>
            <li>Star Trac</li>
            <li>Woodway</li>
            </ul>
          </div>
        </div>
    </dd>
         
</div>  
<div class="top_brder11">
   <dt>
    <a href="#product3" aria-expanded="false" aria-controls="product3" class="accordion-title accordionTitle js-accordionTrigger">
     Category<div class="arrw"><span class="bar top"></span><span class="bar bottom"></span></div>
    </a>
  </dt>
  <dd class="accordion-content accordionItem is-collapsed" id="product3" aria-hidden="true">
      <div class="accordian_inner_con">
          <div class="panl_list">
            <ul>
            <li>Life Fitness</li>
            <li>Precor</li>
            <li>Star Trac</li>
            <li>Woodway</li>
            </ul>
          </div>
      </div>
  </dd>
</div>

</dl>
</div>
</div>
</div>


<div class="dasktop">
<div class="row">
  <div class="col-md-9 col-sm-9 abil_pad_PPP">
 <div class="category">

<div class="products">
  <?php 
   // echo "<pre>";
   // print_r($_POST);
   // echo "</pre>";
   if(count($product)>0){
      foreach($product as $products){
        $link  = str_replace("-", "*",$products->ProductName);
        $link  = str_replace(" ", "-",$link);
        //$link  = rawurlencode($products->ProductName) ;
        ?>
  <div class="col-md-4 col-xs-6 padd_0">
   <div class="img_block">
     <?php if($ptype=="0"){ 
            ?>
             <i><a href="<?php echo base_url('/fitness_equipment/product').'/'.$link; ?>"><img alt="<?php echo $products->ProductName; ?>" title="<?php echo $products->MetaDetailPageTitleTag; ?>"  src="<?php echo base_url().'/'.$products->ImageURL; ?>" /></a></i>
            <?php
          }
          else{
            ?>
             <i><a href="<?php echo base_url('/strength_equipment/product').'/'.$link; ?>"><img alt="<?php echo $products->ProductName; ?>" title="<?php echo $products->MetaDetailPageTitleTag; ?>"  src="<?php echo base_url().'/'.$products->ImageURL; ?>" /></a></i>
            <?php
          }
      ?>

      <div class="img_content">
 
       <h5><?php echo $products->ProductName; ?></h5>
        <p><?php if($products->Price!="Please Enquire"){ echo "$";} ?><?php echo trim($products->Price,"$"); ?><p> 
              <?php 
         $id=$products->ListID;
         $rate =  $this->Site_model->getrating($id);
        //print_r($rates); die;
            $add='';
          foreach ($rate as $rates) 
          {
              $add += $rates->star_rate;
          }
              $divide=count($rate);  $avg_rate=$add/$divide;            
      ?>
       <div class="col-md-9 col-sm-9 padd_no">
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




<div class="col-md-3 col-sm-3 ability abil_pad filter_page_actual">
<div class="accordin_penal_b">


    <div class="accordion cust_acc testmyselfsubmit">
      <dl>

         <div class="top_brder11">
            <dt>
              <a href="#product5" aria-controls="product5" <?php if(isset($_POST['typefilter']['Availability'])){ echo 'aria-expanded="true"  class="accordion-title accordionTitle js-accordionTrigger is-collapsed is-expanded"'; } else{ echo 'aria-expanded="false" class="accordion-title accordionTitle js-accordionTrigger"'; } ?> >
               Availability<div class="arrw"><span class="bar top"></span><span class="bar bottom"></span></div>
              </a>
            </dt>
            <dd id="product5" <?php if(isset($_POST['typefilter']['Availability'])){ echo 'class="item_selected22 accordion-content accordionItem is-expanded animateIn" aria-hidden="false"'; }else{ echo 'class="item_selected22 accordion-content accordionItem is-collapsed" aria-hidden="true"'; } ?> >
                <div class="accordian_inner_con">
                    <div class="panl_list">
             <ul>
            <li  <?php if(isset($_POST)){ $variable=$_POST['typefilter']; foreach ($variable as $key => $value) { if('Availability' == $key) {echo 'class="activeLI"'; } } } ?> > <!-- <a href="?Availability=<?php //echo  'In Stock'; ?>"><?php //echo  "In Stock"; ?></a> -->
                    <form action="" method="post" id='form'>

                      <?php //if(isset($_POST['typefilter']['Availability'])){ echo 'accordion-title accordionTitle js-accordionTrigger is-collapsed is-expanded"'; }else{ echo 'aria-expanded="false" aria-controls="product3" class="accordion-title accordionTitle js-accordionTrigger"'; } ?>

         <a href='#' class="mainvalclick" id="checkedclick"> In Stock </a> <input class='checkedclick displaynone'  type="checkbox" name="typefilter[Availability]" value="In Stock" 
         <?php if(isset($_POST)){
          $variable=$_POST['typefilter'];
          foreach ($variable as $key => $value) {
            if('Availability' == $key)
              { echo 'checked'; } } } ?>  >

                </li>
                      </ul>
                    </div>
                </div>
            </dd>
      </div>


    <div class="top_brder11">
       <dt>
         <a href="#product3" aria-controls="#product3" <?php if(isset($_POST['typefilter']['brand'])){ echo 'aria-expanded="true"  class="accordion-title accordionTitle js-accordionTrigger is-collapsed is-expanded"'; }else{ echo 'aria-expanded="false" class="accordion-title accordionTitle js-accordionTrigger"'; } ?> >
        Brand<div class="arrw"><span class="bar top"></span><span class="bar bottom"></span></div>
        </a>
      </dt>
      <dd  id="product3" <?php if(isset($_POST['typefilter']['brand'])){ echo 'class="accordion-content item_selected22 accordionItem is-expanded animateIn" aria-hidden="false"'; }else{ echo 'class="accordion-content item_selected22 accordionItem is-collapsed" aria-hidden="true"'; } ?> >
      
          <div class="accordian_inner_con">
              <div class="panl_list">
                <ul class="HeiGht">
                        
                  <?php

                              if($check_filter != ''){

                                $k = 0;
                                foreach($brand as $amp){
                                    if($amp->BrandName!=""){
                                      $k++;
                                 ?>
                    <li class="<?php if(isset($_POST['typefilter']['brand'])){
                                $variable=$_POST['typefilter']['brand'];
                                  if($amp->BrandName == $variable)
                                    { echo 'activeLI'; } }  ?> <?php if($k>10){ echo "displaynone";} ?>" >
                    
                               <a href='#' class="mainvalclick" id="brandID<?php echo $amp->ID; ?>"><?php echo $amp->BrandName; ?></a>
                      <input class='brandID<?php echo $amp->ID; ?> displaynone'  type="checkbox" name="typefilter[brand]" value="<?php echo $amp->BrandName; ?>" 
                               <?php if(isset($_POST['typefilter']['brand'])){
                                $variable=$_POST['typefilter']['brand'];
                                
                                  if($amp->BrandName == $variable)
                                    {echo 'checked'; } }  ?>  >


                                  </li>
                                 <?php } } 

                              }else{

                                $k = 0; 

                                foreach($brand as $amp){
                                  if($amp->Name!=""){
                                    $k++;
                                 ?>
                                 <li class='<?php if(isset($_POST['typefilter']['brand'])){
                                $variable=$_POST['typefilter']['brand'];
                              
                                  if($amp->Name == $variable)
                                    { echo 'activeLI'; }  } ?> <?php if($k>10){ echo "displaynone";} ?>' >
                                  <a href='#' class="mainvalclick" id="brandID<?php echo $amp->ID; ?>"><?php echo $amp->Name; ?></a>
                                  <input class='brandID<?php echo $amp->ID; ?> displaynone'  type="checkbox" name="typefilter[brand]" value="<?php echo $amp->Name; ?>" 
                               <?php if(isset($_POST['typefilter']['brand'])){
                                $variable=$_POST['typefilter']['brand'];
                                
                                  if($amp->Name == $variable)
                                    {echo 'checked'; }  } ?>  >
                                    
                                  </li>

                                 <?php  } }  

                              } ?>

                <?php 
                  if(count($brand)>9){
                      ?>
                        <li class="showmore">
                        <a href="#" class="clickmore" data-val="more" style='color: #337ab7 !important;'>More Brand </a>
                        </li>
                        <li class="showless displaynone">
                          <a href="#" data-val="less" class="clickmore" style='color: #337ab7 !important;'>Less Brand </a>
                        </li>
                  <?php
                  }
                ?>
                </ul>
              </div>
          </div>
      </dd>
</div>
      <?php if ($check_filter != '' ) {
        
      } else { ?>
<div class="top_brder11">
   <dt>
      <a href="#product2" aria-controls="product2" <?php if(isset($_POST['typefilter']['category'])){ echo 'aria-expanded="true"  class="accordion-title accordionTitle js-accordionTrigger is-collapsed is-expanded"'; }else{ echo 'aria-expanded="false" class="accordion-title accordionTitle js-accordionTrigger"'; } ?> >
      Category<div class="arrw"><span class="bar top"></span><span class="bar bottom"></span></div></a>
    </dt>
      <dd  id="product2" <?php if(isset($_POST['typefilter']['category'])){ echo 'class="accordion-content item_selected22 accordionItem is-expanded animateIn" aria-hidden="false"'; }else{ echo 'class="item_selected22 accordion-content accordionItem is-collapsed" aria-hidden="true"'; } ?> >
        <div class="accordian_inner_con">
          <div class="panl_list">
            <ul>
              <?php
                foreach($mmcategory as $br){
                  ?>
                    <!-- <li><a href="?category=<?php //echo $br->Name ; ?>"><?php// echo $br->Name ; ?></a></li> -->

                        <li <?php if(isset($_POST['typefilter']['category'])){
                                $variable=$_POST['typefilter']['category'];
                                  if($br->Name == $variable)
                                    { echo 'class="activeLI"'; } }  ?> >
                    
                               <a href='#' class="mainvalclick" id="category<?php echo $br->ID; ?>"><?php echo $br->Name; ?></a>


                     <input class='category<?php echo $br->ID; ?> displaynone'  type="checkbox" name="typefilter[category]" value="<?php echo $br->Name; ?>" 
                                <?php if(isset($_POST['typefilter']['category'])){
                                $variable=$_POST['typefilter']['category'];
                                  if($br->Name == $variable)
                                    { echo 'checked'; } }  ?>  > <br>

                                  </li>
                                 <?php   } 
                                              ?>
            </ul>
          </div>
        </div>
    </dd>
         
</div>   <?php } ?>

<div class="top_brder11">
    <dt class="respon">

      <a href="#product1" aria-controls="product1" <?php if(isset($_POST['typefilter']['condition'])){ echo 'aria-expanded="true"  class="accordion-title accordionTitle js-accordionTrigger is-collapsed is-expanded"'; }else{ echo 'aria-expanded="false" class="accordion-title accordionTitle js-accordionTrigger"'; } ?> >
        Condition<div class="arrw"><span class="bar top"></span><span class="bar bottom"></span></div></a>
     </dt>
     <dd  id="product1" <?php if(isset($_POST['typefilter']['condition'])){ echo 'class="accordion-content item_selected22 accordionItem is-expanded animateIn" aria-hidden="false"'; }else{ echo 'class="accordion-content item_selected22 accordionItem is-collapsed" aria-hidden="true"'; } ?> >

      <div class="accordian_inner_con">
          <div class="panl_list">
            <ul>
                <?php 
                        if($check_filter != ''){

                                foreach($condition as $cr){
                                 ?>
                              
                        <li <?php if(isset($_POST['typefilter']['condition'])){
                                $variable=$_POST['typefilter']['condition'];
                                  if($cr->Condition == $variable)
                                    { echo 'class="activeLI"'; } }  ?> >
                    
                               <a href='#' class="mainvalclick" id="condition<?php echo $cr->ID; ?>"><?php echo $cr->Condition; ?></a>


                              <input class='condition<?php echo $cr->ID; ?> displaynone'  type="checkbox" name="typefilter[condition]" value="<?php echo $cr->Condition; ?>" 
                               <?php if(isset($_POST['typefilter']['condition'])){
                                $variable=$_POST['typefilter']['condition'];
                                  if($cr->Condition == $variable)
                                    { echo 'checked'; } }  ?>  >

                                  </li>
                                 <?php   } 

                              }else{

                                foreach($condition as $cr){
                                 ?>

                                  <li <?php if(isset($_POST['typefilter']['condition'])){
                                $variable=$_POST['typefilter']['condition'];
                                  if($cr->Name == $variable)
                                    { echo 'class="activeLI"'; } }  ?> >
                    
                               <a href='#' class="mainvalclick" id="condition<?php echo $cr->ID; ?>"><?php echo $cr->Name; ?></a>



                               <input class='condition<?php echo $cr->ID; ?> displaynone'  type="checkbox" name="typefilter[condition]" value="<?php echo $cr->Name; ?>" 
                                <?php if(isset($_POST['typefilter']['condition'])){
                                $variable=$_POST['typefilter']['condition'];
                                  if($cr->Name == $variable)
                                    { echo 'checked'; } }  ?> 

                                     >
                                     <br>
                                  </li>
                                 <?php   }  ?>
                                  <!-- <li><a href="?condition=<?php //echo  $cr->Name; ?>"><?php// echo $cr->Name; ?></a></li> -->
                                 
                                
                                 <?php } 

                               ?>
            </ul>
          </div>
      </div>
    </dd>
</div>    


 <?php if ($check_filter != '' ) {
        
      } else { ?>
<div class="top_brder11">
   <dt>

    <a href="#product3" aria-controls="product5" <?php if(isset($_POST['typefilter']['piece'])){ echo 'aria-expanded="true"  class="accordion-title accordionTitle js-accordionTrigger is-collapsed is-expanded"'; }else{ echo 'aria-expanded="false" class="accordion-title accordionTitle js-accordionTrigger"'; } ?> >
     Piece<div class="arrw"><span class="bar top"></span><span class="bar bottom"></span></div>
    </a>
  </dt>
  <dd  id="product3" <?php if(isset($_POST['typefilter']['piece'])){ echo 'class="accordion-content accordionItem item_selected22 is-expanded animateIn" aria-hidden="false"'; }else{ echo 'class="accordion-content item_selected22 accordionItem is-collapsed" aria-hidden="true"'; } ?> >
      <div class="accordian_inner_con">
          <div class="panl_list">
            <ul>
              <?php

              $ppp = 0;
               foreach($piece as $amp){
                $ppp++;
                 ?>
                  <!-- <li><a href="?piece=<?php// echo  $amp->Name; ?>"><?php// echo  $amp->Name; ?></a></li> -->
                   <li class='<?php if(isset($_POST['typefilter']['piece'])){
                                $variable=$_POST['typefilter']['piece'];
                                  if($amp->Name == $variable)
                                    { echo 'activeLI'; } }  ?> <?php if($ppp>10){ echo "displaynone";} ?>' >
                    
                               <a href='#' class="mainvalclick" id="piece<?php echo $amp->ID; ?>"><?php echo $amp->Name; ?></a>


                   
                    <input class='piece<?php echo $amp->ID; ?> displaynone'  type="checkbox" name="typefilter[piece]" value="<?php echo $amp->Name; ?>"   <?php if(isset($_POST['typefilter']['piece'])){
                                $variable=$_POST['typefilter']['piece'];
                                  if($amp->Name == $variable)
                                    { echo 'checked'; } }  ?>  > <br>

                                  </li>
                                 <?php   }  ?>

                              <?php 
                                if(count($piece)>9){
                                    ?>
                                     <li class="showmore">
                        <a href="#" class="clickmore" data-val="more" style='color: #337ab7 !important;'>More Piece </a>
                        </li>
                        <li class="showless displaynone">
                          <a href="#" data-val="less" class="clickmore" style='color: #337ab7 !important;'>Less Piece </a>
                        </li>
                                  <?php
                                }
                            ?>
            </ul>
          </div>
      </div>
  </dd>
</div>

<?php } ?>

 <div class="top_brder11">
             <dt>
              
              <a href="#product3" aria-controls="product5" <?php if(isset($_POST['typefilter']['Price'])){ echo 'aria-expanded="true"  class="accordion-title accordionTitle js-accordionTrigger is-collapsed is-expanded"'; }else{ echo 'aria-expanded="false" class="accordion-title accordionTitle js-accordionTrigger"'; } ?> >
               Price<div class="arrw"><span class="bar top"></span><span class="bar bottom"></span></div>
             
              </a>
            </dt>
            <dd  id="product3" <?php if(isset($_POST['typefilter']['Price'])){ echo 'class="accordion-content item_selected22 accordionItem is-expanded animateIn" aria-hidden="false"'; }else{ echo 'class="item_selected22 accordion-content accordionItem is-collapsed" aria-hidden="true"'; } ?> >
                <div class="accordian_inner_con">
                    <div class="panl_list">
                      <ul>
                       
                            <!-- <li><a href="?Price=<?php// echo  'ascending'; ?>"><?php// echo 'Ascending'; ?></a></li>
                            <li><a href="?Price=<?php// echo  'descending'; ?>"><?php// echo  'Descending'; ?></a></li>   -->

                             <li <?php if(isset($_POST['typefilter']['Price'])){
                                $variable=$_POST['typefilter']['Price'];
                                  if("ASC"== $variable)
                                    { echo 'class="activeLI"'; } }  ?> >
                    
                               <a href='#' class="mainvalclick" id="priceASC">Ascending</a>

                <input class='priceASC displaynone'  type="checkbox" name="typefilter[Price]" value='ASC' 
                      <?php if($_POST['typefilter']['Price'] == 'ASC'){   
                          echo 'checked'; }   ?>  >
                        </li>


<li <?php if(isset($_POST['typefilter']['Price'])){
                                $variable=$_POST['typefilter']['Price'];
                                  if("DESC"== $variable)
                                    { echo 'class="activeLI"'; } }  ?> >
                    
                               <a href='#' class="mainvalclick" id="priceDESC">Descending</a>
              <input class='priceDESC displaynone'  type="checkbox" name="typefilter[Price]" value='DESC' 
                     <?php if($_POST['typefilter']['Price'] == 'DESC'){   
                          echo 'checked'; }   ?>      >    </li>     

                       
                      </ul>
                    </div>
                </div>
            </dd>
      </div>

 <div class="top_brder11">
             <dt>
              <a href="#product3" aria-controls="product5" <?php if(isset($_POST['typefilter']['Rating'])){ echo 'aria-expanded="true"  class="accordion-title accordionTitle js-accordionTrigger is-collapsed is-expanded"'; }else{ echo 'aria-expanded="false" class="accordion-title accordionTitle js-accordionTrigger"'; } ?> >
               Rating<div class="arrw"><span class="bar top"></span><span class="bar bottom"></span></div>
              </a>
            </dt>
            <dd  id="product3" <?php if(isset($_POST['typefilter']['Rating'])){ echo 'class="accordion-content item_selected22 accordionItem is-expanded animateIn" aria-hidden="false"'; }else{ echo 'class="item_selected22 accordion-content accordionItem is-collapsed" aria-hidden="true"'; } ?> >
                <div class="accordian_inner_con">
                    <div class="panl_list">
                      <ul>
                         <!-- <li><a href="?Rating=<?php// echo  'ascending'; ?>"><?php// echo 'Ascending'; ?></a></li>
                            <li><a href="?Rating=<?php// echo  'descending'; ?>"><?php// echo  'Descending'; ?></a></li>   -->

                              <li <?php if(isset($_POST['typefilter']['Rating'])){
                                $variable=$_POST['typefilter']['Rating'];
                                  if("ASC"== $variable)
                                    { echo 'class="activeLI"'; } }  ?> >
                    
                               <a href='#' class="mainvalclick" id="RatingASC">Ascending</a>

                <input class='RatingASC displaynone'  type="checkbox" name="typefilter[Rating]" value='ASC' 
                      <?php if($_POST['typefilter']['Rating'] == 'ASC'){   
                          echo 'checked'; }   ?>  >
                        </li>


<li <?php if(isset($_POST['typefilter']['Rating'])){
                                $variable=$_POST['typefilter']['Rating'];
                                  if("DESC"== $variable)
                                    { echo 'class="activeLI"'; } }  ?> >
                    
                               <a href='#' class="mainvalclick" id="RatingDESC">Descending</a>
              <input class='RatingDESC displaynone'  type="checkbox" name="typefilter[Rating]" value='DESC' 
                     <?php if($_POST['typefilter']['Rating'] == 'DESC'){   
                          echo 'checked'; }   ?>      >    </li>



                               
                           </form> 
                      </ul>
                    </div>
                </div>
            </dd>
      </div>


</dl>
</div>




</div>
</div>






<!--mobile view-->
<div class="container">

<div class="row">
<div class="mobile">

<div class="col-md-3 col-sm-3 ability abil_pad">

<div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
          Availability 
        </a><i class="indicator glyphicon glyphicon-chevron-down  pull-right"></i>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in">
      <div class="panel-body">
        <div class="panl_list">
          <ul>
          <li>Life Fitness</li>
          <li>Precor</li>
          <li>Star Trac</li>
          <li>Woodway</li>
          </ul>
        </div><!--end panl_list-->
       </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
           Brand
        </a><i class="indicator glyphicon glyphicon-chevron-up  pull-right"></i>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse">
      <div class="panel-body">
        <div class="panl_list">
          <ul>
          <li>Life Fitness</li>
          <li>Precor</li>
          <li>Star Trac</li>
          <li>Woodway</li>
          </ul>
        </div><!--end panl_list-->
        </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
          Category 
        </a><i class="indicator glyphicon glyphicon-chevron-up pull-right"></i>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse">
      <div class="panel-body">
        <div class="panl_list">
          <ul>
          <li>Life Fitness</li>
          <li>Precor</li>
          <li>Star Trac</li>
          <li>Woodway</li>
          </ul>
        </div><!--end panl_list-->
      </div>
    </div>
  </div>
</div>
</div>

  <div class="col-md-9 col-sm-9 abil_pad">
 <div class="category">


<div class="products">
  <?php 
      foreach($product as $products){
        ?>
  <div class="col-md-4 col-xs-6 padd_0">
   <div class="img_block">
     <i><a href="<?php echo base_url('/site/fitness_equipment').'/'.$products->ListID; ?>"><img alt="<?php echo $products->ProductName; ?>" title="<?php echo $products->MetaDetailPageTitleTag; ?>" src="http://www.de-roquefeuil-labistour.com/<?php echo $products->ImageURL; ?>" /></a></i>
     <div class="img_content">
 
       <h5><?php echo $products->ProductName; ?></h5>
       <p>$<?php echo round($products->Price,2) ; ?></p>
       <ul> <a href="#"><img src="<?php echo base_url('public/assets/images/star.png'); ?>" alt=""/></a>
         <a href="#"><img src="<?php echo base_url('public/assets/images/star.png'); ?>" alt=""/></a>
         <a href="#"><img src="<?php echo base_url('public/assets/images/star.png'); ?>" alt=""/></a>
         <a href="#"><img src="<?php echo base_url('public/assets/images/star.png'); ?>" alt=""/></a>
         <a href="#"><img src="<?php echo base_url('public/assets/images/star.png'); ?>" alt=""/></a>
       </ul>
       <p>Availbale to ship: Low Stock</p>
     </div>   
   </div>
 </div>

        <?php
      }
  ?>



 <div class="clearfix"></div>
       </div>
      </div>
     </div>
    </div>
   </div>
</div>
</div>
</div>
</div>
</div>
</div>









<script type="text/javascript">function toggleChevron(e) {
    $(e.target)
        .prev('.panel-heading')
        .find("i.indicator")
        .toggleClass('glyphicon-chevron-down glyphicon-chevron-up');
}
$('#accordion').on('hidden.bs.collapse', toggleChevron);
$('#accordion').on('shown.bs.collapse', toggleChevron);</script>
<script type="text/javascript">
$(document).ready(
    function()
    {
        $(".mainvalclick").click(function(e){
          e.preventDefault();
          $checked = $(this).attr('id');
          $(this).parents('ul').find('input[type=checkbox]:checked').prop('checked',false);
          $("."+$checked).attr('checked', true); 
          // console.log($(this).parents(".testmyselfsubmit").find("form").serializeArray());
          // return false; 
   
         $(this).parents(".testmyselfsubmit").find("form").submit();       
        });

        $(".clickmore").click(function(e){
          e.preventDefault();
          $val = $(this).data('val');
          if($val=="more"){
            $(this).parents('ul').find('li.displaynone').removeClass('displaynone').addClass('checkedok');
            $(this).parents('ul').find('li.showmore').addClass('displaynone');
            $(this).parents('ul').find('li.showless').removeClass('displaynone');
          }
          else{
              $(this).parents('ul').find('li.checkedok').removeClass('checkedok').addClass('displaynone');
          //    $(this).parent('li').addClass('displaynone');
            $(this).parents('ul').find('li.showless').addClass('displaynone');
            $(this).parents('ul').find('li.showmore').removeClass('displaynone');
          }               
        }); 
    }
);
</script>