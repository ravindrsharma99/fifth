<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>
<?php if ($this->session->flashdata('msg')) { ?>
<div>
    <h3><?php echo $this->session->flashdata('msg') ?></h3></div>
<?php } ?>
<script>
$(document).ready(function(){
$(".fieldName_css").prop("readonly", true);
});
</script>
<div class="panel_Custom">
<form action="<?php echo base_url(); ?>Booking/quoteinfo" method="GET">
    <div class="centered-form">
        <div class="getFORm NEW_varification_form">
            <div class="right_login_form">
                <div class="panel_Custom">
                    <div class="row">
                        <div class="HADING_TITTLE">
                            <div class="col-md-4 col-sm-4">
                                <div class="title">
                                    <h2>Contact Information</h2>
                                </div>
                            </div>
                            <div class="col-md-8 col-sm-8">
                                <div class="contact_info">
                                    <ul>
                                        <li><span><img src="<?php echo base_url(); ?>assests/images/usser.png"></span>
                                            <input type="text" id="ssname" value="<?php echo $name ; ?>" style="color:FFF;" name="name" required>
                                        </li>
                                        <li><span><img src="<?php echo base_url(); ?>assests/images/phone.png"></span>
                                            +65<input type="text" id="ssphone" name="num" onkeypress="return isNumber(event)" maxlength="8" value="<?php echo $phone ; ?>" style="color:FFF;" required>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6">
                        <input type="hidden" name="categoryType" id="categoryType" value="">
                            <div class="form-group">
                                <label>Select Category</label>
                                <select class="SELECT_box_penal" name="categoryid" id="category23">
                                    <option> --Select-- </option>
                                    <?php foreach($fet as $fe){
                                                    $fee = $fe->id;  ?>
                                    <option value="<?php echo $fee ; ?>">
                                        <?php echo $fe->categoryName;?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <label>Select Sub Category</label>
                                <select class="SELECT_box_penal" name="subcategoryid" id="sub1" onclick="subtypecheck()" required>
                                    <!--  <option >-- select --</option> -->
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group" id="h1" style="display:none;">
                                <div id="hh">
                                </div>
                                <?php //print_r($_SESSION['service_pro']); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row displaynone" id="selct_type">
                        <div class="HADING_TITTLE">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="title">
                                    <h2>Number Of Hours</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <label>Select Hours</label>
                                <input type="hidden" id="base_price1" value="">
                                <input type="hidden" id="hourly1" value="">
                                <select class="SELECT_box_penal" name="categoryid" id="hour_cal">
                                    <option value="1">1 Hours</option>
                                    <option value="1.5">1.5 Hours</option>
                                    <option value="2">2 Hours</option>
                                    <option value="2.5">2.5 Hours</option>
                                    <option value="3">3 Hours</option>
                                    <option value="3.5">3.5 Hours</option>
                                    <option value="4">4 Hours</option>
                                    <option value="4.5">4.5 Hours</option>
                                    <option value="5">5 Hours</option>
                                    <option value="5.5">5.5 Hours</option>
                                    <option value="6">6 Hours</option>      
                                </select>
                            </div>
                        </div>
                    </div>  
                    <div class="row">
                        <div class="HADING_TITTLE">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="title">
                                    <h2><span><img src="<?php echo base_url(); ?>assests/images/time.png"></span>Date & Time</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                           <!--  <div class="date_time" id="datetimepicker">
                                <ul>
                                    <li><span><img src="<?php echo base_url(); ?>assests/images/datepicer.png"></span>
                                        <input type="text" required name="date" id="datepicker" value="">
                                    </li>
                                    <li><span><img src="<?php echo base_url(); ?>assests/images/timing.png"></span>
                                        <input type="text" id="time" class="form-control floating-label" required name="time" placeholder="Time">
                                    </li>
                                </ul>
                            </div> -->
                            <div class='input-group date' >
                                <input type='text' class="form-control"  required id='datetimepicker6'/>
                                <span class="input-group-addon">
                                    <!-- <span class="glyphicon glyphicon-calendar"></span> -->
                                </span>
                            </div>
                          
                        </div>
                    </div>
                    <div class="row">
                        <div class="HADING_TITTLE">
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <div class="title">
                                    <h2><span><img src="<?php echo base_url(); ?>assests/images/location.png"></span>Location Info</h2>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <div class="add_new">
                                    <a href="javascript:void(0)"><span id="addnew">Add WayPoints</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 labl">
                            <h1>Select your pick up</h1>
                            <div class="loaction">
                                <input type="hidden" id="path_time" name="path_time" value="">
                                <input type="hidden" id="path_waypoint" name="path_waypoint" value="">
                                <input type="hidden" class="form-control" id="start_location_lat" name="picklat">
                                <input type="hidden" class="form-control" id="start_location_lng" name="picklng">
                                <input type="hidden" class="form-control" id="end_location_lat" name="droplat">
                                <input type="hidden" class="form-control" id="end_location_lng" name="droplng">
                                <a onclick="mydata();" type="hidden" class="fb" data-toggle="modal" data-target="#myModal">
                                    <input type="text" class="fieldName_css" id="start_location_outer" name="pickup_location_val1" required/>
                                </a>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12" id="newdiv">
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 labl" id="hidee">
                            <h1>Select your destination</h1>
                            <div class="loaction">
                                <input type="text" class="fieldName_css" id="end_location_outer" readonly="readonly" name="location1" required>
                            </div>
                        </div>
                           <div class="row1">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="date_time">
                                <ul>
                                    <li>
                                        <span><img src="<?php echo base_url(); ?>assests/images/ic_distance.png"></span>
                                        <input type="text" class="fieldName_css" readonly="readonly" id="distancekm" name="distancekm" value="" placeholder="Distance">
                                    </li>
                                    <li>
                                        <span><img src="<?php echo base_url(); ?>assests/images/ic_time_distance.png"></span>
                                        <input type="text" class="fieldName_css" id="time123" class="form-control floating-label"  name="time123" value="" placeholder="Travel Time">
                                       <!--  <input type="hidden" id="path_waypoint" name="path_waypoint" value=""> -->
                                    </li>
                                </ul>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="HADING_TITTLE">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="title">
                                    <h2>Questions</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <label for="inputPassword3" class="question DISCRUption">QUESTIONS</label>
                            <div class="form-group CuSTom_penaL">
                               <!--  <label class="sr-only" for="">Questions</label> -->
                                <?php $i = 1; foreach($question as $qustn){ ?>
                                <p class="penal_HALf_text">
                                    <input type="hidden" value="<?php echo $qustn->question ; ?>" name="question<?php echo $i ; ?>">
                                    <?php echo $qustn->question ; ?>
                                </p>
                                <div class="penal_HALf">
                                    <div class="radio radio-info radio-inline">
                                        <input class="RADIO_buton" type="radio" id="<?php echo $i ; ?>" value="<?php echo $i ; ?>" name="radioInline<?php echo $i ; ?>">
                                        <label class="RADIO_buton_label" for="inlineRadio1"> Yes </label>
                                    </div>
                                    <div class="radio radio-inline">
                                        <input class="RADIO_buton" type="radio" id="<?php echo $i ; ?>" value="<?php echo $i ; ?>" name="radioInline<?php echo $i ; ?>">
                                        <label class="RADIO_buton_label" for="inlineRadio2"> No </label>
                                    </div>
                                </div>
                                <?php $i++; }  ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="HADING_TITTLE">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="title">
                                    <h2>Description</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <!-- <label for="inputPassword3">Description</label> -->
                                <textarea class="form-control magn_btm" id="textarea" name="description" rows="3" maxlength="250"></textarea>
                               <span class="text-right_custum" id="desciption_len" style="color:#f00; padding: 5px 0 5px;">250 Characters remaining</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="HADING_TITTLE">
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <div class="title">
                                    <h2><span><img src="<?php echo base_url(); ?>assests/images/dollor.png"></span>Price</h2>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <div class="add_new">
                                    <a href="javascript:void(0);">
                                        <input type="submit" name="orderbook" value="Review Order">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>        
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="loaction">
                                <div class="col-md-6 col-sm-6">
                                    <div class="est">
                                        <h3><span><img src="<?php echo base_url(); ?>assests/images/esT.png"></span>EST . FARE</h3>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="est">
                                        <h4>$<input type="hidden" id="spann2" name="estprice" value=""><span id="spann1">0</span></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="loaction">
                                <div class="col-md-6 col-sm-6">
                                    <div class="est">
                                        <h3><span><img src="<?php echo base_url(); ?>assests/images/extra.png"></span>EXTRA FEATURES</h3>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="est">
                                        <h4><input type="hidden" id="txt" name="extrafea" value="">$<span id="total">0</span></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   <!--  <?php if(isset($_SESSION['oks']) && isset($_SESSION['service_pro'])){ ?> -->
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                           <!--  <div class="form-group">
                                <label for="inputPassword3">Description</label>
                                <textarea class="form-control" id="textarea" name="description" required rows="3" maxlength="250"></textarea>
                                <span class="text-right_custum" id="desciption_len">250 Characters remaining</span>
                            </div> -->
                        </div>
                    </div>
                    <!-- <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <label for="inputPassword3" class="question DISCRUption">QUESTIONS</label>
                            <div class="form-group CuSTom_penaL">
                                <label class="sr-only" for="">Questions</label>
                                <?php $i = 1; foreach($question as $qustn){ ?>
                                <p class="penal_HALf_text">
                                    <input type="hidden" value="<?php echo $qustn->question ; ?>" name="question<?php echo $i ; ?>">
                                    <?php echo $qustn->question ; ?>
                                </p>
                                <div class="penal_HALf">
                                    <div class="radio radio-info radio-inline">
                                        <input class="RADIO_buton" type="radio" id="<?php echo $i ; ?>" value="<?php echo $i ; ?>" name="radioInline<?php echo $i ; ?>">
                                        <label class="RADIO_buton_label" for="inlineRadio1"> Yes </label>
                                    </div>
                                    <div class="radio radio-inline">
                                        <input class="RADIO_buton" type="radio" id="<?php echo $i ; ?>" value="<?php echo $i ; ?>" name="radioInline<?php echo $i ; ?>">
                                        <label class="RADIO_buton_label" for="inlineRadio2"> No </label>
                                    </div>
                                </div>
                                <?php $i++; }  ?>
                            </div>
                        </div>
                    </div> -->
                    <!-- <?php } ?> -->
                                
                </div>
            </div>
        </div>
    </div>
</form>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="<?php echo base_url(); ?>assests/js/bootstrap.js"></script>
<script src="<?php echo base_url(); ?>assests/js/animate.js"></script>
<script src="https://code.jquery.com/jquery-1.12.3.min.js" integrity="sha256-aaODHAgvwQW1bFOGXMeX+pC4PZIPsvn2h1sArYOhgXQ=" crossorigin="anonymous"></script>
<!--<script type="text/javascript" src="http://momentjs.com/downloads/moment-with-locales.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assests/js/bootstrap-material-datetimepicker.js"></script> -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>                       
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script>
$(document).ready(function(){
    $('#hour_cal').click(function(){
        $time_1 = parseFloat($('#hour_cal').val());
        $hour_1 = parseFloat($('#hourly1').val());
        $base_1 = parseFloat($('#base_price1').val());
        var est_pri = parseFloat($('#spann2').val());
        $totalfaree = $hour_1 * $time_1 + $base_1 ;
        //alert($totalfaree);return false;
        $('#spann2').val($totalfaree);
        $('#spann1').html($totalfaree);

    });
});
</script>
<script>
function myfunction(elem) {
    // console.log(i);
    var cal123 = parseFloat($('#spann2').val());
var delete_id = $(elem).val();
    var str = $(elem).attr('id');
    var res = str.split("-");
    var nmb = res[1];


                var st = [];
                var ut = [];
                
                var lat1 = $('#start_location_lat').val();
                var lng1 = $('#start_location_lng').val();
                var origin = lat1 + ',' + lng1;

                var lat2 = $('#end_location_lat').val();
                var lng2 = $('#end_location_lng').val();
                var destination = lat2 + ',' + lng2;
                for (var l = 1; l < i; l++) {
                        if(delete_id == l){



                        }else{
                    var s = $('#endd_location_latt' + l).val();
                    var t = $('#endd_location_lngg' + l).val();
                    // console.log(l);
                    if (((s == '') || (s == null)) && ((t == '') || (t == null))) {
                        var m = '';
                    } else{
                        var m = s + ',' + t + '|';

                        st += s + ',' + t + '|';
                        ut += s + ',' + t;
                    }
                    }
                }
    var alt = parseFloat($('#wyrs').val());
    var alt1 = parseFloat($('#spann2').val());
    var alt2 = parseFloat($('.loctn').val());
    if(st ==''){
        $var = 'updateData';
        $var1 = 'Booking';
        }else{
        $var = 'updateData1';
        $var1 = 'Access';    
        }
    if (alt == "") {
        $('#spann1').html(suub);
        $('#appdiv-'+nmb+'').remove();

    } else {
        // console.log(st);
        console.log($var1);
         var val_chck1 = $('#sub1').val();
        j.ajax({
            method: 'POST',
       url: 'http://kudosfind.com/'+$var1+'/'+$var,
      data: 'val=' + st + '&origin=' + origin + '&destination=' + destination + '&inc=' + i+'&sub_cat='+val_chck1,
            success: function(result) {
                console.log(result);
                // return false;
               $ar = $.parseJSON(result);
                //console.log($ar);
                var distance = $ar.key;
                var res = distance.replace("km", "Kilometers");
                $time = $ar.key1;
                $resultss = $ar.key2;
                $tt_result = $resultss + cal123;
                $path_way = $ar.key3;
                $path_time = $ar.key4;
                $('#spann1').html($tt_result);
                $('#fare').val($tt_result);
                $('#spann2').val($tt_result);
                $('#est').html($tt_result);
                $('#time123').val($time);
                $('#distancekm').val(res);
                $('#path_waypoint').val($path_way);
                $('#path_time').val($path_time);
            // }
            }
        });








        var suub = alt1;
        // alert(suub);

        $('#spann1').html(suub);
        $('#appdiv-'+nmb+'').remove();




    }
    if(i > 0 ){
      i= i - 1;  
    }else{
        i= 0;
    }
}
</script>
<script>
$(document).ready(function() {
    $('#btnn').click(function() {
        var cal123 = parseFloat($('#spann2').val());
        var lat1 = $('#start_location_lat').val();
        var lng1 = $('#start_location_lng').val();
        var origin = lat1 + ',' + lng1;
        var lat2 = $('#end_location_lat').val();
        var lng2 = $('#end_location_lng').val();
        var val_chck1 = j('#sub1').val();
        var sub_chck1 = j('#category23').val();

        var destination = lat2 + ',' + lng2;
        j.ajax({
            method: 'POST',
            url: 'http://kudosfind.com/Access/updateData1',
            data: 'origin=' + origin + '&destination=' + destination+'&sub_cat='+val_chck1,
            success: function(result) {
                // console.log(result);
                // $('#spann1').html(result);
                // $('#fare').val(result);
                // $('#spann2').val(result);
                // $('#est').html(result);
                // $('#wyrs').val(result);
                 $ar = $.parseJSON(result);
                //console.log($ar);
                var distance = $ar.key;
                var res = distance.replace("km", "Kilometers");
                $time = $ar.key1;
                $resultss = $ar.key2;
                $tt_result = $resultss + cal123;
                $path_way = $ar.key3;
                $path_time = $ar.key4;
                $('#spann1').html($tt_result);
                $('#fare').val($tt_result);
                $('#spann2').val($tt_result);
                $('#est').html($tt_result);
                $('#time123').val($time);
                $('#distancekm').val(res);
                $('#path_waypoint').val($path_way);
                $('#path_time').val($path_time);
            }
        });

        // var radlat1 = Math.PI * lat1/180;
        // var radlat2 = Math.PI * lat2/180;
        // var theta = lng1-lng2;
        // var radtheta = Math.PI * theta/180;
        // var dist = Math.sin(radlat1) * Math.sin(radlat2) + Math.cos(radlat1) * Math.cos(radlat2) * Math.cos(radtheta);
        // dist = Math.acos(dist);
        // dist = dist * 180/Math.PI;
        // dist = dist * 60 * 1.1515;
        // dist = dist * 1.609344;
        //  //console.log(dist);
        //  $('#km').html(dist);
        //  var amt = 12;
        //  cal = dist * amt;
        //  result = cal.toFixed(0);
        //  //console.log(result);
        //  $('#spann1').html(result);
        //  $('#fare').val(result);
        //  $('#spann2').val(result);
        //  $('#est').html(result);
    });
});
</script>
<script>
// var j = jQuery.noConflict();
// j(document).ready(function() {
//     j(function() {
//         //j( "#datepicker" ).datepicker();
//         j('#datepicker').datepicker({
//             dateFormat: 'dd/mm/yy',
//             maxDate: "+30d",
//             minDate: 0
//         });
//         j( "#datepicker" ).datepicker($(this).val() );
//     });
// });
</script>
<script type="text/javascript">
// var j = jQuery.noConflict();
// j(document).ready(function() {
//     var date = j('#datepicker').val();
//     var fullDate = new Date()
//     var twoDigitMonth = ((fullDate.getMonth().length+1) === 1)? (fullDate.getMonth()+1) :(fullDate.getMonth()+1);
//     var currentDate = fullDate.getDate() + "/" + twoDigitMonth + "/" + fullDate.getFullYear();
//     //var = ('#')
//     if(currentDate){
//     j('#time').bootstrapMaterialDatePicker({

//         date: false,
//         shortTime: false,
//         format: 'HH:mm',
//        minDate: moment().add(0, 'h'),enabledHours: [1,2,3,4,5,6,,7,8,9,10, 11, 12, 13, 14, 15, 16,17,18,19,20,21,22,23]
//     });
//     }
// });
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

<script>

$('#datetimepicker6').keypress(function(event) {
        if(event.keyCode == 8){
         return false;
     }else{
        event.preventDefault();
         return false;
     }
     });
$('#datetimepicker6').datetimepicker({
    //format:'dd-mm-yyyy hh:mm'
    minDate: moment().add(0, 'h'),
    maxDate: moment().add(30, 'd'),
    enabledHours: [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23]
});

</script>
<script type="text/javascript">
$(document).ready(function() {
    $("div.bhoechie-tab-menu>div.list-group>a").click(function(e) {
        e.preventDefault();
        $(this).siblings('a.active').removeClass("active");
        $(this).addClass("active");
        var index = $(this).index();
        $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
        $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
    });
});
</script>
<script type="text/javascript">
var j = jQuery.noConflict();
j(document).ready(function() {

    j('#category23').on('change', function() {

        var value = j('#category23').val();
        j.ajax({
            method: 'POST',
            url: '<?php echo base_url(); ?>Booking/subcat',
            data: 'catId=' + value,
            success: function(html) {
                // console.log(html);
                // alert(html);
                j('#sub1').html(html);
                $('#h1').hide();
                $('#h2').hide();
                $('#h3').hide();
                $('#sub2').hide();
                $('#sub3').hide();
                $('#qysp').addClass('displaynone');
                $('#fgdn').addClass('displaynone');
                $('#selct_type').addClass('displaynone');
                $zerro = 0;
                $nn = $('.quntity-input').val($zerro);
                $('#txt').val($zerro);
                $('#total').html($zerro);
                $('#cost').val($zerro);
            }
        });
    });

    j('#sub1').click(function() {
        $('#h1').hide();
        $('#h2').hide();
        $('#h3').hide();
        $('#sub2').hide();
        $('#sub3').hide();
        $('#qysp').addClass('displaynone');
        $('#fgdn').addClass('displaynone');
        $('#selct_type').addClass('displaynone');
        $zerro = 0;
        $nn = $('.quntity-input').val($zerro);
        $('#txt').val($zerro);
        $('#total').html($zerro);
        $('#cost').val($zerro);

        var value1 = j('#sub1').val();
        //alert(value1);return false;
        j.ajax({
            method: 'POST',
            url: 'http://kudosfind.com/Booking/ssubcat',
            data: 'scatId=' + value1,
            success: function(html) {
                // console.log(value1);
                if (html == "error") {
                    $('#h1').hide();
                    $('#h2').hide();
                    $('#h3').hide();
                    $('#sub2').hide();
                    $('#sub3').hide();
                    $('#qysp').addClass('displaynone');
                    $('#fgdn').addClass('displaynone');
                    $('#selct_type').addClass('displaynone');
                    return false;
                } else {
                    $('#h1').show();
                    $('#h2').show();
                    $('#h3').show();
                    $('#sub2').show();
                    $('#sub3').show();
                    $('#hh').html(html);
                    //$ar = JSON.parse(html);
                    //     $ar = $.parseJSON(html);
                    //     // console.log($ar.key1);
                    //     // console.log($ar.key1);
                    //     $val = $ar.key[1].ServiceType;
                    //     //console.log($val);return false;
                    //     $vali = $ar.key1['yes'];
                    //     //console.log($vali);return false;

                    //    for(var i = 0;i < $vali; i++){

                    //     // $hel = $ar.key[i].ServiceTitle;
                    //     //    j('#subject'+i).html($hel);
                    //        if($vali == 2 && $val == 3 ){
                    //             j('#qysp').removeClass('displaynone');
                    //             $('#fgdn').addClass('displaynone');
                    //             //$('#fixed').addClass('dispalynone');
                    //             $id = $ar.key[i].id;
                    //             $hel = $ar.key[i].ServiceTitle;
                    //             $type = $ar.key[i].ServiceType;
                    //             $p1 = $ar.key[i].Price;
                    //             j('#pri1'+i).val($p1);
                    //             j('#subject'+i).html($hel);
                    //             j('#service'+i).val($hel);
                    //             j('#type'+i).val($type);
                    //             j('#id'+i).val($id);
                    //             j('#nm'+i).val($hel);
                    //             j('#nmn'+i).html($hel);

                    //        }else if($vali == 2){
                    //             j('#qysp').removeClass('displaynone');
                    //             $('#fgdn').addClass('displaynone');
                    //             //$('#fixed').addClass('dispalynone');
                    //             $id = $ar.key[i].id;
                    //             $hel = $ar.key[i].ServiceTitle;
                    //             $type = $ar.key[i].ServiceType;
                    //             $p1 = $ar.key[i].Price;
                    //             j('#pri1'+i).val($p1);
                    //             j('#subject'+i).html($hel);
                    //             j('#service'+i).val($hel);
                    //             j('#type'+i).val($type);
                    //             j('#id'+i).val($id);
                    //             j('#nm'+i).val($hel);
                    //             j('#nmn'+i).html($hel);

                    //        }else{
                    //              $id = $ar.key[i].id;
                    //             $hel = $ar.key[i].ServiceTitle;
                    //             $type = $ar.key[i].ServiceType;
                    //             $p1 = $ar.key[i].Price;
                    //             j('#subject'+i).html($hel);
                    //             j('#id'+i).val($id);
                    //             j('#service'+i).val($hel);
                    //             j('#type'+i).val($type);
                    //             j('#pri1'+i).val($p1);
                    //             j('#nm'+i).val($hel);
                    //             j('#nmn'+i).html($hel);
                    //             //$('#subject2').removeClass('displaynone');
                    //             $('#qysp').removeClass('displaynone');
                    //             $('#fgdn').removeClass('displaynone');

                    // //}
                    //        }
                    //        // j('#sub3').html($pel);
                    //        // j('#sub4').html($sel);
                    //       console.log($hel);
                    //    }


                }

            }
        });

    });

});
</script>
<script>
function subtypecheck(){
   var val_chck = j('#sub1').val();
   var sub_chck = j('#category23').val();
   j.ajax({
        method: 'POST',
        url: '<?php echo base_url(); ?>Booking/ssubcat_check',
        data: 'sub_check='+sub_chck+'&val_chck='+val_chck,
        success: function(result) {
            //console.log(result);return false;
            $remm = $.parseJSON(result);
            $type = $remm.keyy1;
            $rate = $remm.keyy;
            $base_price = $remm.keyy2;
            $hourlyy = $remm.keyy3;
            if($type == 1){
               // console.log(result);
                $('#hidee').show();
                $('.add_time').show();
                // $('#edlc').show();
                // $('#btnn').show();
                $('.date_time').show();
                $('#addnew').show();
                $('#categoryType').val($type);
                $('#spann2').val($rate);
                $('#spann1').html($rate);
            }else{
                //console.log(result);
               $('#hidee').hide();
               //$('.date_time').parent().remove();
               $('.date_time').hide();
               $('#edlc').hide();
               $('#btnn').hide();
               $('#addnew').hide();
               $('#selct_type').removeClass('displaynone');
               $('#categoryType').val($type);
               $('#spann2').val($rate);
               $('#spann1').html($rate);
               $('#base_price1').val($base_price);
               $('#hourly1').val($hourlyy);
               return true;
            }

        }
    });
}
</script>
<script>
function testt0(argument) {
    console.log($(argument).text());
    var $button = argument;
    //console.log($button);
    $input = $(argument).closest('.sp-quantity').find("input.quntity-input");
    var oldValue = $input.val(),
        newVal;
    var move = parseFloat($('#span0').val()) || 0;
    var bike = parseFloat($('#span1').val()) || 0;
    var bike1 = parseFloat($('#span2').val()) || 0;
    var totall = parseFloat($('#txt').val());
    var cost = $("#cost").val() || 0;
    var p1 = parseFloat($('#pri10').val());
    if ($(argument).text() == "+") {
        newVal = 0;
        newVal = parseFloat(oldValue) + 1; //no of quantity 
        cal = newVal * p1;
        if (cost == 0) {
            $('#span0').val(cal);
            $('#amt').val(cal);
            $('#amt1').html(cal);
            add = cal + bike + bike1;
            $('#txt').val(add);
            $('#total').html(add);
        } else {
            var costVal = parseInt($("#cost").val());
            $('#span0').val(cal);
            $('#amt').val(cal);
            $('#amt1').html(cal);
            add = cal + bike + costVal + bike1;
            $('#txt').val(add);
            $('#total').html(add);
        }
    } else {
        if (oldValue == 0) {
            newVal = 0;
            $('#a0').css('pointer-events', 'none');
        } else {
            if (oldValue > 0) {
                newVal = 0;
                newVal = parseFloat(oldValue) - 1;
                if (bike == 0 && cost == 0 && bike1 == 0) {
                    cal = newVal * p1;
                    $('#span0').val(cal);
                    $('#amt').val(cal);
                    $('#amt1').html(cal);
                    sub = cal;
                    $('#txt').val(sub);
                    $('#total').html(sub);
                } else if (cost > 0) {
                    var costVal = parseInt($("#cost").val());

                    cal = newVal * p1;
                    $('#span0').val(cal);
                    $('#amt').val(cal);
                    $('#amt1').html(cal);
                    sub = totall - p1;
                    $('#txt').val(sub);
                    $('#total').html(sub);
                } else {
                    // alert('ede');
                    cal = newVal * p1;
                    $('#span0').val(cal);
                    $('#amt').val(cal);
                    $('#amt1').html(cal);
                    sub = totall - p1;
                    $('#txt').val(sub);
                    $('#total').html(sub);
                    $('#cost').val()
                }
            } else {
                newVal = 0;
                $('#span0').val(cal);
                $('#amt').val(cal);
                $('#amt1').html(cal);
                $('#total').html(cal);
            }
        }
    }
    $input.val(newVal);
}

function testt1(argument) {
    console.log($(argument).text());
    var $button = argument;
    //console.log($button);
    $input = $(argument).closest('.sp-quantity').find("input.quntity-input");
    var oldValue = $('#zero1').val(),
        newVall;
    var move = parseFloat($('#span0').val()) || 0;
    var bike = parseFloat($('#span1').val()) || 0;
    var bike1 = parseFloat($('#span2').val()) || 0;
    var totall1 = parseFloat($('#txt').val());
    var p2 = parseFloat($('#pri11').val());
    var costt = $("#cost").val() || 0;
    if ($(argument).text() == "+") {
        newVall = 0;
        newVall = parseFloat(oldValue) + 1;
        cal = newVall * p2;
        if (costt == 0) {
            //var costVal = parseFloat($("#cost").val());
            add = cal + move + bike1;
            $('#span1').val(cal);
            $('#amt2').val(cal);
            $('#amt3').html(cal);
            $('#txt').val(add);
            $('#total').html(add);
        } else {
            var costVal = parseFloat($("#cost").val());
            add = cal + move + costVal + bike1;
            $('#span1').val(cal);
            $('#amt2').val(cal);
            $('#amt3').html(cal);
            $('#txt').val(add);
            $('#total').html(add);
        }
    } else {
        if (oldValue == 0) {
            newVall = 0;
            $('#minus').css('pointer-events', 'none');
        } else {
            if (oldValue > 0) {
                newVall = 0;
                newVall = parseFloat(oldValue) - 1;
                if (move == 0 && costt == 0 && bike1 == 0) {
                    cal = newVall * p2;
                    $('#span1').val(cal);
                    $('#amt2').val(cal);
                    $('#amt3').html(cal);
                    sub = cal;
                    $('#txt').val(sub);
                    $('#total').html(sub);
                } else if (costt > 0) {
                    var costVal = parseInt($("#cost").val());
                    cal = newVall * p2;
                    $('#span1').val(cal);
                    $('#amt2').val(cal);
                    $('#amt3').html(cal);
                    sub = totall1 - p2;
                    $('#txt').val(sub);
                    $('#total').html(sub);
                } else {
                    // alert('ede');
                    cal = newVall * p2;
                    $('#span1').val(cal);
                    $('#amt2').val(cal);
                    $('#amt3').html(cal);
                    sub = totall1 - p2;
                    $('#txt').val(sub);
                    $('#total').html(sub);
                }
            } else {
                newVall = 0;
                $('#span1').val(cal);
                $('#amt2').val(cal);
                $('#amt3').html(cal);
                $('#total').html(cal);
            }
        }
    }
    $input.val(newVall);
}

function testt2(argument) {
    console.log($(argument).text());
    var $button = argument;
    //console.log($button);
    $input = $(argument).closest('.sp-quantity').find("input.quntity-input");
    var oldValue = $('#zero2').val(),
        newVall;
    var move = parseFloat($('#span0').val()) || 0;
    var bike = parseFloat($('#span1').val()) || 0; 
    var bike1 = parseFloat($('#span2').val()) || 0;
    var totall1 = parseFloat($('#txt').val());
    var p2 = parseFloat($('#pri12').val());
    var costt = $("#cost").val() || 0;
    if ($(argument).text() == "+") {
        newVall = 0;
        newVall = parseFloat(oldValue) + 1;
        cal = newVall * p2;
        if (costt == 0) {
            //var costVal = parseFloat($("#cost").val());
            add = cal + move + bike;
            $('#span2').val(cal);
            $('#amt2').val(cal);
            $('#amt3').html(cal);
            $('#txt').val(add);
            $('#total').html(add);
        } else {
            var costVal = parseFloat($("#cost").val());
            add = cal + move + costVal + bike;
            $('#span2').val(cal);
            $('#amt2').val(cal);
            $('#amt3').html(cal);
            $('#txt').val(add);
            $('#total').html(add);
        }
    } else {
        if (oldValue == 0) {
            newVall = 0;
            $('#minus').css('pointer-events', 'none');
        } else {
            if (oldValue > 0) {
                newVall = 0;
                newVall = parseFloat(oldValue) - 1;
                if (move == 0 && costt == 0) {
                    cal = newVall * p2;
                    $('#span2').val(cal);
                    $('#amt2').val(cal);
                    $('#amt3').html(cal);
                    sub = cal;
                    $('#txt').val(sub);
                    $('#total').html(sub);
                } else if (costt > 0) {
                    var costVal = parseInt($("#cost").val());
                    cal = newVall * p2;
                    $('#span2').val(cal);
                    $('#amt2').val(cal);
                    $('#amt3').html(cal);
                    sub = totall1 - p2;
                    $('#txt').val(sub);
                    $('#total').html(sub);
                } else {
                    // alert('ede');
                    cal = newVall * p2;
                    $('#span2').val(cal);
                    $('#amt2').val(cal);
                    $('#amt3').html(cal);
                    sub = totall1 - p2;
                    $('#txt').val(sub);
                    $('#total').html(sub);
                }
            } else {
                newVall = 0;
                $('#span1').val(cal);
                $('#amt2').val(cal);
                $('#amt3').html(cal);
                $('#total').html(cal);
            }
        }
    }
    $input.val(newVall);
}

// var flag=false;
// function testt2(argument) {
//   var costVal = parseInt($("#pri12").val());
//   if(flag)
//   {   
//     var move = $('#span0').val() || 0; 
//     var bike = $('#span1').val() || 0;
//     if(move != 0 && bike == 0){
//       var totall = parseFloat($('#txt').val());
//       sub = totall - costVal;
//       $("#cost").val(0);
//       $('#amt4').val(0);
//       $('#amt5').html(0);
//       $('#txt').val(sub);
//       $('#total').html(sub);
//      }else if(move == 0 && bike != 0){
//       var totall = parseFloat($('#txt').val());
//       sub = totall - costVal;
//       $("#cost").val(0);
//       $('#amt4').val(0);
//       $('#amt5').html(0);
//       $('#txt').val(sub);
//       $('#total').html(sub);
//   }else{
//       var totall = parseFloat($('#txt').val());
//       sub = totall - costVal;
//       $("#cost").val(0);
//       $('#amt4').val(0);
//       $('#amt5').html(0);
//       $('#txt').val(sub);
//       $('#total').html(sub);
//      }
//   }
//   else
//   { 
//     var move = $('#span').val() || 0; 
//     var bike = $('#span1').val() || 0;
//     if(move == 0 && bike == 0){
//       add = costVal;
//       $("#cost").val(add);
//       $('#amt4').val(add);
//       $('#amt5').html(add);
//       $('#txt').val(add);
//       $('#total').html(add);
//     }else{
//       var totall = parseFloat($('#txt').val());
//       add = totall + costVal;
//       $("#cost").val(costVal);
//       $('#amt4').val(costVal);
//       $('#amt5').html(costVal);
//       $('#txt').val(add);
//       $('#total').html(add);

//     }
//   }
//  flag=!flag;
// }


$('#order').click(function() {
    var sn = $('#ssname').val();
    $('#sdnm').val(sn);
    $('#sdnm1').html(sn);
    var sp = $('#ssphone').val();
    $('#sdph').val(sp);
    $('#sdph1').html(sp);
    var ctg = $('#ctid').val();
    $('#ctg1').val(ctg);
    // var pkl = $('#start_location_outer_d').val();
    //    $('#pkll').val(pkl);
    // var dpl = $('#end_location_outer_d').val();
    //    $('#dpll').val(dpl);
    var sdp = $('#datepicker').val();
    $('#dt').val(sdp);
    $('#dt1').html(sdp);
    var dtp = $('#time').val();
    $('#tm').val(dtp);
    $('#tm1').html(dtp);
    var maz = $('#start_location_lat').val();
    $('#start_location_lat0').val(maz);
    var maz1 = $('#start_location_lng').val();
    $('#start_location_lng0').val(maz1);
    var maz2 = $('#end_location_lat').val();
    $('#end_location_lat00').val(maz2);
    var maz3 = $('#end_location_lng').val();
    $('#end_location_lng00').val(maz3);
    // alert(ctg);
    //return false;
    //var estf = $('#spann2').val();
    //var ds = $('#txt').val();
    var mps = parseFloat($('#spann2').val());
    var tl = parseFloat($('#txt').val());
    var mps1 = $('#spann2').val();
    var tl1 = $('#txt').val();
    if (mps1 == 0 && tl1 != 0) {
        var add12 = tl;
        //alert(add12);return false;
        $('#ttl').val(add12);
        $('#ttll').html(add12);
    } else {
        //alert(tl);return false;
        var add12 = tl + mps;
        // alert(add12);return false;
        $('#ttl').val(add12);
        $('#ttll').html(add12);
    }

});
</script>
<script>
// var customLabel = {
//   restaurant: {
//     label: 'S'
//   },
//   bar: {
//     label: 'Ending'
//   }
// };
var label = 'Source';
var label1 = 'destination';

// function initMap() {
// var map = new google.maps.Map(document.getElementById('map'), {
//   center: new google.maps.LatLng(30.733315, 76.779418),
//   zoom: 15
// });
// var infoWindow = new google.maps.InfoWindow;

//   // Change this depending on the name of your PHP or XML file
//   downloadUrl('http://phphosting.osvin.net/rinkesh/kdmain/demo.php', function(data) {
//     var xml = data.responseXML;
//     var markers = xml.documentElement.getElementsByTagName('marker');
//     Array.prototype.forEach.call(markers, function(markerElem) {
//       var id = markerElem.getAttribute('id');
//       var name = markerElem.getAttribute('name');

//       var point = new google.maps.LatLng(
//           parseFloat(markerElem.getAttribute('lat')),
//           parseFloat(markerElem.getAttribute('lng')));
//        var point1 = new google.maps.LatLng(
//            parseFloat(markerElem.getAttribute('drop_lat')),
//            parseFloat(markerElem.getAttribute('drop_long')));
//       // console.log(point1);return false;

//       var infowincontent = document.createElement('div');
//       var strong = document.createElement('strong');
//       strong.textContent = name
//       infowincontent.appendChild(strong);
//       infowincontent.appendChild(document.createElement('br'));

//       var text = document.createElement('text');
//       //text.textContent = address
//       infowincontent.appendChild(text);
//       var icon = label || {};
//       var marker = new google.maps.Marker({
//         map: map,
//         position: point,
//         label: icon.label
//       });
//        var icon = label1 || {};
//         var marker1 = new google.maps.Marker({
//         map: map,
//         position: point1,
//         label: icon.label
//       });
//     var flightPath = new google.maps.Polyline({
//        path: [point,point1],
//        geodesic: true,
//        strokeColor: '#000000',
//        strokeOpacity: 1.0,
//        strokeWeight: 2
// });
//    flightPath.setMap(map);


//     });
//   });
// }



function downloadUrl(url, callback) {
    var request = window.ActiveXObject ?
        new ActiveXObject('Microsoft.XMLHTTP') :
        new XMLHttpRequest;

    request.onreadystatechange = function() {
        if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
        }
    };

    request.open('GET', url, true);
    request.send(null);
}
</script>
<div class="modal fade" id="review" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Service Details</h4>
            </div>
            <div class="modal-body">
                <div class="HADING_TITTLE">
                    <div class="col-md-4 col-sm-4">
                        <div class="popup_title">
                            <h2>Contact Information</h2></div>
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <div class="contact_info">
                            <form action="<?php echo base_url(); ?>index.php/Booking/successorder" method="POST">
                                <ul>
                                    <li><img src="<?php echo base_url(); ?>assests/images/usser.png">
                                        <input type="hidden" name="oname" id="sdnm" value=""><span id="sdnm1"></span></li>
                                    <li><img src="<?php echo base_url(); ?>assests/images/phone.png">
                                        <input type="hidden" name="ophone" id="sdph" value=""><span id="sdph1"></span></li>
                                </ul>
                        </div>
                    </div>
                </div>
                <input type="hidden" id="ctg1" name="categoryid" value="">
                <input type="hidden" name="start_location_lat0" id="start_location_lat0" value="">
                <input type="hidden" name="start_location_lng0" id="start_location_lng0" value="">
                <input type="hidden" name="end_location_lat00" id="end_location_lat00" value="">
                <input type="hidden" name="end_location_lng00" id="end_location_lng00" value="">
                <input type="hidden" name="pickup_location_val1" id="start_location_outer_d" value="">
                <input type="hidden" name="drop_location_val1" id="end_location_outer_d" value="">
                <input type="hidden" name="addway" id="wsyp" value="">
                <div class="HADING_TITTLE ">
                    <div class="col-md-4 col-sm-4">
                        <div class="title">
                            <h2><span><img src="<?php echo base_url(); ?>assests/images/time.png"></span>Date Time</h2></div>
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <div class="popup_contact_info">
                            <ul>
                                <li>
                                    <input type="hidden" id="dt" name="odate" value=""><span id="dt1"></span></li>
                                <li>
                                    <input type="hidden" id="tm" name="otime" value=""><span id="tm1"></span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="HADING_TITTLE ">
                    <div class="col-md-4 col-sm-4">
                        <div class="title">
                            <h2><span><img src="<?php echo base_url(); ?>assests/images/dollor.png"></span>Price</h2></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
                        <div class="col-xs-12 col-sm-12 col-md-12 ">
                            <div class="popup_loaction">
                                <div class="col-md-6 col-sm-6">
                                    <div class="est">
                                        <h3><span><img src="<?php echo base_url(); ?>assests/images/esT.png"></span>EST . FARE</h3>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="est">
                                        <h4><input type="hidden" name="fare" id="fare" value="">$<span id="est"></span></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="popup_loaction">
                                <div class="col-md-6 col-sm-6">
                                    <div class="est">
                                        <h3><img src="<?php echo base_url(); ?>assests/images/esT.png"><input type="hidden" id="nm"><span id="nm1"></span></h3>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="est">
                                        <h4><input type="hidden" id="amt" value="">$<span id="amt1"></span></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="popup_loaction">
                                <div class="col-md-6 col-sm-6">
                                    <div class="est">
                                        <h3><img src="<?php echo base_url(); ?>assests/images/esT.png"><input type="hidden" id="nm2"><span id="nm3"></span></h3>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="est">
                                        <h4><input type="hidden" id="amt2" value="">$<span id="amt3"></span></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="popup_loaction">
                                <div class="col-md-6 col-sm-6">
                                    <div class="est">
                                        <h3><img src="<?php echo base_url(); ?>assests/images/esT.png"><input type="hidden" id="nm4"><span id="nm5"></span></h3>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="est">
                                        <h4><input type="hidden" id="amt4" value="">$<span id="amt5"></span></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="popup_loaction">
                                <div class="col-md-12 col-sm-12">
                                    <hr>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="pop">
                                        <h3><span><img src="<?php echo base_url(); ?>assests/images/esT.png"></span>TOTAL FARE</h3>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="pop_right">
                                        <h4><input type="hidden" id="ttl" name="tprce" value="">$<span id="ttll"></span></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <P class="highlight">Tolls,labour and parking fees are not included</P>
            </div>
            <div class="modal-footer book_order">
                <input type="submit" name="suborder" id="ordersub" value="Book Order" class="book_now">
            </div>
        </div>
        </form>
    </div>
