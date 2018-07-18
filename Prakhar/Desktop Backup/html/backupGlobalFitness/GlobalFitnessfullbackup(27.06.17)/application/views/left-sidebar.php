 <!--sidebar start-->

<aside>
<div id="sidebar"  class="nav-collapse ">
  <!-- sidebar menu start-->
  <ul class="sidebar-menu" id="nav-accordion">
    <li><?php echo anchor('/dashboard', '<i class="fa fa-dashboard"></i><span>Dashboard</span>');?></li>
   <li class="sub-menu">
    <a href="javascript:;" >
      <i class="fa fa-users"></i>
      <span>Customers</span>
    </a>
    <ul class="sub">        
      <li><?php echo anchor('/dashboard/customer', 'Customer List') ?></li>
    </ul>
  </li> 

    <li class="sub-menu">
    <a href="javascript:;" >
      <i class="fa fa-users"></i>
      <span>All Orders</span>
    </a>
    <ul class="sub">        
      <li><?php echo anchor('/dashboard/order/new', 'New Order') ?></li>
      <li><?php echo anchor('/dashboard/order/complete', 'Complete Shipped Order') ?></li>
    </ul>
  </li> 
   <!-- <li class="sub-menu">
      <a href="javascript:;" >
        <i class="fa fa-file"></i>
        <span>Custom Pages</span>
      </a>
      <ul class="sub">        
        <li><?php //echo anchor('/dashboard/about', 'About Us') ?></li>
        <li><?php //echo anchor('/dashboard/privacy', 'Privacy Policy') ?></li>
        <li><?php //echo anchor('/dashboard/term', 'Terms of Service') ?></li>


      </ul>
    </li> -->


    <li class="sub-menu">
      <a href="javascript:;" >
        <i class="fa fa-file"></i>
        <span>Shop Pages</span>
      </a>
      <ul class="sub">        
        <li><?php echo anchor('/dashboard/shop/Fitness Equipment Sales', 'Fitness Equipment Sales') ?></li>
        <li><?php echo anchor('/dashboard/shop/Long Term Rentals', 'Long Term Rentals') ?></li>
        <li><?php echo anchor('/dashboard/shop/Educational Sales', 'Educational Sales') ?></li>
         <li><?php echo anchor('/dashboard/shop/Donations', 'Donations') ?></li>
        <li><?php echo anchor('/dashboard/shop/Government Sales', 'Government Sales') ?></li>
        <li><?php echo anchor('/dashboard/shop/Gym Owners', 'Gym Owners') ?></li>
        <li><?php echo anchor('/dashboard/shop/International Sales', 'International Sales') ?></li>
      </ul>
    </li>
            <li class="sub-menu">
      <a href="javascript:;" >
        <i class="fa fa-file"></i>
        <span>View HomePage</span>
      </a>
      <ul class="sub">        
      <li><?php echo anchor('/dashboard/ViewHomePage/Promo One', 'Promo One') ?></li>
        <li><?php echo anchor('/dashboard/ViewHomePage/Promo Two', 'Promo Second') ?></li>
        <li><?php echo anchor('/dashboard/ViewHomePage/Promo Three', 'Promo Third') ?></li>
         <li><?php echo anchor('/dashboard/ViewHomePage/Promo Video', 'Promo Video') ?></li>
        <li><?php echo anchor('/dashboard/ViewHomePage/Slider Images', 'Corousal') ?></li>
       
      </ul>
    </li>

        <li class="sub-menu">
      <a href="javascript:;" >
        <i class="fa fa-file"></i>
        <span>Insert HomePage</span>
      </a>
      <ul class="sub">        
      <li><?php echo anchor('/dashboard/HomePage/Promo One', 'Promo One') ?></li>
        <li><?php echo anchor('/dashboard/HomePage/Promo Two', 'Promo Second') ?></li>
        <li><?php echo anchor('/dashboard/HomePage/Promo Three', 'Promo Third') ?></li>
         <li><?php echo anchor('/dashboard/HomePage/Promo Video', 'Promo Video') ?></li>
        <li><?php echo anchor('/dashboard/HomePage/Slider Images', 'Corousal') ?></li>
       
      </ul>
    </li>


       <li class="sub-menu">
      <a href="javascript:;" >
        <i class="fa fa-file"></i>
        <span>About Us</span>
      </a>
      <ul class="sub">        
        <li><?php echo anchor('/dashboard/about/About Global Fitness', 'About Global Fitness') ?></li>
        <li><?php echo anchor('/dashboard/about/Terms & Conditions', 'Terms & Conditions') ?></li>
        <li><?php echo anchor('/dashboard/about/Privacy Policy', 'Privacy Policy') ?></li>
         <li><?php echo anchor('/dashboard/about/Legal', 'Legal') ?></li>
        <li><?php echo anchor('/dashboard/about/Contact Us', 'Contact Us') ?></li>
        <li><?php echo anchor('/dashboard/about/Testimonials', 'Testimonials') ?></li>
        <li><?php echo anchor('/dashboard/about/Press & Media', 'Press & Media') ?></li>
      </ul>
    </li>

     <li class="sub-menu">
      <a href="javascript:;" >
        <i class="fa fa-file"></i>
        <span>Support</span>
      </a>
      <ul class="sub">        
        <li><?php echo anchor('/dashboard/support/Manuals & Liriture', 'Manuals & Liriture') ?></li>
        <li><?php echo anchor('/dashboard/support/Product Help', 'Product Help') ?></li>
        <li><?php echo anchor('/dashboard/support/Register Purchase', 'Register Purchase') ?></li>
         <li><?php echo anchor('/dashboard/support/Replacement Parts', 'Replacement Parts') ?></li>
        <li><?php echo anchor('/dashboard/support/Schedule Service', 'Schedule Service') ?></li>
      </ul>
    </li>

     <li class="sub-menu">
      <a href="javascript:;" >
        <i class="fa fa-file"></i>
        <span>Connect With Us</span>
      </a>
      <ul class="sub">        
        <li><?php echo anchor('/dashboard/contactwithus/Facebook', 'Facebook') ?></li>
        <li><?php echo anchor('/dashboard/contactwithus/Twitter', 'Twitter') ?></li>
        <li><?php echo anchor('/dashboard/contactwithus/Instagram', 'Instagram') ?></li>
         <li><?php echo anchor('/dashboard/contactwithus/YouTube', 'YouTube') ?></li>
        <li><?php echo anchor('/dashboard/contactwithus/Pinterest', 'Pinterest') ?></li>
        <li><?php echo anchor('/dashboard/contactwithus/Blog', 'Blog') ?></li>
      </ul>
    </li>
    <li class="sub-menu">
    <a href="javascript:;" >
      <i class="fa fa-th-list"></i>
      <span>Review and Rating</span>
    </a>
    <ul class="sub">        
      <li><?php echo anchor('/dashboard/approved', 'Approved Review') ?></li>
      <li><?php echo anchor('/dashboard/unaprove', 'Unapprove Review') ?></li>    
    </ul>
  </li> 

    <li class="sub-menu">
    <a href="javascript:;" >
      <i class="fa fa-th-list"></i>
      <span>Products</span>
    </a>
    <ul class="sub">        
      <li><?php echo anchor('/dashboard/ProductsCardio', 'Cardio Products List') ?></li>
       <li><?php echo anchor('/dashboard/ProductsStrength', 'Strength Products List') ?></li>
      <li><?php echo anchor('/dashboard/cardioproduct', 'Add Cardio Product') ?></li>    
      <li><?php echo anchor('/dashboard/strengthproduct', 'Add Strength Product') ?></li>    
    <!--  <li><?php echo anchor('/dashboard/addProduct', 'Add Product') ?></li> -->   
    </ul>
  </li> 


     <li class="sub-menu">
    <a href="javascript:;" >
      <i class="fa fa-th-list"></i>
      <span>Promo Code</span>
    </a>
    <ul class="sub">        
      <li><?php echo anchor('/dashboard/PromoCode', 'View Promo Code') ; ?></li>
      <li><?php echo anchor('/dashboard/AddPromoCode', 'Add New Promo Code') ; ?></li>    

    </ul>
  </li> 






  

   <li class="sub-menu">
    <a href="javascript:;" >
      <i class="fa fa-th-list"></i>
      <span>Category</span>
    </a>
    <ul class="sub">        
      <li><?php echo anchor('/dashboard/category', 'All Category') ; ?></li>
      <li><?php echo anchor('/dashboard/addcategory', 'Add New Category') ; ?></li>    
    </ul>
  </li> 

  <li class="sub-menu">
    <a href="javascript:;" >
      <i class="fa fa-th-list"></i>
      <span>Brand</span>
    </a>
    <ul class="sub">        
      <li><?php echo anchor('/dashboard/brands', 'Brand List') ?></li>
      <li><?php echo anchor('/dashboard/addbrand', 'Add New Brand') ?></li>    
    </ul>
  </li> 

  <li class="sub-menu">
    <a href="javascript:;" >
      <i class="fa fa-th-list"></i>
      <span>Version</span>
    </a>
    <ul class="sub">        
      <li><?php echo anchor('/dashboard/version', 'Version List') ?></li>
      <li><?php echo anchor('/dashboard/addversion', 'Add New Version') ?></li>    
    </ul>
  </li> 
   <li class="sub-menu">
    <a href="javascript:;" >
      <i class="fa fa-th-list"></i>
      <span>Amps</span>
    </a>
    <ul class="sub">        
      <li><?php echo anchor('/dashboard/amps', 'Amps List') ?></li>
      <li><?php echo anchor('/dashboard/addamps', 'Add New Amps') ?></li>    
    </ul>
  </li>   
  <li class="sub-menu">
    <a href="javascript:;" >
      <i class="fa fa-th-list"></i>
      <span>Availability</span> 
    </a>
    <ul class="sub">        
      <li><?php echo anchor('/dashboard/availability', 'Availability List') ?></li>
      <li><?php echo anchor('/dashboard/addavailability', 'Add New Availability') ?></li>    
    </ul>
  </li> 

   <li class="sub-menu">
    <a href="javascript:;" >
      <i class="fa fa-th-list"></i>
      <span>Class</span> 
    </a>
    <ul class="sub">        
      <li><?php echo anchor('/dashboard/class_list', 'Class List') ?></li>
      <li><?php echo anchor('/dashboard/addclass', 'Add New Class') ?></li>    
    </ul>
  </li> 

  <li class="sub-menu">
    <a href="javascript:;" >
      <i class="fa fa-th-list"></i>
      <span>ColorCardio</span> 
    </a>
    <ul class="sub">        
      <li><?php echo anchor('/dashboard/color_list', 'ColorCardio List') ?></li>
      <li><?php echo anchor('/dashboard/addcolor', 'Add New ColorCardio') ?></li>    
    </ul>
  </li> 

  <li class="sub-menu">
    <a href="javascript:;" >
      <i class="fa fa-th-list"></i>
      <span>Warranty</span> 
    </a>
    <ul class="sub">        
      <li><?php echo anchor('/dashboard/warranty_list', 'Warranty List') ?></li>
      <li><?php echo anchor('/dashboard/addwarrenty', 'Add New Warranty') ?></li>    
    </ul>
  </li> 

    <li class="sub-menu">
    <a href="javascript:;" >
      <i class="fa fa-th-list"></i>
      <span>Voltage</span> 
    </a>
    <ul class="sub">        
      <li><?php echo anchor('/dashboard/voltage_list', 'Voltage List') ?></li>
      <li><?php echo anchor('/dashboard/addvoltage', 'Add New Voltage') ?></li>    
    </ul>
  </li> 

   <li class="sub-menu">
    <a href="javascript:;" >
      <i class="fa fa-th-list"></i>
      <span>FitnessTrainingZone</span> 
    </a>
    <ul class="sub">        
      <li><?php echo anchor('/dashboard/fitnesst_list', 'FitnessTrainingZone List') ?></li>
      <li><?php echo anchor('/dashboard/addfitnesst', 'Add New FitnessTrainingZone') ?></li>    
    </ul>
  </li> 

<li class="sub-menu">
    <a href="javascript:;" >
      <i class="fa fa-th-list"></i>
      <span>Piece</span> 
    </a>
    <ul class="sub">        
      <li><?php echo anchor('/dashboard/piece_list', 'Piece List') ?></li>
      <li><?php echo anchor('/dashboard/addpiece', 'Add New Piece') ?></li>    
    </ul>
  </li> 

  <li class="sub-menu">
    <a href="javascript:;" >
      <i class="fa fa-th-list"></i>
      <span>Conditions</span> 
    </a>
    <ul class="sub">        
      <li><?php echo anchor('/dashboard/condition_list', 'Condition List') ?></li>
      <li><?php echo anchor('/dashboard/addcondition', 'Add New Condition') ?></li>    
    </ul>
  </li> 



</ul>
  <!-- sidebar menu end-->
</div>
</aside>

<!--sidebar end-->
