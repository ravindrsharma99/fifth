
<input type="hidden" value="<?php if(isset($_SESSION['firstname'])){ echo '1'; }else{ echo '0'; } ?>" id="checklooged">
<input type="hidden" value="0" id="alertsubcheck">
<style>#responsive_footer_menu .footer_nav a,.Email_auttoo .modal-title,.Email_successfull_content_PEnaL,.demo-footer>a,.panel-title a,.proDuct_Name{font-family:'PT Sans',sans-serif!important}.Email_auttoo .modal-title{color:#3c3!important;font-size:26px}.Email_successfull_content_PEnaL{font-size:16px!important;line-height:22px;font-weight:400!important}.proDuct_Name{color:#000!important;font-style:italic;font-weight:400}.footer_bottom_popup p{color:#444!important;margin:0!important;padding:0!important;font-size:12px!important}.row.footer_bottom_popup{padding:0!important}.panel-group .panel{border-radius:0;box-shadow:none;border-color:#fff}.panel-default>.panel-heading{padding:0;border-radius:0;color:#212121;background-color:#fff;border-bottom:1px solid #ccc}.panel-title a{font-size:16px;color:#525252!important}.panel-title>a{display:block;padding:10px 13px 10px 0;text-decoration:none}.more-less{float:right;color:#007fff;font-size:9px;font-weight:100}.panel-default>.panel-heading+.panel-collapse>.panel-body{border-top-color:#EEE}.demo{padding-top:60px;padding-bottom:110px}.demo-footer{position:fixed;bottom:0;width:100%;padding:15px;background-color:#212121;text-align:center}.demo-footer>a{text-decoration:none;font-weight:700;font-size:14px;color:#fff}#responsive_footer_menu .footer_nav a{color:#222;font-size:18px;font-weight:100;line-height:28px;text-decoration:none}#responsive_footer_menu .panel-body{padding:13px 0;margin-top:-1px;border-bottom:1px solid #f7f7f7}.displaynone{display:none}
</style>
    <script src="<?php echo base_url('public/assets/js/swiper.min.js'); ?>"></script>

    <!-- Initialize Swiper -->
    <script>
    var swiper = new Swiper('.swiper-container', {
        pagination: '.swiper-pagination',
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        paginationClickable: true,
        spaceBetween: 30,
        centeredSlides: true,
        autoplay: 8000,
        autoplayDisableOnInteraction: false
    });
    </script>

<script type="text/javascript">
$(document).ready(function () {
    $('.nav-toggle').click(function () {
        var collapse_content_selector = $(this).attr('href');
        var toggle_switch = $(this);
        $(collapse_content_selector).toggle(function () {
            if ($(this).css('display') == 'none') {
                toggle_switch.html('Read More V');
            } else {
                toggle_switch.html('Read Less');
            }
        });
    });

});
</script>
<script type="text/javascript">

  function mysuggestions(){
     var key = $("#sgs_data").val();
     // alert(key);return false;
  $.ajax({
        type: "POST",
        url: "<?php echo base_url() ?>Fitness_equipment/SuggestionList",
        data: "data="+key,

        success: function(html) {
              var mydata = JSON.parse(html);
          // console.log('1');
              console.log(mydata);
               $('.Pieces li').addClass('displaynone');
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

      var helloVar =   this.Name.replace(' ', '-');
    if ( typeof vars[hash[0]] == 'undefined'){

                  // console.log(this.ID);return false;
        $(".Pieces").append('<li class="hello'+this.ID+'"><a href="?piece='+helloVar.toLowerCase()+'"><span class="tab">'+this.Name+'</span></a></li>'); }
        else{
           $(".Pieces").append('<li class="hello'+this.ID+'"><a href="<?php print_r($_SERVER['REQUEST_URI']); ?>&piece='+helloVar.toLowerCase()+'"><span class="tab">'+this.Name+'</span></a></li>');
        }

          });
        },
    });
        return false;

  }
</script>


<script type="text/javascript">
$(document).ready(
    function()
    {

         $("#hideThisPiece").click(function(){
         $('#showThisDivPiece').removeClass('displaynone');
         $('#hideThisPiece').addClass('displaynone');
      });
          $("#hidebrand").click(function(){

                  $('#showbrand').removeClass('displaynone');
                  $('#hidebrand').addClass('displaynone');
                });

             $("#Brand_CustRESPON,#PieceProduct_CustRESPON,#Availability_CustRESPON,#CategoryProduct_CustRESPON,#ConditionProduct_CustRESPON,#PriceProduct_CustRESPON,#RatingProduct_CustRESPON").click(function(){
            $('#showbrand').addClass('displaynone');
            $('#hidebrand').removeClass('displaynone');
        });
                  $("#PieceProduct_CustRESPON,#Brand_CustRESPON,#Availability_CustRESPON,#CategoryProduct_CustRESPON,#ConditionProduct_CustRESPON,#PriceProduct_CustRESPON,#RatingProduct_CustRESPON").click(function(){
            $('#showThisDivPiece').addClass('displaynone');
            $('#hideThisPiece').removeClass('displaynone');
        });


    }
);
</script>
<script type="text/javascript">
$(document).ready(
    function()
    {
         $("#hideThis").click(function(){
          $('#showThisPieceFilter').removeClass('displaynone');
          $('#hideThis,#srch-term_aa').addClass('displaynone');
      });
          $("#hideThisbrand").click(function(){
                  $('#showThisbrand').removeClass('displaynone');
                  $('#hideThisbrand').addClass('displaynone');
                });
             $("#Brand_Cust,#PieceProduct_Cust,#Availability_Cust,#CategoryProduct_Cust,#ConditionProduct_Cust,#PriceProduct_Cust,#RatingProduct_Cust").click(function(){
            $('#showThisbrand').addClass('displaynone');
            $('#hideThisbrand').removeClass('displaynone');
        });
                  $("#PieceProduct_Cust,#Brand_Cust,#Availability_Cust,#CategoryProduct_Cust,#ConditionProduct_Cust,#PriceProduct_Cust,#RatingProduct_Cust").click(function(){
            $('#showThisPieceFilter').addClass('displaynone');
            $('#hideThis').removeClass('displaynone');
        });
        $(".mainvalclick").click(function(e){
          e.preventDefault();
          $checked = $(this).attr('id');
          $(this).parents('ul').find('input[type=checkbox]:checked').prop('checked',false);
          $("."+$checked).attr('checked', true);
          $(this).parents(".testmyselfsubmit").find("form").submit();
        });

        $(".clickmore").click(function(e){
          e.preventDefault();
          $val = $(this).data('val');
          if($val=="more"){
            $(this).parents('ul').find('li.displaynone').removeClass('displaynone').addClass('checkedok');
            $(this).parents('ul').find('li.showmore').addClass('displaynone');
            $(this).parents('ul').find('li.showless').removeClass('displaynone');
          }
          else{
              $(this).parents('ul').find('li.checkedok').removeClass('checkedok').addClass('displaynone');
              $(this).parents('ul').find('li.showless').addClass('displaynone');
            $(this).parents('ul').find('li.showmore').removeClass('displaynone');
          }
        });
    }
);
</script>


<script type="text/javascript">

  function working(){

     var key = $("#ng_data").val();
     var keydata = $("#categoryfilter").text();
  $.ajax({
        type: "POST",
        url: "<?php echo base_url() ?>Fitness_equipment/SuggestionList",
        data: "value="+key+"&categories="+keydata,

        success: function(html) {
              var mydata = JSON.parse(html);
              // console.log(mydata);
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
      var helloVar =   this.Name.replace(' ', '-');
    if( typeof vars[hash[0]] == 'undefined'){
        $(".Brand").append('<li class="hello'+this.Name+'"><a href="?brand='+helloVar.toLowerCase()+'"><span class="tab">'+this.Name+'</span></a></li>');

    }
        else{
           $(".Brand").append('<li class="hello'+this.Name+'"><a href="<?php
print_r($_SERVER['REQUEST_URI']); ?>&brand='+helloVar.toLowerCase()+'"><span class="tab">'+this.Name+'</span></a></li>');
        }
          });
        },
    });

  }

  function suggestionlist(){
     var key = $("#n_data").val();

  $.ajax({
        type: "POST",
        url: "<?php echo base_url() ?>Site/suggestion_live",
        data: "value="+key,

        success: function(html) {
              var mydata = JSON.parse(html);
            // console.log('asd');return false;
            $('.Brands li').addClass('displaynone');
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
    if ( typeof vars[hash[0]] == 'undefined'){

                  // console.log(this.ID);return false;
        $(".Brands").append('<li class="hello'+this.ID+'"><a href="?brand='+this.Name.toLowerCase()+'"><span class="tab">'+this.Name+'</span></a></li>'); }
        else{
           $(".Brands").append('<li class="hello'+this.ID+'"><a href="<?php print_r($_SERVER['REQUEST_URI']); ?>&brand='+this.Name.toLowerCase()+'"><span class="tab">'+this.Name+'</span></a></li>');
        }

          });
        },
    });
        return false;

  }
</script>
<div class="footer_outer">
<div class="container-fluid">
<div class="row footer PADD_ThREee">
    <div class="col-md-3 col-sm-3">
        <h2>Shop</h2>
        <ul class="footer_nav">
            <li><a href="<?php echo base_url('sell-fitness-equipment'); ?>">Sell Fitness Equipment</a></li>
            <li><a href="http://globalfitnessrentals.com" target="_blank">Rent Fitness Equipment</a></li>
            <!-- <li><a href="<?php //echo base_url('/page'); ?>/Educational-Sales">Educational Sales</a></li> -->
            <!-- <li><a href="<?php //echo base_url('/page'); ?>/Donations">Donations</a></li> -->
            <li><a href="http://www.blog.globalfitness.com/category/donations-and-sponsorship/" target="_blank">Donations & Sponsorship</a></li>
            <!-- <li><a href="<?php// echo base_url('/page'); ?>/Government-Sales">Government Sales</a></li> -->
            <!-- <li><a href="<?php //echo base_url('/page'); ?>/Gym-Owners">Gym Owners</a></li> -->
            <li><a href="http://www.blog.globalfitness.com/category/gym-owners/" target="_blank">Gym Owners</a></li>
            <li><a href="<?php echo base_url('page/international-gym-equipment-sales'); ?>">International Sales</a></li>
        </ul>
    </div>
    <div class="col-md-3 col-sm-3">
        <h2>About Us</h2>
        <ul class="footer_nav">
            <li><a href="<?php echo base_url('about-global-fitness'); ?>">About Global Fitness</a></li>
            <li><a href="<?php echo base_url('page/terms-&-conditions'); ?>">Terms & Conditions</a></li>
            <li><a href="<?php echo base_url('page/privacy-policy'); ?>">Privacy Policy</a></li>
            <li><a href="<?php echo base_url('page/legal'); ?>">Legal</a></li>
            <li><a href="<?php echo base_url('page/contact-us'); ?>">Contact Us</a></li>
            <li><a href="https://www.yelp.com/biz/globalfitness-fitness-equipment-gardena-2" target="_blank">Testimonials</a></li>
            <li><a href="http://www.blog.globalfitness.com/category/fitness-press-and-media-articles/" target="_blank">Press & Media</a></li>
        </ul>
    </div>
    <div class="col-md-3 col-sm-3">
        <h2>Support</h2>
        <ul class="footer_nav">
            <li><a href="<?php echo base_url('page/manuals-&-literature'); ?>">Manuals & Literature</a></li>
            <li><a href="http://www.blog.globalfitness.com/category/product-help/" target="_blank">Product Help</a></li>
            <li><a href="" data-toggle="modal" data-target="#ReGISTER_MY_PURChase">Register Purchase</a></li>
            <li><a href="<?php echo base_url('replacement-gym-parts'); ?>">Replacement Gym Parts</a></li>
            <li><a href="<?php echo base_url('page/schedule-service'); ?>">Schedule Service</a></li>
        </ul>
    </div>
    <div class="col-md-3 col-sm-3">
        <h2>Connect With Us</h2>
                <ul class="footer_nav">
            <?php
