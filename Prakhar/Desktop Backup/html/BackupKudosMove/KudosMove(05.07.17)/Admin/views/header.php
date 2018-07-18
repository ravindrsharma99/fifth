<!DOCTYPE html>
<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php 

if(isset($_SESSION['user']) || isset($_SESSION['phone']) && isset($_SESSION['image']) && isset($_SESSION['email']) || isset($_SESSION['fb_log']) ){

  //$nname = $_SESSION['fb_log'];
    $name = $_SESSION['user'];
    $phone = $_SESSION['phone'];
}else{
   redirect(base_url());
  //header("Refresh: 0; url=http://phphosting.osvin.net/prakhar/kdmain/index.php");
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

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kudos</title>
    <link rel="shortcut icon" href="<?php echo base_url();?>assests/images/favicon_icon.png">
    <link href="<?php echo base_url(); ?>assests/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assests/css/custom.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css">
   <!--  <link rel="stylesheet" href="<?php echo base_url(); ?>assests/css/bootstrap-material-datetimepicker.css" /> -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://apis.google.com/js/platform.js?onload=onLoad" async defer></script>
    <meta name="google-signin-client_id" content="300285074932-lgh1inrokfhbbvtour3536rp875hji0d.apps.googleusercontent.com">
    <!--  <div class="g-signin2" data-onsuccess="onSignIn"></div> -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assests/css/bootstrap-min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assests/css/bootstrap-formhelpers-min.css" media="screen">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assests/css/bootstrap-side-notes.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assests/css/bootstrapValidator-min.css"/>
    <script
        src="https://code.jquery.com/jquery-2.2.4.js"
        integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
        crossorigin="anonymous"></script>
    <script>
    function signOut() {

        var auth2 = gapi.auth2.getAuthInstance();
        auth2.signOut().then(function () {
          console.log('User signed out.');
      });
    }
    function onLoad() {
      gapi.load('auth2', function() {
        gapi.auth2.init();
    });
  }
  </script>
  <script>
      function statusChangeCallback(response) {
        console.log('statusChangeCallback');
        console.log(response);
        if (response.status === 'connected') {
          // testAPI();
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
                url:'<?php echo base_url(); ?>Booking/fb',
                data:'fbname='+name+"&fbid="+id,
                success:function(html){
                    //console.log(html);
                    if(html == 2){
                    window.location.href = '<?php echo base_url(); ?>Booking/logged';
                    }else{
                        // window.location.href = 'http://phphosting.osvin.net/rinkesh/kdmain/index.php/User_controler/out';
                        return false;                        
                        
                    }
                }
            });
              
        });
      }
          function logout() {
        FB.logout(function(response) {
          console.log(response);
          // user is now logged out
          window.location.href= "http://kudosfind.com/Booking/logout";
      });
      }
    </script>

</head>

<body>
 <section class="login_page">
    <div class="container">
        <div class="row">
            <div class="lg-col-8 col-md-8 col-sm-8">
                <div class="logo_login"><img src="<?php echo base_url(); ?>assests/images/logo_inner.png"></div>
            </div>
            <div class="lg-col-4 col-md-4 col-sm-4">
                <div class="login_inner">
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                                <a href="javascript:void(0)" class="dropdown-toggle LOGOG" data-toggle="dropdown">
                                  <span class="SAMILL_PROFILE">
                                    <?php if(isset($_SESSION['image'])){ ?>
                                     <img class="img-responsive" src="<?php echo $_SESSION['image']; ?>">
                                <?php }else{ ?>
                                  <img class="img-responsive" src="<?php echo base_url(); ?>assests/images/Dumy_profile.png; ?>">
                                    <!-- <img src="<?php echo base_url(); ?>assests/images/Dumy_profile.png" class="circle"> -->
                                <?php } ?>
                                   <!--  <img class="img-responsive" src="<?php echo $_SESSION['image']; ?>"> -->
                                  </span>
                                  <?php echo $name ; ?><?php //echo $nname; ?><b class="caret"></b></a>
                                <ul class="dropdown-menu inner_list"  style="padding: 15px;min-width: 250px;">
                                    <li>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <li><a href="<?php echo base_url(); ?>Booking/book_order">New Booking</a></li>
                                                <li><a href="<?php echo base_url(); ?>Booking/history">History</a></li>
                                                <li><a href="<?php echo base_url(); ?>Booking/wallet">Wallet</a></li>
                                                <li><a href="<?php echo base_url(); ?>Booking/your_quote">Quote</a></li>
                                                <li><a href="<?php echo base_url(); ?>Booking/notifications">Notification</a></li>
                                                <!-- <li><a href="<?php echo base_url(); ?>index.php/Booking/setting">Setting</a></li> -->
                                                <li>                                             

                                                  <?php if(isset($_SESSION['googlename'])){ ?>
                                                    <a href="<?php echo base_url();?>index.php/Booking/logout" onclick="signOut()">Sign out</a>
                                                  <?php } elseif(isset($_SESSION['user'])){ ?>
                                                    <a href="<?php echo base_url(); ?>Booking/logout">
                                                      <span><img src="<?php echo base_url(); ?>assests/images/logout.png"></span>
                                                      <input id="logoutButton" class="Logout_buttton" type="button" value="Logout!" onclick="logout();" /></a>
                                                  <?php } else{ ?>
                                                    <a href="<?php echo base_url();?>Booking/logout"><span><img src="<?php echo base_url(); ?>assests/images/logout.png"></span>Log Out</a>
                                                  <?php } ?>
                                              </li>
                                          </div>
                                      </div>
                                  </li>
                              </ul>
                          </li>
                      </ul>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>