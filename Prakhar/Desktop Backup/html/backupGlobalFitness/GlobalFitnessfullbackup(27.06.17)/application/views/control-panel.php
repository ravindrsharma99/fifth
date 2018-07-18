<?php
$count_activeUser = $users[0]->active;
$count_deactiveUser =$users[0]->deactive;
?>
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <!--state overview start-->
    <div class="row state-overview">
    <!--   <a href="<?php echo site_url('Trainers/trainerslist') ?>">       -->
        <div class="col-lg-6 col-sm-6">                          
          <section class="panel">
            <div class="symbol logoblue">
              <i class="fa fa-users"></i>
            </div>
            <div class="value">
              <h1 class="count">0</h1>
              <p>Total Active Users </p>
            </div>
          </section>          
        </div>
    <!--   </a>
      <a href="<?php echo site_url('Trainers/trainerslist') ?>">       -->
        <div class="col-lg-6 col-sm-6">                          
          <section class="panel">
            <div class="symbol logoblue">
              <i class="fa fa-users"></i>
            </div>
            <div class="value">
              <h1 class="count2">0</h1>
              <p>Total Deactive Users </p>
            </div>
          </section>          
        </div>
    <!--   </a>     -->      
    </div> 
    <!--state overview end--> 
    <!-- <div class="text-center" style="font-size: 16px; font-weight: bold;">
      Under Construction
    </div> -->
    <div class="row">
      <div class="col-lg-12">                 
        <div id="piechart" style="width: 100%; height: 500px;"></div>
      </div>
      <!--new earning start-->
      
      <!--new earning end-->  
    </div>
  </section>
</section>
</body>
</html>
    <script src="<?php echo base_url('public/assets/js/jquery.js');?>"></script>
    <script src="<?php echo base_url('public/assets/js/count.js');?>"></script>
<script type="text/javascript">
  countUp(<?php echo $count_activeUser; ?>);
  countUp2(<?php echo $count_deactiveUser; ?>);
</script>
  <script type="text/javascript" src="https://www.google.com/jsapi"></script>

<?php $ch_data = "[ 'Active Users',".$count_activeUser."],['Deactive Users',".$count_deactiveUser."]"; ?>
<script type="text/javascript">
  google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
          ['Total Clients', 'Total Trainers'],
          <?php echo $ch_data;?>
        ]);
    var options = {
          title: 'Users Details',
          is3D: true,
          slices: {
            0: { color: '#22D0C1' },            
            1: { color: '#475561' }
          }
        };
    var chart = new google.visualization.PieChart(document.getElementById('piechart'));
    chart.draw(data, options);
  }
</script>  
