    <?php 

if(isset($_SESSION['user']) || isset($_SESSION['phone']) && isset($_SESSION['image']) && isset($_SESSION['email']) || isset($_SESSION['fb_log'])){

  //$nname = $_SESSION['fb_log'];
    $name = $_SESSION['user'];
    $phone = $_SESSION['phone'];

    redirect(base_url('Booking/history'));
}else{
  //header("Refresh: 0; url=http://phphosting.osvin.net/prakhar/kdmain/index.php");
    // redirect(base_url());
}

// if(isset($_SESSION['fb_log'])){
//     $nname = $_SESSION['fb_log'];
// }else{
//   redirect(base_url());
// }
if(isset($_SESSION['googlename'])){
    $name = $_SESSION['googlename'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kudos</title>
    <link rel="shortcut icon" href="<?php echo base_url();?>assests/images/favicon_icon.png">
    <link href="assests/css/bootstrap.min.css" rel="stylesheet">
    <link href="assests/css/custom.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <meta name="google-signin-client_id" content="300285074932-lgh1inrokfhbbvtour3536rp875hji0d.apps.googleusercontent.com">
    </head>


<body>
   
    <script>
        function onSignIn(googleUser) {
        //var id_token = googleUser.getAuthResponse().id_token;
      var profile = googleUser.getBasicProfile();
      console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
      console.log('Name: ' + profile.getName());
      console.log('Image URL: ' + profile.getImageUrl());
      console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
      $.ajax({
                method:'POST',
                url:'<?php echo base_url(); ?>Booking/google_login',
                data: {
                    user_id: profile.getId(),
                    name: profile.getName(),
                    picture: profile.getImageUrl(),
                    email: profile.getEmail()
                },
                success:function(html){
                    if(html != 2){
                       $btn = '<div style="font-size: 18px;color: red;">Please Click Sign Up Button For Registration </p> <a data-toggle="modal" href="#Sign_model" style="padding:17%;">Sign Up</a></div>';
                        $dsply = $.parseJSON(html);
                        // $fname = $dsply.key;
                        $google_id = $dsply.key;
                        $fname = $dsply.key1;
                        $image = $dsply.key2;
                        $email = $dsply.key3;
                        
                        
                        $('#fnamee').val($fname);
                        // $('#lnamee').val($lname);
                        $('#emailll').val($email);
                        $('#fbb_id').val($google_id);
                        $('#imagee').val($image);
                        $('#show_msg').html($btn);
                    }else if(html == 2){
                        window.location.href = '<?php echo base_url(); ?>Booking/book_order';
                    }else{
                        return false;                        
                        
                    }
                }
            });
        }
    </script>
    <script>

      function statusChangeCallback(response) {
        console.log('statusChangeCallback');
        console.log(response);
        if (response.status === 'connected') {
          testAPI();
        } else {
          document.getElementById('status').innerHTML = 'Please log ' +
            'into this app.';
        }
      }
      

      function checkLoginState() {
        FB.getLoginStatus(function(response) {
          //statusChangeCallback(response);
          testAPI();
        });
      }

      window.fbAsyncInit = function() {
      FB.init({
       appId      : '1901662360049464',
        cookie     : true,  
                           
        xfbml      : true,  
        version    : 'v2.8' 
      });

     
      // LoginStatus(function(response) {
      //   statusChangeCallback(response);
      //   //testAPI();
      // });

      };

        (function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=true&cookie=true&version=v2.8&appId=1901662360049464";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));

      function testAPI() {
        console.log('Welcome!  Fetching your information.... ');
        // FB.api('/me', function(response) {
        //   console.log('Successful login for: ' + response.name);
        FB.api('/me', { locale: 'tr_TR', fields: 'id,first_name,middle_name,last_name,email,picture' },
          function(response) {
             //console.log(response.data.url);
            //console.log(str);
            //console.log(response.id);
            //console.log(response.email);
            // console.log(response.first_name);
            // console.log(response.middle_name);
            // console.log(response.last_name);
            //console.log(response.phone);
            //console.log(response.gender);
            //console.log(response.picture.data.url);
            //picture?width=180&height=180
        //   }
        // );

          // document.getElementById('status').innerHTML =
          //   'Thanks for logging in, ' + response.first_name + response.middle_name + response.last_name +response.id + response.email + '';
            var first_name = response.first_name;
            var middle_name = response.middle_name;
            var last_name = response.last_name;
            var id = response.id;
            var email = response.email;
            // var gender = response.gender;
            var picture = response.picture.data.url;
            //alert(id);
            $.ajax({
                method:'POST',
                url:'<?php echo base_url(); ?>Booking/fb',
                data:'name='+first_name+'&mname='+middle_name+'&lname='+last_name+"&user_id="+id+'&email='+email+'&picture='+picture,
                success:function(html){
                   //console.log(html);
                    if(html != 2){
                        //alert(html);return false;
                        $btn = '<div style="font-size: 18px;color: red;">Please Click Sign Up Button For Registration </p> <a data-toggle="modal" href="#Sign_model" style="padding:17%;">Sign Up</a></div>';
                        $dsply = $.parseJSON(html);
                        $fname = $dsply.key;
                        $lname = $dsply.key1;
                        $email = $dsply.key2;
                        $fb_id = $dsply.key3;
                        $image = $dsply.key4;
                        $('#fnamee').val($fname);
                        $('#lnamee').val($lname);
                        $('#emailll').val($email);
                        $('#fbb_id').val($fb_id);
                        $('#imagee').val($image);
                        $('#show_msg').html($btn);
                    }else if(html == 2){
                        window.location.href = '<?php echo base_url(); ?>Booking/book_order';
                    }else{
                        return false;                        
                        
                    }
                }
            });
              
        });
      }
    </script>



    <div class="container">
        <header>
            <div class="row">
                <div class="col-md-col-4 col-sm-4">
                    <div class="logo">
                        <a href="http://www.kudosfinder.com/"><img src="assests/images/logo.png"></a>
                    </div>
                </div>
                <div class="col-md-col-8 col-sm-8">
                    <span id="show_msg"></span>
                    <!--                     <div class="login">
                        <ul>
                            <li><a href="#">Register</a></li>
                            <li><a href="#">Login</a></li>
                        </ul>
                    </div> -->
                    <?php 
                        if ($this->session->flashdata('msg')) { ?>
                            <div><h4 style="color:red;"><?php echo $this->session->flashdata('msg') ?></h4></div>
                    <?php } ?>
                    <?php 
                        if ($this->session->flashdata('email_err')) { ?>
                            <div><h3><?php echo $this->session->flashdata('email_err') ?></h3></div>
                    <?php } ?> 
                    <span id="spn4"><h3></h3></span>
                    <div class="joinus_penal"><p>Become a Service Provider<a href="http://kudosfind.com/Admin/ServiceProviders/"> <button class="btn btn_join">Join Us </button></a></p></div>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right">
                             <li class="dropdown">
                                <a href="http://www.jquery2dotnet.com" class="dropdown-toggle" data-toggle="dropdown">Customer Sign up <b class="caret"></b></a>
                                <ul class="dropdown-menu" style="padding: 15px;min-width: 250px;" >
                                    <li>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <span id="spn"></span>
                                                <form class="form" role="form" method="post" action="<?php echo base_url(); ?>index.php/Booking/insertt" accept-charset="UTF-8" id="login-nav" >
                                                    <div class="form-group">
                                                        <label class="sr-only" for="exampleInputfirstname2">First Name</label>
                                                        <input type="text" name="fname" class="form-control" id="fname" placeholder="FIRST NAME" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="sr-only" for="exampleInputlastname2">Last Name</label>
                                                        <input type="text" name="lname" class="form-control" id="lname" placeholder="LAST NAME" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="sr-only" for="exampleInputEmail2">Email address</label>
                                                        <input type="email" name="email" onkeyup="return validateEmail(Email)"  class="form-control" id="email" placeholder="EMAIL" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="sr-only" for="exampleInputPassword2">Password</label>
                                                        <input type="password" name="password" class="form-control" id="pass" placeholder="PASSWORD" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="sr-only" for="exampleInputcPassword2">Confirm Password</label>
                                                        <input type="password" name="cpassword" class="form-control" id="cpass" placeholder="CONFIRM PASSWORD" required>
                                                    </div>
                                                    <span id="spn1" style="color:red;"></span>
                                                    <div class="form-group">
                                                        <label class="sr-only" for="exampleInputphone2">Phone Number</label>
                                                         <input class="Phone_NO_Code" type="text"  value="+65" id="extra7" name="phone_code" readonly="readonly" placeholder="Code" />

                                                        <input class="Phone_Number" type="text" class="form-control" value="" id="extra7" maxlength="8" name="phone" onkeypress="return isNumber(event)" placeholder="PHONE NUMBER" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="sr-only" for="exampleInputphone2">Refer Code</label>
                                                        <input type="text" name="add_referCode" class="form-control" id="refer" placeholder="Refer Code">
                                                    </div>
                                                    <div class="form-group">
                                                        <button type="submit" id="sign" name="signin" class="create_account">Create Account</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            <li class="dropdown">
                                <a href="" class="dropdown-toggle" data-toggle="dropdown">Customer Sign in <b class="caret"></b></a>
                                <ul class="dropdown-menu" style="padding: 15px;min-width: 250px;">
                                    <li>
                                        <div class="row">
                                            <div class="col-md-12">

                                                <form class="form" role="form" method="post" action="" accept-charset="UTF-8" id="login-nav">
                                                    <div class="form-group">
                                                        <label class="sr-only" for="exampleInputEmail2">Email address</label>
                                                        <input type="email" name="email" class="form-control" id="exampleInputEmail2" placeholder="Email address" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="sr-only" for="exampleInputPassword2">Password</label>
                                                        <input type="password" name="password" class="form-control" id="exampleInputPassword2" placeholder="Password" required>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" name="remember"><span>Remember me</span>
                                                           
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <button type="submit" name="submit" class="create_account">Sign in</button>
                                                    </div>
                                                </form>

                                                    <a class="" data-toggle="modal" href="#myModal">Forgot Password?</a>

                                            </div>
                                        </div>
                                    </li>
                                        <li class="FIFTY">
                                           <!--  <div class="new_facebookbutton">
                                                <span><i class="fa fa-facebook" aria-hidden="true"></i></span>
                                                <input type="submit" class="form-control FACEbook_new" value="facebook" onclick ="checkLoginState();">
                                            </div> -->
                                            <div class="fb-login-button" data-max-rows="1" data-size="small" data-button-type="continue_with" data-show-faces="false" onlogin="checkLoginState()" data-auto-logout-link="false" data-use-continue-as="false"></div>
                                            <!-- <div class="FACEbook">
                                                <fb:login-button scope="public_profile,email" autologoutlink="true"name="fbbtn" onlogin="checkLoginState();">
                                                </fb:login-button>
                                            </div> -->
                                        </li>

                                        <li class="FIFTY">
                                            <!-- <div class="new_googleplushbutton">
                                                <span><i class="fa fa-google-plus" aria-hidden="true"></i></span>
                                                <input type="submit" class="form-control google_plush" value="Google">
                                            </div> -->
<!-- 
                                            <div class="gooGEL_PLuSh">
                                                <div class="g-signin2" data-onsuccess="onSignIn"></div>
                                            </div> -->
                                        </li>
                                    

                                </ul>
                            </li>
                        </ul>


                    </div>
                </div>
            </div>
        </header>
    </div>

    <section class="banner">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="kudos_heading">
                        <h1><span><?php if(isset($arr->title) && !empty($arr->title)){
                            $mydetails = $arr->title;
                                $add = explode(" ",$mydetails);
                                // print_r($add);die();
                                print_r($add[0]);
                                echo "</span>";
                                print_r(" ".$add[1]);
                                echo "</h1>"  ;  
                                       // print_r($add);die();
                            }else{ echo "Kudos </span>find</h1>";}

                           if(isset($arr->TitleDesciption) && !empty($arr->TitleDesciption)){
                            echo "<p>";
                            print_r($arr->TitleDesciption);
                            echo "</p>";
                            }?>
                        <a href="https://play.google.com/store?hl=en"><img src="assests/images/google_play.png" alt="#"></a>
                        <a href="https://itunes.apple.com/in/genre/ios/id36?mt=8" class="padding_left"><img src="<?php echo base_url(); ?>assests/images/google_app.png" alt="#"></a>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="iphone"><img src="<?php echo base_url(); ?>assests/images/iphone.png"></div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3 animated bounceInLeft  wow animated animated animated" style="visibility: visible;">
                    <div class="credit_repair">
                        <div class="setting"><img src="<?php echo base_url(); ?>assests/images/phn.png"></div>
                        <h3><?php if(isset($arr->SectionHeading1) && !empty($arr->SectionHeading1)){
                            print_r($arr->SectionHeading1);}
                           ?>
                            </h3>
                        <p><?php if(isset($arr->SectionDescription1) && !empty($arr->SectionDescription1)){
                            print_r($arr->SectionDescription1);
                        }
                             ?> </p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 animated bounceInLeft  wow animated animated animated" style="visibility: visible;">
                    <div class="credit_repair">
                        <div class="setting_Cb"><img src="<?php echo base_url() ; ?>assests/images/way.png"></div>
                        <h3><?php if(isset($arr->SectionHeading2) && !empty($arr->SectionHeading2)){
                            print_r($arr->SectionHeading2);}
                           ?></h3>
                        <p><?php if(isset($arr->SectionDescription2) && !empty($arr->SectionDescription2)){
                            print_r($arr->SectionDescription2);}
                            ?> </p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 animated bounceInDown  wow animated animated animated" style="visibility: visible;">
                    <div class="credit_repair">
                        <div class="setting_b"><img src="assests/images/pay.png"></div>
                        <h3><?php if(isset($arr->SectionHeading3) && !empty($arr->SectionHeading3)){
                            print_r($arr->SectionHeading3);}
                          ?></h3>
                        <p><?php if(isset($arr->SectionDescription3) && !empty($arr->SectionDescription3)){
                            print_r($arr->SectionDescription3);
                        }
                           ?> </p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 animated bounceInRight  wow animated animated animated" style="visibility: visible;">
                    <div class="credit_repair">
                        <div class="setting_c"><img src="<?php echo base_url(); ?>assests/images/rating.png"></div>
                        <h3><?php if(isset($arr->SectionHeading4) && !empty($arr->SectionHeading4)){
                            print_r($arr->SectionHeading4);}
                            ?></h3>
                        <p><?php if(isset($arr->SectionDescription4) && !empty($arr->SectionDescription4)){
                            print_r($arr->SectionDescription4);}
                            ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- <section class="what_say">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                <?php  if(isset($arr->ClientHeading) && !empty($arr->ClientHeading)){
                    $string = explode(' ', $arr->ClientHeading);
                        echo "<h4>";
                    print_r($string[0]);
                    echo " <span>";
                      print_r($string[1]);
                      echo "</span> ";
                        print_r($string[2]);
                        echo "</h4>";
                    }else{?>


                    <h4>what <span>people</span> says</h4>
                 <?php   } ?>
                </div>
            </div>
            <div class="row animated bounceInRight wow animated animated animated animated" style="visibility: visible;"> -->
                <!--                 <div class="col-md-12 col-sm-12">
                    <div class="carousel slide media-carousel" id="media">

                        <div class="carousel-inner">
                            <div class="item active">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <div class="img_slide">
                                            <img src="images/client_pic.png">
                                            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse
                                                <br> cillum dolore eu fugiat nulla pariatur.</p>
                                            <h5>“johan smith”</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="img_slide">
                                    <img src="images/client_pic.png">
                                    <p>Duis aute irure dolor in reprehenderit in voluptate velit esse
                                        <br> cillum dolore eu fugiat nulla pariatur.</p>
                                    <h5>“johan smith”</h5>
                                </div>
                            </div>
                            <div class="item">
                                <div class="img_slide">
                                    <img src="images/client_pic.png">
                                    <p>Duis aute irure dolor in reprehenderit in voluptate velit esse
                                        <br> cillum dolore eu fugiat nulla pariatur.</p>
                                    <h5>“johan smith”</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --
                <div class="col-md-12 col-sm-12">
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <!-- Wrapper for slides --
                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <div class="img_slide">
                                        <?php
                                        if(isset($arr->ClientImage) && !empty($arr->ClientImage)){
                                       echo " <img src='".$arr->ClientImage."'>";    
                                        }else{
                                            ?>
                                            <img src="assests/images/client_pic.png">
                                            <?php
                                        }
                                         ?>

                                            
                                        <?php
                                        if(isset($arr->ClientComment) && !empty($arr->ClientComment)){
                                            echo "<p>";
                                            $deta = explode(" ", $arr->ClientComment);
                                            $i = 0;
                                            // print_r($deta);die();
                                            foreach ($deta as $key => $value) {
                                                if($i == 9){
                                                    echo "<br>";
                                                }
                                                print_r(" ".$value);
                                            $i++;
                                            }
                                            echo "<p>";
                                        }else
                                            { ?> 
                                            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse
                                                <br> cillum dolore eu fugiat nulla pariatur.</p>
                                                <?php } ?>
                                                    <?php
                                        if(isset($arr->ClientName) && !empty($arr->ClientName)){
                                       // echo " <img src='".$arr->ClientName."'>"; 
                                        echo    '<h5>“'.$arr->ClientName.'”</h5>'   ;
                                        }else{
                                            ?>
                                             <h5>“johan smith”</h5>
                                            <?php
                                        }
                                         ?>
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <div class="img_slide">
                                            <img src="assests/images/client_pic.png">
                                            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse
                                                <br> cillum dolore eu fugiat nulla pariatur.</p>
                                            <h5>“johan smith”</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <div class="img_slide">
                                            <img src="assests/images/client_pic.png">
                                            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse
                                                <br> cillum dolore eu fugiat nulla pariatur.</p>
                                            <h5>“johan smith”</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Controls --
                    </div>
                </div>
            </div>
        </div>
    </section> -->

    <section class="service_provider">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <h1>Sign Up For Service Provider</h1>
                    <a href="http://kudosfind.com/Admin/ServiceProviders/">
                        <button type="submit" name="submit" class="Signup_serviceprovider">Sign Up</button>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="Front_page_footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="copy">
                        <p>Copyright &copy; 2017 KUDOS FIND All rights reserved. </p>
                    </div>
                </div>
<!--                 <div class="col-md-8 col-sm-8">
                    <div class="privacy">
                        <ul>
                            <!-- <li><a href="http://kudosfind.com/Admin/Service/Pricing">Pricing</a></li> --
                            <li><a href="http://kudosfind.com/Admin/Service/faq">FAQ</a></li>
                            <!-- <li><a href="javascript:void(0)">Feedback</a></li> --
                            <li><a href="http://kudosfind.com/Admin/Service/PrivacyPolicy">Privacy policy</a></li>
                            <li><a href="http://kudosfind.com/Admin/Service/Terms_Condition">Terms &amp; conditions</a></li>
                            <li><a href="http://kudosfind.com/Admin/Service/Contactus">Contact Us</a></li>

                        </ul>
                    </div>
                </div> -->
            </div>
        </div>
    </section>

    <script type="text/javascript">
    $('#exampleModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var recipient = button.data('whatever') // Extract info from data-* attributes
      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      var modal = $(this)
      modal.find('.modal-title').text('New message to ' + recipient)
      modal.find('.modal-body input').val(recipient)
    })
    </script>

    <script type="text/javascript">
    $(document).ready(function() {
        //Handles menu drop down
        $('.dropdown-menu').find('form').click(function(e) {
            e.stopPropagation();
        });
    });
    </script>
    <script>
    function isNumber(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            $('#spn1').html('Please Enter Your Phone Number');
            return false;
        }
        $('#spn1').html('');
        return true;
        }
    </script>
    <!--     <script>
        $('#blah').hide();
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').show();
                    $('#blah')
                        .attr('src', e.target.result)
                        .width(50)
                        .height(50);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script> -->
    <!--     <script>
        $(document).ready(function(){
            $('#sign').click(function(){
                var fname = $('#fname').val();
                var lname = $('#lname').val();
                var email = $('#email').val();
                var pass = $('#pass').val();
                var cpass = $('#cpass').val();
                var phone = $('#phone').val();

                var data_to_send = 'fname='+fname+'lname='+lname+'email='+email+'pass='+pass+'cpass='+cpass+'phone='+phone;
                //alert(data_to_send);
                $.ajax({
                    method:'POST',
                    url:'http://phphosting.osvin.net/rinkesh/kdmain/index.php/User_controler/insertt',
                    data:data_to_send,
                    success:function(html){
                        console.log(html);
                        alert(html);
                    }
                });
            });
        });
    </script>-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assests/js/bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>assests/js/animate.js"></script>
    <script>
        var password = document.getElementById("password"),
        confirm_password = document.getElementById("cpassword");

        function validatePassword(){
          if(password.value != confirm_password.value) {
            confirm_password.setCustomValidity("Passwords Don't Match");
          } else {
            confirm_password.setCustomValidity('');
          }
        }
        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;
        </script>

        <?php
        if($_POST["remember_me"]=='1')
        {
        $hour = time() + 3600 * 24 * 30;
        setcookie('username', $login, $hour);
        setcookie('password', $password, $hour);
        }
        ?>

<div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label=""><span>×</span></button>
                        <h4 class="modal-title" style="text-align:center">Forgot Password</h4>
                    </div>
                    <div class="modal-body">
                        <form role="form" method="post" action="<?php echo base_url(); ?>Booking/forgot_password" class="form-horizontal">
                            <div class="form-group row FORGET_EMAIL">
                                <label class="control-label col-md-3" for="exampleInputEmail" style="text-align:left;">
                                    Email address
                                </label>
                                <input type="email" class="form-control col-md-7" id="exampleInputEmail" name="forgot_email" placeholder="Enter email">
                            </div>
                            <p>Please enter your registered email. We will send you a password reset link shortly.</p>
                            <div class="form-group row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <!-- <button type="submit" class="btn SUBmitt_button">Submit</button> -->
                                    <input type="submit" name="submit" value="Submit" class="btn SUBmitt_button">
                                </div>
                            </div> 
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="Sign_model" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <form class="form" role="form" method="post" action="<?php echo base_url(); ?>Booking/fbinsert" accept-charset="UTF-8" id="login-nav" >
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
                                <div class="col-xs-12 col-sm-12 col-md-12 ">
                                    <div class="popup_loaction">
                                        <h2>Registration Form</h2>
                                        <span id="spn"></span>
                                        <input type="hidden" name="fbb_id" id="fbb_id" value="">
                                        <input type="hidden" name="imagee" id="imagee" value="">
                                        <div class="form-group">
                                            <label class="sr-only" for="exampleInputfirstname2">First Name</label>
                                            <input type="text" name="fname" readonly ="readonly" class="form-control" id="fnamee" placeholder="FIRST NAME" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" for="exampleInputlastname2">Last Name</label>
                                            <input type="text" name="lname" readonly ="readonly" class="form-control" id="lnamee" placeholder="LAST NAME" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" for="exampleInputEmail2">Email address</label>
                                            <input type="email" name="email"  readonly ="readonly" onkeyup="return validateEmail(Email)"  class="form-control" id="emailll" placeholder="EMAIL" required>
                                        </div>
                                        <span id="spn1" style="color:red;"></span>
                                        <div class="form-group">
                                            <label class="sr-only" for="exampleInputphone2">Phone Number</label>
                                            <input class="Phone_NO_Code" type="text"  value="+65" id="extra7" name="phone_code" readonly="readonly" placeholder="Code" />

                                            <input class="Phone_Number" type="text" class="form-control" value="" id="extra7" maxlength="8" name="phone" onkeypress="return isNumber(event)" placeholder="PHONE NUMBER" />
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" for="exampleInputphone2">Refer Code</label>
                                                <input type="text" name="refercode" class="form-control" id="refer" placeholder="Refer Code">
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" id="sign" name="signin" class="create_account">Create Account</button>
                                        </div>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

</body>
</html>