</div>
<!-- Modal map-->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content map-->
        <div class="modal-content">
            <div class="row">
                <div id="mapsss" style="height:400px;"></div>
            </div>
            <div class="row">
                <input type="hidden" class="form-control" id="start_location">
                <input type="hidden" class="form-control" id="end_location">
                <input type="hidden" class="form-control" id="endd_location">
            </div>
            <script>
            var map;
            var marker;

            var i = 1;

            function selectStart() {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        var fullAddress = JSON.parse(this.responseText);
                        //console.log(fullAddress.results[0].formatted_address);
                        var str = fullAddress.results[0].formatted_address;
                        var n = str.indexOf("India");
                        //console.log(n);
                        if (n == -1) {
                            alert("Please select location within India region!");
                            //clearOverlays();
                            return false;
                        }
                        document.getElementById("start_location").value = fullAddress.results[0].formatted_address;
                        document.getElementById("start_location_outer").value = fullAddress.results[0].formatted_address;
                        document.getElementById("start_location_outer_d").value = fullAddress.results[0].formatted_address;
                        document.getElementById("start_location_lat").value = map.getCenter().lat();
                        document.getElementById("start_location_lng").value = map.getCenter().lng();
                    }
                };
                xhttp.open("GET", 'http://maps.googleapis.com/maps/api/geocode/json?latlng=' + map.getCenter().lat() + ',' + map.getCenter().lng() + '&sensor=true', true);
                xhttp.send();
            }

            function selectEnd() {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        var fullAddress = JSON.parse(this.responseText);
                        //console.log(fullAddress.results[0].formatted_address);
                        var str = fullAddress.results[0].formatted_address;
                        var n = str.indexOf("India");
                        //console.log(n);
                        if (n == -1) {
                            alert("Please select location within India region!");
                            //clearOverlays();
                            return false;
                        }
                        document.getElementById("end_location").value = fullAddress.results[0].formatted_address;
                        document.getElementById("end_location_outer").value = fullAddress.results[0].formatted_address;
                        document.getElementById("end_location_outer_d").value = fullAddress.results[0].formatted_address;
                        document.getElementById("end_location_lat").value = map.getCenter().lat();
                        document.getElementById("end_location_lng").value = map.getCenter().lng();
                    }
                };
                xhttp.open("GET", 'http://maps.googleapis.com/maps/api/geocode/json?latlng=' + map.getCenter().lat() + ',' + map.getCenter().lng() + '&sensor=true', true);
                xhttp.send();
            }
            $('#addnew').click(function() {
                if(i < 11){
                $('#newdiv').append('<input type="hidden" class="form-control" id="endd_location_latt' + i + '">' + '<input type="hidden" class="form-control" id="endd_location_lngg' + i + '">' + '<div id="appdiv-' + i + '" class="location">' + '<h4>Select your waypoints</h4>' + '<a onclick="myfunction1()" class="fb" data-toggle="modal" data-target="#myModal"><input type="text"  id="endd_location_oute' + i + '" ><input type="text" class="loctn" id="number' + i + '"/></a>' + '<button type="button" onclick="myfunction(this)" id="deletee-' + i + '" value="'+i+'">X</button>' + '</div>');
                $('#spaning').html(i);
                i++;
                }else{
                    alert('Maximum WayPoints added');
                }
            });

            function myfntn(elem) {
                 var cal123 = parseFloat($('#spann2').val());
                 var val_chck1 = $('#sub1').val();
       
                $distance_km = $('#distancekm').val();
                var val = i;
                var st = [];
                var ut = [];
                
                var lat1 = $('#start_location_lat').val();
                var lng1 = $('#start_location_lng').val();
                var origin = lat1 + ',' + lng1;

                var lat2 = $('#end_location_lat').val();
                var lng2 = $('#end_location_lng').val();
                var destination = lat2 + ',' + lng2;
                for (var l = 1; l < i; l++) {
                    var s = $('#endd_location_latt' + l).val();
                    var t = $('#endd_location_lngg' + l).val();
                    if (((s == '') || (s == null)) && ((t == '') || (t == null))) {
                        var m = '';
                    } else {
                        var m = s + ',' + t + '|';

                        st += s + ',' + t + '|';
                        ut += s + ',' + t;
                    }

                }

                // var wy = origin+','+ut;
                // console.log(st);
                // console.log(origin);
                // console.log(destination);
                // var vvn = null;
                $('#wsyp').val(ut);
                j.ajax({
                    method: 'POST',
                    url: 'http://kudosfind.com/Booking/updateData',
                    data: 'val=' + st + '&origin=' + origin + '&destination=' + destination + '&inc=' + i+' &sub_cat='+val_chck1,
                    success: function(result) {
                        //console.log(result);
                        //return false;
                        // var vvn = result;
                        // console.log(vvn);
                        // $('#spann1').html(result);
                        //   $('#fare').val(result);
                        //   $('#spann2').val(result);
                        //   $('#est').html(result);
                        // var a12 = $('#wyrs').val(result);
                        //alert(a12);        
                        // $('#spann1').html(result);
                        // $('#fare').val(result);
                        // $('#spann2').val(result);
                        // $('#est').html(result);;
                     $ar = $.parseJSON(result);
                // console.log($ar);return false;
                    $distance = $ar.key;
                    $time = $ar.key1;
                    $resultss = $ar.key2;
                    $tt_result = $resultss + cal123;
                    $path_way = $ar.key3;
                    $path_time = $ar.key4;
                    if($distance == 0 || $distance < $distance_km){
                        alert('Please select correct waypoints');
                        $i = 1;
                        $zero11 = '';
                        $('#endd_location_oute'+ $i ).val($zero11);
                        $i++;
                        return false;
                    }else{
                    $('#spann1').html($tt_result);
                        $('#fare').val($tt_result);
                        $('#spann2').val($tt_result);
                        $('#est').html($tt_result);
                        $('#time123').val($time);
                        $('#distancekm').val($distance);
                        $('#path_waypoint').val($path_way);
                        $('#path_time').val($path_time);
                    }
                  }
                });
            }

            function selectwayEnd() {
                var xhttp = new XMLHttpRequest();
                var uni = $('#number').val();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        var fullAddress = JSON.parse(this.responseText);
                        //console.log(fullAddress.results[0].formatted_address);
                        var str = fullAddress.results[0].formatted_address;
                        var n = str.indexOf("India");
                        //console.log(n);
                        if (n == -1) {
                            alert("Please select location within India region!");
                            //clearOverlays();
                            return false;
                        }
                        // console.log(i);
                        document.getElementById("endd_location").value = fullAddress.results[0].formatted_address;
                        document.getElementById("endd_location_oute" + (i-1)).value = fullAddress.results[0].formatted_address;
                        document.getElementById("endd_location_latt" + (i-1)).value = map.getCenter().lat();
                        document.getElementById("endd_location_lngg" + (i-1)).value = map.getCenter().lng();
                        var x = map.getCenter().lat();
                        // console.log(x);
                    }
                };

                xhttp.open("GET", 'http://maps.googleapis.com/maps/api/geocode/json?latlng=' + map.getCenter().lat() + ',' + map.getCenter().lng() + '&sensor=true', true);
                xhttp.send();
            }


            function initMap() {

                var directionsService = new google.maps.DirectionsService;
                var directionsDisplay = new google.maps.DirectionsRenderer;
                map = new google.maps.Map(document.getElementById('mapsss'), {
                    center: {
                        // lat: 1.290270,
                        // lng: 103.8519599
                         lat: 30.7262141,
                                 lng: 76.8451191
                    },
                    zoom: 16
                });

                var geocoder = new google.maps.Geocoder;
                var path = [{
                        lat: 1.2710487283400567,
                        lng: 103.59927435312497
                    }, {
                        lat: 1.411086009067057,
                        lng: 103.6665656128906
                    }, {
                        lat: 1.4550175756894068,
                        lng: 103.71188421640622
                    }, {
                        lat: 1.4426619079399046,
                        lng: 103.76132269296872
                    }, {
                        lat: 1.475610204593154,
                        lng: 103.81076116953122
                    }, {
                        lat: 1.4261875799897683,
                        lng: 103.89041204843747
                    }, {
                        lat: 1.417950371704313,
                        lng: 103.99890203867184
                    }, {
                        lat: 1.441289051815047,
                        lng: 104.04284735117184
                    }, {
                        lat: 1.4261875799897683,
                        lng: 104.07717962656247
                    }, {
                        lat: 1.3547974802219171,
                        lng: 104.07717962656247
                    }, {
                        lat: 1.3136099201280351,
                        lng: 104.03323431406247
                    }, {
                        lat: 1.3081181936862216,
                        lng: 103.99752874765622
                    }, {
                        lat: 1.3149828498544902,
                        lng: 103.96594305429684
                    }, {
                        lat: 1.2847782228224693,
                        lng: 103.88903875742184
                    }, {
                        lat: 1.2147570463011605,
                        lng: 103.85607977304684
                    }, {
                        lat: 1.1927892395033752,
                        lng: 103.75582952890622
                    }, {
                        lat: 1.1763132691412383,
                        lng: 103.71737738046872
                    }, {
                        lat: 1.217503009659319,
                        lng: 103.61026068124997
                    }
                    // {lat :1.4481533241470939,lng: 103.7269904175781},
                    // {lat: 1.4563904234944167,lng: 103.71737738046872},
                    // {lat: 1.4714916939795284,lng: 103.84097357187497},
                    // {lat: 1.4330518977127196,lng: 104.05932684335934},
                    // {lat: 1.3287121054544353,lng: 104.09228582773434},
                    // {lat: 1.2339787308525019,lng: 103.84097357187497},
                    // {lat: 1.2545732386756825,lng: 103.60202093515622}
                ];
                var bermudaTriangle = new google.maps.Polygon({
                    paths: path,
                    strokeColor: '#BBD8E9',
                    strokeOpacity: 0.8,
                    strokeWeight: 3,
                    fillColor: '#BBD8E9',
                    fillOpacity: 0.6
                });

                directionsDisplay.setMap(map);
                // document.getElementById('btn').addEventListener('click', function() {
                //     calculateAndDisplayRoute(directionsService, directionsDisplay);
                // });
                map.addListener('center_changed', function() {
                    marker.setPosition(map.getCenter());
                });
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function(position) {
                        var pos = {
                            lat: position.coords.latitude,
                            lng: position.coords.longitude
                        };

                        marker = new google.maps.Marker({
                            position: pos,
                            map: map,
                            title: 'Address',
                            fences: [bermudaTriangle]
                        });
                        map.setCenter(pos);
                    }, function() {
                        marker = new google.maps.Marker({
                            position: {
                                // lat: 1.290270,
                                // lng: 103.851959
                                  lat: 30.7262141,
                                 lng: 76.8451191
                                
                            },
                            map: map,
                            title: 'Address',
                            fences: [bermudaTriangle]
                        });
                        //alert("Error in calculating location. Please scroll manually.")
                    });
                    bermudaTriangle.setMap(map);
                } else {
                    // Browser doesn't support Geolocation
                    alert("Your browser doesn't support geo location. Please scroll manually.")
                }

            }
            $("#myModal").on('show.bs.modal', function(event) {
                setTimeout(function() {
                    initMap();
                    google.maps.event.trigger(map, "resize");
                }, 1000);
            });

            // function calculateAndDisplayRoute(directionsService, directionsDisplay) {
            //     var waypts = [];
            //     // alert(i);r
            //     var checkboxArray = document.getElementById('endd_location_oute');
            //     console.log(checkboxArray);
            //     if (checkboxArray!=null) {

            //         for (var i = 0; i < checkboxArray.length; i++) {
            //             if (checkboxArray.options[i].selected) {
            //                 waypts.push({
            //                     location: checkboxArray[i].value,
            //                     stopover: true
            //                 });
            //             }
            //         }
            //     }

            //     directionsService.route({
            //         origin: document.getElementById('start').value,
            //         destination: document.getElementById('end').value,
            //         waypoints: waypts,
            //         optimizeWaypoints: true,
            //         travelMode: 'DRIVING'
            //     }, function(response, status) {
            //         if (status === 'OK') {
            //             directionsDisplay.setDirections(response);
            //             var route = response.routes[0];
            //             var summaryPanel = document.getElementById('directions-panel');
            //             summaryPanel.innerHTML = '';
            //             // For each route, display summary information.
            //             for (var i = 0; i < route.legs.length; i++) {
            //                 var routeSegment = i + 1;
            //                 summaryPanel.innerHTML += '<b>Route Segment: ' + routeSegment +
            //                     '</b><br>';
            //                 summaryPanel.innerHTML += route.legs[i].start_address + ' to ';
            //                 summaryPanel.innerHTML += route.legs[i].end_address + '<br>';
            //                 summaryPanel.innerHTML += route.legs[i].distance.text + '<br><br>';
            //             }
            //         } else {
            //             window.alert('Directions request failed due to ' + status);
            //         }
            //     });
            // }
            </script>
        </div>
       <button class="btn btn-success displaynone" type="hidden" id="stlc" onclick="selectStart()">Start Location</button>
        <button class="btn btn-success displaynone" id="edlc" onclick="selectEnd()">End Location</button>
        <button class="btn btn-success displaynone" id="wlep" onclick="selectwayEnd()">Add Waypoint</button>
        <button class="btn btn-success displaynone" type="button" id="btn" onclick="myfntn(this)" data-dismiss="modal" value="confirm">Confirm</button>
            <input type="hidden" id="wyrs" value="">
        <button class="btn btn-success displaynone" type="button" id="btnn" data-dismiss="modal" value="confirm">Confirm</button>
    </div>
</div>
</body>







<style type="text/css">
.displaynone {
    display: none;
}
</style>
<script type="text/javascript">
function myfunction1() {
    $('#stlc').addClass('displaynone');
    $('#edlc').addClass('displaynone');
    $('#wlep').removeClass('displaynone');
    $('#btnn').addClass('displaynone');
    $('#btn').removeClass('displaynone');
}

function mydata() {
    $('#wlep').addClass('displaynone');
    $('#stlc').removeClass('displaynone');
    $('#edlc').removeClass('displaynone');
    $('#btn').addClass('displaynone');
    $('#btnn').removeClass('displaynone');
}
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!--  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyACSueOTI5iEZBVIu-G7ROeW2DiQn8tVGw&callback=initMap">
</script>


</html>
