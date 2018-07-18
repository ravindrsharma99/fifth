<?php
if (isset($strength_equipment)) {
  $strength_equipment = strtolower($strength_equipment);
}
?>
<!--filter_menu_section  -->
<style type="text/css" src="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css"></style>
<style>
.rating{color:#007fff;direction:rtl;display:inline-block;font-size:0;line-height:0;overflow:hidden;position:relative;vertical-align:middle}.rating:after,.rating:before{content:attr(data-star);direction:ltr;font-size:32px;font-size:2rem;font-size-adjust:.6125;line-height:1;pointer-events:none;text-align:left;white-space:nowrap}.rating:before{color:#AAA;color:rgba(0,0,128,.1);display:block;text-shadow:-1px 0 0 rgba(255,255,255,.6),1px 1px 0 rgba(0,0,0,.6)}.rating:after{color:#007fff;overflow:hidden;position:absolute;left:0;top:0;width:0}#example_filter,.displaynone{display:none}.item_selected22{padding:0!important}.activeLI{background:#f0f0f0!important}.item_selected22 li{line-height:30px!important}.HeiGht{max-height:500px!important}.rating[data-rating="33"]:after{width:33%}.rating[data-rating="34"]:after{width:34%}.rating[data-rating="35"]:after{width:35%}.rating[data-rating="36"]:after{width:36%}.rating[data-rating="37"]:after{width:37%}.rating[data-rating="38"]:after{width:38%}.rating[data-rating="39"]:after{width:39%}.rating[data-rating="40"]:after{width:40%}.rating[data-rating="41"]:after{width:41%}.rating[data-rating="42"]:after{width:42%}.rating[data-rating="43"]:after{width:43%}.rating[data-rating="44"]:after{width:44%}.rating[data-rating="45"]:after{width:45%}.rating[data-rating="46"]:after{width:46%}.rating[data-rating="47"]:after{width:47%}.rating[data-rating="48"]:after{width:48%}.rating[data-rating="49"]:after{width:49%}.rating[data-rating="50"]:after{width:50%}.rating[data-rating="51"]:after{width:51%}.rating[data-rating="52"]:after{width:52%}.rating[data-rating="53"]:after{width:53%}.rating[data-rating="54"]:after{width:54%}.rating[data-rating="55"]:after{width:55%}.rating[data-rating="56"]:after{width:56%}.rating[data-rating="57"]:after{width:57%}.rating[data-rating="58"]:after{width:58%}.rating[data-rating="59"]:after{width:59%}.rating[data-rating="60"]:after{width:60%}.rating[data-rating="61"]:after{width:61%}.rating[data-rating="62"]:after{width:62%}.rating[data-rating="63"]:after{width:63%}.rating[data-rating="64"]:after{width:64%}.rating[data-rating="65"]:after{width:65%}.rating[data-rating="66"]:after{width:66%}.rating[data-rating="67"]:after{width:67%}.rating[data-rating="68"]:after{width:68%}.rating[data-rating="69"]:after{width:69%}.rating[data-rating="70"]:after{width:70%}.rating[data-rating="71"]:after{width:71%}.rating[data-rating="72"]:after{width:72%}.rating[data-rating="73"]:after{width:73%}.rating[data-rating="74"]:after{width:74%}.rating[data-rating="75"]:after{width:75%}.rating[data-rating="76"]:after{width:76%}.rating[data-rating="77"]:after{width:77%}.rating[data-rating="78"]:after{width:78%}.rating[data-rating="79"]:after{width:79%}.rating[data-rating="80"]:after{width:80%}.rating[data-rating="81"]:after{width:81%}.rating[data-rating="82"]:after{width:82%}.rating[data-rating="83"]:after{width:83%}.rating[data-rating="84"]:after{width:84%}.rating[data-rating="85"]:after{width:85%}.rating[data-rating="86"]:after{width:86%}.rating[data-rating="87"]:after{width:87%}.rating[data-rating="88"]:after{width:88%}.rating[data-rating="89"]:after{width:89%}.rating[data-rating="90"]:after{width:90%}.rating[data-rating="91"]:after{width:91%}.rating[data-rating="92"]:after{width:92%}.rating[data-rating="93"]:after{width:93%}.rating[data-rating="94"]:after{width:94%}.rating[data-rating="95"]:after{width:95%}.rating[data-rating="96"]:after{width:96%}.rating[data-rating="97"]:after{width:97%}.rating[data-rating="98"]:after{width:98%}.rating[data-rating="99"]:after{width:99%}.rating[data-rating="100"]:after{width:100%}
</style>
<input type="hidden" id="productcounts" value="<?php
echo count($product); ?>">
<input type="hidden" id="categoryname" value="<?php
echo $category_name; ?>">
<div class="navigation_filter_menu_responsive ggnggfs">
<span id ="categoryfilter" class="displaynone"><?php
if (isset($myname)) {
  echo $myname;
}
?></span>
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
                 <a    rel="nofollow"  href="<?php
if ($category_name == 'Selectorized Station') {
  $get = $_GET['brand'];
  echo base_url('') . '/filters/' . $strength_equipment; ?>">Reset</a>
                 }
  else{
echo base_url('') . '/filters/' . $strength_equipment; ?>">Reset</a>
        <?php
} ?>          <!-- <a href="">Reset</a></div> -->
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
if (isset($category_name) && !empty($category_name)) {
  $myname = strtolower($myname);
  $category_name = str_replace(' ', '-', $category_name);
  $category_name = strtolower($category_name); ?>
            <a  rel="nofollow" href="<?php
  echo base_url('') . $myname . '/' . 'filters' . '/' . $category_name; ?>">Reset</a>
            <?php
}
else { ?>

             <a   rel="nofollow" href="<?php
  echo base_url('') . 'filters/' . $myname; ?>">Reset</a>

             <?php
} ?>
            </div>
        <div class="select-style Filter_BUTTn_Reste">
          <?php
if (isset($getcategory)) {
  $link = str_replace(" ", "-", $category_name);
  $link = strtolower($link);
?>
                 <a  rel="nofollow" href="<?php
  echo base_url('/') . $myname . '/' . $link; ?>">Filter</a>
                <?php
}
else {
  if ($strength_equipment == 'brand') {
?>    <a   rel="nofollow" href="<?php
    echo base_url('/brand/' . $categoryname); ?>">Filter</a>
   <?php
  }
  elseif ($ptype == "0") {
?>
                 <a  rel="nofollow"  href="<?php
    echo base_url('/cardio'); ?>">Filter</a>
                <?php
  }
  else {
?>
                 <a   rel="nofollow" href="<?php
    echo base_url('/strength'); ?>">Filter</a>
                <?php
  }
} ?>
        </div>
      </div>
<div class="inner_accordian_arrow">
    <?php
if (isset($_GET)) {
  $url = urldecode($_SERVER['REQUEST_URI']);
  // print_r($url);die();
  $query = explode('&', $_SERVER['QUERY_STRING']);
  $params = array();
  $k = 0;
  foreach($query as $param) {
    list($name, $value) = explode('=', $param, 2);
    $lname = urldecode($name);
    $lval = urldecode($value);
    if (!empty($lval)) {
      $redirectUrl = str_replace($lname . "=" . $lval, "", $url);
      if ($lname != 'type') {
        if (strpos($url, 'selectorized-station') !== false) {
          if ($k == 0) {
?>
     <div class="boxit"><a  rel="nofollow" href="#">
                <?php
            $lname = ucfirst($lname);
            $lval = str_replace('-', ' ', $lval);
            $lval = ucwords($lval);
            print_r($lname . ', ' . $lval);
?>        <span style="font-family: Arial Unicode MS, Lucida Grande">    &#10008;
        </span>
        </a>
     </div><?php
          }
          else {
?>
            <div class="boxit"><a rel="nofollow" href="<?php
            echo base_url();
            print_r($redirectUrl); ?>">
                <?php
            $lname = ucfirst($lname);
            $lval = str_replace('-', ' ', $lval);
            $lval = ucwords($lval);
            print_r($lname . ', ' . $lval);
?>        <span style="font-family: Arial Unicode MS, Lucida Grande">    &#10008;
        </span>
        </a>
     </div> <?php
          }
        }
        else {
?>
            <div class="boxit"><a href="<?php
          echo base_url();
          print_r($redirectUrl); ?>">
                <?php
          $lname = ucfirst($lname);
          $lval = str_replace('-', ' ', $lval);
          $lval = ucwords($lval);
          print_r($lname . ', ' . $lval);
?>        <span style="font-family: Arial Unicode MS, Lucida Grande">    &#10008;
        </span>
        </a>
     </div> <?php
        }
      }
    }
    $k++;
  }
}
?>

   </div>
<div class="container-fluid padding_no">
<?php
if (isset($getcategory)) { ?>
        <dt class="respon">
          <a    rel="nofollow"  class="accordion-title accordionTitle js-accordionTrigger" aria-controls="accordion1" aria-expanded="false" href="#accordion1"><?php
  $category_name = str_replace('-', ' ', $category_name);
  $category_name = ucwords($category_name);
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
<a    rel="nofollow"  href="#product1" aria-expanded="false" aria-controls="product1" class="accordion-title accordionTitle js-accordionTrigger">
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
    <a rel="nofollow"  href="#product2" aria-expanded="false" aria-controls="product2" class="accordion-title accordionTitle js-accordionTrigger">
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
    <a    rel="nofollow"  href="#product3" aria-expanded="false" aria-controls="product3" class="accordion-title accordionTitle js-accordionTrigger">
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
<div class="dasktop mobile_hide">
<div class="row PADD_ThREee">
  <div class="col-md-9 col-sm-9 abil_pad_PPP">
  <div class="row TABLE_PRODUCT_WRAPER">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="table-responsive">
                    <table id="example" class="display table-bordered MAGN" cellspacing="0" width="100%">
                        <style>
                        #example_info {
                            display: none;
                        }
                        </style>
                        <thead style="display: none">
                            <tr>
                                <th>Serial No.</th>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Office</th>
                                <th>Age</th>
                            </tr>
                        </thead>
                        <tbody>
                         <?php
if (count($product) > 0) {
  $i = 0;
  $j = 0;
  foreach($product as $products) {
    $link = str_replace("-", "*", $products->ProductName);
    $link = str_replace(" ", "-", $link);
    $link = strtolower($link);
    $brNdName = str_replace(' ', '-', $products->BrandName);
    $lower = strtolower($brNdName);
    if ($i % 4 == 0) {
      ++$j;
?>

                            <tr>
                            <td style="display: none;">
                          <?php
      echo $j; ?>
                          </td>
                            <?php
    }
?>
                                <td>
<p class="PRO_IMggd">
<?php
    if ($ptype == "0" || $products->Kingdom == 'Cardio') {
?>   <i><a href="<?php
      echo base_url('gym-equipment/filters') . '/selectorized-station?brand=' . $lower; ?>">
        <img alt="<?php
      echo $products->Expr1; ?>" title="<?php
      echo $products->MetaDetailPageTitleTag; ?>"
         src="<?php
      echo base_url() . '/' . $products->ImageURL; ?>" /></a></i>
      <?php
    }
    else {
?><i><a href="<?php
      echo base_url('gym-equipment/filters') . '/selectorized-station?brand=' . $lower; ?>"><img alt="<?php
      echo $products->Expr1; ?>" title="<?php
      echo $products->MetaDetailPageTitleTag; ?>"  src="<?php
      echo base_url() . '/' . $products->ImageURL; ?>" /></a></i>
      <?php
    }
?>

</p>
                      <p class="PRO_TEtille"><?php
    echo '<span style="display:none">' . $i . '</span>';
    print_r($products->Expr1); ?></p>
                      <p class="PRO_REpird"><?php
    if ($products->Price != "Please Enquire") {
      echo "$";
    } ?><?php
    echo trim($products->Price, "$"); ?></p>
                                     <?php
    $id = $products->ListID;
    $rate = $this->Site_model->getrating($id);
    $add = '';
    foreach($rate as $rates) {
      $add+= $rates->star_rate;
    }
    $divide = count($rate);
    $hello = 0;
    if ($divide < 1) {
      $divide = 1;
    }
    else {
      $avg_rate = $add / $divide;
      $hello = floor($avg_rate * 20);
    }
?>
                                    <p class="PRO_stock">Available to ship:<?php
    if ($products->QuantityOnHand <= 0) {
?><span class="outstock">Out of Stock</span><?php
    }
    else if (($products->QuantityOnHand > 0) && ($products->QuantityOnHand < 3)) {
      echo "< 3";
    }
    else {
?>
                      <span class="inerstock">In Stock</span>
                    <?php
    } ?></p>
                                    <p>
  <span class="rating" data-rating="<?php
    echo $hello; ?>" data-star="★★★★★"></span>

</p>
                                </td>
                                   <?php
    ++$i;
    if ($i % 4 == 0) { ?>
                            </tr>
                            <?php
    } ?>
                            <?php
  }
}
else {
  echo "<h4 style='color:red'>No Result Found.</h4>";
} ?>


                        </tbody>
                    </table>
                </div>
            </div>
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
                            <a    rel="nofollow"  role="button" data-toggle="collapse" data-parent="#accordion" href="#Availability" aria-expanded="true" aria-controls="Availability">
                                <i class="more-less glyphicon glyphicon-plus"></i>Availability</a>
                        </h4>
                </div>
                <div id="Availability" class="panel-collapse collapse" role="tabpanel" aria-labelledby="Availability_Cust">
                    <div class="panel-body">
                        <ul class="filter_view_laTEST_nav Availability">
                                                      <?php
if (isset($_GET) && !empty($_GET)) { ?>
                                                        <li>
                                                        <a    rel="nofollow"  href="<?php
  print_r($_SERVER['REQUEST_URI']); ?>&availability=<?php
  echo 'in-stock'; ?>">
                                                        <?php
  echo "In Stock"; ?>
                                                        </a>
                                                        </li>
                                                        <?php
}
else { ?>
                                                        <li>
                                                        <a    rel="nofollow"  href="?availability=<?php
  echo 'in-stock'; ?>">
                                                        <?php
  echo "In Stock"; ?>
                                                                  </a>
                                                              </li>
                                                              <?php
} ?>
                                                  </ul>
                                              </div>
                                          </div>
            </div>
            <div class="panel panel-default FILETR_SIDER">
                <div class="panel-heading" role="tab" id="Brand_Cust">
                    <h4 class="panel-title">
                            <a    rel="nofollow"  class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#Brand" aria-expanded="false" aria-controls="Brand">
                                <i class="more-less glyphicon glyphicon-plus"></i>Brand</a>
                        </h4>
                </div>
                <div class="input-group Filter_PP_SERCH_cont displaynone" id="showThisbrand">
                    <div class="ICON_SRCh"><i class="glyphicon glyphicon-search"></i></div>
                    <input type="text" onkeyup="working();" class="form-control" placeholder="Search Brand" name="srch-term" id="ng_data">
                </div>
                <div id="Brand" class="panel-collapse collapse" role="tabpanel" aria-labelledby="Brand_Cust">
                    <div class="panel-body">
                        <ul class="filter_view_laTEST_nav Brand">
                            <?php
$k = 0;
foreach($brand as $amp) {
  $k++;
  if ($strength_equipment == 'category') {
    if (isset($_GET) && !empty($_GET)) {
?>
                                <li class=' <?php
      if ($k > 10) {
        echo "displaynone";
      } ?>'><a    rel="nofollow"  href="<?php
      print_r($_SERVER['REQUEST_URI']); ?>&brand=<?php
      $name = str_replace(" ", "-", $amp->BrandName);
      $name = strtolower($name);
      echo $name; ?>"><?php
      echo $amp->BrandName; ?></a></li>
                                <?php
    }
    else {
?>
                                    <li class='<?php
      if ($k > 10) {
        echo "displaynone";
      } ?>'><a    rel="nofollow"  href="?brand=<?php
      $name = str_replace(" ", "-", $amp->BrandName);
      $name = strtolower($name);
      echo $name; ?>"><?php
      echo $amp->BrandName; ?></a></li>
                                    <?php
    }
  }
  if (isset($_GET) && !empty($_GET) && $strength_equipment != 'category') {
?>
                                        <li class=' <?php
    if ($k > 10) {
      echo "displaynone";
    } ?>'><a    rel="nofollow"  href="<?php
    print_r($_SERVER['REQUEST_URI']); ?>&brand=<?php
    $name = str_replace(" ", "-", $amp->Name);
    $name = strtolower($name);
    echo $amp->Name; ?>"><?php
    echo $amp->Name; ?></a></li>
                                        <?php
  }
  else {
?>
                                            <li class=' <?php
    if ($k > 10) {
      echo "displaynone";
    } ?>'><a    rel="nofollow"  href="?brand=<?php
    $name = str_replace(" ", "-", $amp->Name);
    $name = strtolower($name);
    echo $name; ?>"><?php
    echo $amp->Name;
?></a></li>
                <?php
  }
}
?>
                <?php
if (count($brand) > 9) {
?>
                      <a    rel="nofollow"  href="#" id="hidethisbrand">
                          <div class="input-group Filter_PP_SERCH_cont" id="helloSix">
                              <div class="ICON_SRCh"><i class="glyphicon glyphicon-search"></i></div>
                              <input type="text" class="form-control"  placeholder="Search Brand" name="srch-term" id="srch-term_aa">
                          </div>
                      </a>
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
                            <a    rel="nofollow"  class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#CategoryProduct" aria-expanded="false" aria-controls="CategoryProduct">
                                <i class="more-less glyphicon glyphicon-plus"></i>Category</a>
                        </h4>
                </div>
                <div id="CategoryProduct" class="panel-collapse collapse" role="tabpanel" aria-labelledby="CategoryProduct_Cust">
                    <div class="panel-body">
                        <ul class="filter_view_laTEST_nav Category">
                            <?php
$k = 0;
foreach($mmcategory as $br) {
  $k++;
?>
                                <li class=' <?php
  if ($k > 10) {
    echo "displaynone";
  } ?>'><a    rel="nofollow"  href="?category=<?php
  $name = str_replace(" ", "-", $br->Name);
  $name = strtolower($name);
  echo $name; ?>"><?php
  echo $br->Name; ?></a></li>
                                <?php
}
?>
                                    <?php
if (count($mmcategory) > 9) {
?>
    <li class="showmore">
        <a    rel="nofollow"  href="#" class="clickmore" data-val="more" style='color: #337ab7 !important;'>More Categories </a>
    </li>
    <li class="showless displaynone">
        <a    rel="nofollow"  href="#" data-val="less" class="clickmore" style='color: #337ab7 !important;'>Less Categories </a>
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
                            <a    rel="nofollow" class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#ConditionProduct" aria-expanded="false" aria-controls="ConditionProduct">
                                <i class="more-less glyphicon glyphicon-plus"></i>Condition</a>
                        </h4>
                </div>
                <div id="ConditionProduct" class="panel-collapse collapse" role="tabpanel" aria-labelledby="ConditionProduct_Cust">
                    <div class="panel-body">
                        <ul class="filter_view_laTEST_nav Condition">
                            <?php
foreach($condition as $cr) {
  if (isset($_GET) && !empty($_GET)) {
?>
                                <li> <a    rel="nofollow"  id="condition<?php
    echo $cr->Name; ?>" href="<?php
    print_r($_SERVER['REQUEST_URI']); ?>&condition=<?php
    $name = str_replace(" ", "-", $cr->Name);
    $name = strtolower($name);
    echo $name; ?>"><?php
    echo $cr->Name; ?></a></li>
                                <?php
  }
  else { ?>
                                    <li> <a    rel="nofollow" id="condition<?php
    echo $cr->Name; ?>" href="?condition=<?php
    $name = str_replace(" ", "-", $cr->Name);
    $name = strtolower($name);
    echo $name; ?>"><?php
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
                <a    rel="nofollow"  class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#PieceProduct" aria-expanded="false" aria-controls="PieceProduct">
                    <i class="more-less glyphicon glyphicon-plus"></i>Piece</a>
            </h4>
    </div>
    <div class="input-group Filter_PP_SERCH_cont displaynone" id="showThisPieceFilter">
        <div class="ICON_SRCh"><i class="glyphicon glyphicon-search"></i></div>
        <input type="text" onkeyup="suggestion();" class="form-control" placeholder="Search Piece" name="srch-term" id="sg_data">
    </div>
    <div id="PieceProduct" class="panel-collapse collapse" role="tabpanel" aria-labelledby="PieceProduct_Cust">
        <div class="panel-body">
                        <ul class="filter_view_laTEST_nav Piece">
                            <?php
$ppp = 0;
foreach($piece as $amp) {
  $ppp++;
?>
                                <li class='<?php
  if ($ppp > 10) {
    echo "displaynone";
  } ?>'>
                                    <?php
  if ($strength_equipment == 'category') {
    if (isset($_GET) && !empty($_GET)) {
?>
                                        <a    rel="nofollow" class=" " id="piece<?php
      echo $amp->ID; ?>" href="<?php
      print_r($_SERVER['REQUEST_URI']); ?>&piece=<?php
      $name = str_replace(" ", "-", $amp->Piece);
      $name = strtolower($name);
      echo $name; ?>"><?php
      echo $amp->Piece; ?></a></li>
                                <?php
    }
    else { ?>
                                    <a    rel="nofollow" class=" " id="piece<?php
      echo $amp->ID; ?>" href="?piece=<?php
      $name = str_replace(" ", "-", $amp->Piece);
      $name = strtolower($name);
      echo $name; ?>"><?php
      echo $amp->Piece; ?></a></li>
                                    <?php
    }
  }
  else {
    if (isset($_GET) && !empty($_GET)) {
?>
                                        <a    rel="nofollow" class=" " id="piece<?php
      echo $amp->ID; ?>" href="<?php
      print_r($_SERVER['REQUEST_URI']); ?>&piece=<?php
      $name = str_replace(" ", "-", $amp->Piece);
      $name = strtolower($name);
      echo $name; ?>"><?php
      echo $amp->Name; ?></a></li>
                                        <?php
    }
    else { ?>
                                            <a    rel="nofollow" class=" " id="piece<?php
      echo $amp->ID; ?>" href="?piece=<?php
      $name = str_replace(" ", "-", $amp->Name);
      $name = strtolower($name);
      echo $name; ?>"><?php
      echo $amp->Name; ?></a></li>
                                            <?php
    }
  }
}
?>
                                                <?php
if (count($piece) > 9) {
?>
              <a    rel="nofollow"  href="#" id="hidethis">
                  <div class="input-group Filter_PP_SERCH_cont" id="hideThis">
                      <div class="ICON_SRCh"><i class="glyphicon glyphicon-search"></i></div>
                      <input type="text" class="form-control" placeholder="Search Piece" name="srch-term" id="srch-term_aa">
                  </div>
              </a>
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
                            <a    rel="nofollow" class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#PriceProduct" aria-expanded="false" aria-controls="PriceProduct">
                                <i class="more-less glyphicon glyphicon-plus"></i>Price</a>
                        </h4>
                </div>
                <div id="PriceProduct" class="panel-collapse collapse" role="tabpanel" aria-labelledby="PriceProduct_Cust">
                    <div class="panel-body">
                        <ul class="filter_view_laTEST_nav Price">
                            <?php
if (isset($_GET) && !empty($_GET)) {
?>
                                <li>
                                    <a   rel="nofollow"  href="<?php
  print_r($_SERVER['REQUEST_URI']); ?>&price=<?php
  echo 'ascending'; ?>">
                                        <?php
  echo 'Ascending'; ?>
                                    </a>
                                </li>
                                <?php
}
else { ?>
                                    <li>
                                        <a    rel="nofollow"  href="?price=<?php
  echo 'ascending'; ?>">
                                            <?php
  echo 'Ascending'; ?>
                                        </a>
                                    </li>
                                    <?php
}
if (isset($_GET) && !empty($_GET)) { ?>
                                        <li>
                                            <a    rel="nofollow"  href="<?php
  print_r($_SERVER['REQUEST_URI']); ?>&price=<?php
  echo 'descending'; ?>">
                                                <?php
  echo 'Descending'; ?>
                                            </a>
                                        </li>
                                        <?php
}
else { ?>
                                            <li>
                                                <a    rel="nofollow"  href="?price=<?php
  echo 'descending'; ?>">
                                                    <?php
  echo 'Descending'; ?>
                                                </a>
                                            </li>
                                            <?php
} ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="panel panel-default FILETR_SIDER">
                <div class="panel-heading" role="tab" id="RatingProduct_Cust">
                    <h4 class="panel-title">
                            <a    rel="nofollow"  class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#RatingProduct" aria-expanded="false" aria-controls="RatingProduct">
                                <i class="more-less glyphicon glyphicon-plus"></i>Rating</a>
                        </h4>
                </div>
                <div id="RatingProduct" class="panel-collapse collapse" role="tabpanel" aria-labelledby="RatingProduct_Cust">
                    <div class="panel-body">
                        <ul class="filter_view_laTEST_nav Rating">
                            <?php
if (isset($_GET) && !empty($_GET)) {
?>
                          <li>
                          <a    rel="nofollow"  href="<?php
  print_r($_SERVER['REQUEST_URI']); ?>&rating=<?php
  echo 'ascending'; ?>">
                          <?php
  echo 'Ascending'; ?>
                          </a>
                          </li>
                          <?php
}
else { ?>
                          <li>
                          <a    rel="nofollow"  href="?rating=<?php
  echo 'ascending'; ?>">
                          <?php
  echo 'Ascending'; ?>
                          </a>
                          </li>
                          <?php
} ?>
                                        <?php
if (isset($_GET) && !empty($_GET)) { ?>
                                            <li>
                                            <a    rel="nofollow"  href="<?php
  print_r($_SERVER['REQUEST_URI']); ?>&rating=<?php
  echo 'descending'; ?>">
                                            <?php
  echo 'Descending'; ?>
                                            </a>
                                            </li>
                                            <?php
}
else { ?>
                                            <li>
                                            <a    rel="nofollow"  href="?rating=<?php
  echo 'descending'; ?>">
                                            <?php
  echo 'Descending'; ?>
                                            </a>
                                            </li>
                                            <?php
} ?>
                                          </ul>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <!-- panel-group -->
                      </div>
                  </div>
<!-- filter_view_like_apple -->

<!-- </div> -->
      </div>
    </div>
  </div>
    <div class="container-fluid ">
        <div class="row PADD_ThREee TABLE_PRODUCT_WRAPER  TABLE_MOBileVIEw_CLASS">
            <div class="col-md-12 col-sm-12 col-xs-12 MMMMSD">
                <div class="table-responsive">
                    <table id="example1" class="display table-bordered MAGN" cellspacing="0" width="100%">
                        <style>

                        #example1_info {
                            display: none;
                        }
                        </style>
                        <thead style="display: none">
                            <tr>
                                <th>Name</th>
                                <th>Position</th>
                            </tr>
                        </thead>
                           <tbody>
                          <?php
if (count($product) > 0) {
  $i = 0;
  foreach($product as $products) {
    $link = str_replace("-", "*", $products->ProductName);
    $link = str_replace(" ", "-", $link);
    $link = strtolower($link);
    if ($i % 2 == 0) {
?>
                            <tr>
                            <?php
    }
?>
                                <td>
                                    <p class="PRO_IMggd">
                                          <?php
    if ($ptype == "0" || $products->Kingdom == 'Cardio') {
?>   <i><a    rel="nofollow"  href="<?php
      echo base_url('cardio') . '/' . $link; ?>">
                                                  <img alt="<?php
      echo $products->ProductName; ?>" title="<?php
      echo $products->MetaDetailPageTitleTag; ?>"
                                                   src="<?php
      echo base_url() . '/' . $products->ImageURL; ?>" /></a></i>
                                                <?php
    }
    else {
?><i><a    rel="nofollow" href="<?php
      echo base_url('strength') . '/' . $link; ?>"><img alt="<?php
      echo $products->ProductName; ?>" title="<?php
      echo $products->MetaDetailPageTitleTag; ?>"  src="<?php
      echo base_url() . '/' . $products->ImageURL; ?>" /></a></i>
                                                <?php
    }
?>

                                    </p>
                                    <p class="PRO_TEtille"><?php
    print_r($products->ProductName); ?></p>
                                    <p class="PRO_REpird"><?php
    if ($products->Price != "Please Enquire") {
      echo "$";
    } ?><?php
    echo trim($products->Price, "$"); ?>
                                    </p>
                                        <?php
    $id = $products->ListID;
    $rate = $this->Site_model->getrating($id);
    // print_r($rates); die;
    $add = '';
    foreach($rate as $rates) {
      $add+= $rates->star_rate;
    }
    $divide = count($rate);
    if ($divide < 1) {
      $divide = 1;
    }
    else {
      $avg_rate = $add / $divide;
    }
?>
                                                                      <p class="PRO_stock">Available to ship:<?php
    if ($products->QuantityOnHand <= 0) {
?><span class="outstock">Out of Stock</span><?php
    }
    else if (($products->QuantityOnHand > 0) && ($products->QuantityOnHand < 3)) {
      echo "< 3";
    }
    else {
?>
                                                        <span class="inerstock">In Stock</span>
                                                      <?php
    } ?></p>
                                    <p class="STArre"> <div class="star-rating rating-xs rating-disabled">
                                        <div class="rating-container rating-gly-star" data-content="">
                                        <div class="rating-stars" data-content="" style="width: 0%;">
                                          <input id="input-21b" class="rating" data-min="0" data-max="5" data-step="1"
                                          value='<?php
    echo $avg_rate; ?>' data-disabled="true" data-size="xs" data-show-clear="false" data-show-caption="false" ></p>
                                                                      </td>
                               <?php
                                  ++$i;
                                  if ($i % 2 == 0) { ?>
                              </tr>
                              <?php
                              } ?>
                              <?php
                                }
                              }
                              else {
                                echo "<h4 style='color:red'>No Result Found.</h4>";
                              } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
 </div>
</div>


<script type="text/javascript">
    $('#helloSix').click(function(){
      $('#showThisbrand').removeClass('displaynone');
      $('#helloSix').addClass('displaynone');
});
  function suggestion(){
     var key = $("#sg_data").val();
     var keydata = $("#categoryfilter").text();

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

      var helloVar =   this.Name.replace(' ', '-');
    if ( typeof vars[hash[0]] == 'undefined'){


        $(".Piece").append('<li class="hello'+this.Name+'"><a    rel="nofollow"  href="?piece='+hellaVar.toLowerCase()+'"><span class="tab">'+this.Name+'</span></a></li>'); }
        else{
           $(".Piece").append('<li class="hello'+this.Name+'"><a    rel="nofollow"  href="<?php
print_r($_SERVER['REQUEST_URI']); ?>&piece='+hellaVar.toLowerCase()+'"><span class="tab">'+this.Name+'</span></a></li>');
        }

          });
        },
    });
        return false;

  }

</script>

<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">

$(document).ready(function() {
    var dataTable = $('#example').dataTable({
        iDisplayLength: 10,
        sPaginationType: "full_numbers",
        "language": {
    "lengthMenu": 'Display <select>'+
      '<option value="10">10</option>'+
      '<option value="20">20</option>'+
      '<option value="30">30</option>'+
      '<option value="40">40</option>'+
      '<option value="50">50</option>'+
      '<option value="-1">All</option>'+
      '</select> Rows'
  }
    });
    function paginateScroll() {
        $('html, body').animate({
           scrollTop: $(".container-fluid").offset().top
        }, 10);
        console.log('pagination button clicked');
        $(".paginate_button").unbind('click', paginateScroll);
        $(".paginate_button").bind('click', paginateScroll);
    }
    paginateScroll();
});
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
    $(e.target).prev('.accordion-heading').addClass('accordion-opened');
});

$(document).on('hide', '.accordion', function(e) {
    $(this).find('.accordion-heading').not($(e.target)).removeClass('accordion-opened');

});
</script>