<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php if(isset($description)){ echo $description ; } ?>">
    <meta name="keywords" content="<?php if(isset($keywords)){ echo $keywords ; } ?>">
    <link rel="canonical" href="<?php echo base_url('/index.php'); ?>" />
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>
        <?php if(isset($title)){ echo $title ; }else{ echo "Global Fitness"; }  ?>
    </title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/assets/css/style_ii.css'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/assets/css/responsive.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('public/assets/css/reset.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('public/assets/css/style2.css'); ?>">
    <!-- Bootstrap -->
    <link href="<?php echo base_url('public/assets/css/bootstrap.css'); ?>" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
    <!--  <link href="<?php echo base_url('public/assets/css/jquery.bxslider1.css'); ?>" rel="stylesheet"/>
  -->
    <link href="<?php echo base_url('public/assets/css/star-rating.css'); ?>" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=PT+Sans:400,400i" rel="stylesheet">
    <?php include_once "recaptchalib.php";  ?>
    <!-- Libs and Plugins CSS -->
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="<?php echo base_url('public/assets/js/bootstrap.js'); ?>"></script>
    <script>
    $base_url = "http://72.32.47.90";
    </script>
    <script type="text/javascript" src="<?php echo base_url('/public/assets');?>/js/jssor.slider.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js"></script>
    <script>
    jssor_1_slider_init = function() {

        var jssor_1_options = {
            $AutoPlay: false,
            $AutoPlaySteps: 4,
            $SlideDuration: 350,
            $SlideWidth: 220,
            $SlideSpacing: 1,
            $Cols: 5,
            $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$,
                $Steps: 5
            },
            $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$,
                $SpacingX: 1,
                $SpacingY: 1
            }
        };

        var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

        //responsive code begin
        //you can remove responsive code if you don't want the slider scales while window resizing
        function ScaleSlider() {
            var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
            if (refSize) {
                refSize = Math.min(refSize, 980);
                jssor_1_slider.$ScaleWidth(refSize);
            } else {
                window.setTimeout(ScaleSlider, 30);
            }
        }
        ScaleSlider();
        $Jssor$.$AddEvent(window, "load", ScaleSlider);
        $Jssor$.$AddEvent(window, "resize", ScaleSlider);
        $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
        //responsive code end
    };
    </script>
</head>

