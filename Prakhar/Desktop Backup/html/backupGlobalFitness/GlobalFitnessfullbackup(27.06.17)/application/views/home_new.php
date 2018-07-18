<style type="text/css">
    .cd-dropdown-wrapper {
  z-index: 99999;
}

</style>

 <?php  

 if($promo5['rows'] != 3){ ?>
<section>
    <div class="container-fluid">
        <div class="row home_pahe_BANNER_PEnal">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 padd_none_hom">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">                            
                            <div class="banner_image_1920"><img src="<?php echo base_url(); ?>/public/assets/images/banner_img.jpg"></div>
                            <div class="banner_image_960"><img src="<?php echo base_url(); ?>/public/assets/images/banner_img.jpg"></div>
                            <div class="banner_image_320"><img src="<?php echo base_url(); ?>/public/assets/images/banner_img.jpg"></div>
                            <div class="carousel-caption">
                                <h3>LIFE FITNESS</h3>
                                <p>95T INSPIRE TREAMILLS</p>
                            </div>

                            <div class="carousel-caption_penllw">
                                <h1>Available Now </h1>
                            </div>

                        </div>
                        <div class="swiper-slide">                            
                            <div class="banner_image_1920"><img src="<?php echo base_url(); ?>/public/assets/images/banner_img.jpg"></div>
                            <div class="banner_image_960"><img src="<?php echo base_url(); ?>/public/assets/images/banner_img.jpg"></div>
                            <div class="banner_image_320"><img src="<?php echo base_url(); ?>/public/assets/images/banner_img.jpg"></div>
                            <div class="carousel-caption">
                                <h3>LIFE FITNESS</h3>
                                <p>95T INSPIRE TREAMILLS</p>
                            </div>

                            <div class="carousel-caption_penllw">
                                <h1>Available Now Second</h1>
                            </div>

                        </div>
                        <div class="swiper-slide">                            
                            <div class="banner_image_1920"><img src="<?php echo base_url(); ?>/public/assets/images/banner_img.jpg"></div>
                            <div class="banner_image_960"><img src="<?php echo base_url(); ?>/public/assets/images/banner_img.jpg"></div>
                            <div class="banner_image_320"><img src="<?php echo base_url(); ?>/public/assets/images/banner_img.jpg"></div>
                            <div class="carousel-caption">
                                <h3>LIFE FITNESS</h3>
                                <p>95T INSPIRE TREAMILLS</p>
                            </div>
                            <div class="carousel-caption_penllw">
                                <h1>Available Now Third</h1>
                            </div>

                        </div>
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php } else{?>
<section>
    <div class="container-fluid">
        <div class="row home_pahe_BANNER_PEnal">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 padd_none_hom">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                               <a href="<?php 
                                if (strpos($promo5['data'][0]->CarouselHyperlink, 'cardio') == false || strpos($promo5['data'][0]->CarouselHyperlink, 'strength') == false ) {
                                print_r($promo5['data'][0]->CarouselHyperlink);
                                }else{
                                    
                          print_r(base_url().$promo5['data'][0]->CarouselHyperlink);}?>"> <div class="banner_image_1920"><img title="<?php print_r(base_url().$promo5['data'][0]->CarouselImageTitleAtribute);?>" alt = "<?php print_r(base_url().$promo5['data'][0]->CarouselImageAltAtribute);?>" src="<?php print_r(base_url().$promo5['data'][0]->IndexCarouselImageLarge);?>"></div></a>
                            <a href="<?php 
                                if (strpos($promo5['data'][0]->CarouselHyperlink, 'cardio') == false || strpos($promo5['data'][0]->CarouselHyperlink, 'strength') == false ) {
                                print_r($promo5['data'][0]->CarouselHyperlink);
                                }else{
                                    
                          print_r(base_url().$promo5['data'][0]->CarouselHyperlink);}?>"><div class="banner_image_960"><img title="<?php print_r(base_url().$promo5['data'][0]->CarouselImageTitleAtribute);?>" src="<?php  print_r(base_url().$promo5['data'][0]->IndexCarouselImageMedium); ?>" alt = "<?php print_r(base_url().$promo5['data'][0]->CarouselImageAltAtribute);?>" ></div></a>
                          <a href="<?php 
                                if (strpos($promo5['data'][0]->CarouselHyperlink, 'cardio') == false || strpos($promo5['data'][0]->CarouselHyperlink, 'strength') == false ) {
                                print_r($promo5['data'][0]->CarouselHyperlink);
                                }else{
                                    
                          print_r(base_url().$promo5['data'][0]->CarouselHyperlink);}?>">  <div class="banner_image_320"><img title="<?php print_r(base_url().$promo5['data'][0]->CarouselImageTitleAtribute);?>" src="<?php  print_r(base_url().$promo5['data'][0]->IndexCarouselImageSmall); ?>" alt = "<?php print_r(base_url().$promo5['data'][0]->CarouselImageAltAtribute);?>"></div></a>
                            <div class="carousel-caption">
                              <h3><a href="<?php 
                                if (strpos($promo5['data'][0]->CarouselHyperlink, 'cardio') == false || strpos($promo5['data'][0]->CarouselHyperlink, 'strength') == false ) {
                                print_r($promo5['data'][0]->CarouselHyperlink);
                                }else{
                                    
                          print_r(base_url().$promo5['data'][0]->CarouselHyperlink);}?>"><?php echo $promo5['data'][0]->CarouselTitle;?></a></h3>
                                <p><a href="<?php 
                                if (strpos($promo5['data'][0]->CarouselHyperlink, 'cardio') == false || strpos($promo5['data'][0]->CarouselHyperlink, 'strength') == false ) {
                                print_r($promo5['data'][0]->CarouselHyperlink);
                                }else{
                                    
                          print_r(base_url().$promo5['data'][0]->CarouselHyperlink);}?>"><?php echo $promo5['data'][0]->CarouselSubTitle;?></a></p>
                            </div>

                            <div class="carousel-caption_penllw">
                          
                                <a title =" <?php print_r($promo5['data'][0]->CarouselFooterTitleAttribute);?>" href="<?php 
                                if (strpos($promo5['data'][0]->CarouselHyperlink, 'cardio') == false || strpos($promo5['data'][0]->CarouselHyperlink, 'strength') == false ) {
                                print_r($promo5['data'][0]->CarouselHyperlink);
                                }else{
                                    
                          print_r(base_url().$promo5['data'][0]->CarouselHyperlink);}?>"><h1><?php echo $promo5['data'][0]->CarouselFooter; ?></h1></a>
                            </div>

                        </div>
                        <div class="swiper-slide">                            
                          <a href="<?php 
                                if (strpos($promo5['data'][1]->CarouselHyperlink, 'cardio') == false || strpos($promo5['data'][1]->CarouselHyperlink, 'strength') == false ) {
                                print_r($promo5['data'][1]->CarouselHyperlink);
                                }else{

                          print_r(base_url().$promo5['data'][1]->CarouselHyperlink);}?>
                                "><div class="banner_image_1920"><img  title="<?php print_r(base_url().$promo5['data'][1]->CarouselImageTitleAtribute);?>" src="<?php print_r(base_url().$promo5['data'][1]->IndexCarouselImageLarge);?>" alt = "<?php print_r(base_url().$promo5['data'][1]->CarouselImageAltAtribute);?>"></div></a>
                           <a href="<?php 
                                if (strpos($promo5['data'][1]->CarouselHyperlink, 'cardio') == false || strpos($promo5['data'][1]->CarouselHyperlink, 'strength') == false ) {
                                print_r($promo5['data'][1]->CarouselHyperlink);
                                }else{
                                    
                          print_r(base_url().$promo5['data'][1]->CarouselHyperlink);}?>
                                "> <div class="banner_image_960"><img title="<?php print_r(base_url().$promo5['data'][1]->CarouselImageTitleAtribute);?>" src="<?php  print_r(base_url().$promo5['data'][1]->IndexCarouselImageMedium); ?>" alt = "<?php print_r(base_url().$promo5['data'][1]->CarouselImageAltAtribute);?>"></div></a>
                            <a href="<?php 
                                if (strpos($promo5['data'][1]->CarouselHyperlink, 'cardio') == false || strpos($promo5['data'][1]->CarouselHyperlink, 'strength') == false ) {
                                print_r($promo5['data'][1]->CarouselHyperlink);
                                }else{
                                    
                          print_r(base_url().$promo5['data'][1]->CarouselHyperlink);}?>"><div class="banner_image_320"><img  title="<?php print_r(base_url().$promo5['data'][1]->CarouselImageTitleAtribute);?>" src="<?php  print_r(base_url().$promo5['data'][1]->IndexCarouselImageSmall); ?> " alt = "<?php print_r(base_url().$promo5['data'][1]->CarouselImageAltAtribute);?>"></div> </a>
                             <div class="carousel-caption">
                                <h3><a href="<?php 
                                if (strpos($promo5['data'][1]->CarouselHyperlink, 'cardio') == false || strpos($promo5['data'][1]->CarouselHyperlink, 'strength') == false ) {
                                print_r($promo5['data'][1]->CarouselHyperlink);
                                }else{
                                    
                          print_r(base_url().$promo5['data'][1]->CarouselHyperlink);}?>"><?php echo $promo5['data'][1]->CarouselTitle;?></a></h3>
                                <p><a href="<?php 
                                if (strpos($promo5['data'][1]->CarouselHyperlink, 'cardio') == false || strpos($promo5['data'][1]->CarouselHyperlink, 'strength') == false ) {
                                print_r($promo5['data'][1]->CarouselHyperlink);
                                }else{
                                    
                          print_r(base_url().$promo5['data'][1]->CarouselHyperlink);}?>"><?php echo $promo5['data'][1]->CarouselSubTitle;?></a></p>
                            </div>

                            <div class="carousel-caption_penllw">
                               <a title =" <?php print_r($promo5['data'][1]->CarouselFooterTitleAttribute);?>" href="<?php 
                                if (strpos($promo5['data'][1]->CarouselHyperlink, 'cardio') == false || strpos($promo5['data'][1]->CarouselHyperlink, 'strength') == false ) {
                                print_r($promo5['data'][1]->CarouselHyperlink);
                                }else{

                          print_r(base_url().$promo5['data'][1]->CarouselHyperlink);}?>"> <h1><?php echo $promo5['data'][1]->CarouselFooter; ?></h1></a>
                            </div>

                        </div>
                        <div class="swiper-slide">                            
                          <a href="<?php 
                                if (strpos($promo5['data'][2]->CarouselHyperlink, 'cardio') == false || strpos($promo5['data'][2]->CarouselHyperlink, 'strength') == false ) {
                                print_r($promo5['data'][2]->CarouselHyperlink);
                                }else{
                                    
                          print_r(base_url().$promo5['data'][2]->CarouselHyperlink);}?>">  <div class="banner_image_1920"><img title="<?php print_r(base_url().$promo5['data'][2]->CarouselImageTitleAtribute);?>" alt = "<?php print_r(base_url().$promo5['data'][2]->CarouselImageAltAtribute);?>" src="<?php print_r(base_url().$promo5['data'][2]->IndexCarouselImageLarge);?>"></div></a>
                          <a href="<?php 
                                if (strpos($promo5['data'][2]->CarouselHyperlink, 'cardio') == false || strpos($promo5['data'][2]->CarouselHyperlink, 'strength') == false ) {
                                print_r($promo5['data'][2]->CarouselHyperlink);
                                }else{
                                    
                          print_r(base_url().$promo5['data'][2]->CarouselHyperlink);}?>">  <div class="banner_image_960"><img title="<?php print_r(base_url().$promo5['data'][2]->CarouselImageTitleAtribute);?>" alt = "<?php print_r(base_url().$promo5['data'][2]->CarouselImageAltAtribute);?>" src="<?php  print_r(base_url().$promo5['data'][2]->IndexCarouselImageMedium); ?>"></div></a>
                        <a href="<?php 
                                if (strpos($promo5['data'][2]->CarouselHyperlink, 'cardio') == false || strpos($promo5['data'][2]->CarouselHyperlink, 'strength') == false ) {
                                print_r($promo5['data'][2]->CarouselHyperlink);
                                }else{
                                    
                          print_r(base_url().$promo5['data'][2]->CarouselHyperlink);}?>">    <div class="banner_image_320"><img title="<?php print_r(base_url().$promo5['data'][2]->CarouselImageTitleAtribute);?>"  alt = "<?php print_r(base_url().$promo5['data'][2]->CarouselImageAltAtribute);?>" src="<?php  print_r(base_url().$promo5['data'][2]->IndexCarouselImageSmall); ?>"></div></a>
                            <div class="carousel-caption">
                              <h3><a href="<?php 
                                if (strpos($promo5['data'][2]->CarouselHyperlink, 'cardio') == false || strpos($promo5['data'][2]->CarouselHyperlink, 'strength') == false ) {
                                print_r($promo5['data'][2]->CarouselHyperlink);
                                }else{
                                    
                          print_r(base_url().$promo5['data'][2]->CarouselHyperlink);}?>"> <?php echo $promo5['data'][2]->CarouselTitle;?></a></h3>
                                <p><a href="<?php 
                                if (strpos($promo5['data'][2]->CarouselHyperlink, 'cardio') == false || strpos($promo5['data'][2]->CarouselHyperlink, 'strength') == false ) {
                                print_r($promo5['data'][2]->CarouselHyperlink);
                                }else{
                                    
                          print_r(base_url().$promo5['data'][2]->CarouselHyperlink);}?>"> <?php echo $promo5['data'][2]->CarouselSubTitle; ?></a></p>
                            </div>

                            <div class="carousel-caption_penllw">
                          <a title =" <?php print_r($promo5['data'][2]->CarouselFooterTitleAttribute);?>" href="<?php 
                                if (strpos($promo5['data'][2]->CarouselHyperlink, 'cardio') == false || strpos($promo5['data'][2]->CarouselHyperlink, 'strength') == false ) {
                                print_r($promo5['data'][2]->CarouselHyperlink);
                                }else{

                          print_r(base_url().$promo5['data'][2]->CarouselHyperlink);}?>"><h1><?php echo $promo5['data'][2]->CarouselFooter; ?></h1></a>
                            </div>

                        </div>
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php }?>
<section><!-- <div class="container-fluid"> -->
    <div class="container-fluid">
        <div class="row home_pahe_availall_PEnal">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="home_pahe__afterBANNER1">
                    <div class="HOMEBNR_aftrCONTENT">
