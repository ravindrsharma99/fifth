
      <footer class="site-footer">
          <div class="text-center">
             Copyright © 2015 Global Fitness, Inc. All rights reserved.
              <a href="#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
   
    <script src="<?php echo base_url('public/assets/js/jquery-1.8.3.min.js');?>"></script>
    <script src="<?php echo base_url('public/assets/js/bootstrap.min.js') ?>"></script>
    <script class="include" type="text/javascript" src="<?php echo base_url('public/assets/js/jquery.dcjqaccordion.2.7.js');?>"></script>
    <script src="<?php echo base_url('public/assets/js/jquery.scrollTo.min.js');?>"></script>
    <script src="<?php echo base_url('public/assets/js/jquery.nicescroll.js');?>" type="text/javascript"></script>
    <script src="<?php echo base_url('public/assets/js/jquery.sparkline.js');?>" type="text/javascript"></script>
    <script src="<?php echo base_url('public/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js');?>"></script>
    <script src="<?php echo base_url('public/assets/js/owl.carousel.js');?>" ></script>
    <script src="<?php echo base_url('public/assets/js/jquery.customSelect.min.js');?>" ></script>
    <script src="<?php echo base_url('public/assets/js/respond.min.js');?>" ></script>
    <!--common script for all pages-->
    <script src="<?php echo base_url('public/assets/js/common-scripts.js');?>"></script>
    <!--script for this page-->
    <script src="<?php echo base_url('public/assets/js/sparkline-chart.js');?>"></script>
    <script src="<?php echo base_url('public/assets/js/easy-pie-chart.js');?>"></script>

    

<script src="https://cdn.datatables.net/1.10.8/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.8/js/dataTables.bootstrap.min.js " type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
  $('#hidden-table-info').DataTable();
});
</script>



<?php  if(isset($title) && (($title=="Add Strength Product") || ($title=="Add Cardio Product"))){ ?>
<script src="<?php echo base_url('/public/assets/js'); ?>/chosen.jquery.js" type="text/javascript"></script>
 <script type="text/javascript">
    var config = {
      '.chosen-select'           : {},
      '.chosen-select-deselect'  : {allow_single_deselect:true},
      '.chosen-select-no-single' : {disable_search_threshold:10},
      '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
      '.chosen-select-width'     : {width:"95%"}
    }
    for (var selector in config) {
      $(selector).chosen(config[selector]);
    }
  </script>
<?php } ?>