<body>
    <div class="Navigation_top_bar bg_grey_nav">
        <div class="container">
            <div class="row header">
                <div class="col-md-3 col-sm-3">
                    <a class="web-logo" href="<?php echo base_url(); ?>"><img src="<?php echo base_url('public/assets/images/main_logo.png'); ?>" alt="logo"></a>
                    <a class="logo_Rispons" href="<?php echo base_url(''); ?>"><img src="<?php echo base_url('public/assets/images/logo.png'); ?>"  class="logo_a" alt=""/> </a>
                    <div class="usrr">
                        <a class="logo_Rispons" data-target="#myModal_login" data-toggle="modal" href="#"><img src="<?php echo base_url('public/assets/images/user_top.png'); ?>"  class="logo_a uss" alt=""/> </a>
                    </div>
                    <div class="cart-icon crt">
                        <a href="<?php echo base_url(); ?>" class="logo_Rispons"></a>
                        <a href="<?php echo base_url(); ?>" class="logo_Rispons">
                        </a>
                        <div class="cart_img_penal"><a href="<?php echo base_url('/cart'); ?>" class="logo_Rispons">
            <div class="cart_bag" href="<?php echo base_url(); ?>/cart">
                <img src="<?php echo base_url(); ?>/public/assets/images/cart_icon2.png">
            </div>
            <div class="nin1">
             <?php if(isset($_SESSION['productDetail']['count'])){ echo $_SESSION['productDetail']['count']; }else{ echo "0"; } ?> 
            </div>
             </a>
                        </div>
                    </div>
                    <div class="loginn">
                        <a href="<?php echo base_url(); ?>" class="logo_Rispons"></a>
                        <!--<a href="<?php echo base_url(); ?>" class="logo_Rispons"></a>--></div>
                    </a>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="invet">
                        <nav class="navbar navbar-default container nav_navi" role="navigation">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar icon_1"></span>
                                    <span class="icon-bar icon_2"></span>
                                    <span class="icon-bar icon_3"></span>
                                </button>
                            </div>
                            <div id="navbar" class="collapse navbar-collapse respons_box responsive_nav_penal padd_0">
                                <ul class="nav navbar-nav">
                                    <?php
          foreach($category as $cate){
              $link  = str_replace("-", "*",$cate->Name);
              $link  = str_replace(" ", "-",$link);

              //$link  = rawurlencode($cate->Name) ;
             if($ptype=="0"){
              ?>
                                        <li><a title="<?php echo $cate->LinkTitleTag; ?>" href="<?php echo base_url('/category/index/'.$link); ?>?type=fitness_equipment"><?php echo $cate->MenuName; ?></a></li>
                                        <?php
            }else{
              ?>
                                            <li><a title="<?php echo $cate->LinkTitleTag; ?>" href="<?php echo base_url('/category/index/'.$link); ?>?type=strength_equipment"><?php echo $cate->MenuName; ?></a></li>
                                            <?php
            }
          }
          ?>
                                                <li><a href="<?php echo base_url('/page/About-Global-Fitness'); ?>">About Us</a></li>
                                                <li><a href="/page/Contact-Us">Contact Us</a></li>
                                                <li><a href="#">International Buyers</a></li>
                                                <li><a href="/liveinventory">Live Inventory</a></li>
                                                <li><a href="#">Support</a></li>
                                                <?php if($this->session->userdata('userId')!=""){ ?>
                                                <li><a href="<?php echo base_url('/logout'); ?>">Logout( <?php echo $_SESSION['firstname']." ".$_SESSION['lastname'] ?> )</a></li>
                                                <li><a href="<?php echo base_url('/updatepassword'); ?>"> Update Password </span></a></li>
                                                <?php } ?>
                                                <li>
                                                    <div class="srch">
                                                        <form action="" class="search2-form">
                                                            <div class="form-group has-feedback">
                                                                <label for="search" class="sr-only">Search</label>
                                                                <input type="text" class="form-control mysearch" name="search" id="search" placeholder="search">
                                                                <span class="form-control-feedback" aria-hidden="true"> <img alt="" src="<?php echo base_url(); ?>/public/assets/images/tool.png"></span>
                                                                <div id="display" class="mydisplay"></div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <?php
      // echo "<pre>";
      // print_r($category2);
      // echo "</pre>";
 ?>
                        <div class="top_bar_menu">
                            <ul>
                                <li><a href="<?php echo base_url('/page/About-Global-Fitness'); ?>">About Us</a></li>
                                <li><a href="<?php echo base_url('/page/Contact-Us'); ?>">Contact Us</a></li>
                                <li class="numbr"><a href="">1-888-991-9991</a></li>
                            </ul>
                        </div>
                </div>
                <style>
                /*  #display
  {
    width:250px;
    display:none;
    float:right; margin-right:30px;
    border-left:solid 1px #dedede;
    border-right:solid 1px #dedede;
    border-bottom:solid 1px #dedede;
    overflow:hidden;
  }*/
                /*  .display_box
  {
    padding:4px; border-top:solid 1px #dedede; font-size:12px; height:30px;
  }*/
                
                #display {
                    background: #fff none repeat scroll 0 0 !important;
                    border-bottom: 1px solid #dedede;
                    border-left: 1px solid #dedede;
                    border-right: 1px solid #dedede;
                    display: none;
                    float: right;
                    margin-right: 8px;
                    margin-top: 10px;
                    overflow: hidden;
                    position: relative;
                    width: 98%;
                    z-index: 999;
                }
                
                .display_box {
                    background: #fff none repeat scroll 0 0;
                    border-top: 1px solid #dedede;
                    color: #525252;
                    font-size: 12px;
                    font-weight: 500;
                    min-height: 34px;
                    padding: 9px 11px 0;
                }
                
                #display .form-group:hover,
                #display .form-group.hover {
                    border-radius: 4px 25px 25px 4px;
                    width: 100%;
                }
                
                .display_box:hover {
                    background: #f2f2f2;
                    color: #FFFFFF;
                }
                
                #shade {
                    background-color: #00CCFF;
                }
                
                a:hover,
                a:focus {
                    color: #000;
                    text-decoration: none;
                }
                
                .search-form .form-group:hover,
                .search-form .form-group.hover {
                    border-radius: none;
                    width: 100%;
                }
                
                .form-control:focus {
                    border-color: #66afe9;
                    box-shadow: 0 0px 0px rgba(0, 0, 0, 0.075) inset, 0 0 0px rgba(102, 175, 233, 0.6) !important;
                    outline: 0 none;
                }
                /* HEADER SUB MENU NAIGATION*/
                /* #nav_Login li a{ float:none;}
.menu_Login{list-style: none outside none; margin: 0;padding: 0;}
.menu_Login ul {list-style: none outside none; margin: 0;padding: 0;}
.menu_Login {padding: 10px 0 10px 5px;}*/
                /* top items separator */
                /*.menu_Login > li:after {background-color: #405791; content: "";height: 17px; left: 1px; position: absolute;top: 2px;width: 1px;}
.menu_Login > li:first-child:after {background-color: transparent;}*/
                /* submenu */
                /*.menu_Login ul {border: 1px solid rgb(100, 100, 100);border-radius: 0 0 3px 3px;box-shadow: 0 3px 8px rgba(0, 0, 0, 0.25);display: none; margin-top: 2px;min-width:200px;position: absolute;top: 18px;z-index: 1;}
.menu_Login ul li {background-color: #FFFFFF;}

.menu_Login:hover ul {display: block;}
.menu_Login ul li {display: block !important; padding: 10px; text-align: left;}
.menu_Login ul li a {border-bottom: 1px solid transparent;border-top: 1px solid transparent;color: #232B37;display: block !important;font-size: 12px;line-height: 20px;text-decoration: none;}
.menu_Login ul li a:hover {background-color: none;color: #f00;}*/
                </style>
                <div class="col-md-3 col-sm-3">
                    <div id="search_display">
                        <div class="search_box1">
                            <form class="search-form" action="">
                                <div class="form-group has-feedback">
                                    <label class="sr-only" for="search">Search </label>
                                    <input type="text" placeholder="search" id="search" name="search" class="form-control mysearch">
                                    <span aria-hidden="true" class="form-control-feedback"> <img src="<?php echo base_url('public/assets/images/search_icon_res.png'); ?>" alt=""/></span>
                                    <div id="display" class="mydisplay"></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-sm-3 col-md-3">
    <div class="search">
      <input type="text" class="form-control input-sm" maxlength="64" placeholder="Search" />
      <button type="submit" class="btn btn-primary btn-sm"><img src="<?php echo base_url('public/assets/images/search_icon_res.png'); ?>" alt=""/></button>

      <div id="display"></div>
    </div>
