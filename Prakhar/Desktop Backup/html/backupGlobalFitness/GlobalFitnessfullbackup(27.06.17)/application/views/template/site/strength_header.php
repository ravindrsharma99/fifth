<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta name="description" content="<?php if(isset($description)){ echo $description ; } ?>">
  <meta name="keywords" content="<?php if(isset($keywords)){ echo $keywords ; } ?>">

  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title><?php if(isset($title)){ echo $title ; }else{ echo "Global Fitness"; }  ?></title>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/assets/css/style_ii.css'); ?>"/>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/assets/css/responsive.css'); ?>"/>
  <link rel="stylesheet" href="<?php echo base_url('public/assets/css/reset.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('public/assets/css/style2.css'); ?>">
  <!-- Bootstrap -->
  <link href="<?php echo base_url('public/assets/css/bootstrap.css'); ?>" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
  <link href="<?php echo base_url('public/assets/css/jquery.bxslider.css'); ?>" rel="stylesheet"/>
  <!-- Libs and Plugins CSS -->
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<script>
    $base_url = "http://www.de-roquefeuil-labistour.com/index.php";
</script>

</head>
<?php
    // echo "<pre>";
    // print_r($_SESSION);
    // echo "</pre>";
?>
<body>
  <div class="Navigation_top_bar bg_grey_nav">
    <div class="container">
      <div class="row header">
        <div class="col-md-3 col-sm-3">
          <a class="web-logo" href="<?php echo base_url('/index.php'); ?>"><img src="<?php echo base_url('public/assets/images/main_logo.png'); ?>" alt="logo"></a>
          <a class="logo_Rispons" href="<?php echo base_url('/index.php'); ?>"><img src="<?php echo base_url('public/assets/images/logo.png'); ?>"  class="logo_a" alt=""/>

<div class="cart-icon crt">
  <a href="http://www.de-roquefeuil-labistour.com/index.php" class="logo_Rispons"></a><a href="http://www.de-roquefeuil-labistour.com/index.php" class="logo_Rispons">
           </a><div class="cart_img_penal"><a href="http://www.de-roquefeuil-labistour.com/index.php" class="logo_Rispons">
            </a><a class="cart_bag" href="http://www.de-roquefeuil-labistour.com/index.php/site/addtocart">
                <img src="http://www.de-roquefeuil-labistour.com/public/assets/images/cart_icon2.png">
            </a>
            <div class="nin1">
             <?php if(isset($_SESSION['productDetail']['count'])){ echo $_SESSION['productDetail']['count']; }else{ echo "0"; } ?> 
            </div>
             
          </div>    
        </div>

<div class="cart-icon crt usr">
  <a href="http://www.de-roquefeuil-labistour.com/index.php" class="logo_Rispons"></a><a href="http://www.de-roquefeuil-labistour.com/index.php" class="logo_Rispons">
           </a>    
        </div>



          </a>
        </div>
        <div class="col-md-6 col-sm-6">
          <div class="top_bar_menu">
            <ul>
              <li><a href="<?php echo base_url('/index.php/site/page'); ?>/About Global Fitness">About Us</a></li>
              <li><a href="">Financing</a></li>
              <li><a href="">Contact Us</a></li>
              <li class="numbr"><a href="">1-888-991-9991</a></li>
             

            </ul>
          </div>
        </div>
        <div class="col-md-3 col-sm-3">
          <div>
            <div class="search_box1">
              <form class="search-form" action="">
                <div class="form-group has-feedback">
                  <label class="sr-only" for="search">Search</label>
                  <input type="text" placeholder="search" id="search" name="search" class="form-control">
                  <span aria-hidden="true" class="form-control-feedback"> <img src="<?php echo base_url('public/assets/images/search_icon_res.png'); ?>" alt=""/></span>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
     
    </div>
  </div>
  
  
  <div class="navigation_top_bar">   
   <div class="container">
        <div class="row">
          <div class="col-xs-12">
            <div class="invet">
               <nav class="navbar navbar-inverse">

    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="<?php echo base_url('/index.php/site/page'); ?>/About Global Fitness">About Us</a></li>
        <li><a href="#">Financing</a></li>
        <li><a href="#">Contact Us</a></li>
        <li><a href="#">International Buyers</a></li>
        <li><a href="#">Live Inventory</a></li>
        <li><a href="#">Support</a></li>
      </ul>
    </div>

