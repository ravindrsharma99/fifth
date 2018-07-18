<div class="panel_Custom">
    <div class="brand">
        <div class="circle"><img src="<?php echo $_SESSION['image']; ?>" class="circle"></div>
        <!-- <h1><?php echo $name ; ?></h1> -->
    </div>
    <!-- <?php
     if ($this->session->flashdata('msg')) { ?>
        <div><h3><?php echo $this->session->flashdata('msg') ?></h3></div>
    <?php } ?> -->
    <form class="form profile_form" role="form" method="post" action="" accept-charset="UTF-8" id="login-nav" enctype="multipart/form-data">
        <!--     <div class="contact_info">
            <ul>
                <li><span><img src="<?php echo base_url(); ?>assests/images/usser.png"></span><input type="text" id="ssname" value="<?php echo $_SESSION['fname']; ?>" style="color:FFF;" name="nme" required></li>
                <li><span><img src="<?php echo base_url(); ?>assests/images/usser.png"></span><input type="text" id="ssname" value="<?php echo $_SESSION['lname']; ?>" style="color:FFF;" name="nme" required></li>
                
            
            <li><span><img src="<?php echo base_url(); ?>assests/images/phone.png"></span>
                <input type="text" id="ssphone"name="num" value="<?php echo $_SESSION['phone']; ?>" style="color:FFF;" required>
            </li>
           </ul>
        </div>
         -->
        <div class="form-group col-md-6 col-sm-6 ">
            <label for="exampleInputfirstname2">First Name</label>
            <input type="text" name="fname" class="form-control" value="<?php echo $_SESSION['fname']; ?>" required>
        </div>
        <div class="form-group col-md-6 col-sm-6">
            <label for="exampleInputlastname2">Last Name</label>
            <input type="text" name="lname" class="form-control" value="<?php echo $_SESSION['lname']; ?>" required>
        </div>
        <div class="form-group col-md-6 col-sm-6 gmail_lable">
            <label for="exampleInputEmail2">Email address</label>
            <input type="text" name="email" class="form-control" readonly="readonly" value="<?php echo $_SESSION['email']; ?>" />
        </div>
        <div class="form-group col-md-6 col-sm-6">
            <span id="spn1"></span>
            <label for="exampleInputphone2">Phone Number</label>
            <div class="phone_code_css">
                <input class="Phone_NO_Code_1" type="text" value="+65" id="extra7" name="phone_code" readonly="readonly" placeholder="Code" />
                <input class="Phone_Number_1" type="text" class="form-control" id="extra7" name="extra7" readonly="readonly" value="<?php echo $_SESSION['updphone']; ?>" />
            </div>
        </div>
        <!-- <div class="form-group col-md-6 col-sm-6">
            <span id="spn1"></span>
            <label  for="exampleInputphone2">Image upload</label>
            <div class="image_upload">
                <input type="file" class="form-control IMG_UP" name="profile_pic"/>
                <div class="image_upload_button">Choose File</div>
            </div>

        </div> -->
        <div class="form-group col-md-6 col-sm-6 ">
            <label for="exampleInputphone2">Image upload</label>
            <input type="file" class="form-control IMG_UP" name="profile_pic" />
        </div>
        <div class="form-group col-md-12 col-sm-12">
            <input type="submit" id="sign" name="sign" value="Save" class="submit_profile">
        </div>
        <div class="form-group col-md-12 col-sm-12">
            <a href="<?php echo base_url(); ?>index.php/Booking/password_recovery">Change Password</a>
        </div>
    </form>
</div>
