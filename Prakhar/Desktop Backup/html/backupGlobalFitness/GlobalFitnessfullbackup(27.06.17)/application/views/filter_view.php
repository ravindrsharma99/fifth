<!--filter_menu_section  -->
<style>
.displaynone{display: none; }
.item_selected22{/*  background: none repeat scroll 0 0 #f0f0f0;*/ padding: 0 !important; }
.activeLI {background: #f0f0f0 !important; }
.item_selected22 li {line-height: 30px !important; }
/*.item_selected22 a {color: #323232 !important; }*/
 .HeiGht {max-height: 500px !important; }
</style>
<input type="hidden" id="productcounts" value="<?php echo count($product) ; ?>">
<input type="hidden" id="categoryname" value="<?php echo $category_name ; ?>"> 
<span id ="categoryfilter" class="displaynone"><?php

if (isset($strength_equipment))
  {
  echo $strength_equipment;
  }

?></span>
<div class="navigation_filter_menu_responsive ggnggfs">
  <div class="container-fluid">
    <div class="col-md-6 col-xs-6 filter_menu_nav_respon">
        <div class="btn-group show-on-hover">
          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
            Filter <span class="caret"></span>
          </button>
          <ul class="dropdown-menu testmyselfsubmit" role="menu">
            <li >
              <div class="top_brder11">
                <div class="reset_button">
                 <a href="<?php
echo base_url(''). 'filter/' . $strength_equipment; ?>">Reset</a>  
                  <!-- <a href="">Reset</a></div> -->
                </div>
              </div>
            </li>
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
    <!-- mobile_filter -->
    <section class="MOBILE_VIEW_NEW_Filter">
      <div class="container-fluid">
          <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                  <div class="filter_mOB">
                      <div class="filter_button_model" data-toggle="modal" href="#myModal">
                        <img class="filter_img_icon_mo" src="<?php
echo base_url(); ?>/public/assets/images/ic_notification.png"> Filter 
                      </div>
                  </div>

              </div>
          </div>
      </div>
    </section>
    <!-- mobile_filter -->
  <div class="container-fluid">
  <div class="row accrodian_arrow_penal PADD_ThREee">
    <div class="col-md-12 col-sm-12 col-xs-12 abil_pad_1">
      <div class="cust_form accrodian_arrow  filter_BUTihjhb  Filter_VEVEVEV For_resetBUTn">
        
        <div class="reset_button">
            <?php

if (isset($category_name) && !empty($category_name))
  { ?>
            <a href="<?php
  echo base_url('') . $strength_equipment . '/'.'filter'.'/' . $category_name ;?>">Reset</a>
            <?php
  }
  else
  { ?>
             <a href="<?php
  echo base_url('') . 'filter/'. $strength_equipment; ?>">Reset</a>
             <?php
  } ?>
            </div>
        <div class="select-style Filter_BUTTn_Reste">
          <?php

if (isset($getcategory))
  {
  $link = str_replace("-", "*", $category_name);
  $link = str_replace(" ", "-", $link);

  // $link  = rawurlencode($category_name) ;

  if ($ptype == "0")
    {
?>
                 <a href="<?php
    echo base_url('/category/' . $link); ?>">Filter</a>
                <?php
    }
    else
    {
?>
                 <a href="<?php
    echo base_url('/category/' . $link); ?>">Filter</a>
                <?php
    }
  }
  else
  {
    if($strength_equipment == 'brand'){

   ?>    <a href="<?php
    echo base_url('/brand/'.$categoryname); ?>">Filter</a>
   <?php }
  elseif ($ptype == "0")
    {
?>
                 <a href="<?php
    echo base_url('/cardio'); ?>">Filter</a>
                <?php
    }
    else
    {
?>
                 <a href="<?php
    echo base_url('/strength'); ?>">Filter</a>
                <?php
    }
  } ?>
        </div>
      </div>
<div class="inner_accordian_arrow">
    <?php

if (isset($_GET))
  {
  $url = urldecode($_SERVER['REQUEST_URI']);
  $query = explode('&', $_SERVER['QUERY_STRING']);
  $params = array();
  $k = 0;

  // print_r($query);die();

  foreach($query as $param)
    {
    list($name, $value) = explode('=', $param, 2);
    $lname = urldecode($name);
    $lval = urldecode($value);
    if (!empty($lval))
      {
      $redirectUrl = str_replace($lname . "=" . $lval, "", $url);

      // $redirectUrl = preg_replace( '/([?&])' . $lname . '=[^&]+(&|$)/', '$1', $url );

      if ($lname != 'type')
        {
?> 
      <div class="boxit"><a href="<?php
        echo base_url();
        print_r($redirectUrl); ?>">
          <?php
        print_r($lname . ', ' . $lval);
?>

        <span style="font-family: Arial Unicode MS, Lucida Grande">    &#10008;
        </span>
        </a>
     </div> <?php
        }

      // $params[urldecode($name)][] = urldecode($value);

      }
    }

  //    $parts = parse_url($url);
  // $data =  parse_str($parts['query'], $query);

  }

?>

   </div>


<div class="container-fluid padding_no"> 
<?php

if (isset($getcategory))
  { ?> 
        <dt class="respon">
          <a class="accordion-title accordionTitle js-accordionTrigger" aria-controls="accordion1" aria-expanded="false" href="#accordion1"><?php
  echo $category_name; ?> 
        <div class="arrw"><span class="bar top"></span><span class="bar bottom"></span></div></a>
         </dt>
         <dd aria-hidden="true" id="#accordion1" class="accordion-content accordionItem is-collapsed">
          <div class="row inner_product_container">
            <div class="col-md-12 col-sm-12">
              <!-- <p>Factory Serviced LeMond RevMaster Pro Group Cycling Bike</p> -->
              <?php // if($description!=""){
   ?>
              <div class="product_inner_accordian_content">
               <p><?php
  echo $CollapsiblePanelDescription; ?>
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


<div class="container-fluid">
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
<div class="row PADD_ThREee">
  <div class="col-md-9 col-sm-9 abil_pad_PPP">
 <div class="category">

<div class="products feedingproduct" id="scrollablefilter">
  <?php

// echo "<pre>";
// print_r($_POST);
// echo "</pre>";

if (count($product) > 0)
  {
  foreach($product as $products)
    {
    $link = str_replace("-", "*", $products->ProductName);
    $link = str_replace(" ", "-", $link);

    // $link  = rawurlencode($products->ProductName) ;

?>
  <div class="col-md-4 col-xs-6 padd_0">
   <div class="img_block">
     <?php
    if ($ptype == "0")
      {
?>
             <i><a href="<?php
      echo base_url('/cardio') . '/' . $link; ?>"><img alt="<?php
      echo $products->ProductName; ?>" title="<?php
      echo $products->MetaDetailPageTitleTag; ?>"  src="<?php
      echo base_url() . '/' . $products->ImageURL; ?>" /></a></i>
            <?php
      }
      else
      {
?>
             <i><a href="<?php
      echo base_url('/strength') . '/' . $link; ?>"><img alt="<?php
      echo $products->ProductName; ?>" title="<?php
      echo $products->MetaDetailPageTitleTag; ?>"  src="<?php
      echo base_url() . '/' . $products->ImageURL; ?>" /></a></i>
            <?php
      }

?>

      <div class="img_content">
 
       <h5><?php
    echo $products->ProductName; ?></h5>
        <p><?php
    if ($products->Price != "Please Enquire")
      {
      echo "$";
      } ?><?php
    echo trim($products->Price, "$"); ?><p> 
              <?php
    $id = $products->ListID;
    $rate = $this->Site_model->getrating($id);

    // print_r($rates); die;

    $add = '';
    foreach($rate as $rates)
      {
      $add+= $rates->star_rate;
      }

    $divide = count($rate);
    if ($divide < 1)
      {
      $divide = 1;
      }

    $avg_rate = $add / $divide;
?>
       <div class="col-md-9 col-sm-9 padd_no bfghghgjhgj">
        <input id="input-21b" class="rating" data-min="0" data-max="5" data-step="1" 
        value='<?php
    echo $avg_rate; ?>' data-disabled="true" data-size="xs" data-show-clear="false" data-show-caption="false" >
       </div>
       <p>Available to ship: 
        <?php
    if ($products->QuantityOnHand <= 0)
      {
?><span class="outstock">Out of Stock</span><?php
      }
      else
    if (($products->QuantityOnHand > 0) && ($products->QuantityOnHand < 3))
      {
     ?><span class="lowstock">Low Stock</span> <?php
      }
      else
      {
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
  }
  else
  {
  echo "<h4 style='color:red'>No Result Found.</h4>";
  }

?>
 
            <?php  if(count($product)>25) { ?>
            <div class="text_align"><img id="load_filter_img" src="<?php echo base_url("/public/assets/images/global_loader.gif"); ?>"></div>
            <?php } ?>


</div>
 <div class="clearfix"></div>
</div>
</div>




 <!--  <div class="col-md-3 col-sm-3 ability abil_pad filter_page_actual"> -->
      <!-- filter_view_like_apple -->
        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
          <div id="filter_view_laTEST sidebar" class="">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default FILETR_SIDER">
                    <div class="panel-heading" role="tab" id="Availability_Cust">
                        <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#Availability" aria-expanded="true" aria-controls="Availability">
                                <i class="more-less glyphicon glyphicon-plus"></i>Availability</a>
                        </h4>
                    </div>
                    <div id="Availability" class="panel-collapse collapse" role="tabpanel" aria-labelledby="Availability_Cust">
                        <div class="panel-body">
                        <ul class="filter_view_laTEST_nav Availability">
                        <?php

if (isset($_GET) && !empty($_GET))
  { ?>
            <li> 
              <a href="<?php
  print_r($_SERVER['REQUEST_URI']); ?>&Availability=<?php
  echo 'in-stock'; ?>">
            <?php
  echo "in-stock"; ?>
            </a>
            </li>
            <?php
  }
  else
  { ?>
             <li>   <a href="?Availability=<?php
  echo 'in-stock'; ?>">
            <?php
  echo "in-stock"; ?>
             </a></li>
            <?php
  } ?>
                
                        </ul>
                        </div>
                    </div>
                </div>

                <div class="panel panel-default FILETR_SIDER">
                    <div class="panel-heading" role="tab" id="Brand_Cust">
                        <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#Brand" aria-expanded="false" aria-controls="Brand">
                                <i class="more-less glyphicon glyphicon-plus"></i>Brand</a>
                        </h4>
                    </div>

<div class="input-group Filter_PP_SERCH_cont displaynone" id="showThisbrand"><div class="ICON_SRCh"><i class="glyphicon glyphicon-search"></i></div>
                                <input type="text" onkeyup="suggestionlisting();" class="form-control" placeholder="Search Brand" name="srch-term" id="ng_data">
                              </div>
                    <div id="Brand" class="panel-collapse collapse" role="tabpanel" aria-labelledby="Brand_Cust">
                        <div class="panel-body">
                        <ul class="filter_view_laTEST_nav Brand">
            
            <?php
$k = 0;

foreach($brand as $amp)
  {
  $k++;
  if ($strength_equipment == 'category')
    {
    if (isset($_GET) && !empty($_GET))
      {
?>
                <li class=' <?php
      if ($k > 10)
        {
        echo "displaynone";
        } ?>'><a href="<?php
      print_r($_SERVER['REQUEST_URI']); ?>&brand=<?php
      echo $amp->BrandName; ?>"><?php
      echo $amp->BrandName; ?></a></li>             
                          <?php
      }
      else
      {
?>

            <li class=' <?php
      if ($k > 10)
        {
        echo "displaynone";
        } ?>'><a href="?brand=<?php
      echo $amp->BrandName; ?>"><?php
      echo $amp->BrandName; ?></a></li>
            <?php
      }
    }

  if (isset($_GET) && !empty($_GET) && $strength_equipment != 'category')
    {
?>
                <li class=' <?php
    if ($k > 10)
      {
      echo "displaynone";
      } ?>'><a href="<?php
    print_r($_SERVER['REQUEST_URI']); ?>&brand=<?php
    echo $amp->Name; ?>"><?php
    echo $amp->Name; ?></a></li>             
                          <?php
    }
    else
    {
?>

            <li class=' <?php
    if ($k > 10)
      {
      echo "displaynone";
      } ?>'><a href="?brand=<?php
    echo $amp->Name; ?>"><?php
    echo $amp->Name; ?></a></li>
            <?php
    }
  }

?>
       
                <?php

if (count($brand) > 9)
  {
?>
                         <a href="#" id ="hidethisbrand"><div class="input-group Filter_PP_SERCH_cont" id="hideThisbrand"><div class="ICON_SRCh"><i class="glyphicon glyphicon-search"></i></div>
                                <input type="text" class="form-control" placeholder="Search Brand" name="srch-term" id="srch-term_aa">
                              </div></a>
                        </li>
                  <?php
  }

?>
              </ul>
                        </div>
                    </div>
                </div>
   
                <div class="panel panel-default FILETR_SIDER">
                    <div class="panel-heading" role="tab" id="CategoryProduct_Cust">
                        <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#CategoryProduct" aria-expanded="false" aria-controls="CategoryProduct">
                                <i class="more-less glyphicon glyphicon-plus"></i>Category</a>
                        </h4>
                    </div>
                    <div id="CategoryProduct" class="panel-collapse collapse" role="tabpanel" aria-labelledby="CategoryProduct_Cust">
                        <div class="panel-body">
                        <ul class="filter_view_laTEST_nav Category">
            <?php
$k = 0;

foreach($mmcategory as $br)
  {
  $k++;
?>
            <li class=' <?php
  if ($k > 10)
    {
    echo "displaynone";
    } ?>'><a href="?category=<?php
  echo $br->Name; ?>"><?php
  echo $br->Name; ?></a></li>
            <?php
  }

?>
            <?php

if (count($mmcategory) > 9)
  {
?>
                        <li class="showmore">
                        <a href="#" class="clickmore" data-val="more" style='color: #337ab7 !important;'>More Categories </a>
                        </li>
                        <li class="showless displaynone">
                          <a href="#" data-val="less" class="clickmore" style='color: #337ab7 !important;'>Less Categories </a>
                        </li>
                  <?php
  }

?>
            <!-- <li class=''><a href="<?php
echo base_url() . 'category/filter/' . $category_name . '?type=' . $this->input->get('type'); ?>"><?php
echo $category_name; ?></a></li> -->

                        </ul>
                        </div>
                    </div>
                </div>

                <div class="panel panel-default FILETR_SIDER">
                    <div class="panel-heading" role="tab" id="ConditionProduct_Cust">
                        <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#ConditionProduct" aria-expanded="false" aria-controls="ConditionProduct">
                                <i class="more-less glyphicon glyphicon-plus"></i>Condition</a>
                        </h4>
                    </div>
                    <div id="ConditionProduct" class="panel-collapse collapse" role="tabpanel" aria-labelledby="ConditionProduct_Cust">
                        <div class="panel-body">
                        <ul class="filter_view_laTEST_nav Condition">
                    <?php

foreach($condition as $cr)
  {
  if (isset($_GET) && !empty($_GET))
    {
?>
              <li> <a id="condition<?php
    echo $cr->Name; ?>" href="<?php
    print_r($_SERVER['REQUEST_URI']); ?>&condition=<?php
    echo $cr->Name; ?>"><?php
    echo $cr->Name; ?></a></li>
                <?php
    }
    else
    { ?>

               <li> <a id="condition<?php
    echo $cr->Name; ?>" href="?condition=<?php
    echo $cr->Name; ?>"><?php
    echo $cr->Name; ?></a></li>
            <?php
    }
  }

?>
                        </ul>
                        </div>
                    </div>
                </div>

                <div class="panel panel-default FILETR_SIDER">
                    <div class="panel-heading" role="tab" id="PieceProduct_Cust">
                        <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#PieceProduct" aria-expanded="false" aria-controls="PieceProduct">
                                <i class="more-less glyphicon glyphicon-plus"></i>Piece</a>
                        </h4>
                    </div>
                    <div class="input-group Filter_PP_SERCH_cont displaynone" id="showThisPieceFilter"><div class="ICON_SRCh"><i class="glyphicon glyphicon-search"></i></div>
                                <input type="text" onkeyup="suggestion();" class="form-control" placeholder="Search Piece" name="srch-term" id="sg_data">
                              </div>
                    <div id="PieceProduct" class="panel-collapse collapse" role="tabpanel" aria-labelledby="PieceProduct_Cust">
                        <div class="panel-body">
                        <ul class="filter_view_laTEST_nav Piece">
                <?php
$ppp = 0;

foreach($piece as $amp)
  {
  $ppp++;
?>
            <li class='<?php
  if ($ppp > 10)
    {
    echo "displaynone";
    } ?>'>
                  <?php
  if ($strength_equipment == 'category')
    {
    if (isset($_GET) && !empty($_GET))
      {
?>
                <a  class=" " id="piece<?php
      echo $amp->ID; ?>" href="<?php
      print_r($_SERVER['REQUEST_URI']); ?>&piece=<?php
      echo $amp->Piece; ?>"><?php
      echo $amp->Piece; ?></a></li>
                <?php
      }
      else
      { ?>

                <a  class=" " id="piece<?php
      echo $amp->ID; ?>" href="?piece=<?php
      echo $amp->Piece; ?>"><?php
      echo $amp->Piece; ?></a></li>
            <?php
      }
    }
    else
    {
    if (isset($_GET) && !empty($_GET))
      {
?>
                <a  class=" " id="piece<?php
      echo $amp->ID; ?>" href="<?php
      print_r($_SERVER['REQUEST_URI']); ?>&piece=<?php
      echo $amp->Name; ?>"><?php
      echo $amp->Name; ?></a></li>
                <?php
      }
      else
      { ?>

                <a  class=" " id="piece<?php
      echo $amp->ID; ?>" href="?piece=<?php
      echo $amp->Name; ?>"><?php
      echo $amp->Name; ?></a></li>
            <?php
      }
    }
  }

?>
                          
                          <?php

if (count($piece) > 9)
  {
?>  
                       <a href="#" id ="hidethis"><div class="input-group Filter_PP_SERCH_cont" id="hideThis"><div class="ICON_SRCh"><i class="glyphicon glyphicon-search"></i></div>
                                <input type="text" class="form-control" placeholder="Search Piece" name="srch-term" id="srch-term_aa">
                              </div></a>
                   
                                <?php
  }

?> 
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="panel panel-default FILETR_SIDER">
                    <div class="panel-heading" role="tab" id="PriceProduct_Cust">
                        <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#PriceProduct" aria-expanded="false" aria-controls="PriceProduct">
                                <i class="more-less glyphicon glyphicon-plus"></i>Price</a>
                        </h4>
                    </div>
                    <div id="PriceProduct" class="panel-collapse collapse" role="tabpanel" aria-labelledby="PriceProduct_Cust">
                        <div class="panel-body">
                        <ul class="filter_view_laTEST_nav Price">
                        <?php

if (isset($_GET) && !empty($_GET))
  {
?>
            <li><a href="<?php
  print_r($_SERVER['REQUEST_URI']); ?>&Price=<?php
  echo 'ascending'; ?>"><?php
  echo 'Ascending'; ?></a></li>
            <?php
  }
  else
  { ?>
             <li><a href="?Price=<?php
  echo 'ascending'; ?>"><?php
  echo 'Ascending'; ?></a></li> 
             <?php
  }

if (isset($_GET) && !empty($_GET))
  { ?>     
            <li><a href="<?php
  print_r($_SERVER['REQUEST_URI']); ?>&Price=<?php
  echo 'descending'; ?>"><?php
  echo 'Descending'; ?></a></li>  
            <?php
  }
  else
  { ?>   
              <li><a href="?Price=<?php
  echo 'descending'; ?>"><?php
  echo 'Descending'; ?></a></li>
              <?php
  } ?>  
                        </ul>
                        </div>
                    </div>
                </div>

                <div class="panel panel-default FILETR_SIDER">
                    <div class="panel-heading" role="tab" id="RatingProduct_Cust">
                        <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#RatingProduct" aria-expanded="false" aria-controls="RatingProduct">
                                <i class="more-less glyphicon glyphicon-plus"></i>Rating</a>
                        </h4>
                    </div>
                    <div id="RatingProduct" class="panel-collapse collapse" role="tabpanel" aria-labelledby="RatingProduct_Cust">
                        <div class="panel-body">
                        <ul class="filter_view_laTEST_nav Rating">
                 <?php

if (isset($_GET) && !empty($_GET))
  {
?>   
            <li><a href="<?php
  print_r($_SERVER['REQUEST_URI']); ?>&Rating=<?php
  echo 'ascending'; ?>"><?php
  echo 'Ascending'; ?></a></li>
            <?php
  }
  else
  { ?>
            <li><a href="?Rating=<?php
  echo 'ascending'; ?>"><?php
  echo 'Ascending'; ?></a></li>  
            <?php
  } ?>
               <?php

if (isset($_GET) && !empty($_GET))
  { ?>   
            <li><a href="<?php
  print_r($_SERVER['REQUEST_URI']); ?>&Rating=<?php
  echo 'descending'; ?>"><?php
  echo 'Descending'; ?></a></li>
            <?php
  }
  else
  { ?>
            <li><a href="?Rating=<?php
  echo 'descending'; ?>"><?php
  echo 'Descending'; ?></a></li>  
            <?php
  } ?>
                        </ul>
                        </div>
                    </div>
                </div>
            </div><!-- panel-group -->
          </div>
        </div>
      <!-- filter_view_like_apple -->
  </div>
<!-- </div> -->






<!--mobile view-->
<!--     <div class="container">
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
                    </div><!--end panl_list--
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
                    </div><!--end panl_list--
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
                    </div><!--end panl_list--
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-9 col-sm-9 abil_pad">
            <div class="category">
              <div class="products">
                <?php

foreach($product as $products)
  {
?>
                <div class="col-md-4 col-xs-6 padd_0">
                 <div class="img_block">
                   <i><a href="<?php
  echo base_url('/site/fitness_equipment') . '/' . $products->ListID; ?>"><img alt="<?php
  echo $products->ProductName; ?>" title="<?php
  echo $products->MetaDetailPageTitleTag; ?>" src="http://www.de-roquefeuil-labistour.com/<?php
  echo $products->ImageURL; ?>" /></a></i>
                   <div class="img_content">
               
                     <h5><?php
  echo $products->ProductName; ?></h5>
                     <p>$<?php
  echo round($products->Price, 2); ?></p>
                     <ul> <a href="#"><img src="<?php
  echo base_url('public/assets/images/star.png'); ?>" alt=""/></a>
                       <a href="#"><img src="<?php
  echo base_url('public/assets/images/star.png'); ?>" alt=""/></a>
                       <a href="#"><img src="<?php
  echo base_url('public/assets/images/star.png'); ?>" alt=""/></a>
                       <a href="#"><img src="<?php
  echo base_url('public/assets/images/star.png'); ?>" alt=""/></a>
                       <a href="#"><img src="<?php
  echo base_url('public/assets/images/star.png'); ?>" alt=""/></a>
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
    </div> -->
<!--mobile view-->



    </div>
   </div>
  </div>
 </div>
</div>




<script type="text/javascript">

  function suggestionlisting(){
     var key = $("#ng_data").val();
     var keydata = $("#categoryfilter").text();

     // alert(key);return false;

  $.ajax({
        type: "POST",
        url: "<?php
echo base_url() ?>Fitness_equipment/SuggestionList",
        data: "value="+key+"&categories="+keydata,

        success: function(html) { 
              var mydata = JSON.parse(html);

          // console.log('1');

              console.log(mydata);
               $('.Brand li').addClass('displaynone');
              $.each(mydata, function(index){
     
                var vars = [], hash;
    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for(var i = 0; i < hashes.length; i++)
    {
        hash = hashes[i].split('=');
        vars.push(hash[0]);
        vars[hash[0]] = hash[1];
    }     
    console.log(vars[hash[0]]);
    if ( typeof vars[hash[0]] == 'undefined'){


                  // console.log(this.ID);return false;

        $(".Brand").append('<li class="hello'+this.Name+'"><a href="?brand='+this.Name+'"><span class="tab">'+this.Name+'</span></a></li>'); }
        else{
           $(".Brand").append('<li class="hello'+this.Name+'"><a href="<?php
print_r($_SERVER['REQUEST_URI']); ?>&brand='+this.Name+'"><span class="tab">'+this.Name+'</span></a></li>');   
        }
          });             
        },
    });
        return false;

  }
</script>



<script type="text/javascript">

  function suggestion(){
     var key = $("#sg_data").val();

     // alert(key);return false;

     var keydata = $("#categoryfilter").text();

     // alert(keydata);

  $.ajax({
        type: "POST",
        url: "<?php
echo base_url() ?>Fitness_equipment/SuggestionList",
        data: "data="+key,

        success: function(html) { 
              var mydata = JSON.parse(html);
              console.log(mydata);
               $('.Piece li').addClass('displaynone');
              $.each(mydata, function(index){
            var vars = [], hash;
    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for(var i = 0; i < hashes.length; i++)
    {
        hash = hashes[i].split('=');
        vars.push(hash[0]);
        vars[hash[0]] = hash[1];
    }     

    // console.log(vars[hash[0]]);

    if ( typeof vars[hash[0]] == 'undefined'){

      // console.log('hello');
                  // console.log(this.ID);return false;

        $(".Piece").append('<li class="hello'+this.Name+'"><a href="?piece='+this.Name+'"><span class="tab">'+this.Name+'</span></a></li>'); }
        else{

          // console.log('data');

           $(".Piece").append('<li class="hello'+this.Name+'"><a href="<?php
print_r($_SERVER['REQUEST_URI']); ?>&piece='+this.Name+'"><span class="tab">'+this.Name+'</span></a></li>');   
        }
          
          });                
        },
    });
        return false;

  }
</script>





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

         $("#hideThis").click(function(){

          // alert('working');

         $('#showThisPieceFilter').removeClass('displaynone');
         $('#hideThis,#srch-term_aa').addClass('displaynone');
      });
          $("#hideThisbrand").click(function(){
                  $('#showThisbrand').removeClass('displaynone');
                  $('#hideThisbrand').addClass('displaynone');
                });
             $("#Brand_Cust,#PieceProduct_Cust,#Availability_Cust,#CategoryProduct_Cust,#ConditionProduct_Cust,#PriceProduct_Cust,#RatingProduct_Cust").click(function(){
            $('#showThisbrand').addClass('displaynone');
            $('#hideThisbrand').removeClass('displaynone');
        });
                  $("#PieceProduct_Cust,#Brand_Cust,#Availability_Cust,#CategoryProduct_Cust,#ConditionProduct_Cust,#PriceProduct_Cust,#RatingProduct_Cust").click(function(){
            $('#showThisPieceFilter').addClass('displaynone');
            $('#hideThis').removeClass('displaynone');
        });
        $(".mainvalclick").click(function(e){
          e.preventDefault();
          $checked = $(this).attr('id');
          $(this).parents('ul').find('input[type=checkbox]:checked').prop('checked',false);
          $("."+$checked).attr('checked', true); 
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
<script type="text/javascript">
$(document).on('show', '.accordion', function(e) {

    // $('.accordion-heading i').toggleClass(' ');

    $(e.target).prev('.accordion-heading').addClass('accordion-opened');
});

$(document).on('hide', '.accordion', function(e) {
    $(this).find('.accordion-heading').not($(e.target)).removeClass('accordion-opened');

    // $('.accordion-heading i').toggleClass('fa-chevron-right fa-chevron-down');

});
</script>

