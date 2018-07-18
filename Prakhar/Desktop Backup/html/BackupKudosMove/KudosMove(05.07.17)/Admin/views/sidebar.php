<section class="login ENTERY_form">
    <div class="container-fluid pADD_NO">
        <div class="main_templat">
            <div class="col-sm-3 col-md-3 col-xs-12 pADD_NO">
                <div class="nav-side-menu">
                    <div class="brand">
                        <div class="circle">
                            <a href="<?php echo base_url(); ?>Booking/profile_info">
                                <?php if(isset($_SESSION['image'])){ ?>
                                    <img src="<?php echo $_SESSION['image']; ?>" class="circle">
                                <?php }else{ ?>
                                    <img src="<?php echo base_url(); ?>assests/images/Dumy_profile.png" class="circle">
                                <?php } ?>
                            </a>

                            </div>
                        <h1><?php echo $_SESSION['user'] ; ?></h1>
                    </div>
                    <!-- <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i> -->
                    <div class="menu-list">
                        <div class="bhoechie-tab-menu">
                            <div class="sidebar_tab">
                                <a href="<?php echo base_url(); ?>Booking/book_order" class="list-group-item text-center">
                                    New Booking
                                </a>
                                <a href="<?php echo base_url(); ?>Booking/history" class="list-group-item text-center">
                                    History
                                </a>
                                <a href="<?php echo base_url(); ?>Booking/wallet" class="list-group-item text-center">
                                    Wallet
                                </a>
                                <a href="<?php echo base_url(); ?>Booking/your_quote" class="list-group-item text-center">
                                   Quote
                                </a>
                                <a href="<?php echo base_url(); ?>Booking/notifications" class="list-group-item text-center">
                                    Notification
                                </a>
                                <!-- <a href="<?php echo base_url(); ?>index.php/Booking/setting" class="list-group-item text-center">
                                    Setting
                                </a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-10 col-md-offset-2 col-sm-10 col-sm-offset-2 col-xs-12 col-xs-offset-0 PADD_remo">
                <div class="Right_Penal_custom">
           <!--  <input type="hidden" id="id" value="<?php echo $_SESSION['user_id']; ?>">
            <input type="hidden" id="status" value="1"> -->

            <script>
            // $(document).ready(function(){
            // var user_id = 179;
            // var status = 1;
            //     $('#history').click(function(){
            //         $.ajax({
            //             method: 'POST',
            //             url: '<?php echo base_url(); ?>Admin/api/User/list_userBooking_post',
            //             data: 'user_id='+user_id+'&book_status='+status,
            //             success: function(result) {
            //             console.log(result);
            //             }

            //         });
            //     });
            // });
            </script>