<!--                         <h1>Available Now </h1>
                        <hr class="star-light"> -->
                    </div>
                </div>
            </div> 
            <?php if(empty($promo4[0]->VideoSmall)){ ?>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 col-lg-6 col-xl-3 padd_none_hom">
                <div class="home_pahe__afterBANNER_1920">
                    <iframe width="100%" height="100%" src="https://www.youtube.com/embed/fyMCvKDMEiE" frameborder="0" allowfullscreen></iframe>
                </div>
                <div class="home_pahe__afterBANNER_960">
                    <iframe width="100%" height="100%" src="https://www.youtube.com/embed/fyMCvKDMEiE" frameborder="0" allowfullscreen></iframe>
                </div>
                <div class="home_pahe__afterBANNER_320">
                    <iframe width="100%" height="100%" src="https://www.youtube.com/embed/fyMCvKDMEiE" frameborder="0" allowfullscreen></iframe>
                </div>


                <?php }else{ ?>
                 <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 col-lg-6 col-xl-3 padd_none_hom">
                <div class="home_pahe__afterBANNER_1920">
                   <?php print_r($promo4[0]->VideoLarge); ?>
                </div>
                <div class="home_pahe__afterBANNER_960">
                   <?php print_r($promo4[0]->VideoMedium);    ?>
                </div>
                <div class="home_pahe__afterBANNER_320">
                <?php print_r($promo4[0]->VideoSmall);    ?>
                </div>
                <?php } ?>

            </div>
            <?php if(empty($promo1[0]->ImageLarge)){ ?>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 col-xl-3  padd_none_hom">
                <div class="home_pahe__afterBANNER">
                    <div class="product_content_tex">
                        <h3>Life Fitness</h3>
                        <h2>95T Discover SE Treadmill</h2>
                        <p><a class="blue_clor" href="">Learn More > </a></p>
                    </div>
                    <div class="product_ingsa_1920"><img src="<?php echo base_url(); ?>/public/assets/images/firstproductaa.png"></div>
                    <div class="product_ingsa_960"><img src="<?php echo base_url(); ?>/public/assets/images/firstproductaa.png"></div>
                    <div class="product_ingsa_320"><img src="<?php echo base_url(); ?>/public/assets/images/firstproductaa.png"></div>
                </div>
            </div>
            <?php }else{ ?>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 col-xl-3 padd_none_hom">
                <div class="home_pahe__afterBANNER">
                    <div class="product_content_tex">
                        <h3><?php print_r($promo1[0]->ProductBrand);?></h3>
                        <h2><?php print_r($promo1[0]->ProductName);?></h2>
                          <?php 
                    $searchChar =explode('/',$promo1[0]->Hyperlink,2);

                    if($searchChar[0] =='fitness_equipment'){
                        $mylink = 'cardio/'.$searchChar[1];
                    }
                    else{
                        $mylink = $promo1[0]->Hyperlink;
                    }
                    ?>
                        <p><a class="blue_clor" title="<?php  print_r($promo1[0]->CTALinkTitleAttribute); ?>" href="<?php print_r(base_url().$mylink);?>"><?php print_r($promo1[0]->LinkCallToAction); ?> </a></p>
                    </div>
                    <div class="product_ingsa_1920"><a href="<?php print_r(base_url().$mylink);?>"><img src="<?php print_r(base_url().$promo1[0]->ImageLarge);?>" title="<?php  print_r($promo1[0]->ImageTitleAttribute); ?>" alt="<?php  print_r($promo1[0]->ImageAltAttribute); ?>"></a></div>
                    <div class="product_ingsa_960"><a  href="<?php print_r(base_url().$mylink);?>"><img src="<?php  print_r(base_url().$promo1[0]->ImageMedium); ?>" title="<?php  print_r($promo1[0]->ImageTitleAttribute); ?>" alt="<?php  print_r($promo1[0]->ImageAltAttribute); ?>"></a></div>
                    <div class="product_ingsa_320"><a href="<?php print_r(base_url().$mylink);?>"><img src="<?php  print_r(base_url().$promo1[0]->ImageSmall); ?>" alt="<?php  print_r($promo1[0]->ImageAltAttribute); ?>" title="<?php  print_r($promo1[0]->ImageTitleAttribute); ?>"></a></div>
                </div>
            </div>
            <?php } ?>
            <?php if(empty($promo2[0]->ImageLarge)){ ?>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 col-xl-3 padd_none_hom">
                <div class="home_pahe__afterBANNER">
                    <div class="product_content_tex">
                        <h2>Spinner@Blade</h2>
                        <p><a class="blue_clor" href="">Learn More > </a></p>
                    </div>
                    <div class="product_ingsa_1920"><img src="<?php echo base_url(); ?>/public/assets/images/secondproductaa.png"></div>
                    <div class="product_ingsa_960"><img src="<?php echo base_url(); ?>/public/assets/images/secondproductaa.png"></div>
                    <div class="product_ingsa_320"><img src="<?php echo base_url(); ?>/public/assets/images/secondproductaa.png"></div>
                </div>
            </div>
            <?php } else{ ?>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 col-xl-3 padd_none_hom">
                <div class="home_pahe__afterBANNER">
                    <div class="product_content_tex">
                         <h3><?php print_r($promo2[0]->ProductBrand);?></h3>
                        <h2><?php print_r($promo2[0]->ProductName);?></h2>
                          <?php 
                    $searchChar =explode('/',$promo2[0]->Hyperlink,2);
                    if($searchChar[0] =='fitness_equipment'){
                        $mylink = 'cardio/'.$searchChar[1];
                    }
                    else{
                        $mylink =$promo2[0]->Hyperlink;
                    }
                    ?>
                        <p><a class="blue_clor" title="<?php  print_r($promo2[0]->CTALinkTitleAttribute); ?>" href="<?php print_r(base_url().$mylink);?>"><?php print_r($promo2[0]->LinkCallToAction);?></a></p>
                    </div>
                    <div class="product_ingsa_1920"><a  href="<?php print_r(base_url().$mylink);?>"><img src="<?php print_r(base_url().$promo2[0]->ImageLarge);?>" alt="<?php  print_r($promo2[0]->ImageAltAttribute); ?>" title="<?php  print_r($promo2[0]->ImageTitleAttribute); ?>"></a></div>
                    <div class="product_ingsa_960"><a  href="<?php print_r(base_url().$mylink);?>"><img src="<?php  print_r(base_url().$promo2[0]->ImageMedium); ?>"  alt="<?php  print_r($promo2[0]->ImageAltAttribute); ?>" title="<?php  print_r($promo2[0]->ImageTitleAttribute); ?>"></a></div>
                    <div class="product_ingsa_320"><a  href="<?php print_r(base_url().$mylink);?>"><img src="<?php  print_r(base_url().$promo2[0]->ImageSmall); ?>"   alt="<?php  print_r($promo2[0]->ImageAltAttribute); ?>" title="<?php  print_r($promo2[0]->ImageTitleAttribute); ?>"></a></div>
                </div>
            </div>
            <?php }?>
            <?php if(empty($promo3[0]->ImageLarge)){ ?>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 col-xl-3 padd_none_hom">
                <div class="home_pahe__afterBANNER">
                    <div class="product_content_tex POGESN1">
                        <h3>Cybex</h3>
                        <h2>750A Arc Trainer</h2>
                        <p><a class="blue_clor" href="">Learn More > </a></p>
                    </div>
                    <div class="product_ingsa_1920"><img src="<?php echo base_url(); ?>/public/assets/images/thirdproductaa.png"></div>
                    <div class="product_ingsa_960"><img src="<?php echo base_url(); ?>/public/assets/images/thirdproductaa.png"></div>
                    <div class="product_ingsa_320"><img src="<?php echo base_url(); ?>/public/assets/images/thirdproductaa.png"></div>
                </div>
            </div>
            <?php } else{?>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 col-xl-3 padd_none_hom">
                <div class="home_pahe__afterBANNER">
                    <div class="product_content_tex POGESN1">
                    <!-- echo str_replace("world","Peter","Hello world!"); -->
                    <?php 
                    $searchChar =explode('/',$promo3[0]->Hyperlink,2);
                    if($searchChar[0] =='fitness_equipment'){
                        $mylink = 'cardio/'.$searchChar[1];
                    }
                    else{
                        $mylink = $promo3[0]->Hyperlink;
                    }
                    ?>
                        <h3><?php print_r($promo3[0]->ProductBrand); ?></h3>
                        <h2><?php print_r($promo3[0]->ProductName); ?></h2>
                        <p><a class="blue_clor" title="<?php  print_r($promo3[0]->CTALinkTitleAttribute); ?>" href="<?php print_r(base_url().$mylink);?>"><?php print_r($promo3[0]->LinkCallToAction);?></a></p>
                    </div>
                    <div class="product_ingsa_1920"><a  href="<?php print_r(base_url().$mylink);?>"><img src="<?php print_r(base_url().$promo3[0]->ImageLarge);?>"  alt="<?php  print_r($promo3[0]->ImageAltAttribute); ?>" title="<?php  print_r($promo3[0]->ImageTitleAttribute); ?>"></a></div>
                    <div class="product_ingsa_960"><a  href="<?php print_r(base_url().$mylink);?>"><img src="<?php  print_r(base_url().$promo3[0]->ImageMedium); ?>" alt="<?php  print_r($promo3[0]->ImageAltAttribute); ?>" title="<?php  print_r($promo3[0]->ImageTitleAttribute); ?>"></a></div>
                    <div class="product_ingsa_320"><a  href="<?php print_r(base_url().$mylink);?>"><img src="<?php  print_r(base_url().$promo3[0]->ImageSmall); ?>" alt="<?php  print_r($promo3[0]->ImageAltAttribute); ?>" title="<?php  print_r($promo3[0]->ImageTitleAttribute); ?>"></a></div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>