$page = $this->Site_model->customepagedetail();
   foreach($page as $p){
?>
                <li><a target="_blank" href="<?php echo $p->title; ?>"><?php echo $p->Type; ?></a></li>
                <?php
}
?>
        </ul>
    </div>
</div>
</div>
</div>
<section id="responsive_footer_menu">
<div class="container-fluid">
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingOne">
                    <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <i class="more-less glyphicon glyphicon-plus"></i> About Us</a>
                    </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
                    <ul class="footer_nav">
                        <li><a href="<?php echo base_url('about-global-fitness'); ?>">About Global Fitness</a></li>
                        <li><a href="<?php echo base_url('page/terms-&-conditions'); ?>">Terms & Conditions</a></li>
                        <li><a href="<?php echo base_url('page/privacy-policy'); ?>">Privacy Policy</a></li>
                        <li><a href="<?php echo base_url('page/legal'); ?>">Legal</a></li>
                        <li><a href="<?php echo base_url('page/contact-us'); ?>">Contact Us</a></li>
                        <li><a href="https://www.yelp.com/biz/globalfitness-fitness-equipment-gardena-2" target="_blank">Testimonials</a></li>
                        <li><a href="http://www.blog.globalfitness.com/category/fitness-press-and-media-articles/" target="_blank">Press & Media</a></li>
                    </ul>
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingTwo">
                    <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <i class="more-less glyphicon glyphicon-plus"></i>Support</a>
                    </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="panel-body">
                     <ul class="footer_nav">
                        <li><a href="<?php echo base_url('page/manuals-&-literature'); ?>">Manuals & Literature</a></li>
                        <li><a href="http://www.blog.globalfitness.com/category/product-help/" target="_blank">Product Help</a></li>
                        <li><a href="" data-toggle="modal" data-target="#ReGISTER_MY_PURChase">Register Purchase</a></li>
                        <li><a href="<?php echo base_url('replacement-gym-parts'); ?>">Replacement Gym Parts</a></li>
                        <li><a href="<?php echo base_url('page/schedule-service'); ?>">Schedule Service</a></li>
                    </ul>
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingThree">
                    <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            <i class="more-less glyphicon glyphicon-plus"></i>Connect with Us</a>
                    </h4>
                </div>
                <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                    <div class="panel-body">
                    <!--    <ul class="footer_nav">
                        <li><a href="<?php // echo base_url('/page'); ?>/Fitness-Equipment-Sales">Fitness Equipment Sales</a></li>
                        <li><a href="http://www.labistour.com/globalfitnessrentals.com" target="_blank">Rent Fitness Equipment</a></li>
                        <li><a href="<?php // echo base_url('/page'); ?>/Educational-Sales">Educational Sales</a></li>
                        <li><a href="<?php // echo base_url('/page'); ?>/Donations">Donations</a></li>
                        <li><a href="<?php // echo base_url('/page'); ?>/Government-Sales">Government Sales</a></li>
                        <li><a href="<?php // echo base_url('/page'); ?>/Gym-Owners">Gym Owners</a></li>
                        <li><a href="<?php // echo base_url('/page'); ?>/International-Sales">International Sales</a></li>
                      </ul> -->

                    <ul class="footer_nav">
                        <?php
                          $page = $this->Site_model->customepagedetail();
                               $i= 0;
                               foreach($page as $p){
                                $i++;
                            ?>
                            <li class="yes<?php echo $i; ?>"><a target="_blank" href="<?php echo $p->title; ?>"><?php echo $p->Type; ?></a></li>
                            <?php
                                  }
                               ?>
                    </ul>
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingfour">
                    <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsefour" aria-expanded="false" aria-controls="collapsefour">
                            <i class="more-less glyphicon glyphicon-plus"></i>Shop Fitness Equipment</a>
                    </h4>
                </div>
                <div id="collapsefour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingfour">
            <div class="panel-body">
                  <ul class="footer_nav">
                    <li><a href="<?php echo base_url('sell-fitness-equipment'); ?>">Sell Fitness Equipment</a></li>
                    <li><a href="http://www.globalfitnessrentals.com" target="_blank">Rent Fitness Equipment</a></li>
                    <!-- <li><a href="<?php // echo base_url('/page'); ?>/Educational-Sales">Educational Sales</a></li> -->
                    <li><a href="http://www.blog.globalfitness.com/category/donations-and-sponsorship/" target="_blank">Donations & Sponsorship</a></li>
                    <!-- <li><a href="<?php //echo base_url('page/government-sales'); ?>">Government Sales</a></li> -->
                    <li><a href="http://www.blog.globalfitness.com/category/gym-owners/" target="_blank">Gym Owners</a></li>
                    <li><a href="<?php echo base_url('page/international-gym-equipment-sales'); ?>">International Sales</a></li>
                </ul>
              </div>
          </div>
      </div>
  </div><!-- panel-group -->
</div>
</div>
</div>
</section>
<style>/*  #unddd {background: #dad; font-weight: bold; font-size: 16px; }*/  </style>
<section id="BoTTom_footeR">
<div class="container-fluid">
<div class="row footer_bottom PADD_ThREee">
    <div class="col-md-12 col-sm-12">
        <p>Copyright © 2017 Global Fitness, Inc. All rights reserved.</p>
    </div>
</div>
</div>
</section>
<!-- modal for Warenty start -->
<div class="modal fade myModal_email" id="myModal_important_notice" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog email_model_box">
        <div class="modal-content">
            <div class="modal-header">
                <div class="Border_PopUP">
                    <div class="paddingg">
                        <div class="Email_auttoo">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title" id="myModalLabel" style="color:#cc0033 !important;">IMPORTANT NOTICE</h4>

                        </div>
                        <div class="modal-body">
                            <div class="Email_successfull_content_PEnaL">
                                <p style="color:#888888; margin-top:5px; font-size:15px;">
                                    Dear Valued Client<br>
                                    There is a possibility that we may not be able to process this purchase since this machine is often sold in a circuit (multiple-piece collective)<br><br>
                                    We will confirm this internally and will urgently revert back and confirm accordingly and you will not be charged until we have communicated with you
                                </p>
                                <div class="IMportant_notice_checkbox" style="color:#333333 !important;">
                                <a  href="<?php
                                    if(isset($detail[0]->ListID)){
                                echo base_url('site/addcart').'/'.$detail[0]->ListID ;} ?>" id="addcart"><input type="checkbox" id="CheckCart" name="" value=""></a>  I Accept that there is a chance that this order may not be filled and that my card will only be billed if it is shipped.</div>
                                <a href="" style="color:#268aff; margin-top:5px; font-size:15px;" data-dismiss="modal" aria-label="Close">Close</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</div>
<!-- Modal for request a call end -->


<!-- modal for UpsellProduct start -->