</div> -->
            </div>
        </div>
    </div>
    <div class="navigation_top_bar">
        <div class="container">
            <div class="row header_bottom">
                <div class="col-md-4 col-sm-4">
                    <p class="text">Refurbished Fitness Equipment</p>
                </div>
                <div class="col-md-8 col-sm-8">
                    <div class="top_bar__bottom_menu">
                      <ul class="nav navbar-nav navbar-right">
                        <li><a href="<?php echo base_url(" /liveinventory "); ?>">Live Inventory</a></li>
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                          <?php if($this->session->userdata('userId')!=""){ ?>
                                <a href="<?php echo base_url('/logout'); ?>">Logout( <?php echo $_SESSION['firstname']." ".$_SESSION['lastname'] ?> )</a> <span class="update_pass"><a href="<?php echo base_url('/updatepassword'); ?>">Update Password</a></span>
                                <?php }else{
                ?>
                                <a data-toggle="modal" data-target="#myModal_login" href=""><img src="<?php echo base_url('public/assets/images/usser.png'); ?>"></a>
                                <?php
              } ?>
                          </a>
                          <ul class="dropdown-menu Links_DROPdoWn">
                            <li>
                                <?php if($this->session->userdata('userId')!=""){ ?>
                                <a href="<?php echo base_url('site/orderall'); ?>">My orders</a>
                                <?php } ?>
                            </li>
                            <li><a href="">Support</a></li>
                            <?php if($this->session->userdata('userId')!=""){ ?>
                            <li>

                               <a href="<?php echo base_url('/updatepassword'); ?>">Update Password</a> 
                            </li>
                            <?php } ?>
                          </ul>
                        </li>

           <!--                  <li>
                                <div class="cart-icon">
                                    <a href="<?php// echo base_url('/cart'); ?>">
                                        <div class="cart_img_penal">
                                            <div class="cart_bag">
                                                <img src="<?php// echo base_url('public/assets/images/caarrt.png'); ?>">
                                            </div>
                                            <div class="nin1">
                                                <?php// if(isset($_SESSION['productDetail']['count'])){ echo $_SESSION['productDetail']['count']; }else{ echo "0"; } ?>
                                            </div>
                                    </a>
                                    </div>
                                </div>
                            </li> -->


                      </ul>










                    </div>
                </div>
            </div>
            <div class="row header_bottom2">
                <div class="col-md-12 col-sm-12 padding">
                    <div class="nav_wrapper">
                        <div class="nav_container">
                            <nav>
                                <ul>
                                    <li <?php if($ptype==1) { echo "class='top_two_li'"; } ?> ><a href="<?php echo base_url('/fitness_equipment'); ?>"><?php 
                        if($ptype=="0"){ echo '<b>Cardio</b>'; }else{ echo 'Cardio'; } ?></a>
                                        <?php if($ptype==1) { ?>
                                        <ul class="sub-menu">
                                            <?php 
                            foreach($category2 as $cate2){
                              $link  = str_replace("-", "*",$cate2->Name);
                              $link  = str_replace(" ", "-",$link);
                              //$link  = rawurlencode($cate2->Name) ;
                               ?>
                                            <li class="changeslide"><a title="<?php echo $cate2->LinkTitleTag; ?>" href="<?php echo base_url('/category/index/'.$link); ?>?type=fitness_equipment"><?php echo $cate2->MenuName; ?></a></li>
                                            <?php
                              }  
                            ?>
                                        </ul>
                                        <?php } ?>
                                    </li>
                                    <li <?php if($ptype=="0" ) { echo "class='top_two_li_second'"; } ?> ><a href="<?php echo base_url('/strength_equipment'); ?>"><?php if($ptype==1) { echo '<b>Strength</b>'; }else{ echo 'Strength'; } ?> </a>
                                        <?php if($ptype=="0") { ?>
                                        <ul class="sub-menu">
                                            <?php 
                            foreach($category2 as $cate2){
                              $link  = str_replace("-", "*",$cate2->Name);
                              $link  = str_replace(" ", "-",$link);
                              //$link  = rawurlencode($cate2->Name) ;
                              ?>
                                            <li class="changeslide"><a title="<?php echo $cate2->LinkTitleTag; ?>" href="<?php echo base_url('/category/index/'.$link); ?>?type=strength_equipment"><?php echo $cate2->MenuName; ?></a></li>
                                            <?php
                            } 
                          ?>
                                        </ul>
                                        <?php } ?>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="col-md-9 col-sm-9">
                </div>
            </div>
        </div>
    </div>
    <div class="Navigation_top_bar_bottom">
        <nav class="navbar navbar-default container nav_navi" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar icon_1"></span>
                    <span class="icon-bar icon_2"></span>
                    <span class="icon-bar icon_3"></span>
                </button>
            </div>
            <div id="navbar" class="collapse navbar-collapse respons_box responsive_nav_penal padd_0">
                <div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 1080px; height: 30px; overflow: hidden; visibility: hidden;">
                    <!-- Loading Screen -->
                    <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
                        <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
                        <div style="position:absolute;display:block;background:no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
                        <!--  <div style="position:absolute;display:block;background:url('img/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div> -->
                    </div>
                    <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 1080px; height: 30px; overflow: hidden;">
                        <?php
           
            foreach($category as $cate){
              $link  = str_replace("-", "*",$cate->Name);     
              $link  = str_replace(" ", "-",$cate->Name);     
              //$link  = rawurlencode($cate->Name) ;            
              if($ptype=="0"){
                ?>
                            <div style="display: none;">
                                <a title="<?php echo $cate->LinkTitleTag; ?>" href="<?php echo base_url('/category/index/'.$link); ?>?type=fitness_equipment">
                                    <?php echo $cate->MenuName; ?>
                                </a>
                            </div>
                            <?php
              }else{         
                ?>
                                <div style="display: none;">
                                    <a title="<?php echo $cate->LinkTitleTag; ?>" href="<?php echo base_url('/category/index/'.$link); ?>?type=strength_equipment">
                                        <?php echo $cate->MenuName; ?>
                                    </a>
                                </div>
                                <?php
              }
            }
          ?>
                                    <a data-u="ad" href="http://www.jssor.com" style="display:none">Responsive Slider</a>
                    </div>
                    <span data-u="arrowleft" class="jssora03l" style="top:0px;left:-12px;width:16px;height:26px;" data-autocenter="2"></span>
                    <span data-u="arrowright" class="jssora03r" style="top:0px;right:18px;width:16px;height:26px;" data-autocenter="2"></span>
                </div>
                <ul class="nav navbar-nav navbar-right  dis_res">
                    <?php
            foreach($category as $cate){
              $link  = str_replace("-", "*",$cate->Name);     
              $link  = str_replace(" ", "-",$cate->Name);     
              //$link  = rawurlencode($cate->Name) ;  
             if($ptype=="0"){
              ?>
                        <li class="slide"><a title="<?php echo $cate->LinkTitleTag; ?>" href="<?php echo base_url('/category/index/'.$link); ?>?type=fitness_equipment"><?php echo $cate->MenuName; ?></a></li>
                        <?php
            }else{
              ?>
                            <li class="slide"><a title="<?php echo $cate->LinkTitleTag; ?>" href="<?php echo base_url('/category/index/'.$link); ?>?type=strength_equipment"><?php echo $cate->MenuName; ?></a></li>
                            <?php
            }
            }
          ?>
                                <li>
                                    <div class="srch">
                                        <form action="" class="search2-form">
                                            <div class="form-group has-feedback">
                                                <label for="search" class="sr-only">Search</label>
                                                <input type="text" class="form-control mysearch" name="search" id="search" placeholder="Search Global Fitness">
                                                <span class="form-control-feedback" aria-hidden="true"> <img alt="" src="<?php echo base_url(); ?>/public/assets/images/tool.png"></span>
                                                <div id="display" class="mydisplay"></div>
                                            </div>
                                        </form>
                                    </div>
                                </li>
                </ul>
            </div>
        </nav>
    </div>
