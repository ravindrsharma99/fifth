        </div>
      </div>
    </div>
  </div>
</section>

<section class="copy_right">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="copy">
                    <p>Copyright &copy; 2017 KUDOS FIND All rights reserved. </p>
                </div>
            </div>
            <!--<div class="col-md-8 col-sm-7 col-xs-12">
                <div class="privacy">
                    <ul>
                        <!-- <li><a href="http://kudosfind.com/Admin/Service/Pricing">Pricing</a></li> --
                        <li><a href="http://kudosfind.com/Admin/Service/faq">FAQ</a></li>
                        <!-- <li><a href="javascript:void(0)">Feedback</a></li> --
                        <li><a href="http://kudosfind.com/Admin/Service/PrivacyPolicy">Privacy policy</a></li>
                        <li><a href="http://kudosfind.com/Admin/Service/Terms_Condition">Terms &amp; conditions</a></li>
                        <li><a href="http://kudosfind.com/Admin/Service/Contactus">Contact Us</a></li>
                    </ul>
                </div>
            </div> -->
        </div>
    </div>
</section>


<!-- model rating -->
<form action="<?php echo base_url(); ?>Booking/driver_rating" method="POST">
    <div class="modal fade" id="rating_model" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label=""><span>×</span></button>
                </div>
                <div class="modal-body padding_remove_top">
                    <div class="row">
                        <div class="col-xs-12 col-md-12 text-center">
                            <h1 class="rating-num">Are you happy with this task? Please rate it on th scale of 5.</h1>
                            <div class="REATING_penal">
                                <fieldset class="rating">
                                    <input type="radio" id="star5" name="rating5" value="5" />
                                    <label class="full" for="star5" title="Awesome - 5 stars"></label>
                                    <!-- <input type="radio" id="star4half" name="rating1" value="4 and a half" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label> -->
                                    <input type="radio" id="star4" name="rating4" value="4" />
                                    <label class="full" for="star4" title="Pretty good - 4 stars"></label>
                                    <!-- <input type="radio" id="star3half" name="rating2" value="3 and a half" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label> -->
                                    <input type="radio" id="star3" name="rating3" value="3" />
                                    <label class="full" for="star3" title="Meh - 3 stars"></label>
                                    <!-- <input type="radio" id="star2half" name="rating3" value="2 and a half" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label> -->
                                    <input type="radio" id="star2" name="rating2" value="2" />
                                    <label class="full" for="star2" title="Kinda bad - 2 stars"></label>
                                    <!-- <input type="radio" id="star1half" name="rating5" value="1 and a half" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label> -->
                                    <input type="radio" id="star1" name="rating1" value="1" />
                                    <label class="full" for="star1" title="Sucks big time - 1 star"></label>
                                    <!-- <input type="radio" id="starhalf" name="rating7" value="half" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label> -->
                                </fieldset>
                            </div>
                            <!--  <span class="glyphicon glyphicon-user"></span>1,050,008 total -->
                        </div>
                        <input class="Addmoney_button" type="submit" name="rate_submit" value="submit">
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- model rating -->

  <div class="modal fade" id="waypoint_error_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label=""><span>×</span></button>
                </div>
                <div class="modal-body padding_remove_top">
                    <div class="row">
                        <div class="col-xs-12 col-md-12 text-center">
                            
                          
                          <p> PLease check and select the Correct Waypoints </p>
                           <p> Thank You !! </p>
                            <!--  <span class="glyphicon glyphicon-user"></span>1,050,008 total -->
                        </div>
                        <input class="Addmoney_button" type="submit" name="rate_submit" value="submit">
                    </div>
                </div>
            </div>
        </div>
    </div>





<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="<?php echo base_url(); ?>assests/js/bootstrap.js"></script>
<script src="<?php echo base_url(); ?>assests/js/animate.js"></script>
<script src="https://code.jquery.com/jquery-1.12.3.min.js" integrity="sha256-aaODHAgvwQW1bFOGXMeX+pC4PZIPsvn2h1sArYOhgXQ=" crossorigin="anonymous"></script>
<script type="text/javascript" src="http://momentjs.com/downloads/moment-with-locales.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assests/js/bootstrap-material-datetimepicker.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


<!-- tabs_script -->
<script type="text/javascript">
$(document).ready(function() {
$(".btn-pref .btn").click(function () {
    $(".btn-pref .btn").removeClass("btn-primary").addClass("btn-default");
    // $(".tab").addClass("active"); // instead of this do the below 
    $(this).removeClass("btn-default").addClass("btn-primary");   
});
});
</script>
<!-- tabs_script -->

<!--  Stripe -- >



<!-- End -->


<script type="text/javascript">
$('#radioBtn a').on('click', function() {
    var sel = $(this).data('title');
    var tog = $(this).data('toggle');
    $('#' + tog).prop('value', sel);

    $('a[data-toggle="' + tog + '"]').not('[data-title="' + sel + '"]').removeClass('active').addClass('notActive');
    $('a[data-toggle="' + tog + '"][data-title="' + sel + '"]').removeClass('notActive').addClass('active');
});
$('#amt').click(function(){
    var amount = $('#amt').val();
    $('#wallet_value').val(amount);
});
$('#amt1').click(function(){
    var amount = $('#amt1').val();
    $('#wallet_value').val(amount);
});
$('#amt2').click(function(){
    var amount = $('#amt2').val();
    $('#wallet_value').val(amount);
});
$('#amt3').click(function(){
    var amount = $('#amt3').val();
    $('#wallet_value').val(amount);
});

var j = jQuery.noConflict();
j(document).ready(function(){
j('#slectquote').on('change',function(){
  var value = j('#slectquote').val();
    j.ajax({
      method:'POST',
      url:'http://kudosfind.com/index.php/Booking/subcat',
      data:'catId='+value,
      success:function(html){
        //console.log(html);
        j('#quotecat').html(html);
      }
    });
  });

    var text = j('#textarea');
    var maxlength = parseInt(text.attr("maxlength"));
    text.on("keyup keypress change", function() {
      charCount = parseInt($(this).val().length);
      charRemain = maxlength - charCount;
      $("#desciption_len").html(charRemain + " Characters remaining");
    });
});

var j = jQuery.noConflict();
function checkPasswordMatch(){
    var password = j("#newPassword").val();
    var confirmPassword = j("#conPassword").val();
    if(password != confirmPassword){
      j("#errorMsg").html("Passwords do not match!");
    }else{
      j("#errorMsg").html("");
    }
}

var j = jQuery.noConflict();
j(document).ready(function(){
   j("#conPassword").keyup(checkPasswordMatch);
});
</script>
<script>
    function isNumber(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        }
        return true;
        }
    </script>