<!-- filter_responsive_view_popup -->
<?php if(isset($myname)){ ?>
<div class="modal fade " id="myModal" role="dialog">
  <div class="modal-dialog ">
      <div class="modal-content FILTER_VIEW_POP_Up">
          <div class="modal-header">
              <button type="button" class="close colo_blue pull-left" data-dismiss="modal" aria-label=""> Reset <span>×</span></button>
              <button type="button" class="DONE_BUTTON_filter">Apply</button>
          </div>
          <div class="modal-body">
            <form role="form" method="post" action="" class="form-horizontal">
                <!-- filter_view_like_apple -->
                <!-- panel-group -->
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default FILETR_SIDER">
                        <div class="panel-heading" role="tab" id="Availability_CustRESPON">
                            <h4 class="panel-title">
                              <a role="button" data-toggle="collapse" data-parent="#accordion" href="#AvailabilityRESPON" aria-expanded="true" aria-controls="AvailabilityRESPON">
                                  <i class="more-less glyphicon glyphicon-plus"></i>Availability</a>
                            </h4>
                        </div>
                        <div id="AvailabilityRESPON" class="panel-collapse collapse" role="tabpanel" aria-labelledby="Availability_CustRESPON">
                            <div class="panel-body">
                                <ul class="filter_view_laTEST_nav Availability">
                                    <?php if(isset($_GET)  && !empty($_GET)){ ?>
                                    <li>
                                        <a href="<?php print_r($_SERVER['REQUEST_URI']); ?>&availability=<?php echo  'in-stock'; ?>">
                                            <?php echo  "In Stock"; ?>
                                        </a>
                                    </li>
                                    <?php
                                        }
                                          else{ ?>
                                        <li>
                                            <a href="?availability=<?php echo  'in-stock'; ?>">
                                                <?php echo  "In Stock"; ?>
                                            </a>
                                        </li>
                                        <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default FILETR_SIDER">
                        <div class="panel-heading" role="tab" id="Brand_CustRESPON">
                            <h4 class="panel-title">
                              <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#BrandRESPON" aria-expanded="false" aria-controls="BrandRESPON">
                                  <i class="more-less glyphicon glyphicon-plus"></i>Brand</a>
                            </h4>
                        </div>
                        <div class="input-group Filter_PP_SERCH_cont displaynone" id="showbrand">
                            <div class="ICON_SRCh"><i class="glyphicon glyphicon-search"></i></div>
                            <input type="text" onkeyup="suggestionlist();" class="form-control" placeholder="Search Brand" name="srch-term" id="n_data">
                        </div>
                        <div id="BrandRESPON" class="panel-collapse collapse" role="tabpanel" aria-labelledby="Brand_CustRESPON">
                            <div class="panel-body">
                                <ul class="filter_view_laTEST_nav Brands" id ="brand">
                                    <?php
                                          $k = 0;
                                          if(isset($brand) && !empty($brand)){
                                           foreach($brand as $amp){
                                            $k++;
                                            if($strength_equipment == 'Category'){
                                                if(isset($_GET) && !empty($_GET)){
                                                        ?>
                                        <li class=' <?php if($k>10){ echo "displaynone";} ?>'><a href="<?php print_r($_SERVER['REQUEST_URI']); ?>&brand=<?php  $name  = str_replace(" ", "-",$amp->BrandName);
      $name = strtolower($name);
      echo $name; ?>"><?php echo  $amp->BrandName; ?></a></li>
                                        <?php }
                                        else{
                                         ?>
                                        <li class=' <?php if($k>10){ echo "displaynone";} ?>'><a href="?brand=<?php
                                        $name  = str_replace(" ", "-",$amp->BrandName);
      $name = strtolower($name);
      echo $name; ?>"><?php echo  $amp->BrandName; ?></a></li>
                                        <?php

                                        }
                                           }

                                              if(isset($_GET) && !empty($_GET) && $strength_equipment != 'Category'){
                                                        ?>
                                        <li class=' <?php if($k>10){ echo "displaynone";} ?>'><a href="<?php print_r($_SERVER['REQUEST_URI']); ?>&brand=<?php  $name  = str_replace(" ", "-",$amp->Name);
      $name = strtolower($name);
      echo $name; ?>"><?php echo  $amp->Name; ?></a></li>
                                        <?php }
                                          else{
                                           ?>
                                        <li class=' <?php if($k>10){ echo "displaynone";} ?>'><a href="?brand=<?php $name  = str_replace(" ", "-",$amp->Name);
      $name = strtolower($name);
      echo $name; ?>"><?php echo  $amp->Name; ?></a></li>
                                        <?php

                                            }
                                          }
                                          }     ?>
                                                                        <?php
                                                    if(count($brand)>9){
                                                        ?>
                                        <a href="#" id="hidebrand">
                                            <div class="input-group Filter_PP_SERCH_cont" id="hidebrand">
                                                <div class="ICON_SRCh"><i class="glyphicon glyphicon-search"></i></div>
                                                <input type="text" class="form-control" placeholder="Search Brand" name="srch-term" id="srch-term_aa">
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
                        <div class="panel-heading" role="tab" id="CategoryProduct_CustRESPON">
                            <h4 class="panel-title">
                              <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#CategoryProductRESPON" aria-expanded="false" aria-controls="CategoryProductRESPON">
                                  <i class="more-less glyphicon glyphicon-plus"></i>Category</a>
                            </h4>
                        </div>
                        <div id="CategoryProductRESPON" class="panel-collapse collapse" role="tabpanel" aria-labelledby="CategoryProduct_CustRESPON">
                            <div class="panel-body">
                                <ul class="filter_view_laTEST_nav Category">
                                    <?php
                                      $k = 0;
                                      foreach($mmcategory as $br){
                                          $k++;
                                      ?>
                                    <li class=' <?php if($k>10){ echo "displaynone";} ?>'><a href="?category=<?php $name  = str_replace(" ", "-",$br->Name);
      $name = strtolower($name);
      echo $name; ?>"><?php echo $br->Name ; ?></a></li>
                                    <?php
                                          }
                                          ?>
                                                                    <?php
                                                if(count($mmcategory)>9){
                                                    ?>
                                        <li class="showmore">
                                            <a href="#" class="clickmore" data-val="more" style='color: #337ab7 !important;'>More Category </a>
                                        </li>
                                        <li class="showless displaynone">
                                            <a href="#" data-val="less" class="clickmore" style='color: #337ab7 !important;'>Less Category </a>
                                        </li>
                                        <?php
                                            }
                                          ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default FILETR_SIDER">
                        <div class="panel-heading" role="tab" id="ConditionProduct_CustRESPON">
                            <h4 class="panel-title">
                              <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#ConditionProductRESPON" aria-expanded="false" aria-controls="ConditionProductRESPON">
                                  <i class="more-less glyphicon glyphicon-plus"></i>Condition</a>
                            </h4>
                        </div>
                        <div id="ConditionProductRESPON" class="panel-collapse collapse" role="tabpanel" aria-labelledby="ConditionProduct_CustRESPON">
                            <div class="panel-body">
                                <ul class="filter_view_laTEST_nav Condition">
                                    <?php
                                      foreach($condition as $cr){
                                      if(isset($_GET)  && !empty($_GET)){

                                            ?>
                                        <li> <a id="condition<?php echo  $cr->Name; ?>" href="<?php print_r($_SERVER['REQUEST_URI']); ?>&condition=<?php  $name  = str_replace(" ", "-",$cr->Name);
                                     $name = strtolower($name);
                                  echo $name; ?>"><?php echo   $cr->Name; ?></a></li>
                                  <?php } else{ ?>
                                  <li> <a id="condition<?php echo  $cr->Name; ?>" href="?condition=<?php $name  = str_replace(" ", "-",$cr->Name);
                                  $name = strtolower($name);
                                  echo $name; ?>"><?php echo   $cr->Name; ?></a></li>
                                  <?php }
                                  }
                                          ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default FILETR_SIDER">
                        <div class="panel-heading" role="tab" id="PieceProduct_CustRESPON">
                            <h4 class="panel-title">
                              <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#PieceProductRESPON" aria-expanded="false" aria-controls="PieceProductRESPON">
                                  <i class="more-less glyphicon glyphicon-plus"></i>Piece</a>
                            </h4>
                        </div>
                        <div class="input-group Filter_PP_SERCH_cont displaynone" id="showThisDivPiece">
                            <div class="ICON_SRCh"><i class="glyphicon glyphicon-search"></i></div>
                            <input type="text" onkeyup="mysuggestions();" class="form-control" placeholder="Search Piece" name="srch-term" id="sgs_data">
                        </div>
                        <div id="PieceProductRESPON" class="panel-collapse collapse" role="tabpanel" aria-labelledby="PieceProduct_CustRESPON">
                            <div class="panel-body">
                                <ul class="filter_view_laTEST_nav Pieces">
                                    <?php
                                      $ppp = 0;
                                      foreach($piece as $amp){
                                            $ppp++;
                                      ?>
                                    <li class='<?php
                                      if($ppp>10){ echo
                                          "displaynone";} ?>'>
                                          <?php if(isset($_GET)  && !empty($_GET)){

                                            ?>
                                        <a class="mainvalclick " id="piece<?php echo $amp->ID; ?>" href="<?php print_r($_SERVER['REQUEST_URI']); ?>&piece=<?php
                                            $name  = str_replace(" ", "-",$amp->Piece);
                                            $name = strtolower($name);
                                            echo $name; ?>"><?php echo  $amp->Piece; ?></a></li>
                                            <?php } else{ ?>
                                            <a class="mainvalclick " id="piece<?php echo $amp->ID; ?>" href="?piece=<?php
                                            $name  = str_replace(" ", "-",$amp->Piece);
                                            $name = strtolower($name);
                                            echo $name; ?>"><?php echo  $amp->Piece; ?></a></li>
                                            <?php }
                                            } ?>
                                    <?php
                                    if(count($piece)>9){
                                    ?>
                                    <a href="#" id="hideThisPiece">
                                        <div class="input-group Filter_PP_SERCH_cont" id="hideThisPiece">
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
                        <div class="panel-heading" role="tab" id="PriceProduct_CustRESPON">
                            <h4 class="panel-title">
                              <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#PriceProductRESPON" aria-expanded="false" aria-controls="PriceProductRESPON">
                                  <i class="more-less glyphicon glyphicon-plus"></i>Price</a>
                            </h4>
                        </div>
                        <div id="PriceProductRESPON" class="panel-collapse collapse" role="tabpanel" aria-labelledby="PriceProduct_CustRESPON">
                            <div class="panel-body">
                                <ul class="filter_view_laTEST_nav Price">
                                    <?php if(isset($_GET)  && !empty($_GET)){

                                    ?>
                                    <li>
                                        <a href="<?php print_r($_SERVER['REQUEST_URI']); ?>&price=<?php echo  'ascending'; ?>">
                                            <?php echo 'Ascending'; ?>
                                        </a>
                                    </li>
                                    <?php }else{?>
                                    <li>
                                        <a href="?Price=<?php echo  'ascending'; ?>">
                                            <?php echo 'Ascending'; ?>
                                        </a>
                                    </li>
                                    <?php } if(isset($_GET)  && !empty($_GET)){ ?>
                                    <li>
                                        <a href="<?php print_r($_SERVER['REQUEST_URI']); ?>&price=<?php echo  'descending'; ?>">
                                            <?php echo  'Descending'; ?>
                                        </a>
                                    </li>
                                    <?php }else{ ?>
                                    <li>
                                        <a href="?price=<?php echo  'descending'; ?>">
                                            <?php echo  'Descending'; ?>
                                        </a>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default FILETR_SIDER">
                        <div class="panel-heading" role="tab" id="RatingProduct_CustRESPON">
                            <h4 class="panel-title">
                              <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#RatingProductRESPON" aria-expanded="false" aria-controls="RatingProductRESPON">
                                  <i class="more-less glyphicon glyphicon-plus"></i>Rating</a>
                            </h4>
                        </div>
                        <div id="RatingProductRESPON" class="panel-collapse collapse" role="tabpanel" aria-labelledby="RatingProduct_CustRESPON">
                            <div class="panel-body">
                                <ul class="filter_view_laTEST_nav Rating">
                                    <?php  if(isset($_GET) && !empty($_GET)){
                                    ?>
                                    <li>
                                        <a href="<?php print_r($_SERVER['REQUEST_URI']); ?>&rating=<?php echo  'ascending'; ?>"><?php echo 'Ascending'; ?>
                                        </a>
                                    </li>
                                    <?php } else{ ?>
                                    <li>
                                        <a href="?Rating=<?php echo  'ascending'; ?>">
                                            <?php echo  'Ascending'; ?>
                                        </a>
                                    </li>
                                    <?php } ?>
                                    <?php if(isset($_GET)  && !empty($_GET)){ ?>
                                    <li>
                                        <a href="<?php print_r($_SERVER['REQUEST_URI']); ?>&rating=<?php echo  'descending'; ?>">
                                            <?php echo 'Descending'; ?>
                                        </a>
                                    </li>
                                    <?php } else{ ?>
                                    <li>
                                        <a href="?rating=<?php echo  'descending'; ?>">
                                            <?php echo  'Descending'; ?>
                                        </a>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- panel-group -->
                <!-- filter_view_like_apple -->
            </form>
          </div>
      </div>
  </div>
</div>
<?php }?>
<!-- filter_responsive_view_popup -->
<?php
 if(isset($_POST['submit_RegisterProduct'])){
    unset($_POST['submit_RegisterProduct']);
   $result =  $this->Site_model->insertData('zFitnessProductRegister');
   if($result == 1){
                      $body = "<p><strong>Dear Webmaster,</strong></p>
                      <p><strong>First Name:</strong>".$_POST['firstname_contactus']."</p>
                      <p><strong>Last Name:</strong>".$_POST['lastname_contactus']."</p>
                      <p><strong>Email:</strong> ".$_POST['email_contactus']."</p>
                      <p><strong>Telephone:</strong>".$_POST['telephone_contactus']."</p>
                      <p><strong>Subject:</strong>Product Rental Question | Product Page</p>
                      <p><strong>Message:</strong> ".$_POST['message_contactus']."</p>
                      <p>Thank You</p>";


                     // print_r($body);die;
                        $headers = 'MIME-Version: 1.0' . "\r\n";
                        $headers .= 'Content-type:text/html;charset=UTF-8' . "\r\n";
                        $from = "support@globalfitness.net";
                        $to = "email@globalfitness.net";
                        // $to = 'labistour@gmail.com';
                        $subject = $text;
                        $message = $body;
                        $headers .= 'From: '.$from. "\r\n"."X-Mailer: PHP/" . phpversion();
                        mail($to,$subject,$message,$headers);

                    /////////////////rudra code /////////////////////




     }
   }
 ?>
<!-- modal for ReGISTER_MY_PURChase start  -->
<div class="modal fade ReGISTER_MY_PURChase" id="ReGISTER_MY_PURChase" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog email_model_box ReGISTER_MY_PURChase">
        <div class="modal-content">
            <div class="modal-header">
                <div class="paddingg">
                    <div class="Email_auttoo_mypurchase">
                        <h4 class="modal-title" id="myModalLabel" style="color:#007fff;">Register My Purchase</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <img alt ="popup"  src="<?php echo base_url() ?>/public/assets/images/close_icon_popup.png">
                            <!-- <span aria-hidden="true">&times;</span> -->
                        </button>
                    </div>
                    <div class="box">
                <span class="error" style="color:red;"></span>
            </div>
                    <div class="modal-body">
                        <form method='post'  name='RegisterProduct'  id='RegisterPurchase'>
                            <div class="first_penal_ship">
                                <div class="form-group">
                                    <input required id="firstname_RegisterPurchase" class="form-control firstname" name="FirstName" value="" placeholder="First Name (required)" type="text">
                                </div>
                                <div class="form-group_second">
                                    <input required value="" id="lastname_RegisterPurchase" name="LastName" class="form-control lastname" placeholder="Last Name (required)" type="text">
                                </div>
                            </div>
                            <div class="fourth_penal_ship">
                                <div class="form-group">
                                    <input required id="email_RegisterPurchase" value="" name="Email" class="form-control StreetAddress" placeholder="Email address (required)" type="text">
                                </div>
                            </div>

                            <div class="fourth_penal_ship">
                                <div class="form-group">
                                    <input  id="ordernumber_RegisterPurchase" value="" name="OrderNumber" class="form-control StreetAddress" placeholder="Order Number, or Invoice Number (optional)" type="text">
                                </div>
                            </div>

                            <div class="fourth_penal_ship">
                                <div class="form-group">
                                    <input required id="dob_RegisterPurchase"  name="DateOfPurchase" class="form-control StreetAddress" placeholder="Approximate Date of Purchase (required)" type="text">
                                </div>
                            </div>
                            <div class="fourth_penal_ship">
                                <h4 class="Normal_text_penal">Where and how was this product purchased?</h4>
                                <div class="form-group">
                                    <select class="form-control" name ="DropDownOne" id="DropDownOne_RegisterPurchase">
                                        <option disabled="disabled" selected="selected">Please Select (required)</option>
                                        <option value ="In Person" name="In Person">In Person</option>
                                        <option value ="Online" name="Online">Online</option>
                                        <option value ="Over the phone" name="Over the phone">Over the phone</option>
                                    </select>
                                </div>
                            </div>

                            <div class="fourth_penal_ship">
                                <h4 class="Normal_text_penal">How did you first become aware of Global Fitness? </h4>
                                <div class="form-group">
                                    <select class="form-control" name="DropDownTwo" id="DropDownTwo_RegisterPurchase">
                                        <option disabled="disabled" selected="selected">Please Select (required)</option>
                                        <option value ="Internet - Online Search" name="Internet - Online Search">Internet / Online Search</option>
                                        <option value ="Magazine Ad - Catalog" name="Magazine Ad - Catalog">Magazine Ad / Catalog</option>
                                        <option value ="Referral" name="Referral">Referral</option>
                                        <option value ="Social Media" name="Social Media">Social Media</option>
                                        <option value ="Trade Show" name="Trade Show">Trade Show</option>
                                        <option value ="Yelp" name="Yelp" >Yelp</option>
                                    </select>
                                </div>
                            </div>

                            <div class="fourth_penal_ship">
                                <h4 class="Normal_text_penal">What was the most influential information in deciding on this purchase?</h4>
                                <div class="form-group">
                                <select class="form-control" name = "DropDownThree" id="DropDownThree_RegisterPurchase">
                                        <option disabled="disabled" selected="selected">Please Select (required)</option>
                                        <option name="Friend/Family/Colleague/Business" value="Friend/Family/Colleague/Business">Friend/Family/Colleague/Business</option>
                                        <option  name="Reviews" value="Reviews">Reviews</option>
                                        <option name="Sales Person" value="Sales Person">Sales Person</option>
                                        <option name="Website" value="Website">Website</option>
                                    </select>
                                </div>
                            </div>

                            <div class="fourth_penal_ship">
                                <h4 class="Normal_text_penal">How do you expect to use your new/used/refurbished unit?</h4>
                                <div class="form-group">
                                   <select class="form-control" name = "DropDownFour" id="DropDownFour_RegisterPurchase">
                                        <option disabled="disabled" >Please Select (required)</option>
                                        <option name="Commercial or Professional" value="Commercial or Professional">Commercial or Professional</option>
                                        <option name="Personal" value="Personal">Personal</option>
                                    </select>
                                </div>
                            </div>
                            <div id='recaptcha9' class='g-recaptcha-response'></div>
                            <div class="EmailSubmiuttt_penal green_color">
                               <input type='submit' class="btn drop_ad" name='submit_RegisterProduct' id="submit_RegisterProduct" value='Send Email'>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="pop_UP_FOOTER">
                    <h5>Copyright © 2017 Global Fitness, Inc. All rights reserved.</h5>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
</div>
<!-- modal for ReGISTER_MY_PURChase end  -->

<div class="modal fade" id="myModal_login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog Login_pOP" role="document">
        <div class="modal-content">
            <div class="paddingg">
                <div class="modal-header">
                    <div class="auttoo">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Your Account</h4>
                        <div class="ussrr">
                            <img alt ="user"  src="<?php echo base_url() ?>/public/assets/images/usser.png">
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="box">
                        <span class="error" style="color:red;"></span>
                    </div>
                    <div class="box">
                        <input type="text" id="myphn" placeholder="Email/Username">
                        <input type="Password" id="mypass" placeholder="Password">
                        <div id='recaptcha1' class='g-recaptcha-response'></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="submit">
                        <input id="mylogin" type="button" value="Submit">
                    </div>
                    <!--end submit-->
                    <div class="user">
                        <p>New user ? <span><a href="#" data-target="#myModal_register" data-dismiss="modal" data-toggle="modal" class="showlogin">Sign Up</a></span></p>
                        <p><span><a href="<?php echo base_url('/user/forgetpassword'); ?>" id="abc" data-attr="0" class="showlogin">Forget Password</a></span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- modal for email me start  -->
<div class="modal fade myModal_email" id="myModal_email" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog email_model_box">
<div class="modal-content">
    <div class="modal-header">
        <div class="paddingg">
            <div class="Email_auttoo">
                <h4 class="modal-title" id="myModalLabel">Price Inquiry</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <img alt ="popup"  src="<?php echo base_url() ?>/public/assets/images/close_icon_popup.png">
                    <!-- <span aria-hidden="true">&times;</span> -->
                </button>

            </div>
            <div class="modal-body">
                <div class="box">
                    <span class="error" id='error' style="color:red;"></span>
                </div>
                <form method='post' name='email_m' id='email_m'>
                    <div class="first_penal_ship">
                        <div class="form-group">
                            <input required id="Email_firstname" class="form-control firstname" name="firstname" value="<?php if(isset($_SESSION['userId'])){ echo $_SESSION['firstname']; }  ?>" placeholder="First Name (required)" type="text">
                        </div>
                        <div class="form-group_second">
                            <input required value="<?php if(isset($_SESSION['userId'])){ echo $_SESSION['lastname']; }  ?>" id="Email_lastname" name="lastname" class="form-control lastname" placeholder="Last Name (required)" type="text">
                        </div>
                    </div>
                    <div class="fourth_penal_ship">
                        <div class="form-group">
                            <input required id="email_address" value="<?php if(isset($_SESSION['userId'])){ echo $_SESSION['email']; }  ?>" name="email_address" class="form-control StreetAddress" placeholder="Email address (required)" type="text">
                        </div>
                    </div>
                    <div class="fourth_penal_ship">
                        <div class="form-group">
                            <input required id="Email_TEl_no" value="<?php if(isset($_SESSION['userId'])){ echo $_SESSION['phone_number']; }  ?>" name="phone_number" class="form-control StreetAddress" placeholder="Telephone Number (required)" type="text">
                        </div>
                    </div>
                    <div class="Emailtext_area_penal"></div>
                    <input type='hidden' name='productId' value='<?php  echo $detail[0]->ListID; ?>'>
                    <input type='hidden' name='productName' value='<?php echo $detail[0]->ProductName; ?>'>
                    <input type='hidden' name='brandName' value='<?php echo $detail[0]->BrandName; ?>'>
                    <input type='hidden' name='versionName' value='<?php echo $detail[0]->VersionName; ?>'>
                    <input type='hidden' name='sku' value='<?php echo $detail[0]->StockKeepingUnit; ?>'>
                    <textarea name="message" id='message' required>Hi There! I am inquiring about a price on this <?php if(isset($detail[0]->ProductName)){ echo  $detail[0]->ProductName ; } ?>, can you please contact me with this information?</textarea>
                    <div id="recaptcha2" class='g-recaptcha-response'></div>
                    <!-- <div id='recaptcha' class='g-recaptcha-response'></div> -->
            </div>
            <div class="EmailSubmiuttt_penal green_color">
                <input type='submit' class="btn drop_ad" name='email_m' value='Send Email' id='email_me'>
            </div>
            </form>
        </div>
    </div>
    <div class="Email_bottom_foter">
        <h1>Questions</h1>
        <div class="Email_bottom_foter_content">
            <h2>Why do some products on your website have no pricing?</h2>
            <p>Some of our products we list online are void of pricing because a recent transaction has significanlty altered the value of the product and Global Fitness is adjusting the sale price accordingly. Please complete and submit this form and we can get you a price right away! </p>
        </div>
        <div class="row footer_bottom">
            <div class="col-md-12 col-sm-12">
                <p>Copyright &copy; 2017 Global Fitness, Inc. All rights reserved.</p>
            </div>
        </div>
    </div>
</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
</div>
<!-- Modal for email me end -->
<!-- modal for email me start  -->
<div class="modal fade waitlistMeModal" id="waitlistMeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog email_model_box">
<div class="modal-content">
    <div class="modal-header">
        <div class="paddingg">
            <div class="Email_auttoo">
                <h4 class="modal-title" id="myModalLabel">Wait List Request</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <img alt ="icon_popup"  src="<?php echo base_url() ?>/public/assets/images/close_icon_popup.png">
                    <!-- <span aria-hidden="true">&times;</span> -->
                </button>

            </div>
            <div class="modal-body">
                <div class="box">
                    <span class="error" id='error' style="color:red;"></span>
                </div>
                <form method='post' name='waitlist_m' id='waitlist_m'>
                    <div class="first_penal_ship">
                        <div class="form-group">
                            <input required id="firstname_waitlist" class="form-control firstname" name="firstname_waitlist" value="<?php if(isset($_SESSION['userId'])){ echo $_SESSION['firstname']; }  ?>" placeholder="First Name (required)" type="text">
                        </div>
                        <div class="form-group_second">
                            <input required value="<?php if(isset($_SESSION['userId'])){ echo $_SESSION['lastname']; }  ?>" id="lastname_waitlist" name="lastname_waitlist" class="form-control lastname" placeholder="Last Name (required)" type="text">
                        </div>
                    </div>
                    <div class="fourth_penal_ship">
                        <div class="form-group">
                            <input required id="email_address_waitlist" value="<?php if(isset($_SESSION['userId'])){ echo $_SESSION['email']; }  ?>" name="email_address_waitlist" class="form-control StreetAddress" placeholder="Email address (required)" type="text">
                        </div>
                    </div>
                    <div class="fourth_penal_ship">
                        <div class="form-group">
                            <input required id="phone_number_waitlist" value="<?php if(isset($_SESSION['userId'])){ echo $_SESSION['phone_number']; }  ?>" name="phone_number_waitlist" class="form-control StreetAddress" placeholder="Telephone Number (required)" type="text">
                        </div>
                    </div>
                    <div class="Emailtext_area_penal"></div>
                    <input type='hidden' name='productId_waitlist' value='<?php  echo $detail[0]->ListID; ?>'>
                    <input type='hidden' name='productName' value='<?php echo $detail[0]->ProductName; ?>'>
                    <input type='hidden' name='brandName' value='<?php echo $detail[0]->BrandName; ?>'>
                    <input type='hidden' name='versionName' value='<?php echo $detail[0]->VersionName; ?>'>
                    <input type='hidden' name='sku' value='<?php echo $detail[0]->StockKeepingUnit; ?>'>
                    <textarea name="message_waitlist" id='message_waitlist' required>Hi There!&#13;&#10;Please add me to the wait list for this <?php if(isset($detail[0]->ProductName)){ echo  $detail[0]->ProductName ; } ?>&#13;&#10;Thanks</textarea>
                    <div id="recaptcha4" class='g-recaptcha-response'></div>
                    <!-- <div id='recaptcha' class='g-recaptcha-response'></div> -->
            </div>
            <div class="EmailSubmiuttt_penal green_color">
                <input type='submit' class="btn drop_ad" name='waitlist_me' value='Send Email' id='waitlist_me'>
            </div>
            </form>
        </div>
    </div>
    <div class="Email_bottom_foter">
        <h1>Questions</h1>
        <div class="Email_bottom_foter_content">
            <h2>How do I know where on the wait list I am for a particular product?</h2>
            <p>That is easy, once you submit this form a dilog form will open showing you a where you stand on the list at the given moment. Whenever a customer order is filled you position will be updated and you shall receive an email updating you with you new position.</p>
        </div>
        <div class="row footer_bottom">
            <div class="col-md-12 col-sm-12">
                <p>Copyright &copy; 2017 Global Fitness, Inc. All rights reserved.</p>
            </div>
        </div>
    </div>
</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
</div>
<!-- Modal for email me end -->
<!-- modal for email me start -->
<div class="modal fade myModal_email" id="myModal_email_Sucessfull" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog email_model_box">
<div class="modal-content">
    <div class="modal-header">
        <div class="Border_PopUP">
            <div class="paddingg">
                <div class="Email_auttoo">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Email sent successfully</h4>

                </div>
                <div class="modal-body">
                    <div class="Email_successfull_content_PEnaL">
                        <!-- <span> <span class="proDuct_Name">--><?php if(isset($_POST['firstname'])){ echo $_POST['firstname']; } ?>,
                        <!-- </span> -->thank you for getting in touch!
                        <br> We appreciate you contacting us about the
                        <?php if(isset($detail[0]->ProductName)){ echo  $detail[0]->ProductName ; } ?>
                        <!-- </span> -->. We try to respond as soon as possible, so one of our Customer Service colleagues will get back to you within a few hours.
                        <br> Have a great day!
                        <br><a href="" style="color:#268aff; margin-top:5px; font-size:15px;" data-dismiss="modal" aria-label="Close">Close</a>
                    </div>
                </div>
                <div class="row footer_bottom footer_bottom_popup">
                    <div class="col-md-12 col-sm-12">
                        <p>Copyright &copy; 2017 Global Fitness, Inc. All rights reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
</div>
<!-- Modal for email me end -->
<!-- modal for email me start -->
<div class="modal fade myModal_email" id="myModal_email_waitlist" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog email_model_box">
<div class="modal-content">
    <div class="modal-header">
        <div class="Border_PopUP">
            <div class="paddingg">
                <div class="Email_auttoo">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Email sent successfully</h4>
                 </div>
                <div class="modal-body">
                    <div class="Email_successfull_content_PEnaL">
                        <p style="color:#268aff; margin-top:5px; font-size:15px;"><?php if(isset($_POST['firstname_waitlist'])){ echo $_POST['firstname_waitlist']; } ?>, here is your position on the wait list for:</p>
                        <p>"
                            <?php if(isset($detail[0]->ProductName)){ echo  $detail[0]->ProductName ; } ?>"</p>
                        <p><b>Your Position: <?php echo $position; ?></b>&nbsp;&nbsp;&nbsp; sku : "<span style="color:#268aff; margin-top:5px; font-size:15px;"><?php echo $detail[0]->StockKeepingUnit; ?></span>"</p>
                        <?php
$x=1;
$count=count($WaitListRank);
foreach($WaitListRank as $WaitListRankVal)
{
if($x==10 and $count>10 )
{
echo "<p>&nbsp;&nbsp;&nbsp;...</p>";
}elseif($x<10)
{
echo "<p><b>".$x.") </b>".$WaitListRankVal->firstName." ".$WaitListRankVal->lastName."</p>";
}elseif($x==$count)
{
echo "<p><b>".$x.") </b>".$WaitListRankVal->firstName." ".$WaitListRankVal->lastName."</p>";
}


$x++;
}
?>
                            <br><a href="" style="color:#268aff; margin-top:5px; font-size:15px;" data-dismiss="modal" aria-label="Close">Close</a>
                    </div>
                </div>
                <div class="row footer_bottom footer_bottom_popup">
                    <div class="col-md-12 col-sm-12">
                        <p>Copyright &copy; 2017 Global Fitness, Inc. All rights reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
</div>
<!-- Modal for email me end -->
<!-- modal for email me start -->
<div class="modal fade myModal_email_waitlist_error" id="myModal_email_waitlist_error" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog email_model_box">
<div class="modal-content">
    <div class="modal-header">
        <div class="Border_PopUP">
            <div class="paddingg">
                <div class="Email_auttoo">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel"><span style="color:red">Sorry, You have already request for waitlist</span></h4>

                </div>
                <div class="modal-body">
                    <div class="Email_successfull_content_PEnaL">
                        <br><a href="" style="color:#268aff; margin-top:5px; font-size:15px;" data-dismiss="modal" aria-label="Close">Close</a>
                    </div>
                </div>
                <div class="row footer_bottom footer_bottom_popup">
                    <div class="col-md-12 col-sm-12">
                        <p>Copyright &copy; 2017 Global Fitness, Inc. All rights reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
</div>
<!-- Modal for email me end -->
<!-- modal for email me start  -->
<div class="modal fade myModal_RentProduct" id="myModal_RentProduct" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog email_model_box">
<div class="modal-content">
    <div class="modal-header">
        <div class="paddingg">
            <div class="Email_auttoo">
                <h4 class="modal-title" id="myModalLabel" style="color:#268aff;">Start Renting Today</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <img alt ="icon"  src="<?php echo base_url() ?>/public/assets/images/close_icon_popup.png">
                    <!-- <span aria-hidden="true">&times;</span> -->
                </button>
            </div>
            <div class="modal-body">

                <form method='post' name='RentProduct' id='RentProduct'>
                    <div class="first_penal_ship">
                        <div class="form-group">
                            <input required id="firstname_RentProduct" class="form-control firstname" name="firstname_RentProduct" value="<?php if(isset($_SESSION['userId'])){ echo $_SESSION['firstname']; }  ?>" placeholder="First Name (required)" type="text">
                        </div>
                        <div class="form-group_second">
                            <input required value="<?php if(isset($_SESSION['userId'])){ echo $_SESSION['lastname']; }  ?>" id="lastname_RentProduct" name="lastname_RentProduct" class="form-control lastname" placeholder="Last Name (required)" type="text">
                        </div>
                    </div>
                    <div class="fourth_penal_ship">
                        <div class="form-group">
                            <input required id="email_address_RentProduct" value="<?php if(isset($_SESSION['userId'])){ echo $_SESSION['email']; }  ?>" name="email_address_RentProduct" class="form-control StreetAddress" placeholder="Email address (required)" type="text">
                        </div>
                    </div>
                    <div class="fourth_penal_ship">
                        <div class="form-group">
                            <input required id="phone_number_RentProduct" value="<?php if(isset($_SESSION['userId'])){ echo $_SESSION['phone_number']; }  ?>" name="phone_number_RentProduct" class="form-control StreetAddress" placeholder="Telephone Number (required)" type="text">
                        </div>
                    </div>
                    <div class="Emailtext_area_penal"></div>
                    <input type='hidden' name='productId_RentProduct' value='<?php  echo $detail[0]->ListID; ?>'>
                    <input type='hidden' name='productName' value='<?php echo $detail[0]->ProductName; ?>'>
                    <input type='hidden' name='brandName' value='<?php echo $detail[0]->BrandName; ?>'>
                    <input type='hidden' name='versionName' value='<?php echo $detail[0]->VersionName; ?>'>
                    <input type='hidden' name='sku' value='<?php echo $detail[0]->StockKeepingUnit; ?>'>
                    <textarea name="message_RentProduct" id='message_RentProduct' required>Hi There!&#13;&#10;I have some questions about renting this <?php if(isset($detail[0]->ProductName)){ echo  $detail[0]->ProductName ; } ?>.&#13;&#10;Please reach out to me about this.&#13;&#10;Thanks</textarea>
                    <div id="recaptcha5" class='g-recaptcha-response'></div>
                    <!-- <div id='recaptcha' class='g-recaptcha-response'></div> -->
            </div>
            <div class="EmailSubmiuttt_penal green_color">
                <input type='submit' class="btn drop_ad" name='email_RentProduct' value='Send Email' id='email_RentProduct'>
            </div>
            </form>
        </div>
    </div>
    <div class="Email_bottom_foter">
        <h1>Questions</h1>
        <div class="Email_bottom_foter_content">
            <h2>How much does it cost to rent equipment from Global Fitness?</h2>
            <p>The cost vary by model, however we can say it costs a fraction of the purchase price and it included maintenance for the life of the contract. We also service the rental fleet on a quarterly basis with free replacement if a unit fails. We charge up front and you pay for delivery only.</p>
        </div>
        <div class="row footer_bottom">
            <div class="col-md-12 col-sm-12">
                <p>Copyright &copy; 2017 Global Fitness, Inc. All rights reserved.</p>
            </div>
        </div>
    </div>
</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
</div>
<!-- Modal for email me end -->
<!-- /////////// rudra code start ////// -->
<div class="modal fade myModal_email" id="myModal_email_GenProduct" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog email_model_box">
<div class="modal-content">
    <div class="modal-header">
        <div class="Border_PopUP">
            <div class="paddingg">
                <div class="Email_auttoo">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Email sent successfully</h4>

                </div>
                <div class="modal-body">
                    <div class="Email_successfull_content_PEnaL">
                        <p style="color:#268aff; margin-top:5px; font-size:15px;"><?php if(isset($_POST['firstname_GenProduct'])){ echo $_POST['firstname_GenProduct']; } ?>, thank you for getting in touch!</p>
                        <p>We appreciate you contacting us about the "
                            <?php if(isset($detail[0]->ProductName)){ echo  $detail[0]->ProductName ; } ?>". We try to respond as soon as possible, so one of our Customer Service colleagues will get back to you within few hours.</p>
                        <p>Have a great day!</p>
                        <br><a href="" style="color:#268aff; margin-top:5px; font-size:15px;" data-dismiss="modal" aria-label="Close">Close</a>
                    </div>
                </div>
                <div class="row footer_bottom footer_bottom_popup">
                    <div class="col-md-12 col-sm-12">
                        <p>Copyright &copy; 2017 Global Fitness, Inc. All rights reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
</div>
<div class="modal fade myModal_email_GenProduct_error" id="myModal_email_GenProduct_error" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog email_model_box">
<div class="modal-content">
    <div class="modal-header">
        <div class="Border_PopUP">
            <div class="paddingg">
                <div class="Email_auttoo">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel"><span style="color:red">Sorry, You have already requested for General Product Question</span></h4>
                </div>
                <div class="modal-body">
                    <div class="Email_successfull_content_PEnaL">
                        <br><a href="" style="color:#268aff; margin-top:5px; font-size:15px;" data-dismiss="modal" aria-label="Close">Close</a>
                    </div>
                </div>
                <div class="row footer_bottom footer_bottom_popup">
                    <div class="col-md-12 col-sm-12">
                        <p>Copyright &copy; 2017 Global Fitness, Inc. All rights reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
</div>
<!-- rudra code ends////// -->
<!-- modal for email me start -->
<div class="modal fade myModal_email" id="myModal_email_RentProduct" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog email_model_box">
<div class="modal-content">
    <div class="modal-header">
        <div class="Border_PopUP">
            <div class="paddingg">
                <div class="Email_auttoo">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Email sent successfully</h4>

                </div>
                <div class="modal-body">
                    <div class="Email_successfull_content_PEnaL">
                        <p style="color:#268aff; margin-top:5px; font-size:15px;"><?php if(isset($_POST['firstname_RentProduct'])){ echo $_POST['firstname_RentProduct']; } ?>, thank you for getting in touch!</p>
                        <p>We appreciate you contacting us about the "
                            <?php if(isset($detail[0]->ProductName)){ echo  $detail[0]->ProductName ; } ?>". We try to respond as soon as possible, so one of our Customer Service colleagues will get back to you within few hours.</p>
                        <p>Have a great day!</p>
                        <br><a href="" style="color:#268aff; margin-top:5px; font-size:15px;" data-dismiss="modal" aria-label="Close">Close</a>
                    </div>
                </div>
                <div class="row footer_bottom footer_bottom_popup">
                    <div class="col-md-12 col-sm-12">
                        <p>Copyright &copy; 2017 Global Fitness, Inc. All rights reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
</div>
<!-- Modal for email me end -->
<!-- modal for email me start -->
<div class="modal fade myModal_email_RentProduct_error" id="myModal_email_RentProduct_error" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog email_model_box">
<div class="modal-content">
    <div class="modal-header">
        <div class="Border_PopUP">
            <div class="paddingg">
                <div class="Email_auttoo">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel"><span style="color:red">Sorry, You have already requested to Rent this Product</span></h4>
                </div>
                <div class="modal-body">
                    <div class="Email_successfull_content_PEnaL">
                        <br><a href="" style="color:#268aff; margin-top:5px; font-size:15px;" data-dismiss="modal" aria-label="Close">Close</a>
                    </div>
                </div>
                <div class="row footer_bottom footer_bottom_popup">
                    <div class="col-md-12 col-sm-12">
                        <p>Copyright &copy; 2017 Global Fitness, Inc. All rights reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
</div>
<!-- Modal for email me end -->
<!-- modal for email me start  -->
<div class="modal fade myModal_SellProduct" id="myModal_SellProduct" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog email_model_box">
<div class="modal-content">
    <div class="modal-header">
        <div class="paddingg">
            <div class="Email_auttoo">
                <h4 class="modal-title" id="myModalLabel" style="color:#268aff;">Sell Your Fitness Equipment</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <img alt ="icon"  src="<?php echo base_url() ?>/public/assets/images/close_icon_popup.png">
                    <!-- <span aria-hidden="true">&times;</span> -->
                </button>

            </div>
            <div class="modal-body">
                <div class="box">
                    <span class="error" id='error' style="color:red;"></span>
                </div>
                <form method='post' name='SellProduct' id='SellProduct'>
                    <div class="first_penal_ship">
                        <div class="form-group">
                            <input required id="firstname_SellProduct" class="form-control firstname" name="firstname_SellProduct" value="<?php if(isset($_SESSION['userId'])){ echo $_SESSION['firstname']; }  ?>" placeholder="First Name (required)" type="text">
                        </div>
                        <div class="form-group_second">
                            <input required value="<?php if(isset($_SESSION['userId'])){ echo $_SESSION['lastname']; }  ?>" id="lastname_SellProduct" name="lastname_SellProduct" class="form-control lastname" placeholder="Last Name (required)" type="text">
                        </div>
                    </div>
                    <div class="fourth_penal_ship">
                        <div class="form-group">
                            <input required id="email_address_SellProduct" value="<?php if(isset($_SESSION['userId'])){ echo $_SESSION['email']; }  ?>" name="email_address_SellProduct" class="form-control StreetAddress" placeholder="Email address (required)" type="text">
                        </div>
                    </div>
                    <div class="fourth_penal_ship">
                        <div class="form-group">
                            <input required id="phone_number_SellProduct" value="<?php if(isset($_SESSION['userId'])){ echo $_SESSION['phone_number']; }  ?>" name="phone_number_SellProduct" class="form-control StreetAddress" placeholder="Telephone Number (required)" type="text">
                        </div>
                    </div>
                    <div class="fourth_penal_ship">
                        <div class="form-group">
                            <input required id="zip_code_SellProduct" value="<?php if(isset($_SESSION['userId'])){ echo $_SESSION['zip_code']; }  ?>" name="zip_code_SellProduct" class="form-control StreetAddress" placeholder="Zip Code of Equipment Location (required)" type="text">
                        </div>
                    </div>
                    <div class="Emailtext_area_penal"></div>
                    <input type='hidden' name='productId_SellProduct' value='<?php  echo $detail[0]->ListID; ?>'>
                    <input type='hidden' name='productName' value='<?php echo $detail[0]->ProductName; ?>'>
                    <input type='hidden' name='brandName' value='<?php echo $detail[0]->BrandName; ?>'>
                    <input type='hidden' name='versionName' value='<?php echo $detail[0]->VersionName; ?>'>
                    <input type='hidden' name='sku' value='<?php echo $detail[0]->StockKeepingUnit; ?>'>
                    <textarea name="message_SellProduct" id='message_SellProduct' required>Hi There!&#13;&#10;I have a <?php if(isset($detail[0]->ProductName)){ echo  $detail[0]->ProductName ; } ?> that I need to turn into cash&#13;&#10;Are you interested in purchasing it from me?&#13;&#10;Thanks</textarea>
                    <div id="recaptcha6" class='g-recaptcha-response'></div>
                    <!-- <div id='recaptcha' class='g-recaptcha-response'></div> -->
            </div>
            <div class="EmailSubmiuttt_penal green_color">
                <input type='submit' class="btn drop_ad" name='email_SellProduct' value='Send Email' id='email_SellProduct'>
            </div>
            </form>
        </div>
    </div>
    <div class="Email_bottom_foter">
        <h1>Questions</h1>
        <div class="Email_bottom_foter_content">
            <h2>How much does it cost to rent equipment from Global Fitness?</h2>
            <p>The cost vary by model, however we can say it costs a fraction of the purchase price and it included maintenance for the life of the contract. We also service the rental fleet on a quarterly basis with free replacement if a unit fails. We charge up front and you pay for delivery only.</p>
        </div>
        <div class="row footer_bottom">
            <div class="col-md-12 col-sm-12">
                <p>Copyright &copy; 2017 Global Fitness, Inc. All rights reserved.</p>
            </div>
        </div>
    </div>
</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
</div>
<!-- Modal for email me end -->
<!-- modal for email me start -->
<div class="modal fade myModal_email" id="myModal_email_SellProduct" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog email_model_box">
<div class="modal-content">
    <div class="modal-header">
        <div class="Border_PopUP">
            <div class="paddingg">
                <div class="Email_auttoo">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Email sent successfully</h4>

                </div>
                <div class="modal-body">
                    <div class="Email_successfull_content_PEnaL">
                        <p style="color:#268aff; margin-top:5px; font-size:15px;"><?php if(isset($_POST['firstname_SellProduct'])){ echo $_POST['firstname_SellProduct']; } ?>, thank you for getting in touch!</p>
                        <p>We appreciate you contacting us about the "
                            <?php if(isset($detail[0]->ProductName)){ echo  $detail[0]->ProductName ; } ?>". We try to respond as soon as possible, so one of our Customer Service colleagues will get back to you within few hours.</p>
                        <p>Have a great day!</p>
                        <br><a href="" style="color:#268aff; margin-top:5px; font-size:15px;" data-dismiss="modal" aria-label="Close">Close</a>
                    </div>
                </div>
                <div class="row footer_bottom footer_bottom_popup">
                    <div class="col-md-12 col-sm-12">
                        <p>Copyright &copy; 2017 Global Fitness, Inc. All rights reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
</div>
<!-- Modal for email me end -->
<!-- modal for email me start -->
<div class="modal fade myModal_email_SellProduct_error" id="myModal_email_SellProduct_error" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog email_model_box">
<div class="modal-content">
    <div class="modal-header">
        <div class="Border_PopUP">
            <div class="paddingg">
                <div class="Email_auttoo">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel"><span style="color:red">Sorry, You have already requested to Rent this Product</span></h4>
                </div>
                <div class="modal-body">
                    <div class="Email_successfull_content_PEnaL">
                        <br><a href="" style="color:#268aff; margin-top:5px; font-size:15px;" data-dismiss="modal" aria-label="Close">Close</a>
                    </div>
                </div>
                <div class="row footer_bottom footer_bottom_popup">
                    <div class="col-md-12 col-sm-12">
                        <p>Copyright &copy; 2017 Global Fitness, Inc. All rights reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
</div>
<!-- Modal for email me end -->
<!-- Revuiew submit -->
<div class="modal fade myModal_email" id="review_submit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog email_model_box">
<div class="modal-content">
    <div class="modal-header">
        <div class="Border_PopUP">
            <div class="paddingg">
                <div class="Email_auttoo">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Review submitted successfully</h4>
                </div>
                <div class="modal-body">
                    <div class="Email_successfull_content_PEnaL">
                        Thank you for submitting your review.
                        <br> Our moderators will evaluate your submission and notify you when your review is live.
                        <br><a href="" style="color:#268aff; margin-top:5px; font-size:15px;" data-dismiss="modal" aria-label="Close">Close</a>
                    </div>
                </div>
                <div class="row footer_bottom footer_bottom_popup">
                    <div class="col-md-12 col-sm-12">
                        <p>Copyright &copy; 2017 Global Fitness, Inc. All rights reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
</div>
<!-- Modal for email me end -->
<div class="modal fade" id="Modal_QUSTION" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
    <div class="paddingg">
        <div class="modal-header">
            <div class="auttoo">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
        </div>
        <div class="modal-body">
            <div class="visa_card">
                <img alt ="cards"  src="<?php echo base_url() ?>/public/assets/images/cards.png">
            </div>
        </div>
        <div class="modal-footer">
        </div>
    </div>
</div>
</div>
</div>
<div class="modal fade" id="Modal_important_cod" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
    <div class="paddingg">
        <div class="modal-header">
            <div class="auttoo">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title important_heading" id="myModalLabel">Important Notice</h4>
            </div>
        </div>
        <div class="modal-body">
            <div class="box">
                <span class="error" style="color:red;"></span>
            </div>
            <div class="dumy_important">
                <p>We accept COD and wire payments. Wires must be received before your order can ship and if you plan to pay when you pick up you order please return to Step One of the checkout process and check the third check box "I want to pick this up"</p>
            </div>
        </div>
        <div class="modal-footer">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="Cancel">
                        <a href="<?php echo base_url('/site/step2'); ?>">Change Shipping Details</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<div class="modal fade" id="Modal_important" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
    <div class="paddingg">
        <div class="modal-header">
            <div class="auttoo">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title important_heading" id="myModalLabel">Important Notice</h4>

            </div>
        </div>
        <div class="modal-body">
            <div class="box">
                <span class="error" style="color:red;"></span>
            </div>
            <!--       <div class="box">
<input type="text" id="myphn" placeholder="Email/Username">
<input type="Password" id="mypass" placeholder="Password">
</div>  -->

            <div class="dumy_important">
                <p>Global Fitness does ship internationally however, shipping rates vary drastically from country to country. As a result, we like to research rates to so we can remain competitive.
                </p>
                <p>Your order will be completed and emailed to us so we can find the best way to ship your order.</p>
                <p>Please note your card not be billed nor authorized. We will collect payment from you when we have your shipping rate and approval from you prior to shipping.</p>
            </div>
        </div>
        <div class="modal-footer">
            <div class="submit">
                <input class="submitContinue" type="button" value="Continue">
            </div>
            <!--end submit-->
            <!--            <div class="user">
<p>New user ? <span><a href="<?php echo base_url('/user/register'); ?>" id="abc" data-attr="0" class="showlogin">Sign Up</a></span></p>
</div>  -->
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="Cancel">
                        <a href="" data-dismiss="modal" aria-label="Close">Cancel</a>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="contects">
                        <p>Questions?<a href="https://www.globalfitness.com/page/contact-us" class="btn btn-link"><span>Contact Us</span></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<div class="modal fade myModal_RentProduct" id="emailUs" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog email_model_box">
<div class="modal-content">
    <div class="modal-header">
        <div class="paddingg">
            <div class="Email_auttoo">
                <h4 class="modal-title" id="myModalLabel" style="color:#268aff;">General Product Question</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <img alt ="icon"  src="<?php echo base_url() ?>/public/assets/images/close_icon_popup.png">
                    <!-- <span aria-hidden="true">&times;</span> -->
                </button>

            </div>
            <div class="modal-body">
                <div class="box">
                    <span class="error" id='error' style="color:red;"></span>
                </div>
                <form method='post' name='GenProduct' id='GenProduct'>
                    <div class="first_penal_ship">
                        <div class="form-group">
                            <input required id="firstname_GenProduct" class="form-control firstname" name="firstname_GenProduct" value="<?php if(isset($_SESSION['userId'])){ echo $_SESSION['firstname']; }  ?>" placeholder="First Name (required)" type="text">
                        </div>
                        <div class="form-group_second">
                            <input required value="<?php if(isset($_SESSION['userId'])){ echo $_SESSION['lastname']; }  ?>" id="lastname_GenProduct" name="lastname_GenProduct" class="form-control lastname" placeholder="Last Name (required)" type="text">
                        </div>
                    </div>
                    <div class="fourth_penal_ship">
                        <div class="form-group">
                            <input required id="email_address_GenProduct" value="<?php if(isset($_SESSION['userId'])){ echo $_SESSION['email']; }  ?>" name="email_address_GenProduct" class="form-control StreetAddress" placeholder="Email address (required)" type="text">
                        </div>
                    </div>
                    <div class="fourth_penal_ship">
                        <div class="form-group">
                            <input required id="phone_number_GenProduct" value="<?php if(isset($_SESSION['userId'])){ echo $_SESSION['phone_number']; }  ?>" name="phone_number_GenProduct" class="form-control StreetAddress" placeholder="Telephone Number (required)" type="text">
                        </div>
                    </div>
                    <div class="Emailtext_area_penal"></div>
                    <input type='hidden' name='productId_GenProduct' value='<?php  if(isset($detail[0]->ListID)){echo $detail[0]->ListID; } if(isset($products->Name)){ echo $products->ListID; }?>'>
                    <input type='hidden' name='productName' value='<?php if(isset($detail[0]->ProductName)){echo $detail[0]->ProductName; } if(isset($products->ProductName)){ echo $products->ProductName; }?>'>
                    <input type='hidden' name='brandName' value='<?php if(isset($detail[0]->BrandName)){echo $detail[0]->BrandName; } if(isset($products->BrandName)){ echo $products->BrandName; } ?>'>
                    <input type='hidden' name='versionName' value='<?php echo $detail[0]->VersionName; ?>'>
                    <input type='hidden' name='sku' value='<?php if(isset($detail[0]->StockKeepingUnit)){echo $detail[0]->StockKeepingUnit; } if(isset($products->Sku)){ echo $products->Sku; } ?>'>
                    <textarea name="message_GenProduct" id='message_GenProduct' required>Hi There!&#13;&#10;I have some questions about this <?php if(isset($detail[0]->ProductName)){ echo  $detail[0]->ProductName ; }
                    elseif(isset($products->Name)){
                        echo $product->Name;
                    }
                     ?>".&#13;&#10;Please reach out to me about this.&#13;&#10;Thanks</textarea>

                    <div id="recaptcha7" class='g-recaptcha-response'></div>
                    <!-- <div id='recaptcha' class='g-recaptcha-response'></div> -->
            </div>
            <div class="EmailSubmiuttt_penal green_color">
                <input type='submit' class="btn drop_ad" name='email_GenProduct' value='Send Email' id='email_GenProduct'>
            </div>
            </form>
        </div>
    </div>
    <div class="Email_bottom_foter">
        <h1>Questions</h1>
        <div class="Email_bottom_foter_content">
            <h2>How much does it cost to rent equipment from Global Fitness?</h2>
            <p>The cost vary by model, however we can say it costs a fraction of the purchase price and it included maintenance for the life of the contract. We also service the rental fleet on a quarterly basis with free replacement if a unit fails. We charge up front and you pay for delivery only.</p>
        </div>
        <div class="row footer_bottom">
            <div class="col-md-12 col-sm-12">
                <p>Copyright &copy; 2017 Global Fitness, Inc. All rights reserved.</p>
            </div>
        </div>
    </div>
</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
</div>





<div class="modal fade" id="requestacall" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
    <div class="paddingg" style="padding: 0px; margin: 10px 20px 30px; border: 0px solid rgb(204, 204, 204);">
        <div class="modal-header">
            <div class="auttoo">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title Request_A_Call" id="myModalLabel">Request a Call</h4>
            </div>
        </div>
        <form action="<?php echo base_url('site/twilliocalling');?>">
            <div class="modal-body">
                <div class="dumy_important">
                    <p>Please enter the number you would like our staff to reach out to you on.</p>
                </div>
                <div class="box">
                    <input type="text" required name="number" placeholder="Telephone Number">
                </div>
            </div>
            <div class="modal-footer">
                <div class="submit">
                    <input type="submit" value="Call Me Now" style="font-weight: 600;">
                </div>
                <!--end submit-->
            </div>
        </form>
    </div>
</div>
</div>
</div>




<div class="modal fade" id="myproductlist" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
    <div class="paddingg" style="padding: 0px; margin: 10px 20px 30px; border: 0px solid rgb(204, 204, 204);">
        <div class="modal-header">
            <div class="auttoo My_List_Equipment_Inquiry">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin: -17px -122px 0px 0px ! important;"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title Request_A_Call" id="myModalLabel">My List <span>Equipment Inquiry</span></h4>
            </div>
        </div>
        <form action="" method="post" id="clickcall_me">
            <div class="modal-body">
                <span style='color:red;' id='display_error_call'></span>
                <div class="box">
                    <input type="text" value="<?php if(isset($_SESSION['userId'])){ echo $_SESSION['firstname']; }  ?>" id="first_last" required name="name" placeholder="First & Last Name">
                </div>
                <div class="box">
                    <input type="text" value="<?php if(isset($_SESSION['userId'])){ echo $_SESSION['email']; }  ?>" id="email_first_last" required name="email" placeholder="Email">
                </div>
                <div class="box">
                    <input type="text" value="<?php if(isset($_SESSION['userId'])){ echo $_SESSION['phone_number']; }  ?>" name="number" placeholder="Telephone(optional)">
                </div>
            </div>
            <div class="modal-footer">
                <div class="submit">
                    <input type="submit" id="clickcallme_now" value="Download List" style="font-weight: 600;">
                </div>
                <!--end submit-->
            </div>
        </form>
    </div>
</div>
</div>
</div>
<!-- Register  -->
<div class="modal fade myModal_email" id="myModal_register" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog email_model_box">
<div class="modal-content">
    <div class="modal-header">
        <div class="paddingg">
            <div class="Email_auttoo">
                <h4 class="modal-title" id="myModalLabel">Create an Account</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <img alt ="icon"  src="<?php echo base_url() ?>/public/assets/images/close_icon_popup.png">
                </button>
            </div>
            <div class="modal-body">
                <div class="box">
                    <span class="error" id='register_error' style="color:red;"></span>
                </div>
                <form method='post' id="register_form">
                    <div class="first_penal_ship">
                        <div class="form-group">
                            <input required class="form-control firstname" name="first" placeholder="First Name (required)" type="text">
                        </div>
                        <div class="form-group_second">
                            <input required name="last" class="form-control lastname" placeholder="Last Name (required)" type="text">
                        </div>
                    </div>
                    <div class="fourth_penal_ship">
                        <div class="form-group">
                            <input name="middle" class="form-control StreetAddress" placeholder="Middle(optional)" type="text">
                        </div>
                    </div>
                    <div class="fourth_penal_ship">
                        <div class="form-group">
                            <input required name="username" class="form-control StreetAddress" placeholder="Username(required)" type="text">
                        </div>
                    </div>
                    <div class="fourth_penal_ship">
                        <div class="form-group">
                            <input required name="email" class="form-control StreetAddress" placeholder="Email address (required)" type="text">
                        </div>
                    </div>
                    <div class="fourth_penal_ship">
                        <div class="form-group">
                            <input required name="password" class="form-control StreetAddress" placeholder="Password (required)" type="password">
                        </div>
                    </div>
                    <div class="fourth_penal_ship">
                        <div class="form-group">
                            <input required name="phone_number" class="form-control StreetAddress" placeholder="Telephone Number (required)" type="text">
                        </div>
                    </div>
                    <div id="recaptcha3" class='g-recaptcha-response'></div>
                    <!-- <div id='recaptcha' class='g-recaptcha-response'></div> -->
            </div>
            <div class="EmailSubmiuttt_penal green_color">
                <input type='submit' class="btn drop_ad" id="submit_register" value='Register'>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
</div>
<!-- Modal for register -->
<!-- Request a call submit -->
<div class="modal fade myModal_email" id="request_call" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog email_model_box">
<div class="modal-content">
    <div class="modal-header">
        <div class="Border_PopUP">
            <div class="paddingg">
                <div class="Email_auttoo">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Call successfully sent</h4>
                </div>
                <div class="modal-body">
                    <div class="Email_successfull_content_PEnaL">
                        You should recieve a call shortly that will connect you to one of our fitness professionals.
                        <br> Thanks and stay healthy!
                        <br>
                        <br><a href="" style="color:#268aff; margin-top:5px; font-size:15px;" data-dismiss="modal" aria-label="Close">Close</a>
                    </div>
                </div>
                <div class="row footer_bottom footer_bottom_popup">
                    <div class="col-md-12 col-sm-12">
                        <p>Copyright &copy; 2017 Global Fitness, Inc. All rights reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
</div>

<div class="modal fade myModal_email_waitlist_error" id="myModal_card_error" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog email_model_box">
<div class="modal-content">
    <div class="modal-header">
        <div class="Border_PopUP">
            <div class="paddingg">
                <div class="Email_auttoo">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel"><span style="color:red">Card Error</span></h4>

                </div>
                <div class="modal-body">
                    <div class="Email_successfull_content_PEnaL">
                     <p style="color:#268aff; margin-top:5px; font-size:15px;">There was  an error processing your card,please verify the card information and  billing address then try again</p>
                        <br><a href="" style="color:#268aff; margin-top:5px; font-size:15px;" data-dismiss="modal" aria-label="Close">Close</a>
                    </div>
                </div>
                <div class="row footer_bottom footer_bottom_popup">
                    <div class="col-md-12 col-sm-12">
                        <p>Copyright &copy; 2017 Global Fitness, Inc. All rights reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
</div>
<div class="modal fade myModal_email" id="myModal_email_generate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog email_model_box">
<div class="modal-content">
    <div class="modal-header">
        <div class="Border_PopUP">
            <div class="paddingg">
                <div class="Email_auttoo">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Email Sent Successfully</h4>
                  </div>
                <div class="modal-body">
                    <div class="Email_successfull_content_PEnaL">
                        <p style="color:#268aff; margin-top:5px; font-size:15px;"><?php if(isset($_POST['firstname_contactus'])){ echo $_POST['firstname_contactus']; } ?>, thank you for getting in touch!</p>
                        <p>We appreciate you contacting us. We try to respond as soon as possible, so one of our Customer Service colleagues will get back to you within few hours.</p>
                        <p>Have a great day!</p>
                        <br><a href="" style="color:#268aff; margin-top:5px; font-size:15px;" data-dismiss="modal" aria-label="Close">Close</a>
                    </div>
                </div>
                <div class="row footer_bottom footer_bottom_popup">
                    <div class="col-md-12 col-sm-12">
                        <p>Copyright &copy; 2017 Global Fitness, Inc. All rights reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
</div>
<!-- Modal for request a call end -->

<script type="text/javascript" src="<?php echo base_url('/public/assets/js/myscript.js'); ?>"></script>
<?php
if(isset($_SESSION['errorto']) && ($_SESSION['errorto']==1)){
?>
<script>
$("#request_call").modal('show');
setTimeout(function() {
$('#request_call').modal("hide");
}, 3000);
</script>
<?php
unset($_SESSION['errorto']);
}
?>
<script src="https://s.codepen.io/assets/libs/modernizr.js" type="text/javascript"></script>

<!-- <script src="<?php //echo base_url('public/assets/js/modernizr.js'); ?>"></script> -->

<script src="<?php echo base_url('public/assets/js/jquery.bxslider.js'); ?>"></script>
<script src="<?php echo base_url('public/assets/js/jquery.easing.1.3.js'); ?>"></script>
<script src="<?php echo base_url('public/assets/js/starjs/star-rating.js'); ?>"></script>
<script src="<?php  echo base_url('public/assets/js/index.js'); ?>"></script>
<!---->
<!-- swap_slider script --
<script src="//ajax.googleapis.com/ajax/libs/jquerymobile/1.4.3/jquery.mobile.min.js"></script>
<!-- swap_slider script -->









<!-- fixed_filter_less_or_more -->
<script>
/*<![CDATA[*/
$(window).scroll(function() {
if ($(this).scrollTop() > 115 && (navigator.userAgent.indexOf("iPhone") == -1 && navigator.userAgent.indexOf("iPad") == -1 && navigator.userAgent.indexOf("Blackberry") == -1 && navigator.userAgent.indexOf("Android") == -1)) {
    $("#sub-sidebar").addClass("fixed")
} else {
    $("#sub-sidebar").removeClass("fixed")
}
}); /*]]>*/
</script>


<!-- fixed_filter_less_or_more -->


<?php
if(isset($_POST['firstname_contactus']) && isset($_POST['lastname_contactus'])):
  ?>
<script>
 $('#myModal_email_generate').modal('show');
</script>
<?php
endif;
?>



<?php
if(isset($_POST['firstname']) && isset($_POST['message'])):
  ?>
<script>
$("#myModal_email_Sucessfull").modal('show');
</script>
<?php
endif;
?>
<?php
if(isset($_POST['firstname_waitlist']) && isset($_POST['message_waitlist']) && !isset($_SESSION['waitlest_error'])):
  ?>
<script>
$("#myModal_email_waitlist").modal('show');
</script>
<?php
endif;
?>
    <?php
if(isset($_SESSION['waitlest_error'])):
  ?>
    <script>
    $("#myModal_email_waitlist_error").modal('show');
    </script>
    <?php
endif;
/////////////////////my code ///////////////////
?>
        <?php
if(isset($_POST['firstname_GenProduct']) && isset($_POST['message_GenProduct']) && !isset($_SESSION['GenProduct_error'])):
  ?>
        <script>
        $("#myModal_email_GenProduct").modal('show');
        </script>
        <?php
endif;
?>
            <?php
if(isset($_SESSION['GenProduct_error'])):
  ?>
            <script>
            $("#myModal_email_GenProduct_error").modal('show');
            </script>
            <?php
endif;
///////////my code end//////////////////////
?>
                <?php
if(isset($_POST['firstname_RentProduct']) && isset($_POST['message_RentProduct']) && !isset($_SESSION['rentProduct_error'])):
  ?>
                <script>
                $("#myModal_email_RentProduct").modal('show');
                </script>
                <?php
endif;
?>
                    <?php
if(isset($_SESSION['rentProduct_error'])):
  ?>
                    <script>
                    $("#myModal_email_RentProduct_error").modal('show');
                    </script>
                    <?php
endif;
?>
                        <?php
if(isset($_POST['firstname_SellProduct']) && isset($_POST['message_SellProduct']) && !isset($_SESSION['SellProduct_error'])):
  ?>
                        <script>
                        $("#myModal_email_SellProduct").modal('show');
                        </script>
                        <?php
endif;
?>
                            <?php
if(isset($_SESSION['SellProduct_error'])):
  ?>
                            <script>
                            $("#myModal_email_SellProduct_error").modal('show');
                            </script>
                            <?php
endif;
?>
                                <?php if((isset($_POST['productId']) && ($_POST['message']=="")) || isset($_POST['review_id'])){ ?>
                                <script>
                                $("#review_submit").modal('show');
                                </script>
                                <?php
}
?>
                                    <!-- Serch_hide -->
                                    <script type="text/javascript">
                                    $(document).click(function(event) {
                                        if (!$(event.target).closest('.mydisplay').length) {
                                            if ($('.mydisplay').is(":visible")) {
                                                $('.mydisplay').hide();
                                            }
                                        }
                                    })
                                    </script>
                                    <!-- Serch_hide -->
                                    <script type="text/javascript">
                                    // jssor_1_slider_init();
                                    </script>
                                    <script src="https://www.google.com/recaptcha/api.js?onload=myCallBack&render=explicit" async defer></script>
                                    <script>
                                    var recaptcha1;
                                    var recaptcha2;
                                    var recaptcha3;
                                    var recaptcha4;
                                    var recaptcha5;
                                    var recaptcha6;
                                    var recaptcha7;
                                    var recaptcha8;
                                    var recaptcha9;
                                    var recaptcha10;
                                    var myCallBack = function() {
                                        //Render the recaptcha1 on the element with ID "recaptcha1"

         if ( $('#recaptcha1').length ) {
                                        recaptcha1 = grecaptcha.render('recaptcha1', {
                                            'sitekey': '6LctiyIUAAAAAIq-jhoWfmHSqkc5hFbc87QJz-YK', //Replace this with your Site key
                                            'theme': 'light'
                                        });
                                      }
                                        //Render the recaptcha2 on the element with ID "recaptcha2"
                                           if ( $('#recaptcha2').length ) {
                                        recaptcha2 = grecaptcha.render('recaptcha2', {
                                            'sitekey': '6LctiyIUAAAAAIq-jhoWfmHSqkc5hFbc87QJz-YK', //Replace this with your Site key
                                            'theme': 'light'
                                        });
                                      }
                                             if ( $('#recaptcha3').length ) {
                                        recaptcha3 = grecaptcha.render('recaptcha3', {
                                            'sitekey': '6LctiyIUAAAAAIq-jhoWfmHSqkc5hFbc87QJz-YK', //Replace this with your Site key
                                            'theme': 'light'
                                        });
                                      }

                                             if ( $('#recaptcha4').length ) {
                                        recaptcha4 = grecaptcha.render('recaptcha4', {
                                            'sitekey': '6LctiyIUAAAAAIq-jhoWfmHSqkc5hFbc87QJz-YK', //Replace this with your Site key
                                            'theme': 'light'
                                        });
                                      }

                                             if ( $('#recaptcha5').length ) {
                                        recaptcha5 = grecaptcha.render('recaptcha5', {
                                            'sitekey': '6LctiyIUAAAAAIq-jhoWfmHSqkc5hFbc87QJz-YK', //Replace this with your Site key
                                            'theme': 'light'
                                        });
                                      }

                                             if ( $('#recaptcha6').length ) {
                                        recaptcha6 = grecaptcha.render('recaptcha6', {
                                            'sitekey': '6LctiyIUAAAAAIq-jhoWfmHSqkc5hFbc87QJz-YK', //Replace this with your Site key
                                            'theme': 'light'
                                        });
                                      }

                                             if ( $('#recaptcha7').length ) {
                                        recaptcha7 = grecaptcha.render('recaptcha7', {
                                            'sitekey': '6LctiyIUAAAAAIq-jhoWfmHSqkc5hFbc87QJz-YK', //Replace this with your Site key
                                            'theme': 'light'
                                        });
                                      }

                                             if ( $('#recaptcha8').length ) {
                                        recaptcha8 = grecaptcha.render('recaptcha8', {
                                            'sitekey': '6LctiyIUAAAAAIq-jhoWfmHSqkc5hFbc87QJz-YK', //Replace this with your Site key
                                            'theme': 'light'
                                        });
                                      }

                                             if ( $('#recaptcha9').length ) {
                                         recaptcha9 = grecaptcha.render('recaptcha9', {
                                            'sitekey': '6LctiyIUAAAAAIq-jhoWfmHSqkc5hFbc87QJz-YK', //Replace this with your Site key
                                            'theme': 'light'
                                        });
                                      }

                                             if ( $('#recaptcha10').length ) {
                                          recaptcha10 = grecaptcha.render('recaptcha10', {
                                            'sitekey': '6LctiyIUAAAAAIq-jhoWfmHSqkc5hFbc87QJz-YK', //Replace this with your Site key
                                            'theme': 'light'
                                        });
                                      }
                                    };
                                    </script>
                                    <script type="text/javascript">
                                    $(function() {
                                        $('#reviewlink_c').click(function() {
                                            console.log('ggg');
                                            var target = $(this.hash);
                                            target = target.length ? target : $('[name=' + this.hash.substr(1) + ']');
                                            if (target.length) {
                                                $('html,body').animate({
                                                    scrollTop: target.offset().top
                                                }, 1000);
                                                return false;
                                            }
                                        });
                                    });
                                    </script>
                                    <script type="text/javascript">
                                    $(function() {
                                        $(".dropdown").hover(
                                            function() {
                                                $('.dropdown-menu', this).stop(true, true).fadeIn("fast");
                                                $(this).toggleClass('open');
                                                $('b', this).toggleClass("caret caret-up");
                                            },
                                            function() {
                                                $('.dropdown-menu', this).stop(true, true).fadeOut("fast");
                                                $(this).toggleClass('open');
                                                $('b', this).toggleClass("caret caret-up");
                                            });
                                    });
                                    </script>



                                    <script type="text/javascript">

                                    $(document).ready(function(){

                                        $(".dropdown").hover(
                                            function() {
                                                $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).slideDown("400");
                                                $(this).toggleClass('open');
                                            },
                                            function() {
                                                $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).slideUp("400");
                                                $(this).toggleClass('open');
                                            }
                                        );
                                        $('#about_us_dropdown').slideDown();
                                        $('#about_us_dropdown').toggleClass('open');
                                    });
                                    </script>
                                    <!-- footer_accordian -->
                                    <script type="text/javascript">
                                        /*******************************
                                        * ACCORDION WITH TOGGLE ICONS
                                        *******************************/
                                            function toggleIcon(e) {
                                                $(e.target)
                                                    .prev('.panel-heading')
                                                    .find(".more-less")
                                                    .toggleClass('glyphicon-plus glyphicon-remove');
                                            }
                                            $('.panel-group').on('hidden.bs.collapse', toggleIcon);
                                            $('.panel-group').on('shown.bs.collapse', toggleIcon);
                                    </script>
                                    <!-- footer_accordian -->


                                    <?php if($this->session->flashdata('fdsjfkjsdf')): ?>
                                    <script>
                                    location.href = '<?php echo base_url()."/site/downexcel" ?>';
                                    </script>
                                    <?php endif; ?>


<script>
/*$( "#dill" ).click(function() {
$( "#unddd" ).toggle( "slow" );
});*/
</script>



<script src="<?php echo base_url('public/assets/js/RESPONSIVEmenu.js'); ?>"></script>

<script type="text/javascript">
    !function(e){var t=function(t,n){this.$element=e(t),this.type=this.$element.data("uploadtype")||(this.$element.find(".thumbnail").length>0?"image":"file"),this.$input=this.$element.find(":file");if(this.$input.length===0)return;this.name=this.$input.attr("name")||n.name,this.$hidden=this.$element.find('input[type=hidden][name="'+this.name+'"]'),this.$hidden.length===0&&(this.$hidden=e('<input type="hidden" />'),this.$element.prepend(this.$hidden)),this.$preview=this.$element.find(".fileupload-preview");var r=this.$preview.css("height");this.$preview.css("display")!="inline"&&r!="0px"&&r!="none"&&this.$preview.css("line-height",r),this.original={exists:this.$element.hasClass("fileupload-exists"),preview:this.$preview.html(),hiddenVal:this.$hidden.val()},this.$remove=this.$element.find('[data-dismiss="fileupload"]'),this.$element.find('[data-trigger="fileupload"]').on("click.fileupload",e.proxy(this.trigger,this)),this.listen()};t.prototype={listen:function(){this.$input.on("change.fileupload",e.proxy(this.change,this)),e(this.$input[0].form).on("reset.fileupload",e.proxy(this.reset,this)),this.$remove&&this.$remove.on("click.fileupload",e.proxy(this.clear,this))},change:function(e,t){if(t==="clear")return;var n=e.target.files!==undefined?e.target.files[0]:e.target.value?{name:e.target.value.replace(/^.+\\/,"")}:null;if(!n){this.clear();return}this.$hidden.val(""),this.$hidden.attr("name",""),this.$input.attr("name",this.name);if(this.type==="image"&&this.$preview.length>0&&(typeof n.type!="undefined"?n.type.match("image.*"):n.name.match(/\.(gif|png|jpe?g)$/i))&&typeof FileReader!="undefined"){var r=new FileReader,i=this.$preview,s=this.$element;r.onload=function(e){i.html('<img src="'+e.target.result+'" '+(i.css("max-height")!="none"?'style="max-height: '+i.css("max-height")+';"':"")+" />"),s.addClass("fileupload-exists").removeClass("fileupload-new")},r.readAsDataURL(n)}else this.$preview.text(n.name),this.$element.addClass("fileupload-exists").removeClass("fileupload-new")},clear:function(e){this.$hidden.val(""),this.$hidden.attr("name",this.name),this.$input.attr("name","");if(navigator.userAgent.match(/msie/i)){var t=this.$input.clone(!0);this.$input.after(t),this.$input.remove(),this.$input=t}else this.$input.val("");this.$preview.html(""),this.$element.addClass("fileupload-new").removeClass("fileupload-exists"),e&&(this.$input.trigger("change",["clear"]),e.preventDefault())},reset:function(e){this.clear(),this.$hidden.val(this.original.hiddenVal),this.$preview.html(this.original.preview),this.original.exists?this.$element.addClass("fileupload-exists").removeClass("fileupload-new"):this.$element.addClass("fileupload-new").removeClass("fileupload-exists")},trigger:function(e){this.$input.trigger("click"),e.preventDefault()}},e.fn.fileupload=function(n){return this.each(function(){var r=e(this),i=r.data("fileupload");i||r.data("fileupload",i=new t(this,n)),typeof n=="string"&&i[n]()})},e.fn.fileupload.Constructor=t,e(document).on("click.fileupload.data-api",'[data-provides="fileupload"]',function(t){var n=e(this);if(n.data("fileupload"))return;n.fileupload(n.data());var r=e(t.target).closest('[data-dismiss="fileupload"],[data-trigger="fileupload"]');r.length>0&&(r.trigger("click.fileupload"),t.preventDefault())})}(window.jQuery)
</script>





</body>
</html>