</nav>
          </div>
                    <div class="col-xs-12">
            <div class="cart_img_penal man"><a href="http://www.de-roquefeuil-labistour.com/index.php" class="logo_Rispons">
            </a><!--<a  data-toggle="modal" data-target="#myModal_login" class="cart_bag" href="#">
                <img src="http://www.de-roquefeuil-labistour.com/public/assets/images/usser.png">
            </a>-->
            <?php if($this->session->userdata('userId')!=""){ ?>
              <a href="<?php echo base_url('/index.php/user/logout'); ?>">Logout( <?php echo $_SESSION['firstname']." ".$_SESSION['lastname'] ?> )</a>
              <?php }else{
                ?>                           
               <a data-toggle="modal" data-target="#myModal_login" href=""><img src="<?php echo base_url('public/assets/images/usser.png'); ?>"></a>
              <?php
              } ?>
             
          </div> 
          </div>
          </div><!--row-->

            </div>
          <div class="row header_bottom">
        <div class="col-md-5 col-sm-5"><p class="text">Refurbished Fitness Equipment</p></div>
        <div class="col-md-7 col-sm-7">
          <div class="top_bar__bottom_menu">
            <ul>
              <li><a href="">International Buyers</a></li>
              <li><a href="<?php echo base_url("/index.php/site/liveinventory"); ?>">Live Inventory</a></li>
              <li><a href="">Support</a></li>

               <li>
              <?php if($this->session->userdata('userId')!=""){ ?>
              <a href="<?php echo base_url('/index.php/user/logout'); ?>">Logout( <?php echo $_SESSION['firstname']." ".$_SESSION['lastname'] ?> )</a>
              <?php }else{
                ?>                           
               <a data-toggle="modal" data-target="#myModal_login" href=""><img src="<?php echo base_url('public/assets/images/usser.png'); ?>"></a>
              <?php
              } ?>
              </li>

                <li>
                  <div class="cart-icon">
           <div class="cart_img_penal">
            <a href="<?php echo base_url('/index.php/site/addtocart'); ?>" class="cart_bag">
                <img src="<?php echo base_url('public/assets/images/caarrt.png'); ?>">
            </a>
            <div class="nin1">
              <?php if(isset($_SESSION['productDetail']['count'])){ echo $_SESSION['productDetail']['count']; }else{ echo "0"; } ?> 
            </div>
             
          </div>    
        </div></li>

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

                    <li><a href="<?php echo base_url('/index.php/fitness_equipment'); ?>">Cardio</a>
                          <ul class="sub-menu">
                            <div class="col-md-3 col-sm-3">
                                <div class="list_bgg">
                              <li><h2>Shop by Brand</h2></li>
                              <li><a href="#">Life Fitness</a></li>
                              <li><a href="#">Cybex</a></li>
                              <li><a href="#">Precor</a></li>
                              <li><a href="#">Flex</a></li>
                          
                            
                              </div>
                            </div> 
                           <div class="col-md-3 col-sm-3">
                                <div class="list_bgg">
                               <li><h2>Shop by Brand</h2></li>
                              <li><a href="#">Life Fitness</a></li>
                              <li><a href="#">Cybex</a></li>
                              <li><a href="#">Precor</a></li>
                              <li><a href="#">Flex</a></li>
                            
                              </div>
                            </div> 

                           <div class="col-md-3 col-sm-3">
                                <div class="list_bgg1">
                             
                              <li><a href="#">Life Fitness</a></li>
                              <li><a href="#">Cybex</a></li>
                              <li><a href="#">Precor</a></li>
                              <li><a href="#">Flex</a></li>
                            
                              </div>
                            </div> 

                           <div class="col-md-3 col-sm-3">
                             <div class="list_bgg1">
                              <li><a href="#">Life Fitness</a></li>
                              <li><a href="#">Cybex</a></li>
                              <li><a href="#">Precor</a></li>
                              <li><a href="#">Flex</a></li>
                              </div>
                            </div> 
                          </ul>
                    </li>    
                    <li><a href="<?php echo base_url('/index.php/strength_equipment'); ?>"><b>Strength</b></a>
                        <ul class="sub-menu">
                            <div class="col-md-3 col-sm-3">
                                <div class="list_bgg">
                           
                              <li><h2>Shop by Brand</h2></li>
                              <li><a href="#">Hammer Strength</a></li>
                              <li><a href="#">Life Fitness</a></li>
                              <li><a href="#">Cybex</a></li>
                              <li><a href="#">Precor</a></li>
                              <li><a href="#">Flex</a></li>
                              <li><span class="show">Show Me Everything</span></li>
                        
                              </div>
                             
                            </div> 
                           <div class="col-md-3 col-sm-3">
                                <div class="list_bgg">

                               <li><h2>Shop by Brand</h2></li>
                              <li><a href="#">Cable Crossover</a></li>
                              <li><a href="#">Functional Trainer</a></li>
                              <li><a href="#">Selectorized Circuit</a></li>
                              <li><a href="#">Selectorized Station</a></li>
                               <li><a href="#">Plate Loaded Circuit</a></li>
                            
                              </div>
                            </div> 

                           <div class="col-md-3 col-sm-3">
                                <div class="list_bgg1">
                             <ul>
                              <li><a href="#">Smith Machine</a></li>
                              <li><a href="#">Weight Bench</a></li>
                              <li><a href="#">Multi-Gym & Multi-Stations</a></li>
                              <li><a href="#">Pilates & Yoga</a></li>
                               <li><a href="#">Plate Loaded Equipment</a></li>
                            
                              </div>
                            </div> 

                           <div class="col-md-3 col-sm-3">
                             <div class="list_bgg1">
                              <li><a href="#">Smith Machine</a></li>
                              <li><a href="#">Weight Bench</a></li>
                              <li><a href="#">Multi-Gym & Multi-Stations</a></li>
                              <li><a href="#">Pilates & Yoga</a></li>
                              <li><a href="#">Plate Loaded Equipment</a></li>
                              </div>
                            </div> 
                          </ul>
                    </li>
                           
                  </ul>
                </nav>
            </div>
        </div>



        

        </div>



        <div class="col-md-9 col-sm-9">


  <!--       <div class="cart-icon_Re"><a href=""><img src="<?php echo base_url('public/assets/images/cart_icon_Re.png'); ?>"><div class="nin1">
          <?php if(isset($_SESSION['productDetail']['count'])){ echo $_SESSION['productDetail']['count']; }else{ echo "0"; } ?> 
        </div></a><a href="#" class="cartt_1"> <?php if(isset($_SESSION['productDetail']['count'])){ echo $_SESSION['productDetail']['count']; }else{ echo "0"; } ?> in Cart</a></div> -->


          <!-- <div class="cart-icon_Re"><a href=""><img src="<?php echo base_url('public/assets/images/cart_icon_Re.png'); ?>"></a></div> -->
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
        <ul class="nav navbar-nav navbar-right slider4 dis_web">
          <?php
            foreach($category as $cate){
              ?>
              <li class="slide"><a href="<?php echo base_url('/index.php/category/index/'.$cate->Name); ?>"><?php echo $cate->Name; ?></a></li>
              <?php
            }
          ?>
          <li class="search_res">
            <div class="search_box_res">
              <form>
                <input type="text" placeholder="Search Globle Fitness" value="">
                <!-- <input type="submit" > -->
              </form>
              <a class="respons_src" href=""><img src="<?php echo base_url('public/assets/images/search_icon_res.png'); ?>"></a>
            </div>
          </li>         
        </ul>
      <ul class="nav navbar-nav navbar-right  dis_res">
          <?php
            foreach($category as $cate){
              ?>
              <li class="slide"><a href="#"><?php echo $cate->Name; ?></a></li>


              <?php
            }
          ?>
<li ><div class="srch"><form action="" class="search2-form">
                <div class="form-group has-feedback">
                  <label for="search" class="sr-only">Search</label>
                  <input type="text" class="form-control" name="search" id="search" placeholder="search">
                  <span class="form-control-feedback" aria-hidden="true"> <img alt="" src="http://www.de-roquefeuil-labistour.com/public/assets/images/tool.png"></span>
                </div>
              </form></div></li>
        </ul>


      </div>
    </nav>
  </div>