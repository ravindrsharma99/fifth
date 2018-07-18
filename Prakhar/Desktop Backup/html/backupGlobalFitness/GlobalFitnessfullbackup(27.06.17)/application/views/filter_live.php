            <style>
            .footer_outer {display: none; }
              .displaynone {display: none; }
            /*#fdw-sidebar {width: 310px; background: #f6f6f6; position: absolute; right: 20px; top: 5px; bottom: 0; border: 0; padding-left: 5px; }
            #fdw-sidebar .fixed {position: fixed; top: 1px; }*/

            </style>
            <input type="hidden" id="getcount" value="<?php echo count($lproduct) ; ?>">
            <!--filter_menu_section  -->
            <div class="navigation_filter_menu_responsive padd-no_live">
            <div class="container padd-no_live">
            <div class="col-md-12 co-sm-12 col-xs-12 filter_menu_nav_respon padd-no_live">
                        <!--       <div class="select-style" data-toggle="modal" data-target="#myModal">
            <?php if(isset($getcategory)){ 
            $link  = str_replace(" ", "-",$category_name);
            if($ptype=="0"){ 
            ?>
            <a href="<?php echo base_url('/category/filter/'.$link); ?>?type=fitness_equipment">Filter</a>
            <?php
            }
            else{
            ?>
            <a href="<?php echo base_url('/category/filter/'.$link); ?>?type=strength_equipment">Filter</a>
            <?php
            }
            }else{
            if($ptype=="0"){ 
            ?>
            <a href="<?php echo base_url('/fitness_equipment/filter'); ?>">Filter</a>
            <?php
            }
            else{
            ?>
            <a href="<?php echo base_url('/strength_equipment/filter'); ?>">Filter</a>
            <?php
            }     
            } ?>

            </div> -->
            </div>
            <div class="col-md-6 col-xs-6 filter_menu_nav_respon_right">
            <div class="short">
            <!--    <p><span>Sort by</span>Brand</p> -->
            </div>
            </div>
            </div>
            </div>

            <div class="container-fluid">
            <div class="row PADD_ThREee">

    <?php 
    if(isset($_GET)){
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
           $lname = ucfirst($lname);
                $lval = str_replace('-', ' ', $lval);
                $lval = ucwords($lval);
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
</div>





    <!-- mobile_filter -->
    <section class="MOBILE_VIEW_NEW_Filter">
      <div class="container-fluid">
          <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                  <div class="filter_mOB">
                      <div class="filter_button_model" data-toggle="modal" href="#myModal">
                        <img class="filter_img_icon_mo" src="<?php echo base_url(); ?>/public/assets/images/ic_notification.png"> Filter 
                      </div>
                  </div>

              </div>
          </div>
      </div>
    </section>
    <!-- mobile_filter -->

        <!--filter_menu_section  -->
            <section class="web_view">
            <div class="container-fluid">
            <div class="row PADD_ThREee">
            <div class="col-md-12 col-sm-12 bordr">
            <div class="col-md-6 col-sm-6">
              <div class="col-md-12 col-sm-12">
        <div class="inventory">
          <h4>Live Inventory</h4>
        </div>
        <a href="<?php echo base_url('/site/mylist');?>" title="View and Download your custom list">
          <div class="cart">  
            <div class="nin2 webcountvalue">
              <div class="mylistLink"><?php if(isset($_SESSION['mylistproduct']['count'])){ echo $_SESSION['mylistproduct']['count']; }else{ echo "0"; } ?></div>
            </div><!--end of nine-->        
          </div>
        </a>

        <a href="<?php echo base_url('/site/mylist');?>" title="View and Download your custom list"><div class="my_list">
             <h4>My List</h4>
          </div></a>
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
            <div class="col-md-3 col-md-offset-3 col-sm-6 Reset_Buttopn_filter">
            <!--<form>
            <div class="col-md-9 col-sm-9">
            <div class="col-md-3 col-sm-3 padding">
            <div class="search">
            <p>Search:</p>
            </div>
            </div>
            <div class="col-md-9 col-sm-9 padding">
            <div class="box">
            <div class="form-group">
            <input type="text" class="form-control" id="usr">
            </div>
            </div>
            </div>
            </div>

            </form>-->
            <!-- <div class="reset_button"><a href='<?php //echo base_url('liveinventory'); ?>'>Reset</a></div> -->
            <div class="reset_button">
            <a href="<?php echo base_url('live-inventory/filter'); ?>">Reset</a>
            </div>
            <div class="filter_top pull-right mrGN filter_top_two_page">
            <a rel="nofollow" href="<?php echo base_url('live-inventory'); ?>">
            <input type="button" value="Filter">
            </a>
            </div>
            </div>
            <!--end of colm-->
            <div class="clear"></div>
            </div>
            <!--end colm-->
            </div>
            <!--end of row-->
            </div>
            <!--end of container-->
            <div class="container-fluid">
            <div class="row PADD_ThREee">
            <div class="col-md-9 col-sm-9 padding">
            <div class="glob">
            <div class="feedproduct table-responsive">
            <table id="scollableTable" class="scrollID" width="100%" class="table">
            <thead>
            <tr class="tb_hdr">
            <TH width="44" class="blank"> </TH>
            <TH width="480" class="min_first">ProductName</TH>
            <TH width="71" class="min">MPN</TH>
            <TH width="84" class="min">Piece</TH>
            <TH width="108" class="min">QuantityOnHand</TH>
            <TH width="141" class="min">Price</TH>
            </tr>
            </thead>
            <tbody>
            <?php
            if(count($lproduct)>0){
            foreach($lproduct as $live){
            ?>
            <tr class="countTr">
            <td class="blank">
            <?php
            if( in_array($live->ProductName , $_SESSION['mylistproduct']['listname']) )
                              {
            ?>
            <img class="likeImage" src="<?php echo base_url('public/assets/images/check_img.png'); ?>" data-status="1" data-name="<?php  echo $live->ProductName;  ?>" data-src="<?php echo base_url('public/assets/images/plush_cart.png'); ?>">
            <?php
            }
            else{
            ?>
            <img class="likeImage" data-src="<?php echo base_url('public/assets/images/check_img.png'); ?>" data-status="0" data-name="<?php  echo $live->ProductName;  ?>" src="<?php echo base_url('public/assets/images/plush_cart.png'); ?>">
            <?php
            }
            ?>
            <!--       <img class="likeImage" data-src="<?php // echo base_url('public/assets/images/check_img.png'); ?>" data-status="0" data-name="<?php  // echo $live->ProductName;  ?>"
            src="<?php  // echo base_url('public/assets/images/plush_cart.png'); ?>">-->
            </td>
            <td class="min_first">
            <?php echo $live->ProductName; ?>
            </td>
            <td class="mina">
            <?php echo $live->MPN; ?>
            </td>
            <td class="mina">
            <?php echo $live->Piece ; ?>
            </td>
            <td class="mina">
            <?php
            if($live->QuantityOnHand<=0){
            ?><span class="outstock">Out of Stock</span>
            <?php
            }
            else if(($live->QuantityOnHand>0) && ($live->QuantityOnHand<3)){
            ?><span class="lowstock">Low Stock</span> <?php
            }else{
            ?>
            <span class="inerstock">In Stock</span>
            <?php 
            } ?>
            </td>
            <td class="mina">
            <table>
            <tr>
            <td class="price">
            <?php if($live->Price!="Please Enquire"){
             echo $live->Price;
                  }
                  else{
                        echo "Please Enquire";
                  } ?>
            <?php //echo trim($live->Price,'$'); ?>
            </td>
            <td>
            <?php
            if($live->QuantityOnHand<=0){
            if($live->countwish==0){                  
            ?>
            <div class="outr">
            <input type="button" <?php if($this->session->userdata('userId')==""){ echo 'data-toggle="modal" data-target="#myModal_login"'; }else{ echo 'class="clickwishlist"'; } ?> data-val="
            <?php echo $live->ProductName; ?>" value="Wait List Me"></div>
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
            <img id="load_img" src="<?php echo base_url("/public/assets/images/global_loader.gif "); ?>">
            <?php  }  ?>
            </div>
            </div>
            <!--end of glob-->
            </div>
            <!--end col12-->
            <!--             <div class="col-md-3 col-sm-3 ability abil_pad web_Filter_old">
            <div class="accordin_penal_b">
            <div class="accordion cust_acc">
            <dl>
            <div class="top_brder11">
            <dt>
            <a href="#product5" aria-expanded="false" aria-controls="product3" class="accordion-title accordionTitle js-accordionTrigger">
            Availability<div class="arrw"><span class="bar top"></span><span class="bar bottom"></span></div>
            </a>
            </dt>
            <dd class="accordion-content accordionItem is-collapsed" id="product5" aria-hidden="true">
            <div class="accordian_inner_con">
            <div class="panl_list">
            <ul>
            <li>
            <a href="?Availability=<?php echo  'In Stock'; ?>">
            <?php echo  "In Stock"; ?>
            </a>
            </li>
            </ul>
            </div>
            </div>
            </dd>
            </div>
            <div class="top_brder11">
            <dt>
            <a href="#product3" aria-expanded="false" aria-controls="product3" class="accordion-title accordionTitle js-accordionTrigger">
            Brand<div class="arrw"><span class="bar top"></span><span class="bar bottom"></span></div>
            </a>
            </dt>
            <dd class="accordion-content accordionItem is-collapsed" id="product3" aria-hidden="true">
            <div class="accordian_inner_con">
            <div class="panl_list">
            <ul>
            <?php foreach($brand as $amp){
            ?>
            <li><a href="?brand=<?php echo  $amp->Name; ?>"><?php echo  $amp->Name; ?></a></li>
            <?php } ?>
            </ul>
            </div>
            </div>
            </dd>
            </div>
            <?php //if ($check_filter != '' ) {

            //} else { ?>
            <div class="top_brder11">
            <dt>
            <a href="#product2" aria-expanded="false" aria-controls="product2" class="accordion-title accordionTitle js-accordionTrigger">
            Category<div class="arrw"><span class="bar top"></span><span class="bar bottom"></span></div></a>
            </dt>
            <dd class="accordion-content accordionItem is-collapsed" id="product2" aria-hidden="true">
            <div class="accordian_inner_con">
            <div class="panl_list">
            <ul>
            <?php
            foreach($mmcategory as $br){
            ?>
            <li><a href="?category=<?php echo $br->Name ; ?>"><?php echo $br->Name ; ?></a></li>
            <?php
            }
            ?>
            </ul>
            </div>
            </div>
            </dd>
            </div>
            <?php //} ?>
            <div class="top_brder11">
            <dt class="respon">
            <a href="#product1" aria-expanded="false" aria-controls="product1" class="accordion-title accordionTitle js-accordionTrigger">
            Condition<div class="arrw"><span class="bar top"></span><span class="bar bottom"></span></div></a>
            </dt>
            <dd class="accordion-content accordionItem is-collapsed" id="product1" aria-hidden="true">
            <div class="accordian_inner_con">
            <div class="panl_list">
            <ul>
            <?php
            foreach($condition as $cr){
            ?>
            <li><a href="?condition=<?php echo $cr->Name ; ?>"><?php echo $cr->Name ; ?></a></li>
            <?php
            }
            ?>
            </ul>
            </div>
            </div>
            </dd>
            </div>
            <div class="top_brder11">
            <dt>
            <a href="#product3" aria-expanded="false" aria-controls="product3" class="accordion-title accordionTitle js-accordionTrigger">
            Piece<div class="arrw"><span class="bar top"></span><span class="bar bottom"></span></div>
            </a>
            </dt>
            <dd class="accordion-content accordionItem is-collapsed" id="product3" aria-hidden="true">
            <div class="accordian_inner_con">
            <div class="panl_list">
            <ul>
            <?php foreach($piece as $amp){
            ?>
            <li><a href="?piece=<?php echo  $amp->Name; ?>"><?php echo  $amp->Name; ?></a></li>
            <?php } ?>
            </ul>
            </div>
            </div>
            </dd>
            </div>
            <div class="top_brder11">
            <dt>
            <a href="#product3" aria-expanded="false" aria-controls="product3" class="accordion-title accordionTitle js-accordionTrigger">
            Price<div class="arrw"><span class="bar top"></span><span class="bar bottom"></span></div>
            </a>
            </dt>
            <dd class="accordion-content accordionItem is-collapsed" id="product3" aria-hidden="true">
            <div class="accordian_inner_con">
            <div class="panl_list">
            <ul>
            <li>
            <a href="?Price=<?php echo  'ascending'; ?>">
            <?php echo 'Ascending'; ?>
            </a>
            </li>
            <li>
            <a href="?Price=<?php echo  'descending'; ?>">
            <?php echo  'Descending'; ?>
            </a>
            </li>
            </ul>
            </div>
            </div>
            </dd>
            </div>
            <div class="top_brder11">
            <dt>
            <a href="#product3" aria-expanded="false" aria-controls="product3" class="accordion-title accordionTitle js-accordionTrigger">
            Rating<div class="arrw"><span class="bar top"></span><span class="bar bottom"></span></div>
            </a>
            </dt>
            <dd class="accordion-content accordionItem is-collapsed" id="product3" aria-hidden="true">
            <div class="accordian_inner_con">
            <div class="panl_list">
            <ul>
            <li>
            <a href="?Rating=<?php echo  'ascending'; ?>">
            <?php echo 'Ascending'; ?>
            </a>
            </li>
            <li>
            <a href="?Rating=<?php echo  'descending'; ?>">
            <?php echo  'Descending'; ?>
            </a>
            </li>
            </ul>
            </div>
            </div>
            </dd>
            </div>
            </dl>
            </div>
            </div>
            </div> -->


            <!-- filter_view_like_apple -->

            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
            <div id="fdw-sidebar">
            <div id="filter_view_laTEST sidebar sub-sidebar" class="">
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
                        <?php if(isset($_GET)  && !empty($_GET)){ ?>
            <li> 
              <a href="<?php print_r($_SERVER['REQUEST_URI']); ?>&Availability=<?php echo  'in-stock'; ?>">
            <?php echo  "In Stock"; ?>
            </a>
            </li>
            <?php
          } 
            else{ ?>
             <li>   <a href="?Availability=<?php echo  'in-stock'; ?>">
            <?php echo  "In Stock"; ?>
             </a></li>
            <?php } ?>
                
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
                                <input type="text" onkeyup="suggestionlisting();" class="form-control" placeholder="Search Brand" name="srch-term" id="g_data">
                              </div>


            <div id="Brand" class="panel-collapse collapse" role="tabpanel" aria-labelledby="Brand_Cust">
            <div class="panel-body">
            <ul class="filter_view_laTEST_nav Brand">
            <?php
            $k= 0;
             foreach($brand as $amp){
                $k++;
                  if(isset($_GET) && !empty($_GET)){
                        ?>
            <li class=' <?php if($k>10){ echo "displaynone";} ?>'><a href="<?php print_r($_SERVER['REQUEST_URI']); ?>&brand=<?php 

                $name  = str_replace(" ", "-",$amp->Name);
                $name1 = strtolower($name);
                echo $name1;
             ?>"><?php echo  $amp->Name; ?></a></li>             
                          <?php
                  } else{
            ?>

            <li class=' <?php if($k>10){ echo "displaynone";} ?>'><a href="?brand=<?php  
               $name  = str_replace(" ", "-",$amp->Name);
                $name1 = strtolower($name);
                echo $name1; ?>"><?php echo  $amp->Name; ?></a></li>
            <?php }


      } ?>
             <?php 
                  if(count($brand)>9){
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
            foreach($mmcategory as $br){
                $k++;
            ?>
            <li class=' <?php if($k>10){ echo "displaynone";} ?>'><a href="?category=<?php 

                $name  = str_replace(" ", "-",$br->Name);
                $name1 = strtolower($name);
               
                echo $name1 ; ?>"><?php echo $br->Name ; ?></a></li>
            <?php
            }
            ?>
            <?php 
                  if(count($mmcategory)>9){
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
            foreach($condition as $cr){
            if(isset($_GET)  && !empty($_GET)){ 
                  
                  ?>
            <li> <a id="condition<?php echo  $cr->Name; ?>" href="<?php print_r($_SERVER['REQUEST_URI']); ?>&condition=<?php 
                     $name  = str_replace(" ", "-",$cr->Name);
                $name1 = strtolower($name);
                echo $name1;


             ?>"><?php echo   $cr->Name; ?></a></li>
                <?php } else{ ?>      

                   <li> <a id="condition<?php echo  $cr->Name; ?>" href="?condition=<?php
                            $name  = str_replace(" ", "-",$cr->Name);
                $name1 = strtolower($name);
                echo $name1;

                    ?>"><?php echo   $cr->Name; ?></a></li>
            <?php } 
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
            <div class="input-group Filter_PP_SERCH_cont displaynone" id="showThis"><div class="ICON_SRCh"><i class="glyphicon glyphicon-search"></i></div>
                                <input type="text" onkeyup="suggestiondata();" class="form-control" placeholder="Search Piece" name="srch-term" id="ng_data">
                              </div>
            <div id="PieceProduct" class="panel-collapse collapse" role="tabpanel" aria-labelledby="PieceProduct_Cust">
            <div class="panel-body">
            <ul class="filter_view_laTEST_nav Piece">
            <?php 
            $k= 0;
             foreach($piece as $amp){
                $k++;
                  if(isset($_GET) && !empty($_GET)){
                        ?>
            <li class=' <?php if($k>10){ echo "displaynone";} ?>'><a href="<?php print_r($_SERVER['REQUEST_URI']); ?>&piece=<?php 
                        $name  = str_replace(" ", "-",$amp->Name);
                $name1 = strtolower($name);
                echo $name1;
                 ?>"><?php echo  $amp->Name; ?></a></li>             
                          <?php
                  } else{
            ?>

            <li class=' <?php if($k>10){ echo "displaynone";} ?>'><a href="?piece=<?php
                        $name  = str_replace(" ", "-",$amp->Name);
                $name1 = strtolower($name);
                echo $name1;


             ?>"><?php echo  $amp->Name; ?></a></li>
            <?php }


      } ?>


            <?php 
            if(count($piece)>9){
            ?>
                <a href="#" id ="hidethis"><div class="input-group Filter_PP_SERCH_cont" id="hideThis"><div class="ICON_SRCh"><i class="glyphicon glyphicon-search"></i></div>
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
            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#PriceProduct" aria-expanded="false" aria-controls="PriceProduct">
            <i class="more-less glyphicon glyphicon-plus"></i>Price</a>
            </h4>
            </div>
            <div id="PriceProduct" class="panel-collapse collapse" role="tabpanel" aria-labelledby="PriceProduct_Cust">
            <div class="panel-body">
            <ul class="filter_view_laTEST_nav Price">

            <?php if(isset($_GET) && !empty($_GET)){ 
                 
                  ?>
            <li><a href="<?php print_r($_SERVER['REQUEST_URI']); ?>&Price=<?php echo  'ascending'; ?>"><?php echo 'Ascending'; ?></a></li>
            <?php }else{?>
             <li><a href="?Price=<?php echo  'ascending'; ?>"><?php echo 'Ascending'; ?></a></li> 
             <?php } if(isset($_GET) && !empty($_GET)){ ?>     
            <li><a href="<?php print_r($_SERVER['REQUEST_URI']); ?>&Price=<?php echo  'descending'; ?>"><?php echo  'Descending'; ?></a></li>  
            <?php }else{ ?>   
              <li><a href="?Price=<?php echo  'descending'; ?>"><?php echo  'Descending'; ?></a></li>
              <?php } ?> 
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
              <?php  if(isset($_GET) && !empty($_GET)){ ?>   
            <li><a href="<?php print_r($_SERVER['REQUEST_URI']); ?>&Rating=<?php echo  'ascending'; ?>"><?php echo 'Ascending'; ?></a></li>
            <?php } else{ ?>
            <li><a href="?Rating=<?php echo  'ascending'; ?>"><?php echo  'Ascending'; ?></a></li>  
            <?php } ?>
               <?php  if(isset($_GET) && !empty($_GET)){ ?>   
            <li><a href="<?php print_r($_SERVER['REQUEST_URI']); ?>&Rating=<?php echo  'descending'; ?>"><?php echo 'Descending'; ?></a></li>
            <?php } else{ ?>
            <li><a href="?Rating=<?php echo  'descending'; ?>"><?php echo  'Descending'; ?></a></li>  
            <?php } ?>
            </ul>
            </div>
            </div>
            </div>
            </div><!-- panel-group -->
            </div>
            </div>
            </div>
            <!-- filter_view_like_apple -->

            </div>
            <!--end of row-->
            </div>
            </section>
            <section class="mob_view">
            <div class="container mob_view">
            <div class="col-md-6 col-sm-6 col-xs-12 bordr1">
            <div class="col-md-6 col-sm-6 col-xs-8">
            <div class="inventory">
            <h4>Live Inventory</h4>
            </div>
            <!--end of inventory-->
            </div>
            <!--end of colm8-->
            <div class="col-md-6 col-sm-6 col-xs-4">
            <div class="col-md-3 col-sm-3 padding">
            <div class="cart">
            <div class="nin mobilecountvalue">
            <a class="mylistLink" href="<?php echo base_url('/site/mylist');?>">
            <?php if(isset($_SESSION['mylistproduct']['count'])){ echo $_SESSION['mylistproduct']['count']; }else{ echo "0"; } ?>
            </a>
            </div>
            <!--end of nine-->
            </div>
            </div>
            <!--inr-->
            <div class="col-md-6 col-sm-6 padding">
            <div class="my_list">
            <h4>My List</h4>
            </div>
            <!--end of my-->
            </div>
            <!--inr-->
            </div>
            <!--end of colm-->
            </div>
            <!--end of colm-->
            </div>
            <!--end of container-->
            </section>
            <div class="container mob_view">
            <div class="bodr">
            <div class="accordin_penal_b">
            <div class="accorrdd feedproduct">
            <div class="panel-group scrollID" id="accordion">
            <?php
            $jack = 0;
            if(count($lproduct)>0){
            foreach($lproduct as $live){
            $jack++;
            ?>
            <div class="panel panel-default dashd liveENVTRY">
            <div class="panel-heading">
            <h4 class="panel-title">
            <i class="indicator glyphicon glyphicon-chevron-up margn pull-left"></i>
            <a class="accordion-toggle Accccccc" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $jack; ?>">
            <?php echo $live->ProductName; ?>
            </a>
            <span class="stock "><?php
            if($live->QuantityOnHand<=0){
            ?>
            <span class="outstock">Out of Stock</span><?php
            }
            else if(($live->QuantityOnHand>0) && ($live->QuantityOnHand<3)){
            ?><span class="lowstock">Low Stock</span> <?php
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
            <h5><?php echo $live->ProductName; ?></h5>
            </div>
            <!--end of small-->
            </div>
            <div class="col-md-5 col-sm-5 col-md-offset-1">
            <div class="col-md-12 col-sm-12">
            <div class="product_penal_content">
            <div class="product_penal_shiping2">
            <?php 
            if($live->MPN!=""){
            ?>
            <div class="product_penal_shiping_left">MPN:</div>
            <div class="product_penal_shiping_right">
            <?php echo $live->MPN; ?>
            </div>
            <?php } 
            if($live->Piece!=""){ ?>
            <div class="product_penal_shiping_left">Piece:</div>
            <div class="product_penal_shiping_right">
            <?php echo $live->Piece ; ?>
            </div>
            <?php } 
            if($live->QuantityOnHand!=""){ ?>
            <div class="product_penal_shiping_left">QuantityOnHand</div>
            <div class="product_penal_shiping_right">
            <?php
            if($live->QuantityOnHand<=0){
            ?><span class="outstock">Out of Stock</span>
            <?php
            }
            else if(($live->QuantityOnHand>0) && ($live->QuantityOnHand<3)){
            echo "<span class='lowstock'>Low Stock</span>";
            }else{
            ?>
            <span class="inerstock">In Stock</span>
            <?php 
            } ?>
            </div>
            <?php } 

            if($live->Price!=""){ ?>
            <div class="product_penal_shiping_left">Price</div>
            <div class="product_penal_shiping_right">
            <?php if($live->Price!="Please Enquire"){ echo "$";} ?>
            <?php echo trim($live->Price,'$'); ?>
            </div>
            <?php } ?>
            </div>
            <div class="product_penal__question">
            <div class="col-xs-6 padd">
            <div class="question_heding">
            <div class="requu">
            <!-- <img src="<?php echo base_url(); ?>/public/assets/images/plush_cart.png">-->
            <?php
            if( in_array($live->ProductName , $_SESSION['mylistproduct']['listname']) )
            {
            ?>
            <img class="likeImage" src="<?php echo base_url('public/assets/images/check_img.png'); ?>" data-status="1" data-name="<?php  echo $live->ProductName;  ?>" data-src="<?php echo base_url('public/assets/images/plush_cart.png'); ?>">
            <?php
            }
            else
            {
            ?>
            <img class="likeImage" data-src="<?php echo base_url('public/assets/images/check_img.png'); ?>" data-status="0" data-name="<?php  echo $live->ProductName;  ?>" src="<?php echo base_url('public/assets/images/plush_cart.png'); ?>">
            <?php
            }
            ?>
            </div>
            <!--end of requu-->
            </div>
            </div>
            <div class="col-xs-6 padd">
            <div class="filter_top">
            <?php
            if($live->QuantityOnHand<=0){
            if($live->countwish==0){                  
            ?>
            <div class="outr">
            <input type="button" <?php if($this->session->userdata('userId')==""){ echo 'data-toggle="modal" data-target="#myModal_login"'; }else{ echo 'class="clickwishlist"'; } ?> data-val="
            <?php echo $live->ProductName; ?>" value="Wait List Me"></div>
            <?php
            }
            }else{
            ?>
            <div class="filter">
            <input type="button" value="Add to cart">
            </div>
            <?php 
            } ?>
            </div>
            <!--end filter-->
            <!--HAVE-->
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
            <?php 
             }
            }
            ?>
            <?php  if(count($lproduct)>24){ ?>
            <div class="text_align"><img id="load_img" src="<?php echo base_url(" /public/assets/images/global_loader.gif "); ?>"></div>
            <?php } ?>
            </div>
            </div>
            </div>
            </div>
            </div>
            <script type="text/javascript">
  function suggestion_live(){
     var key = $("#ng_data").val();
  $.ajax({
        type: "POST",
        url: "<?php echo base_url() ?>Fitness_equipment/suggestion_live",
        data: "data="+key,

        success: function(html) { 
               $('.Brand li').addClass('displaynone');
              var mydata = JSON.parse(html);
              $.each(mydata, function(index){
        $(".Piece").append('<li class="hello'+this.ID+'"><a href="'<?php echo base_url('live-inventory/filter') ?>'?brand='+this.Name.toLowerCase()+'"><span class="tab">'+this.Name+'</span></a></li>'); 
          
          });             
        },
    });
        return false;
  }
</script>
<script type="text/javascript">

  function suggestionlisting(){
     var key = $("#g_data").val();
     // alert(key);return false;
  $.ajax({
        type: "POST",
        url: "<?php echo base_url() ?>Site/suggestion_live",
        data: "value="+key,

        success: function(html) { 
              var mydata = JSON.parse(html);
            // console.log('asd');return false;
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

      // var helloVar =   this.Name.replace(' ', '-');
      var helloVar =   this.Name;
    helloVar = helloVar.replace(/\s+/g, '-');
    if ( typeof vars[hash[0]] == 'undefined'){

                  // console.log(this.ID);return false;
        $(".Brand").append('<li class="hello'+this.ID+'"><a href="?brand='+helloVar.toLowerCase()+'"><span class="tab">'+this.Name+'</span></a></li>'); }
        else{
           $(".Brand").append('<li class="hello'+this.ID+'"><a href="<?php print_r($_SERVER['REQUEST_URI']); ?>&brand='+helloVar.toLowerCase()+'"><span class="tab">'+this.Name+'</span></a></li>');   
        }
          
          });             
        },
    });
        return false;

  }
</script>
<script type="text/javascript">

  function suggestiondata(){
     var key = $("#ng_data").val();
     // alert(key);return false;
  $.ajax({
        type: "POST",
        url: "<?php echo base_url() ?>Site/suggestion_live",
        data: "data="+key,
        success: function(html) { 
    var mydata = JSON.parse(html);         
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
    console.log(vars[hash[0]]);
    var helloVar =   this.Name;
    helloVar = helloVar.replace(/\s+/g, '-');;
    // str = str.replace(/\s/g, '');
if ( typeof vars[hash[0]] == 'undefined'){

      // console.log(this.ID);return false;
$(".Piece").append('<li class="hello'+this.ID+'"><a href="?piece='+helloVar.toLowerCase()+'"><span class="tab">'+this.Name+'</span></a></li>'); }
    else{
       $(".Piece").append('<li class="hello'+this.ID+'"><a href="<?php print_r($_SERVER['REQUEST_URI']); ?>&piece='+helloVar.toLowerCase()+'"><span class="tab">'+this.Name+'</span></a></li>');   
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
            $('#accordion').on('shown.bs.collapse', toggleChevron);
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
            //$('.accordion-heading i').toggleClass(' ');
            $(e.target).prev('.accordion-heading').addClass('accordion-opened');
            });

            $(document).on('hide', '.accordion', function(e) {
            $(this).find('.accordion-heading').not($(e.target)).removeClass('accordion-opened');
            //$('.accordion-heading i').toggleClass('fa-chevron-right fa-chevron-down');
            });
            </script>
                   <script type="text/javascript">
            $(document).ready(
            function()
            {
                      $("#Brand_Cust,#PieceProduct_Cust,#Availability_Cust,#CategoryProduct_Cust,#ConditionProduct_Cust,#PriceProduct_Cust,#RatingProduct_Cust").click(function(){
            $('#showThisbrand').addClass('displaynone');
            $(this).css({'background-color' : '', 'font-weight' : ''});
            $('#hideThisbrand').removeClass('displaynone');
        });
                  $("#PieceProduct_Cust,#Brand_Cust,#Availability_Cust,#CategoryProduct_Cust,#ConditionProduct_Cust,#PriceProduct_Cust,#RatingProduct_Cust").click(function(){
            $('#showThis').addClass('displaynone');
            $('#hideThis').removeClass('displaynone');
        });
                  $("#hideThis").click(function(){
                  $('#showThis').removeClass('displaynone');
                  $('#hideThis').addClass('displaynone');

                  });
                     $("#hideThisbrand").click(function(){
                  $('#showThisbrand').removeClass('displaynone');
                  $('#hideThisbrand').addClass('displaynone');

                  });
            $(".clickmore").click(function(e){
            e.preventDefault();
            $val = $(this).data('val');
            // alert('yes');
            // return false;
            if($val=="more"){
            $(this).parents('ul').find('li.displaynone').removeClass('displaynone').addClass('checkedok');
            $(this).parents('ul').find('li.showmore').addClass('displaynone');
            $(this).parents('ul').find('li.showless').removeClass('displaynone');
            }
            else{
            $(this).parents('ul').find('li.checkedok').removeClass('checkedok').addClass('displaynone');
            //    $(this).parent('li').addClass('footer_outer');
            $(this).parents('ul').find('li.showless').addClass('displaynone');
            $(this).parents('ul').find('li.showmore').removeClass('displaynone');
            }               
            }); 
            }
            );
            </script>


