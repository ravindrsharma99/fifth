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
            url:'http://phphosting.osvin.net/kudos_Move/index.php/Booking/googleSignup',
            data: {
                google_id: profile.getId(),
                name: profile.getName(),
                imageUrl: profile.getImageUrl(),
                email: profile.getEmail()
            },
            success:function(html){
                if(html){
                    window.location.href = 'http://phphosting.osvin.net/kudos_Move/index.php/Booking/login';
                }else{
                    alert("Unable to login");
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
      statusChangeCallback(response);
    });
  }

  window.fbAsyncInit = function() {
  FB.init({
   appId      : '1901662360049464',
    cookie     : true,  
                       
    xfbml      : true,  
    version    : 'v2.8' 
  });

 
  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });

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
    FB.api('/me', function(response) {
      console.log('Successful login for: ' + response.name);
      //document.getElementById('status').innerHTML =
        //'Thanks for logging in, ' + response.name + response.id + '';
        //var name = response.name;
        var id = response.id;
        var name = response.name;
        //alert(id);
        $.ajax({
            method:'POST',
            url:'http://phphosting.osvin.net/kudos_Move/index.php/Booking/fb',
            data:'fbname='+name+"&fbid="+id,
            success:function(html){
                console.log(html);
                if(html == "suc"){
                window.location.href = 'http://phphosting.osvin.net/kudos_Move/index.php/Booking/logged';
                }else if(html == "error"){
                    // window.location.href = 'http://phphosting.osvin.net/rinkesh/kdmain/index.php/User_controler/out';
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
                        <img src="assests/images/logo.png">
                    </div>
                </div>
                <div class="col-md-col-8 col-sm-8">
                    <!--                     <div class="login">
                        <ul>
                            <li><a href="#">Register</a></li>
                            <li><a href="#">Login</a></li>
                        </ul>
                    </div> -->
                    <?php 
                        if ($this->session->flashdata('msg')) { ?>
                            <div><h3><?php echo $this->session->flashdata('msg') ?></h3></div>
                    <?php } ?> 
                    <span id="spn4"><h3></h3></span>
                    <div class="joinus_penal"><p>Become a Service Provider<a href="http://kudosfind.com/Admin/ServiceProviders/"> <button class="btn btn_join">Join Us </button></a></p></div>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right">
                             <li class="dropdown">
                                <a href="http://www.jquery2dotnet.com" class="dropdown-toggle" data-toggle="dropdown">Sign up <b class="caret"></b></a>
                                <ul class="dropdown-menu" >
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

                                                        <input class="Phone_Number" type="text" class="form-control" value="" id="extra7" name="phone" onkeypress="return isNumber(event)" placeholder="PHONE NUMBER" />
                                                    </div>
                                                    <div class="form-group">
                                                        <button type="submit" id="sign" name="sign" class="create_account">Create Account</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            <li class="dropdown">
                                <a href="http://www.jquery2dotnet.com" class="dropdown-toggle" data-toggle="dropdown">Sign in <b class="caret"></b></a>
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
                                            </div>
                                        </div>
                                    </li>
                                        <li>
                                            <div class="FACEbook">
                                                <fb:login-button scope="public_profile,email" name="fbbtn" autologoutlink="true" onlogin="checkLoginState();">
                                                </fb:login-button>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="gooGEL_PLuSh">
                                                <div class="g-signin2" data-onsuccess="onSignIn"></div>
                                            </div>
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
                        <h1><span>Kudos </span>find</h1>
                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        <a href="#"><img src="assests/images/google_play.png" alt="#"></a>
                        <a href="#" class="padding_left"><img src="<?php echo base_url(); ?>assests/images/google_app.png" alt="#"></a>
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
                        <h3>BOOK</h3>
                        <p>Duis aute irure dolor in reprehenderit in voluptate velit </p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 animated bounceInLeft  wow animated animated animated" style="visibility: visible;">
                    <div class="credit_repair">
                        <div class="setting_Cb"><img src="<?php echo base_url() ; ?>assests/images/way.png"></div>
                        <h3>TRACK</h3>
                        <p>Duis aute irure dolor in reprehenderit in voluptate velit </p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 animated bounceInDown  wow animated animated animated" style="visibility: visible;">
                    <div class="credit_repair">
                        <div class="setting_b"><img src="assests/images/pay.png"></div>
                        <h3>PAY</h3>
                        <p>Duis aute irure dolor in reprehenderit in voluptate velit </p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 animated bounceInRight  wow animated animated animated" style="visibility: visible;">
                    <div class="credit_repair">
                        <div class="setting_c"><img src="<?php echo base_url(); ?>assests/images/rating.png"></div>
                        <h3>RATE</h3>
                        <p>Duis aute irure dolor in reprehenderit in voluptate velit </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="what_say">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <h4>what <span>people</span> says</h4>
                </div>
            </div>
            <div class="row animated bounceInRight wow animated animated animated animated" style="visibility: visible;">
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
                </div> -->
                <div class="col-md-12 col-sm-12">
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
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
                        <!-- Controls -->
                    </div>
                </div>
            </div>
        </div>
    </section>
<section class="copy_right">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <div class="copy">
                        <p>Copyright &copy; 2017 KUDOS FIND All rights reserved. </p>
                    </div>
                </div>
                <div class="col-md-8 col-sm-8">
                    <div class="privacy">
                        <ul>
                            <li><a href="http://kudosfind.com/Admin/Service/Pricing">Pricing</a></li>
                            <li><a href="http://kudosfind.com/Admin/Service/faq">FAQ</a></li>
                            <li><a href="javascript:void(0)">Feedback</a></li>
                            <li><a href="http://kudosfind.com/Admin/Service/PrivacyPolicy">Privacy policy</a></li>
                            <li><a href="http://kudosfind.com/Admin/Service/Terms_Condition">Terms &amp; conditions</a></li>
                            <li><a href="http://kudosfind.com/Admin/Service/Contactus">Contact Us</a></li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
    </script>
 -->    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
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
</body>
</html>
